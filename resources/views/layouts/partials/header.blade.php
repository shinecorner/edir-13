<div id="header-wrapper">
    <div id="header">
        <div id="header-inner">
            <nav class="navbar navbar-default">
                <div class="container">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="{{ route('home') }}">
                            <span class="logo-styled">
                                <span class="logo-title">
                                    <img src="/images/logo-directory.png" alt="Logo"> {{__('Director')}}
                                </span><!-- /.logo-title -->
                                <span class="logo-subtitle hidden-sm">
                                    {{__('Business')}}<br>{{__('Directory')}}
                                </span>
                            </span><!-- /.logo-styled -->
                        </a>
                    </div>
                    <div class="collapse navbar-collapse" id="navbar-main">
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="{{ route('home') }}">Startseite</a></li>
                            <li><a href="{{ route('event') }}">Veranstaltungen</a></li>
                            <li><a href="{{ route('deal') }}">Angebote</a></li>
                            <li><a href="{{ route('blog') }}">Blog</a></li>
                            <li><a href="{{ route('contact') }}">Kontakt</a></li>
                        </ul><!-- /.nav -->
                    </div><!-- /.navbar-collapse -->
                </div>
            </nav>
        </div><!-- /#header-inner -->
    </div><!-- /#header -->
</div>