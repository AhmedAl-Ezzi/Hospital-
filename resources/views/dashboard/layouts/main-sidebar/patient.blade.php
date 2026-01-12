<nav class="vertnav navbar navbar-light">
    <!-- Logo -->
    <div class="w-100 mb-4 d-flex">
        <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="{{ route('dashboard.patient') }}">
            <svg version="1.1" id="logo" class="navbar-brand-img brand-sm" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 120 120">
                <g>
                    <polygon class="st0" points="78,105 15,105 24,87 87,87" />
                    <polygon class="st0" points="96,69 33,69 42,51 105,51" />
                    <polygon class="st0" points="78,33 15,33 24,15 87,15" />
                </g>
            </svg>
        </a>
    </div>

    <!-- الرئيسية -->
    <ul class="navbar-nav flex-fill w-100 mb-3">
        <li class="nav-item">
            <a href="{{ route('dashboard.patient') }}" class="nav-link">
                <i class="fe fe-home fe-16"></i>
                <span class="ml-3 item-text">الرئيسية</span>
            </a>
        </li>
    </ul>

    <!-- عنوان -->
    <p class="text-muted nav-heading mt-4 mb-2">
        <span>العناصر</span>
    </p>

    <!-- عمليات المريض -->
    <ul class="navbar-nav flex-fill w-100 mb-2">
        <li class="nav-item dropdown">
            <a href="#patient-operations" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                <i class="fe fe-file-text fe-16"></i>
                <span class="ml-3 item-text">عمليات المريض</span>
            </a>

            <ul class="collapse list-unstyled pl-4 w-100" id="patient-operations">
                <li class="nav-item">
                    <a class="nav-link pl-3" href="{{ route('invoices.patient') }}">
                        <span class="ml-1 item-text">قائمة الفواتير</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link pl-3" href="{{ route('laboratories.patient') }}">
                        <span class="ml-1 item-text">المختبر</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link pl-3" href="{{ route('rays.patient') }}">
                        <span class="ml-1 item-text">الأشعة</span>
                    </a>
                </li>
            </ul>
        </li>
    </ul>

    <!-- المحدثات -->
    <ul class="navbar-nav flex-fill w-100 mb-2">
        <li class="nav-item dropdown">
            <a href="#patient-updates" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                <i class="fe fe-message-square fe-16"></i>
                <span class="ml-3 item-text">المحدثات</span>
            </a>

            <ul class="collapse list-unstyled pl-4 w-100" id="patient-updates">
                <li class="nav-item">
                    <a class="nav-link pl-3" href="{{ route('list.doctors') }}">
                        <span class="ml-1 item-text">قائمة الاطباء</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link pl-3" href="{{ route('chat.doctors') }}">
                        <span class="ml-1 item-text">المحادثات الاخيرة</span>
                    </a>
                </li>
            </ul>
        </li>
    </ul>



    {{-- <div class="btn-box w-100 mt-4 mb-1">
            <a href="https://themeforest.net/item/tinydash-bootstrap-html-admin-dashboard-template/27511269" target="_blank" class="btn mb-2 btn-primary btn-lg btn-block">
              <i class="fe fe-shopping-cart fe-12 mr-2"></i><span class="small">Buy now</span>
            </a>
          </div> --}}


</nav>
