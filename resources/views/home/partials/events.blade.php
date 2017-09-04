<div class="block-content directory-carousel-wrapper fullwidth background-gray">
    <div class="homeevent block-content-inner carousel">
        <h3 class="center mb40 widgetized-title">Die neuesten Veranstaltungen</h3>
        <div class="directory-carousel bxslider">
            @foreach($events as $event)
                <div class="box background-white">
                    <div class="box-picture">
                        <a href="{{ route('event.single', ['slug' => $event->slug]) }}">
                            <img src="{{ $event->image('265x220')}}"  alt="">
                            <span></span>
                        </a>
                    </div><!-- /.box-picture -->

                    <div class="box-body">
                        <h2 class="box-title-plain">
                            <a href="{{ route('event.single', ['slug' => $event->slug]) }}">{{ str_limit($event->name, 20) }}</a>
                            <small class="clearfix">{{ $event->location->street_number. ', ' . $event->location->street_name.', ' . $event->location->city }}</small>
                        </h2><!-- /.box-title-plain -->
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            @endforeach

        </div><!-- /.bxslider -->
    </div><!-- /.block-content-inner -->
</div><!-- /.block-content -->
@push('custom-js')
    <script type="text/javascript">
     var cnt_events = {{count($events)}}

    $(function(){
         if(cnt_events > 0){
             $('.directory-carousel').bxSlider({
                 minSlides: 4,
                 maxSlides: 4,
                 moveSlides: 0,
                 slideMargin: 30,
                 slideWidth: 255,
                 responsive: false
             });
         }
    });
    </script>
@endpush