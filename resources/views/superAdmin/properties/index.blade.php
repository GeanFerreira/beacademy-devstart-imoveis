@extends('superAdmin.layouts.main')
@section('main-field')

    {{-- Filtro de Pesquisa --}}
    <section class="section">
        <form action="{{ route('admin.properties.index') }}" method="GET">
            <div class="row valign-wrapper">

                <div class=" input-field col s6">
                    <select name="city_id" id="city">
                        <option value="">Selecione uma cidade</option>

                        @foreach($cities as $city)
                            <option value="{{ $city->id }}" {{ $city->id == $city_id ? 'selected' : '' }}>{{ $city->name }}</option>
                        @endforeach

                    </select>
                </div>

                    <div class="input-field col s6">
                        <label for="title">Título</label>
                        <input type="text" name="title" id="title" value="{{ $title }}">
                    </div>
            </div>

            <div class="row right-align">
                <a href="{{ route('admin.properties.index') }}" class="bt-flat waves-effect" style="margin-right: 12px">EXIBIR TODOS</a>
                <button type="submit" class="btn waves-effect waves-light">PESQUISAR</button>
            </div>

        </form>
    </section>

    <hr>

    <section class="section">

        <table class="highlight">
            <thead>
                <tr>
                    <th>Cidade</th>
                    <th>Bairro</th>
                    <th>Título</th>
                    <th class="right-align">Opções</th>
                </tr>
            </thead>
            <tbody>
                @forelse($properties as $property)
                    <tr>
                        <td>{{ $property->city->name }}</td>
                        <td>{{ $property->address->bairro }}</td>
                        <td>{{ $property->title }}</td>
                        <td class="right-align">

                            {{--rota aninhada--}}
                            <a href="{{ route('admin.properties.pictures.index', $property->id) }}" title="fotos">
                                <span>
                                    <i class="material-icons green-text text-lighten-1">insert_photo</i>
                                </span>
                            </a>

                            <a href="{{ route('admin.properties.show', $property->id) }}" title="ver">
                                <span>
                                    <i class="material-icons indigo-text text-dark-2">remove_red_eye</i>
                                </span>
                            </a>

                            <a href="{{ route('admin.properties.edit', $property->id) }}" title="editar" l>
                                <span>
                                    <i class="material-icons blue-text text-accent-2">edit</i>
                                </span>
                            </a>

                            <form action="{{ route('admin.properties.destroy', $property->id) }}" method="POST" style="display: inline" title="remover">
                                @csrf
                                @method('DELETE')

                                <button style="border:0;background:transparent;" type="submit">
                                    <span style="cursor: pointer">
                                        <i class="material-icons red-text text-accent-3">delete</i>
                                    </span>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">Não existe imóveis cadastrados ou imóveis que atendam aos critérios de pesquisa.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="center">
            {{ $properties->links('shared.pagination') }}
        </div>

        <div class="fixed-action-btn">
            <a class="btn-floating btn-large waves-effect waves-light" href="{{ route('admin.properties.create') }}">
                <i class="large material-icons">add</i>
            </a>
        </div>
    </section>

@endsection
