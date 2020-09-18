@extends('template')

@section('titre')
    Catalog
@endsection

@section('contenu')
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Article</th>
                    <th>Prix</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($catalog as $item)
                <tr>
                    <th scope="row">{{!! $item['id'] !!}}</th>
                    <td class="text-primary"><strong>{!! $item['titre'] !!}</strong></td>
                    <td>{{ $item['prix'] }} €</td>
                    <td>{!! link_to_route('article.show', 'Voir', [$item['id']], ['class' => 'btn btn-success btn-block']) !!}</td>
                    <!-- Génère un lien vers la vue "show" de l'objet article avec arugument ID de l'article-->
                    <td>{!! link_to_route('article.edit', 'Modifier', [$item['id']], ['class' => 'btn btn-warning btn-block']) !!}</td>

                    <td>
                        {!! Form::open(['method' => 'DELETE', 'route' => ['article.destroy', $item['id']]]) !!}
                        <!-- Génère des formulaires à partir des template laravel -->
                        {!! Form::submit('Supprimer', ['class' => 'btn btn-danger btn-block', 'onclick' => 'return confirm(\'Vraiment supprimer cet article ?\')']) !!}

                        {!! Form::close() !!}


                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div>{!! link_to_route('article.create', 'Nouvel article', null, ['class' => 'btn btn-success btn-block']) !!}</div>
@endsection
