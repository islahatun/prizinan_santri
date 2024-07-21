<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan_pelanggaran extends Model
{
    use HasFactory;

    protected $guarded =['id'];

    public function santri(){
        return $this->belongsTo(Santri::class,'id_santri','id');
    }

    public function pelanggaran(){
       return $this->belongsTo(pelanggaran::class,'id_pelanggaran','id');
    }
}
