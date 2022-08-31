
<body>

    <!-- Start wrapper-->
     <div id="wrapper">

      <!--Start sidebar-wrapper-->
       <div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
         <div class="brand-logo">
          <a href="#">
           <img src="" class="logo-icon" alt="logo icon">
           <h5 class="logo-text">Teacher Management</h5>
         </a>
       </div>
       <ul class="sidebar-menu do-nicescrol">
          <li class="sidebar-header">

          </li>
          <li>
            <a href="{{route('dashboard.index')}}" class="waves-effect">
              <i class="icon-home"></i> <span>Dashboard</span>
            </a>
          </li>

          <li>
            <a href="{{route('classes.index')}}" class="waves-effect">
            <i class="fa fa-product-hunt" aria-hidden="true"></i>
                     <span>Class</span>
            </a>
          </li>

          <li>
            <a href="{{route('subjects.index')}}" class="waves-effect">
            <i class="fa fa-product-hunt" aria-hidden="true"></i>
                     <span>Subject</span>
            </a>
          </li>

          <li>
            <a href="{{route('schedules.index')}}" class="waves-effect">
            <i class="fa fa-product-hunt" aria-hidden="true"></i>
                     <span>Schedule</span>
            </a>
          </li>

          <li>
            <a href="{{ route('logout') }}"
            onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
             <i class="icon-power mr-2"></i> Logout
         </a>

         <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
             @csrf
         </form>
         </li>
          </li>

          {{-- <li>
            <a href="{{url('/user/permanent')}}" class="waves-effect">
            <i class="fa fa-product-hunt" aria-hidden="true"></i>
                     <span>Permanent-Item</span>
            </a>
          </li>

          <li>
            <a href="{{url('/user/consumable')}}" class="waves-effect">
            <i class="fa fa-product-hunt" aria-hidden="true"></i>
                     <span>Consumable-Item</span>
            </a>
          </li>

          <li>
            <a href="{{url('/user/stationary')}}" class="waves-effect">
            <i class="fa fa-product-hunt" aria-hidden="true"></i>
                     <span>Stationary-Item</span>
            </a>
          </li> --}}



        </ul>

       </div>
       </body>
       <!--End sidebar-wrapper-->
