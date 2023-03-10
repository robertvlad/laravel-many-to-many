@extends('layouts.admin');

@section('content')
    
<div class="container">
    <div class="row">
        <div class="col-12 my-5">
            <div>
                <h2>Elenco Technologies</h2>
            </div>
            <div class="d-flex gap-3">
                <a href="{{ route('admin.technologies.create') }}" class="btn btn-primary">Aggiungi Technology</a>
            </div>
        </div>
        <div class="co-12 my-5">
            <table class="table table-striped">
                <thead>
                    <th>ID</th>
                    <th>NOME</th>
                    <th>SLUG</th>
                    <th>AZIONI</th>
                </thead>
                <tbody>
                    @foreach ($technologies as $technology)
                    <tr>
                        <td>{{ $technology->id }}</td>
                        <td>{{ $technology->name }}</td>
                        <td>{{ $technology->slug }}</td>
                        <td>
                            <a href="{{ route('admin.technologies.show', $technology->slug) }}" title="Visualizza Technology" class="btn btn-square btn-primary btn-sm">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('admin.technologies.edit', $technology->slug) }}" title="Modifica Technology" class="btn btn-square btn-warning btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form class="d-inline-block" action="{{ route('admin.technologies.destroy', $technology->slug) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-square btn-danger" title="Elimina Technology">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>                        
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection