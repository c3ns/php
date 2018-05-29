@extends('layouts.app')
@section('content')

    <div class="containter">
        <div class="row justify-content-center">
            <div class="col-sm-12">
                <form action="{{ route('posts.update', ['id' => $post->id]) }}" method="POST">
                    @csrf
                    <input type="hidden" name="_method" value="put">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input value="{{ $post->title }}" type="text" class="form-control" id="title" name="title">
                    </div>
                    <div class="form-group">
                        <label for="category">Select category</label>
                        <select class="form-control" id="category" name="category[]" multiple>
                            @foreach($categories as $cat)
                                @foreach($post->cat as $post_cat)
                                    @php $bool = false @endphp
                                    @if($post_cat->id == $cat->id)
                                        @php $bool = true @endphp
                                        @break
                                    @endif
                                @endforeach
                                <option value="{{ $cat->id }}" @if($bool) selected @endif>{{ $cat->name }}</option>
                            @endforeach
                        </select>


                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Content</label>
                        <textarea class="form-control" id="content" name="content" rows="3">{{ $post->content }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Save</button>
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