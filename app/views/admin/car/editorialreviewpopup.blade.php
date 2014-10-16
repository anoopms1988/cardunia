
<form method="post" name="editoralreview_form" id="editoralreview_form">
    @if($EditorialReview)
    <input type="hidden" name="editreview_id" id="editreview_id" value="{{$EditorialReview->id}} ">
    @endif
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel"> @if($EditorialReview) Edit editorial review @else Add New Editorial Review @endif</h4>
            </div>

            <div class="modal-body">
                 <div class="form-group">
                   <label>Car</label>
                    @if($EditorialReview)

                   <input type="text" name="company" id="company" value="{{{
                   $EditorialReview->variant()->first()->car()->first()->company()->first()->name
                   or ''}}}" class="form-control" placeholder="Enter text"  readonly >
                    @else
                   <select name="company" id="company" class="form-control">
                               <option>Select</option>
                         @foreach($companies as $companies_key=>$companies_value)
                               <option value='{{{$companies_value->id or ''}}}'>{{{$companies_value->name or ''}}}</option>
                         @endforeach
                   </select>
                    @endif
                 </div>
                <div class="form-group">
                      <label>Car</label>
                       @if($EditorialReview)

                       <input type="text" name="car" id="car" value="{{{$EditorialReview->variant()->first()->car()->first()->name or ''}}}"
                                                           class="form-control" placeholder="Enter text"  readonly >
                       @else
                       <select name="car" id="car" class="form-control">
                                 <option>Select</option>

                       </select>
                       @endif
                </div>
                <div class="form-group">
                                    <label>Variant</label>
                                    @if($EditorialReview)
                                    <input type="text" name="variant" id="variant" value="{{{$EditorialReview->variant()->first()->name or ''}}}"
                                           class="form-control" placeholder="Enter text"  readonly >
                                    @else
                                      <select name="variant" id="variant" class="form-control">
                                                                      <option>Select</option>

                                       </select>
                                    @endif
                 </div>
                <div class="form-group">
                    <label>Review</label>
                    <textarea name="review" id="review" class="form-control">{{{$EditorialReview->review or ''}}}</textarea>
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
    $('#company').change(function(){
         var company_id=$('#company').val();
        $.ajax({
          url: '{{URL::to(trim('/'))}}/admin/getcars',
          type: 'POST',
          data: {company_id: company_id},
          success: function (response) {

            $('#car').html(response);
         },
        error: function () {
                   alert("error");
          }
             });
    });

     $('#car').change(function(){
             var car_id=$('#car').val();
            $.ajax({
              url: '{{URL::to(trim('/'))}}/admin/getvariants',
              type: 'POST',
              data: {car_id: car_id},
              success: function (response) {

                $('#variant').html(response);
             },
            error: function () {
                       alert("error");
              }
                 });
     });



    $("#editoralreview_form").validate({
        errorClass: "error",
        errorElement: "div",
        rules: {
            review: {
                required: true
            }

        },
        messages: {
            review: {
                required: "Field is required"
            }

        },
        //perform an AJAX post to ajax.php
        submitHandler: function () {

            $.ajax({
                url: '{{URL::to(trim('/'))}}/admin/manipulateeditorialreview',
                type: 'POST',
                data: $("#editoralreview_form").serialize(),
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