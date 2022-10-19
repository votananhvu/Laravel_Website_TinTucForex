@extends('front.templates.master')

@section('title', 'Demo-fx24.net - Kiến thức đầu tư forex')
@section('content')
<section class="magazine-posts block01">
    <h3 class="category-title clear">
        <span>
            <a href="{{url('/category/moi-nhat')}}">
                Mới nhất </a>
        </span>
        <em class="view-all">
            <a href="{{url('/category/moi-nhat')}}">View all</a>
        </em>
    </h3>
    <div class="magazine-loop clear">
    @if(isset($lated_post) && count($lated_post) > 0)
        @foreach ($lated_post as $key=>$value)
        @if($key == 0)
        <div class="col-6 half">
            <article class="entry-magazine">
                <figure>
                    <a href="{{url('/bai-viet/'.$value->Alias)}}"
                        title="{{$value->Name}}">
                        <img style="width:100%;height:auto;"
                            src="{{url('public/images/news/'.$value->Image)}}"
                            class="attachment-xmag-main size-xmag-main wp-post-image lazyload"
                            alt="Danh-gia-san-Exness-fx24" loading="lazy" 
                            data-src="{{url('public/images/news/'.$value->Image)}}"
                            data-srcset="">
                    </a>
                </figure>
                <div class="entry-header">
                    <h2 class="entry-title">
                        <a href="{{url('/bai-viet/'.$value->Alias)}}">
                            {{$value->Name}}
                        </a>
                    </h2>
                    <div class="entry-meta">
                        <span class="posted-on"><span class="screen-reader-text">Posted on</span>
                            <a href="" rel="bookmark">
                                <time class="entry-date published" datetime="2021-10-07T17:29:22+07:00">{{$value->created_at}}</time>
                                <time class="updated" datetime=""></time>
                            </a></span> <span class="icon-user"></span>
                        <span class="byline"><span class="author vcard"><span class="screen-reader-text">Author</span>
                            <a class="url fn n" href="">{{$value->Author}}</a>
                        </span></span>
                    </div>
                </div>
                <div class="entry-summary">
                    <p>
                        {{ \Illuminate\Support\Str::limit($value->SmallDescription ?? '',80,'...') }}
                    </p>
                </div>
            </article>
        </div><!-- .col-6 -->
        @endif
        @endforeach
        <div class="col-6 list-small">
            <ul>
                @foreach ($lated_post as $key=>$value)
                @if($key > 0)
                <li>
                    <article class="entry-magazine">
                        <figure>
                            <a href="{{url('/bai-viet/'.$value->Alias)}}"
                                title="{{$value->Name}}">
                                <img style="width:100%;height:auto;"
                                    src="{{url('public/images/news/'.$value->Image)}}"
                                    class="attachment-xmag-medium size-xmag-medium wp-post-image lazyload"
                                    alt="Huong-dan-cach-dau-tu-vang-online" loading="lazy" 
                                    data-src="{{url('public/images/news/'.$value->Image)}}"
                                    data-srcset="">
                            </a>
                        </figure>

                        <div class="entry-header">
                            <h3 class="entry-title">
                                <a href="{{url('/bai-viet/'.$value->Alias)}}">
                                    {{$value->Name}}
                                </a>
                            </h3>
                            <div class="entry-meta">
                                <span class="posted-on"><span class="screen-reader-text">Posted on</span>
                                    <a href="" rel="bookmark">
                                        <time class="entry-date published" datetime="{{$value->created_at}}">{{$value->created_at}}</time>
                                        <time class="updated" datetime=""></time>
                                    </a>
                                </span>
                            </div>
                        </div>
                    </article>
                </li>
                @endif
                @endforeach
    @endif

            </ul>
        </div><!-- .col-6 -->

    </div><!-- .magazine-loop -->
</section>

