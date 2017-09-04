@extends('layouts.master')

@section('seo-title', 'Kontakt')
@section('seo-description', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.')
@section('seo-keywords', 'Firmen, Firmensuche, Branchenbuch, Edirectory')
@section('seo-image', url('/images/backgrounds/contact.jpg'))
@section('seo-url', route('contact'))

@push('custom-js')
<script type="text/javascript" src="//www.google.com/recaptcha/api.js"></script>
<script>
    function onSubmit(token) {
        $.submitForm('contact-form');
    }
</script>
@endpush

@section('content')
<div id="page" class="contact-page">
    <div id="main-wrapper">
        <div id="main">
            <div id="main-inner">

                <div class="breadcrumb-wrapper">
                    <div class="container">
                        <ol class="breadcrumb pull-left">
                            <li><a href="{{ route('home') }}">Startseite</a></li>
                            <li><a class="active" href="{{ route('contact') }}">Kontakt</a></li>
                        </ol><!-- /.breadcrumb -->

                    </div><!-- /.container -->
                </div><!-- /.breadcrumb-wrapper -->

                <div class="container contact-container">
                    <div class="block-content">
                        <div class="block-content-inner">
                            <div class="page-header center">
                                <h1>Kontaktieren Sie Uns</h1>
                            </div><!-- /.page-header -->

                            <div class="row mb40">
                                <div class="col-sm-4">
                                    <h4>Kontaktinformationen</h4>

                                    <p><strong>Your Company, Inc.</strong></p>

                                    <p class="address">
                                        <i class="icon icon-normal-pointer-pin"></i>
                                        <span>795 Folsom Ave, Suite 600<br>San Francisco, CA 94107</span>
                                    </p>

                                    <p>
                                        <strong><i class="icon icon-normal-phone"></i> Phone:</strong> (123) 456-7890<br>
                                        <strong><i class="icon icon-normal-mail"></i> E-mail:</strong> mail@yourcompany.com
                                    </p>
                                </div>

                                <div class="col-sm-8">
                                    <iframe class="contact-map" width="425" height="425" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=5th+Avenue,+New+York,+NY,+United+States&amp;aq=0&amp;oq=5th+&amp;sll=37.0625,-95.677068&amp;sspn=70.689889,135.263672&amp;ie=UTF8&amp;hq=&amp;hnear=5th+Ave,+New+York&amp;t=m&amp;z=13&amp;ll=40.649866,-74.005367&amp;output=embed"></iframe>
                                </div>
                            </div><!-- /.row -->

                            <form method="post" action="{{ route('contact.submit') }}" id="contact-form">
                                <div class="alert alert-success" id="success-alert">
                                    <p id="success-alert-main">Vielen Dank für Ihre Bewertung, diese wird nach Prüfung freigeschalten.</p>
                                    <p id="success-alert-sub"></p>
                                </div>
                                <!-- Error message -->
                                <div class="alert alert-danger" id="error-alert">
                                    <p id="error-alert-main">Leider gab es einen Fehler, bitte probieren Sie es erneut.</p>
                                    <p id="error-alert-sub"></p>
                                </div>
                                <div class="row">
                                    <div class="form-group col-sm-4 col-md-4">
                                        <label>Ihr Name</label>
                                        <input type="text" name="name" id="name" class="form-control">
                                    </div><!-- /.form-group -->

                                    <div class="form-group col-sm-4 col-md-4">
                                        <label>Ihre E-Mailadresse</label>
                                        <input type="text" name="email" id="email" class="form-control">
                                    </div><!-- /.form-group -->

                                    <div class="form-group col-sm-4 col-md-4">
                                        <label>Betreff der Nachricht</label>
                                        <input type="text" name="subject" id="subject" class="form-control">
                                    </div><!-- /.form-group -->
                                </div><!-- /.row -->

                                <div class="textarea form-group">
                                    <label>Ihre Nachricht</label>
                                    <textarea class="form-control" id="message" rows="4" name="message"></textarea>
                                </div>

                                <!-- Success message -->
                                <div class="alert alert-success">
                                    <p>Vielen Dank für Ihre Nachricht.</p>
                                </div>
                                <!-- Error message -->
                                <div class="alert alert-danger">
                                    <p>Leider gab es einen Fehler, bitte probieren Sie es erneut.</p>
                                </div>

                                <div id="recaptcha" class="g-recaptcha"
                                     data-sitekey="{{ config('edir.google_captcha_key') }}"
                                     data-callback="onSubmit"
                                     data-size="invisible"></div>

                                <button type="submit" class="btn btn-secondary"
                                        data-loading-text="<i class='fa fa-cog fa-spin fa-fw'></i> <strong>Bitte warten</strong>"
                                        data-success-text="<i class='fa fa-check fa-fw'></i> <strong>Nachricht verschickt</strong>">
                                    Nachricht abschicken <i class="fa fa-caret-right"></i></button>

                            </form>
                        </div><!-- /.block-content-inner -->
                    </div><!-- /.block-content -->
                </div>

            </div><!-- /#main-inner -->
        </div><!-- /#main -->
    </div><!-- /#main-wrapper -->
</div><!-- /#page -->

@stop