@extends('master.master')
@section('title','profile')
    @section('content')
    <profile-page username="{{$username}}" />
@endsection