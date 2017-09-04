@extends('layouts.master')

@section('seo-title', 'Startseite')
@section('seo-description', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.')
@section('seo-keywords', 'Firmen, Firmensuche, Branchenbuch, Edirectory')
@section('seo-image', url('categoryimage'))
@section('seo-url', route('home'))



@section('content')
    <div class="main">
        <div class="main-inner">
            <div class="content">

                @include('home.partials.search')
                <div class="container">

                    @include('home.partials.categories')
                    @include('home.partials.events')
                    @include('home.partials.companies')
                    @include('home.partials.blog')
                    @include('home.partials.how-it-works')
                    @include('home.partials.support')

                </div><!-- /.container -->

            </div><!-- /.content -->
        </div><!-- /.main-inner -->
    </div><!-- /.main -->

@stop