<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    protected $fillable = [
        'client_id', 'client_name', 'agency_id', 'agency_name',
        'strategy', 'cost', 'status'
    ];
}
