@extends('site.layout.master')

@section('content')
<div class="header-bottom">
    <div class="wrap">
        <div class="main-box">
            <div class="filter-wrapper ">

            </div>

            <div class="gallery-grids">
                @foreach($specificVariants as $specificVariants_key=>$specificVariants_value)
                <div class="gallery-grid specificvariant" id="{{$specificVariants_value->id }}">
                    <a href="images/t-pic21.jpg"><img src="{{URL::to(trim('/'))}}"  height="250" width="250" alt=""></a>
                    <h4>{{{$specificVariants_value->name or ''}}}</h4>
                    <p></p>
                    <p><a href="#" class="btn btn-primary">Variant details</a></p>
                </div>
                @endforeach
                <div class="clear"> </div>
            </div>

        </div>
    </div>
</div>
@stop
@section('script')
<script>
$('document').ready(function () {
$('.specificvariant').click(function(){
var variant_id=this.id;
location.href='{{URL::to(trim('/'))}}/variantdetails/'+variant_id;
});
});
</script>
@stop



