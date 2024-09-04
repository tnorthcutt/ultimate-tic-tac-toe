@extends('layouts.app')

@section('content')
    <h1>Welcome to Tic-Tac-Toe</h1>
    <a href="{{ url('/game') }}" class="button">Create New Game</a>
@endsection
