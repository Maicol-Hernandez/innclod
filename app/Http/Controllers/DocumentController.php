<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Process;
use App\Models\Document;
use App\Models\TypeDocument;
use App\Services\DocumentService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;
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
        return Inertia::render('Documents/Index', [
            'documents' => Document::query()
                ->when(Request::input('search'), function ($query, $search) {
                    $query->orWhere('code', 'like', "%{$search}%");
                    $query->orWhere('name', 'like', "%{$search}%");
                })->with('process', 'typeDocument')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $processes = Process::all();
        $typeDocuments = TypeDocument::all();

        return Inertia::render('Documents/Create', [
            'processes' => $processes,
            'typeDocuments' => $typeDocuments
        ]);
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
            return back();
        }

        return redirect('documents');
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
        $processes = Process::all();
        $typeDocuments = TypeDocument::all();

        return Inertia::render('Documents/Edit', [
            'document' => $document, 'processes' => $processes, 'typeDocuments' => $typeDocuments
        ]);
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
            return back();
        }

        return redirect('documents');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Document $document)
    {
        if ($document->delete()) {
            return redirect('documents');
        } else {
            return back();
        }
    }
}
