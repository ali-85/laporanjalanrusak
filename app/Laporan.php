<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    protected $fillable = ['user_id','nama','nohp','alamat','kecamatan','desa','image','status','note'];
}
