<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;


class Post extends Model
{   
    use HasFactory;
    protected $table = "posts";
    protected $fillable = ["name", "content"];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
