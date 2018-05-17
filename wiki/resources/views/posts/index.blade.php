@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @forelse($posts as $post)
                    <div class="card">
                        <div class="card-header">
                            {{ $post->title }}
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
