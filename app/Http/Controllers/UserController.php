<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Mail\WelcomeEmail;
use App\Models\User;
use Auth;
use DataTables;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Show the users dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('users');
    }

    /**
     * Show User List
     *
     * @param Request $request
     * @return mixed
     */
    public function getUserList(Request $request): mixed
    {
        $data = User::get();
        $hasManageUser = Auth::user()->can('manage_user');

        return Datatables::of($data)
        ->addColumn('Role', function ($data) {
            $roles = $data->getRoleNames()->toArray();
            $badge = '';
            if ($roles) {
                $badge = implode(' , ', $roles);
            }

            return $badge;
        })
            ->addColumn('permissions', function ($data) {
                $roles = $data->getAllPermissions();
                $badges = '';
                foreach ($roles as $key => $role) {
                    $badges .= '<span class="badge badge-dark m-1">' . $role->name . '</span>';
                }

                return $badges;
            })
            ->addColumn('action', function ($data) use ($hasManageUser) {
                $output = '';
                if ($data->name == 'Super Admin') {
                    return '';
                }
                if ($hasManageUser) {
                    $output = '<div class="table-actions">
                                <a href="' . url('user/' . $data->id) . '" ><i class="ik ik-edit-2 f-16 mr-15 text-green"></i></a>
                                <a href="' . url('user/delete/' . $data->id) . '"><i class="ik ik-trash-2 f-16 text-red"></i></a>
                            </div>';
                }

                return $output;
            })
            ->rawColumns(['Role', 'permissions', 'action'])
            ->make(true);
    }

    /**
     * User Create
     *
     * @return mixed
     */
    public function create(): mixed
    {
        try {
            $roles = Role::pluck('name', 'id');

            return view('create-user', compact('roles'));
           // return redirect()->back()->with('roles',$roles);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Store User
     *
     * @param UserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserRequest $request): RedirectResponse
    {
        $generated_password = $this->randomPassword();
        try {
            // تخزين معلومات المستخدم
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                // 'password' => Hash::make($generated_password),
                'password' => $request->password,
            ]);

            if ($user) {
                // تعيين دور جديد للمستخدم
                $user->syncRoles($request->role);
                // $user_info = array();
                // $user_info['name'] = $user->name;
                // $user_info['password'] = $generated_password;
                // Mail::to($request->email)->send(new WelcomeEmail($user_info));
                return redirect()->route('all_users')->with('success', 'تمت الإضافة بنجاح');
            }

            return redirect()->route('all_users')->with('error', 'فشلت عملية الإضافة، يرجى المحاولة مرة أخرى');
        } catch (\Exception $e) {
            $bug = $e->getMessage();
            return redirect()->route('all_users')->with('error', 'حدث خطأ: ' . $bug);
        }
    }


    /**
     * Edit User
     *
     * @param int $id
     * @return mixed
     */
    public function edit($id): mixed
    {
        try {
            $user = User::with('roles', 'permissions')->find($id);

            if ($user) {
                $user_role = $user->roles->first();
                $roles = Role::pluck('name', 'id');

                return view('user-edit', compact('user', 'user_role', 'roles'));
            }

            return redirect('404');
        } catch (\Exception $e) {
            $bug = $e->getMessage();

            return redirect()->back()->with('error', $bug);
        }
    }

    /**
     * Update User
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request): RedirectResponse
    {
        // update user info
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'name' => 'required | string ',
            'email' => 'required | email',
            'role' => 'required',
        ]);

        // check validation for password match


        if ($validator->fails()) {
            return redirect()->back()->withInput()->with('error', $validator->messages()->first());
        }

        try {
            if ($user = User::find($request->id)) {
                $payload = [
                    'name' => $request->name,
                    'email' => $request->email,
                ];


                // update password if user input a new password
               if (isset($request->password) && $request->password) {
                    $payload['password'] = $request->password;
                }

                $update = $user->update($payload);
                // sync user role
                $user->syncRoles($request->role);

                return redirect('users')->with('success', 'User information updated succesfully!');
            }

            return redirect()->back()->with('error', 'Failed to update user! Try again.');
        } catch (\Exception $e) {
            $bug = $e->getMessage();

            return redirect()->back()->with('error', $bug);
        }
    }

    /**
     * Delete User
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id): RedirectResponse
    {
        if ($user = User::find($id)) {
            $user->delete();

            return redirect('users')->with('success', 'User removed!');
        }

        return redirect('users')->with('error', 'User not found');
    }

    function randomPassword() {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }

    /* public function send_email(){

        Mail::to('a07643986@gmail.com')->send(new WelcomeEmail());
        return view('Email.Welcome_Email');
     }*/


    }
