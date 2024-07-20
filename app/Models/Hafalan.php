<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hafalan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function santri()
    {
        return $this->belongsTo(Santri::class, 'santri_id', 'id');
    }

    public function ustadz()
    {
        return $this->belongsTo(Ustad::class, 'ustadz_id', 'id');
    }

    public function surat()
    {
        return $this->belongsTo(surah::class, 'surat_id', 'id');
    }
}
