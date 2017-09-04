<div class="page-header center">
    <h3>Aus unserem Magazin</h3>
    <p>
        Duo Reges: constructio interrete. Videsne quam sit magna dissensio? Sed quanta
        sit alias, nunc tantum possitne esse tanta. Eam stabilem appellas. Deinde disputat, quod cuiusque generis
        animantium statui deceat extremum. Quid ergo
        attinet gloriose loqui,
    </p>
</div><!-- /.page-header -->
@foreach($blogposts->split(2) as $postgroups)
    <div class="row">
        @foreach($postgroups as $post)
            <div class="col-sm-6">
                <div class="testimonial">
                    <div class="testi-image">
                        <a href="{{ route('blog.single', ['slug' => $post->slug]) }}">
                            <img src="{{ url($post->image('100x100'))}}" alt="">
                        </a>
                    </div>
                    <div class="testi-content">
                        <p>{{ str_limit($post->description, 300) }}</p>
                        <div class="testi-meta">
                            {{ str_limit($post->name, 54) }}
                            <span>{{ $post->created_at->formatLocalized('%d %B %Y') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="mb40"></div>
@endforeach
