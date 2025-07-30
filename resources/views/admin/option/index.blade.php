@extends('base')

@section('title', 'Admin - Options')
@section('header')
    @include('admin.navAdmin')
@endsection

@section('content')
    <div class="container">
    <div class="d-flex justify-content-between align-items-center">
        <h1>@yield('title')</h1>
        <a href="{{ route('admin.option.create') }}" class="btn btn-info">Ajouter une option</a>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nom</th>
                <th class="text-end">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($options as $option)
                <tr>
                    <td>{{ $option->name }}</td>
                    <td class="text-end">
                        <a href="{{ route('admin.option.edit', $option) }}" class="btn btn-info">Modifier</a>
                        <form action="{{ route('admin.option.destroy', $option) }}" method="POST" class="d-inline">
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

