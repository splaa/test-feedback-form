@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Список заявок</h2>
            </div>
            <div class="pull-right mb-3">
                @can('feedback-create')
                    <a class="btn btn-success" href="{{ route('feedback.create') }}"> Create New Feedback</a>
                @endcan
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
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

    @if (!$feedbacks)
        <h2>Пока заявок нет</h2>
    @else


        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#ID</th>
                <th scope="col">Тема</th>
                <th scope="col">Сообщение</th>
                <th scope="col">Имя</th>
                <th scope="col">ссылка</th>
                <th scope="col">Время создания</th>
                <th scope="col">Статус</th>
            </tr>
            </thead>
            <tbody>

            @foreach($feedbacks as $feedback)
                <tr>
                    <th scope="row">{{ $feedback->id }}</th>
                    <td>
                        <a href="{{route('feedback.show', ['feedback'=>$feedback])}}">{{ Str::limit($feedback->title, 10) }}</a>
                    </td>
                    <td>
                        <a href="{{route('feedback.show', ['feedback'=>$feedback])}}">{{ Str::limit($feedback->message, 10) }}</a>
                    </td>
                    <td>{{ $feedback->user->name }}</td>
                    <td><a href="{{Storage::url($feedback->file)}}">открыть</a></td>
                    <td>{{ $feedback->created_at->format('Y-m-d') }}</td>
                    <td>
                        <div class="form-check">
                            <input class="status-checkbox" type="checkbox" value="" id="checkboxStatusFeedback"
                                   @if($feedback->status === \App\Models\Feedback::STATUS_VIEWED)
                                   checked @endif>
                            <label class="form-check-label" for="flexCheckChecked">
                                @if($feedback->status === \App\Models\Feedback::STATUS_VIEWED)
                                    Просмотрено
                                @else
                                    Не просмотрено
                                @endif
                            </label>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif()
    <script>
        $(document).on("click", ".form-check", function () {
                let status = ''
            if ($('#checkboxStatusFeedback').is(':checked')) {
                console.log('Просмотрен');
                status = "viewed"
            } else {
                status = "unseen"

            }
            $.ajax ({
                url: '/feedback/status/1',
                type: 'PUT',
                data: {"status": status, "_token": '{{ csrf_token() }}'},
                success: function(data)
                {
                    if(data.status=='viewed') {
                       console.log('Status: Просмотрен');
                    } else if(data.status=='unseen') {
                        console.log('Status: не Просмотрен');
                    }
                },
                error: function(error)
                {
                    console.log("Failed", "Fail to update status try again", "error");
                }
            });
        });
    </script>
@endsection

