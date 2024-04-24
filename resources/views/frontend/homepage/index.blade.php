@extends('layouts.layout')

@section('frontend_content')
 

    @include('frontend.parts.upcoming-events', compact('events'))

    @include('frontend.parts.news', compact('newsPosts'))
@endsection
