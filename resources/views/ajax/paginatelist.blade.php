<div class="table table-responsive">

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
@foreach($students as $s)
  <tr id="{{$s->student_id}}">
    <td>{{ $s->student_id }}</td>
    <td>{{ $s->first_name }}</td>
    <td>{{ $s->last_name }}</td>
    <td>{{ $s->full_name }}</td>
    <td>{{ $s->sex }}</td>
    <td>
      <a href="#" class="btn btn-success" id="view" data-id="{{ $s->student_id }}"><label class="glyphicon glyphicon-eye-open"></label></a>
      <a href="#" class="btn btn-primary" id="edit" data-id="{{ $s->student_id }}"><label class="glyphicon glyphicon-edit"></label></a>
      <a href="#" class="btn btn-danger" id="delete" data-id="{{ $s->student_id }}"><label class="glyphicon glyphicon-trash"></label></a>
    </td>
  </tr>



@endforeach
      </tbody>


    </table>

    {{ $students->render() }}
  </div>