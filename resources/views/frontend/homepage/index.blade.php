@extends('frontend.layout')

@section('frontend_content')
    <div class="relative isolate overflow-hidden bg-gradient-to-b from-voot-100/20 pt-14">
        <div class="mx-auto max-w-7xl px-6 py-32 xs:py-16 md:py-24 lg:px-8">
            <h1 class="w-full text-4xl font-bold tracking-tight text-voot-500 sm:text-6xl lg:col-span-2 xl:col-auto">Vereniging Ondernemers Oude-Tonge</h1>
            <h3 class="w-full text-2xl font-bold tracking-tight text-black sm:text-2xl lg:col-span-2 xl:col-auto">Samen Sterker Ondernemen</h3>
            <div class="mt-10 mx-auto max-w-2xl lg:mx-0 lg:grid lg:max-w-none lg:grid-cols-2 lg:gap-x-16 lg:gap-y-6 xl:grid-cols-1 xl:grid-rows-1 xl:gap-x-8">
                {!! $template !!}
            </div>
        </div>
        <div class="absolute inset-x-0 bottom-0 -z-10 h-24 bg-gradient-to-t from-white sm:h-32"></div>
    </div>

    @include('frontend.parts.upcoming-events', compact('events'))

    @include('frontend.parts.news', compact('newsPosts'))
@endsection
