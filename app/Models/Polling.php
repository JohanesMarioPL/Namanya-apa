<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Polling extends Model
{
    use HasFactory;

    protected $table = "polling";
    protected $primaryKey = "polling_id";
    public $incrementing = false;
    public $timestamps = true;

    protected $fillable = [
        'id',
        'poll_name',
        'end_date',
        'prodi_id',
    ];

}
