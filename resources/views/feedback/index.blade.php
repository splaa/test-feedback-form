@extends('layouts.app')

@section('content')
    <h1>Список заявок</h1>
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#ID</th>
            <th scope="col">Тема</th>
            <th scope="col">Сообщение</th>
            <th scope="col">Имя Клиента</th>
            <th scope="col">ссылка на файл</th>
            <th scope="col">Время создания</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
            <td><a href="#">открыть</a></td>
            <td>12-08-2021</td>
        </tr>
        <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
            <td><a href="#">открыть</a></td>
            <td>12-08-2021</td>
        </tr>
        <tr>
            <th scope="row">3</th>
            <td>Larry</td>
            <td>the Bird</td>
            <td>@twitter</td>
            <td><a href="#">открыть</a></td>
            <td>12-08-2021</td>
        </tr>
        </tbody>
    </table>

@endsection
