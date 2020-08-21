<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Strategy extends Model
{
    protected $fillable = [
        'name', 'client_id','company_name', 'company_website',
        'description', 'budget', 'status'
    ];
}
