@extends('layouts.master')

@section('seo-title', $listing->name)
@section('seo-description', $listing->summary)
@section('seo-keywords', $listing->seo_keywords)
@section('seo-image', url($listing->image('200x200')))
@section('seo-url', route('deal.single', $listing->slug))

@push('custom-js')
    <script type="text/javascript">
        var position_lat = "<?php echo $listing->company->location->latitude?>";
        var position_lng = "<?php echo $listing->company->location->longitude?>";
        $(function(){
            if(position_lat && position_lng){
                $('#company-map')
                    .gmap3({
                        center:[position_lat, position_lng],
                        zoom:15,
                        streetViewControl: true,
                    })
                    .marker([
                        {position:[position_lat, position_lng]},
                    ])
            }
        });

    </script>
@endpush

@section('content')
    {{-- http://preview.byaviators.com/template/superlist/listing-detail.html --}}
    <div id="main">
        <div id="main-inner"><div class="breadcrumb-wrapper">
                <div class="container">
                    <ol class="breadcrumb pull-left">
                        <li><a href="{{ route('home') }}">Startseite</a></li>
                        <li><a href="{{ route('deal') }}">Angebote</a></li>
                        <li><a href="{{ route('deal.listing', $listing->category->slug) }}">{{ $listing->category->name }}</a></li>
                        <li class="active">
                            <a href="#">{{ str_limit($listing->name, 40) }}</a>
                        </li>

                    </ol><!-- /.breadcrumb -->

                </div><!-- /.container -->
            </div><!-- /.breadcrumb-wrapper -->
            <div class="banner hidden-xs">

                    <img src="{{ $listing->image('1900x500') }}" alt="" title="">

                <div class="dark-background"></div>

                <div class="hero-text center">
                    <div class="small">{{ $listing->name }}</div>
                    <div class="large">{{ $listing->company->name }}</div>
                    <div class="small">{{ $listing->company->address_line }}</div>
                </div><!-- /.hero-text -->

                <div class="container relative">
                    <div class="small-photo">
                        <a href="{{ $listing->company->www }}">
                            <img src="{{ $listing->company->image('200x200') }}" alt="" title="">
                        </a>
                    </div><!-- /.small-photo -->
                </div>
            </div><!-- /.banner -->

            <div class="container">
                <div class="row">
                    <div class="col-sm-8">
                        <div class="block-content">
                            <div class="block-content-inner">
                                <div class="primary-content">
                                    <h2 class="widgetized-title">Beschreibung</h2>

                                    <p>
                                        {!! $listing->description !!}
                                    <div class="mt30">
                                        Mit dem Gutscheincode
                                        <label class="coupon-box">{{ $listing->discount_coupon }}</label> erhalten Sie
                                        einen Rabatt über {{ $listing->discount }}
                                    </div>
                                    </p>
                                </div>
                                <div class="primary-content">
                                    <h2 class="widgetized-title">Bedingungen</h2>
                                    {!! $listing->conditions !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="sidebar">
                            <div class="block-content">
                                <div class="block-content-inner">
                                    <div class="widget widget-boxed widget-boxed-dark dealwidget">
                                        <h3>Angebotszeitraum</h3>

                                        <div class="opening-hours">
                                            <div class="day clearfix">


                                            </div><!-- /.day -->

                                            <div class="day clearfix">
                                                <span class="icon-info"><i class="fa fa-fw fa-calendar"></i></span>
                                                <span class="detail-info">
                                                    <strong>
                                                        {{ $listing->date_start->format('d.m.Y') }}
                                                        bis {{ $listing->date_end->format('d.m.Y') }}
                                                    </strong>
                                                </span>
                                            </div><!-- /.day -->

                                            <div class="day clearfix">
                                                <span class="icon-info"><i class="fa fa-fw fa-money"></i></span>
                                                <span class="detail-info">
                                                @if($listing->regular_price && $listing->discount)
                                                        statt<span style="text-decoration: line-through;">€ {{ sprintf('%0.2f', $listing->regular_price) }}</span>nur
                                                        <strong>€ {{ sprintf('%0.2f', $listing->discount_price) }}</strong>
                                                @elseif($listing->regular_price)
                                                        <strong>€ {{ sprintf('%0.2f', $listing->regular_price) }}</strong>
                                                @else
                                                    -
                                                @endif
                                                </span>
                                            </div><!-- /.day -->
                                            @if($listing->discount_coupon && $listing->discount_type <> 'none')
                                                <div class="day clearfix">
                                                    <span class="icon-info"><i class="fa fa-fw fa-shopping-cart"></i></span>
                                                    <span class="detail-info">
                                                        Gutscheincode:
                                                        <strong class="coupon-box">
                                                            {{ $listing->discount_coupon }}
                                                        </strong>
                                                    </span>
                                                </div><!-- /.day -->
                                            @endif
                                            <div class="day clearfix">
                                                <span class="icon-info"><i class="fa fa-fw fa-link"></i></span>
                                                <span class="detail-info">
                                                    <a href="{{ $listing->product_url }}" target="_blank">Link zum Produkt</a>
                                                </span>
                                            </div><!-- /.day -->
                                        </div><!-- /.opening-hours -->
                                    </div><!-- /.widget -->
                                    <div class="widget widget-boxed widget-boxed-dark dealwidget">
                                        <h3>Veranstalter</h3>

                                            <div class="company-detail opening-hours">

                                                <div class="day clearfix">
                                                    <div class="icon-info"><i class="fa fa-fw fa-envelope-o"></i></div>
                                                    <div class="detail-info">
                                                    <a href="mailto:{{ $listing->company->encodedEmail }}">E-Mail Kontakt</a>
                                                </div>
                                                </div><!-- /.day -->


                                                <div class="day clearfix">
                                                    <div class="icon-info"><i class="fa fa-fw fa-phone"></i></div>
                                                    <div class="detail-info">
                                                    <a href="tel:{{ $listing->company->phone }}">{{ $listing->company->phone }}</a>
                                                </div>
                                                </div><!-- /.day -->
                                                <div class="day clearfix">
                                                    <div class="icon-info"><i class="fa fa-fw fa-fax"></i></div>
                                                    <div class="detail-info">
                                                    {{ $listing->company->fax ?: '-' }}
                                                </div>
                                                </div><!-- /.day -->
                                                <div class="day clearfix">
                                                    <div class="icon-info"><i class="fa fa-fw fa-mobile"></i></div>
                                                    <div class="detail-info">
                                                    <a href="tel:{{ $listing->company->mobile ?: '#' }}">{{ $listing->company->mobile ?: '-' }}</a>
                                                </div>
                                                </div><!-- /.day -->
                                                @if($listing->company->www)
                                                    <div class="day clearfix">
                                                        <div class="icon-info"><i class="fa fa-fw fa-map-o"></i></div>
                                                        <div class="detail-info">
                                                            {!! str_replace('<br>', ', ', $listing->company->address_block)  !!}
                                                        </div>
                                                    </div><!-- /.day -->
                                                @endif
                                            </div><!-- /.opening-hours -->


                                    </div><!-- /.widget -->
                                    @if($listing->video_url)
                                        <div class="widget widget-boxed widget-boxed-dark dealwidget">
                                            <h3>Video</h3>

                                            <div class="sidebar-video-container">
                                                <iframe src="//www.youtube.com/embed/{{ $listing->youtube_id }}"
                                                        frameborder="0" allowfullscreen class="video"></iframe>
                                            </div>
                                        </div><!-- /.widget -->
                                    @endif
                                    <div id="company-map" style="width: 100%; height: 250px;">

                                    </div>
                                    <div class="widget widget-boxed">
                                        @include('layouts.partials.social-pills-large', ['url' => request()->url(), 'text' => $listing->name])
                                    </div>
                                </div><!-- /.block-content-inner -->
                            </div><!-- /.block-content -->
                        </div>
                    </div>
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /#main-inner -->
    </div><!-- /#main -->
@endsection