<section class="magazine-posts block02">
    @if(isset($kinhnghiemdautu) && count($kinhnghiemdautu) > 0)
    <h3 class="category-title clear">
        <span>
            <a href="{{url('/category/'.$kinhnghiemdautu[0]->category_url)}}">
                {{$kinhnghiemdautu[0]->category_name}}</a>
        </span>
        <em class="view-all">
            <a href="{{url('/category/'.$kinhnghiemdautu[0]->category_url)}}">View
                all</a>
        </em>
    </h3>

    <div class="magazine-loop clear">   
        @foreach ($kinhnghiemdautu as $key=>$value)
        @if($key < 2)
        <div class="col-6 col-sm-6 half">
            <article class="entry-magazine">
                <figure>
                    <a href="{{url('/bai-viet/'.$value->Alias)}}"
                        title="{{$value->Name}}">
                        <img style="width:100%;height:auto;"
                            src="{{url('public/images/news/'.$value->Image)}}"
                            class="attachment-xmag-main size-xmag-main wp-post-image lazyload"
                            alt="nguyen-nhan-nha-dau-tu-bi-thua-lo-min" loading="lazy" 
                            data-src="{{url('public/images/news/'.$value->Image)}}"
                            data-srcset="">
                    </a>
                </figure>
                <div class="entry-header">
                    <h2 class="entry-title">
                        <a href="{{url('/bai-viet/'.$value->Alias)}}">
                            {{$value->Name}}
                        </a>
                    </h2>
                    <div class="entry-meta">
                        <span class="posted-on"><span class="screen-reader-text">Posted on</span>
                            <a href="" rel="bookmark">
                                <time class="entry-date published" datetime="{{$value->created_at}}">{{$value->created_at}}</time>
                                <time class="updated" datetime=""></time>
                            </a></span> <span class="icon-user"></span>
                        <span class="byline"><span class="author vcard"><span class="screen-reader-text">Author</span>
                                <a class="url fn n" href="">{{$value->Author}}</a></span></span>
                    </div>
                </div>
                <div class="entry-summary">
                    <p>
                        {{ \Illuminate\Support\Str::limit($value->SmallDescription ?? '',80,'...') }}
                    </p>
                </div>
            </article>
        </div>
        @endif
        @endforeach
        
        <div class="col-12 list-small">
            <ul>
            @foreach ($kinhnghiemdautu as $key=>$value)
            @if($key >= 2)
                <li>
                    <article class="entry-magazine">
                        <figure>
                            <a href="{{url('/bai-viet/'.$value->Alias)}}"
                                title="{{$value->Name}}">
                                <img style="width:100%;height:auto;"
                                    src="{{url('public/images/news/'.$value->Image)}}"
                                    class="attachment-thumbnail size-thumbnail wp-post-image lazyload"
                                    alt="Huong-dan-cach-dau-tu-vang-online" loading="lazy"
                                    data-src="{{url('public/images/news/'.$value->Image)}}">
                            </a>
                        </figure>
                        <div class="entry-header">
                            <h2 class="entry-title">
                                <a href="{{url('/bai-viet/'.$value->Alias)}}">
                                    {{$value->Name}}
                                </a>
                            </h2>
                            <div class="entry-meta">
                                <span class="posted-on"><span class="screen-reader-text">Posted on</span>
                                    <a href="" rel="bookmark">
                                        <time class="entry-date published" datetime="{{$value->created_at}}">{{$value->created_at}}</time>
                                        <time class="updated" datetime=""></time>
                                    </a></span>
                            </div>
                        </div>
                    </article>
                </li>
            @endif
            @endforeach
            </ul>
        </div><!-- .col-12 -->
        
    </div><!-- .magazine-loop -->
    @endif
</section>

<section class="magazine-posts block03">
    @if(isset($danhgiasanforex) && count($danhgiasanforex) > 0)
    <h3 class="category-title clear">
        <span>
            <a href="{{url('/category/'.$danhgiasanforex[0]->category_url)}}">
                {{$danhgiasanforex[0]->category_name}} </a>
        </span>
        <em class="view-all">
            <a href="{{url('/category/'.$danhgiasanforex[0]->category_url)}}">View all</a>
        </em>
    </h3>

    <div class="magazine-loop clear"> 
        @foreach ($danhgiasanforex as $key=>$value)
        <div class="col-12 list">
            <article class="entry-magazine">
                <figure>
                    <a href="{{url('/bai-viet/'.$value->Alias)}}"
                        title="{{$value->Name}}">
                        <img style="width:100%;height:auto;"
                            src="{{url('public/images/news/'.$value->Image)}}"
                            class="attachment-xmag-main size-xmag-main wp-post-image lazyload"
                            alt="avatar-san-pepperstone" loading="lazy" 
                            data-src="{{url('public/images/news/'.$value->Image)}}"
                            data-srcset="">
                    </a>
                </figure>

                <div class="entry-header">
                    <h2 class="entry-title">
                        <a href="{{url('/bai-viet/'.$value->Alias)}}">
                            {{$value->Name}}
                        </a>
                    </h2>
                    <div class="entry-meta">
                        <span class="posted-on"><span class="screen-reader-text">Posted on</span>
                            <a href="{{url('/bai-viet/'.$value->Alias)}}" rel="bookmark">
                                <time class="entry-date published updated" datetime="{{$value->created_at}}">{{$value->created_at}}</time>
                            </a></span> <span class="icon-user"></span>
                            <span class="byline"><span class="author vcard"><span class="screen-reader-text">Author</span>
                                <a class="url fn n" href="">{{$value->Author}}</a>
                            </span>
                        </span>
                    </div>
                </div><!-- .entry-header -->

                <div class="entry-summary">
                    <p>
                        {{ \Illuminate\Support\Str::limit($value->SmallDescription ?? '',80,'...') }} 
                    </p>
                </div><!-- .entry-summary -->
            </article>
        </div>
        @endforeach
        
    </div><!-- .magazine-loop -->
    @endif
