<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyExport extends Model
{
  

    protected $fillable = [
        'nama_perusahaan',
        'produk',
        'wilayah_ecp',
        'tahun',
        'event_id'
    ];

    public function company()
    {
        return $this->belongsTo(Event::class, 'event_id', 'id');
    }


}
