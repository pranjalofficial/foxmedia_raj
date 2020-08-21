<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = [
        'client_id', 'client_name', 'agency_id', 'agency_name', 'campaign_id', 
        'followers_at_start', 'followers_at_end',
        'followers_now', 'followers_before'
    ];
}
