 
 
 <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="{{route('admin.login')}}"><img src="{{asset('assets/img/favicon.png')}}" alt="Logo" srcset=""></a>
                            <h2>Mini Pet World</h2>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        <li class="sidebar-item  ">
                            <a href="{{route('admin.login')}}" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-image-fill"></i>
                                <span>Banners</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="{{route('banners')}}">View All</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="{{route('new_banner')}}">Add New</a>
                                </li>
                            </ul>
                        </li>

                         <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-image-fill"></i>
                                <span>Blogs</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="{{route('blogs')}}">View All</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="{{route('new_blog')}}">Add New</a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-stack"></i>
                                <span>Categories</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="{{ route('categories') }}">View All</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="{{ route('new_categories') }}">Add New</a>
                                </li>
                            </ul>
                        </li>

                         <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-stack"></i>
                                <span>Pet Categories</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="{{ route('petcategories') }}">View All</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="{{ route('new_petcategories') }}">Add New</a>
                                </li>
                            </ul>
                        </li>

                         <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-file-text"></i>
                                <span>Clinics</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="{{route('centerss')}}">View All</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="{{route('new_center')}}">Add New</a>
                                </li>
                            </ul>
                        </li>

                         <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-file-text"></i>
                                <span>Pet Relocation</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="{{route('admin_relocation')}}">View All</a>
                                </li> 
                            </ul>
                        </li>

                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-file-text"></i>
                                <span>User Posts</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="{{route('post_admin')}}">View All Post</a>
                                </li>  
                                 <li class="submenu-item ">
                                    <a href="{{route('requested_post')}}">Requested Post</a>
                                </li>   
                                <li class="submenu-item ">
                                    <a href="{{route('accepted_post')}}">Accepted Post</a>
                                </li> 
                                <li class="submenu-item ">
                                    <a href="{{route('rejected_post')}}">Rejected Post</a>
                                </li> 
                            </ul>
                        </li>

                         <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-file-text"></i>
                                <span>Orders</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="{{route('orders')}}">View All Orders</a>
                                </li>   
                            </ul>
                        </li>

                        

                          

                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-files"></i>
                                <span>Products</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="{{ route('productss') }}">View All</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="{{ route('new_products') }}">Add</a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-file-image"></i>
                                <span>Events</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="{{route('eventss')}}">View All</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="{{route('new_events')}}">Add New</a>
                                </li>
                            </ul>
                        </li>

                         <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-file-earmark-play"></i>
                                <span>Media</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="{{route('medias')}}">View All</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="{{route('new_media')}}">Add</a>
                                </li>
                            </ul>
                        </li>

                         <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-file-text"></i>
                                <span>Pages</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="{{route('page')}}">View All</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="{{route('new_page')}}">Add New</a>
                                </li>
                            </ul>
                        </li>



                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-person-fill"></i>
                                <span>Users Management</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="{{route('alluser')}}">Users</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="{{route('alladmin')}}">Admin</a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item ">
                            <a href="{{ route('logout') }}" class='sidebar-link'  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="bi bi-person-x-fill"></i>
                                <span>{{ __('Logout') }}</span>
                            </a> 
                            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                        @csrf
                            </form>
                        </li>
 
                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>

 