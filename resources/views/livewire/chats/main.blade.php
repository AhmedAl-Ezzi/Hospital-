@extends('dashboard.layouts.master')

@section('content')
    <main role="main" class="main-content">

        <style>
            /* ===== Fix Layout ===== */
            .chat-wrapper {
                height: calc(100vh - 200px);
                overflow: hidden;
            }

            /* ===== Users ===== */
            .chat-users {
                height: 100%;
                overflow-y: auto;
                border-left: 1px solid #eee;
                background: #fff;
            }

            .chat-user {
                cursor: pointer;
                transition: .2s;
            }

            .chat-user:hover,
            .chat-user.active {
                background: #f1f5ff;
            }

            .chat-user img {
                width: 45px;
                height: 45px;
                border-radius: 50%;
            }

            /* ===== Messages ===== */
            .chat-messages {
                flex: 1;
                overflow-y: auto;
                padding: 20px;
                background: #f8f9fa;
                display: flex;
                flex-direction: column;
            }

            /* ===== Message bubble ===== */
            .msg {
                max-width: 70%;
                padding: 12px 16px;
                border-radius: 14px;
                margin-bottom: 10px;
                font-size: 14px;
                line-height: 1.6;
            }

            /* المرسل */
            .msg.me {
                background: #4f46e5;
                color: #fff;
                align-self: flex-start;
                border-bottom-right-radius: 4px;
            }

            /* المستقبل */
            .msg.other {
                background: #fff;
                border: 1px solid #ddd;
                color: #333;
                align-self: flex-end;
                border-bottom-left-radius: 4px;
            }

            /* ===== Footer ===== */
            .chat-footer {
                border-top: 1px solid #ddd;
                padding: 10px;
                background: #fff;
            }

            .chat-footer input {
                border-radius: 20px;
            }



            /* يجعل الكارد كله بطول السيدر */
            .chat-users-wrapper,
            .card.h-100 {
                height: 100%;
            }

            /* الهيدر (البحث) يبقى ثابت */
            .card-header {
                flex-shrink: 0;
            }

            /* قائمة المحادثات */
            .chat-users {
                height: calc(100vh - 260px);
                /* عدل الرقم حسب الهيدر والفوتر */
                overflow-y: auto;
            }

            /* تحسين شكل السكرول */
            .chat-users::-webkit-scrollbar {
                width: 6px;
            }

            .chat-users::-webkit-scrollbar-thumb {
                background-color: #d1d5db;
                border-radius: 10px;
            }







            /* نضمن أن .card.h-100 يعرض محتواه بشكل عمودي ويملأ الارتفاع */
            .card.h-100 {
                display: flex;
                flex-direction: column;
            }

            /* نضمن أن .d-flex.flex-column.flex-fill يأخذ المساحة المتبقية */
            .d-flex.flex-column.flex-fill {
                flex: 1;
                overflow: hidden;
                /* حتى نمنع أي تجاوز */
            }

            /* ثم نحدد أن .chat-messages يأخذ كل المساحة المتبقية ويمكن التمرير */
            .chat-messages {
                flex: 1;
                overflow-y: auto;
                min-height: 0;
                /* مهم لتفعيل التمرير في بيئة flex */
            }







            /* إضافة إلى قسم الـ style */
            .unread-badge {
                font-size: 10px;
                padding: 3px 6px;
                min-width: 18px;
                height: 18px;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .list-group-item .badge-primary {
                background-color: #4f46e5;
                color: white;
                border-radius: 10px;
                padding: 4px 8px;
                font-size: 11px;
                font-weight: bold;
            }

            /* تحسين ظهور العداد على الصورة */
            .position-relative {
                position: relative;
            }

            .position-absolute {
                position: absolute;
            }

            .top-0 {
                top: 0;
            }

            .start-100 {
                left: 100%;
            }

            .translate-middle {
                transform: translate(-50%, -50%);
            }

            /* تنسيق النصوص في قائمة المحادثات */
            .text-truncate {
                overflow: hidden;
                text-overflow: ellipsis;
                white-space: nowrap;
            }

            /* تحسين مظهر العنصر النشط */
            .list-group-item.active {
                background-color: #f1f5ff !important;
                border-color: #dee2e6 !important;
                color: #000 !important;
            }
        </style>

        <div class="row chat-wrapper">

            <!-- Users -->
            <div class="col-lg-4 col-md-5 h-100">
                <div class="card h-100">
                    @livewire('chats.chat-list')
                </div>
            </div>

            <!-- Messages -->
            <div class="col-lg-8 col-md-7 h-100">
                <div class="card h-100 d-flex flex-column">

                    {{-- Inbox --}}
                    @livewire('chats.chat-box')

                    {{-- Send Message --}}
                    @livewire('chats.send-message')

                </div>
            </div>

        </div>

    </main>
@endsection
