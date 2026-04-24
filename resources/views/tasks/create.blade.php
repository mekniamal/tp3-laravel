 
@extends('layouts.app') 
@section('content') 
<div class="card"> 
  <div class="card-header"><h4>Nouvelle Tâche</h4></div>  
  <div class="card-body"> 
    <form action="{{ route('tasks.store') }}" method="POST"> 
      @csrf 
      <div class="mb-3"> 
        <label>Titre *</label> 
        <input type="text" name="title" 
               class="form-control @error('title') is-invalid @enderror" 
               value="{{ old('title') }}"> 
        @error('title') 
          <div class="invalid-feedback">{{ $message }}</div> 
        @enderror 
      </div> 
      <div class="mb-3"> 
        <label>Description</label> 
        <textarea name="description" class="form-control">{{ old('description') 
}}</textarea> 
      </div> 
      <button type="submit" class="btn btn-success">Enregistrer</button> 
      <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Annuler</a> 
    </form> 
  </div> 
</div> 
@endsection 