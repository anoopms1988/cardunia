@extends('site.layout.master')

@section('content')
<div class="header-bottom">
    <div class="wrap">
        <div class="main-box">
            <div class="filter-wrapper ">
                <!--<div class="category">
                    <strong>Categories: </strong>
                    <ul id="filters" class="filter nav nav-pills">
                        <li class="active"><a href="#" data-count="13" data-filter="">Show All</a></li>
                        <li><a href="#" data-count="4" data-filter=".services-category-1">Services category 1</a></li><li><a href="#" data-count="8" data-filter=".services-category-2">Services category 2</a></li><li><a href="#" data-count="5" data-filter=".services-category-3">Services category 3</a></li>					</ul>
                    <div class="clear"></div>
                </div>-->
            </div>

            <div class="gallery-grids">
                @foreach($cars as $cars_key=>$cars_value)
                <div class="gallery-grid">
                    <a href="images/t-pic21.jpg"><img src="{{URL::to(trim('/'))}}/frontend/images/cars/{{$cars_value->company()->first()->name}}/{{$cars_value->image}}"  height="250" width="250" alt=""></a>
                    <h4>{{{$cars_value->name or ''}}}</h4>
                    <p>{{str_limit($cars_value->description, $limit = 150, $end = '...')}}</p>
                    <p><a href="#" class="btn btn-primary">Find variants</a></p>
                </div>
                @endforeach
                <div class="clear"> </div>
            </div>

        </div>
    </div>
</div>
@stop