@if($events)
    <div class="widget widget-boxed">
        <h3>Events</h3>

        @foreach($events as $event)
            <div class="sidebar-box">
                <div class="title">
                    <a href="{{ route('event.single', $event->slug) }}">{{ str_limit($event->name, 25) }}</a>
                </div><!-- /.review-title -->

                <div class="image">
                    <a href="{{ route('event.single', $event->slug) }}">

                            <img src="{{ $event->image('100x100') }}" alt="{{ str_limit($event->name, 35) }}" title="">

                    </a>
                    <div class="desc">{{ str_limit($event->seo_meta_description, 40) }}</div>
                    <div class="desc"><i class="fa fa-fw fa-calendar"></i> {{ $event->created_at->formatLocalized('%d %B %Y') }}</div>
                </div><!-- /.review-image -->
            </div>
        @endforeach

    </div><!-- /.widget -->
@endif