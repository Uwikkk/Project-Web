<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    use HasFactory;
    protected $table = 'kriteria';
    protected $fillable = [
        'nama_kriteria',
        'attribut',
        'bobot'
    ];
    public static $rules = [
        'nama_kriteria' => 'required',
        'attribut'      => 'required',
        'bobot'         => 'required'
    ];

    public function Sub_Kriteria()
    {
        return $this->hasMany(Sub_Kriteria::class, 'kriteria_id');
    }
}
