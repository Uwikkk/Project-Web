<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    use HasFactory;
    protected $table = 'penilaian';
    protected $fillable = [
        'pupuk_id',
        'alternatif_id',
        'sub_kriteria_id'
    ];

    public static $rules = [
        'pupuk_id' => 'required',
        'alternatif_id' => 'required',
        'sub_kriteria_id' => 'required'
    ];

    public function Sub_Kriteria()
    {
        return $this->belongsTo(Sub_Kriteria::class, 'sub_kriteria_id');
    }

    public function Alternatif()
    {
        return $this->belongsTo(Alternatif::class, 'alternatif_id');
    }
    public function Pupuk()
    {
        return $this->belongsTo(Pupuk::class, 'pupuk_id');
    }
}
