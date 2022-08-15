<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('dashboard')}}" class="brand-link pl-4">
      {{-- <img src="" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> --}}
      <i class=" fa-solid fa-blog"></i>
      <span class="brand-text font-weight-light">Blog</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset(auth()->user()->image)}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"> {{auth()->user()->name}} </a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

               <li class="nav-item">
                <a href="{{route('dashboard')}}" class="nav-link {{ (request()->is('dashboard')) ? 'active': '' }}">
                 
                  <i class="nav-icon fa-solid fa-gauge-high"></i>
                  <p>
                    Dashboard
                  </p>
                </a>
              </li>

               <li class="nav-item">
                <a href="#" class="nav-link {{ (request()->is('admin/post')) ? 'active': '' }} {{ (request()->is('admin/post/create')) ? 'active': '' }}">
                
                  <i class="nav-icon fa-solid fa-user-pen"></i>
                  <p>
                  Post Pages
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('post.create')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>  Post Create</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('post.index')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Post Table</p>
                    </a>
                  </li>
                </ul>
              </li>

          <li class="nav-item">
            <a href="#" class="nav-link {{ (request()->is('admin/category')) ? 'active': '' }} {{ (request()->is('admin/category/create')) ? 'active': '' }}">
              <i class="nav-icon fas fa-tag"></i>
              <p>
               Category Pages
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('category.create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>  Category Create</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('category.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Category Table</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link {{ (request()->is('admin/tag')) ? 'active': '' }} {{ (request()->is('admin/tag/create')) ? 'active': '' }}">
              <i class="nav-icon fas fa-tag"></i>
              <p>
               Tag Pages
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('tag.create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>  Tag Create</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('tag.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tag Table</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link {{ (request()->is('admin/user')) ? 'active': '' }} {{ (request()->is('admin/user/create')) ? 'active': '' }}">
            
              <i class="nav-icon fa-solid fa-user-pen"></i>
              <p>
              Users 
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('user.create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>  User Create</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('user.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>User Manage</p>
                </a>
              </li>
            </ul>
          </li>


          <li class="nav-item">
            <a href="{{route('setting.index')}}" class="nav-link {{ (request()->is('admin/setting/index')) ? 'active': '' }}">
            
              <i class="nav-icon fa-solid fa-gear"></i>
              <p>
                   Setting
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('contact.message')}}" class="nav-link {{ (request()->is('admin/contact/index')) ? 'active': '' }}">
            
              {{-- <i class=" fa-solid fa-gear"></i> --}}
              <i class="nav-icon fa-solid fa-envelope-open-text"></i>
              <p>
                   Messages
              </p>
            </a>
          </li>

          {{-- Profile --}}
          <li class="nav-header">Your Account</li>

          <li class="nav-item">
            <a href="{{route('profile')}}" class="nav-link {{ (request()->is('admin/author/profile')) ? 'active': '' }}">
              <i class="nav-icon fa-solid fa-user"></i>
              <p>
                  User Profile
              </p>
            </a>
          </li>
{{-- logout btest --}}

{{-- <form method="POST" action="{{ route('logout') }}">
  @csrf

  <x-responsive-nav-link :href="route('logout')"
          onclick="event.preventDefault();
                      this.closest('form').submit();">
      {{ __('Log Out') }} --}}
      

      <form method="POST" action="{{ route('logout') }}">
        @csrf
      <li class="nav-item pl-2">
        <a href="route('logout')" onclick="event.preventDefault();
                    this.closest('form').submit();" class="nav-link">
          {{-- <i class="nav-icon fa-solid fa-blog"></i> --}}
          <i class="nav-icon fa-solid fa-right-from-bracket"></i>
          <p>
            Logout
          </p>
        </a>
      </li>




          <li class="nav-item pl-2">
            <a href="{{ route('website.home')}}" target="_blank" class="nav-link">
              <i class="nav-icon fa-solid fa-blog"></i>
              <p>
                 Main Page
              </p>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>