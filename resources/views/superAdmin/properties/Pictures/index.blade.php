@extends('superAdmin.layouts.main')
@section('main-field')
    <h4>{{ $property->title }}</h4>
    <hr>

    <section class="section">
        <div class="flex-container">
            @forelse($pictures as $picture)
                <div class="flex-item">
                    <span class="btn-close">

                        <form action="{{ route('admin.properties.pictures.destroy', [$property->id, $picture->id]) }}" method="POST" style="display: inline" title="remover">
                            @csrf
                            @method('DELETE')

                            <button style="border:0;background:transparent;" type="submit">
                                <span style="cursor: pointer">
                                    <i class="material-icons red-text text-accent-3">delete</i>
                                </span>
                            </button>
                        </form>
                    </span>

                    <img src="{{ asset("storage/$picture->url") }}" alt="Foto do imóvel." width="150px" height="100px">

                </div>

            @empty
                <div>Não existem fotos cadastradas para esse imóvel.</div>
            @endforelse
        </div>

        <div class="fixed-action-btn">
            <a href="{{ route('admin.properties.pictures.create', $property->id) }}" class="btn-floating btn-large waves-effect waves-light">
                <i class="large material-icons">add</i>
            </a>
        </div>
    </section>
@endsection
