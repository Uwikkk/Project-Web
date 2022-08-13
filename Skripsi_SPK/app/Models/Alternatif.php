<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alternatif extends Model
{
    use HasFactory;

    protected $table = 'alternatif';
    protected $fillable = [
        'nama_alternatif'
    ];

    public static $rules = [
        'nama_alternatif' => 'required'
    ];

    public function Penilaian()
    {
        return $this->hasMany(Penilaian::class, 'alternatif_id');
    }
}
