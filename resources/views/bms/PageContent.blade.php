@extends('layouts.bms')


@section('page')
    <div class="wrap">
        {{--Navbar--}}
        <div class="page-header">
            <div class="leftside-header">
                <div class="logo">
                    <a href="{{ url('dashboard') }}" class="on-click">
                        <img alt="logo" src="{{asset('/')}}images/nipress-logo.png" style="padding: 0px 0px; margin-left: 0px" />
                    </a>
                </div>
                 <div class="leftside-header" id="search-headerbox">
                {{--<h4>BMS INTERFACE</h4>--}}
            </div>
                <div id="menu-toggle" class="visible-xs toggle-left-sidebar" data-toggle-class="left-sidebar-open" data-target="html">
                    <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
                </div>

            </div>
            <div class="rightside-header">
                <div class="header-middle"></div>

                <div class="header-section hidden-xs hide" id="notice-headerbox">
                    <div class="notice" id="alerts-notice">
                        <i class="fa fa-bell-o" aria-hidden="true"></i>
                        <span>4</span>
                        <div class="dropdown-box basic">
                            <div class="drop-header">
                                <h3><i class="fa fa-bell-o" aria-hidden="true"></i> Notifications</h3>
                                <span class="number">4</span>
                            </div>
                            <div class="drop-content">
                                <div class="widget-list list-left-element list-sm">
                                    <ul>
                                        <li>
                                            <a href="#">
                                                <div class="left-element"><i class="fa fa-warning color-warning"></i></div>
                                                <div class="text">
                                                    <span class="title">8 Alarm</span>
                                                    <span class="subtitle">reported today</span>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="drop-footer">
                                {{--todo: add link to alarm page--}}
                                <a>See all notifications</a>
                            </div>
                        </div>
                    </div>
                    <div class="header-separator"></div>
                </div>
                <div class="header-section hidden-xs" id="notice-headerbox">
                    <div class="header-separator"></div>
                    <div class="notice" id="alerts-notice">
                        <i class="fa fa-calendar" aria-hidden="true"></i>
                        <span> {{ date('D d M Y') }},</span>
                        <span id="server" class="hide"></span>
                        <span id="clockDisplay">{{date('h:i:s')}}</span>
                    </div>
                    <div class="header-separator"></div>
                </div>
                <div class="header-section" id="user-headerbox">
                    <div class="user-header-wrap">
                        <div class="user-photo">
                            <img src="{{asset('/')}}images/user-avatar.jpg" alt="Jane Doe"/>
                        </div>
                        <div class="user-info">
                            <span class="user-name">{{Auth::user()->name}}</span>
                            <span class="user-profile">{{Auth::user()->level}}</span>
                        </div>
                        <i class="fa fa-plus icon-open" aria-hidden="true"></i>
                        <i class="fa fa-minus icon-close" aria-hidden="true"></i>
                    </div>
                    <div class="user-options dropdown-box hide">
                        <div class="drop-content basic">
                            <ul>
                                {{--todo: add link to user adminitration--}}
                                <li><a href="#dummy"><i class="fa fa-user" aria-hidden="true"></i> Profile</a></li>
                                <li><a href="#dummy"><i class="fa fa-lock" aria-hidden="true"></i> Lock Screen</a></li>
                                {{--<li><a href="#"><i class="fa fa-cog" aria-hidden="true"></i> Configurations</a></li>--}}
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="header-separator"></div>
                <div class="header-section">
                    <a href="{{ url('/logout') }}"><i class="fa fa-sign-out log-out" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
        {{--Navbar--}}

        <div class="page-body">
            {{--Left Menu--}}
            <div class="left-sidebar">
                <div class="left-sidebar-header">
                    <div class="left-sidebar-title">Navigation</div>
                    <div class="left-sidebar-toggle c-hamburger c-hamburger--htla hidden-xs hide" data-toggle-class="left-sidebar-collapsed" data-target="html">
                        <span></span>
                    </div>
                </div>
                <div id="left-nav" class="nano">
                    <div class="nano-content">
                        <nav>
                            <ul class="nav" id="main-nav">
                                <li class="{{(Request::segment(1) == '')?'active-item': '' ||(Request::segment(1) == 'dashboard')?'active-item': '' }}"><a href="{{url('dashboard')}}"><i class="fa fa-home" aria-hidden="true"></i><span>Dashboard</span></a></li>
                                <li class="{{ (Auth::user()->level == 'admin')?'':'hide' || Auth::user()->level == 'super'}} {{ (Request::segment(1) == 'parameter-setting')?'active-item': '' }}"><a href="{{url('parameter-setting')}}"><i class="fa fa-sliders" aria-hidden="true"></i><span>Parameter Setting</span></a></li>
                                <li class="has-child-item close-item {{ (Request::segment(1) == 'datalog-monitoring'|| Request::segment(1)== 'datalog-alarm')?'active-item open-item': 'close-item' }}">
                                    <a><i class="fa fa-file-excel-o" aria-hidden="true"></i><span>Logs</span></a>
                                    <ul class="nav child-nav level-1">
                                        <li class="{{ (Request::segment(1) == 'datalog-monitoring')?'active-item': '' }}"><a href="{{url('datalog-monitoring')}}">Data Log</a></li>
                                        <li class="{{ (Request::segment(1) == 'datalog-alarm')?'active-item': '' }}"><a href="{{url('datalog-alarm')}}">Alarm Log</a></li>
                                    </ul>
                                </li>
                                <li class="has-child-item  {{( Request::segment(1) == 'configuration-datetime' ||Request::segment(1) == 'configuration-network' || Request::segment(1) == 'configuration-siteinfo' || Request::segment(1) == 'configuration-pack') ?'active-item open-item': 'close-item' }}">
                                    <a><i class="fa fa-cubes" aria-hidden="true"></i><span>Configuration</span></a>
                                    <ul class="nav child-nav level-1">
                                        <li class="{{ (Request::segment(1) == 'configuration-datetime')?'active-item': '' }}"><a href="{{url('configuration-datetime')}}">DateTime</a></li>
                                        <li class="{{ (Request::segment(1) == 'configuration-network')?'active-item': '' }}"><a href="{{url('configuration-network')}}">Network</a></li>
                                        <li class="{{ (Request::segment(1) == 'configuration-sitenfo')?'active-item': '' }}"><a href="{{url('configuration-siteinfo')}}">Site Info</a></li>
                                        <li class="{{ (Request::segment(1) == 'configuration-pack')?'active-item': '' }}"><a href="{{url('configuration-pack')}}">Pack Config</a></li>
                                    </ul>
                                </li>
                                <li class="{{ (Auth::user()->level == 'admin' || Auth::user()->level == 'super')?'':'hide' }} {{ (Request::segment(1) == 'administration')?'active-item': '' }}"><a href="{{url('administration')}}"><i class="fa fa-users" aria-hidden="true"></i><span>Administration</span></a></li>

                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            {{--Left Menu--}}

            {{--Content Page--}}
            @yield('content')
            {{--Content Page--}}

            {{--Right Menu--}}
            <div class="right-sidebar hide">
                <div class="right-sidebar-toggle" data-toggle-class="right-sidebar-opened" data-target="html">
                    <i class="fa fa-cog fa-spin" aria-hidden="true"></i>
                </div>
                <div id="right-nav" class="nano">
                    <div class="nano-content">
                        <div class="template-settings">
                            <h4 class="text-center">Template Settings</h4>
                            <ul class="toggle-settings pv-xlg">
                                <li>
                                    <h6 class="text">Header fixed</h6>
                                    <label class="switch">
                                        <input id="header-fixed" type="checkbox" checked>
                                        <span class="slider round"></span>
                                    </label>
                                </li>
                                <li>
                                    <h6 class="text">Left sidebar fixed</h6>
                                    <label class="switch">
                                        <input id="left-sidebar-fixed" type="checkbox" checked>
                                        <span class="slider round"></span>
                                    </label>
                                </li>
                                <li>
                                    <h6 class="text">Left sidebar collapsed</h6>
                                    <label class="switch">
                                        <input id="left-sidebar-collapsed" type="checkbox">
                                        <span class="slider round"></span>
                                    </label>
                                </li>
                                <li>
                                    <h6 class="text">Content header fixed</h6>
                                    <label class="switch">
                                        <input id="content-header-fixed" type="checkbox" checked>
                                        <span class="slider round"></span>
                                    </label>
                                </li>
                            </ul>
                            <h4 class="text-center">Template Colors</h4>
                            <ul class="toggle-colors">
                                <li>
                                    <a href="index.html" class="on-click"> <img alt="Helsinki-green" src="{{asset('/')}}images/helsinki-green.png"/></a>
                                </li>
                                <li>
                                    <a href="http://myiideveloper.com/helsinki/helsinki-light/index.html" class="on-click"> <img alt="Helsinki-light"
                                                                                                                                 src="{{asset('/')}}images/helsinki-light.png"/></a>
                                </li>
                                <li>
                                    <a href="http://myiideveloper.com/helsinki/helsinki-blue/index.html" class="on-click"> <img alt="Helsinki-blue" src="{{asset('/')}}images/helsinki-blue.png"/></a>
                                </li>
                                <li>
                                    <a href="http://myiideveloper.com/helsinki/helsinki-red/index.html" class="on-click"> <img alt="Helsinki-red"
                                                                                                                               src="{{asset('/')}}images/helsinki-red.png"/></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            {{--Right Menu--}}

            <a href="#" class="scroll-to-top"><i class="fa fa-angle-double-up"></i></a>
        </div>

        <div class="page-footer">
            <h6 class="mb-xlg text-right" style="color: whitesmoke">&copy; 2017 | All Rights Reserved , <a href="http://nipress.com/en/home/" target="_blank" onmouseover="this.style.color='#FFA500'">NIPRESS &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></h6>
        </div>
    </div>

    <!-- Loading Box Modal -->
    <div class="modal" id="progress" tabindex="-1" role="dialog" aria-labelledby="modal-label" >
        <div class="modal-dialog modal-sm" role="document">

            <center id="loadingbox">
                <h2 class="">Loading</h2>
                <div id="out" class="circle">
                    <div id="quarterbox">
                        <div id="quarter" class="circle"></div>
                    </div>
                    <div id="in" class="circle"></div>
                </div>
            </center>

            <div class="loader hide">
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
            </div>

            <div class="progress hide">
                <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">
                    <span class="sr-only">0% Complete</span>
                </div>
            </div>
        </div>
    </div>
    <!-- Loading Box Modal -->


@endsection