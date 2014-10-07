
<form method="post" name="editdealer_form" id="editdealer_form" >
@if($Dealer)
<input type="hidden" name="editdealer_id" id="editdealer_id" value="{{$Dealer->id}} ">
@endif
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
       <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
       <h4 class="modal-title" id="myModalLabel">Add New Dealer</h4>
</div>

<div class="modal-body">
      <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" id="name" value="{{{$Dealer->name or ''}}}"  class="form-control" placeholder="Enter text">
      </div>
      <div class="form-group">
            <label>City</label>
            <select name="city" id="city" class="form-control">
            <option value=''>Select</option>
            @foreach($cities as $cities_key=>$cities_value)
             <option value='{{$cities_value->id}}'>{{{$cities_value->name or ''}}}</option>
            @endforeach
            </select>
      </div>
       <div class="form-group">
                  <label>Company</label>
                  <select name="company" id="company" class="form-control">
                  <option value=''>Select</option>
                  @foreach($companies as $companies_key=>$companies_value)
                   <option value='{{$companies_value->id}}'>{{{$companies_value->name or ''}}}</option>
                  @endforeach
                  </select>
       </div>
       <div class="form-group">
            <label>Address</label>
            <textarea class="form-control" name="address"  id="address">{{{$Dealer->address or ''}}}</textarea>
       </div>
       <div class="form-group">
            <label>Phone number</label>
            <input type="text" name="phonenumber" id="phonenumber" value="{{{$Dealer->phonenumber or ''}}}"  class="form-control" placeholder="Enter text">
        </div>
       <div class="form-group">
            <label>Mobile number</label>
            <input type="text" name="mobilenumber" id="mobilenumber" value="{{{$Dealer->mobilenumber or ''}}}"  class="form-control" placeholder="Enter text">
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
    $("#editdealer_form").validate({
        errorClass: "error",
        errorElement: "div",
        rules: {
            name: {
                required: true
            },
            city: {
                required: true
            },
            company: {
                required: true
            },
            address: {
                required: true
            },
            phonenumber: {
                required: true
            },
            mobilenumber: {
                required: true
            }
        },
        messages: {
            name: {
                required: "Field is required"
            },
            city: {
                required:"Field is required"
            },
            company: {
                required: "Field is required"
            },
            address: {
                required: "Field is required"
            },
            phonenumber: {
                required: "Field is required"
            },
            mobilenumber: {
                required: "Field is required"
            }
        },
        //perform an AJAX post to ajax.php
        submitHandler: function () {

            $.ajax({
                url: '{{URL::to('/')}}/admin/manipulatedealer',
                type: 'POST',
                data: $("#editdealer_form").serialize(),
                success: function (response) {

                    if (response.msg == 'success') {

                        setTimeout(function(){location.reload(true)}, 3000);
                    }else if(response.msg == 'duplicate'){
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