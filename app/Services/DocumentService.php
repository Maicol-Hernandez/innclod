<?php

namespace App\Services;

final class DocumentService
{

    /**
     * Generate Code.
     * 
     * @param string $processCode
     * @param string $typeDocumentCode
     * @param int $documentId
     * @return string $typeDocumentCode
     */
    public function generateCode(string $processCode, string $typeDocumentCode, int $documentId): string
    {
        return "{$typeDocumentCode}-{$processCode}-{$documentId}";
    }
}
