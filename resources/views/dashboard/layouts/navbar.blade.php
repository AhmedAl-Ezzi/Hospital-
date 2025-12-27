<nav class="topnav navbar navbar-light bg-white">
    <button type="button" class="navbar-toggler text-muted mt-2 p-0 mr-3 collapseSidebar">
        <i class="fe fe-menu navbar-toggler-icon"></i>
    </button>

    <form class="form-inline mr-auto searchform text-muted">
        <input class="form-control mr-sm-2 bg-transparent border-0 pl-4 text-muted" type="search" placeholder="بحث..."
            aria-label="Search">
    </form>

    <ul class="nav">

        {{-- الوضع الليلي --}}
        <li class="nav-item">
            <a class="nav-link text-muted my-2" href="#" id="modeSwitcher">
                <i class="fe fe-sun fe-16"></i>
            </a>
        </li>

        {{-- الجرس --}}
        <li class="nav-item nav-notif">
            <a class="nav-link text-muted my-2" href="#" data-toggle="modal" data-target="#notificationsModal">
                <i class="fe fe-bell fe-16"></i>
                <span id="notif-count" class="badge badge-danger"
                    style="position:absolute; top:10px; right:8px;">0</span>
            </a>
        </li>

        {{-- اسم المستخدم --}}
        <li class="nav-item">
            <p class="nav-link text-muted my-1">{{ auth()->user()->name }}</p>
        </li>

        {{-- الصورة --}}
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-muted pr-0" href="#" data-toggle="dropdown">
                <span class="avatar avatar-sm mt-2">
                    <img src="{{ asset('dashboard/assets/avatars/face-1.jpg') }}" class="avatar-img rounded-circle">
                </span>
            </a>

            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="#">الملف الشخصي</a>

                <!-- Authentication -->

                @if (auth('web')->check())
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a class="dropdown-item" href="#"
                            onclick="event.preventDefault(); this.closest('form').submit();">تسجيل خروج</a>
                    </form>
                @elseif(auth('admin')->check())
                    <form method="POST" action="{{ route('logout.admin') }}">
                        @csrf
                        <a class="dropdown-item" href="#"
                            onclick="event.preventDefault(); this.closest('form').submit();">تسجيل خروج</a>
                    </form>
                @elseif(auth('doctor')->check())
                    <form method="POST" action="{{ route('logout.doctor') }}">
                        @csrf
                        <a class="dropdown-item" href="#"
                            onclick="event.preventDefault(); this.closest('form').submit();">تسجيل خروج</a>
                    </form>
                @elseif(auth('ray_employee')->check())
                    <form method="POST" action="{{ route('logout.ray_employee') }}">
                        @csrf
                        <a class="dropdown-item" href="#"
                            onclick="event.preventDefault(); this.closest('form').submit();">تسجيل خروج</a>
                    </form>
                @elseif(auth('laboratorie_employee')->check())
                    <form method="POST" action="{{ route('logout.laboratorie_employee') }}">
                        @csrf
                        <a class="dropdown-item" href="#"
                            onclick="event.preventDefault(); this.closest('form').submit();">تسجيل خروج</a>
                    </form>
                @elseif(auth('patient')->check())
                    <form method="POST" action="{{ route('logout.patient') }}">
                        @csrf
                        <a class="dropdown-item" href="#"
                            onclick="event.preventDefault(); this.closest('form').submit();">تسجيل خروج</a>
                    </form>
                @endif

            </div>
        </li>
    </ul>
</nav>

{{-- مودال الإشعارات --}}
{{-- <div class="modal fade" id="notificationsModal">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">الإشعارات</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <ul class="list-group" id="notif-list">
                    <li class="list-group-item text-muted text-center">
                        لا توجد إشعارات
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div> --}}








<div class="modal fade notificationsModal modal-slide dropdown-notifications" id="notificationsModal" tabindex="-1"
    role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="defaultModalLabel">الاشعارات</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="list-group list-group-flush my-n3">


                    <div class="modal-content">

                        <div class="modal-body">
                            <ul class="list-group" id="notif-list">
                                <li class="list-group-item text-muted text-center">
                                    لا توجد إشعارات
                                </li>
                            </ul>
                        </div>
                    </div>
                </div> <!-- / .list-group -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal">Clear
                    All</button>
            </div>
        </div>
    </div>
</div>






{{-- jQuery --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

{{-- <script>
    function loadNotifications() {
        $.get("{{ route('notifications.fetch') }}", function(res) {

            $('#notif-count').text(res.count);

            let list = $('#notif-list');
            list.empty();

            if (res.data.length === 0) {
                list.append(`<li class="list-group-item text-muted text-center">
                    لا توجد إشعارات
                </li>`);
                return;
            }

            res.data.forEach(n => {
                list.append(`
                    <li class="list-group-item">
                        <strong>${n.message}</strong>
                        <div class="small text-muted">${n.description ?? ''}</div>
                        <div class="small text-muted">${n.created_at}</div>

                    </li>
                `);
            });
        });
    }

    loadNotifications();
    setInterval(loadNotifications, 5000);

</script> --}}





{{--
<script>
    function loadNotifications() {
        $.get("{{ route('notifications.fetch') }}", function(res) {

            $('#notif-count').text(res.count);

            let list = $('#notif-list');
            list.empty();

            if (res.data.length === 0) {
                list.append(`
                    <li class="list-group-item text-muted text-center">
                        لا توجد إشعارات
                    </li>
                `);
                return;
            }

            res.data.forEach(n => {
                list.append(`
                    <li class="list-group-item">
                        <strong>${n.message}</strong>
                        <div class="small text-muted">${n.description ?? ''}</div>
                        <div class="small text-muted">${n.formatted_date}</div>
                    </li>
                `);
            });
        });
    }

    loadNotifications();
    setInterval(loadNotifications, 5000);
</script> --}}
