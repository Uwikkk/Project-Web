<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    //untuk akses table
    protected $table = 'post';
    //membatasi apa saja yang bisa di create
    protected $fillable = [
        'tittle',
        'is_headline',
        'thumbnail',
        'status',
        'category_id',
        'content'
    ];

    public static $rules = [
        'tittle' => 'required',
        'is_headline' => 'required',
        'thumbnail' => 'required',
        'status' => 'required',
        'category_id' => 'required',
        'content' => 'required',
    ];
}
