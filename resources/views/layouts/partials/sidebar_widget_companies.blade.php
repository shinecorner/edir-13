@if($companies)
    <div class="widget widget-boxed">
        <h3>Top Firmen</h3>

        @foreach($companies as $company)
            <div class="sidebar-box">
                <div class="title">
                    <a @if($company->hasPremium()) href="{{ route('listing.single', $company->slug) }}" @endif>{{ str_limit($company->name, 25) }}</a>
                </div><!-- /.review-title -->

                <div class="image">
                    <a href="{{ route('listing.single', $company->slug) }}">
                        <img src="{{ $company->image('100x100') }}" alt="{{ $company->name }}" title="">
                    </a>
                    <div class="desc">{{ str_limit($company->seo_meta_description, 80) }}</div>
                </div><!-- /.review-image -->
            </div>
        @endforeach

    </div><!-- /.widget -->
@endif