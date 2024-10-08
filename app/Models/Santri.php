<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Santri extends Model
{
    use HasFactory;
    protected $with = ['user'];

    public function perizinan()
    {
        return $this->hasMany(Perizinan::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'orang_tua', 'id');
    }
}
