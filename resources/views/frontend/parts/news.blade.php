@component('frontend.components.homepage-block')
    <div class="mx-auto max-w-7xl">
        <div class="mx-auto max-w-2xl lg:mx-0">
            <h2 class="text-3xl font-bold tracking-tight text-black sm:text-4xl">Laatste nieuws</h2>
{{--            <p class="mt-2 text-lg leading-8 text-gray-600">Learn how to grow your business with our expert advice.</p>--}}
        </div>
        <div class="mx-auto mt-10 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 border-t border-gray-200 pt-10 sm:mt-16 sm:pt-16 lg:mx-0 lg:max-w-none lg:grid-cols-3">
            @foreach($newsPosts as $newsPost)
            <article class="flex max-w-xl flex-col items-start justify-between">
                <div class="group relative">
                    <h3 class="mt-3 text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600">
                        <a href="{{ route('news.show', compact('newsPost')) }}">
                            <span class="absolute inset-0"></span>
                            {{ $newsPost->title }}
                        </a>
                    </h3>
                    <div class="flex items-center gap-x-4 text-xs pt-2">
                        <time datetime="2020-03-16" class="text-gray-500">{{ $newsPost->created_at->format('d-m-Y') }}</time>
                    </div>
                    <p class="mt-5 line-clamp-3 text-sm leading-6 text-gray-600">{!! $newsPost->teaser !!}</p>
                </div>
                <div class="mt-10 flex items-center gap-x-6">
                    {{--                            <a href="#" class="rounded-md bg-voot-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-voot-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-voot-600">Get started</a>--}}
                    <a href="{{ route('news.show', compact('newsPost')) }}" class="text-sm font-semibold leading-6 text-gray-900">Lees verder <span aria-hidden="true">→</span></a>
                </div>
            </article>
            @endforeach
        </div>
    </div>
@endcomponent
