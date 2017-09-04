<div class="block background-white fullwidth">
    <div class="page-header">
        <h1>Die neuesten Bewertungen</h1>
        <p>Deinde disputat, quod cuiusque generis animantium statui deceat extremum. Quid ergo
            attinet gloriose loqui, nisi constanter loquare? Si stante, hoc natura videlicet vult, salvam esse se, quod
            concedimus;</a>.</p>
    </div><!-- /.page-header -->

    <div class="row">
        @foreach($companies->split(ceil($companies->count())/2) as $companygroups)

            <div class="col-sm-6">

                @foreach($companygroups as $company)
                    <div class="testimonial">
                        <a @if($company->hasPremium()) href="{{ route('listing.single', $company->slug) }}" @endif>
                            <div class="testimonial-image">
                                    <img src="{{ $company->image('200x200') }}" alt="" title="">
                            </div><!-- /.testimonial-image -->
                        </a>
                        @if($company->ratings->count())
                            <div class="testimonial-inner">
                                <div class="testimonial-title">
                                    <h2>
                                        {{ str_limit($company->ratings->last()->title, 32) }}
                                    </h2>


                                        <div class="testimonial-rating">
                                            @for($i = 0; $i <= round($company->ratings->avg('rating'), 0); $i++ )
                                                <i class="fa fa-star"></i>
                                            @endfor
                                        </div><!-- /.testimonial-rating -->

                                </div><!-- /.testimonial-title -->

                                {{ str_limit($company->ratings->last()->description, 300) }}

                                {{--<div class="mt30"><a href="{{ route('listing.single', ['slug' => $company->slug]) }}">zur Firmenseite</a></div>--}}

                                {{--<div class="testimonial-sign"></div><!-- /.testimonial-sign -->--}}
                            </div>
                        @endif

                    </div><!-- /.testimonial-inner -->
            </div><!-- /.testimonial -->
        @endforeach

    </div><!-- /.col-* -->
    @endforeach

</div>
