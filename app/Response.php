<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    protected $fillable = [
        'client_id', 'agency_id', 'strategy_id',
        'strategy', 'response', 'status',
    ];
}
