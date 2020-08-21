<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'client_id', 'agency_id', 'path', 'status',
        'client_name', 'agency_name', 'scheduled_at'
    ];
}
