<!doctype html>
<html lang="en">
@include('includes.head')
<body>
@include('components.header')

<div class="container">
    <div class="row">
        <div class="col-sm-3">
            <div class="alert alert-primary">Categories:</div>
            <ul class="list-group">
                @foreach($all_categories as $key => $cat)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <a href={{ route('by_categorie', $cat['id']) }}><small>{{$cat['name']}}</small></a>
                        <span class="badge badge-primary badge-pill">{{$cat_count[$key]}}</span>

                    </li>
                @endforeach
            </ul>
        </div>

        <div class="col-sm-6">
            @yield('content')
        </div>
        <div class="col-sm-3">
            @section('sidebar')
                <div class="alert alert-primary">All Pages: {{$pages_count}}</div>
                <div class="alert alert-primary">Latest Page: </div>

                <div class="alert alert-success" role="alert">
                    <p >Well done!</p>
                    <small>{{$latest_page['title']}}</small>
                    <hr>
                    <small class="mb-0">{{$latest_page['content']}}</small>
                </div>
            @show


        </div>
    </div>




</div>
@include('includes/footer')
</body>
</html>