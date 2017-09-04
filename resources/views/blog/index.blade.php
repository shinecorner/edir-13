@extends('layouts.master')

@section('seo-title', 'Magazin')
@section('seo-description', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.')
@section('seo-keywords', 'Blog, Magazin, Beiträge, Edirectory')
@section('seo-image', url('/images/backgrounds/blog.jpg'))
@section('seo-url', route('blog'))

@section('content')
    <div id="page">
        <div id="main-wrapper">
            <div id="main">
                <div id="main-inner">
                    <div class="breadcrumb-wrapper">
                        <div class="container">
                            <ol class="breadcrumb pull-left">
                                <li><a href="{{ route('home') }}">Startseite</a></li>
                                <li class="active"><a href="{{ route('blog') }}">Blog</a></li>
                            </ol><!-- /.breadcrumb -->
                        </div><!-- /.container -->
                    </div><!-- /.breadcrumb-wrapper -->
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-9">
                                <div class="block-content">
                                    <div class="block-content-inner">
                                        <div class="page-header center">
                                            <h1>Neueste Beiträge</h1>
                                        </div><!-- /.page-header -->

                                        <div class="content-rows">
                                            <div class="row">
                                                <div class="col-sm-10 col-sm-offset-1">
                                                @foreach($posts as $post)
                                                    <div class="content-row">
                                                        <div class="content-row-inner">
                                                            <div class="content-row-picture" data-background-image="{{ $post->image('370x420') }}">
                                                        </div><!-- /.content-row-picture -->

                                                            <div class="content-row-body">
                                                                <h2><a href="{{ route('blog.single', $post->slug) }}">{{ $post->name }}</a></h2>

                                                                <p>{{ str_limit(strip_tags($post->description), 300) }}</p>

                                                                <div class="content-row-meta">
                                                                    <div class="pull-left">
                                                                        <small><i class="fa fa-fw fa-calendar"></i> {{ $post->created_at->formatLocalized('%d %B %Y') }}</small>
                                                                    </div>
                                                                    <div class="pull-right">
                                                                        <a href="{{ route('blog.single', $post->slug) }}">Weiterlesen <i class="fa fa-angle-right"></i></a>
                                                                    </div>
                                                                </div><!-- /.content-row-meta -->
                                                            </div><!-- /.content-row-body -->
                                                        </div><!-- /.content-row-inner -->
                                                    </div><!-- /.cotnent-row -->
                                                @endforeach
                                                </div>
                                            </div><!-- /.row -->
                                        </div><!-- /.content-rows -->

                                        <div class="center">
                                            {{ $posts->links() }}
                                        </div><!-- /.center -->
                                    </div><!-- /.block-content-inner -->
                                </div><!-- /.block-content -->
                            </div>

                            <div class="col-sm-3">
                                <div class="block-content">
                                    @include('layouts.partials.sidebar_widget_companies')
                                    @include('layouts.partials.sidebar_widget_deals')
                                    @include('layouts.partials.sidebar_widget_events')
                                </div>
                            </div>
                        </div><!-- /.row -->
                    </div>
                </div><!-- /#main-inner -->
            </div><!-- /#main -->
        </div><!-- /#main-wrapper -->
    </div>

@stop