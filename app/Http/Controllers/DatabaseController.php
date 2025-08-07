<?php

namespace App\Http\Controllers;

use App\Http\Controllers\API\APIFdidController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DatabaseController extends Controller
{
    private $username = 'admin';
    private $password = 'Admin@123';

    public function index()
    {
        $response = Http::withBasicAuth($this->username, $this->password)
            ->get('http://192.168.0.105:80/ISAPI/Intelligent/FDLib');

        if ($response->failed()) {
            return view('create-database', ['error' => 'Failed to fetch data.']);
        }

        $xml = simplexml_load_string($response->body());
        if ($xml === false) {
            return view('create-database', ['error' => 'Failed to parse XML response.']);
        }

        $data = [];
        foreach ($xml->children() as $item) {
            $data[] = [
                'id' => (string) $item->id,
                'fdid' => (string) $item->FDID,
                'name' => (string) $item->name,
            ];
        }

        return view('create-database', ['data' => $data]);
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $name = $request->input('name');

        // Generate a unique FDID
        $fdid = $this->generateUniqueFDID();

        $xml = '<?xml version="1.0" encoding="UTF-8"?>
        <CreateFDLibList>
          <CreateFDLib>
            <id>1</id>
            <FDID>' . $fdid . '</FDID>
            <name>' . $name . '</name>
            <faceLibType>blackFD</faceLibType>
          </CreateFDLib>
        </CreateFDLibList>';

        $response = Http::withBasicAuth($this->username, $this->password)
            ->withHeaders(['Content-Type' => 'application/xml'])
            ->withBody($xml, 'application/xml')
            ->post('http://192.168.0.105:80/ISAPI/Intelligent/FDLib');

        if ($response->failed()) {
            $errorResponse = $response->body();
            return back()->withErrors(['error' => 'فشل في انشاء قاعده البيانات: ' . $errorResponse]);
        }

        // Execute the index method from APIFdidController
        $controller = new APIFdidController();
        $indexResponse = $controller->index();

        // Check if the index method execution was successful
        if ($indexResponse->getStatusCode() !== 200) {
            $errorResponse = $indexResponse->getContent();
            return back()->withErrors(['error' => 'فشل في تحديث قاعدة البيانات: ' . $errorResponse]);
        }

        return redirect()->back()->with('success', 'لقد تم انشاء قاعدة البيانات بنجاح وتم تحديثها.');
    }


    private function generateUniqueFDID()
    {
        // Implement your logic to generate a unique FDID
        // For example, you can use a UUID library or generate a random number
        return uniqid();
    }

    public function update(Request $request)
    {
        $request->validate([
            'fdid' => 'required',
            'name' => 'required',
        ]);

        $fdid = $request->input('fdid');
        $name = $request->input('name');

        $xml = '<?xml version="1.0" encoding="UTF-8"?>
        <FDLibBaseCfg>
            <id>1</id>
            <FDID>' . $fdid . '</FDID>
            <name>' . $name . '</name>
            <faceLibType>ordinary</faceLibType>
            <totalFaceNum>0</totalFaceNum>
            <normalFaceNum>0</normalFaceNum>
            <abnormalFaceNum>0</abnormalFaceNum>
        </FDLibBaseCfg>';

        $response = Http::withBasicAuth($this->username, $this->password)
            ->withHeaders(['Content-Type' => 'application/xml'])
            ->withBody($xml, 'application/xml')
            ->put("http://192.168.0.105:80/ISAPI/Intelligent/FDLib/{$fdid}");

        if ($response->failed()) {
            return back()->withErrors(['error' => 'Failed to update FDLib.']);
        }

        // Execute the index method from APIFdidController
        $controller = new APIFdidController();
        $indexResponse = $controller->index();

        // Check if the index method execution was successful
        if ($indexResponse->getStatusCode() !== 200) {
            $errorResponse = $indexResponse->getContent();
            return back()->withErrors(['error' => 'فشل في تحديث قاعدة البيانات: ' . $errorResponse]);
        }

        return redirect()->back()->with('success', 'تم تحديث FDLib وقاعدة البيانات بنجاح.');

    }
     /*
    public function update(Request $request)
    {
        $request->validate([
            'fdid' => 'required',
            'name' => 'required',
        ]);

        $fdid = $request->input('fdid');
        $name = $request->input('name');

        $xml = '<?xml version="1.0" encoding="UTF-8"?>
        <FDLibBaseCfg>
            <id>1</id>
            <FDID>' . $fdid . '</FDID>
            <name>' . $name . '</name>
            <faceLibType>ordinary</faceLibType>
            <totalFaceNum>0</totalFaceNum>
            <normalFaceNum>0</normalFaceNum>
            <abnormalFaceNum>0</abnormalFaceNum>
        </FDLibBaseCfg>';

        $response = Http::withBasicAuth($this->username, $this->password)
            ->withHeaders(['Content-Type' => 'application/xml'])
            ->withBody($xml, 'application/xml')
            ->put("http://192.168.0.105:80/ISAPI/Intelligent/FDLib/{$fdid}");

        if ($response->failed()) {
            return back()->withErrors(['error' => 'Failed to update FDLib.']);
        }

        return back()->with('success', 'FDLib updated successfully.');
    }
            */


    public function delete(Request $request)
    {
        $fdid = $request->input('fdid');

        $response = Http::withBasicAuth($this->username, $this->password)
            ->delete("http://192.168.0.105:80/ISAPI/Intelligent/FDLib/{$fdid}");

        if ($response->failed()) {
            return back()->withErrors(['error' => 'Failed to delete FDLib.']);
        }

        // Execute the index method from APIFdidController
        $controller = new APIFdidController();
        $indexResponse = $controller->index();

        // Check if the index method execution was successful
        if ($indexResponse->getStatusCode() !== 200) {
            $errorResponse = $indexResponse->getContent();
            return back()->withErrors(['error' => 'فشل في حذف FDLib وتحديث قاعدة البيانات: ' . $errorResponse]);
        }

        return redirect()->back()->with('success', 'تم حذف FDLib وتحديث قاعدة البيانات بنجاح.');
}

}
