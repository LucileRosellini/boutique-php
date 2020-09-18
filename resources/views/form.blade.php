@extends('template')

@section('contenu')
    <br>
    <div class="col-sm-offset-3 col-sm-6">
        <div class="panel panel-info">
            <div class="panel-heading">Nouvel article</div>
            <div class="panel-body">
                {!! Form::open(['url' => 'article']) !!}
                    <div class="form-group {!! $errors->has('titre') ? 'has-error' : 'plop' !!}">
                        {!! Form::text('titre', null, ['class' => 'form-control', 'placeholder' => 'Nom de l\'article']) !!}
                        {!! $errors->first('titre', '<small class="help-block">:message</small>') !!}
                    </div>
                    <div class="form-group {!! $errors->has('prix') ? 'has-error' : '' !!}">
                        {!! Form::text('prix', null, ['class' => 'form-control', 'placeholder' => 'Prix en €']) !!}
                        {!! $errors->first('prix', '<small class="help-block">:message</small>') !!}
                    </div>
                    <div class="form-group {!! $errors->has('description') ? 'has-error' : '' !!}">
                        {!! Form::textarea ('description', null, ['class' => 'form-control', 'placeholder' => 'Description du produit']) !!}
                        {!! $errors->first('description', '<small class="help-block">:message</small>') !!}
                    </div>
                    {!! Form::submit('Envoyer !', ['class' => 'btn btn-info pull-right']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
