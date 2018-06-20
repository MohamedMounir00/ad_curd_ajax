@extends('layouts.app')

@section('content')


<div class="row">
  <div  class="panel-body" >
@include('ajax.paginatelist')
</div>
</div>
@endsection

@section('script')
<script type="text/javascript">
  
  $(document).on('click','.pagination a',function(e) {
    e.preventDefault();
    var page =$(this).attr('href').split('page=')[1];
   // console.log(page)
   readPage(page);
  })
function readPage(page){
  $.ajax({
    url : '/student/paginate/student?page='+page
  }).done(function(data){
    //console.log(data)
    $('.panel-body').html(data)
    location.hash=page;
  })

}

</script>

@endsection