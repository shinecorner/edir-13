@extends('layouts.master')

@section('seo-title', 'Veranstaltungen | ' . $category->name)
@section('seo-description', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.')
@section('seo-keywords', 'Firmen, Firmensuche, Branchenbuch, Edirectory')
@section('seo-image', url( $category->image('200x200')))
@section('seo-url', route('event.listing', $category->slug))

@push('custom-js')
@endpush

@section('content')
    {{--http://preview.byaviators.com/template/superlist/listing-grid-sidebar.html --}}

    <div id="main">
        <div id="main-inner">
            <div class="breadcrumb-wrapper">
                <div class="container">
                    <ol class="breadcrumb pull-left">
                        <li><a href="{{ route('home') }}">Startseite</a></li>
                        <li><a> Angebote</a></li>
                        <li><a> {{ $category->name }}</a></li>
                    </ol><!-- /.breadcrumb -->

                </div><!-- /.container -->
            </div>
            <div class="container">
                <div class="block-content">
                    <div class="block-content-inner">
                        <div class="content-rows">
                            <h2 class="mb40">
                                {{ $result->total() }} Veranstaltungen in der Kategorie {{ $category->name }}
                            </h2>

                            <div class="row">
                                <div class="col-sm-8 col-md-9">
                                    @foreach($result as $event)
                                        <div class="content-row eventlisting">
                                            <div class="content-row-inner">

                                                                <div class="content-row-picture" data-background-image="{{url($event->image('265x220'))}}">
                                                                    <div class="content-row-picture-inner">
                                                                        <div class="content-row-picture-body">
                                                                            <a class="content-row-picture-link" href="{{ route('event.single', $event->slug) }}">
                                                                            </a>
                                                                        </div><!-- /.content-row-picture-body -->
                                                                    </div><!-- /.content-row-picture-inner -->
                                                                </div><!-- /.content-row-picture -->

                                                                <div class="content-row-body">
                                                                    <div class="row">
                                                                        <div class="card-row-content col-sm-7">
                                                                            <h2>
                                                                                <a href="{{ route('event.single', $event->slug) }}">
                                                                                    {{str_limit($event->name, 45)}}
                                                                                </a>
                                                                            </h2>
                                                                            <div class="mb20">{{ $event->seo_meta_description ? str_limit($event->seo_meta_description, 60): '' }}</div>
                                                                        </div>
                                                                        <div class="card-row-properties col-sm-5">
                                                                        <dl>
                                                                            @if($event->discount_type <> 'none')
                                                                                <dd>Preis</dd>
                                                                                <dt>
                                                                                    <span style="text-decoration: line-through">{{ $event->regular_price }}</span>
                                                                                    {{ $event->discount_price }} &euro;
                                                                                </dt>
                                                                                <dd>Discount</dd>
                                                                                <dt>{{ $event->discount }}</dt>
                                                                            @endif
                                                                            <dd>Ort</dd>
                                                                            <dt>{{ $event->company->location->city }}</dt>
                                                                        </dl>

                                                                    </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="categorymeta col-sm-12">
                                                                            <div style="float: left;width: 4%"><strong><i class="fa fa-calendar"></i></strong></div>
                                                                            <div style="float: left;width: 90%">
                                                                                {{ $event->date_time_range }}
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div><!-- /.content-row-body -->
                                            </div><!-- /.content-row-inner -->
                                        </div><!-- /.cotnent-row -->
                                    @endforeach
                                    <div class="center">
                                        {{ $result->links() }}
                                    </div>

                                </div>

                                <div class="col-sm-4 col-md-3">
                                    <div class="sidebar">
                                        @include('layouts.partials.sidebar_widget_companies')
                                        @include('layouts.partials.sidebar_widget_blog')
                                        @include('layouts.partials.sidebar_widget_deals')
                                    </div><!-- /.sidebar -->
                                </div>
                            </div><!-- /.row -->
                        </div><!-- /.content-rows -->

                    </div><!-- /.block-content-inner -->
                </div><!-- /.block-content -->
            </div>
        </div><!-- /#main-inner -->
    </div>


@stop