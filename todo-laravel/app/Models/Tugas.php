<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    use HasFactory;

    protected $table = 'tugas';

    protected $fillable = ['nama','tugas','deadline','status'];

    protected $dates = ['deadline'];

    public function logs()
    {
        return $this->hasMany(LogAksi::class, 'tugas_id');
    }
}
