<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <meta name='robots' content='index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1' />

    <!-- This site is optimized with the Yoast SEO Premium plugin v17.6 (Yoast SEO v17.6) - https://yoast.com/wordpress/plugins/seo/ -->
    <title>@yield('title')</title>
    <meta name="description"
        content="@yield('description')" />
    <link rel="canonical" href="@yield('url')" />
    <meta name="keywords" content="@yield('keywords')"/>
    <link rel="shortcut icon" type="image/x-icon" href="{{url('public/images/favicon/'.$favicon->Description)}}">
    <!-- <link rel="next" href="https://fx24.net/page/2/" /> -->
    <meta property="og:locale" content="vi_VN" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="@yield('title')" />
    <meta property="og:description"
        content="@yield('description')" />
    <meta property="og:url" content="@yield('url')" />
    <meta property="og:site_name" content="Demo-fx24.net" />
    <meta property="og:image"
        content="@yield('image')" />
    <meta property="og:image:width" content="130" />
    <meta property="og:image:height" content="80" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="copyright" content="Demo-fx24.net"/>
    <meta name="geo.placename" content="Ho Chi Minh, Viet nam"/>
    <meta name="geo.region" content="VN-HCM"/>
    <!-- <script type="application/ld+json" class="yoast-schema-graph">
    {
        "@context": "https://schema.org",
        "@graph": [{
            "@type": ["Person", "Organization"],
            "@id": "https://fx24.net/#/schema/person/222d9beec0eb9f4a987b40a519f90151",
            "name": "Pham Khuong",
            "image": {
                "@type": "ImageObject",
                "@id": "https://secureservercdn.net/160.153.137.170/a73.3db.myftpupload.com/#personlogo",
                "inLanguage": "vi",
                "url": "https://secureservercdn.net/160.153.137.170/a73.3db.myftpupload.com/wp-content/uploads/2020/04/Tac-gia-Pham-Khuong-fx24.jpg?time=1617958835",
                "contentUrl": "https://secureservercdn.net/160.153.137.170/a73.3db.myftpupload.com/wp-content/uploads/2020/04/Tac-gia-Pham-Khuong-fx24.jpg?time=1617958835",
                "width": 585,
                "height": 559,
                "caption": "Pham Khuong"
            },
            "logo": {
                "@id": "https://fx24.net/#personlogo"
            },
            "sameAs": ["https://fx24.net", "https://www.facebook.com/phamkhuong999"]
        }, {
            "@type": "WebSite",
            "@id": "https://fx24.net/#website",
            "url": "https://fx24.net/",
            "name": "FX24.net",
            "description": "Ki\u1ebfn th\u1ee9c \u0111\u1ea7u t\u01b0 forex",
            "publisher": {
                "@id": "https://fx24.net/#/schema/person/222d9beec0eb9f4a987b40a519f90151"
            },
            "potentialAction": [{
                "@type": "SearchAction",
                "target": {
                    "@type": "EntryPoint",
                    "urlTemplate": "https://fx24.net/?s={search_term_string}"
                },
                "query-input": "required name=search_term_string"
            }],
            "inLanguage": "vi"
        }, {
            "@type": "CollectionPage",
            "@id": "https://fx24.net/#webpage",
            "url": "https://fx24.net/",
            "name": "FX24.net - Ki\u1ebfn th\u1ee9c \u0111\u1ea7u t\u01b0 forex",
            "isPartOf": {
                "@id": "https://fx24.net/#website"
            },
            "about": {
                "@id": "https://fx24.net/#/schema/person/222d9beec0eb9f4a987b40a519f90151"
            },
            "description": "H\u01b0\u1edbng d\u1eabn \u0111\u1ea7u t\u01b0 forex (ngo\u1ea1i h\u1ed1i). H\u01b0\u1edbng d\u1eabn \u0111\u0103ng k\u00fd m\u1edf t\u00e0i kho\u1ea3n forex. \u0110\u00e1nh gi\u00e1 c\u00e1c s\u00e0n forex uy t\u00edn t\u1ea1i Vi\u1ec7t Nam v\u00e0 tr\u00ean th\u1ebf gi\u1edbi",
            "breadcrumb": {
                "@id": "https://fx24.net/#breadcrumb"
            },
            "inLanguage": "vi",
            "potentialAction": [{
                "@type": "ReadAction",
                "target": ["https://fx24.net/"]
            }]
        }, {
            "@type": "BreadcrumbList",
            "@id": "https://fx24.net/#breadcrumb",
            "itemListElement": [{
                "@type": "ListItem",
                "position": 1,
                "name": "Home"
            }]
        }]
    }
    </script> -->
    <!-- / Yoast SEO Premium plugin. -->


    <link rel='dns-prefetch' href='//fonts.googleapis.com' />
    <link rel='dns-prefetch' href='//s.w.org' />
    <link rel="alternate" type="application/rss+xml" title="Dòng thông tin FX24.net &raquo;"
        href="https://fx24.net/feed/" />
    <link rel="alternate" type="application/rss+xml" title="Dòng phản hồi FX24.net &raquo;"
        href="https://fx24.net/comments/feed/" />
    <link rel='preconnect' href='https://secureservercdn.net' crossorigin />
    <script src="{{url('resources/js/SEO-plugin/seo-plugin.js')}}"></script>
    <link rel='stylesheet' id='wp-block-library-css'
        href='https://secureservercdn.net/160.153.137.170/a73.3db.myftpupload.com/wp-includes/css/dist/block-library/style.min.css?ver=5.9.3&#038;time=1653320679'
        type='text/css' media='all' />
    <link rel="stylesheet" id='global-styles-inline-css' href="{{url('resources/css/client/global-style.css')}}">
    <link rel='stylesheet' id='rpt_front_style-css'
        href='https://secureservercdn.net/160.153.137.170/a73.3db.myftpupload.com/wp-content/plugins/related-posts-thumbnails/assets/css/front.css?ver=1.9.0&#038;time=1653320679'
        type='text/css' media='all' />
    <link rel='stylesheet' id='toc-screen-css'
        href='https://secureservercdn.net/160.153.137.170/a73.3db.myftpupload.com/wp-content/plugins/table-of-contents-plus/screen.min.css?ver=2106&#038;time=1653320679'
        type='text/css' media='all' />
    <link rel='stylesheet' id='xmag-fonts-css'
        href='https://fonts.googleapis.com/css?family=Open+Sans%3A400%2C700%2C400italic%2C700italic%7CMuli%3A400%2C700%2C300%7CDomine%3A400%2C700%2C300&#038;subset=latin%2Clatin-ext&#038;display=fallback'
        type='text/css' media='all' />
    <link rel='stylesheet' id='xmag-icons-css'
        href='https://secureservercdn.net/160.153.137.170/a73.3db.myftpupload.com/wp-content/themes/xmag-plus/assets/css/simple-line-icons.min.css?ver=2.3.3.1&#038;time=1653320679'
        type='text/css' media='all' />
    <link rel='stylesheet' id='xmag-style-css'
        href='https://secureservercdn.net/160.153.137.170/a73.3db.myftpupload.com/wp-content/themes/xmag-plus/style.css?ver=1.4.5&#038;time=1653320679'
        type='text/css' media='all' />
    <link rel="stylesheet" id='xmag-style-inline-css' href="{{url('resources/css/client/xmag-style.css')}}">
    <script type='text/javascript'
        src='https://secureservercdn.net/160.153.137.170/a73.3db.myftpupload.com/wp-includes/js/jquery/jquery.min.js?ver=3.6.0&#038;time=1653320679'
        id='jquery-core-js'></script>
    <script type='text/javascript'
        src='https://secureservercdn.net/160.153.137.170/a73.3db.myftpupload.com/wp-includes/js/jquery/jquery-migrate.min.js?ver=3.3.2&#038;time=1653320679'
        id='jquery-migrate-js'></script>
    <link rel="https://api.w.org/" href="https://fx24.net/wp-json/" />
    <link rel="EditURI" type="application/rsd+xml" title="RSD" href="https://fx24.net/xmlrpc.php?rsd" />
    <link rel="wlwmanifest" type="application/wlwmanifest+xml"
        href="https://secureservercdn.net/160.153.137.170/a73.3db.myftpupload.com/wp-includes/wlwmanifest.xml?time=1653320679" />
    <meta name="generator" content="WordPress 5.9.3" />
    <link rel="stylesheet" href="{{url('resources/css/client/custom.css')}}">
    <link rel="stylesheet" id="wp-custom-css" href="{{url('resources/css/client/wp-custom.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>

