@extends('admin.layout.master')
<button data-toggle="modal" data-target="#variantModal" class="btn btn-primary btn-lg pull-right"> Add New Variant
</button>

@section('content')
<button data-toggle="modal" data-target="#variantModal" class="btn btn-primary btn-lg "> Add New Variant</button>

<div class="panel-body">
    <div class="table-responsive">
        @if($variantDetails->count()>0)
        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
            <tr>
                <th>Variant</th>
                <th>Fueltype</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($variantDetails as $lp_key_variantDetails =>$lp_value_variantDetails)
            <tr class=" odd gradeX">
                <td class="variantdetails" id="variant_{{$lp_value_variantDetails->id}}">
                    {{{$lp_value_variantDetails->name or ''}}}
                </td>
                <td class="variantdetails" id="variant_{{$lp_value_variantDetails->id}}">
                    {{{$lp_value_variantDetails->type or ''}}}
                </td>
                <td>
                    <button class="deletevariant btn btn-danger" id="deletevariantid_{{$lp_value_variantDetails->id}}"
                            type="button">Delete
                    </button>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        @else
        <div class="alert alert-danger">
            No variants exist for the current car
        </div>
        @endif
    </div>
</div>
<div class="modal fade" id="variantModal" tabindex="-1" role="dialog" aria-labelledby="variantModal" aria-hidden="true">
    {{Form::open(array( 'method' => 'post','name'=>'add_variant_form','id'=>'add_variant_form'))}}
    <input type="hidden" name="carId" value="{{$carId}}">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Add New Variant</h4>
            </div>
            <div class="alert-info" id="duplicate_variant" style="display:none;">Same variant already exists</div>

            <div class="modal-body">
                <div class="form-group">
                    <label>Variant</label>
                    <input type="text" name="variant" id="variant" class="form-control" placeholder="Enter text">
                    <?php echo $errors->first('variant'); ?>
                </div>
                <div class="form-group">
                    <label>Fueltype</label>
                    <select class="form-control" name="fueltype" id="fueltype">
                        <option value=''>Select</option>
                        <option value="petrol">Petrol</option>
                        <option value="diesel">Diesel</option>
                    </select>
                    <?php echo $errors->first('fueltype'); ?>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                {{--
                <button type="button" class="btn btn-primary">Save changes</button>
                --}}
                <input type="submit" name="variantsubmit" class="btn btn-primary" value="Save">
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    {{Form::close()}}
    <!-- /.modal-dialog -->
</div>

@stop

@section('script')
<script type="text/javascript">
    $("#add_variant_form").validate({
        errorClass: "error",
        errorElement: "div",
        rules: {
            variant: {
                required: true
            },
            fueltype: {
                required: true
            }
        },
        messages: {
            variant: {
                required: "Variant required "
            },
            fueltype: {
                required: "Fuel required "
            }
        },
        //perform an AJAX post to ajax.php
        submitHandler: function () {
            $.ajax({
                url: '{{URL::to(' / ')}}/admin/addvariant',
                type: 'POST',
                data: $("#add_variant_form").serialize(),
                success: function (response) {

                    if (response.msg == 'success') {
                        setTimeout(function () {
                            location.reload(true)
                        }, 3000);
                    } else if (response.msg == 'duplicate') {
                        $("#duplicate_variant").show();
                    }
                },
                error: function () {
                    //alert("error");
                }
            });

        },
        highlight: function (element, errorClass) {
            $(element).removeClass(errorClass);
        }
    });
</script>
@stop