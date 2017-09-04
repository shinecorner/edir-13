@extends('layouts.master')

@section('seo-title', 'Register')
@section('seo-description', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.')
@section('seo-keywords', 'Firmen, Firmensuche, Branchenbuch, Edirectory')
@section('seo-image', url('/images/backgrounds/register.jpg'))
@section('seo-url', route('register'))

@section('content')

    <div id="page">
        <div id="main-wrapper">
            <div id="main">
                <div id="main-inner">
                    <div class="breadcrumb-wrapper">
                        <div class="container">
                            <ol class="breadcrumb pull-left">
                                <li><a href="{{ route('home') }}">Startseite</a></li>
                                <li class="active"><a href="{{ route('register') }}">Registrieren</a></li>
                            </ol><!-- /.breadcrumb -->

                        </div><!-- /.container -->
                    </div><!-- /.breadcrumb-wrapper -->
                    <div class="container">
                        <div class="block-content">
                            <div class="block-content-inner">
                                <div class="page-header center">
                                    <h1>Unsere Preise</h1>
                                </div><!-- /.page-header -->

                                <div class="block-content fullwidth background-gray mb20">
                                    <div class="block-content-inner">
                                        <div class="pricing no-spacing clearfix">
                                            <div class="pricing-col pricing-secondary col-sm-6">
                                                <h2>Standard</h2>
                                                <h3>Monthly Plan</h3>
                                                <div class="price">$ 299</div>
                                                <ul>
                                                    <li>20GB Disk Space</li>
                                                    <li>20GB Monthly Bandwidth</li>
                                                    <li>Unlimited Users</li>
                                                    <li>5 Domains</li>
                                                    <li>-</li>
                                                    <li>Automatic Cloud Backups</li>
                                                </ul>
                                                <a href="#" class="btn btn-primary btn-secondary btn-large btn-empty btn-uppercase">Get Started</a>
                                            </div><!-- /.pricing-col -->

                                            <div class="pricing-col pricing-important col-sm-6">
                                                <h2>Premium</h2>
                                                <h3>Monthly Plan</h3>
                                                <div class="price">$ 399</div>
                                                <ul>
                                                    <li>20GB Disk Space</li>
                                                    <li>20GB Monthly Bandwidth</li>
                                                    <li>Unlimited Users</li>
                                                    <li>150 Domains</li>
                                                    <li>430 Email Accounts</li>
                                                    <li>Automatic Cloud Backups</li>
                                                </ul>
                                                <a href="#" class="btn btn-primary btn-secondary btn-large btn-empty btn-uppercase">Get Started</a>
                                            </div><!-- /.pricing-col -->
                                        </div><!-- /.pricing -->
                                    </div><!-- /.block-content-inner -->
                                </div><!-- /.block-content -->
                            </div><!-- /.block-content-inner -->
                        </div><!-- /.block-content -->
                        <div class="row mb40">
                            <div class="col-sm-12 col-lg-6 mb40">
                                <h3>Lorem Ipsum</h3>
                                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
                            </div>
                            <div class="col-sm-12 col-lg-6 mb40">
                                <h3>Lorem Ipsum</h3>
                                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
                            </div>
                        </div>
                    </div>

                </div><!-- /#main-inner -->
            </div><!-- /#main -->
        </div><!-- /#main-wrapper -->
    </div>

@endsection