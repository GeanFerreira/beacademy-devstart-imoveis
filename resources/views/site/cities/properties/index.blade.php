@extends('site.layouts.main')
@section('main-field')

    <h3>Imóveis disponíveis em {{ $city->name }}</h3>

    <div class="divider"></div>

    <div style="display: flex; flex-wrap: wrap">

        @forelse($properties as $property)

            <div class="card" style="width: 290px; margin: 10px">
                <div class="card-image">
                    @if(count($property->pictures) > 0)
                        <img src="{{ asset("storage/{$property->pictures[0]->url}") }}">
                    @endif
                </div>

                <div class="card-content">
                    <p class="card-title">{{ $property->title }}</p>
                    <p>Finalidade: <strong>{{ $property->goal->name }}</strong></p>
                    <p>Preço: <strong>R${{ $property->preco }}</strong></p>
                </div>

                <div class="card-action">
                    <a href="{{ route('cities.properties.show', [$city->id, $property->id]) }} " class="green-text">Ver detalhes</a>
                </div>
            </div>

        @empty
            <p>Não existem imóveis disponíveis nessa cidade no momento!</p>
        @endforelse

    </div>

    <div class="center">
        {{ $properties->links('shared.pagination') }}
    </div>

@endsection
