@extends('master')

@section('title')
	Fake profile generator.
@stop

@section('content')
<div class="starter-template">
		<div class="jumbotron" style="text-align: left;">
		<h2>Fake Person Generator</h2>
		<p>This tool generates a fictional character.</p>
		<br>
		{{ Form::open(array('url' => 'fakePerson', 'method' => 'GET')) }}
		<div class="control-group">
			{{ Form::label('count', 'Number of profiles  ', array('class' => 'name') ) }}
		 	{{ Form::number('count', $data['count']) }} (Max 99)
		 </div>
		 	{{ Form::hidden('type', 'html') }}
			{{Form::submit('Fetch new person', array('class' => 'btn btn-success'))}}
		{{ Form::close() }}
		<h2 style="color: red">{{ $data['validationMessage'] }}</h2>
	</div>
</div>
	@foreach ($data['profiles'] as $person)
		<b>{{ $person->firstName }} {{ $person->lastName }}</b>
		<div>{{ $person->dob }}</div>
		<div>{{ $person->streetAddress }}<div>
		<div>{{ $person->city }}, {{ $person->state }} {{ $person->zip }}<div>
		<div>{{ $person->country }}<div>
		<div>Username: {{ $person->username }}<div>
		<div>Password: {{ $person->password }}<div>			
		<div>{{ $person->description }}</div>
		<br>
	@endforeach
@stop