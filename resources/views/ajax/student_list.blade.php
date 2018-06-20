@foreach($student as $s)
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