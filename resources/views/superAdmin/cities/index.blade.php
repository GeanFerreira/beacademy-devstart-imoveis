@extends('superAdmin.layouts.main')
@section('main-field')

    <section class="section">
        <table class="highlight">
            <thead>
                <tr>
                    <th>Cidade</th>
                    <th class="right-align">Opções</th>
                </tr>
            </thead>
            <tbody>
                @forelse($cities as $city)
                    <tr>
                        <td>{{ $city->name }}</td>
                        <td class="right-align">
                            <a href="{{ route('admin.cities.edit', $city->id) }}">
                                <span>
                                    <i class="material-icons blue-text text-accent-2">edit</i>
                                </span>
                            </a>

                            <form action="{{ route('admin.cities.destroy', $city->id) }}" method="POST" style="display: inline">
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
                        <td colspan="2">Não existem cidades cadastradas!</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="fixed-action-btn">
            <a class="btn-floating btn-large waves-effect waves-light" href="{{ route('admin.cities.create') }}">
                <i class="large material-icons">add</i>
            </a>
        </div>

    </section>

@endsection
