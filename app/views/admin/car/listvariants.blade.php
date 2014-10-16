
@if(isset($specificVariants))
<option value=''>Select</option>
@foreach($specificVariants as $specificVariants_key=>$specificVariants_value)
<option value='{{{$specificVariants_value->id or ''}}}'>{{{$specificVariants_value->name or ''}}}</option>
@endforeach
@endif