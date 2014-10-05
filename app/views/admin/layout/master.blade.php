@include('admin.includes.header')
@include('admin.includes.lhs')
 <div id="page-wrapper">
       @yield('content')
 </div>
@include('admin.includes.footer')

@yield('script')