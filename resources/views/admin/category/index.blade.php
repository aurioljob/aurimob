@extends('base')

@section('title', 'Admin - Category')
@section('header')
    @include('admin.navAdmin')
@endsection

@section('content')
    <div class="container">
    <div class="d-flex justify-content-between align-items-center">
        <h1>@yield('title')</h1>
        <a href="{{ route('admin.category.create') }}" class="btn btn-info">Ajouter une catégorie</a>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nom</th>
                <th class="text-end">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categorys as $category)
                <tr>
                    <td>{{ $category->name }}</td>
                    <td class="text-end">
                        <a href="{{ route('admin.category.edit', $category) }}" class="btn btn-info">Modifier</a>
                        <form action="{{ route('admin.category.destroy', $category) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
    </table>

    {{-- {{ $options->links() }} --}}
    </div>
@endsection
