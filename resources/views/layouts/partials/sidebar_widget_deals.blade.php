@if($deals)
    <div class="widget widget-boxed">
        <h3>Deals</h3>

        @foreach($deals as $deal)
            <div class="sidebar-box">
                <div class="title">
                    <a href="{{ route('deal.single', $deal->slug) }}">{{ str_limit($deal->name, 25) }}</a>
                </div><!-- /.review-title -->

                <div class="image">
                    <a href="{{ route('deal.single', $deal->slug) }}">
                        <img src="{{$deal->image('100x100')}}" alt="{{ str_limit($deal->name, 35) }}" title="">
                    </a>
                    <div class="desc">{{ str_limit($deal->seo_meta_description, 40) }}</div>
                    <div class="desc"><i class="fa fa-fw fa-calendar"></i> {{ $deal->created_at->formatLocalized('%d %B %Y') }}</div>
                </div><!-- /.review-image -->
            </div>
        @endforeach

    </div><!-- /.widget -->
@endif