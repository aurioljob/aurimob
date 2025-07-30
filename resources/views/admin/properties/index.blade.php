@extends('base')

@section('title','Admin - Properties')

@section('header')
    @include('admin.navAdmin')
@endsection

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center">
    <h1>Tableau de bord de tous les propriétés</h1>
        <a href="{{ route('admin.properties.create') }}" class="btn btn-info">
            Ajouter une chambre
        </a>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prix</th>
                <th>Zone</th>
                <th>Nom du bailleur</th>
                <th>Contact</th>
                <th>Nom de la cite</th>
                <th>Modalites</th>
                <th class="text-end">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($properties as $property)
                <tr>
                    <td>{{ $property->name }}</td>
                    <td>{{ number_format($property->price, 2, ',', ' ') }} Francs</td>
                    <td>{{ $property->zone }}</td>
                    <td>{{ $property->bailleur}}</td>
                    <td>{{ $property->contact}}</td>
                    <td>{{ $property->name_city}}</td>
                    <td>{{ $property->modalite}}</td>
                    <td class="text-end">
                        <a href="{{ route('admin.properties.edit', $property) }}" class="btn btn-info">Modifier</a>
                        <form action="{{ route('admin.properties.destroy', $property) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Supprimer cette chambre va etre supprime ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
