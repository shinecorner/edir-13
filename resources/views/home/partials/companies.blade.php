<div class="block-content background-white fullwidth">
    <div class="block-content-inner">
        <div class="row">
            <div class="col-sm-9">
                <h3 class="widgetized-title">Top Firmen in unseren Kategorien</h3>

                <div class="vertical-tabs clearfix">
                    <div class="vertical-tab-left col-xs-5 col-sm-4"> <!-- required for floating -->
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs tabs-left">
                            @foreach($category_with_premium_compaines as $i=>$category)
                            <li class="category-red {{ ($i == 0) ? 'active' : '' }}">
                                <a href="#{{$category['slug']}}" data-toggle="tab">
                                    <div class="title">
                                        <strong>{{ str_limit($category['name'],40) }}</strong>
                                        <span></span>
                                    </div>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div><!-- /.vertical-tab-left -->
                        <div class="companylist vertical-tab-right col-xs-7 col-sm-8">
                            <div class="tab-content">
                                @foreach($category_with_premium_compaines as $j => $category)
                                    <div class="tab-pane {{ ($j == 0) ? 'active' : '' }}" id="{{ $category['slug'] }}">
                                        <div class="reviews">

                                            @foreach($category['companies'] as $ci => $company)
                                                <div class="review {{ $company->hasPremium() ? 'premium-company-review' : '' }}">
                                                    <div class="review-image">
                                                        <a @if($company->hasPremium()) href="{{ route('listing.single', $company->slug) }}" @endif>
                                                            <img src="{{ $company->image('100x100') }}" alt="">
                                                        </a>
                                                    </div><!-- /.review-image -->

                                                    <div class="review-title">
                                                        <h2>
                                                            <a @if($company->hasPremium()) href="{{ route('listing.single', $company->slug) }}" @endif>
                                                                {{str_limit($company->name, 70)}}
                                                            </a>
                                                        </h2>
                                                        <span class="review-count">{{ $company->address_block }}</span>
                                                    </div>

                                                    <div class="premium-company">
                                                        @if($company->hasPremium())
                                                            <i class="fa fa-trophy"></i>
                                                        @endif
                                                    </div>
                                                </div>
                                            @endforeach

                                        </div><!-- /.reviews -->
                                    </div><!-- /.tab-pane -->
                                @endforeach
                            </div><!-- /.tab-content -->
                        </div><!-- /.vertical-tab-right -->
                </div><!-- /.vertical-tabs -->
            </div>

            <div class="sidebar col-sm-3">
                <div class="widget">
                    <h3>Angebote</h3>
                    @foreach($deals as $deal)
                    <div class="content-row-small">
                        <div class="row">
                            <div class="content-row-small-picture-standard squared col-xs-3 col-sm-4">
                                <a href="{{ route('deal.single', ['slug' => $deal->slug]) }}">

                                        <img src="{{ $deal->image('100x100') }}"  alt="">

                                </a>
                            </div>

                            <div class="content-row-small-body col-xs-9 col-sm-8">
                                <h4><a href="{{ route('deal.single', ['slug' => $deal->slug]) }}">{{ str_limit($deal->name,35) }}</a></h4>
                                <div class="content-row-small-meta">{{ $deal->date_start->format('d.m.Y') }}
                                        bis {{ $deal->date_end->format('d.m.Y') }}</div><!-- /.content-row-small-meta -->
                            </div><!-- /.content-row-body -->
                        </div><!-- /.row -->
                    </div><!-- /.content-row-small -->
                    @endforeach
                    <a href="{{ route('deal') }}" class="read-more">View More <i class="fa fa-angle-double-right"></i></a>
                </div><!-- /.widget -->

                <div class="widget">
                    <h3>Events</h3>
                    @foreach($events as $event)
                        <div class="content-row-small">
                            <div class="row">
                                <div class="content-row-small-picture-standard squared col-xs-3 col-sm-4">
                                    <a href="{{ route('event.single', $event->slug) }}">

                                            <img src="{{$event->image('100x100')}}"  alt="">

                                    </a>
                                </div>

                                <div class="content-row-small-body col-xs-9 col-sm-8">
                                    <h4><a href="{{ route('deal.single', ['slug' => $event->slug]) }}">{{ str_limit($event->name,35) }}</a></h4>
                                    <div class="content-row-small-meta">
                                        <i class="fa fa-fw fa-calendar"></i> {{ $event->created_at->formatLocalized('%d %B %Y') }}
                                    </div><!-- /.content-row-small-meta -->
                                </div><!-- /.content-row-body -->
                            </div><!-- /.row -->
                        </div><!-- /.content-row-small -->
                    @endforeach
                    <a href="{{ route('event') }}" class="read-more">View More <i class="fa fa-angle-double-right"></i></a>
                </div><!-- /.widget -->
            </div>
        </div><!-- /.row -->
    </div><!-- /.block-content-inner -->
</div><!-- /.block-content -->
