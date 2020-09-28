@foreach($districts as $district)
	<option value="{{ $district->id }}">{{ $district->{'name_'.\App::getLocale()} }}</option>
@endforeach
