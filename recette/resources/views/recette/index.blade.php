@extends('layouts.app')
@section('title', 'Recette List')
@section('content')
    <h1 class="mt-5 mb-4">Recette List</h1>
    <div class="row">
        @forelse ($recettes as $recette)
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="card-title">{{ $recette->title }}</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">{{ $recette->description }}</p>
                        <ul class="list-unstyled">
                            <li><strong>Completed:</strong> {{ $recette->completed ? 'Yes' : 'No' }}</li>
                            <li><strong>Due Date:</strong> {{ $recette->due_date }}</li>
                            @isset($recette->category)
                                <li><strong>Category</strong>
                                    {{ $recette->category->category[app()->getLocale()] ?? $recette->category->category['en'] }}</li>
                            @endisset
                            @isset($recette->user->name)
                            <li><strong>Author:</strong> {{ $recette->user->name }}</li>
                            @endisset
                        </ul>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('recette.show', $recette->id) }}" class="btn btn-sm btn-outline-primary">View</a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="alert alert-danger">There are no recettes to display!</div>
        @endforelse
    </div>
@endsection
