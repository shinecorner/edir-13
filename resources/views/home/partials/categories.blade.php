<div class="container">
    <div class="block-content">
        <div class="block-content-inner">
            <div class="page-header center">
                <h3>Kategorien</h3>
                <p>Suchen Sie etwas bestimmtes?</p>
            </div><!-- /.page-header -->

            <div class="boxes">

                @foreach($subcategories->split(ceil($subcategories->count()/3)) as $categorygroups)
                    <div class="row">
                        @foreach($categorygroups as $category)
                            <div class="col-sm-6 col-md-4 sub-category-list">
                                <div class="box background-white">
                                    <div class="box-body">
                                        <h2 class="box-title-plain">
                                            <a href="{{ route('search', ['keyword' => '*', 'category' => $category->category->name]) }}">
                                                {{ str_limit($category->category->name,40) }}
                                            </a>
                                            <small class="clearfix">Total: {{ $category->category->count }}</small>
                                        </h2>
                                        <div class="box-content">
                                            @foreach($category->subcategories->slice(0, 5) as $i =>$subcategory)
                                                <div class="sub-cat-row">
                                                    <div class="{{($i%2==0) ? 'odd' : ''}} title">
                                                        <a class="subcategory-name" href="{{ route('search', ['keyword' => '*', 'subcategory' => $subcategory->name]) }}">
                                                            {{ str_limit($subcategory->name,35) }}
                                                        </a>
                                                    </div>
                                                    <div class="{{($i%2==0) ? 'odd' : ''}} detail">{{'('.$subcategory->count.')'}}</div>
                                                </div>
                                            @endforeach
                                                <div class="sub-cat-row">
                                                    <div class="title">
                                                        <a class="showall" href="{{ route('search', ['keyword' => '*', 'category' => $category->category->name]) }}">
                                                            Alles In {{ str_limit($category->category->name,40) }}
                                                        </a>
                                                    </div>
                                                </div>
                                        </div><!-- /.box-content -->
                                    </div><!-- /.box-body -->
                                </div><!-- /.box -->
                            </div>
                        @endforeach
                    </div><!-- /.row -->
                @endforeach

            </div><!-- /.boxes -->
        </div><!-- /.block-content-inner -->
    </div><!-- /.block-content --></div>