       <nav class="vertnav navbar navbar-light">
           <!-- nav bar -->
           <div class="w-100 mb-4 d-flex">
               <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="{{ route('dashboard.admin') }}">
                   <svg version="1.1" id="logo" class="navbar-brand-img brand-sm" xmlns="http://www.w3.org/2000/svg"
                       xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 120 120"
                       xml:space="preserve">
                       <g>
                           <polygon class="st0" points="78,105 15,105 24,87 87,87 	" />
                           <polygon class="st0" points="96,69 33,69 42,51 105,51 	" />
                           <polygon class="st0" points="78,33 15,33 24,15 87,15 	" />
                       </g>
                   </svg>
               </a>
           </div>
           <ul class="navbar-nav flex-fill w-100 mb-2">
               <li class="nav-item dropdown">
                   <a href="{{ route('dashboard.admin') }}" aria-expanded="false" class=" nav-link">
                       <i class="fe fe-home fe-16"></i>
                       <span class="ml-3 item-text">الرئيسية</span><span class="sr-only">(current)</span>
                   </a>
               </li>
           </ul>
           <p class="text-muted nav-heading mt-4 mb-1">
               <span>العناصر</span>
           </p>
           <ul class="navbar-nav flex-fill w-100 mb-2">
               <li class="nav-item dropdown">
                   <a href="#ui-elements" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                       <i class="fe fe-box fe-16"></i>
                       <span class="ml-3 item-text">الاقسام</span>
                   </a>
                   <ul class="collapse list-unstyled pl-4 w-100" id="ui-elements">
                       <li class="nav-item">
                           <a class="nav-link pl-3" href="{{ route('sections.index') }}"><span
                                   class="ml-1 item-text">عرض الكل</span>
                           </a>
                       </li>

                   </ul>
               </li>

               <li class="nav-item dropdown">
                   <a href="#forms" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                       <i class="fe fe-credit-card fe-16"></i>
                       <span class="ml-3 item-text">الاطباء</span>
                   </a>
                   <ul class="collapse list-unstyled pl-4 w-100" id="forms">
                       <li class="nav-item">
                           <a class="nav-link pl-3" href="{{ route('doctors.index') }}"><span class="ml-1 item-text">عرض
                                   الكل</span></a>
                       </li>

                   </ul>
               </li>
               <li class="nav-item dropdown">
                   <a href="#tables" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                       <i class="fe fe-grid fe-16"></i>
                       <span class="ml-3 item-text">الخدمات</span>
                   </a>
                   <ul class="collapse list-unstyled pl-4 w-100" id="tables">
                       <li class="nav-item">
                           <a class="nav-link pl-3" href="{{ route('services.index') }}"><span
                                   class="ml-1 item-text">خدمات مفردة</span></a>
                       </li>
                       <li class="nav-item">
                           <a class="nav-link pl-3" href="{{ route('add_groupServices') }}"><span
                                   class="ml-1 item-text">مجموعة خدمات</span></a>
                       </li>
                       <li class="nav-item">
                           <a class="nav-link pl-3" href="{{ route('insurances.index') }}"><span
                                   class="ml-1 item-text">شركة التأمين</span></a>
                       </li>
                       <li class="nav-item">
                           <a class="nav-link pl-3" href="{{ route('ambulances.index') }}"><span class="ml-1 item-text">
                                   الاسعاف</span></a>
                       </li>
                       <li class="nav-item">
                           <a class="nav-link pl-3" href="./table_datatables.html"><span class="ml-1 item-text">مكالمات
                                   الاسعاف</span></a>
                       </li>
                   </ul>
               </li>
               <li class="nav-item dropdown">
                   <a href="#charts" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                       <i class="fe fe-pie-chart fe-16"></i>
                       <span class="ml-3 item-text">المرضى</span>
                   </a>
                   <ul class="collapse list-unstyled pl-4 w-100" id="charts">
                       <li class="nav-item">
                           <a class="nav-link pl-3" href="{{ route('patients.index') }}"><span
                                   class="ml-1 item-text">قائمة المرضى</span></a>
                       </li>

                   </ul>
               </li>
           </ul>
           {{-- <p class="text-muted nav-heading mt-4 mb-1">
            <span>الفواتير</span>
          </p> --}}
           <ul class="navbar-nav flex-fill w-100 mb-2">
               {{-- <li class="nav-item w-100">
              <a class="nav-link" href="calendar.html">
                <i class="fe fe-calendar fe-16"></i>
                <span class="ml-3 item-text">Calendar</span>
              </a>
            </li> --}}
               <li class="nav-item dropdown">
                   <a href="#contact" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                       <i class="fe fe-book fe-16"></i>
                       <span class="ml-3 item-text">الفواتير</span>
                   </a>
                   <ul class="collapse list-unstyled pl-4 w-100" id="contact">
                       <a class="nav-link pl-3" href="{{ route('single_invoices') }}"><span class="ml-1">فاتورة
                               خدمة مفردة</span></a>
                       <a class="nav-link pl-3" href="{{ route('group_invoices') }}"><span class="ml-1">فاتورة
                               مجموعة خدمات</span></a>
                   </ul>
               </li>
               <li class="nav-item dropdown">
                   <a href="#profile" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                       <i class="fe fe-user fe-16"></i>
                       <span class="ml-3 item-text">الحسابات</span>
                   </a>
                   <ul class="collapse list-unstyled pl-4 w-100" id="profile">
                       <a class="nav-link pl-3" href="{{ route('receipts.index') }}"><span class="ml-1">سند
                               قبض</span></a>
                       <a class="nav-link pl-3" href="{{ route('payments.index') }}"><span class="ml-1">سند
                               صرف</span></a>

                   </ul>
               </li>
               <li class="nav-item dropdown">
                   <a href="#fileman" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                       <i class="fe fe-folder fe-16"></i>
                       <span class="ml-3 item-text">الاشعة</span>
                   </a>
                   <ul class="collapse list-unstyled pl-4 w-100" id="fileman">
                       <a class="nav-link pl-3" href="{{ route('ray_employees.index') }}"><span class="ml-1">قائمة
                               الموظفين</span></a>
                       <a class="nav-link pl-3" href="./files-grid.html"><span class="ml-1">قائمة
                               الكشوفات</span></a>
                   </ul>
               </li>
               <li class="nav-item dropdown">
                   <a href="#support" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                       <i class="fe fe-compass fe-16"></i>
                       <span class="ml-3 item-text">المختبر</span>
                   </a>
                   <ul class="collapse list-unstyled pl-4 w-100" id="support">
                       <a class="nav-link pl-3" href="{{ route('laboratorie_employees.index') }}"><span
                               class="ml-1">قائمة الموظفين</span></a>

                   </ul>
               </li>

           </ul>

           <ul class="navbar-nav flex-fill w-100 mb-2">
               <li class="nav-item dropdown">
                   <a href="#pages" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                       <i class="fe fe-file fe-16"></i>
                       <span class="ml-3 item-text">المواعيد</span>
                   </a>
                   <ul class="collapse list-unstyled pl-4 w-100 w-100" id="pages">
                       <li class="nav-item">
                           <a class="nav-link pl-3" href="{{ route('appointments.index') }}">
                               <span class="ml-1 item-text"> المواعيد الغير مؤكدة</span>
                           </a>
                       </li>
                       <li class="nav-item">
                           <a class="nav-link pl-3" href="{{ route('appointments.index2') }}">
                               <span class="ml-1 item-text">المواعيد المؤكدة</span>
                           </a>
                       </li>
                       <li class="nav-item">
                           <a class="nav-link pl-3" href="{{ route('appointments.finsh') }}">
                               <span class="ml-1 item-text">المواعيد المنتهية</span>
                           </a>
                       </li>


                   </ul>

                   {{-- <div class="btn-box w-100 mt-4 mb-1">
               <a href="https://themeforest.net/item/tinydash-bootstrap-html-admin-dashboard-template/27511269"
                   target="_blank" class="btn mb-2 btn-primary btn-lg btn-block">
                   <i class="fe fe-shopping-cart fe-12 mr-2"></i><span class="small">Buy now</span>
               </a>
           </div> --}}

       </nav>
