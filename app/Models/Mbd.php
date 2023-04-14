<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mbd extends Model
{
    use HasFactory;
    public $table = 'users_pplk';
    protected $fillable = [
        'nama',
        'nim',
        'instagram',
        'prodi',
        'nomorHp',
        'golonganDarah',
        'riwayatPenyakit',
        'fotoProfil',
        'qrCode',
    ];
    protected $hidden = [
        'email',
        'password',
        'roles_id'
    ];
}
