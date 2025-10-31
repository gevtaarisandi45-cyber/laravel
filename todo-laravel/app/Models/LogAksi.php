<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogAksi extends Model
{
    use HasFactory;

    public $timestamps = false; // kita menggunakan kolom 'waktu' manual
    protected $table = 'log_aksi';
    protected $fillable = ['tugas_id','aksi','waktu'];

    public function tugas()
    {
        return $this->belongsTo(Tugas::class, 'tugas_id');
    }
}