<body class="home blog wp-embed-responsive site-boxed magazine">
    {!! csrf_field() !!}
    <div id="page" class="hfeed site">
        <!-- Header -->
        @include('layouts.header')
        <!-- Header -->

        <!-- Content -->
        <div id="content" class="site-content">
            <div class="container">
                <div id="primary" class="content-area">
                    <!-- #main -->
                    <main id="main" class="site-main">
                        @yield('content')
                    </main>
                    <!-- #main -->
                </div><!-- #primary -->

                <!-- widget-area -->
                <div id="secondary" class="sidebar widget-area widget-grey" role="complementary">
                    @include('layouts.widget')
                </div>
                <!-- widget-area -->


            </div><!-- .container -->
        </div>
        <!-- Content -->

        <!-- Footer -->
        @include('layouts.footer')
        <!-- Footer -->

        <a href="#masthead" id="scroll-up"><span class="icon-arrow-up"></span></a>

    </div><!-- #page -->

    <script>
    document.addEventListener("DOMContentLoaded", function() {
        var e = "undefined" != typeof MutationObserver;
        if (WPO_LazyLoad.update(), e) {
            var t = new MutationObserver(function(e) {
                    e.forEach(function(e) {
                        WPO_LazyLoad.update(e.addedNodes)
                    })
                }),
                a = {
                    childList: !0,
                    subtree: !0
                },
                n = document.getElementsByTagName("body")[0];
            t.observe(n, a)
        } else window.addEventListener("load", function() {
            WPO_LazyLoad.deferred_call("update", WPO_LazyLoad.update)
        }), window.addEventListener("scroll", function() {
            WPO_LazyLoad.deferred_call("update", WPO_LazyLoad.update)
        }), window.addEventListener("resize", function() {
            WPO_LazyLoad.deferred_call("update", WPO_LazyLoad.update)
        }), document.getElementsByTagName("body")[0].addEventListener("post-load", function() {
            WPO_LazyLoad.deferred_call("update", WPO_LazyLoad.update)
        })
    });
    var WPO_Intersection_Observer = function(e, t) {
            function a(e) {
                d.push(e)
            }

            function n(e) {
                var t;
                for (t in d)
                    if (d.hasOwnProperty(t) && e == d[t]) return void delete d[t]
            }

            function r() {
                var t;
                for (t in d) d.hasOwnProperty(t) && o(d[t]) && (e(d[t]), n(d[t]))
            }

            function o(e) {
                var a = e.getBoundingClientRect(),
                    n = window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight;
                return a.top - t.offset < n && a.bottom + t.offset > 0
            }
            var d = [];
            return t = t || {
                offset: 100
            }, window.addEventListener("load", function() {
                WPO_LazyLoad.deferred_call("check", r)
            }), window.addEventListener("scroll", function() {
                WPO_LazyLoad.deferred_call("check", r)
            }), window.addEventListener("resize", function() {
                WPO_LazyLoad.deferred_call("check", r)
            }), {
                observe: a,
                unobserve: n
            }
        },
        WPO_LazyLoad = function() {
            function e(e) {
                if (!c(e, f.loaded_class)) {
                    s(e, f.loaded_class), l.unobserve(e), i(e, f.observe_class);
                    var a, n = e.tagName;
                    if ("picture" == n.toLowerCase())
                        for (a in e.childNodes) e.childNodes.hasOwnProperty(a) && t(e.childNodes[a]);
                    else t(e)
                }
            }

            function t(e) {
                if ("undefined" != typeof e.getAttribute) {
                    var t = e.getAttribute("data-src"),
                        n = e.getAttribute("data-srcset"),
                        r = e.getAttribute("data-background"),
                        o = e.getAttribute("data-background-image");
                    t && (e.setAttribute("src", t), e.removeAttribute("data-src")), n && (e.setAttribute("srcset", n), e
                        .removeAttribute("data-srcset")), r && (e.style.background = a(e.style.background, r.split(
                        ";")), e.removeAttribute("data-background")), o && (e.style.backgroundImage = a(e.style
                        .backgroundImage, o.split(";")), e.removeAttribute("data-background-image"))
                }
            }

            function a(e, t) {
                var a = 0;
                return e.replaceAll(/url\([^\)]*\)/gi, function() {
                    return ["url('", t[a++], "')"].join("")
                })
            }

            function n(t) {
                var a;
                for (a in t) t.hasOwnProperty(a) && t[a].isIntersecting && e(t[a].target)
            }

            function r(e) {
                i(e, f.select_class), c(e, f.observe_class) || (s(e, f.observe_class), l.observe(e))
            }

            function o(e) {
                var t, a = e || Array.prototype.slice.call(f.container.getElementsByClassName(f.select_class));
                for (t in a) a.hasOwnProperty(t) && (c(a[t], f.select_class) ? r(a[t]) : a[t].childNodes && a[t]
                    .childNodes.length && o(a[t].childNodes))
            }

            function d(e, t, a) {
                a = a || 200, v[e] = v[e] ? v[e] + 1 : 1, setTimeout(function() {
                    var n = (new Date).getTime(),
                        r = b[e] || 0;
                    v[e]--, (0 === v[e] || r + a < n) && (b[e] = n, t())
                }, a)
            }

            function s(e, t) {
                c(e, t) || (e.className ? e.className += " " + t : e.className = t)
            }

            function i(e, t) {
                var a = new RegExp(["(^|\\s)", t, "(\\s|$)"].join(""));
                e.className = e.className.replace(a, " ")
            }

            function c(e, t) {
                var a = new RegExp(["(^|\\s)", t, "(\\s|$)"].join(""));
                return a.test(e.className)
            }
            var l, u = "undefined" != typeof IntersectionObserver,
                f = {
                    container: window.document,
                    select_class: "lazyload",
                    observe_class: "lazyload-observe",
                    loaded_class: "lazyload-loaded"
                };
            l = u ? new IntersectionObserver(n, {
                root: null,
                rootMargin: "0px",
                threshold: [.1]
            }) : new WPO_Intersection_Observer(e);
            var v = {},
                b = {};
            return {
                update: o,
                deferred_call: d
            }
        }();
    </script>
    <script type='text/javascript' id='toc-front-js-extra'>
    /* <![CDATA[ */
    var tocplus = {
        "visibility_show": "show",
        "visibility_hide": "hide",
        "width": "Auto"
    };
    /* ]]> */
    </script>
    <script type='text/javascript'
        src='https://secureservercdn.net/160.153.137.170/a73.3db.myftpupload.com/wp-content/plugins/table-of-contents-plus/front.min.js?ver=2106&#038;time=1653320679'
        id='toc-front-js'></script>
    <script type='text/javascript'
        src='https://secureservercdn.net/160.153.137.170/a73.3db.myftpupload.com/wp-content/themes/xmag-plus/assets/js/script.js?ver=20210930&#038;time=1653320679'
        id='xmag-script-js'></script>
    <script type='text/javascript' id='q2w3_fixed_widget-js-extra'>
    /* <![CDATA[ */
    var q2w3_sidebar_options = [{
        "sidebar": "sidebar-1",
        "use_sticky_position": false,
        "margin_top": 3,
        "margin_bottom": 0,
        "stop_elements_selectors": "footer-area-left",
        "screen_max_width": 0,
        "screen_max_height": 0,
        "widgets": ["#custom_html-2"]
    }];
    /* ]]> */
    </script>
    <script type='text/javascript'
        src='https://secureservercdn.net/160.153.137.170/a73.3db.myftpupload.com/wp-content/plugins/q2w3-fixed-widget/js/frontend.min.js?ver=6.0.7&#038;time=1653320679'
        id='q2w3_fixed_widget-js'></script>
    <script>
    'undefined' === typeof _trfq || (window._trfq = []);
    'undefined' === typeof _trfd && (window._trfd = []), _trfd.push({
        'tccl.baseHost': 'secureserver.net'
    }), _trfd.push({
        'ap': 'wpaas'
    }, {
        'server': '30508cba-1bd3-193a-2a37-f72b8e45d353.secureserver.net'
    }, {
        'pod': 'n3nlwppod03'
    }, {
        'storage': 'n3cephmah003pod03_data06'
    }, {
        'xid': '41790564'
    }, {
        'wp': '5.9.3'
    }, {
        'php': '7.3.33'
    }, {
        'loggedin': '0'
    }, {
        'cdn': '1'
    }, {
        'builder': ''
    }, {
        'theme': 'xmag-plus'
    }, {
        'wds': '0'
    }, {
        'wp_alloptions_count': '779'
    }, {
        'wp_alloptions_bytes': '248217'
    })
    </script>
    <script>
    window.addEventListener('click', function(elem) {
        var _elem$target, _elem$target$dataset, _window, _window$_trfq;
        return (elem === null || elem === void 0 ? void 0 : (_elem$target = elem.target) === null ||
            _elem$target === void 0 ? void 0 : (_elem$target$dataset = _elem$target.dataset) === null ||
            _elem$target$dataset === void 0 ? void 0 : _elem$target$dataset.eid) && ((_window = window) ===
            null || _window === void 0 ? void 0 : (_window$_trfq = _window._trfq) === null ||
            _window$_trfq === void 0 ? void 0 : _window$_trfq.push(["cmdLogEvent", "click", elem.target
                .dataset.eid
            ]));
    });
    </script>
    <script src='https://img1.wsimg.com/tcc/tcc_l.combined.1.0.6.min.js'></script>
    <script src='https://img1.wsimg.com/traffic-assets/js/tccl-tti.min.js' onload="window.tti.calculateTTI()"></script>

    <!-- Google Analytics -->
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-122663256-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-122663256-1');
    </script>

</body>

</html>

<!-- Cached by WP-Optimize (gzip) - https://getwpo.com - Last modified: Tue, 24 May 2022 23:38:05 GMT -->