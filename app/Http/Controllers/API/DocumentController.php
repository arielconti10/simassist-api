<?php

namespace App\Http\Controllers\API;

use App\Client;
use App\Document;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;

class DocumentController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Client::all();

        return $this->sendResponse($products->toArray(), 'Clients retrieved successfully.');
    }

    public function show($client_id){

        $client = Client::find($client_id);
        dd($client->documents);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request) {
        $input = $request->all();

        $file  = $input['file'];

        $this->createImageFromBase64($file);

        $document = Document::create([
            'filename' => $input['filename'],
            'document_type' => $input['document_type'],
        ]);

        return $this->sendResponse($document->toArray(), 'Document created successfully.');

    }

    /**
     * Upload the document file
     *
     * @param (string) $file
     *
     */
    public function createImageFromBase64($file){

        //generating unique file name;
        $file_name = 'document_'.time().'.pdf';
//        @list($type, $file_data) = explode(';', $file_data);
//        @list(, $file_data)      = explode(',', $file_data);

        if($file != ""){
            // storing image in storage/app/public Folder
            \Storage::disk('public')->put($file_name,base64_decode($file));
        }
    }
}
