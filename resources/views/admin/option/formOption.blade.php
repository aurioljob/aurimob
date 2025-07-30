@extends('base')

@section('title',$option->exists? 'Editer une Option':'Créer une Option')

@section('header')
    @include('admin.navAdmin')
@endsection

@section('content')
<div class="container">
    <h1>@yield('title')</h1>
    <form class="vstack gap-2" action="{{ route($option->exists? 'admin.option.update': 'admin.option.store',$option) }}" method="post">
        @csrf
        @method($option->exists? 'PUT':'POST')

        @include('shared.input', [
            'label' => 'Nom de l\'option',
            'name' => 'name',
            'placeholder' => 'Nom de l\'option',
            'value' => $option->name,
        ])
        <div class="mb-3 mt-3">
            <button class="btn btn-info">
                @if ($option->exists)
                    Modifier
                @else
                    Envoyer
                @endif
            </button>
        </div>
    </form>
</div>
@endsection
