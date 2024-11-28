<!DOCTYPE html>
<html lang="en">

<head>
    @include('frontend.includes.head')
</head>

<body>
    @include('frontend.includes.navbar')
    @include('frontend.includes.slider')

    <!-- Page content-->
    <div class="container">
        <div class="row">
            <!-- Blog entries-->
            <div class="col-lg-8">
                @yield('content')
            </div>

            @include('frontend.includes.sidebar')
        </div>
    </div>

    @include('frontend.includes.footer')
</body>

</html>
