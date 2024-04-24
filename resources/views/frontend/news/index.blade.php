@extends('layouts.layout')

@section('frontend_content')
    @php
        $first = $newsPosts->shift();
    @endphp

@endsection
