@extends('base')

@section('title',$property->exists? 'Admin - Edit' : 'Admin - Create')

@section('header')
    @include('admin.navAdmin')
@endsection

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@section('content')
    <div class="container">
        <h1>@yield('title')</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route($property->exists? 'admin.properties.update': 'admin.properties.store', $property->exists ? $property : null) }}" class="vstack gap-2" method="POST" enctype="multipart/form-data">
            @csrf
            @method($property->exists? 'PUT':'POST')
            <div class="row mt-5 mb-2">
                @include('shared.input', [
                'label' => 'Name',
                'name' => 'name',
                'placeholder' => 'Nom de la chambre',
                'value' =>  $property->name,
                'class' => 'col'
                ])
                <div class="col row">
                    @include('shared.input', [
                    'label' => 'Zone',
                    'name' => 'zone',
                    'placeholder' => 'Zone',
                    'value' => $property->zone,
                    'class' => 'col'
                    ])
                    @include('shared.input', [
                    'label' => 'Prix',
                    'name' => 'price',
                    'placeholder' => 'Prix',
                    'value' => $property->price,
                    'class' => 'col'
                    ])
                </div>
            </div>

            <div class="row mt-5 mb-2">
                @include('shared.input', [
                'label' => 'Bailleur',
                'name' => 'bailleur',
                'placeholder' => 'Nom du Bailleur',
                'value' =>  $property->bailleur,
                'class' => 'col'
                ])
                <div class="col row">
                    @include('shared.input', [
                    'label' => 'Contact',
                    'name' => 'contact',
                    'placeholder' => 'Contact du bailleur',
                    'value' => $property->contact,
                    'class' => 'col'
                    ])
                    @include('shared.input', [
                    'label' => 'Nom de la cite',
                    'name' => 'name_city',
                    'placeholder' => 'Nom de la cite',
                    'value' => $property->name_city,
                    'class' => 'col'
                    ])
                </div>
            </div>
            @include('shared.input', [
            'type' => 'textarea',
            'name' => 'description',
            'label' => 'Description',
            'placeholder' => 'Description',
            'value' => $property->description,
            'class' => 'col'
            ])
            <div class="row mt-2">
                @include('shared.input', [
                'label' => 'Status',
                'name' => 'status',
                'placeholder' => 'Status',
                'value' => $property->status,
                'class' => 'col'
                ])
                @include('shared.input', [
                'label' => 'Surface',
                'name' => 'surface',
                'placeholder' => 'Surface',
                'value' => $property->surface,
                'class' => 'col'
                ])
            @include('shared.input', [
                'label' => 'Nombre de pièces',
                'name' => 'number_of_pieces',
                'placeholder' => 'Nombre de pièces',
                'value' => $property->number_of_pieces,
                'class' => 'col'
                ])
            @include('shared.input', [
                'label' => 'Etages',
                'name' => 'rooms',
                'placeholder' => 'Etage',
                'value' => $property->rooms,
                'class' => 'col'
                ])
            </div>
            <div class="row mt-2">
                @include('shared.select', [
                'label' => 'Categorie',
                'name' => 'category_id',
                'value' => $property->category_id,
                'categories' => $categories,
                'class' => 'col'
                ])
                @include('shared.input', [
                    'label' => 'Modalite',
                    'name' => 'modalite',
                    'placeholder' => 'Modalites de la chambre',
                    'value' => $property->modalite,
                    'class' => 'col'
                    ])
                @include('shared.select', [
                'label' => 'Options',
                'name' => 'options',
                'value' => $property->options->pluck('id')->toArray(),
                'options' => $options,
                'multiple' => true,
                'class' => 'col',
                'id' => 'options'
                ])
            <div class="row mt-2 mb-5">
                {{-- Images déjà enregistrées en base --}}
                @php
                    $images = is_array($property->images) ? $property->images : json_decode($property->images, true);
                @endphp
                @if(!empty($images))
                    <div class="row mb-3">
                        @foreach($images as $key => $image)
                            <div class="col-md-3 mb-2">
                                <img src="{{ asset('uploads/uploads/' . $image) }}" alt="Image" class="img-fluid rounded border">
                                <div class="form-check mt-2">
                                    <input class="form-check-input" type="checkbox" name="delete_images[]" value="{{ $key }}" id="delete_image_{{ $key }}">
                                    <label class="form-check-label" for="delete_image_{{ $key }}">
                                        Supprimer
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
                {{-- Zone de prévisualisation des nouvelles images --}}
                <div id="preview" class="row mb-3"></div>
                {{-- Champ de sélection de fichiers --}}
        <div class="col">
        <label for="images" class="form-label">Images</label>
        <input
            type="file"
            name="images[]"
            id="images"
            class="form-control"
            accept="image/*"
            multiple
        >
    </div>
</div>

            <div class="row d-flex justify-content-center">
                <button type="submit" class="btn btn-info">
                @if ($property->exists)
                    Modifier
                @else
                    Envoyer
                @endif
            </button>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
$(document).ready(function() {
    $('#options').select2({
        width: '100%',
        placeholder: 'Choisissez des options'
    });
});
</script>
@endpush
