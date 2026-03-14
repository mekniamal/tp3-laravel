@extends('layouts.app')

@section('title', 'Modifier la tâche')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Modifier la tâche</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('tasks.update', $task) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="mb-3">
                    <label for="title" class="form-label">Titre</label>
                    <input type="text" name="title" id="title" 
                           class="form-control @error('title') is-invalid @enderror" 
                           value="{{ old('title', $task->title) }}">
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" id="description" 
                              class="form-control">{{ old('description', $task->description) }}</textarea>
                </div>

                <div class="mb-3 form-check">
                    <input type="checkbox" name="completed" id="completed" 
                           class="form-check-input" {{ $task->completed ? 'checked' : '' }}>
                    <label for="completed" class="form-check-label">Marquer comme terminée</label>
                </div>

                <button type="submit" class="btn btn-success">Mettre à jour</button>
                <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Annuler</a>
            </form>
        </div>
    </div>
@endsection