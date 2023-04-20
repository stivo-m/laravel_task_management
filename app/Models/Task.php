<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory, SoftDeletes;


    protected $fillable = [
        'status_id',
        'name',
        'description',
        'due_date'
    ];


    protected $casts = [
        'due_date' => 'datetime'
    ];

    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class);
    }
}
