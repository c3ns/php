@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col" width="60px">#</th>
                        <th scope="col" width="80%">Title</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($posts as $key => $post)
                        <tr>
                            <th scope="row">{{ $key+1 }}</th>
                            <td>{{ $post->title }}</td>
                            @auth
                                <td>
                                    <a class="btn btn-primary btn-sm" href="{{ route('posts.edit', ['id' => $post->id]) }}">edit</a></li>
                                </td>
                                <td>
                                    <form action="{{ route('posts.destroy', ['id' => $post->id]) }}" method="post">
                                        @csrf
                                        <input type="hidden" name="_method" value="delete">
                                        <button type="submit" class="btn btn-danger btn-sm">| X |</button>
                                    </form>
                                </td>
                            @endauth
                        </tr>
                    @empty
                        <th scope="row">0</th>
                        <td>There is no Posts</td>
                    @endforelse

                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection