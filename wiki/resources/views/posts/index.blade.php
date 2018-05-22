@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12">
                @forelse($posts as $post)
                    <div class="card mt-2">
                        <div class="card-header">
                            {{ $post->title }}
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
                        <div class="card-body">
                            <p class="card-text">{{ str_limit($post->content, 300) }}</p>
                                <footer class="blockquote-footer"><cite title="Source Title">{{ $post->created_at }}</cite></footer>
                            <a href="{{ route('posts.show', ['id' => $post->id])}}" class="btn btn-primary btn-sm mt-3">read more...</a>
                        </div>
                    </div>
                @empty
                    <p>Posts not found...</p>
                @endforelse
                    <br>
                    {{ $posts->links() }}
            </div>
        </div>
    </div>
@endsection
