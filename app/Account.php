<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    public function bills()
    {
        return $this->hasMany('App/Bill');
    }
}
