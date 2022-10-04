<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $fillable = ['province_id', 'nama' , 'npsn', 'alamat', 'desa_kel', 'kecamatan', 'kota_kab', 'provinsi', 'status', 'bentuk'];

    public function province()
    {
        return $this->belongsTo(Province::class);
    }
}
