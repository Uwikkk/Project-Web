<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    //untuk akses table
    protected $table = 'categories';
    //membatasi apa saja yang bisa di create
    protected $fillable = [
        'name',
        'image',
    ];

    public static $rules = [
        'name' => 'required',
        'image' => 'required'
    ];
}
