@extends('admin.layouts.main')
@section('main-field')

    <section class="section">

        <table class="highlight">
            <thead>
                <tr>
                    <th>Cidade</th>
                    <th>Bairro</th>
                    <th>Título</th>
                    <th>Opções</th>
                </tr>
            </thead>
            <tbody>
                @forelse($properties as $property)
                    <tr>
                        <td>{{ $property->city->name }}</td>
                        <td>{{ $property->address->bairro }}</td>
                        <td>{{ $property->title }}</td>
                        <td>
                            Editar - Remover
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">Não existe imóveis cadastrados.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="fixed-action-btn">
            <a class="btn-floating btn-large waves-effect waves-light" href="{{ route('admin.properties.create') }}">
                <i class="large material-icons">add</i>
            </a>
        </div>
    </section>

@endsection
