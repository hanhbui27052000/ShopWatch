<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImportGoods extends Model
{
    protected $table = "import_goods";
    protected $primaryKey = "id";
    protected $guarded = [];
}