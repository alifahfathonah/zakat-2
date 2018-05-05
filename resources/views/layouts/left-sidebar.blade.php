    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            @guest
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="{{ asset('profile.jpg') }}" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">PRISMA</div>
                    <div class="email">Tamu</div>
                </div>
            </div>
            <div class="menu">
                <ul class="list">
                <li class="header">MAIN NAVIGATION</li>
                    <li class="{{ (\Request::route()->getName() == 'home') ? 'active' : '' }}">
                        <a href="{{route('home')}}">
                            <i class="material-icons">dashboard</i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- #User Info -->
            @else
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="{{ asset('profile.jpg') }}" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{Auth::user()->name}}</div>
                    <div class="email">{{Auth::user()->email}}</div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                            <li role="seperator" class="divider"></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">group</i>Followers</a></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">shopping_cart</i>Sales</a></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">favorite</i>Likes</a></li>
                            <li role="seperator" class="divider"></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="{{ (\Request::route()->getName() == 'home') ? 'active' : '' }}">
                        <a href="{{route('home')}}">
                            <i class="material-icons">dashboard</i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="{{ (\Request::route()->getName() == 'zakat' || \Request::route()->getName() == 'zakat.create' || \Request::route()->getName() == 'zakat.createOther' || \Request::route()->getName() == 'zakat.confirmation') ? 'active' : '' }}">
                        <a href="{{route('zakat')}}">
                            <i class="material-icons">account_balance_wallet</i>
                            <span>Zakat</span>
                        </a>
                    </li>
                    <li>
                        <a href="mustahiq.php">
                            <i class="material-icons">face</i>
                            <span>Mustahiq</span>
                        </a>
                    </li>
                    <li>
                        <a href="laporan.php">
                            <i class="material-icons">assignment</i>
                            <span>Laporan</span>
                        </a>
                    </li>
                    @if(Auth::user()->hasRole('Administrator'))
                    <li>
                        <a href="user.php">
                            <i class="material-icons">account_box</i>
                            <span>User</span>
                        </a>
                    </li>
                    @endif
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2016 - 2017 <a href="javascript:void(0);">AdminBSB - Material Design</a>.
                </div>
                <div class="version">
                    <b>Version: </b> 1.0.5
                </div>
            </div>
            <!-- #Footer -->
            @endguest
        </aside>
        <!-- #END# Left Sidebar -->
    </section>