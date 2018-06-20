<!-- The Modal -->
<div class="modal" id="myModal" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Modal Heading</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form action="{{ route('store') }}" method="POST" id="frm-insert" >
        {{ csrf_field() }}
        <!-- Modal body -->
        <div class="modal-body">

<div class="col-4-md">
  <div class="form-group">
    <label> Fiest Nme </label>
    <input type="" name="first_name" class="form-control">
  </div>
</div>

<div class="col-4-md">
  <div class="form-group">
    <label> Last Nme </label>
    <input type="" name="last_name" class="form-control">
  </div>
</div>
<div class="col-4-md">
  <div class="form-group">
    <label> Sex</label>
<select class="form-control" name="sex_id" id="sex_id">
  <option value="">---------------</option>
  @foreach($sexes as$key=>$sex)
  <option value="{{$key}}">{{$sex}}</option>
  @endforeach
</select> 
 </div>
</div>






        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <input type="submit" class="btn btn-success pull-left" >
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

        </div>
      </form>
    </div>
  </div>
</div>

