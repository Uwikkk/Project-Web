<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pupuk extends Model
{
    use HasFactory;
    protected $table = 'pupuk';
    protected $fillable = [
        'nama_pupuk'
    ];
    public static $rules = [
        'nama_pupuk' => 'required'
    ];

    public function Penilaian()
    {
        return $this->hasMany(Penilaian::class, 'pupuk_id');
    }
    public function Sub_Kriteria()
    {
        return $this->hasMany(Sub_Kriteria::class, 'pupuk_id');
    }
}
