@extends('superAdmin.layouts.main')
@section('main-field')

    <section class="section">
        <form action="{{ route('admin.properties.pictures.store', $property->id) }}" enctype="multipart/form-data" method="POST">
            @csrf

            <div class="file-field input-field">
                <div class="btn">
                    <span>Selecionar Foto</span>
                    <input type="file" name="picture">
                </div>
                <div class="file-path-wrapper">
                    <input type="text" class="file-path validate">
                </div>

                @error('picture')
                    <span class="red-text text-accent-3"><small>{{ $message }}</small></span>
                @enderror
            </div>

            <div class="right-align">
                <a href="{{ url()->previous() }}" class="btn waves-effect">Cancelar</a>
                <button class="btn waves-effect waves-light" type="submit">Salvar</button>
            </div>

        </form>
    </section>

@endsection
