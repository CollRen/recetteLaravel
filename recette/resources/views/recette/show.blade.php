@extends('layouts.app')
@section('title', 'Recette')
@section('content')
    <h1 class="mt-5 mb-4">Recette</h1>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-5">
                <div class="card-header">
                    <h5 class="card-title">{{ $recette->title }}</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">{{ $recette->description }}</p>
                    <ul class="list-unstyled">
                        <li><strong>Completed:</strong> {{ $recette->completed ? 'Yes' : 'No' }}</li>
                        <li><strong>Due Date:</strong> {{ $recette->due_date }}</li>
{{--                         <li><strong>Author:</strong> {{ $recette->user->name }}</li> pour l'instant ça marche pas --}}
                        <li><strong>Category:</strong>
                            {{ $recette->category ? $recette->category->category[app()->getLocale()] ?? $recette->category->category['en'] : '' }}
                        </li>
                    </ul>
                </div>
                <div class="card-footer d-flex justify-content-between">
                    <a href="{{ route('recette.edit', $recette->id) }}" class="btn btn-sm btn-outline-success">Edit</a>
                    <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal"
                        data-bs-target="#deleteModal">
                        Delete
                    </button>
                </div>
            </div>
        </div>
    </div>
    {{-- Bootstrap Modal --}}
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 text-danger" id="DeleteModalLabel">DELETE</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure to delete this recette?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <form method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
