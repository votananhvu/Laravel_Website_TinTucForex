<header id="masthead" class="site-header">
    @if(isset($pages) && count($pages) > 0)
    <div class="header-top">
        <div class="container">

            <div class="logo-left clear">
                <div class="row">

                    <div class="col-4 col-sm-12 collapse">

                        <div class="site-branding">
                            <h1 class="site-title"><a href="{{url('/')}}" rel="home">DEMO-FX24.net</a></h1>
                            <p class="site-description">{{$websiteName->Description}}</p>
                        </div><!-- .site-branding -->

                    </div>
                    <div class="col-8 col-sm-12  collapse">
                        <div class="header-navigation">
                            <div class="search-top">

                                <form role="search" method="get" class="search-form" action="{{url('/search')}}">
                                    <label>
                                        <span class="screen-reader-text">Search for:</span>
                                        <input type="text" class="search-field" placeholder="Search &hellip;"
                                            name="txt-search" />
                                    </label>
                                    <button type="submit" class="search-submit"><span class="sli icon-magnifier"></span>
                                        <span class="screen-reader-text">Search</span></button>
                                </form>
                            </div>
                            <nav id="top-navigation" class="top-navigation">
                                <ul id="menu-manu-phu" class="top-menu">
                                    <li id="menu-item"
                                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-8930">
                                        <a href="">Phần mềm MT4/MT5</a>
                                    </li>
                                    @foreach($categories as $key=>$value)
                                    @if($value->Group == NULL)
                                    <li id="menu-item"
                                        class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item">
                                        <a href="{{url('/category/'.$value->Alias)}}">{{$value->Name}}</a>
                                    </li>
                                    @endif
                                    @endforeach
                                </ul>
                            </nav><!-- .top-navigation -->
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div><!-- .header-top -->

    
    <div class="header-bottom sticky-header">
        <div id="main-navbar" class="main-navbar">
            <div class="container">
                
                @foreach ($pages as $key=>$value)
                @if($value->RowID == 1)
                <div class="home-link">                     
                    <a href="{{url($value->Alias)}}" title="Demo-FX24.net" rel="home">{!! $value->Font !!}</a>   
                </div>
                @endif 
                <nav id="site-navigation" class="main-navigation" aria-label="Main Menu">
                    <ul id="main-menu" class="main-menu">
                        @if($value->RowID == 2)
                        <li id="menu-item-433"
                            class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-has-children menu-item">
                            <a href="{{url('/category/'.$value->Alias)}}">{{$value->Name}}</a>
                            <ul class="sub-menu">
                                @foreach($categories as $k=>$v)
                                @if($v->Group === 'Kiến thức forex')
                                <li id="menu-item"
                                    class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item">
                                    <a href="{{url('/category/'.$v->Alias)}}">{{$v->Name}}</a>
                                </li>
                                @endif
                                @endforeach
                            </ul>
                        </li>
                        @endif
                        @if($value->RowID > 2)
                        <li id="menu-item"
                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item"><a
                                href="{{url('/'.$value->Alias)}}">{{$value->Name}}</a></li>
                        @endif
                    </ul>
                </nav>
                @endforeach
            </div>
        </div>

        <div id="mobile-header" class="mobile-header">
            <a class="mobile-title" href="{{url('/')}}" rel="home">{{$websiteName->Description}}</a>
            <div id="menu-toggle" on="tap:AMP.setState({ampmenu: !ampmenu})" class="menu-toggle" title="Menu">
                <span class="button-toggle"></span>
            </div>
            <div class="search-toggle" id="search-toggle"><span class="sli icon-magnifier"></span></div>
            <div class="search-container">
                <form role="search" method="post" class="search-form" action="">
                    <label>
                        <span class="screen-reader-text">Search for:</span>
                        <input type="text" class="search-field" placeholder="Search &hellip;" name="txt-search" />
                    </label>
                    <button type="submit" class="search-submit"><span class="sli icon-magnifier"></span> <span
                            class="screen-reader-text">Search</span></button>
                </form>
            </div>
        </div>
    </div><!-- .header-bottom -->
    @endif
</header><!-- .site-header -->

@if(isset($pages) && count($pages) > 0)
<aside id="mobile-sidebar" [class]="ampmenu ? 'mobile-sidebar toggled-on' : 'mobile-sidebar'" class="mobile-sidebar">
    <nav id="mobile-navigation" class="mobile-navigation" aria-label="Mobile Menu">
        <ul id="mobile-menu" class="mobile-menu">
            @foreach($pages as $key=>$value)
            @if($value->RowID == 2)
            <li class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-has-children menu-item">
                <a href="{{url('/category/'.$value->Alias)}}">{{$value->Name}}</a>
                <button class="dropdown-toggle" aria-expanded="false">
                    <span class="screen-reader-text">Show submenu</span>
                </button>
                <ul class="sub-menu">
                    @foreach($categories as $k=>$v)
                    @if($v->Group == 'Kiến thức forex')
                    <li class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item">
                        <a href="{{url('/category/'.$v->Alias)}}">{{$v->Name}}</a>
                    </li>
                    @endif
                    @endforeach
                </ul>
            </li>
            @endif
            @if($value->RowID > 2)
            <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item">
                <a href="{{url('/'.$value->Alias)}}">{{$value->Name}}</a>
            </li>
            @endif
            @endforeach
        </ul>
        <ul id="menu-manu-phu-1" class="mobile-menu">
            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item">
                <a href="">Phần mềm MT4/MT5</a>
            </li>
            @foreach ($categories as $key=>$value)
            @if($value->Group == NULL)
            <li class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item">
                <a href="{{url('/category/'.$value->Alias)}}">{{$value->Name}}</a>
            </li>
            @endif
            @endforeach
        </ul>
    </nav>
</aside>
@endif