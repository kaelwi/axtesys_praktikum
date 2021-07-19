<html>
<body>
<h1>Friends among my contacts</h1>
@if (count($contacts) > 0)
	@foreach ($contacts as $contact)
		@if ($contact->friends)
			{{$contact->firstName}} {{$contact->lastName}}  <br>
		@endif
	@endforeach
@endif
</body>
</html>