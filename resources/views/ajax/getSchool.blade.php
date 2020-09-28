
@foreach($schools as $school)
	<option value="{{ $school->id }}">{{ $school->name }}</option>
@endforeach
