<div>
    <div class="card-header bg-light">
        <input type="text" class="form-control" placeholder="بحث...">
    </div>

    <div class="chat-users list-group list-group-flush" wire:poll.2s="loadMessages">
        @forelse ($conversations as $conversation)
            <div class="list-group-item chat-user d-flex align-items-center {{ $selected_conversation && $selected_conversation->id == $conversation->id ? 'active' : '' }}"
                wire:click="chatUserSelected({{ $conversation }},'{{ $this->getUser($conversation, $name = 'id') }}')">
                <div class="position-relative">
                    {{-- <img src="https://i.pravatar.cc/150?img=1" class="rounded-circle" width="45" height="45"> --}}


                    <div class="d-flex align-items-center justify-content-center rounded-circle
            bg-primary bg-opacity-10 text-dark"
                        style="width:48px; height:48px;">

                        <i class="fe fe-user fs-4"></i>
                    </div>


                    @if ($conversation->unreadMessagesCount() > 0)
                        <span
                            class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-success unread-badge">
                            {{ $conversation->unreadMessagesCount() }}
                            <span class="visually-hidden">رسائل غير مقروءة</span>
                        </span>
                    @endif
                </div>
                <div class="mr-3 ml-3 flex-grow-1">
                    <strong>{{ $this->getUser($conversation, $name = 'name') }}</strong>
                    <div class="text-muted small text-truncate" style="max-width: 150px;">
                        @if ($conversation->messages->last())
                            {{ $conversation->messages->last()->body }}
                        @else
                            لا توجد رسائل
                        @endif
                    </div>
                </div>
                <div class="d-flex flex-column align-items-end">
                    <span class="text-muted small">
                        @if ($conversation->messages->last())
                            {{ $conversation->messages->last()->created_at->diffForHumans() }}
                        @endif
                    </span>
                    @if ($conversation->unreadMessagesCount() > 0)
                        <span class="badge badge-primary mt-1">
                            {{ $conversation->unreadMessagesCount() }}
                        </span>
                    @endif
                </div>
            </div>
        @empty
            <div class="text-muted small p-3 text-center">لايوجد محادثات</div>
        @endforelse
    </div>
</div>
