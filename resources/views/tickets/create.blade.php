@extends('layout')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>Nueva solicitud</h1>
			@include('partials/errors')
			{!! Form::open(['route' => 'tickets.store', 'method' => 'POST']) !!}
				{!! Form::label('title', 'Título') !!}
				
				{!! 
					Form::textarea('title', null, [
						'rows' => 2,
						'class'  => 'form-control',
						'placeholder' => 'Describe brevemente de qué quieres se trate el tutorial'])
				 !!} </br>
				<p>
					<button type="submit" class="btn btn-primary">
						Enviar solicitud
					</button>
				</p>
			{!! Form::close() !!}
		</div>
	</div>	
</div>
@endsection