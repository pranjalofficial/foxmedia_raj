<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $fillable = [
        'client_id', 'due_payments', 'done_payments',
    ];
}
