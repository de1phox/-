<div class="filter-menu">
    <form  method="get" action="{{$route}}">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title hidden-sm">
                    Фильтры
                </div><!-- /.panel-title -->
                <div class="panel-body">
                    <button class="btn btn-default" type="submit">Применить</button>
                    <a class="btn btn-sm btn-link pull-right hidden-sm" href="{{$route}}">Сбросить</a>
                </div><!-- /.panel-body -->
                <div class="panel-body">
                    <label for="search">Поиск</label>
                    <input name="search_field" @if(request()->filled("search_field")) value="{{request()->search_field}}"
                     @endif type="text" class="form-control" id="search" placeholder="Введите род или название">
                </div>
            </div><!-- /.panel-heading -->

            <div class="panel-body">
                <div class="panel-group" id="filter-menu" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingOne">
                            <a class="panel-title accordion-toggle" role="button" data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Жизненный цикл
                            </a><!-- /.panel-title -->
                        </div><!-- /.panel-heading -->
                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body">
                                @foreach($life_cycles as $life_cycle)
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="life_cycle[]" value={{$life_cycle->name}}
                                            @if(request()->filled("life_cycle") && in_array($life_cycle->name, request()->life_cycle))
                                            checked @endif>
                                            {{$life_cycle->name}}
                                        </label>
                                    </div>
                                @endforeach
                            </div><!-- /.panel-body -->
                        </div><!-- /.panel-collapse -->
                    </div><!-- /.panel -->

                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingTwo">
                            <a class="panel-title accordion-toggle collapsed" role="button" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Тип посадочного материала
                            </a><!-- /.panel-title -->
                        </div><!-- /.panel-heading -->
                        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="panel-body">
                                @foreach($product_types as $product_type)
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="product_type[]" value={{$product_type->name}}
                                            @if(request()->filled("product_type") && in_array($product_type->name, request()->product_type))
                                            checked @endif>
                                            {{$product_type->name}}
                                        </label>
                                    </div>
                                @endforeach
                            </div><!-- /.panel-body -->
                        </div><!-- /.panel-collapse -->
                    </div><!-- /.panel -->

                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingThree">
                            <a class="panel-title accordion-toggle collapsed" role="button" data-toggle="collapse" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Световой режим
                            </a><!-- /.panel-title -->
                        </div><!-- /.panel-heading -->
                        <div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">
                            <div class="panel-body">
                                @foreach($light_modes as $light_mode)
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="landing_place[]" value={{$light_mode->name}}
                                            @if(request()->filled("landing_place") && in_array($light_mode->name, request()->landing_place))
                                            checked @endif>
                                            {{$light_mode->name}}
                                        </label>
                                    </div>
                                @endforeach
                            </div><!-- /.panel-body -->
                        </div><!-- /.panel-collapse -->
                    </div><!-- /.panel -->

                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingFour">
                            <a class="panel-title accordion-toggle collapsed" role="button" data-toggle="collapse" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                Почва
                            </a><!-- /.panel-title -->
                        </div><!-- /.panel-heading -->
                        <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                            <div class="panel-body">
                                @foreach($soils as $soil)
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="soil[]" value={{$soil->name}}
                                            @if(request()->filled("soil") && in_array($soil->name, request()->soil))
                                            checked @endif>
                                            {{$soil->name}}
                                        </label>
                                    </div>
                                @endforeach
                            </div><!-- /.panel-body -->
                        </div><!-- /.panel-collapse -->
                    </div><!-- /.panel -->

                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingFive">
                            <a class="panel-title accordion-toggle collapsed" role="button" data-toggle="collapse" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                Климатическая зона
                            </a><!-- /.panel-title -->
                        </div><!-- /.panel-heading -->
                        <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
                            <div class="panel-body">
                                @foreach($climate_zones as $zone)
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="climate_zone[]" value={{$zone->zone_number}}
                                            @if(request()->filled("climate_zone") && in_array($zone->zone_number, request()->climate_zone))
                                            checked @endif>
                                            {{$zone->zone_number}}
                                        </label>
                                    </div>
                                @endforeach
                            </div><!-- /.panel-body -->
                        </div><!-- /.panel-collapse -->
                    </div><!-- /.panel -->
                </div><!-- /.panel-group -->
            </div><!-- /.panel-body -->

        </div><!-- /.panel -->
    </form>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</div><!-- /.filter-menu -->
