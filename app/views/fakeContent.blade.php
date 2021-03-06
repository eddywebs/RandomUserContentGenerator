@extends('master')

@section('title')
	Fake content /Lorem ipsum generator
@stop

@section('content')
<div class="starter-template">
		<div class="jumbotron" style="text-align: left;">
		<h2>Fake Content Generator</h2>
		<p>The tool generates dummy/fake content.</p>
		<br>
{{ Form::open(array('url' => 'fakeContent', 'method' => 'GET')) }}
		<div class="control-group">
			
			{{ Form::label('paras', 'Number of Para(s)  ', array('class' => 'name') ) }}
		 	{{ Form::number('paras', $num)}} (Max 9)
		 </div>
		 	{{ Form::hidden('type', 'html') }}
			{{Form::submit('Gimme Content!', array('class' => 'btn btn-success'))}}
			{{ Form::close() }}
		<h2 style="color: red">{{ $validationMessage }}</h2>
	</div>
</div>
<p>
	{{ $content }}
</p>
@stop