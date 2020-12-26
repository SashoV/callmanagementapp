<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Call extends Model
{
    protected $fillable = ['user', 'client', 'client_type', 'date', 'duration', 'type_of_call', 'external_call_score'];
}
