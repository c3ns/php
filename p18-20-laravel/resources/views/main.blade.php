<!doctype html>
<html lang="en">
@include('includes/head')
<body>
@include('components/header')

<div class="container">
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            @yield('content')
        </div>
        <div class="col-sm-3">

        </div>
    </div>




</div>
@include('includes/footer')
</body>
</html>