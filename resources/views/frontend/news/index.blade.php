@extends('frontend.layout')

@section('frontend_content')
    @php
        $first = $newsPosts->shift();
    @endphp

    <div class="bg-white py-24 sm:py-32">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl sm:text-center">
                {!! $template !!}
            </div>
        </div>

        <div class="mt-10 mx-auto grid max-w-7xl grid-cols-1 gap-x-8 gap-y-12 px-6 sm:gap-y-16 lg:grid-cols-2 lg:px-8">
            <article class="mx-auto w-full max-w-2xl lg:mx-0 lg:max-w-lg">
                <h2 id="featured-post" class="mt-4 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
                    <a href="{{ route('news.show', ['newsPost' => $first]) }}">
                    {{ $first->title }}
                </h2>
                <time datetime="{{ $first->published_at->format('Y-m-d') }}"
                      class="block text-sm leading-6 text-gray-600 pt-2">{{ $first->published_at->format('d-m-Y') }}</time>
                <p class="mt-4 text-lg leading-8 text-gray-600">{!! $first->teaser !!}</p>
                <div
                    class="mt-4 flex flex-col justify-between gap-6 sm:mt-8 sm:flex-row-reverse sm:gap-8 lg:mt-4 lg:flex-col">
                    <div class="flex">
                        <a href="{{ route('news.show', ['newsPost' => $first]) }}"
                           class="text-sm font-semibold leading-6 text-voot-600" aria-describedby="featured-post">Lees
                            verder <span aria-hidden="true">&rarr;</span></a>
                    </div>
                </div>
            </article>
            <div
                class="mx-auto w-full max-w-2xl border-t border-gray-900/10 pt-12 sm:pt-16 lg:mx-0 lg:max-w-none lg:border-t-0 lg:pt-0">
                <div class="-my-12 divide-y divide-gray-900/10">
                    @foreach($newsPosts as $newsPost)
                        <article class="py-12">
                            <div class="group relative max-w-xl">
                                <h2 class="mt-2 text-lg font-semibold text-gray-900 group-hover:text-gray-600">
                                    <a href="{{ route('news.show', compact('newsPost')) }}">
                                        <span class="absolute inset-0"></span>
                                        {{ $newsPost->title }}
                                    </a>
                                </h2>

                                <time datetime="{{ $newsPost->published_at->format('Y-m-d') }}"
                                      class="block text-sm leading-6 text-gray-600 pt-2">{{ $newsPost->published_at->format('d-m-Y') }}</time>

                                <p class="mt-4 text-sm leading-6 text-gray-600">{!! \App\Helpers\Str::limit($newsPost->teaser, 200) !!}</p>
                            </div>
                            <div class="mt-4 flex">
                                <div class="flex">
                                    <a href="{{ route('news.show', compact('newsPost')) }}"
                                       class="text-sm font-semibold leading-6 text-voot-600"
                                       aria-describedby="featured-post">Lees verder <span
                                            aria-hidden="true">&rarr;</span></a>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
