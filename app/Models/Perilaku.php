<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perilaku extends Model
{
    use HasFactory;
    protected $guarded =['id'];

    public function santri(){
        return $this->belongsTo(Santri::class,'id_santri','id');
    }
}
