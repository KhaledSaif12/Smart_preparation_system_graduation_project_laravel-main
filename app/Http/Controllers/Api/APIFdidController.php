<?php
namespace App\Http\Controllers\API;

use App\Models\Fdid;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class APIFdidController extends Controller
{
    public function index()
    {
        $response = Http::withBasicAuth('admin', 'Admin@123')->get('http://192.168.0.105:80/ISAPI/Intelligent/FDLib');

        if ($response->successful()) {
            $xml = simplexml_load_string($response->body());

            if ($xml !== false) {
                // Fetch existing Fdid records from the database
                $existingFdids = Fdid::all();

                $idsFromApi = [];
                $newFdids = [];

                // Iterate through the API response and update or create Fdid records
                foreach ($xml->children() as $item) {
                    $name = (string) $item->name;
                    $value = (string) $item->FDID;
                    $idsFromApi[] = $value;

                    $fdid = $existingFdids->firstWhere('Name_Fdid', $name);
                    if ($fdid) {
                        // Update the existing record
                        if ($fdid->Value_Fdid !== $value) {
                            $fdid->Value_Fdid = $value;
                            $fdid->save();
                        }
                    } else {
                        // Create a new record
                        $newFdids[] = [
                            'Name_Fdid' => $name,
                            'Value_Fdid' => $value
                        ];
                    }
                }

                // Delete any records that are not present in the API response
                $existingFdids->whereNotIn('Value_Fdid', $idsFromApi)->each->delete();

                // Create the new records
                if (!empty($newFdids)) {
                    Fdid::insert($newFdids);
                }

                return response()->json(['message' => 'Data saved successfully'], 200);
            } else {
                return response()->json(['error' => 'Failed to parse XML response.'], 500);
            }
        } else {
            return response()->json(['error' => 'Error fetching data: ' . $response->status()], $response->status());
        }
    }
}
