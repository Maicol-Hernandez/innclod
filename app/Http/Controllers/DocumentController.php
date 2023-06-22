<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Services\DocumentService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDocumentRequest;
use App\Http\Requests\UpdateDocumentRequest;

class DocumentController extends Controller
{

    protected DocumentService $documentService;

    public function __construct(DocumentService $documentService)
    {
        $this->documentService = $documentService;
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $documents = Document::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDocumentRequest $request)
    {
        DB::beginTransaction();
        try {
            $document = Document::create($request->all());

            $document->code = $this->documentService->generateCode(
                $document->process->code,
                $document->typeDocument->code,
                $document->id
            );
            $document->save();
            DB::commit();
        } catch (\Exception $e) {
            Log::error($e);
            DB::rollback();
            // return response()->json([
            //     'status' => 'ERROR',
            //     'message' => 'Something went wrong',
            // ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Document $document)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Document $document)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDocumentRequest $request, Document $document)
    {
        DB::beginTransaction();
        try {
            $document->update($request->all());

            $document->code = $this->documentService->generateCode(
                $document->process->code,
                $document->typeDocument->code,
                $document->id
            );
            $document->save();
            DB::commit();
        } catch (\Exception $e) {
            Log::error($e);
            DB::rollback();
            return response()->json([
                'status' => 'ERROR',
                'message' => 'Something went wrong',
            ]);
        }

        return response()->json([
            'status' => 'SUCCESS',
            'message' => 'Document has been updated successfully',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Document $document)
    {
        if ($document->delete()) {
            // return response()->json([
            //     'status' => 'SUCCESS',
            //     'message' => 'Document has been deleted successfully',
            // ]);
        } else {
            // return response()->json([
            //     'status' => 'ERROR',
            //     'message' => 'Something went wrong',
            // ]);
        }
    }
}
