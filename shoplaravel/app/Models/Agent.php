<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    protected $table = 'agent';

    protected $fillable = [
        'name',
        'email',
        'address',
        'phone',
        'bank_code',
        'branch_code',
        'normal',
        'account_no',
        'curator',
        'line_url',
        'margin_rate'
    ];
}
