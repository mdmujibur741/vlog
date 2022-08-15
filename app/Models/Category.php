<?php

namespace App\Models;

use App\Models\post;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded = ['created_at','deleted_at','updated_at'];

    public function post()
    {
        return $this->hasOne(post::class);
    }
}
