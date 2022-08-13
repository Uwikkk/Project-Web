<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainMenu extends Model
{
    use HasFactory;
    //untuk akses table
    protected $table = 'mainmenu';
    //membatasi apa saja yang bisa di create
    protected $fillable = [
        'tittle',
        'parent',
        'category',
        'content',
        'url',
        'file',
        'order',
        'status',
    ];

    public static $rules = [
        'tittle' => 'required',
        'parent' => 'required',
        'category' => 'required',
        'order' => 'required',
        'status' => 'required',
    ];
}
