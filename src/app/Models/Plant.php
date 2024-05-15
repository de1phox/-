<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plant extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'genus', 'product_type', 'life_cycle', 'soil', 'landing_place', 'climate_zone',
        'flower_diameter', 'flower_color1', 'flower_color2', 'flower_color3', 'leaf_color1', 'leaf_color2', 'leaf_color3',
        'description', 'quantity', 'price', 'image'];

    public function categories() #отношение многие-ко-многим
    {
        return $this->belongsToMany(PlantCategory::class);
    }

    public function orders()
    {
        return $this->belongsToMany(order::class);
    }

    public function getPriceForCount() {
        if (!is_null($this->pivot)) {
            return $this->pivot->plant_count * $this->price;
        }
        return $this->price;
    }

    public function genus()
    {
        return $this->belongsTo(PlantGenus::class);
    }

    public function product_type()
    {
        return $this->belongsTo(ProductType::class);
    }

    public function life_cycle()
    {
        return $this->belongsTo(LifeCycle::class);
    }

    public function soil()
    {
        return $this->belongsTo(Soil::class);
    }

    public function landing_place()
    {
        return $this->belongsTo(LightMode::class);
    }

    public function climate_zone()
    {
        return $this->belongsTo(ClimateZone::class);
    }

    public function flower_color1()
    {
        return $this->belongsTo(PlantColor::class);
    }

    public function flower_color2()
    {
        return $this->belongsTo(PlantColor::class);
    }

    public function flower_color3()
    {
        return $this->belongsTo(PlantColor::class);
    }

    public function leaf_color1()
    {
        return $this->belongsTo(PlantColor::class);
    }

    public function leaf_color2()
    {
        return $this->belongsTo(PlantColor::class);
    }

    public function leaf_color3()
    {
        return $this->belongsTo(PlantColor::class);
    }

}
