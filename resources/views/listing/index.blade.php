@extends('layouts.master')

@section('seo-title', 'Firmensuche')
@section('seo-description', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.')
@section('seo-keywords', 'Firmen, Firmensuche, Branchenbuch, Edirectory')
@section('seo-image', url($catImage ? $catImage->image('200x200') : '/images/backgrounds/search_all_cat.jpg'))
@section('seo-url', route('home'))

@section('content')
    {{--http://preview.byaviators.com/template/superlist/listing-row-sidebar.html--}}

    <div id="main">
        <div id="main-inner">
            <div class="breadcrumb-wrapper">
                <div class="container">
                    <ol class="breadcrumb pull-left">
                        <li><a href="{{ route('home') }}">Startseite</a></li>
                        <li>Firmen</li>
                        <li>{{ ($subcategory ? $subcategory : ($category ?: 'Alle Kategorien')) }}</li>
                        <li>{{ $state ?: 'Alle Bundesländer' }}</li>
                    </ol><!-- /.breadcrumb -->

                </div><!-- /.container -->
            </div>
            <div class="container">
                <div class="block-content">
                    <div class="block-content-inner">
                        <div class="content-rows">
                            <h3 class="mb40">
                                <span class="counter">{{ $result->total() }}</span> Ergebnisse
                                @if($keyword)
                                    für "<strong>{{ $keyword }}</strong>"
                                @endif
                                @if($location)
                                    in "<strong>{{ $location }}</strong>"
                                @endif
                            </h3>

                            <div class="row">
                                <div class="col-sm-8 col-md-9">
                                    @foreach($result as $company)
                                    <div class="content-row companylisting">
                                        <div class="content-row-inner">

                                            <div class="content-row-picture" data-background-image="{{url($company->image('265x220'))}}">
                                                <div class="content-row-picture-inner">
                                                    <div class="content-row-picture-body">
                                                        <a class="content-row-picture-link" @if($company->hasPremium()) href="{{ route('listing.single', $company->slug) }}" @endif>
                                                        </a>
                                                        @if($company->hasPremium())
                                                        <div class="content-row-author">
                                                            <a href="#">
                                                                <img src="{{url('/images/trophy.png')}}" alt="">
                                                                <span>
                                                                </span>
                                                            </a>
                                                        </div>
                                                        @endif
                                                    </div><!-- /.content-row-picture-body -->
                                                </div><!-- /.content-row-picture-inner -->
                                            </div><!-- /.content-row-picture -->

                                            <div class="content-row-body">
                                                <div class="row">
                                                    <div class="card-row-content col-sm-6">
                                                        <h2>
                                                            <a @if($company->hasPremium()) href="{{ route('listing.single', $company->slug) }}" @endif>
                                                                {{str_limit($company->name, 45)}}
                                                            </a>
                                                        </h2>

                                                        <div>
                                                            <div class="icon-with-text">
                                                                <div class="marker-sign"><i class="fa fa-map-marker icon-with-text__icon"></i></div>
                                                                <div class="address-line"><a href="//maps.google.com/?q={{ $company->address_line }}" target="_blank">{{ $company->address_line }}</a></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-row-properties col-sm-6">
                                                        <dl>
                                                            <dd>Ort</dd>
                                                            <dt>{{ $company->location->city }}</dt>

                                                            <dd>Rating</dd>
                                                            <dt>
                                                            <span class="card-row-rating">
                                                                @for($i = 1; $i <= round($company->ratings->avg('rating')); $i++ )
                                                                    <i class="fa fa-star"></i>
                                                                @endfor
                                                                ( {{ $company->ratings->count() }} )
                                                            </span><!-- /.card-row-rating -->
                                                            </dt>
                                                        </dl>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="categorymeta col-sm-12">
                                                        <div style="float: left;width: 15%"><strong>Kategorien:</strong></div>
                                                        <div style="float: left;width: 80%">
                                                            @foreach($company->categories as $i=>$company_category)
                                                                {{ ($i==0) ? $company_category->name : ', '.$company_category->name}}
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- /.content-row-body -->
                                        </div><!-- /.content-row-inner -->
                                    </div><!-- /.cotnent-row -->
                                    @endforeach
                                </div>

                                <div class="col-sm-4 col-md-3">
                                    <div class="sidebar">
                                        <div class="widget widget-boxed widget-boxed-secondary">
                                            <form method="GET" action="{{ route('search') }}" autocomplete="off">
                                                <input type="hidden" name="filterSort" value="{{ request()->get('filterSort') }}">
                                                <input type="hidden" name="location" value="{{ $location }}">
                                                <input type="hidden" name="category" value="{{ $category }}">
                                                <input type="hidden" name="subcategory" value="{{ $subcategory }}">
                                                <div class="form-group">
                                                    <label for="keyword">Stichwort</label>
                                                    <input type="text" class="form-control" name="keyword" value="{{ $keyword }}" placeholder="Stichwort eingeben">
                                                </div><!-- /.form-group -->

                                                <div class="form-group">
                                                    <label>Ort</label>
                                                    <select multiple class="form-control chosen-select" name="filterCity[]" data-placeholder="Ortschaften">
                                                        @foreach($filter_values['cities'] as $slug => $city)
                                                            <option @if(request()->has('filterCity')) @foreach(request()->filterCity as $fcity) @if($fcity == $city) selected @endif @endforeach @endif>
                                                                {{ $city }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div><!-- /.form-group -->

                                                <div class="form-group">
                                                    <label>Kategorie</label>
                                                    <select multiple class="form-control chosen-select" name="filterCategory[]" data-placeholder="Kategorien">
                                                        @foreach($filter_values['categories'] as $category)
                                                            <option @if(request()->has('filterCategory')) @foreach(request()->filterCategory as $fcategory) @if($fcategory == $category) selected @endif @endforeach @endif>
                                                                {{ $category }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div><!-- /.form-group -->

                                                <div class="form-group">
                                                    <label>Sortierung</label>
                                                    <select class="form-control selectpicker" name="filterSort" title="Sortieren nach" onchange="this.form.submit()">
                                                        <option value="">Sortieren nach</option>
                                                        <option selected value="">Beste Treffer</option>
                                                        <option value="asc"
                                                                @if(request()->has('filterSort')) @if(request()->get('filterSort') == 'asc') selected @endif @endif
                                                        >Alphabetisch (A->Z)</option>
                                                        <option value="desc"
                                                                @if(request()->has('filterSort')) @if(request()->get('filterSort') == 'desc') selected @endif @endif
                                                        >Alphabetisch (Z->A)</option>
                                                    </select>
                                                </div><!-- /.form-group -->

                                                <input type="submit" class="btn btn-block btn-secondary" value="Filter">
                                            </form>
                                        </div><!-- /.widget -->
                                        @include('layouts.partials.sidebar_widget_blog')
                                        @include('layouts.partials.sidebar_widget_events')
                                        @include('layouts.partials.sidebar_widget_deals')
                                    </div><!-- /.sidebar -->
                                </div>
                            </div><!-- /.row -->
                        </div><!-- /.content-rows -->

                        <div class="center">
                            {{ $result->appends([
                                'keyword' => request()->keyword ?: '',
                                'location' => request()->location ?: '',
                                'category' => request()->category ?: '',
                                'filterSort' => request()->filterSort,
                                'filterCity' => request()->filterCity,
                                'filterCategory' => request()->filterCategory
                              ])->links() }}
                        </div>
                    </div><!-- /.block-content-inner -->
                </div><!-- /.block-content -->
            </div>
        </div><!-- /#main-inner -->
    </div>

@stop