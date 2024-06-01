@extends('layouts.master')

@section('title', 'Категории')

@section('content')
    <div class="col-md-12">
        <h1>Категории</h1>
        <table class="table">
            <tbody>
            <tr>
                <th>
                    ID
                </th>
                <th>
                    Название
                </th>
                <th>
                    Описание
                </th>
            </tr>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->description }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <form action="{{ route('categories.destroy', $category) }}" method="POST">
                                <a class="btn btn-success" type="button" href="{{ route('categories.show', $category) }}">Открыть</a><br>
                                <a class="btn btn-warning" type="button" href="{{ route('categories.edit', $category) }}">Изменить</a><br>
                                @csrf
                                @method('DELETE')
                                <input class="btn btn-danger" type="submit" value="Удалить"></form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
		{{$categories->links('pagination::bootstrap-4')}}
        <a class="btn btn-success" type="button"
           href="{{ route('categories.create') }}">Добавить категорию</a>
    </div>
@endsection
