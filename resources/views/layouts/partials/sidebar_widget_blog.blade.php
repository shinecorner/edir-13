@if($blogposts)
    <div class="widget widget-boxed">
        <h3>Magazin</h3>

        @foreach($blogposts as $blogpost)
            <div class="sidebar-box">
                <div class="title">
                    <a href="{{ route('blog.single', $blogpost->slug) }}">{{ str_limit($blogpost->name, 25) }}</a>
                </div><!-- /.review-title -->

                <div class="image">
                    <a href="{{ route('blog.single', $blogpost->slug) }}">

                            <img src="{{ $blogpost->image('100x100') }}" alt="{{ str_limit($blogpost->name, 35) }}" title="">

                    </a>
                    <div class="desc">{{ str_limit($blogpost->seo_meta_description, 40) }}</div>
                    <div class="desc"><i class="fa fa-fw fa-calendar"></i> {{ $blogpost->created_at->formatLocalized('%d %B %Y') }}</div>
                </div><!-- /.review-image -->
            </div>
        @endforeach

    </div><!-- /.widget -->
@endif