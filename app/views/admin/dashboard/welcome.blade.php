@extends('admin.layout.master')

@section('content')
<div class="panel-body">
    <div class="table-responsive">
        <h4>List all cars</h4>
        <button class="btn btn-primary btn-lg pull-right" data-target="#myModal" data-toggle="modal"> Add New Car
        </button>
        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
            <tr>
                <th>Car</th>
                <th>Company</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($carDetails as $lp_key_carDetails=>$lp_value_carDetails)
            <tr>
                <td class="showvariant odd gradeX" id="variantdetails1_{{$lp_value_carDetails->id}}">
                    {{{$lp_value_carDetails->name or ''}}}
                </td>
                <td class="showvariant odd gradeX" id="variantdetails2_{{$lp_value_carDetails->id}}">
                    {{{$lp_value_carDetails->company()->first()->name or ''}}}
                </td>
                <td>
                    <button class="deletecar btn btn-danger" id="deletecarid_{{$lp_value_carDetails->id}}"
                            type="button">Delete
                    </button>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    {{Form::open(array( 'method' => 'post','name'=>'add_car_form','id'=>'add_car_form'))}}
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Add New Car</h4>
            </div>
            <div class="alert-info" id="duplicate_car" style="display:none;">Same car already exists</div>

            <div class="modal-body">
                <div class="form-group">
                    <label>Carname</label>
                    <input type="text" name="carname" id="carname" class="form-control" placeholder="Enter text">
                </div>
                <div class="form-group">
                    <label>Company</label>
                    <select class="form-control" name="companyname" id="companyname">
                        <option value=''>Select</option>
                        @foreach($companyDetails as $companyDetails_key=>$companyDetails_value)
                        <option value="{{$companyDetails_value->id}}">{{{$companyDetails_value->name or ''}}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                {{--
                <button type="button" class="btn btn-primary">Save changes</button>
                --}}
                <input type="submit" name="carsubmit" class="btn btn-primary" value="Save">
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
    $("#add_car_form").validate({
        errorClass: "error",
        errorElement: "div",
        rules: {
            carname: {
                required: true
            },
            companyname: {
                required: true
            }
        },
        messages: {
            plan_name: {
                required: "Carname required "
            },
            yearly: {
                required: "Companyname required "
            }
        },
        //perform an AJAX post to ajax.php
        submitHandler: function () {
            $.ajax({
                url: '{{URL::to(' / ')}}/admin/addcar',
                type: 'POST',
                data: $("#add_car_form").serialize(),
                success: function (response) {

                    if (response.msg == 'success') {

                        setTimeout(function () {
                            location.reload(true)
                        }, 3000);
                    } else if (response.msg == 'duplicate') {
                        $("#duplicate_car").show();
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