<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Storage; 

class Pelanggan extends Model
{
    use HasFactory;

    protected $table = 'pelanggan';
    protected $fillable = [
        'nama_lengkap',
        'jenis_kelamin',
        'nomor_hp',
        'alamat',
        'email',
        'foto_pelanggan'
    ];

    public function getFotoPelangganAttribute()
    {
        $foto_produk = $this->attributes['foto_pelanggan'];
        if (empty($foto_pelanggan)) return 'https://via.placeholder.com/100?text=Pelanggan';
            else return Storage::url('pelanggan/' . $foto_pelanggan);
    }
}
