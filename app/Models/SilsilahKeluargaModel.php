<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SilsilahKeluargaModel extends Model
{
    use HasFactory;

    protected $table='silsilah_keluarga_budi';  
    protected $fillable=['id','Nama','Jenis_Kelamin'];  
    public $timestamps = false;
    public $incrementing = false;
}