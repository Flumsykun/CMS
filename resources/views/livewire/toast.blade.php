<div>
    @foreach($toastList as $toast)
        <div class="alert alert-{{ $toast['type'] }}">
            <div class="flex items-center">
                <div>
                    {!! $toast['icon'] !!}
                </div>
                <div>
                    <p class="font-bold">{{ $toast['title'] }}</p>
                    <p>{{ $toast['message'] }}</p>
                </div>
            </div>
        </div>
    @endforeach
</div>
