@extends('superAdmin.layouts.main')
@section('main-field')
    <section class="section">

        <form action="{{ $action }}" method="POST">
            <!--Cross-Site Request Forgery-->
            @csrf
            @isset($city)
                @method('PUT')
            @endisset

            <div class="input-field">
                <label for="name">Nome</label>
                <input type="text" name="name" id="name" value="{{ old('name', $city->name ?? '') }}">

                @error('name')
                    <span class="red-text text-accent-3"><small>{{ $message }}</small></span>
                @enderror
            </div>
            <div class="right-align">
                <a href="{{ route('admin.cities.index') }}" class="btn-flat waves-effect">Cancelar</a>
                <button class="btn waves-effect waves-light" type="submit">Salvar</button>
            </div>
        </form>
    </section>
@endsection
