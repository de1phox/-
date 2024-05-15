<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlantCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    public function plants() #отношение многие-ко-многим
    {
        return $this->belongsToMany(Plant::class);
    }

}
