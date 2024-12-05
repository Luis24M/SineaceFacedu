<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\JsonResponse;
use App\Models\Image;
use Google\Client as Google_Client;
use Google\Service\Drive as Google_Service_Drive;
use Google\Service\Drive\DriveFile as Google_Service_Drive_DriveFile;
use Illuminate\Support\Facades\Log;
class EvidenciasApiController extends Controller
{

    public function token(){
        $client_id=\Config('services.google.client_id');
        $client_secret=\Config('services.google.client_secret');
        $refresh_token=\Config('services.google.refresh_token');
        
        $response=Http::post('https://oauth2.googleapis.com/token',[
            'client_id'=>$client_id,
            'client_secret'=>$client_secret,
            'refresh_token'=>$refresh_token,
            'grant_type'=>'refresh_token'
        ]);

        $accessToken=json_decode((string)$response->getBody(),true)["access_token"];
        return $accessToken;
    }
    public function store(Request $request)
    {
        $validation = $request->validate([
            'file' => 'required|file|mimes:jpeg,png,jpg,gif',
            'file_name' => 'required'
        ]);
        
        try {
            $client = new Google_Client();
            $client->setClientId(config('services.google.client_id'));
            $client->setClientSecret(config('services.google.client_secret'));
            $client->refreshToken(config('services.google.refresh_token'));
            
            $service = new Google_Service_Drive($client);
            $file = $request->file('file');
            
            $fileMetadata = new Google_Service_Drive_DriveFile([
                'name' => $file->getClientOriginalName(),
                'parents' => [config('services.google.folder_id')]
            ]);

            $result = $service->files->create(
                $fileMetadata,
                [
                    'data' => file_get_contents($file->getRealPath()),
                    'mimeType' => $file->getMimeType(),
                    'uploadType' => 'multipart',
                    'fields' => 'id,name,webViewLink,webContentLink'
                ]
            );

            // Guardar en la base de datos
            $fileId = $result->id;
            $driveLink = "https://drive.google.com/uc?export=view&id=" . $fileId;
            
            $image = Image::create([
                'name' => $result->name,
                'file_id' => $fileId,
                'drive_link' => $driveLink,
                'mime_type' => $file->getMimeType()
            ]);

            return response()->json([
                'message' => 'Archivo subido exitosamente',
                'file' => [
                    'id' => $image->id,
                    'name' => $image->name,
                    'drive_link' => $image->drive_link
                ]
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error al subir el archivo',
                'error' => $e->getMessage()
            ], 500);
        }
    }



    public function index()
    {
        $evidencias = Evidencia::all();
        return response()->json($evidencias);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        try{
            $evidencia = Evidencia::create([
                "nombre"=>"Evidencia2",
                "enlace"=>"Enlace2"
            ]);
            return response()->json($evidencia);
        }catch(Exception $ex){
            return response()->json([
                "message"=>$ex
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function test(){
        return view('test');
    }




    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Evidencia $evidencia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Evidencia $evidencia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Evidencia $evidencia)
    {
        //
    }
}
