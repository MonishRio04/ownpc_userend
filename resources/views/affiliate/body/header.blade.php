<header>
    <div class="topbar d-flex align-items-center">
        <nav class="navbar navbar-expand">
            <div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
            </div>
            <div class="top-menu ms-auto">
                <ul class="navbar-nav align-items-center">
                    <li class="nav-item mobile-search-icon">
                        <a class="nav-link" href="#"> <i class='bx bx-search'></i>
                        </a>
                    </li>                  
                    <li class="nav-item dropdown dropdown-large">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <span class="alert-count">
                                @php
                                $ncount = Auth::guard('affiliate')->user()->unreadNotifications()->count()
                                @endphp
                                {{$ncount}}
                            </span>
                            <i class='bx bx-bell'></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="javascript:;">
                                <div class="msg-header">
                                    <p class="msg-header-title">Notifications</p>
                                    <p class="msg-header-clear ms-auto">Marks all as read</p>
                                </div>
                            </a>
                            <div class="header-notifications-list">
                                @php
                                $user = Auth::user();
                                @endphp
                                @forelse($user->notifications as $notification)
                                <a class="dropdown-item" href="javascript:;">
                                    <div class="d-flex align-items-center">
                                        <div class="notify bg-light-warning text-warning"><i class="bx bx-send"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="msg-name">Message <span class="msg-time float-end">{{Carbon\Carbon::parse($notification->created_at)->diffForHumans()}}</span></h6>
                                            <p class="msg-info">{{$notification->data['message']}}</p>
                                        </div>
                                    </div>
                                </a>
                                @empty
                                @endforelse
                            </div>
                            <a href="javascript:;">
                                <div class="text-center msg-footer">View All Notifications</div>
                            </a>
                        </div>
                    </li>                   
                </ul>
            </div>

            @php $id = Auth::user()->id;
            $adminData = App\Models\User::find($id);
            @endphp
            <div class="user-box dropdown">
                <a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="{{(!empty($adminData->photo)) ?  url('upload/admin_images/'.$adminData->photo) : url('upload/no_image.jpg')}}" loading="lazy"  class="user-img" alt="user avatar">
                    <div class="user-info ps-3">
                        <p class="user-name mb-0">{{Auth::user()->name}}</p>
                        <p class="designattion mb-0">{{Auth::user()->username}}</p>
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="{{route('affiliate.profile')}}"><i class="bx bx-user"></i><span>Profile</span></a>
                    </li>
                    <li><a class="dropdown-item" href="{{route('affiliate.change.password')}}"><i class="bx bx-cog"></i><span>Change Password</span></a>
                    </li>
                    <li><a class="dropdown-item" href="{{url('affiliate/dashboard')}}"><i class='bx bx-home-circle'></i><span>Dashboard</span></a>
                    </li>
                </li>
                {{-- <li><a class="dropdown-item" href="javascript:;"><i class='bx bx-download'></i><span>Downloads</span></a>
                </li> --}}                
                    <li>
                        <div class="dropdown-divider mb-0"></div>
                    </li>
                    <li><a class="dropdown-item" href="{{route('affiliate.logout')}}"><i class='bx bx-log-out-circle'></i><span>Logout</span></a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>