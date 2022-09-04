<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{
    use HasFactory;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    protected $fillable = [
        'name',
        'amount',
        'period',
        'start_date',
        'finish_date'
    ];

    protected $casts = [
        'start_date' => 'datetime:Y-m-d',
        'finish_date' => 'datetime:Y-m-d'
    ];
}
