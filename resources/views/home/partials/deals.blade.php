<div class="block fullwidth mb-80">
<div class="page-header">
    <h1>Die neuesten Angebote</h1>
    <p>Schauen Sie sich unsere Angebote und Veranstaltungen an!</p>
</div><!-- /.page-header -->

<div class="cards-simple-wrapper">
    <div class="row">

        @foreach($deals as $deal)
            <div class="col-sm-6 col-md-3">
                <a href="{{ route('deal.single', ['slug' => $deal->slug]) }}">
                    <div class="card-simple" data-background-image="{{ $deal->image('270x270') }}">
                        <div class="card-simple-background">
                            <div class="card-simple-content">
                                <h2>{{ str_limit($deal->name,35) }}</h2>

                                <div class="card-simple-actions">
                                    <span>{{ str_limit($deal->seo_meta_description) }}</span>
                                </div><!-- /.card-simple-actions -->
                            </div><!-- /.card-simple-content -->

                            @if($deal->keywords->count())
                                <div class="card-simple-label">
                                    {{ $deal->keywords->first()->keyword }}
                                </div>
                            @endif

                            <div class="card-simple-price">{{ $deal->discount_price ? $deal->discount_price .' &euro;': '' }} </div>

                        </div><!-- /.card-simple-background -->
                    </div><!-- /.card-simple -->
                </a>
            </div><!-- /.col-* -->
        @endforeach

    </div><!-- /.row -->
</div><!-- /.cards-simple-wrapper -->
</div>