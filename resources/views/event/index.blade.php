@extends('layouts.master')

@section('seo-title', 'events')
@section('seo-description', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.')
@section('seo-keywords', 'Firmen, Firmensuche, Branchenbuch, Edirectory')
@section('seo-image', url('/images/backgrounds/event.jpg'))
@section('seo-url', route('event'))

@section('content')
{{--http://preview.byaviators.com/template/superlist/listing-grid.html --}}
<div id="main">
    <div id="main-inner"><div class="breadcrumb-wrapper">
            <div class="container">
                <ol class="breadcrumb pull-left">
                    <li><a href="{{ route('home') }}">Startseite</a></li>
                    <li><a href="#">Events</a></li>
                </ol><!-- /.breadcrumb -->

            </div><!-- /.container -->
        </div><!-- /.breadcrumb-wrapper -->
        <div class="container">
            <div class="block-content">
                <div class="block-content-inner">
                    <h2>
                        Events
                    </h2>
                    <p  class="mb40">Eam stabilem appellas. Deinde disputat, quod cuiusque generis animantium statui deceat
                        extremum. Quid ergo attinet gloriose loqui, nisi constanter loquare? Si stante, hoc
                        natura videlicet vult, salvam esse se, quod concedimus</p>

                    <div class="boxes">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="row">
                                    @foreach($categories as $category)
                                        <div class="col-sm-4 col-md-3">
                                            <div class="box background-white">
                                                <div class="box-picture">
                                                    <a href="{{ route('event.listing', ['slug' => $category->slug]) }}">

                                                            <img src="{{ $category->image('265x220') }}" alt="{{ str_limit($category->name, 20) }}" title="">

                                                        <span></span>
                                                    </a>
                                                </div><!-- /.box-picture -->

                                                <div class="box-body">
                                                    <h2 class="box-title">
                                                        <a href="{{ route('event.listing', ['slug' => $category->slug]) }}">{{ $category->name }}</a>
                                                    </h2><!-- /.box-title -->

                                                    <div class="box-content">
                                                        <dl class="dl-horizontal">
                                                            <dt class="odd">Einträge</dt>
                                                            <dd class="odd">{{ $category->count }}</dd>
                                                        </dl>
                                                    </div><!-- /.box-content -->
                                                </div><!-- /.box-body -->
                                            </div><!-- /.box -->
                                        </div>
                                    @endforeach
                                </div><!-- /.row -->
                            </div>
                        </div><!-- /.row -->
                    </div><!-- /.boxes -->
                </div><!-- /.block-content-inner -->
            </div><!-- /.block-content -->
        </div>
    </div><!-- /#main-inner -->
</div><!-- /#main -->
@endsection