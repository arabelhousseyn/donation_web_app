@extends('master.master')
@section('title','verification')
    @section('content')
    @if (Session::has("username"))
    <ver-page />  
    @else
      <script>
          location.href = "index/";
      </script>
    @endif
@endsection