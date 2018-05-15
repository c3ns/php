@extends('main')
@section('content')

    @foreach($pages as $page)
        <div class="card">
            <div class="card-header">

            </div>
            <div class="card-body">
                <h5 class="card-title">{{$page['title']}}</h5>
                <p class="card-text">{{$page['content']}}</p>
                <small>{{$page['created_at']}}</small>
            </div>
        </div>
    @endforeach

@endsection