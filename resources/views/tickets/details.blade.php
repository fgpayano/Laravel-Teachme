@extends('layout')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h2 class="title-show">
                {{ $ticket->title }}

                @include('tickets\partials\status', compact('ticket'))
            </h2>
            
            <p class="date-t"><span class="glyphicon glyphicon-time">{{ $ticket->created_at->format('d/m/Y h:ia') }} - {{ $ticket->author->name }}</span> </p>

            <h4 class="label label-info news">{{ $ticket->voters()->count() }} votos</h4>

            <p class="vote-users">
                @foreach($ticket->voters->shuffle() as $user)
                <span class="label label-info">{{ $user->name }}</span>
                @endforeach
            </p>

            @if ( ! currentUser()->hasVoted($ticket))

            {!! Form::open(['route' => ['votes.submit', $ticket->id], 'method' => 'POST']) !!}
                <button type="submit" class="btn btn-primary">
                    <span class="glyphicon glyphicon-thumbs-up"></span> Votar
                </button>
            {!! Form::close() !!}
            
            @else

            {!! Form::open(['route' => ['votes.destroy', $ticket->id], 'method' => 'DELETE']) !!}
                <button type="submit" class="btn btn-primary">
                    <span class="glyphicon glyphicon-thumbs-up"></span> Quitar voto
                </button>
            {!! Form::close() !!}

            @endif

            <h3>Nuevo Comentario</h3>
             @include('partials/errors')
                
            @if(Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            @endif

             {!! Form::open(['route' => ['comments.submit', $ticket->id], 'method' => 'POST']) !!}
                <div class="form-group">
                    <label for="comment">Comentarios:</label>
                    <textarea rows="4" class="form-control" name="comment" cols="50" id="comment">{{ old('comment') }}</textarea>
                </div>
                <div class="form-group">
                    <label for="website">Enlace:</label>
                    <input class="form-control" name="website" type="text" id="website" value="{{ old('website') }}">
                </div>
                <button type="submit" class="btn btn-primary">Enviar comentario</button>
            {!! Form::close() !!}
        
            <h3>Comentarios ({{ $ticket->comments()->count() }})</h3>
            @foreach($ticket->comments as $comment)
                <div class="well well-sm">
                    <p><strong>{{ $comment->user->name }}</strong></p>
                    <p>{{ $comment->comment }}</p>
                    <p class="date-t"><span class="glyphicon glyphicon-time"></span> {{ $comment->created_at->format('d/m/Y h:ia') }}</p>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection