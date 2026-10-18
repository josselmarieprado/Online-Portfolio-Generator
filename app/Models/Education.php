<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Education extends Model
{
    /**
     * Database table associated with this model.
     */
    protected $table = 'educations';

    /**
     * Attributes that can be mass assigned.
     */
    protected $fillable = [
        'portfolio_id',
        'school_name',
        'degree',
        'field_of_study',
        'start_date',
        'end_date',
        'description',
    ];

    /**
     * Attribute casting.
     */
    protected function casts(): array
    {
        return [
            'start_date' => 'date',
            'end_date' => 'date',
        ];
    }

    /**
     * Get the portfolio that owns this education record.
     */
    public function portfolio(): BelongsTo
    {
        return $this->belongsTo(Portfolio::class);
    }
}