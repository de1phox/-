<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class PlantFilter extends QueryFilter
{
    public const LIFE_CYCLE = 'life_cycle';
    public const CLIMATE_ZONE = 'climate_zone';
    public const LANDING_PLACE = 'landing_place';
    public const SOIL = 'soil';
    public const PRODUCT_TYPE = 'product_type';

    public const SEARCH_FIELD = 'search_field';


    protected function getCallbacks(): array
    {
        return [
            self::LIFE_CYCLE => [$this, 'life_cycle'],
            self::CLIMATE_ZONE => [$this, 'climate_zone'],
            self::LANDING_PLACE => [$this, 'landing_place'],
            self::SOIL => [$this, 'soil'],
            self::PRODUCT_TYPE => [$this, 'product_type'],
            self::SEARCH_FIELD => [$this, 'search_field'],
        ];
    }

    public function climate_zone(Builder $builder, $value)
    {
        $builder->whereIn('climate_zone', $value);
    }

    public function landing_place(Builder $builder, $value)
    {
        $builder->whereIn('landing_place', $value);
    }

    public function life_cycle(Builder $builder, $value)
    {
        $builder->whereIn('life_cycle', $value);
    }

    public function soil(Builder $builder, $value)
    {
        $builder->whereIn('soil', $value);
    }

    public function product_type(Builder $builder, $value)
    {
        $builder->whereIn('product_type', $value);
    }

    public function search_field(Builder $builder, $value)
    {
        $builder->where('name','LIKE', '%'.$value.'%')
        ->orWhere('genus','LIKE', '%'.$value.'%');
    }
}
