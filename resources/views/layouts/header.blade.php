 <!-- Navbar -->
 <nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>  
  </ul>  
</nav>
<!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-5">
  <!-- Brand Logo -->
  <a href="{{ url('admin/dashboard')}}" class="brand-link">
    <img src="{{ asset ('dist/img/logo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Car Dealer</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img style="height:40px;width:40px;" src="{{  Auth::user()->getProfileDirect() }}" class="img-circle elevation-2" alt="{{ Auth::user()->name }}">
      </div>
      <div class="info">
        <a href="#" class="d-block">{{ Auth::user()->name }} {{ Auth::user()->last_name }} </a>
        @php
        $userTypes = [
            1 => 'Admin',
            2 => 'Customer',
            3 => 'Dealer',
            4 => 'Supplier',
        ];
    
        $userType = Auth::user()->user_type;
    @endphp
    
    <a href="#" class="d-block ml-4" style="color: skyblue;">
        {{ isset($userTypes[$userType]) ? $userTypes[$userType] : 'Unknown Role' }}
    </a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
       
       @if(Auth::user()->user_type == 1)

       <li class="nav-item">
        
          <a href="{{ url('admin/dashboard')}}" class="nav-link @if(Request::segment(2) == 'dashboard')active @endif">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ url('admin/student/list')}}" class="nav-link @if(Request::segment(2) == 'student')active @endif">
            <i class="nav-icon fas fa-user"></i>
            <p>
              Customer
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ url('admin/dealer/list')}}" class="nav-link @if(Request::segment(2) == 'dealer')active @endif">
            <i class="nav-icon fas fa-handshake"></i>
            <p>
              Dealer
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ url('admin/supplier/list')}}" class="nav-link @if(Request::segment(2) == 'supplier')active @endif">
            <i class="nav-icon fas fa-truck"></i>

            <p>
              Supplier
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ url('admin/cars/list')}}" class="nav-link @if(Request::segment(2) == 'cars')active @endif">
            <i class="nav-icon fas fa-car"></i>
            <p>
             Cars
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ url('admin/parts/list')}}" class="nav-link @if(Request::segment(2) == 'parts')active @endif">
            <i class="nav-icon fas fa-cogs"></i>
            <p>
             Car Parts
            </p>
          </a>
          </li>

        <li class="nav-item">
          <a href="{{ url('admin/purchase/list')}}" class="nav-link @if(Request::segment(2) == 'purchase')active @endif">
            <i class="nav-icon fas fa-shopping-cart"></i>

            <p>
              Purchase Car
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ url('admin/purchase_parts/list')}}" class="nav-link @if(Request::segment(2) == 'purchase_parts')active @endif">
            <i class="nav-icon fas fa-shopping-cart"></i>

            <p>
              Purchase Parts
            </p>
          </a>
        </li>


        <li class="nav-item">
          <a href="{{ url('admin/change_password')}}" class="nav-link @if(Request::segment(2) == 'change_password') active @endif">
            <i class="nav-icon fas fa-key"></i>
            <p>
              Change Password
              
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ url('admin/account')}}" class="nav-link @if(Request::segment(2) == 'myaccount') active @endif">
            <i class="nav-icon fas fa-user"></i>

            <p>
              My Account
              
            </p>
          </a>
        </li>

        @elseif(Auth::user()->user_type == 3)

             <li class="nav-item">
        
          <a href="{{ url('dealer/dashboard')}}" class="nav-link @if(Request::segment(2) == 'dashboard')active @endif">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            
            </p>
          </a>
        </li>


 

 <li class="nav-item">
     <a href="{{ url('dealer/cars/list')}}" class="nav-link @if(Request::segment(2) == 'cars')active @endif">
      <i class="nav-icon fas fa-car"></i>
       <p>
        Cars
       </p>
     </a>
   </li>

   <li class="nav-item">
    <a href="{{ url('dealer/purchase/list')}}" class="nav-link @if(Request::segment(2) == 'purchase')active @endif">
      <i class="nav-icon far fa-file"></i>
      <p>
        Purchase Car
      </p>
    </a>
  </li>

  

        <li class="nav-item">
          <a href="{{ url('dealer/change_password')}}" class="nav-link @if(Request::segment(2) == 'change_password') active @endif">
            <i class="nav-icon far fa-user"></i>
            <p>
              Change Password
              
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ url('dealer/account')}}" class="nav-link @if(Request::segment(2) == 'myaccount') active @endif">
            <i class="nav-icon far fa-user"></i>
            <p>
              My Account
              
            </p>
          </a>
        </li>

        @elseif(Auth::user()->user_type == 4)

        <li class="nav-item">
   
     <a href="{{ url('supplier/dashboard')}}" class="nav-link @if(Request::segment(2) == 'dashboard')active @endif">
       <i class="nav-icon fas fa-tachometer-alt"></i>
       <p>
         Dashboard
       
       </p>
     </a>
   </li>




