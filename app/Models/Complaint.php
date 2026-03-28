<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Complaint extends Model
{
    protected $fillable = [
        'title',
        'type',
        'description',
        'attachment',
        'user_id',
        'status',
        'admin_note',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}