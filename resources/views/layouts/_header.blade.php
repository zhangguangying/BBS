<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                LaraBBS
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                <li class="{{ active_class(if_route('topics.index')) }}"><a href="{{ route('topics.index') }}">话题</a></li>
                <li class="{{ active_class((if_route('categories.show') && if_route_param('category', 1))) }}"><a href="{{ route('categories.show', 1) }}">分享</a></li>
                <li class="{{ active_class(if_route('categories.show') && if_route_param('category', 2)) }}"><a href="{{ route('categories.show', 2) }}">教程</a></li>
                <li class="{{ active_class(if_route('categories.show') && if_route_param('category', 3)) }}"><a href="{{ route('categories.show', 3) }}">问答</a></li>
                <li class="{{ active_class(if_route('categories.show') && if_route_param('category', 4)) }}"><a href="{{ route('categories.show', 4) }}">公告</a></li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                @guest
                <!-- Authentication Links -->
                <li><a href="{{ route('login') }}">登录</a></li>
                <li><a href="{{ route('register') }}">注册</a></li>
                @else

                <li>
                    <a href="{{ route('topics.create') }}">
                        <span class="glyphicon glyphicon-plus"></span>
                    </a>
                </li>

                <!-- 消息通知标记 -->
                <li>
                    <a href="{{ route('notifications.index') }}" class="notifications-badge" style="margin-top: -2px;">
                        <span class="badge badge-{{ Auth::user()->notification_count > 0 ? 'hint' : 'fade' }}" title="消息提醒">
                            {{ Auth::user()->notification_count }}
                        </span>
                    </a>
                </li>

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                        <span class="user-avatar pull-left" style="margin-right: 8px;margin-top: -5px;">
                            <img src="{{ Auth::user()->avatar }}" alt="" width="30px" height="30px" class="img-responsive img-circle">
                        </span>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">

                        @can('manage_contents')
                        <li>
                            <a href="{{ url(config('administrator.uri')) }}">
                                <span class="glyphicon glyphicon-dashboard"></span>
                                管理后台
                            </a>
                        </li>
                        @endcan

                        <li>
                            <a href="{{ route('users.show', Auth::id()) }}">
                                <span class="glyphicon glyphicon-user"></span>
                                个人中心
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('users.edit', Auth::id()) }}">
                                <span class="glyphicon glyphicon-edit"></span>
                                编辑资料
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit()">
                                <span class="glyphicon glyphicon-log-out"></span>
                                退出登陆
                            </a>
                            <form action="{{ route('logout') }}" id="logout-form" method="POST" style="display: none">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>