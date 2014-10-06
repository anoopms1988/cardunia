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
</div>
<div class="modal-footer">
       <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input type="submit" name="variantsubmit" class="btn btn-primary" value="Save">
 </div>
 </div>
 </div>