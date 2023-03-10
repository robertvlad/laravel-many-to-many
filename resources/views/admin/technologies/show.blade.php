@extends('layouts.admin');

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
            <h2 class="py-3">Technology name: {{ $technology->name }}</h2>
            @if(session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}    
                </div>            
            @endif
            <div class="d-flex gap-3 pb-3">
                <a href="{{ route('admin.technologies.index') }}" class="btn btn-square btn-primary">Torna all'elenco</a>
                <a href="{{ route('admin.technologies.edit', $technology->slug) }}" title="Modifica tipologia" class="btn btn-square btn-warning">
                    Modifica
                </a>
                <form class="d-inline-block" action="{{ route('admin.technologies.destroy', $technology->slug) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-square btn-danger">
                        Elimina
                    </button>
                </form>
            </div>
            <div>
                <p>Slug: {{ $technology->slug }}</p>
            </div>
            <div class="col-12">
                <h4>Post con questa Technology: {{ count($technology->posts) }}</h4>
                <div class="row">
                    @forelse ($technology->posts as $post)
                    <div class="col-6">
                        <div class="card text-center m-3 p-2 bg-dark text-light">
                            <h4>{{ $post->title }}</h4>
                            <h6>Creato il: {{ $post->created_at }}</h6>
                            <a class="btn btn-primary btn-sm" href="{{ route('admin.technologies.show', $post->slug) }}">Apri il post</a> 
                        </div>    
                    </div>                    
                @empty
                    <h6 class="text-center">Non ci sono posto per questa categoria</h6>
                @endforelse
                </div>               
            </div>
        </div>
    </div>
</div>

@endsection