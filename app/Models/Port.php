<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Port extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'status',
        'network_id',
    ];

    public function network()
    {
        return $this->belongsTo(Network::class);
    }
}