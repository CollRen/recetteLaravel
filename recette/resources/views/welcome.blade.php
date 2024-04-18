@extends('layouts.app')
@section('title', trans('lang.text_welcome'))
@section('content')
<div class="container">
    <div class="row justify-content-center my-5">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h1 class="text-center">@lang('lang.text_welcome_title')</h1>
                </div>
                <div class="card-body">
                    @lang('lang.text_welcome_paragraph')
                </div>
                <div class="card-footer text-center">
                    <a href="{{ route('recette.index') }}" class="btn btn-primary">@lang('lang.text_welcome_btn')</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
{{--  
<div class="container">
    <div class="row justify-content-center my-5">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h1 class="text-center">Welcome to Todo List App</h1>
                </div>
                <div class="card-body">
                    <p class="lead">This is a simple todo list application built with Laravel and Bootstrap.</p>
                    <p>Get started by creating your first recette!</p>
                </div>
                <div class="card-footer text-center">
                    <a href="{{ route('recette.index') }}" class="btn btn-primary">Go to Todo List</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
--}}