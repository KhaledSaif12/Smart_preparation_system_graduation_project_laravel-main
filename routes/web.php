<?php


use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\AttendancemanualController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DatabaseController;
use App\Http\Controllers\FDIDController;
use App\Http\Controllers\InsertController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ShiftController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\API\APIFdidController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Route::get('/', function () { return view('home'); });
Route::get('/', function () { return view('auth.login'); });


Route::get('login', [LoginController::class,'showLoginForm'])->name('login');
Route::post('login', [LoginController::class,'login']);
Route::post('register', [RegisterController::class,'register']);


Route::group(['prefix' => LaravelLocalization::setLocale(),	'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
], function()
{   });

	Route::get('password/forget',  function () {
		return view('pages.forgot-password');
	})->name('password.forget');
	Route::post('password/email', [ForgotPasswordController::class,'sendResetLinkEmail'])->name('password.email');
	Route::get('password/reset/{token}', [ResetPasswordController::class,'showResetForm'])->name('password.reset');
	Route::post('password/reset', [ResetPasswordController::class,'reset'])->name('password.update');


	Route::group(['middleware' => 'auth'], function(){
		// logout route
		Route::get('/logout', [LoginController::class,'logout']);
		Route::get('/clear-cache', [HomeController::class,'clearCache']);

		// dashboard route
		Route::get('/dashboard', function () {
			return view('pages.dashboard');
		})->name('dashboard');

        Route::get('/dashboard', [EmployeeController::class, 'index'])->name('dashboard');


		//only those have manage_user permission will get access
		Route::group(['middleware' => 'can:manage_user'], function(){
		Route::get('/users', [UserController::class,'index'])->name('all_users');
		Route::get('/user/get-list', [UserController::class,'getUserList'])->name('user_list');
			Route::get('/user/create', [UserController::class,'create']);
			Route::post('/user/create', [UserController::class,'store'])->name('create-user');
			Route::get('/user/{id}', [UserController::class,'edit']);
			Route::post('/user/update', [UserController::class,'update']);
			Route::get('/user/delete/{id}', [UserController::class,'delete']);
			});

			
			//Employees
			Route::group(['middleware' => 'can:manage_employee'], function(){
		Route::get('/emp/create', [EmployeeController::class,'create'])->name('emp_create');
			Route::post('/storee', [EmployeeController::class,'storee'])->name('storee');
			Route::get('/all/emps', [EmployeeController::class,'All_Employees'])->name('all_emp');
			Route::get('/get/emp-list', [EmployeeController::class,'getempList'])->name('get_emp_List');
			Route::get('/delete_employee/{id}', [EmployeeController::class,'destroy'])->name('destroy');
			Route::get('/edit/{id}', [EmployeeController::class,'edit'])->name('edit_emp');
			Route::post('/update', [EmployeeController::class,'update'])->name('update_employee');
			Route::get('/display_employee/{id}',[EmployeeController::class,'show'])->name('show');
            Route::post('/emp/create', [EmployeeController::class, 'uploadd'])->name('inserttt');

			
            Route::post('/insert', [InsertController::class, 'upload'])->name('insertt');
            Route::get('/insert',[InsertController::class,'show'])->name('insert');
			});

           //attendance
		   Route::group(['middleware' => 'can:manage_attendance'], function(){
			Route::get('/attendance', [AttendanceController::class, 'show'])->name('attendance.show');
			Route::get('/attendance/data', [AttendanceController::class, 'getAttendanceData'])->name('attendance.data');
			Route::delete('/attendance/delete/{id}', [AttendanceController::class, 'deleteAttendance'])->name('attendance.delete');

			Route::get('/attendance-manual', [AttendancemanualController::class, 'index'])->name('attendance.index');
			// Route::get('/attendance/data', [AttendancemanualController::class, 'fetchData'])->name('attendance.data');
			Route::post('/attendance', [AttendancemanualController::class, 'store'])->name('attendance.store');
			Route::delete('/attendance/{id}', [AttendancemanualController::class, 'destroy'])->name('attendance.delete');
		   });

			//Departments
			Route::group(['middleware' => 'can:manage_department'], function(){
			Route::get('/Department',[DepartmentController::class,'index'])->name('department');
			Route::get('/add/Department',[DepartmentController::class,'create'])->name('add_department');
			Route::post('/create/Department',[DepartmentController::class,'store'])->name('store_department');
			Route::get('/delete_department/{id}',[DepartmentController::class,'delete'])->name('destroy_department');
			Route::get('/edit_department/{id}',[DepartmentController::class,'edit'])->name('edit_department');
			Route::post('/update_Department',[DepartmentController::class,'update'])->name('update_department');
			Route::get('department/get-list',[DepartmentController::class,'getdeptList'])->name('department/get-list');
			});

			//Shifts
			Route::group(['middleware' => 'can:manage_shift'], function(){
			Route::post('/store_shift', [ShiftController::class,'store'])->name('store');
			Route::get('/all_shift', [ShiftController::class,'index'])->name('all_shift');
			Route::get('/add/Shift',[ShiftController::class,'create'])->name('addshift');
			Route::get('/edit/Shift/{id}',[ShiftController::class,'edit'])->name('edit_shift');
			Route::post('/update/Shift',[ShiftController::class,'update'])->name('update_shift');
			Route::get('/delete/Shift/{id}',[ShiftController::class,'delete'])->name('delete_shift');
			});


			//Attendenc and depact
			//Route::get('/attendanc-depact',[AttendancController::class,'index'])->name('atten-depact');

			//Report
			Route::group(['middleware' => 'can:manage_hr'], function(){
			Route::get('/report',[ReportController::class,'Show'])->name('report');
            Route::get('/detailsreport',[ReportController::class,'Showdetails'])->name('reportdetails');
			});

			//Database
			Route::group(['middleware' => 'can:manage_database'], function(){
            Route::get('/database', [DatabaseController::class, 'index'])->name('database.index');
			Route::post('/database/create', [DatabaseController::class, 'create'])->name('database.create');
			Route::post('/database/update', [DatabaseController::class, 'update'])->name('database.update');
			Route::post('/database/delete', [DatabaseController::class, 'delete'])->name('database.delete');
			});
			
Route::get('/fdid', [APIFdidController::class, 'index'])->name('fdid');




		//only those have manage_role permission will get access
		Route::group(['middleware' => 'can:manage_role|manage_user'], function(){
			Route::get('/roles', [RolesController::class,'index']);
			Route::get('/role/get-list', [RolesController::class,'getRoleList']);
			Route::post('/role/create', [RolesController::class,'create']);
			Route::get('/role/edit/{id}', [RolesController::class,'edit']);
			Route::post('/role/update', [RolesController::class,'update']);
			Route::get('/role/delete/{id}', [RolesController::class,'delete']);


		});


		//only those have manage_permission permission will get access
		Route::group(['middleware' => 'can:manage_permission|manage_user'], function(){
			Route::get('/permission', [PermissionController::class,'index']);
			Route::get('/permission/get-list', [PermissionController::class,'getPermissionList']);
			Route::post('/permission/create', [PermissionController::class,'create']);
			Route::get('/permission/update', [PermissionController::class,'update']);
			Route::get('/permission/delete/{id}', [PermissionController::class,'delete']);
		});


	// get permissions
	Route::get('get-role-permissions-badge', [PermissionController::class,'getPermissionBadgeByRole']);

	// Basic demo routes
	include('modules/demo.php');
	// Inventory routes
	include('modules/inventory.php');
	// Accounting routes
	include('modules/accounting.php');
});


Route::get('/register', function () { return view('pages.register'); });
Route::get('/login-1', function () { return view('pages.login'); });
//Route::get('send_mail',[UserController::class,'send_email'])->name('send_mail');
