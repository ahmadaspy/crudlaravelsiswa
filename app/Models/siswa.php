<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class siswa extends Model
{
    use HasFactory;
    protected $table = 'siswa';
    protected $fillable = ['nama_depan', 'nama_belakang', 'email', 'gender', 'alamat', 'user_id', 'gambar'];
    public function getGambar(){
        if(!$this->gambar){
            return asset('img/default.jpg');
        }
        return asset('img/'.$this->gambar);
    }
    public function mapel(){
        return $this->belongsToMany(mapel::class)->withPivot('nilai');
    }
}
