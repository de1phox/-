@extends('layouts.master')

@section('title', 'Товар ' . $plant->name)

@section('content')
    <div class="col-md-12">
        <h1>Товар {{$plant->name}}</h1>
        <table class="table">
            <tbody>
            <tr>
                <th>
                    Поле
                </th>
                <th>
                    Значение
                </th>
            </tr>
            <tr>
                <td>ID</td>
                <td>{{ $plant->id }}</td>
            </tr>
            <tr>
                <td>Название</td>
                <td>{{ $plant->name }}</td>
            </tr>
            <tr>
                <td>Описание</td>
                <td>{{ $plant->description }}</td>
            </tr>
            <tr>
                <td>Род</td>
                <td>{{ $plant->genus }}</td>
            </tr>
            <tr>
                <td>Вид посадочного материала</td>
                <td>{{ $plant->product_type }}</td>
            </tr>
            <tr>
                <td>Жизненный цикл</td>
                <td>{{ $plant->life_cycle }}</td>
            </tr>
            <tr>
                <td>Почва</td>
                <td>{{ $plant->soil }}</td>
            </tr>
            <tr>
                <td>Место посадки</td>
                <td>{{ $plant->landing_place }}</td>
            </tr>
            <tr>
                <td>Климатическая зона</td>
                <td>{{ $zone = $plant->climate_zone }} (от {{\App\Models\ClimateZone::where('zone_number', $zone)->first()->lower_temp_limit}}
                    до {{\App\Models\ClimateZone::where('zone_number', $zone)->first()->upper_temp_limit}})</td>
            </tr>
            <tr>
                <td>Диаметр цветка (см)</td>
                <td>{{ $plant->flower_diameter }}</td>
            </tr>
            <tr>
                <td>Цвет цветка</td>
                <td>
                    <p>{{ $plant->flower_color1 }}</p>
                    @isset($plant->flower_color2)<p>{{($plant->flower_color2)}}</p>@endisset
                    @isset($plant->flower_color3)<p>{{($plant->flower_color3)}}</p>@endisset
                </td>
            </tr>
            <tr>
                <td>Принадлежит к категориям:</td>
                <td>
                    @foreach($plant->categories as $category)
                        <p>{{ $category->name}}</p>
                    @endforeach
                </td>
            </tr>
            <tr>
                <td>Цвет листьев</td>
                <td>
                    <p>{{ $plant->leaf_color1 }}</p>
                    @isset($plant->leaf_color2)<p>{{($plant->leaf_color2)}}</p>@endisset
                    @isset($plant->leaf_color3)<p>{{($plant->leaf_color3)}}</p>@endisset
                </td>
            </tr>
            <tr>
                <td>Количество</td>
                <td>{{ $plant->quantity }}</td>
            </tr>
            <tr>
                <td>Цена</td>
                <td>{{ $plant->price }}</td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
