<aside id="dpe_fp_widget-4" class="widget widget_dpe_fp_widget">
    <h3 class="widget-title"><span>Bạn nên đọc</span></h3>
    <ul class="dpe-flexible-posts">
        @if(isset($widget_posts) && count($widget_posts) > 0)
        @foreach($widget_posts as $key=>$value)
        <li id="post" class="post page type-page status-publish has-post-thumbnail hentry">
            <a href="{{url('/bai-viet/'.$value->Alias)}}">
                <img style="width:100%;height:auto;"
                    src="{{url('public/images/news/'.$value->Image)}}"
                    class="attachment-xmag-medium size-xmag-medium wp-post-image lazyload"
                    alt="{{$value->Alias}}" loading="lazy"
                    data-src="{{url('public/images/news/'.$value->Image)}}"
                    data-srcset="">
                <h4 class="title">{{$value->Name}}</h4>
            </a>
        </li>
        @endforeach
        @endif
    </ul><!-- .dpe-flexible-posts -->
</aside>

<aside id="custom_html-2" class="widget_text widget widget_custom_html">
    <h3 class="widget-title"><span>BROKERS ĐƯỢC CẤP PHÉP</span></h3>
    <div class="textwidget custom-html-widget">
        @if(isset($widget_brokers) && count($widget_brokers) > 0)
        @foreach($widget_brokers as $key=>$value)
        <div class="danh-gia-detail">
            <div class="logo-review">
                <a href="https://one.exness.link/intl/vi/a/tettpett" target="_blank" rel="nofollow noopener noreferrer">
                    <img src="{{url('public/images/news/'.$value->Image)}}"
                        class="lazyload"
                        data-src="{{url('public/images/news/'.$value->Image)}}">
                </a>
            </div>
            <div class="btn-review">
                <a class="review" href="{{url('/bai-viet/'.$value->Alias)}}">Review</a>
                <a class="website" href="https://one.exness.link/boarding/sign-up/a/tettpett?lng=vi" target="_blank"
                    rel="nofollow noopener noreferrer">Xem thêm</a>
            </div>
        </div>
        @endforeach
        @endif
    </div>
</aside>