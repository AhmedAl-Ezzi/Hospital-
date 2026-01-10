<div>

@if ($selected_conversation)

<form wire:submit.prevent="sendMessage">

        <div class="chat-footer d-flex align-items-center">

            {{-- <button class="btn btn-light mr-2">
        <i class="fe fe-paperclip"></i>
    </button> --}}

            <input type="text" wire:model="body" class="form-control" placeholder="اكتب رسالتك هنا...">

            <button type="submit" class="btn btn-primary ml-2">
                <i class="fe fe-send"></i>
            </button>

        </div>

    </form>

    @endif

</div>
