<div id="footer-wrapper">
    <div id="footer">
        <div id="footer-inner">
            <div class="footer-top">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3>Über {{ config('app.name') }}</h3>

                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                        </div><!-- /.col-* -->

                        <div class="col-sm-6">
                            <h3>Kontakt Adresse</h3>

                            <p>
                                Your Street 123, Melbourne, Australia<br>
                                +1-123-456-789, <a href="#">sample@example.com</a>
                            </p>
                        </div><!-- /.col-* -->
                        <!-- /.col-* -->
                    </div><!-- /.row -->
                    <div class="fullwidth block-content-small-padding background-primary-dark">
                        <div class="block-content-inner">
                            <div class="social-stripe center">
                                <a href="#" class="facebook">
                                    <i class="fa fa-facebook"></i>
                                </a>

                                <a href="#" class="twitter">
                                    <i class="fa fa-twitter"></i>
                                </a>

                                <a href="#" class="dribbble">
                                    <i class="fa fa-dribbble"></i>
                                </a>

                                <a href="#" class="linkedin">
                                    <i class="fa fa-linkedin"></i>
                                </a>

                                <a href="#" class="pinterest">
                                    <i class="fa fa-pinterest"></i>
                                </a>

                                <a href="#" class="dropbox">
                                    <i class="fa fa-dropbox"></i>
                                </a>

                                <a href="#" class="linkedin">
                                    <i class="fa fa-linkedin"></i>
                                </a>

                                <a href="#" class="foursquare">
                                    <i class="fa fa-foursquare"></i>
                                </a>

                                <a href="#" class="instagram">
                                    <i class="fa fa-instagram"></i>
                                </a>
                            </div><!-- /.social-stripe -->
                        </div><!-- /.block-content-inner -->
                    </div>


                                                </div><!-- /.container -->
            </div><!-- /.footer-top -->

            <div class="footer-bottom">
                <div class="container">
                    <nav class="clearfix">
                        <ul class="nav navbar-nav footer-nav">
                            <li><a href="{{ route('imprint') }}">Impressum</a></li>
                            <li><a href="{{ route('privacy') }}">Datenschutz</a></li>
                            <li><a href="{{ route('term') }}">Nutzungsbedingungen</a></li>
                            <li><a href="{{ route('register') }}">Registrieren</a></li>
                            <li><a href="{{ route('contact') }}">Kontakt</a></li>
                        </ul><!-- /.nav -->
                    </nav>

                    <div class="copyright">
                        &copy; {{ date('Y') }} Alle Rechte vorbehalten.
                    </div>
                </div><!-- /.container -->
            </div><!-- /.footer-bottom -->
        </div><!-- /#footer-inner -->
    </div><!-- /#footer -->
</div>