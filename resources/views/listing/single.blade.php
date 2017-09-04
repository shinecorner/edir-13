@extends('layouts.master')

@section('seo-title', $listing->seo_meta_title)
@section('seo-description', $listing->seo_meta_description)
@section('seo-keywords', $listing->seo_keywords)
@section('seo-image', url($listing->image('200x200')))
@section('seo-url', route('listing.single', $listing->slug))

@push('custom-js')
    <script type="text/javascript" src="//www.google.com/recaptcha/api.js"></script>
    <script type="text/javascript">
        function onSubmit(token) { $.submitForm('review-form'); }
        $(function(){
            $('#gallery').bxSlider({
                pagerSelector: '#gallery-pager .pager',
                mode: 'fade',
                nextSelector: '#gallery-pager .next',
                nextText: '',
                prevSelector: '#gallery-pager .prev',
                prevText: '',
                buildPager: function (slideIndex) {
                    var selector = '.thumbnail-' + slideIndex;
                    return $(selector).html();
                }
            });
            $("#rateYo").rateYo({
                ratedFill: "#ffd925",
                fullStar: true,
            }).on("rateyo.set", function (e, data) {
                $("#rating-input").val(data.rating);
            });
            var position_lat = "<?php echo $listing->location->latitude?>";
            var position_lng = "<?php echo $listing->location->longitude?>";

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
                        <li class="active">
                            <a href="#">{{ $listing->name }}</a>
                        </li>
                    </ol><!-- /.breadcrumb -->

                </div><!-- /.container -->
            </div><!-- /.breadcrumb-wrapper -->
            <div class="banner hidden-xs">

                    <img src="{{ $listing->image('1900x500') }}" alt="" title="">


                <div class="dark-background"></div>
                <?php $labels_array = array('tag-label-warning','tag-label-success');?>
                <div class="hero-text center">
                    <div class="large">{{ $listing->name }}</div>
                    <div class="small">{{ $listing->address_line }}</div>
                    {{--@foreach($listing->categories as $i=>$category)--}}
                        {{--<h4>--}}
                            {{--<span class="tag-label {{($i % 2 ==0) ? 'tag-label-success' : 'tag-label-warning'}}">{{ $category->name }}</span>--}}
                        {{--</h4>--}}
                    {{--@endforeach--}}

                </div><!-- /.hero-text -->

                <div class="container relative">
                    <div class="small-photo">
                        <a href="#">

                                <img src="{{ $listing->image('200x200') }}" alt="" title="">

                        </a>
                    </div><!-- /.small-photo -->
                </div>
            </div><!-- /.banner -->

            <div class="container">
                <div class="row">
                    <div class="col-sm-8">
                        <div class="block-content">
                            <div class="block-content-inner">
                                <div class="company-gallery" id="gallery-wrapper">
                                    <div id="gallery">
                                        @foreach($listing->gallery_images as $gallery_image)
                                            <div class="slide">
                                                <div class="picture-wrapper">
                                                    <img src="{{ url($gallery_image->image('750x480')) }}" alt="#">
                                                </div>
                                            </div>
                                        @endforeach
                                    </div><!-- /.gallery -->

                                    <div id="gallery-pager" class="background-white">
                                        <div class="prev">
                                            <i class="fa fa-angle-left"></i>
                                        </div>

                                        <div class="pager">
                                        </div>

                                        <div class="next">
                                            <i class="fa fa-angle-right"></i>
                                        </div>
                                    </div><!-- /#gallery-pager -->


                                    <div class="gallery-thumbnails">
                                        @foreach($listing->gallery_images as $i=>$gallery_image)
                                            <div class="thumbnail-{{$i}}">
                                                <img src="{{ url($gallery_image->image('100x100')) }}" alt="#">
                                            </div>
                                        @endforeach
                                    </div><!-- /.gallery-thumbnails -->

                                </div> <!-- /#gallery-wrapper -->
                                <div class="primary-content">
                                    <h3 class="widgetized-title">Über {{ $listing->name }}</h3>

                                    <p>
                                        {!! $listing->description !!}
                                    </p>
                                    @if($listing->ratings->count())
                                    <h3 class="widgetized-title mt40">Die letzten Bewertungen</h3>


                                    <div id="comments" class="clearfix">

                                        <!-- Comments List
                                        ============================================= -->
                                        <ol class="commentlist clearfix">
                                            @forelse($listing->ratings as $rating)
                                            <li class="comment even thread-even depth-1" id="li-comment-1">

                                                <div id="comment-1" class="comment-wrap clearfix">

                                                    <div class="comment-meta">

                                                        <div class="comment-author vcard">

												<span class="comment-avatar clearfix">
												<img alt="" src="{{url('/images/avatar.png')}}" class="avatar avatar-60 photo avatar-default" height="60" width="60"></span>

                                                        </div>

                                                    </div>

                                                    <div class="comment-content clearfix col-lg-12">
                                                        <div class="col-sm-10">
                                                            <div class="comment-author">{{$rating->title}}<span><a href="#" title="Permalink to this comment">By {{$rating->name}} at {{$rating->created_at->formatLocalized('%d %B %Y')}}</a></span></div>


                                                            <div>
                                                                <p>{{ $rating->description }}</p>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <a class="review-comment-ratings" href="#">
                                                                <span style="float: right; margin-right: 20px;">
                                                                    @for($i = 1;$i <= $rating->rating; $i++)
                                                                        <i class="fa fa-star"></i>
                                                                    @endfor
                                                                </span>
                                                            </a>
                                                        </div>
                                                    </div>

                                                    <div class="clear"></div>

                                                </div>

                                            </li>
                                            @endforeach
                                        </ol><!-- .commentlist end -->

                                        <div class="clear"></div>
                                    </div>
                                    @endif

                                    <h3 class="widgetized-title">Verfassen Sie eine Bewertung</h3>
                                    <div class="alert alert-success" id="success-alert" style="display: none;">
                                        <p id="success-alert-main">Vielen Dank für Ihre Bewertung, diese wird nach Prüfung freigeschalten.</p>
                                        <p id="success-alert-sub"></p>
                                    </div>
                                    <!-- Error message -->
                                    <div class="alert alert-danger" id="error-alert" style="display: none;">
                                        <p id="error-alert-main">Leider gab es einen Fehler, bitte probieren Sie es erneut.</p>
                                        <p id="error-alert-sub"></p>
                                    </div>
                                    <form class="ng-pristine ng-valid" action="{{ route('review.add') }}" method="POST" id="review-form" autocomplete="off">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="company" value="{{ $listing->slug }}">
                                        <div class="row">
                                            <div class="form-group col-sm-6">
                                                <input type="text" id="name" name="name" class="form-control" placeholder="Ihr Name" required="required">
                                            </div><!-- /.form-group -->

                                            <div class="form-group col-sm-6">
                                                <input type="text" class="form-control" id="title" name="title" placeholder="Titel" required="required">
                                            </div><!-- /.form-group -->
                                        </div><!-- /.row -->
                                        <div class="row">
                                            <div class="form-group col-sm-12">
                                                <div id="rateYo"></div>
                                                <input type="hidden" value="" name="rating" id="rating-input">
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="form-group col-lg-12">
                                                <textarea id="message" name="description" placeholder="Ihre Meinung" required="required" class="form-control" rows="4"></textarea>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="form-group col-lg-6">
                                                <!-- Success message -->
                                                <div id="recaptcha" class="g-recaptcha"
                                                     data-sitekey="{{ config('edir.google_captcha_key') }}"
                                                     data-callback="onSubmit"
                                                     data-size="invisible"></div>

                                                <button type="submit" class="btn btn-primary btn-block"
                                                        data-loading-text="<i class='fa fa-cog fa-spin fa-fw'></i> <strong>Bitte warten</strong>"
                                                        data-success-text="<i class='fa fa-check fa-fw'></i> <strong>Bewertung verschickt</strong>">
                                                    Bewertung abschicken<i class="fa fa-fw fa-caret-right"></i>
                                                </button>

                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="sidebar">
                            <div class="block-content">
                                <div class="block-content-inner">
                                    <div class="widget widget-boxed widget-boxed-dark dealwidget">
                                        <div class="opening-hours">
                                            <div class="day clearfix">
                                                <div class="icon-info detail-overview-rating">
                                                    <i class="fa fa-fw fa-star"></i>
                                                    <strong>{{ round($listing->ratings->avg('rating'), 1) }} / 5 </strong>von <a href="#reviews">{{ $listing->ratings->count() }} Bewertungen</a>
                                                </div>
                                            </div><!-- /.day -->
                                        </div><!-- /.opening-hours -->

                                    </div><!-- /.widget -->
                                    <div class="widget widget-boxed widget-boxed-dark dealwidget">
                                        <h3>Wir befinden uns hier</h3>
                                            <div class="opening-hours company-detail">
                                                <div class="day clearfix">
                                                    <div class="icon-info"><i class="fa fa-fw fa-envelope-o"></i></div>
                                                    <div class="detail-info">
                                                        <a href="mailto:{{ $listing->encodedEmail }}">E-Mail Kontakt</a>
                                                    </div>
                                                </div><!-- /.day -->


                                                <div class="day clearfix">
                                                    <div class="icon-info"><i class="fa fa-fw fa-phone"></i></div>
                                                    <div class="detail-info">
                                                        <a href="tel:{{ $listing->phone }}">{{ $listing->phone }}</a>
                                                    </div>
                                                </div><!-- /.day -->
                                                <div class="day clearfix">
                                                    <div class="icon-info"><i class="fa fa-fw fa-fax"></i></div>
                                                    <div class="detail-info">
                                                        {{ $listing->fax ?: '-' }}
                                                    </div>
                                                </div><!-- /.day -->
                                                <div class="day clearfix">
                                                    <div class="icon-info"><i class="fa fa-fw fa-mobile"></i></div>
                                                    <div class="detail-info">
                                                        <a href="tel:{{ $listing->mobile ?: '#' }}">{{ $listing->mobile ?: '-' }}</a>
                                                    </div>
                                                </div><!-- /.day -->
                                                @if($listing->www)
                                                    <div class="day clearfix">
                                                        <div class="icon-info"><i class="fa fa-fw fa-globe"></i></div>
                                                        <div class="detail-info">
                                                            <a href="{{ $listing->www }}">{{ $listing->www }}</a>
                                                        </div>
                                                    </div><!-- /.day -->
                                                @endif
                                                <div class="day clearfix">
                                                    <div class="icon-info"><i class="fa fa-fw fa-map-o"></i></div>
                                                    <div class="detail-info">
                                                        {!! str_replace('<br>', ', ', $listing->address_block)  !!}
                                                    </div>
                                                </div><!-- /.day -->
                                            </div><!-- /.opening-hours -->

                                    </div><!-- /.widget -->
                                    @if($listing->youtube_id)
                                        <div class="widget widget-boxed widget-boxed-dark dealwidget">
                                            <h3>Video</h3>

                                            <div class="sidebar-video-container">
                                                <iframe src="//www.youtube.com/embed/{{ $listing->youtube_id }}"
                                                        frameborder="0" allowfullscreen class="video"></iframe>
                                            </div>
                                        </div><!-- /.widget -->
                                    @endif
                                    <div class="widget widget-boxed widget-boxed-dark">
                                        <h3>Öffnungszeiten</h3>
                                        @if($listing->opening_times->count())
                                        <div class="opening-hours">
                                            @foreach($listing->opening_times as $opening_hour)
                                            <div class="day clearfix">
                                                <span class="name">{{ $opening_hour->wochentag }}</span>
                                                @if($opening_hour->day_closed)
                                                    <span class="hours">Geschlossen</span>
                                                @else
                                                    <span class="hours">{{ $opening_hour->open_time }}
                                                        - {{ $opening_hour->close_time }}</span>
                                                @endif
                                            </div><!-- /.day -->
                                            @endforeach
                                        </div><!-- /.opening-hours -->
                                        @else
                                            <div>Keine Öffnungszeiten hinterlegt</div>
                                        @endif
                                    </div><!-- /.widget -->
                                    @if($listing->keywords->count())
                                    <div class="widget widget-boxed widget-boxed-dark dealwidget">
                                        <h3>Stichwörter</h3>
                                        @foreach($listing->keywords as $keyword)
                                            <div class="day">
                                                <div class="detail-info">
                                                    <span class="tag-label tag-label-info">
                                                        {{ $keyword->keyword }}
                                                    </span>
                                                </div>
                                            </div><!-- /.day -->
                                        @endforeach
                                        <div class="clearfix"></div>
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