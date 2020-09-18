@extends('template')

@section('')

@endsection

@section('contenu')
    <br>
    <div>{{ $toto }}<div>
    <div class="col-sm-offset-3 col-sm-6">
        <div class="panel panel-info">
            <div class="panel-heading">{!! $titre !!}</div>
            <div class="panel-body">
                @if ($prix > 100)
                    <div class="alert alert-danger" role="alert">
                @else
                    <div class="form-group">
                @endif
                    {!! $prix !!} €
                </div>
                <div class="form-group">
                    {!! $description !!}
                </div>
                <div class="form-group">
                    <div>{!! link_to_route('article.edit', 'Modifier', [$id], ['class' => 'btn btn-warning btn-block']) !!}</div>
                    <div>
                        {!! Form::open(['method' => 'DELETE', 'route' => ['article.destroy', $id]]) !!}
                        {!! Form::submit('Supprimer', ['class' => 'btn btn-danger btn-block', 'onclick' => 'return confirm(\'Vraiment supprimer cet article ?\')']) !!}
                        {!! Form::close() !!}
                    </div>{!! link_to_route('article.index', 'catalog', null, ['class' => 'btn btn-success btn-block']) !!}</div>

                    <div>
            </div>
        </div>
    </div>
@endsection
