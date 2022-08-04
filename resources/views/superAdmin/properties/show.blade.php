@extends('superAdmin.layouts.main')
@section('main-field')
    <h4>{{ $property->title }}</h4>
    <hr>

    <section class="section">
        <div class="row">
            <span class="col s12">
                <h5>Cidade</h5>
                <p>{{ $property->city->name }}</p>
            </span>
        </div>

        <div class="row">
            <span class="col s12">
                <h5>Tipo de Imóvel</h5>
                <p>{{ $property->type->name }}</p>
            </span>
        </div>

        <div class="row">
            <span class="col s12">
                <h5>Finalidade</h5>
                <p>{{ $property->goal->name }}</p>
            </span>
        </div>

        <div class="row">
            <span class="col s12">
                <h5>Preço</h5>
                <p>{{ $property->preco }}</p>
            </span>
        </div>

        <div class="row">
            <span class="col s4">
                <h5>Cidade</h5>
                <p>{{ $property->city->name }}</p>
            </span>

            <span class="col s4">
                <h5>Dormitórios</h5>
                <p>{{ $property->dormitorios }}</p>
            </span>

            <span class="col s4">
                <h5>Salas</h5>
                <p>{{ $property->salas }}</p>
            </span>
        </div>

        <div class="row">
            <span class="col s4">
                <h5>Área m²</h5>
                <p>{{ $property->terreno }}</p>
            </span>

            <span class="col s4">
                <h5>Banheiros</h5>
                <p>{{ $property->banheiros }}</p>
            </span>

            <span class="col s4">
                <h5>Garagens</h5>
                <p>{{ $property->garagens }}</p>
            </span>
        </div>

        {{--<div class="row">
            <span class="col s12">
                <h5>Pontos de interesse nas proximidades</h5>
                <div style="display: flex; flex-wrap: wrap;">
                    @foreach($property->neighborhoods as $neighborhood)
                        <span style="margin-right:25px; font-weight: 600;">{{ $neighborhood->name }}</span>
                    @endforeach
                </div>
            </span>
        </div>--}}

        <div class="row">
            <span class="col s12">
                <h5>Endereço</h5>
                <p>{{ $property->address->rua }}, nº{{ $property->address->numero }} {{ $property->address->complemento }}, {{ $property->address->bairro }}</p>
            </span>
        </div>

        <div class="row">
            <span class="col s12">
                <h5>Descrição</h5>
                <p>{{ $property->descricao }}</p>
            </span>
        </div>

        <div class="right-align">
            <a href="{{ url()->previous() }}" class="btn-flat waves-effect">Voltar</a>
        </div>
    </section>
@endsection
