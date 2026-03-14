@extends('layouts.app')

@section('title', 'Mes Tâches')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Mes Tâches <span class="badge bg-secondary">{{ $tasks->count() }}</span></h1>
        <a href="{{ route('tasks.create') }}" class="btn btn-primary">+ Nouvelle Tâche</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @forelse($tasks as $task)
        <div class="card mb-2 {{ $task->completed ? 'border-success' : '' }}">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="{{ $task->completed ? 'text-decoration-line-through text-muted' : '' }}">
                        {{ $task->title }}
                    </h5>
                    @if($task->description)
                        <p class="mb-0 text-muted">{{ $task->description }}</p>
                    @endif
                </div>
                <div class="d-flex gap-2">
                    <a href="{{ route('tasks.edit', $task) }}" class="btn btn-sm btn-warning">Modifier</a>
                    <form action="{{ route('tasks.destroy', $task) }}" method="POST" onsubmit="return confirm('Supprimer cette tâche ?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Supprimer</button>
                    </form>
                </div>
            </div>
        </div>
    @empty
        <div class="alert alert-info">
            Aucune tâche. <a href="{{ route('tasks.create') }}" class="alert-link">Créer votre première tâche</a>
        </div>
    @endforelse
@endsection