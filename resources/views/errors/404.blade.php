@extends('layouts.master')

@section('seo-title', '404 Seite nicht gefunden')
@section('seo-description', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.')
@section('seo-keywords', 'Firmen, Firmensuche, Branchenbuch, Edirectory')
@section('seo-image', url('/images/backgrounds/404.jpg'))

@section('content')

  <div class="main">
    <div class="main-inner">
      <div class="container">
        <div class="content">



          <div class="caution">
            <h1>404</h1>
            <h2>Diese Seite existiert nicht.</h2>

            <p>
              <a href="{{ route('home') }}"> Startseite </a>
            </p>
          </div><!-- /.page-header -->

        </div><!-- /.content -->
      </div><!-- /.container -->
    </div><!-- /.main-inner -->
  </div><!-- /.main -->

@endsection