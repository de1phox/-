@extends('layouts.master')

@section('title', 'Категория ' . $category->name)

@section('content')
    <h1>
        {{$category->name}}
    </h1>
    <p>
        {{ $category->description }}
    </p>
    <div class="form-group row">
        <div class="col-xs-3">
            @include('layouts.filters', ['route' => route('category', $category->id)]);
        </div>
        <div class="col-xs-9">
            @foreach($products as $product)
                @include('layouts.card', compact('product'))
            @endforeach
        </div>
        {{$products->withQueryString()->links(('pagination::bootstrap-4'))}}
    </div>
@endsection
