   <aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
       <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
           <i class="fe fe-x"><span class="sr-only"></span></i>
       </a>




       @if (\Auth::guard('admin')->check())
           @include('dashboard.layouts.main-sidebar.sidebar-admin')
       @endif

       @if (\Auth::guard('doctor')->check())
           @include('dashboard.layouts.main-sidebar.sidebar-doctor')
       @endif

       @if (\Auth::guard('ray_employee')->check())
           @include('dashboard.layouts.main-sidebar.sidebar-ray_employee')
       @endif

       @if (\Auth::guard('laboratorie_employee')->check())
           @include('dashboard.layouts.main-sidebar.laboratorie_employee')
       @endif
       @if (\Auth::guard('patient')->check())
           @include('dashboard.layouts.main-sidebar.patient')
       @endif

       {{-- @if (\Auth::guard('laboratorie_employee')->check())
@include('dashboard.layouts.main-sidebar.sidebar-admin')
    @endif --}}

       {{-- @if (\Auth::guard('patient')->check())
@include('dashboard.layouts.main-sidebar.sidebar-admin')
    @endif --}}

   </aside>
