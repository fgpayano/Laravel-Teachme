@if (count($errors) > 0)
	<div class="alert alert-danger">
		<strong>Whoops!</strong> Revisa la informaci&oacute;n ingresada, tiene algunos errores: <br><br>
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
@endif