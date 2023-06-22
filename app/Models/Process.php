<?php

namespace App\Models;

use App\Models\Document;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Process
 *
 * @property integer $id
 * @property string $code
 * @property string $name
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @package App\Models
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Process extends Model
{
    use HasFactory;

    protected $perPage = 10;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code',
        'name',
    ];


    /**
     * Get the documents associated with the TipoDocumento
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function documents(): HasOne
    {
        return $this->hasOne(Document::class);
    }
}
