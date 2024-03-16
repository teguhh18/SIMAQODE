<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Ruangan extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    // protected $fillable = ['gedung_id', 'nama_ruang', 'slug', 'keterangan', 'bisa_pinjam'];

    protected $guarded = ['id'];

    public function ruangan(){
        return $this->hasMany(Barang::class);
    }

    public function gedung() {
        return $this->belongsTo(Gedung::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($ruangan) {
            // Hapus file foto saat ruangan dihapus
            if ($ruangan->foto) {
                Storage::disk('local')->delete($ruangan->foto);
            }
        });
    }

}
