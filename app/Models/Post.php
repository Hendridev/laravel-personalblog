<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    // deklarasi table
    protected $table = 'posts';
    // deklarasi column pada input
    protected $fillable = ['title','thumbnail','slug','body','category_id'];

    // mengurangi perulangan query
    protected $with = ['tags', 'category'];

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

    public function author(){
        return $this->belongsTo(User::class);
    }
}
