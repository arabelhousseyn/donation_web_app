@extends('master.master')
@section('title','donation')
    @section('content')
      @if ($code !== "")
      <recover-page code="{{$code}}" />
      @else
          <script>
              location..href = "../index"
          </script>
      @endif
@endsection