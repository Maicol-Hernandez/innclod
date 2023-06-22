<?php

namespace App\Models;

use App\Models\Process;
use App\Models\TypeDocument;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Document
 *
 * @property integer $id
 * @property string $name
 * @property string $code
 * @property string $description
 * @property \App\Models\TypeDocument $type_document_id
 * @property \App\Models\Process $process_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @package App\Models
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Document extends Model
{
    use HasFactory;

    protected $perPage = 10;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'code',
        'description',
        'type_document_id',
        'process_id',
    ];


    /**
     * Get the typeDocument that owns the Documento
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function typeDocument(): BelongsTo
    {
        return $this->belongsTo(TypeDocument::class);
    }

    /**
     * Get the process that owns the Documento
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function process(): BelongsTo
    {
        return $this->belongsTo(Process::class);
    }
}
