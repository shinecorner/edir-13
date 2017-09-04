@extends('layouts.master')

@section('seo-title', 'Angebote | ' . $category->name)
@section('seo-description', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.')
@section('seo-keywords', 'Firmen, Firmensuche, Branchenbuch, Edirectory')
@section('seo-image', url($category->image('200x200')))
@section('seo-url', route('deal.listing', $category->slug))


@section('content')
    {{--http://preview.byaviators.com/template/superlist/listing-grid-sidebar.html --}}

    <div id="main">
        <div id="main-inner">
            <div class="breadcrumb-wrapper">
                <div class="container">
                    <ol class="breadcrumb pull-left">
                        <li><a href="{{ route('home') }}">Startseite</a></li>
                        <li><a href="{{ route('deal') }}">Angebote</a></li>
                        <li class="active"><a
                                    href="{{ route('deal.listing', $category->slug) }}">{{ $category->name }}</a>
                        </li>
                    </ol><!-- /.breadcrumb -->

                </div><!-- /.container -->
            </div>
            <div class="container">
                <div class="block-content">
                    <div class="block-content-inner">
                        <div class="content-rows">
                            <h2 class="mb40">
                                {{ $category->name }}
                            </h2>

                            <div class="row">
                                <div class="col-sm-8 col-md-9">
                                    @foreach($result as $deal)
                                        <div class="content-row">
                                            <div class="content-row-inner">

                                                <div class="content-row-picture" data-background-image="{{url($deal->image('265x220'))}}">
                                                    <div class="content-row-picture-inner">
                                                        <div class="content-row-picture-body">
                                                            <a class="content-row-picture-link" href="{{ route('deal.single', $deal->slug) }}">
                                                            </a>
                                                        </div><!-- /.content-row-picture-body -->
                                                    </div><!-- /.content-row-picture-inner -->
                                                </div><!-- /.content-row-picture -->

                                                <div class="content-row-body">
                                                    <div class="card-row-content col-sm-7">
                                                        <h2>
                                                            <a href="{{ route('deal.single', $deal->slug) }}">
                                                                {{str_limit($deal->name, 45)}}
                                                            </a>
                                                        </h2>
                                                        <div class="mb20">{{ $deal->seo_meta_description ? str_limit($deal->seo_meta_description, 60): '' }}</div>
                                                        <p><i class="fa fa-calendar"></i> {{ $deal->date_range }}</p>

                                                    </div>
                                                    <div class="card-row-properties col-sm-5">
                                                        <dl>
                                                            @if($deal->discount_type <> 'none')
                                                                <dd>Preis</dd>
                                                                <dt>
                                                                    <span style="text-decoration: line-through">{{ $deal->regular_price }}</span>
                                                                    {{ $deal->discount_price }} &euro;
                                                                </dt>
                                                                <dd>Discount</dd>
                                                                <dt>{{ $deal->discount }}</dt>
                                                            @endif
                                                            <dd>Ort</dd>
                                                            <dt>{{ $deal->company->location->city }}</dt>
                                                        </dl>

                                                    </div>
                                                </div><!-- /.content-row-body -->
                                            </div><!-- /.content-row-inner -->
                                        </div><!-- /.cotnent-row -->
                                    @endforeach
                                </div>

                                <div class="col-sm-4 col-md-3">
                                    <div class="sidebar">
                                        @include('layouts.partials.sidebar_widget_companies')
                                        @include('layouts.partials.sidebar_widget_blog')
                                        @include('layouts.partials.sidebar_widget_events')
                                    </div><!-- /.sidebar -->
                                </div>
                            </div><!-- /.row -->
                        </div><!-- /.content-rows -->


                        <div class="center">
                            {{ $result->links() }}
                        </div>

                    </div><!-- /.block-content-inner -->
                </div><!-- /.block-content -->
            </div>
        </div><!-- /#main-inner -->
    </div>


@stop