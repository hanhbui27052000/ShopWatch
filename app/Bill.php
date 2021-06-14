<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table = "bills";
    protected $primaryKey = "id";
    protected $guarded = [];
}