<li class="nav-item">
<a href="{{ url('supplier/parts/list')}}" class="nav-link @if(Request::segment(2) == 'cars')active @endif">
 <i class="nav-icon fas fa-car"></i>
  <p>
   Car Parts
  </p>
</a>
</li>

<li class="nav-item">
<a href="{{ url('supplier/purchase/list')}}" class="nav-link @if(Request::segment(2) == 'purchase')active @endif">
 <i class="nav-icon far fa-file"></i>
 <p>
   Purchase Parts
 </p>
</a>
</li>



   <li class="nav-item">
     <a href="{{ url('supplier/change_password')}}" class="nav-link @if(Request::segment(2) == 'change_password') active @endif">
       <i class="nav-icon far fa-user"></i>
       <p>
         Change Password
         
       </p>
     </a>
   </li>

   <li class="nav-item">
     <a href="{{ url('supplier/account')}}" class="nav-link @if(Request::segment(2) == 'myaccount') active @endif">
       <i class="nav-icon far fa-user"></i>
       <p>
         My Account
         
       </p>
     </a>
   </li>

       @elseif(Auth::user()->user_type == 2)

       <li class="nav-item">
          <a href="{{ url('student/dashboard')}}" class="nav-link @if(Request::segment(2) == 'dashboard') active @endif">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
              
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ url('student/cars/list')}}" class="nav-link @if(Request::segment(2) == 'cars')active @endif">
            <i class="nav-icon fas fa-car"></i>
            <p>
             Cars
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ url('student/parts/list')}}" class="nav-link @if(Request::segment(2) == 'parts')active @endif">
           <i class="nav-icon fas fa-car"></i>
            <p>
             Car Parts
            </p>
          </a>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>
              <p>
                 Purhase Car
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('student/notpurchase/list')}}" class="nav-link @if(Request::segment(2) == 'purchase')active @endif">
                  <i class="nav-icon fas fa-times"></i>

                  <p>
                    Not Sold Cars
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('student/purchase/list')}}" class="nav-link @if(Request::segment(2) == 'sold')active @endif">
                  <i class="nav-icon fas fa-money-bill"></i>
                  <p>
                    Sold Cars
                  </p>
                </a>
              </li>
            </ul>
          </li>
          

        <li class="nav-item">
          <a href="{{ url('student/purchase_parts/list')}}" class="nav-link @if(Request::segment(2) == 'purchase_parts')active @endif">
            <i class="nav-icon fas fa-shopping-cart"></i>
            <p>
              Purchase Parts
            </p>
          </a>
        </li>
  
        <li class="nav-item">
          <a href="{{ url('student/account')}}" class="nav-link @if(Request::segment(2) == 'myaccount') active @endif">
            <i class="nav-icon fas fa-user"></i>
            <p>
              My Account
              
            </p>
          </a>
          
        </li>

        <li class="nav-item">
          <a href="{{ url('student/change_password')}}" class="nav-link @if(Request::segment(2) == 'change_password') active @endif">
            <i class="nav-icon fas fa-key"></i>
            <p>
              Change Password
              
            </p>
          </a>
        </li>

       @endif
        
        <li class="nav-item">
          <a href="{{ url('logout')}}" class="nav-link">
            <i class="nav-icon fas fa-sign-out-alt"></i>

            <p>
              Logout
            </p>
          </a>
        </li>
      </ul>
          
    
        
 </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>