<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class InsertController extends Controller
{

    public function show(){

        return view("insert");

    }
    //
    public function upload(Request $request)
    {
        // التحقق من البيانات المدخلة
        $request->validate([
            'fdid' => 'required|string',
            'name' => 'required|string',
            'sex' => 'required|string',
            'phoneNumber' => 'required|string',
            'importImage' => 'required|image'
        ]);

        // الحصول على قيم المدخلات من النموذج
        $fdid = $request->input('fdid');
        $name = $request->input('name');
        $sex = $request->input('sex');
        $phoneNumber = $request->input('phoneNumber');
        $image = $request->file('importImage');

        if ($image) {
            $originalFileName = $image->getClientOriginalName();
            $pictureUploadData = "<PictureUploadData><FDID>$fdid</FDID><FaceAppendData><name>$name</name><sex>$sex</sex><phoneNumber>$phoneNumber</phoneNumber></FaceAppendData></PictureUploadData>";

            $response = Http::withBasicAuth('admin', 'Admin@123')
                ->attach('importImage', file_get_contents($image->getPathname()), $originalFileName)
                ->post('http://192.168.0.105:80/ISAPI/Intelligent/FDLib/pictureUpload', [
                    'PictureUploadData' => $pictureUploadData,
                ]);

            if ($response->successful()) {
                // Assuming the PID is in an element <PID> in the response XML
                $xml = simplexml_load_string($response->body());
                $pid = (string) $xml->PID;
                return back()->with('success', 'Image uploaded successfully! PID: ' . $pid)
                             ->withInput($request->all())
                             ->with('pid', $pid);
            } else {
                return back()->with('error', 'Failed to upload image.');
            }
        } else {
            return back()->with('error', 'No image provided.');
        }
    }


}
