<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Model;

class Masyarakat extends Authenticatable
{
    use HasFactory;

    protected $table = 'masyarakat';
    // Primary key
    protected $primaryKey = 'nik';
    // fild yang boleh kita isi
    protected $fillable = ['nik', 'nama', 'username', 'password', 'telp'];

    public function pengaduan()
    {
        return $this->hasMany(Pengaduan::class, 'nik', 'nik');
    }
}
