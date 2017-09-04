@extends('layouts.master')

@section('seo-title', $post->seo_meta_title)
@section('seo-description', $post->seo_meta_description)
@section('seo-keywords', $post->seo_keywords)
@section('seo-image', $post->image('200x200'))
@section('seo-url', route('blog.single', $post->slug))

@section('content')
    <div id="page">
        <div id="main-wrapper">
            <div id="main">
                <div id="main-inner">
                    <div class="breadcrumb-wrapper">
                        <div class="container">
                            <ol class="breadcrumb pull-left">
                                <li><a href="{{ route('home') }}">Startseite</a></li>
                                <li><a href="{{ route('blog') }}">Blog</a></li>
                                <li class="active">{{ $post->name }}</li>
                            </ol><!-- /.breadcrumb -->

                        </div><!-- /.container -->
                    </div><!-- /.breadcrumb-wrapper -->
                    <div class="blogdetail container">
                        <div class="block-content fullwidth">
                            <div class="block-content-inner">
                                <h1>{{ $post->name }}</h1>

                                <div class="blog-meta bottom-border">
                                    <i class="fa fa-calendar"></i> Erstellt am: {{ $post->created_at->formatLocalized('%d %B %Y') }}
                                    <div class="pull-right">
                                        <div style="float: left;position: relative; top:5px;">Beitrag Teilen: </div>
                                        <div style="float: left;">
                                            @include('layouts.partials.social-pills-large', ['url' => request()->url(), 'text' => $post->name])
                                        </div>

                                    </div>
                                </div><!-- /.blog-meta -->

                                <img src="{{ $post->image('1140x640')}}" alt="{{ $post->name }}" class="mb20">

                                <p>{!! $post->description !!}</p>

                                <div class="blog-meta">
                                    <div class="tags">
                                        @if($post->keywords->count())
                                            @foreach($post->keywords as $keyword)
                                                <a href="#">{{ $keyword->keyword }}</a>
                                            @endforeach
                                        @endif
                                    </div><!-- /.tags -->
                                </div><!-- /.blog-meta -->

                                <div class="row">
                                    <div class="col-sm-5 col-md-5">
                                        @if($previous)
                                            <h6>Vorheriger Beitrag</h6>

                                            <div class="box">
                                                <div class="box-body">
                                                    <a href="{{ route('blog.single', $previous->slug) }}">
                                                        <div class="blog-nav-box">
                                                            <div class="title">
                                                                <a href="{{ route('blog.single', $previous->slug) }}">{{ str_limit($previous->name, 25) }}</a>
                                                            </div><!-- /.review-title -->

                                                            <div class="image">
                                                                <a href="{{ route('deal.single', $previous->slug) }}">
                                                                    <img src="{{ $previous->image('128x128')}}" alt="{{ $previous->name }}">
                                                                </a>
                                                                <div class="desc">{{ str_limit($previous->description, 130) }}</div>
                                                                <div class="desc"><i class="fa fa-fw fa-calendar"></i> {{ $previous->created_at->formatLocalized('%d %B %Y') }}</div>
                                                            </div><!-- /.review-image -->
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        @endif
                                    </div><!-- /.col-* -->

                                    <div class="col-sm-5 col-md-5 col-md-offset-2 background-white">
                                        @if($next)
                                          <h6>Nächster Beitrag</h6>

                                          <div class="box">
                                                <div class="box-body">
                                                    <a href="{{ route('blog.single', $next->slug) }}">

                                                        <div class="blog-nav-box">
                                                            <div class="title">
                                                                <a href="{{ route('blog.single', $next->slug) }}">{{ str_limit($next->name, 25) }}</a>
                                                            </div><!-- /.review-title -->

                                                            <div class="image next">
                                                                <a href="{{ route('deal.single', $next->slug) }}">
                                                                    <img src="{{ $next->image('128x128') }}" alt="{{ $next->name }}">
                                                                </a>
                                                                <div class="desc">{{ str_limit($next->description, 130) }}</div>
                                                                <div class="desc"><i class="fa fa-fw fa-calendar"></i> {{ $next->created_at->formatLocalized('%d %B %Y') }}</div>
                                                            </div><!-- /.review-image -->
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        @endif
                                    </div><!-- /.col-* -->
                                </div><!--end nav row-->

                            </div><!-- /.block-content-inner -->
                        </div><!-- /.block-content -->
                    </div>
                </div><!-- /#main-inner -->
            </div><!-- /#main -->
        </div><!-- /#main-wrapper -->
    </div>
@stop