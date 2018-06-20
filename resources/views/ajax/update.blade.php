<!-- The Modal -->
<div class="modal" id="updateStudent" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Modal Heading</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form action="{{ route('update') }}" method="POST" id="frm-update" >
        <!-- Modal body -->
        <div class="modal-body">

<div class="col-4-md">
  <div class="form-group">
    <label> Fiest Nme </label>
    <input type="hidden" name="student_id" class="form-control" id="student_id">

    <input type="text" name="first_name" class="form-control" id="first_name">
  </div>
</div>

<div class="col-4-md">
  <div class="form-group">
    <label> Last Nme </label>
    <input type="text" name="last_name" class="form-control" id="last_name">
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

