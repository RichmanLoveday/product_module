 <div class="header">
     <div class="header-left active">
         <a href="#" class="logo">
             <img src="{{ asset('assets/img/logo.png') }}" alt="">
         </a>
         <a href="index.html" class="logo-small">
             <img src="{{ asset('assets/img/logo-small.png') }}" alt="">
         </a>
         <a id="toggle_btn" href="javascript:void(0);">
         </a>
     </div>

     <a id="mobile_btn" class="mobile_btn" href="#sidebar">
         <span class="bar-icon">
             <span></span>
             <span></span>
             <span></span>
         </span>
     </a>

     <ul class="nav user-menu">
         <li class="nav-item dropdown has-arrow main-drop">
             <a class="dropdown-item logout pb-0" href="#"><img src="{{ asset('assets/img/icons/log-out.svg') }}"
                     class="me-2" alt="img">Logout</a>
         </li>
     </ul>

     <div class="dropdown mobile-user-menu">
         <a href="javascript:void(0);" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"
             aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
         <div class="dropdown-menu dropdown-menu-right">
             <a class="dropdown-item" href="signin.html">Logout</a>
         </div>
     </div>
 </div>

 <div class="sidebar" id="sidebar">
     <div class="sidebar-inner slimscroll">
         <div id="sidebar-menu" class="sidebar-menu">
             <ul>
                 <li class="active">
                     <a href="#"><img src="{{ asset('assets/img/icons/dashboard.svg') }}" alt="img"><span>
                             Products</span> </a>
                 </li>
             </ul>
         </div>
     </div>
 </div>
