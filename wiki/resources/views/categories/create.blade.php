@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="{{ route('cat.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Category</label>
                        <input name="name" type="text" class="form-control" id="name" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="position">Category position</label>
                        <input name="position" type="number" class="form-control" id="position">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    @if ($errors->any())
                        <div class="alert alert-danger mt-2">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </form>
            </div>
        </div>
    </div>

@endsection