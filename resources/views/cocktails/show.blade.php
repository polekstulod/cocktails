{{-- resources/views/cocktails/show.blade.php --}}
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $cocktail->name }}</h1>
        <div class="row">
            <div class="col-md-6">
                <img src="{{ $cocktail->thumbnail }}" class="img-fluid"
                    alt="{{ $cocktail->name }}">
            </div>
            <div class="col-md-6">
                <h3>Ingredients</h3>
                <ul>
                    @foreach ($cocktail->ingredients as $ingredient)
                        <li>{{ $ingredient['ingredient'] }}:
                            {{ $ingredient['measure'] }}</li>
                    @endforeach
                </ul>
                <h3>Instructions</h3>
                <p>{{ $cocktail->instructions }}</p>
                <a href="{{ route('cocktails.index') }}" class="btn btn-primary">Back
                    to List</a>
            </div>
        </div>
    </div>
@endsection
