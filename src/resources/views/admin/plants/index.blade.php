@extends('layouts.master')

@section('title', 'Товары')

@section('content')
    <div class="col-md-12">
        <h1>Товары</h1>
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
                <th>
                    Количество
                </th>
                <th>
                    Цена
                </th>
            </tr>
            @foreach($plants as $plant)
                <tr>
                    <td>{{ $plant->id }}</td>
                    <td>{{ $plant->name }}</td>
                    <td>{{ $plant->description }}</td>
                    <td>{{ $plant->quantity }}</td>
                    <td>{{ $plant->price }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <form action="{{ route('plants.destroy', $plant) }}" method="POST">
                                <a class="btn btn-success" type="button" href="{{ route('plants.show', $plant) }}">Открыть</a><br>
                                <a class="btn btn-warning" type="button" href="{{ route('plants.edit', $plant) }}">Изменить</a><br>
                                @csrf
                                @method('DELETE')
                                <input class="btn btn-danger" type="submit" value="Удалить"></form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
		{{$plants->links('pagination::bootstrap-4')}}
        <a class="btn btn-success" type="button"
           href="{{ route('plants.create') }}">Добавить товар</a>
    </div>
@endsection
