<form method="post" name="editcustomer_form" id="editcustomer_form">
    @if($Customer)
    <input type="hidden" name="editcustomer_id" id="editcustomer_id" value="{{$Customer->id}} ">
    @endif
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Add New Dealer</h4>
            </div>

            <div class="modal-body">
                <div class="form-group">
                    <label>First Name</label>
                    <input type="text" name="first_name" id="first_name" value="{{{$Customer->first_name or ''}}}"
                           class="form-control" placeholder="Enter text">
                </div>
                <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" name="last_name" id="last_name" value="{{{$Customer->last_name or ''}}}"
                           class="form-control" placeholder="Enter text">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="email" id="email" value="{{{$Customer->email or ''}}}" class="form-control"
                           placeholder="Enter text">
                </div>
                <div class="form-group">
                    <label>City</label>
                    <select name="city" id="city" class="form-control">
                        <option value=''>Select</option>
                        @foreach($cities as $cities_key=>$cities_value)
                        @if($cities_value->id==$Customer->city()->first()->id)
                        <option value='{{$cities_value->id}}' selected>{{{$cities_value->name or ''}}}</option>
                        @else
                        <option value='{{$cities_value->id}}'>{{{$cities_value->name or ''}}}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Mobile number</label>
                    <input type="text" name="mobilenumber" id="mobilenumber" value="{{{$Customer->mobilenumber or ''}}}"
                           class="form-control" placeholder="Enter text">
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <input type="submit" name="submit" class="btn btn-primary" value="Save">
            </div>
        </div>
    </div>
</form>
<script type="text/javascript">
    $("#editcustomer_form").validate({
        errorClass: "error",
        errorElement: "div",
        rules: {
            first_name: {
                required: true
            },
            last_name: {
                required: true
            },
            email: {
                required: true,
                email: true
            },
            city: {
                required: true
            },
            mobilenumber: {
                required: true
            }
        },
        messages: {
            first_name: {
                required: "Field is required"
            },
            last_name: {
                required: "Field is required"
            },
            email: {
                required: "Field is required"
            },
            city: {
                required: "Field is required"
            },
            mobilenumber: {
                required: "Field is required"
            }
        },
        //perform an AJAX post to ajax.php
        submitHandler: function () {

            $.ajax({
                url: '{{URL::to(trim('/'))}}/admin/manipulatecustomer',
                type: 'POST',
                data: $("#editcustomer_form").serialize(),
                success: function (response) {

                    if (response.msg == 'success') {

                        setTimeout(function () {
                            location.reload(true)
                        }, 3000);
                    } else if (response.msg == 'duplicate') {
                        // $("#duplicate_variant").show();
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