<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image_Product extends Model
{
    protected $table = "images";
    protected $primaryKey = "id";
    protected $guarded = [];
}