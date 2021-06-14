<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Description_Product extends Model
{
    protected $table = "descriptions";
    protected $primaryKey = "id";
    protected $guarded = [];
}