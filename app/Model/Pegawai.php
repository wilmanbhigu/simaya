<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Model\Instansi;

class Pegawai extends Model
{
    use SoftDeletes;

    protected $table= 'pegawai';
    protected $dates = ['deleted_at'];

    
    public function instansi() 
    {
        return $this->hasOne(Instansi::class, 'id', 'instansi_id');
    }
}
