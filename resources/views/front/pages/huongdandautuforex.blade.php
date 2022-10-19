@extends('front.templates.master')
@section('title', 'Đầu tư forex là gì? Cách chơi forex từ cơ bản đến nâng cao - Demo-fx24.net')
@section('content')
<h1>{{$news->Name}}</h1>
<div class="entry-meta">
    <span class="posted-on"><span class="screen-reader-text">Posted on</span><span class="icon-clock"></span>
    <a href="https://fx24.net/cach-choi-forex-cho-nguoi-moi-bat-dau/" rel="bookmark">
        <time class="entry-date published" datetime="2021-09-23T17:23:58+07:00">23 Tháng Chín, 2021</time>
        <time class="updated" datetime="2022-01-15T09:46:34+07:00">15 Tháng Một, 2022</time></a>
    </span>
    <span class="byline"><span class="author vcard"><span class="screen-reader-text">Author</span>
    <a class="url fn n" href="https://fx24.net/author/phm999/">/ Pham Khuong /</a>
    </span></span><span class="comments-link">
        <a href="https://fx24.net/cach-choi-forex-cho-nguoi-moi-bat-dau/#comments"> <span class="icon-bubbles"></span> 20
    </a></span>
</div>
{!! $news->Description !!}
@stop