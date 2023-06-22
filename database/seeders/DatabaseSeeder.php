<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Process;
use App\Models\Document;
use App\Models\TypeDocument;
use Illuminate\Database\Seeder;
use App\Services\DocumentService;

class DatabaseSeeder extends Seeder
{
    protected DocumentService $documentService;


    public function __construct(DocumentService $documentService)
    {
        $this->documentService = $documentService;
    }

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = User::factory(3)->create();

        $user = User::create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'test12345'
        ]);


        $typeDocument = TypeDocument::factory(5)->create();

        $process = Process::factory(5)->create();

        $documents = Document::factory(5)->make()->each(function (Document $document) use ($typeDocument, $process, $user) {
            $document->type_document_id = $typeDocument->random()->id;
            $document->process_id = $process->random()->id;
            $document->user_id = $user->id;

            $document->save();
            $document->code = $this->documentService->generateCode($process->random()->code, $typeDocument->random()->code, $document->id);
            $document->save();
        });
    }
}
