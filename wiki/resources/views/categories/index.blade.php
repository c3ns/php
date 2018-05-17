@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Categories</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($categories as $cat)
                        <tr>
                            <th scope="row">{{ $cat->position }}</th>
                            <td>{{ $cat->name }}</td>
                        </tr>
                        @empty
                            <th scope="row">0</th>
                            <td>There is no categories</td>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection