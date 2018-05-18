@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        {{ $post->title }}
                        @auth
                            <div class="d-inline-block p-2 float-right">
                                <form action="{{ route('posts.destroy', ['id' => $post->id]) }}" method="post">
                                    @csrf
                                    <input type="hidden" name="_method" value="delete">
                                    <button type="submit" class="btn btn-danger btn-sm">| X |</button>
                                </form>
                            </div>
                            <div class="d-inline-block p-2 float-right">
                                <a class="btn btn-primary btn-sm" href="{{ route('posts.edit', ['id' => $post->id]) }}">edit</a></li>
                            </div>
                        @endauth
                    </div>
                    <div class="card-body">
                        <p class="card-text">{{ $post->content }}</p>
                        <footer class="blockquote-footer"><cite title="Source Title">{{ $post->created_at }}</cite></footer>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection