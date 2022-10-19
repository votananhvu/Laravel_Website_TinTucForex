@extends('front.templates.master')
@section('title')
@if(isset($categoryName)) {{$categoryName}} - Demo-fx24.net @endif
@endsection
@section('content')
@if(isset($list_news) && count($list_news) > 0)
<div class="category" style="margin-bottom:20px;color:gray">
    <span>
        @if(isset($role))
        @if($role != 0)
        <strong><i class="fa-solid fa-bars"></i> Kết quả tìm kiếm:</strong> @if(isset($count_results)) {{$count_results}} @endif
        @else
        <strong><i class="fa-solid fa-bars"></i> Danh mục:</strong> @if(isset($categoryName)) {{$categoryName}} @endif
        @endif
        @endif
    </span>
</div>
<div class="posts-loop">
    @foreach($list_news as $key=>$value)
    <div class="col-12 col-6" style="height: 400px;">

        <article id="post"
            class="grid-post post post type-post status-publish format-standard has-post-thumbnail hentry">
            <figure class="entry-thumbnail" style="image-size:cover">
                <a href="{{url('/bai-viet/'.$value->Alias)}}"
                    title="{{$value->Name}}">
                    <img style="width:100%;height:auto;"
                        src="{{url('public/images/news/'.$value->Image)}}"
                        class="attachment-xmag-main size-xmag-main wp-post-image lazyload"
                        alt="{{$value->Alias}}"
                        data-src="{{url('public/images/news/'.$value->Image)}}"
                        data-srcset="">
                    <span class="category">{{$value->category_name}}</span>
                </a>
            </figure>

            <header class="entry-header">
                <div class="entry-meta">
                    <span class="posted-on"><span class="screen-reader-text">Posted on</span>
                        <a href="{{url('/bai-viet/'.$value->Alias)}}" rel="bookmark">
                            <time class="entry-date published" datetime="{{$value->created_at}}">{{$value->created_at}}</time>
                            <time class="updated" datetime=""></time>
                        </a></span> <span class="icon-user"></span>
                        <span class="byline"><span class="author vcard"><span class="screen-reader-text">Author</span>
                            <a class="url fn n" href="">{{$value->Author}}</a></span></span>
                </div>
                <a href="{{url('/bai-viet/'.$value->Alias)}}" rel="bookmark">
                    <h2 class="entry-title">{{$value->Name}}</h2>
                </a>
            </header>

            <div class="entry-summary">
                <p>{{ \Illuminate\Support\Str::limit($value->SmallDescription ?? '',80,'...') }}</p>
            </div>
        </article>
        
    </div>
    @endforeach
</div>
<div align="center">
{{$list_news->links('vendor.pagination.default')}}
</div>
@endif
@stop