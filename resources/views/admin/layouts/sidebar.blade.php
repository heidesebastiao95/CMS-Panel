<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div >
                    <a href="{{ route('dashboard') }}"><h2>HS One</h2></a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>

                <li class="sidebar-item {{ Route::is('dashboard')? 'active' : '' }} {{ Route::is('home')? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard </span>
                    </a>
                </li>
                <li class="sidebar-item {{ Route::is('categories.index')? 'active' : '' }}">
                    <a href="{{ route('categories.index') }}" class='sidebar-link'>
                        <i class="bi bi-folder-fill"></i>
                        <span>Categories</span>
                    </a>
                </li>

                <li class="sidebar-item  has-sub {{ Route::is('users.*')? 'active' : '' }} {{ Route::is('users.edit')? 'active' : '' }}">
                    <a href="{{ route('users.index') }}" class='sidebar-link' id="users">
                        <i class="bi bi-people-fill"></i>
                        <span>Users</span>
                    </a>
                    <ul class="submenu ">
                        <li class="submenu-item ">
                            <a href="{{ route('users.index') }}">Show All Users</a>
                        </li>

                    </ul>
                </li>

                <li class="sidebar-item has-sub {{ Route::is('posts.*')? 'active' : '' }}">
                    <a href="{{ route('posts.index') }}" class='sidebar-link'>
                        <i class="bi bi-file-earmark-richtext-fill"></i>
                        <span>Posts</span>
                    </a>
                    <ul class="submenu">
                        <li class="submenu-item ">
                            <a href="{{ route('posts.create') }}">Add Posts</a>
                        </li>
                        <li class="submenu-item">
                            <a href="{{ route('posts.index') }}">Show All</a>
                        </li>

                    </ul>
                </li>
                <li class="sidebar-item {{ Route::is('comments.index')? 'active' : '' }}">
                    <a href="{{ route('comments.index') }}" class='sidebar-link'>
                        <i class="bi bi-chat-square-dots-fill
                        "></i>
                        <span>Comments</span>
                    </a>
                </li>
                <li class="sidebar-item {{ Route::is('chat')? 'active' : '' }} {{ Route::is('talk')? 'active' : '' }}">
                    <a href="{{ route('chat') }}" class='sidebar-link'>
                        <i class="bi bi-chat-dots-fill
                        "></i>
                        <span>Chat</span>
                    </a>
                </li>

            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>
