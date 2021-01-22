@extends('master.master')
@section('title',"email")
    @section('content')
        <h1> {{ $details['title'] }} </h1>
        <p>{{ $details['body'] }}</p>
    
@endsection