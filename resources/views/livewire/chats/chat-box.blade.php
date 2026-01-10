<div class="d-flex flex-column flex-fill">

    <!-- Header -->
    <div class="card-header d-flex align-items-center">
        {{-- <img src="https://i.pravatar.cc/150?img=1" width="45" class="rounded-circle"> --}}

        <div class="d-flex align-items-center justify-content-center rounded-circle
            bg-primary bg-opacity-10 text-dark"
            style="width:48px; height:48px;">

            <i class="fe fe-user fs-4"></i>
        </div>


        <div class="mr-3" wire:poll.2s="loadMessages">
            <h6 class="mb-0">{{ $receviverUser->name ?? '' }}</h6>
            {{-- <small class="text-success">متصل الآن</small> --}}
        </div>
    </div>

    <!-- Messages -->

    @if ($selected_conversation)


        <div class="chat-messages">


            @forelse ($messages as $message)

                <div class="msg {{ $auth_email == $message->sender_email ? 'me' : 'other' }}">
                    {{ $message->body }}
                </div>

            @empty

                <div class="msg other">
                    لايوجد
                </div>
            @endforelse




        </div>

    @endif

</div>
