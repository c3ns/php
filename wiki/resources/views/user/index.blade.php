@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12 mt-2">
                <div class="accordion" id="accordionExample">
                    <div class="card">
                        @foreach($posts as $post)
                        <div class="card-header" id="headingOne">
                            <h5 class="mb-0">
                                {{ $post->categoryObject->name }}  / {{ $post->title }}
                            </h5>
                            <div class="d-inline-block p-2 float-left">
                                <a data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Show text</a>
                            </div>
                            @auth
                                @can('edit', $post)
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
                                @endcan
                            @endauth
                        </div>
                        <div class="collapse" id="collapseExample">
                            <div class="card card-body">
                                {{ $post->content }}
                            </div>
                        </div>
                        @endforeach
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
