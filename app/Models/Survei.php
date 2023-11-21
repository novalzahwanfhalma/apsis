<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survei extends Model
{
    use HasFactory;

    protected $table = 'survei';
    protected $primaryKey = 'id_survei';


    protected $fllable = array(
        'id_survei', 'id_klien', 'id_admin', 'judul', 'deskripsi', 'tgl_mulai', 'tgl_selesai', 'jumlah_responden', 'bukti', 'poin', 'nominal', 'status_survei', 'status_bayar',
    );

    public function klien(){
        return $this->belongsTo(Klien::class, 'id_klien');
    }

    public function admin(){
        return $this->belongsTo(Admin::class, 'id_admin');
    }

    public function pertanyaan()
    {
    return $this->hasMany(Pertanyaan::class, 'id_survei'); 
    }
}
