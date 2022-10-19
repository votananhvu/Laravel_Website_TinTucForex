@extends('front.templates.master')

@section('title')
{{$news->Name}} - Demo-fx24.net
@endsection

@section('content')
<h1>{{$news->Name}}</h1>
<div class="entry-meta">
    <span class="posted-on"><span class="screen-reader-text">Posted on</span><span class="icon-clock"></span>
        <a href="https://fx24.net/cach-choi-forex-cho-nguoi-moi-bat-dau/" rel="bookmark">
            <time class="entry-date published" datetime="{{$news->created_at}}">{{$news->created_at}}</time>
            <time class="updated" datetime=""></time></a>
    </span>
    <span class="byline"><span class="author vcard"><span class="screen-reader-text">Author</span>
            <a class="url fn n" href="">/ {{$news->Author}} /</a>
        </span></span><span class="comments-link">
        <a href="{{url('/cach-choi-forex-cho-nguoi-moi-bat-dau/#comments')}}"> <span class="icon-bubbles"></span> 20
        </a></span>
</div>
<!-- Nội dung bài viết -->
<div>
{!! $news->Description !!}
<!-- Điều chỉnh image -->
<script>
    var img_elements = document.getElementsByTagName("img");
    for (var i = 0; i <= img_elements.length - 1; i++)  {
        var element = img_elements[i];
        console.log(element);
        element.style.width = "auto";
        element.style.height = "auto";
    }
</script>
</div>
<!-- Nội dung bài viết -->

<div class="relpost-thumb-wrapper">
    <!-- filter-class -->
    <div class="relpost-thumb-container">
        <h3><span id="Bai_cung_chuyen_muc">Bài cùng chuyên mục</span></h3>
        <div style="clear: both"></div>
        <div style="clear: both"></div><!-- relpost-block-container -->
        <div class="relpost-block-container">
            @if(isset($category_posts) && count($category_posts) > 0)
            @foreach($category_posts as $key=>$value)
            <a href="{{url('/bai-viet/'.$value->Alias)}}"
                class="relpost-block-single">
                <div class="relpost-custom-block-single" style="width: 75px; height: 150px;">
                    <div class="relpost-block-single-image" alt="{{$value->Alias}}"
                        style="background: transparent url({{url('public/images/news/'.$value->Image)}}) no-repeat scroll 0% 0%; width: 75px; height: 65px;">
                    </div>
                    <div class="relpost-block-single-text" style="font-family: Arial;  font-size: 13px;  color: #333333;">
                        {{ $value->Name}}
                    </div>
                </div>
            </a>
            @endforeach
            @endif
        </div><!-- close relpost-block-container -->
        <div style="clear: both"></div>
    </div><!-- close filter class -->
</div>
@stop

