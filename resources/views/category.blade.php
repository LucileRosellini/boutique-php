@extends('template')

@section('')

@endsection

@section('contenu')
    <br>

    <div class="col-sm-offset-3 col-sm-6">
        <div class="panel panel-info">
            <div class="panel-heading">{!! $titre !!}</div>
                <div class="form-group">
                    {!! $description !!}
                </div>
                <div class="form-group">
                    <div>{!! link_to_route('category.edit', 'Modifier', [$id], ['class' => 'btn btn-warning btn-block']) !!}</div>
                    <div>
                        {!! Form::open(['method' => 'DELETE', 'route' => ['category.destroy', $id]]) !!}
                        {!! Form::submit('Supprimer', ['class' => 'btn btn-danger btn-block', 'onclick' => 'return confirm(\'Vraiment supprimer cette categorie ?\')']) !!}
                        {!! Form::close() !!}
                    </div>{!! link_to_route('category.index', 'category', null, ['class' => 'btn btn-success btn-block']) !!}</div>

                    <div>
            </div>
        </div>
    </div>
@endsection
