{{-- resources/views/cocktails/index.blade.php --}}
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Cocktails List</h1>
        <div class="row">
            @foreach ($cocktails as $cocktail)
                <div class="col-md-3 mb-3">
                    <div class="card">
                        <img src="{{ $cocktail['strDrinkThumb'] }}/preview"
                            class="card-img-top" alt="{{ $cocktail['strDrink'] }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $cocktail['strDrink'] }}</h5>
                            <a href="{{ route('cocktails.show', ['id' => $cocktail['idDrink']]) }}"
                                class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
