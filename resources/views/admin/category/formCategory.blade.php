
@extends('base')

@section('title',$category->exists? 'Editer une categorie':'Créer une categorie')

@section('header')
    @include('admin.navAdmin')
@endsection

@section('content')
<div class="container">
    <h1>@yield('title')</h1>
    <form class="vstack gap-2" action="{{ route($category->exists? 'admin.category.update': 'admin.category.store',$category) }}" method="post">
        @csrf
        @method($category->exists? 'PUT':'POST')

        @include('shared.input', [
            'label' => 'Nom de la catégorie',
            'name' => 'name',
            'placeholder' => 'Nom de la catégorie',
            'value' => $category->name,
        ])
        <div class="mb-3 mt-3">
            <button class="btn btn-info">
                @if ($category->exists)
                    Modifier
                @else
                    Envoyer
                @endif
            </button>
        </div>
    </form>
</div>
@endsection
