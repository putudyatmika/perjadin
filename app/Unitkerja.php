<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unitkerja extends Model
{
    //
    public $timestamps = false;
    protected $table = "unitkerja";
    protected $fillable = ["kode", "nama", "parent","jenis","eselon"];
    public function MatrikDanaUnitkerja()
    {
        return $this->hasMany('App\MatrikPerjalanan', 'dana_unitkerja', 'kode');
    }
    public function MatrikUnitPelaksana()
    {
        return $this->hasMany('App\MatrikPerjalanan', 'unit_pelaksana', 'kode');
    }
}
