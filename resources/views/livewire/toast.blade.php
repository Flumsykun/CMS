
<div wire:ignore wire:poll="refreshSession">
    <div x-data="setupToasts(@js($toastList), {{ config('cms.toasts.display_time') }})"
         x-on:toast-fired.window="add($event.detail)"
         class="fixed bottom-0 z-50 p-4 space-y-3 w-full max-w-sm right-0 sm:p-6"
    >
        <template x-for="toast in toasts" :key="toast.uuid">
            <div role="alert"
                 x.show="toast.visible"
                 x-init="$nextTick(() => toast.show($el))"
                 x-transition:enter="transition-all ease-in duration-500"
                 x-transition:enter-start="transform -translate-x-100"
                 x-transition:enter-end="transform translate-x-0"
                 x-transition:leave="transition-all ease-out duration-500"
                 x-transition:leave-start="transform translate-y-0 opacity-100"
                 x-transition:leave-end="transform translate-y-100 opacity-0"
                 class="relative rounded-xl p-4 shadow-xl overflow-hidden"
                 x-bind:class="`toast-border-color ${toast.type}`"
            >
                {{--<div>--}}
                {{--    @foreach($toastList as $toast)--}}
                {{--        <div class="alert alert-{{ $toast['type'] }}">--}}
                {{--            <div class="flex items-center">--}}
                {{--                <div>--}}
                {{--                    {!! $toast['icon'] !!}--}}
                {{--                </div>--}}
                {{--                <div>--}}
                {{--                    <p class="font-bold">{{ $toast['title'] }}</p>--}}
                {{--                    <p>{{ $toast['message'] }}</p>--}}
                {{--                </div>--}}
                {{--            </div>--}}
                {{--        </div>--}}
                {{--    @endforeach--}}
                {{--</div>--}}

                <div class="flex items-start gap-4 w-full">
                    <span x-bind:class="`toast-msg-color ${toast.type}`"
                          x-html="toast.icon"
                    >
                    </span>

                    <div class="flex-1">
                        <strong class="block font-medium break-words" x-bind:class="`toast-msg-color ${toast.type}`"
                                x-text="toast.title"
                        ></strong>

                        <p class="mt-1 text-sm text-gray-700" x-text="toast.message"></p>
                    </div>
                </div>
                    <div x-show="! toast.alwaysShown"
                         class="absolute bottom-0 origin-bottom left-0 w-full rounded-full h-1">
                        <div class="h-full rounded-full" x-bind:style="{width: `${toast.counter}%`}"
                             x-bind:class="`toast-color ${toast.type}`"
                        ></div>
                    </div>
                </div>
        </template>
    </div>
</div>
