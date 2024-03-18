<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $guarded = ['id'];


    public function ruangan() {
        return $this->belongsTo(Ruangan::class);
    }

    public function getRouteKeyName()
    {
    return 'slug';
    }
}
