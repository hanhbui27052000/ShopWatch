<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_Import extends Model
{
    protected $table = "product_import";
    protected $primaryKey = "id";
    protected $guarded = [];
}