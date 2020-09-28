@foreach($courses as $course)
	<option value="{{ $course->id }}">{{ $course->{'name_'.\App::getLocale()} }}</option>
@endforeach
