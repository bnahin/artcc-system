<nav class="px-nav px-nav-left">
    <button type="button" class="px-nav-toggle" data-toggle="px-nav">
        <span class="px-nav-toggle-arrow"></span>
        <span class="navbar-toggle-icon"></span>
        <span class="px-nav-toggle-label font-size-11">HIDE MENU</span>
    </button>

    <ul class="px-nav-content">
        @if(Auth::check())
            <li class="px-nav-box p-a-3 b-b-1" id="demo-px-nav-box">
                <div class="font-size-16"><span class="font-weight-light">Welcome, </span><strong>{{ Auth::user()->first_name }}</strong></div>
                <div class="btn-group" style="margin-top: 4px;">
                    <a href="{{ route('profile') }}" class="btn btn-xs btn-primary btn-outline"><i class="fa fa-user"></i></a>
                    <a href="{{ route('auth.logout') }}" class="btn btn-xs btn-danger btn-outline"><i class="fa fa-power-off"></i></a>
                </div>
                <br>
                <div class="btn-group" style="margin-top: 4px;">
                    @if($countUnreadNotifications == 0)
                        <button type="button" class="btn btn-xs btn-success btn-outline notificationButton" style="background: #6fb952; border-color: transparent!important; color: #fff!important;">{{ $countUnreadNotifications }} Unread Notifications</button>
                    @elseif($countUnreadNotifications > 0 && $countUnreadNotifications < 6)
                        <button type="button" class="btn btn-xs btn-warning btn-outline notificationButton" style="background: #db9839; border-color: transparent!important; color: #fff!important;">{{ $countUnreadNotifications }} Unread Notifications</button>
                    @else
                        <button type="button" class="btn btn-xs btn-danger btn-outline notificationButton" style="background: #e25443; border-color: transparent!important; color: #fff!important;">{{ $countUnreadNotifications }} Unread Notifications</button>
                    @endif
                </div>
            </li>
        @else
            <li class="px-nav-item">
                <a href="{{ route('auth.login') }}"><i class="px-nav-icon fa fa-lock"></i><span class="px-nav-label">Login</span></a>
            </li>
        @endif

        <li class="px-nav-item {{ active('index', 'px-nav-active') }}">
            <a href="{{ route('index') }}"><i class="px-nav-icon ion-ios-pulse-strong"></i><span class="px-nav-label">Dashboard</span></a>
        </li>
        <li class="px-nav-item px-nav-dropdown {{ active('pilots.*', 'px-open') }}">
            <a href="#"><i class="px-nav-icon fa fa-plane"></i><span class="px-nav-label">Pilots</span></a>
            <ul class="px-nav-dropdown-menu">
                <li class="px-nav-item {{ active('pilots.airport.*', 'px-nav-active') }}"><a href="{{ route('pilots.airport.index') }}"><span class="px-nav-label">Airports</span></a></li>
                <li class="px-nav-item {{ active('pilots.weather.*', 'px-nav-active') }}"><a href="{{ route('pilots.weather.index') }}"><span class="px-nav-label">Weather</span></a></li>
                <li class="px-nav-item {{ active('pilots.routes.*', 'px-nav-active') }}"><a href="{{ route('pilots.routes.index') }}"><span class="px-nav-label">Route Finder</span></a></li>
            </ul>
        </li>
        <li class="px-nav-item px-nav-dropdown {{ active('artcc.*', 'px-open') }}">
            <a href="#"><i class="px-nav-icon fa fa-users"></i><span class="px-nav-label">ARTCC</span></a>
            <ul class="px-nav-dropdown-menu">
                <li class="px-nav-item {{ active('artcc.management.index', 'px-nav-active') }}"><a href="{{ route('artcc.management.index') }}"><span class="px-nav-label">Management</span></a></li>
                <li class="px-nav-item {{ active('artcc.roster.*', 'px-nav-active') }}"><a href="{{ route('artcc.roster.index') }}"><span class="px-nav-label">Roster</span></a></li>
                <li class="px-nav-item {{ active('artcc.documents.*', 'px-nav-active') }}"><a href="#"><span class="px-nav-label">Documents & Files</span></a></li>
                <li class="px-nav-item {{ active('artcc.stats', 'px-nav-active') }}"><a href="#"><span class="px-nav-label">Controller Stats</span></a></li>
                @if(!Auth::check())
                    <li class="px-nav-item {{ active('artcc.visit', 'px-nav-active') }}"><a href="#"><span class="px-nav-label">Visiting Application</span></a></li>
                @endif
            </ul>
        </li>
        <li class="px-nav-item {{ active('feedback.*', 'px-nav-active') }}">
            <a href="#"><i class="px-nav-icon fa fa-comment"></i><span class="px-nav-label">Feedback</span></a>
        </li>
        <li class="px-nav-item {{ active('forum.*', 'px-nav-active') }}">
            <a href="{{ route('forum.index') }}"><i class="px-nav-icon fa fa-forumbee"></i><span class="px-nav-label">Forum</span></a>
        </li>
        @if(Auth::check())
            <li class="px-nav-item {{ active('ids.*', 'px-nav-active') }}">
                <a href="#"><i class="px-nav-icon fa fa-microchip"></i><span class="px-nav-label">IDS</span></a>
            </li>
            <li class="px-nav-item px-nav-dropdown {{ active(['training.*','admin.training.*'], 'px-open') }}">
                <a href="#"><i class="px-nav-icon fa fa-pencil"></i><span class="px-nav-label">Training</span></a>
                <ul class="px-nav-dropdown-menu">
                    <li class="px-nav-item {{ active('training.availability', 'px-nav-active') }}"><a href="#"><span class="px-nav-label">View Availability</span></a></li>
                    <li class="px-nav-item {{ active('training.history', 'px-nav-active') }}"><a href="#"><span class="px-nav-label">Session History</span></a></li>
                    @if(Auth::user()->hasRole(['atm','datm','ta','ins','mtr','ata']))
                        <li class="px-nav-item px-nav-dropdown {{ active('admin.training.*', 'px-open') }}">
                            <a href="#"><span class="px-nav-label">Instructional Staff</span></a>
                            <ul class="px-nav-dropdown-menu">
                                <li class="px-nav-item {{ active('admin.training.sessions.*', 'px-nav-active') }}"><a href="#"><span class="px-nav-label">Scheduled Sessions</span></a></li>
                                <li class="px-nav-item {{ active('admin.training.availability.*', 'px-nav-active') }}"><a href="#"><span class="px-nav-label">Set Availability</span></a></li>
                                <li class="px-nav-item {{ active('admin.training.studenthist.*', 'px-nav-active') }}"><a href="#"><span class="px-nav-label">View Student's History</span></a></li>
                                @if(Auth::user()->hasRole(['atm','datm','ta']))
                                    <li class="px-nav-item {{ active('admin.training.solocert.*', 'px-nav-active') }}"><a href="#"><span class="px-nav-label">Solo Cert Admin</span></a></li>
                                @endif
                            </ul>
                        </li>
                    @endif
                </ul>
            </li>
            @if(Auth::user()->hasRole(['atm','datm','ta','wm','ec','fe','ins','mtr','aec','awm','ata']))
                <li class="px-nav-item px-nav-dropdown {{ active(['admin.*', 'not:admin.training.*'], 'px-open') }}">
                    <a href="#"><i class="px-nav-icon fa fa-lock"></i><span class="px-nav-label">{{ $settings->artcc_code }} Administration</span></a>
                    <ul class="px-nav-dropdown-menu">
                        @if(Auth::user()->hasRole(['atm','datm','ta','wm','ins','mtr','ata']))
                            <li class="px-nav-item {{ active('admin.roster.*', 'px-nav-active') }}"><a href="{{ route('admin.roster.index') }}"><span class="px-nav-label">Roster</span></a></li>
                        @endif
                        @if(Auth::user()->hasRole(['atm','datm']))
                            <li class="px-nav-item {{ active('admin.transfer.*', 'px-nav-active') }}"><a href="{{ route('admin.transfer.index') }}"><span class="px-nav-label">Transfers</span></a></li>
                        @endif
                        @if(Auth::user()->hasRole(['atm','datm','ta']))
                            <li class="px-nav-item {{ active('admin.staff.*', 'px-nav-active') }}"><a href="{{ route('admin.staff.index') }}"><span class="px-nav-label">Staff</span></a></li>
                        @endif
                        @if(Auth::user()->hasRole(['atm','datm','ec','aec','wm']))
                            <li class="px-nav-item {{ active('admin.events.*', 'px-nav-active') }}"><a href="#"><span class="px-nav-label">Events</span></a></li>
                        @endif
                        @if(Auth::user()->hasRole(['atm','datm','fe','ta','wm']))
                            <li class="px-nav-item {{ active('admin.documents.*', 'px-nav-active') }}"><a href="#"><span class="px-nav-label">Documents & Files</span></a></li>
                        @endif
                        @if(Auth::user()->hasRole(['atm','datm']))
                        <li class="px-nav-item px-nav-dropdown {{ active('admin.admin.*', 'px-open') }}">
                            <a href="#"><span class="px-nav-label">Other Administration</span></a>
                            <ul class="px-nav-dropdown-menu">
                                <li class="px-nav-item {{ active('admin.admin.broadcast.*', 'px-nav-active') }}"><a href="#"><span class="px-nav-label">Broadcast Email</span></a></li>
                                <li class="px-nav-item {{ active('admin.admin.activity.*', 'px-nav-active') }}"><a href="#"><span class="px-nav-label">Site Activity</span></a></li>
                                <li class="px-nav-item {{ active('admin.admin.feedback.*', 'px-nav-active') }}"><a href="#"><span class="px-nav-label">Feedback</span></a></li>
                                <li class="px-nav-item {{ active('admin.admin.announcements.*', 'px-nav-active') }}"><a href="#"><span class="px-nav-label">Index Announcements</span></a></li>
                            </ul>
                        </li>
                        @endif
                    </ul>
                </li>
            @endif
            @if(Auth::user()->hasRole(['atm','datm','wm']))
                <li class="px-nav-item px-nav-dropdown {{ active('system.*', 'px-open') }}">
                    <a href="#"><i class="px-nav-icon fa fa-lock"></i><span class="px-nav-label">System Administration</span></a>
                    <ul class="px-nav-dropdown-menu">
                        <li class="px-nav-item {{ active('system.settings.*', 'px-nav-active') }}"><a href="{{ route('system.settings.index') }}"><span class="px-nav-label">Settings</span></a></li>
                        <li class="px-nav-item {{ active('system.roles.*', 'px-nav-active') }}"><a href="{{ route('system.roles.index') }}"><span class="px-nav-label">Roles</span></a></li>
                        <li class="px-nav-item {{ active('system.airports.*', 'px-nav-active') }}"><a href="{{ route('system.airports.index') }}"><span class="px-nav-label">Airports</span></a></li>
                        <li class="px-nav-item {{ active('system.forum.*', 'px-nav-active') }}"><a href="{{ route('system.forum.index') }}"><span class="px-nav-label">Forum Admin</span></a></li>
                        <li class="px-nav-item {{ active('system.email.*', 'px-nav-active') }}"><a href="#"><span class="px-nav-label">Email Admin</span></a></li>
                    </ul>
                </li>
            @endif
        @endif
    </ul>
</nav>