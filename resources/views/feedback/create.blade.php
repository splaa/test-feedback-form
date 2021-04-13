@extends('layouts.app')

@section('content')
    <h1>Обратная связь</h1>
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
    <form method="post" action="{{ route('feedback.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <input type="text" class="form-control" name="title" placeholder="Тема сообщения"
                   required maxlength="100" value="{{ old('title') ?? '' }}">
        </div>
        <div class="form-group">
        <textarea class="form-control" name="message" placeholder="Ваше сообщение"
                  required maxlength="500" rows="3">{{ old('message') ?? '' }}</textarea>
        </div>
        <div class="form-group">
            <label for="inputFile">Выберите файл</label>
            <input type="file" class="form-control-file" name="feedbackFile" id="inputFile">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Отправить</button>
        </div>
    </form>
@endsection
