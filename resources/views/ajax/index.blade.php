@extends('layouts.app')

@section('content')
@include('ajax.add')
@include('ajax.update')

<div class="row">
  <div class="col-md-12">
    <h1>Simple Laravel CRUD Ajax</h1>
  </div>
</div>

<div class="row">
  <div class="table table-responsive">
    <button class="btn btn-default pull-right btn-xs" id="re-data" > load</button>
    <button class="btn btn-info" data-toggle="modal" data-target="#myModal">+ Student</button>
    <table class="table table-bordered" id="table">
      <thead>
        <tr>
          <th width="150px">id</th>
          <th>first name</th>
          <th>last name</th>
          <th>full name</th>
          <th>sex</th>
          <th>Action</th>

        </tr>
      </thead>
      <tbody id="student-info">

      </tbody>


    </table>
  </div>

</div>

@endsection
@section('script')
<script type="text/javascript">




        //////////////////////
        $('#re-data').on('click',function(){
          $.get("{{ URL::to('student/read-data') }}",function(data){
//console.log(data);
//uses this
$('#student-info').empty().html(data); 
/**
or this
 $('#student-info').empty();
      $.each(data,function(i,value){
        var tr = $("<tr/>");
        tr.append($("<td/>",{
          text : value.student_id
        })).append($("<td/>",{
          text:value.first_name
        })).append($("<td/>",{
          text:value.last_name
        })).append($("<td/>",{
          text:value.full_name
        })).append($("<td/>",{
        html: "<a href='#'> view </a> <a href='#'> edit </a> <a href='#'> delete </a>"
        }))

        $('#student-info').append(tr);
      });
      **/

//console.log(data);
});
        });

  ////////////////////////////////////////////////////////////////////////////insert a data//////////////////////////////////////////


  $('#frm-insert').on('submit',function(e){
    e.preventDefault();
    var data = $(this).serialize();
    var url = $(this).attr('action');
    var post = $(this).attr('method');
        // console.log(post)
        $.ajax(
        {
          type: post,
          url: url,
          data: data,
          dataType: 'json',
          success: function(data){


           var tr = $('<tr/>',{
            id:data.student_id
          });
           tr.append($("<td/>",{
            text : data.student_id
          })).append($("<td/>",{
            text:data.first_name
          })).append($("<td/>",{
            text:data.last_name
          })).append($("<td/>",{
            text:data.full_name
          })).append($("<td/>",{
            text:data.sex
          })).append($("<td/>",{
            html:'  <a href="#" class="btn btn-success" id="view" data-id="'+data.student_id+'"><label class="glyphicon glyphicon-eye-open"></label></a>'+' <a href="#" class="btn btn-primary" id="edit" data-id="'+data.student_id+'}"><label class="glyphicon glyphicon-edit"></label></a> '+' <a href="#" class="btn btn-danger" id="delete" data-id="'+data.student_id+'"><label class="glyphicon glyphicon-trash"></label></a>'
          }))

          $('#student-info').append(tr);

        }
      });

//console.log(url);

});

///////////////////////////////////////////////////////////delete/////////////////////////////////////////
$('body').delegate('#student-info #delete', 'click', function(e) {

  var student_id = $(this).data('id');
   //alert(student_id)
   $.post('{{ route("delete") }}',{student_id:student_id},function(data){
   // alert(student_id)
   $('tr#'+student_id).remove();
 })
 });

///////////////////////////////////////////////////////////////////////////////////edite//////////////////////////////////
$('body').delegate('#student-info #edit', 'click', function(e) {
  var student_id =$(this).data('id')
  $.get("{{route('edit')}}",{student_id:student_id},function(data){
    //console.log(data);

    $('#frm-update').find('#first_name').val(data.first_name);
    $('#frm-update').find('#last_name').val(data.last_name);
    $('#frm-update').find('#sex_id').val(data.sex_id);
    $('#frm-update').find('#student_id').val(data.student_id);
    $('#updateStudent').modal('show');

  });
});

///////////////////////////////////////////////////////////////////////////////////update//////////////////////////////////

$('#frm-update').on('submit',function(e){
  e.preventDefault()
 var data = $(this).serialize();
    var url = $(this).attr('action');
$.post(url,data,function(data){
  //  console.log(data);
    $('#frm-update').trigger('reset');



           var tr = $('<tr/>',{
            id:data.student_id
          });
           tr.append($("<td/>",{
            text : data.student_id
          })).append($("<td/>",{
            text:data.first_name
          })).append($("<td/>",{
            text:data.last_name
          })).append($("<td/>",{
            text:data.full_name
          })).append($("<td/>",{
            text:data.sex
          })).append($("<td/>",{
            html:'  <a href="#" class="btn btn-success" id="view" data-id="'+data.student_id+'"><label class="glyphicon glyphicon-eye-open"></label></a>'+' <a href="#" class="btn btn-primary" id="edit" data-id="'+data.student_id+'}"><label class="glyphicon glyphicon-edit"></label></a> '+' <a href="#" class="btn btn-danger" id="delete" data-id="'+data.student_id+'"><label class="glyphicon glyphicon-trash"></label></a>'
          }))

         $('#student-info tr#'+data.student_id).replaceWith(tr);


})
    })














//////////////////////////////////////////////////////////////////////////////////
$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
</script>
@endsection
