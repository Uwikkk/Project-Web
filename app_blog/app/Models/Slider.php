<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;
    //untuk akses table
    protected $table = 'slider';
    //membatasi apa saja yang bisa di create
    protected $fillable = [
        'tittle',
        'image',
        'url',
        'order',
        'category_id',
        'status',
    ];

    public static $rules = [
        'tittle' => 'required',
        'image' => 'required',
        'url' => 'required',
        'category_id' => 'required',
        'order' => 'required',
        'status' => 'required',
    ];
}
