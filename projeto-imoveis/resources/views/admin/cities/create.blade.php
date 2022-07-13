@extends('admin.layouts.main')
@section('main-field')
    <section class="section">

        {{--@if($errors->any())
            <div class="red-text">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif--}}

        <form action="{{ route('admin.cities.add') }}" method="POST">
            <!--Cross-Site Request Forgery-->
            @csrf
            <div class="input-field">
                <label for="name">Nome</label>
                <input type="text" name="name" id="name">

                @error('name')
                    <span class="red-text text-accent-3"><small>{{ $message }}</small></span>
                @enderror
            </div>
            <div class="right-align">
                <a href="{{ url()->previous() }}" class="btn-flat waves-effect">Cancelar</a>
                <button class="btn waves-effect waves-light" type="submit">Salvar</button>
            </div>
        </form>
    </section>
@endsection