</section>

<section class="magazine-posts block04">
    @if(isset($kienthuccanban) && count($kienthuccanban) > 0)
    <h3 class="category-title clear">
        <span>
            <a href="{{url('/category/'.$danhgiasanforex[0]->category_url)}}">
                {{$kienthuccanban[0]->category_name}} </a>
        </span>
        <em class="view-all">
            <a href="{{url('/category/'.$danhgiasanforex[0]->category_url)}}">View
                all</a>
        </em>
    </h3>

    <div class="magazine-loop clear">
        @foreach ($kienthuccanban as $key=>$value)
        <div class="col-3 col-sm-3 col-xs-6 list-small">
            <article class="entry-magazine">
                <figure>
                    <a href="{{url('/bai-viet/'.$value->Alias)}}"
                        title="{{$value->Name}}">
                        <img style="width:100%;height:auto;"
                            src="{{url('public/images/news/'.$value->Image)}}"
                            class="attachment-xmag-medium size-xmag-medium wp-post-image lazyload" alt="" loading="lazy"
                            data-src="{{url('public/images/news/'.$value->Image)}}"
                            data-srcset="">
                    </a>
                </figure>
                <div class="entry-header">
                    <h2 class="entry-title">
                        <a href="{{url('/bai-viet/'.$value->Alias)}}">
                            {{$value->Name}}
                        </a>
                    </h2>
                    <div class="entry-meta">
                        <span class="posted-on"><span class="screen-reader-text">Posted on</span>
                            <a href="" rel="bookmark">
                                <time class="entry-date published" datetime="{{$value->created_at}}">{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $value->created_at)->format('d-m-Y')}}</time>
                                <time class="updated" datetime=""></time>
                            </a>
                        </span>
                    </div>
                </div>
            </article>
        </div>
        @endforeach 
    </div>
    @endif
</section>

