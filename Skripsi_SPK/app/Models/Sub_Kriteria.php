<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sub_Kriteria extends Model
{
    use HasFactory;

    protected $table = 'sub_kriteria';
    protected $fillable = [
        'pupuk_id',
        'kriteria_id',
        'nama_sub',
        'bobot_sub'
    ];
    public static $rules = [
        'pupuk_id' => 'required',
        'kriteria_id' => 'required',
        'nama_sub' => 'required',
        'bobot_sub' => 'required'
    ];

    public function Kriteria()
    {
        return $this->hasMany(Kriteria::class, 'id', 'nama_kriteria');
    }

    public function Pupuk()
    {
        return $this->belongsTo(Pupuk::class, 'pupuk_id');
    }
}
