<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="#">
            <img src="images/icon/logo.png" alt="Cool Admin" />
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
                <li class={{App\helpers\helpers::activeSideBar(url()->current() , "Users")}}>
                        <a href="{{route('users.index')}}"><i class="fas fa-user"></i>Users</a>
                </li>
                <li class={{App\helpers\helpers::activeSideBar(url()->current() , "Groups")}}>
                    <a href="{{route('groups.index')}}"><i class="fas fa-users"></i>Groups</a>
                </li>
                <li class={{App\helpers\helpers::activeSideBar(url()->current() , "Students")}}>
                    <a href="{{route('students.index')}}"><i class="fas fa-users"></i>Students</a>
                </li>
                <li class={{App\helpers\helpers::activeSideBar(url()->current() , "Tasks")}}>
                    <a href="{{route('tasks.index')}}"><i class="fas fa-users"></i>Tasks</a>
                </li>
                <li class={{App\helpers\helpers::activeSideBar(url()->current() , "Roles")}}>
                    <a href="{{route('roles.index')}}"><i class="fas fa-users"></i>Roles</a>
                </li>
                <li class={{App\helpers\helpers::activeSideBar(url()->current() , "Permissions")}}>
                    <a href="{{route('permissions.index')}}"><i class="fas fa-users"></i>Permissions</a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
{{--       add  sub-Section
           <ul class="list-unstyled navbar__sub-list js-sub-list">--}}
{{--                        <li>--}}
{{--                            create User</a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