<section class="magazine-posts block05">
    @if(isset($forex_benle) && count($forex_benle) > 0)
    <h3 class="category-title clear">
        <span>
            <a href="{{url('/category/'.$forex_benle[0]->category_url)}}">
                {{$forex_benle[0]->category_name}} </a>
        </span>
        <em class="view-all">
            <a href="{{url('/category/'.$forex_benle[0]->category_url)}}">View all</a>
        </em>
    </h3>

    <div class="magazine-loop clear">
        @foreach($forex_benle as $key=>$value)
        @if($key == 0)
        <div class="col-6 half">
            <article class="entry-magazine">
                <figure>
                    <a href="{{url('/bai-viet/'.$value->Alias)}}"
                        title="{{$value->Name}}">
                        <img style="width:100%;height:auto;"
                            src="{{url('public/images/news/'.$value->Image)}}"
                            class="attachment-xmag-main size-xmag-main wp-post-image lazyload"
                            alt="Cac-kenh-dau-tu-tai-chinh" loading="lazy"
                            data-src="{{url('public/images/news/'.$value->Image)}}"
                            data-srcset="">
                    </a>
                </figure>

                <div class="entry-header">
                    <h2 class="entry-title">
                        <a href="{{url('/bai-viet/'.$value->Alias)}}">
                            {{$value->Name}}
                        </a>
                    </h2>
                    <div class="entry-meta">
                        <span class="posted-on"><span class="screen-reader-text">Posted on</span>
                            <a href="" rel="bookmark">
                                <time class="entry-date published" datetime="{{$value->created_at}}">{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $value->created_at)->format('d-m-Y')}}</time>
                                <time class="updated" datetime=""></time>
                            </a>
                        </span> <span class="icon-user"></span>
                        <span class="byline"><span class="author vcard"><span class="screen-reader-text">Author</span>
                            <a class="url fn n" href="">{{$value->Author}}</a></span>
                        </span>
                    </div>
                </div><!-- .entry-header -->

                <div class="entry-summary">
                    <p>
                        {{ \Illuminate\Support\Str::limit($value->SmallDescription ?? '',80,'...') }} 
                    </p>
                </div><!-- .entry-summary -->
            </article>
        </div>
        @endif
        @endforeach
        <div class="col-6 list-small">
            <ul>
                @foreach ($forex_benle as $key=>$value)
                @if($key != 0)
                <li>
                    <article class="entry-magazine">
                        <figure>
                            <a href="{{url('/bai-viet/'.$value->Alias)}}"
                                title="{{$value->Name}}">
                                <img style="width:100%;height:auto;"
                                    src="{{url('public/images/news/'.$value->Image)}}"
                                    class="attachment-xmag-medium size-xmag-medium wp-post-image lazyload"
                                    alt="Bi-mat-nhan-thuc" loading="lazy" 
                                    data-src="{{url('public/images/news/'.$value->Image)}}"
                                    data-srcset="">
                            </a>
                        </figure>

                        <div class="entry-header">
                            <h2 class="entry-title">
                                <a href="{{url('/bai-viet/'.$value->Alias)}}">
                                    {{$value->Name}}
                                </a>
                            </h2>
                            <div class="entry-meta">
                                <span class="posted-on"><span class="screen-reader-text">Posted on</span>
                                    <a href=""
                                        rel="bookmark"><time class="entry-date published"
                                        datetime="{{$value->created_at}}">{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $value->created_at)->format('d-m-Y')}}</time>
                                        <time class="updated" datetime=""></time>
                                    </a>
                                </span>
                            </div>
                        </div><!-- .entry-header -->
                    </article>
                </li>
                @endif
                @endforeach
            </ul>
        </div>
    </div><!-- .magazine-loop -->
    @endif
</section>

<section class="magazine-posts block06">
    @if(isset($tintuc) && count($tintuc) > 0)
    <h3 class="category-title clear">
        <span>
            <a href="{{url('/category/'.$tintuc[0]->category_url)}}">
                {{$tintuc[0]->category_name}} </a>
        </span>
        <em class="view-all">
            <a href="{{url('/category/'.$tintuc[0]->category_url)}}">View all</a>
        </em>
    </h3>

    <div class="magazine-loop clear">
        @foreach($tintuc as $key=>$value)
        <div class="col-6 col-sm-6 half">
            <article class="entry-magazine">      
                <figure>
                    <a href="{{url('/bai-viet/'.$value->Alias)}}"
                        title="{{$value->Name}}">
                        <img style="width:100%;height:auto;"
                            src="{{url('public/images/news/'.$value->Image)}}"
                            class="attachment-xmag-medium size-xmag-medium wp-post-image lazyload" alt="su-kien-xtb"
                            loading="lazy"
                            data-src="{{url('public/images/news/'.$value->Image)}}">
                    </a>
                </figure>
                <div class="entry-header">
                    <h2 class="entry-title">
                        <a href="{{url('/bai-viet/'.$value->Alias)}}">{{$value->Name}}</a>
                    </h2>
                    <div class="entry-meta">
                        <span class="posted-on"><span class="screen-reader-text">Posted on</span>
                        <a href=""
                            rel="bookmark"><time class="entry-date published" datetime="{{$value->created_at}}">{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $value->created_at)->format('d-m-Y')}}</time>
                            <time class="updated" datetime="{{$value->updated_at}}"></time></a>
                        </span> <span class="icon-user"></span>
                        <span class="byline"><span class="author vcard"><span class="screen-reader-text">Author</span>
                                <a class="url fn n" href="">{{$value->Author}}</a>
                        </span></span>
                    </div>
                </div>
                <div class="entry-summary">
                    <p>
                        {{ \Illuminate\Support\Str::limit($value->SmallDescription ?? '',80,'...') }}
                    </p>
                </div>  
            </article>
        </div>
    @endforeach
    </div><!-- .magazine-loop -->
    @endif
</section>
@stop