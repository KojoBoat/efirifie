<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['date', 'status', 'del_date', 'price','email','first-name','last-name','zip','address','del'];

    public $timestamps = false;
}
