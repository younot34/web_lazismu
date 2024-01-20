<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class permintaanAmbulan extends Model
{
    use HasFactory;
    protected $table = 'permintaan_ambulans';
    protected $guarded =['id'];

    public function rumahsakit(){
        return $this->belongsTo(RumahSakit::class,'rumahsakit_id');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function status(){
        return $this->belongsTo(Status::class);
    }
}