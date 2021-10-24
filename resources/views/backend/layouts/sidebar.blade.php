<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="{{ asset(auth()->user()->photo) }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="{{ route('profile') }}" class="d-block">{{ auth()->user()->name }}</a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="{{ URL::to('/dashboard') }}" class="nav-link @if (request()->is('admin/dashboard') || request()->is('blogger/dashboard')) {{ 'active' }} @endif">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>
            @hasrole('Admin')

                <li class="nav-item @if (request()->is('admin/users') || request()->is('admin/users/*')) {{ 'menu-open' }} @endif">
                    <a href="#" class="nav-link @if (request()->is('admin/users') || request()->is('admin/users/*')) {{ 'active' }} @endif">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Users
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.users.create') }}" class="nav-link @if (request()->is('admin/users/create')) {{ 'active' }} @endif">
                                <i class="fas fa-plus-square nav-icon"></i>
                                <p>New User</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.users.index') }}" class="nav-link @if (request()->is('admin/users')) {{ 'active' }} @endif">
                                <i class="fas fa-list-alt nav-icon"></i>
                                <p>Users</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.researches.index') }}" class="nav-link @if (request()->is('admin/researches')) {{ 'active' }} @endif">
                        <i class="nav-icon fab fa-researchgate"></i>
                        <p>
                            Research
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.categories.index') }}" class="nav-link @if (request()->is('admin/categories')) {{ 'active' }} @endif">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            Category
                        </p>
                    </a>
                </li>
                <li class="nav-item @if (request()->is('admin/events') || request()->is('admin/events/*')) {{ 'menu-open' }} @endif">
                    <a href="#" class="nav-link @if (request()->is('admin/events') || request()->is('admin/events/*')) {{ 'active' }} @endif">
                        <i class="nav-icon fas fa-calendar-week"></i>
                        <p>
                            Events
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.events.create') }}" class="nav-link @if (request()->is('admin/events/create')) {{ 'active' }} @endif">
                                <i class="fas fa-plus-square nav-icon"></i>
                                <p>New Event</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.events.index') }}" class="nav-link @if (request()->is('admin/events')) {{ 'active' }} @endif">
                                <i class="fas fa-list-alt nav-icon"></i>
                                <p>Events</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item @if (request()->is('admin/causes') || request()->is('admin/causes/*')) {{ 'menu-open' }} @endif">
                    <a href="#" class="nav-link @if (request()->is('admin/causes') || request()->is('admin/causes/*')) {{ 'active' }} @endif">
                        <i class="fas fa-user-injured nav-icon"></i>
                        <p>
                            Causes
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.causes.create') }}" class="nav-link @if (request()->is('admin/causes/create')) {{ 'active' }} @endif">
                                <i class="fas fa-plus-square nav-icon"></i>

                                <p>New Cause</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.causes.index') }}" class="nav-link @if (request()->is('admin/causes')) {{ 'active' }} @endif">
                                <i class="fas fa-list-alt nav-icon"></i>
                                <p>Causes</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item @if (request()->is('admin/blogs') || request()->is('admin/blogs/*')) {{ 'menu-open' }} @endif">
                    <a href="#" class="nav-link @if (request()->is('admin/blogs') || request()->is('admin/blogs/*')) {{ 'active' }} @endif">
                        <i class="nav-icon fas fa-blog"></i>
                        <p>
                            Blogs
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.blogs.create') }}" class="nav-link @if (request()->is('admin/blogs/create')) {{ 'active' }} @endif">
                                <i class="fas fa-plus-square nav-icon"></i>
                                <p>New Blog</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.blogs.index') }}" class="nav-link @if (request()->is('admin/blogs')) {{ 'active' }} @endif">
                                <i class="fas fa-list-alt nav-icon"></i>
                                <p>blogs</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item @if (request()->is('admin/testimonials') || request()->is('admin/testimonials/*')) {{ 'menu-open' }} @endif">
                    <a href="#" class="nav-link @if (request()->is('admin/testimonials') || request()->is('admin/testimonials/*')) {{ 'active' }} @endif">
                        <i class="nav-icon fas fa-sticky-note"></i>
                        <p>
                            Testimonials
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.testimonials.create') }}"
                                class="nav-link @if (request()->is('admin/testimonials/create')) {{ 'active' }} @endif">
                                <i class="fas fa-plus-square nav-icon"></i>
                                <p>New Testimonial</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.testimonials.index') }}" class="nav-link @if (request()->is('admin/testimonials')) {{ 'active' }} @endif">
                                <i class="fas fa-list-alt nav-icon"></i>
                                <p>Testimonials</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item @if (request()->is('admin/teams') || request()->is('admin/teams/*')) {{ 'menu-open' }} @endif">
                    <a href="#" class="nav-link @if (request()->is('admin/teams') || request()->is('admin/teams/*')) {{ 'active' }} @endif">
                        <i class="nav-icon fas fa-user-secret"></i>
                        <p>
                            Teams
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.teams.create') }}" class="nav-link @if (request()->is('admin/teams/create')) {{ 'active' }} @endif">
                                <i class="fas fa-plus-square nav-icon"></i>
                                <p>New Team</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.teams.index') }}" class="nav-link @if (request()->is('admin/teams')) {{ 'active' }} @endif">
                                <i class="fas fa-list-alt nav-icon"></i>
                                <p>Teams</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item @if (request()->is('admin/volunteers') || request()->is('admin/volunteers/*')) {{ 'menu-open' }} @endif">
                    <a href="#" class="nav-link @if (request()->is('admin/volunteers') || request()->is('admin/volunteers/*')) {{ 'active' }} @endif">
                        <i class="nav-icon fas fa-user-secret"></i>
                        <p>
                            Volunteers
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.volunteers.create') }}" class="nav-link @if (request()->is('admin/volunteers/create')) {{ 'active' }} @endif">
                                <i class="fas fa-plus-square nav-icon"></i>
                                <p>New Volunteer</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.volunteers.index') }}" class="nav-link @if (request()->is('admin/volunteers')) {{ 'active' }} @endif">
                                <i class="fas fa-list-alt nav-icon"></i>
                                <p>Volunteers</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item @if (request()->is('admin/pages') || request()->is('admin/pages/*')) {{ 'menu-open' }} @endif">
                    <a href="#" class="nav-link @if (request()->is('admin/pages') || request()->is('admin/pages/*')) {{ 'active' }} @endif">
                        <i class="nav-icon fas fa-file"></i>
                        <p>
                            Pages
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.pages.create') }}" class="nav-link @if (request()->is('admin/pages/create')) {{ 'active' }} @endif">
                                <i class="fas fa-plus-square nav-icon"></i>
                                <p>New Page</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.pages.index') }}" class="nav-link @if (request()->is('admin/pages')) {{ 'active' }} @endif">
                                <i class="fas fa-list-alt nav-icon"></i>
                                <p>Pages</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.sliders.index') }}" class="nav-link @if (request()->is('admin/sliders')) {{ 'active' }} @endif">
                        <i class="nav-icon fas fa-image"></i>
                        <p>
                            Slider
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.partners.index') }}" class="nav-link @if (request()->is('admin/partners')) {{ 'active' }} @endif">
                        <i class="nav-icon fas fa-handshake"></i>
                        <p>
                            Partner
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.generals.index') }}" class="nav-link @if (request()->is('admin/generals')) {{ 'active' }} @endif">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>
                            General
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.queries.index') }}" class="nav-link @if (request()->is('admin/queries') || request()->is('admin/queries/*')) {{ 'active' }} @endif">
                        <i class="nav-icon far fa-question-circle"></i>
                        <p>
                            Queries
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.faqs.index') }}" class="nav-link @if (request()->is('admin/faqs')) {{ 'active' }} @endif">
                        <i class="nav-icon far fa-question-circle"></i>
                        <p>
                            Faqs
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.contacts') }}" class="nav-link @if (request()->is('admin/contacts')) {{ 'active' }} @endif">
                        <i class="nav-icon far fa-address-card"></i>
                        <p>
                            Contact
                        </p>
                    </a>
                </li>

            @endhasrole
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
