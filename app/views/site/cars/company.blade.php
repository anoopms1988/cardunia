@extends('site.layout.master')

@section('content')
<div class="main-box">
    <div class="box_wrapper"><h1>New car search</h1></div>
    <div class="section group">
        @foreach($companies as $companies_key=>$companies_value)
        <div class="col_1_of_4 span_1_of_4">
            <img src="{{URL::to(trim('/'))}}/frontend/images/companies/{{{$companies_value->logo or ''}}}"  height="50" width="50" alt=""/>
            <div class="grid_desc">
                <p class="title">{{{$companies_value->name or ''}}}</p>

               <!-- <div class="price1" style="height: 19px;">
                    <span class="reducedfrom">$66.00</span>
                    <span class="actual">$12.00</span>
                </div>-->
            </div>
           <!-- <div class="Details">
                <a href="single.html" title="Lorem ipsum dolor sit amet, consect etuer" class="button">Details<span></span></a>
            </div-->
        </div>
        @endforeach

        <div class="clear"></div>
    </div>

</div>
@stop

