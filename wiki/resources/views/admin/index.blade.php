@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12">
                <table class="table">
                    <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Users</td>
                        <td>{{ $users }}</td>

                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Posts</td>
                        <td>{{ $posts }}</td>

                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Categories</td>
                        <td>{{ $categories }}</td>

                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection