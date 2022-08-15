<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\tag;

class post extends Model
{
    use HasFactory;
    protected $guarded = ['created_at','deleted_at','updated_at'];
    protected $dates = [
         'published_at',
    ];

    public function category()
    {
         return $this->belongsTo(Category::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->belongsToMany(tag::class);
    }
}
