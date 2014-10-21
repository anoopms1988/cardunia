@extends('site.layout.master')

@section('content')
<div class="header-bottom">
    <div class="wrap">
        <div class="main-box">
            <div class="filter-wrapper ">

            </div>

            <div class="gallery-grids">
                @foreach($cars as $cars_key=>$cars_value)
                <div class="gallery-grid specificcar" id="{{$cars_value->id}}">
                    <a class="specificcar" id="{{$cars_value->id}}" href="#"><img src="{{URL::to(trim('/'))}}/frontend/images/cars/{{$cars_value->company()->first()->name}}/{{$cars_value->image}}"  height="250" width="250" alt=""></a>
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
@section('script')
<script type="text/javascript">
$('document').ready(function () {
$('.specificcar').click(function(){
var car_id=this.id;
location.href='{{URL::to(trim('/'))}}/showvariants/'+car_id;
});
});
</script>
@stop