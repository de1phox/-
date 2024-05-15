@extends('layouts.master')

@isset($plant)
    @section('title', 'Редактировать товар ' . $plant->name)
@else
    @section('title', 'Создать товар')
@endisset

@section('content')
    <div class="col-md-12">
        @isset($plant)
            <h1>Редактировать товар <b>{{ $plant->name }}</b></h1>
        @else
            <h1>Добавить товар</h1>
        @endisset

        <form method="POST" enctype="multipart/form-data"
              @isset($plant)
                  action="{{ route('plants.update', $plant) }}"
              @else
                  action="{{ route('plants.store') }}"
            @endisset
        >
            <div>
                @isset($plant)
                    @method('PUT')
                @endisset
                @csrf
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Название: </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="name" id="name" required
                               value="@isset($plant){{ $plant->name }}@endisset">
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="category" class="col-sm-2 col-form-label">Относится к категориям: </label>
                    <div class="col-sm-6">
                        <select  multiple="multiple" name="plant_category[]" id="plant_category" class="form-control">
                            <option value="">-- Выберите подходящие значения --</option>
                            @foreach($plant_categories as $plant_category)
                                <option value="{{$plant_category->id}}"
                                        @isset($plant)
                                            @foreach($plant->categories as $category)
                                                @if($category === $plant_category)
                                                    selected
                                                @endif
                                            @endforeach
                                       @endisset
                                >{{$plant_category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="description" class="col-sm-2 col-form-label">Описание: </label>
                    <div class="col-sm-6">
							<textarea name="description" id="description" required cols="72"
                                      rows="7">@isset($plant){{ $plant->description }}@endisset</textarea>
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Род: </label>
                    <div class="col-sm-6">
                        <select name="genus" id="genus" class="form-control" required>
                            <option value="">-- Выберите одно значение --</option>
                            @foreach($genera as $genus)
                                <option value="{{$genus->name}}"
                                @isset($plant)
                                    @if($plant->genus === $genus->name)
                                        selected
                                    @endif
                                @endisset
                                >{{$genus->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Тип посадочного материала: </label>
                    <div class="col-sm-6">
                        <select name="product_type" id="product_type" class="form-control" required>
                            <option value="">-- Выберите одно значение --</option>
                            @foreach($product_types as $product_type)
                                <option value="{{$product_type->name}}"
                                        @isset($plant)
                                            @if($plant->product_type === $product_type->name)
                                                selected
                                    @endif
                                    @endisset
                                >{{$product_type->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Жизненный цикл: </label>
                    <div class="col-sm-6">
                        <select name="life_cycle" id="life_cycle" class="form-control" required>
                            <option value="">-- Выберите одно значение --</option>
                            @foreach($life_cycles as $life_cycle)
                                <option value="{{$life_cycle->name}}"
                                        @isset($plant)
                                            @if($plant->life_cycle === $life_cycle->name)
                                                selected
                                    @endif
                                    @endisset
                                >{{$life_cycle->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Почва: </label>
                    <div class="col-sm-6">
                        <select name="soil" id="soil" class="form-control" required>
                            <option value="">-- Выберите одно значение --</option>
                            @foreach($soils as $soil)
                                <option value="{{$soil->name}}"
                                        @isset($plant)
                                            @if($plant->soil === $soil->name)
                                                selected
                                    @endif
                                    @endisset
                                >{{$soil->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Место посадки (световой режим): </label>
                    <div class="col-sm-6">
                        <select name="landing_place" id="landing_place" class="form-control" required>
                            <option value="">-- Выберите одно значение --</option>
                            @foreach($light_modes as $light_mode)
                                <option value="{{$light_mode->name}}"
                                        @isset($plant)
                                            @if($plant->landing_place === $light_mode->name)
                                                selected
                                    @endif
                                    @endisset
                                >{{$light_mode->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Номер климатической зоны: </label>
                    <div class="col-sm-6">
                        <select name="climate_zone" id="climate_zone" class="form-control" required>
                            <option value="">-- Выберите одно значение --</option>
                            @foreach($climate_zones as $climate_zone)
                                <option value="{{$climate_zone->zone_number}}"
                                        @isset($plant)
                                            @if($plant->climate_zone === $climate_zone->zone_number)
                                                selected
                                    @endif
                                    @endisset>
                                    {{$climate_zone->zone_number}} (от {{$climate_zone->lower_temp_limit}}
                                    до {{$climate_zone->upper_temp_limit}})</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Диаметр цветка (см): </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="flower_diameter" id="flower_diameter" required
                               value="@isset($plant){{ $plant->flower_diameter }}@endisset">
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Цвет цветка 1: </label>
                    <div class="col-sm-6">
                        <select name="flower_color1" id="flower_color1" class="form-control" required>
                            <option value="">-- Выберите одно значение --</option>
                            @foreach($plant_colors as $plant_color)
                                <option value="{{$plant_color->name}}"
                                        @isset($plant)
                                            @if($plant->flower_color1 === $plant_color->name)
                                                selected
                                    @endif
                                    @endisset
                                >{{$plant_color->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Цвет цветка 2 (необязательно): </label>
                    <div class="col-sm-6">
                        <select name="flower_color2" id="flower_color2" class="form-control">
                            <option value="">-- Выберите одно значение --</option>
                            @foreach($plant_colors as $plant_color)
                                <option value="{{$plant_color->name}}"
                                        @isset($plant)
                                            @if($plant->flower_color2 === $plant_color->name)
                                                selected
                                    @endif
                                    @endisset
                                >{{$plant_color->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Цвет цветка 3 (необязательно): </label>
                    <div class="col-sm-6">
                        <select name="flower_color3" id="flower_color3" class="form-control">
                            <option value="">-- Выберите одно значение --</option>
                            @foreach($plant_colors as $plant_color)
                                <option value="{{$plant_color->name}}"
                                        @isset($plant)
                                            @if($plant->flower_color3 === $plant_color->name)
                                                selected
                                    @endif
                                    @endisset
                                >{{$plant_color->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Цвет листьев: </label>
                    <div class="col-sm-6">
                        <select name="leaf_color1" id="leaf_color1" class="form-control" required>
                            <option value="">-- Выберите одно значение --</option>
                            @foreach($plant_colors as $plant_color)
                                <option value="{{$plant_color->name}}"
                                        @isset($plant)
                                            @if($plant->leaf_color1 === $plant_color->name)
                                                selected
                                    @endif
                                    @endisset
                                >{{$plant_color->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Цвет листьев 2 (необязательно): </label>
                    <div class="col-sm-6">
                        <select name="leaf_color2" id="leaf_color2" class="form-control">
                            <option value="">-- Выберите одно значение --</option>
                            @foreach($plant_colors as $plant_color)
                                <option value="{{$plant_color->name}}"
                                        @isset($plant)
                                            @if($plant->leaf_color2 === $plant_color->name)
                                                selected
                                    @endif
                                    @endisset
                                >{{$plant_color->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Цвет листьев 3 (необязательно): </label>
                    <div class="col-sm-6">
                        <select name="leaf_color3" id="leaf_color3" class="form-control">
                            <option value="">-- Выберите одно значение --</option>
                            @foreach($plant_colors as $plant_color)
                                <option value="{{$plant_color->name}}"
                                        @isset($plant)
                                            @if($plant->leaf_color3 === $plant_color->name)
                                                selected
                                    @endif
                                    @endisset
                                >{{$plant_color->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Количество: </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="quantity" id="quantity" required
                               value="@isset($plant){{ $plant->quantity }}@endisset">
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Цена: </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="price" id="price" required
                               value="@isset($plant){{ $plant->price }}@endisset">
                    </div>
                </div>
                <br>
                    <div class="form-group row">
                        <label for="image" class="col-sm-2 col-form-label">Изображение: </label>
                        <div class="col-sm-6">
                            <input type="file" class="form-control" name="image" id="image">
                        </div>
                    </div>
                <button class="btn btn-success">Сохранить</button>
            </div>
        </form>
    </div>
@endsection
