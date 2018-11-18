<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Photo extends Model
{

    protected $table = 'photos';
    protected $fillable = [
        'id',
        'title',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created'
    ];

    protected static function boot(): void
    {
        //parent::boot();
    }
}