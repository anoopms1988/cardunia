
<div class="row">
<div class="col-lg-12">
<div class="panel panel-default">
<div class="panel-heading">
    Dimensions&Weights
    @if(!$variant->dimension())
    <button class="btn btn-primary btn-lg " data-target="#dimensionModal" data-toggle="modal"> Add Dimensions&Weights </button>
    @else
        <button class="btn btn-primary btn-lg " data-target="#dimensionModal" data-toggle="modal"> Edit Dimensions&Weights </button>
    @endif
</div>
<!-- /.panel-heading -->
<div class="panel-body">
<div class="table-responsive">
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
@if($variant->dimension()->first())
<thead>
<tr>
    <th>Overall Length</th>
    <th>Overall Width</th>
    <th>Overall Height</th>
    <th>Wheel Base</th>
    <th>Boot Space</th>
    <th>Kerb Weight</th>
    <th>Ground Clearance</th>
</tr>
</thead>

<tbody>

<tr class="odd gradeX">
    <td>{{{$variant->dimension()->first()->length or ''}}}</td>
    <td>{{{$variant->dimension()->first()->width or ''}}}</td>
    <td>{{{$variant->dimension()->first()->height or ''}}}</td>
    <td>{{{$variant->dimension()->first()->wheelbase or ''}}}</td>
    <td>{{{$variant->dimension()->first()->bootspace or ''}}}</td>
    <td>{{{$variant->dimension()->first()->kerbweight or ''}}}</td>
    <td>{{{$variant->dimension()->first()->length or ''}}}</td>
</tr>

</tbody>
@else
<div class="alert alert-danger">
      No dimension exist for the variants
</div>
@endif
</table>
</div>
<!-- /.table-responsive -->

</div>
<!-- /.panel-body -->
</div>
<!-- /.panel -->
</div>
<!-- /.col-lg-12 -->
</div>
<div class="modal fade" id="dimensionModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    {{Form::open(array( 'method' => 'post','name'=>'dimension_form','id'=>'dimension_form','url'=>'admin/adddimension'))}}
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                 <input type="hidden" name="variant_id" value="{{$variant->id}}">
                 @if(!$variant->dimension()->first())
                 <h4 class="modal-title" id="myModalLabel">Add New Dimension&Weights</h4>
                 @else
                 <h4 class="modal-title" id="myModalLabel">Edit Dimension&Weights</h4>
                  <input type="hidden" name="editdimension_id" value="{{$variant->dimension()->first()->id}}"
                 @endif
            </div>

            <div class="modal-body">
            <div class="form-group">
            <label>Overall length</label>
                <input type="text" name="length" id="length" class="form-control" placeholder="Enter text" value="{{{$variant->dimension()->first()->length or ''}}}">
            </div>
             <div class="form-group">
             <label>Overall Width</label>
                  <input type="text" name="width" id="width" class="form-control" placeholder="Enter text" value="{{{$variant->dimension()->first()->width or ''}}}">
             </div>
             <div class="form-group">
             <label>Overall Width</label>
                   <input type="text" name="height" id="height" class="form-control" placeholder="Enter text" value="{{{$variant->dimension()->first()->height or ''}}}">
              </div>
              <div class="form-group">
              <label>Wheel base</label>
                   <input type="text" name="wheelbase" id="wheelbase" class="form-control" placeholder="Enter text" value="{{{$variant->dimension()->first()->wheelbase or ''}}}">
              </div>
              <div class="form-group">
              <label>Boot Space</label>
                   <input type="text" name="bootspace" id="bootspace" class="form-control" placeholder="Enter text" value="{{{$variant->dimension()->first()->bootspace or ''}}}">
              </div>
              <div class="form-group">
              <label>Kerb weight</label>
                    <input type="text" name="kerbweight" id="kerbweight" class="form-control" placeholder="Enter text" value="{{{$variant->dimension()->first()->kerbweight or ''}}}">
               </div>
            <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                     {{--<button type="button" class="btn btn-primary">Save changes</button>--}}
                     <input type="submit" name="dimensionformsubmit" class="btn btn-primary" value="Save">
            </div>
        </div>
                            <!-- /.modal-content -->
    </div>
    {{Form::close()}}
                        <!-- /.modal-dialog -->
    </div>
</div>
