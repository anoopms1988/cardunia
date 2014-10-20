@include('site.includes.header')

<div class="main-content">
    <div class="wrap">
        <div class="main-box">
    @yield('content')
            </div>
        </div>
</div>
@include('site.includes.footer')

@yield('script')