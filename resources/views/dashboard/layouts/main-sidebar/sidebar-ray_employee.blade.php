<nav class="vertnav navbar navbar-light">
  <!-- nav bar -->
  <div class="w-100 mb-4 d-flex">
    <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="./index.html">
      <svg version="1.1" id="logo" class="navbar-brand-img brand-sm" xmlns="http://www.w3.org/2000/svg"
        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 120 120" xml:space="preserve">
        <g>
          <polygon class="st0" points="78,105 15,105 24,87 87,87" />
          <polygon class="st0" points="96,69 33,69 42,51 105,51" />
          <polygon class="st0" points="78,33 15,33 24,15 87,15" />
        </g>
      </svg>
    </a>
  </div>

  <ul class="navbar-nav flex-fill w-100 mb-2">
    <li class="nav-item dropdown">
      <a href="{{ route('dashboard.ray_employee') }}" aria-expanded="false" class=" nav-link">
        <i class="fe fe-home fe-16"></i>
        <span class="ml-3 item-text">الرئيسية </span><span class="sr-only">(current)</span>
      </a>
    </li>
  </ul>

  <p class="text-muted nav-heading mt-4 mb-1">
    <span>العناصر</span>
  </p>

  <ul class="navbar-nav flex-fill w-100 mb-2">
    <li class="nav-item dropdown">
      <a href="#ui-elements" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
        <i class="fe fe-file-text fe-16"></i>
        <span class="ml-3 item-text">كشوفات الاشعة</span>
      </a>
      <ul class="collapse list-unstyled pl-4 w-100" id="ui-elements">
        <li class="nav-item">
          <a class="nav-link pl-3" href="{{ route('invoices_ray_employees.index') }}">
            <span class="ml-1 item-text"> قائمة الكشوفات</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link pl-3" href="{{route('completed_invoices_ray')}}">
            <span class="ml-1 item-text">قائمة الكشوفات المكتملة</span>
          </a>
        </li>
      </ul>
    </li>
  </ul>

  {{-- <div class="btn-box w-100 mt-4 mb-1">
    <a href="https://themeforest.net/item/tinydash-bootstrap-html-admin-dashboard-template/27511269"
      target="_blank" class="btn mb-2 btn-primary btn-lg btn-block">
      <i class="fe fe-shopping-cart fe-12 mr-2"></i><span class="small">Buy now</span>
    </a>
  </div> --}}
</nav>
