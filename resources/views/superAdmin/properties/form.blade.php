@extends('superAdmin.layouts.main')
@section('main-field')

    <section class="section">
        <form action="{{ $action }}" method="POST">
            @csrf
            @isset($property)
                @method('PUT')
            @endisset

            <div class="row">
                <div class="input-field col s12">
                    <label for="title">Título</label>
                    <input type="text" name="title" id="title" value="{{ old('title', $property->title ?? '') }}">
                    @error('title')
                        <span class="red-text text-accent-3"><small>{{ $message }}</small></span>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12">
                    <select name="city_id" id="city_id">
                        <option value="" disabled selected>Selecione uma cidade</option>
                        @foreach($cities as $city)
                            <option value="{{ $city->id }}" {{ old('city_id', $property->city->id ?? '') == $city->id ? 'selected' : '' }}>{{ $city->name }}</option>
                        @endforeach
                    </select>
                    <label for="city_id">Cidade</label>
                    @error('city_id')
                        <span class="red-text text-accent-3"><small>{{ $message }}</small></span>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12">
                    <select name="type_id" id="type_id">
                        <option value="" disabled selected>Selecione um tipo de imóvel</option>
                        @foreach($types as $type)
                            <option value="{{ $type->id }}" {{ old('type_id', $property->type->id ?? '') == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
                        @endforeach
                    </select>
                    <label for="type_id">Tipo de Imóvel</label>
                    @error('type_id')
                        <span class="red-text text-accent-3"><small>{{ $message }}</small></span>
                    @enderror
                </div>
            </div>

            <div>
                @foreach($goals as $goal)
                    <span>
                        <label style="margin-right: 30px">
                            <input type="radio" name="goal_id" id="goal_id" class="with-gap" value="{{ $goal->id }}" {{ old('goal_id', $property->goal->id ?? '') == $goal->id ? 'checked' : '' }}>
                            <span>{{ $goal->name }}</span>
                        </label>
                    </span>
                @endforeach
                    @error('goal_id')
                        <span class="red-text text-accent-3"><small>{{ $message }}</small></span>
                    @enderror
            </div>
            {{-- Preço Dormitórios Salas --}}
            <div class="row">
                <div class="input-field col s4">
                    <label for="preco">Preço</label>
                    <input type="number" name="preco" id="preco" value="{{ old('preco', $property->preco ?? '') }}">
                    @error('preco')
                        <span class="red-text text-accent-3"><small>{{ $message }}</small></span>
                    @enderror
                </div>

                <div class="input-field col s4">
                    <label for="dormitorios">Dormitórios</label>
                    <input type="number" name="dormitorios" id="dormitorios" value="{{ old('dormitorios', $property->preco ?? '') }}">
                    @error('dormitorios')
                        <span class="red-text text-accent-3"><small>{{ $message }}</small></span>
                    @enderror
                </div>

                <div class="input-field col s4">
                    <label for="salas">Salas</label>
                    <input type="number" name="salas" id="salas" value="{{ old('salas', $property->salas ?? '') }}">
                    @error('salas')
                        <span class="red-text text-accent-3"><small>{{ $message }}</small></span>
                    @enderror
                </div>
            </div>
            {{-- Terreno Banheiros Garagens --}}
            <div class="row">
                <div class="input-field col s4">
                    <label for="terreno">Área m²</label>
                    <input type="number" name="terreno" id="terreno" value="{{ old('terreno', $property->terreno ?? '') }}">
                    @error('terreno')
                        <span class="red-text text-accent-3"><small>{{ $message }}</small></span>
                    @enderror
                </div>

                <div class="input-field col s4">
                    <label for="banheiros">Quantidade de banheiros</label>
                    <input type="number" name="banheiros" id="banheiros">
                    @error('banheiros')
                        <span class="red-text text-accent-3"><small>{{ $message }}</small></span>
                    @enderror
                </div>

                <div class="input-field col s4">
                    <label for="garagens">Vagas de garagens</label>
                    <input type="number" name="garagens" id="garagens" value="{{ old('garagens', $property->garagens ?? '') }}">
                    @error('garagens')
                        <span class="red-text text-accent-3"><small>{{ $message }}</small></span>
                    @enderror
                </div>
            </div>
            {{-- Descrição --}}
            <div class="row">
                <div class="input-field col s12">
                    <label for="descricao">Descrição</label>
                    <textarea name="descricao" id="descricao" class="materialize-textarea"></textarea>
                </div>
                @error('descricao')
                    <span class="red-text text-accent-3"><small>{{ $message }}</small></span>
                @enderror
            </div>
            {{-- Endereço --}}
            <div class="row">
                <div class="input-field col s5">
                    <label for="rua">Rua</label>
                    <input type="text" name="rua" id="rua" value="{{ old('rua', $property->address->rua ?? '') }}">
                    @error('rua')
                        <span class="red-text text-accent-3"><small>{{ $message }}</small></span>
                    @enderror
                </div>
                <div class="input-field col s2">
                    <label for="numero">numero</label>
                    <input type="number" name="numero" id="numero" value="{{ old('numero', $property->address->numero ?? '') }}">
                    @error('numero')
                        <span class="red-text text-accent-3"><small>{{ $message }}</small></span>
                    @enderror
                </div>
                <div class="input-field col s2">
                    <label for="complemento">complemento</label>
                    <input type="text" name="complemento" id="complemento" value="{{ old('complemento', $property->address->complemento ?? '') }}">
                    @error('complemento')
                        <span class="red-text text-accent-3"><small>{{ $message }}</small></span>
                    @enderror
                </div>
                <div class="input-field col s3">
                    <label for="bairro">Bairro</label>
                    <input type="text" name="bairro" id="bairro" value="{{ old('bairro', $property->address->bairro ?? '') }}">
                    @error('bairro')
                        <span class="red-text text-accent-3"><small>{{ $message }}</small></span>
                    @enderror
                </div>
            </div>

            {{--<div class="row">
                <div class="input-field col s12">
                    <select name="neighborhoods[]" id="neighborhoods" multiple>
                        <option value="" disabled selected>Selecione os pontos de interesse nas proximidades</option>

                        @foreach($neighborhoods as $neighborhood)
                            <option value="{{ $neighborhood->id }}"
                                    @if(old('neighborhoods'))
                                        {{ in_array($neighborhood->id, old('neighborhoods')) ? 'selected' : '' }}
                                    @else
                                        @isset($property)
                                            {{ $property->$neighborhoods->contains($neighborhood->id) ? 'selected' : '' }}
                                        @endisset
                                    @endif
                            >{{ $neighborhood->name }}</option>
                        @endforeach

                    </select>
                    <label for="neighborhoods">Pontos de interesse nas proximidades</label>
                    @error('neighborhoods')
                        <span class="red-text text-accent-3"><small>{{ $message }}</small></span>
                    @enderror
                </div>
            </div>--}}

            <div class="right-align">
                <a href="{{ route('admin.properties.index') }}" class="btn-flat waves-effect">Cancelar</a>
                <button class="btn waves-effect waves-light" type="submit">Salvar</button>
            </div>
        </form>
    </section>

@endsection
