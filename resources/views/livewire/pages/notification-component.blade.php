<div>
    {{ dd($notifications) }}
    @foreach ($notifications as $notification)
        <div class="alert alert-success">
            {{ $notification->data['message'] }}
        </div>
    @endforeach
</div>
