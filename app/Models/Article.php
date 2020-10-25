<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Article extends Model
{
    function getCategory() {
        return $this->hasOne('App\Models\Category', 'id', 'category_id');
    }

    use SoftDeletes;
    use HasFactory;
}
