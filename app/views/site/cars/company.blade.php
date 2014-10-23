@extends('site.layout.master')

@section('content')
<div class="main-box">
    <div class="box_wrapper"><h1>New car search</h1></div>
    <div class="section group">
        @foreach($companies as $companies_key=>$companies_value)
        <div class="col_1_of_4 span_1_of_4 companies"  id="{{$companies_value->id}}">
            <img src="{{URL::to(trim('/'))}}/frontend/images/companies/{{{$companies_value->logo or ''}}}"  height="50" width="50" alt=""/>
            <div class="grid_desc">
                <p class="title">{{{$companies_value->name or ''}}}</p>
            </div>
        </div>
        @endforeach

        <div class="clear"></div>
    </div>

</div>
@stop
@section('script')
<script type="text/javascript">
    $('document').ready(function () {
        $('.companies').click(function(){
            var company_id=this.id;
            location.href='{{URL::to(trim('/'))}}/specificcompanycars/'+company_id;
        });
    });
</script>
@stop
