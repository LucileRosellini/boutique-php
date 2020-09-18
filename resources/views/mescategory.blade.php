@extends('template')

@section('contenu')
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>category</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $item)
                <tr>
                    <th scope="row">{{!! $item['id'] !!}}</th>
                    <td class="text-primary"><strong>{!! $item['titre'] !!}</strong></td>
                    <td>{{ $item['prix'] }} €</td>
                    <td>{!! link_to_route('category.show', 'Voir', [$item['id']], ['class' => 'btn btn-success btn-block']) !!}</td>
                    <!-- Génère un lien vers la vue "show" de l'objet category avec argument ID de la category-->
                    <td>{!! link_to_route('category.edit', 'Modifier', [$item['id']], ['class' => 'btn btn-warning btn-block']) !!}</td>

                    <td>
                        {!! Form::open(['method' => 'DELETE', 'route' => ['category.destroy', $item['id']]]) !!}
                        <!-- Génère des formulaires à partir des template laravel -->
                        {!! Form::submit('Supprimer', ['class' => 'btn btn-danger btn-block', 'onclick' => 'return confirm(\'Vraiment supprimer cet category ?\')']) !!}

                        {!! Form::close() !!}


                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div>{!! link_to_route('category.create', 'Nouvel category', null, ['class' => 'btn btn-success btn-block']) !!}</div>
@endsection
