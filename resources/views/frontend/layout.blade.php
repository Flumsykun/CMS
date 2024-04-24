@extends('layouts.app')

@section('content')
    <div class="bg-white">
        <livewire:frontend.menu/>

        @yield('frontend_content')
    </div>
    @include('frontend.parts.footer')
@endsection
