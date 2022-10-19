<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserLevel;
use App\Models\System;
use App\Models\Page;
use App\Models\Social;
use App\Models\Newsletter;
use App\Models\Contact;
use App\Models\NewsCategory;
use App\Models\News;
use Validator;
use DB;
use File;
use Image;

class FrontController extends Controller
{
    public function __construct()
    {
        @session_start();
        //Website Name
        $websiteName = System::select('Description')->where('Code','name')->first();  
        view()->share('websiteName',$websiteName);
        //Favicon
        $favicon = System::select('Description')->where('Code','favicon')->first();
        view()->share('favicon',$favicon);
        //Email
        $email = System::select('Description')->where('Code','email')->first();
        view()->share('email',$email);
        //Phone
        $phone = System::select('Description')->where('Code','phone')->first();
        view()->share('phone',$phone);
        //Facebook address
        $address = System::select('Description')->where('Code','address')->first();
        view()->share('address',$address);
        //Copyright
        $copyright = System::select('Description')->where('Code','copyright')->first();
        view()->share('copyright',$copyright);
        //pages
        $pages = Page::where('Status',1)->orderBy('Sort','ASC')->get();
        view()->share('pages',$pages);
        //Category
        $categories = NewsCategory::where('Status',1)->get();
        // dd($categories);
        view()->share('categories',$categories);
        //Danh sách các bài post ở widget
        $widget_posts = News::where('Status',1)->orderBy('RowID','ASC')->limit(6)->get();
        view()->share('widget_posts',$widget_posts);
        //Danh sách các Brokers ở widget
        $widget_brokers = News::where('Status',1)->where('Category_ID',8)->orderBy('RowID','DESC')->limit(8)->get();
        view()->share('widget_brokers',$widget_brokers);
    }

    public function index()
    {
        $lated_post = News::where('Status',1)->orderBy('RowID','DESC')->limit(5)->get();
        // $kinhnghiemdautu = News::where('Status',1)->where('Category_ID',3)->orderBy('RowID','DESC')->limit(6)->get();
        $kinhnghiemdautu = DB::table('news as a')
        ->join('news_category as b','a.Category_ID','=','b.RowID')
        ->selectRaw('a.*,b.Name as category_name,b.Alias as category_url')
        ->where('a.Category_ID',3)
        ->where('a.Status',1)
        ->where('b.Status',1)
        ->orderBy('a.RowID','DESC')
        ->limit(6)->get();

        // $danhgiasanforex = News::where('Status',1)->where('Category_ID',8)->orderBy('RowID','DESC')->limit(4)->get();
        $danhgiasanforex = DB::table('news as a')
        ->join('news_category as b','a.Category_ID','=','b.RowID')
        ->selectRaw('a.*,b.Name as category_name,b.Alias as category_url')
        ->where('a.Category_ID',8)
        ->where('a.Status',1)
        ->where('b.Status',1)
        ->orderBy('a.RowID','DESC')
        ->limit(4)->get();

        // $kienthuccanban = News::where('Status',1)->where('Category_ID',1)->orderBy('RowID','DESC')->limit(8)->get();
        $kienthuccanban = DB::table('news as a')
        ->join('news_category as b','a.Category_ID','=','b.RowID')
        ->selectRaw('a.*,b.Name as category_name,b.Alias as category_url')
        ->where('a.Category_ID',1)
        ->where('a.Status',1)
        ->where('b.Status',1)
        ->orderBy('a.RowID','DESC')
        ->limit(8)->get();

        // $forex_benle = News::where('Status',1)->where('Category_ID',4)->orderBy('RowID','DESC')->limit(5)->get();
        $forex_benle = DB::table('news as a')
        ->join('news_category as b','a.Category_ID','=','b.RowID')
        ->selectRaw('a.*,b.Name as category_name,b.Alias as category_url')
        ->where('a.Category_ID',4)
        ->where('a.Status',1)
        ->where('b.Status',1)
        ->orderBy('a.RowID','DESC')
        ->limit(5)->get();

        // $tintuc = News::where('Status',1)->where('Category_ID',9)->orderBy('RowID','DESC')->limit(2)->get();
        $tintuc = DB::table('news as a')
        ->join('news_category as b','a.Category_ID','=','b.RowID')
        ->selectRaw('a.*,b.Name as category_name,b.Alias as category_url')
        ->where('a.Category_ID',9)
        ->where('a.Status',1)
        ->where('b.Status',1)
        ->orderBy('a.RowID','DESC')
        ->limit(2)->get();

        return view('front.home.home',compact('lated_post','kinhnghiemdautu','danhgiasanforex','kienthuccanban','forex_benle','tintuc'));
    }

    public function about() {
        $page = DB::table('page')->where('RowID',7)->select('*')->first();
        return view('front.pages.about',['page'=>$page]);
    }

    public function lichKinhTe() {
        $page = DB::table('page')->where('RowID',6)->select('*')->first();
        return view('front.pages.lichkinhte',['page'=>$page]);
    }

    public function motaikhoanforex() {
        $page = DB::table('page')->where('RowID',5)->select('*')->first();
        return view('front.pages.motaikhoanforex',['page'=>$page]);
    }

    public function broker() {
        $page = DB::table('page')->where('RowID',4)->select('*')->first();
        return view('front.pages.broker',['page'=>$page]);
    }

    public function huongdandautuforex() {
        $news = News::find(12);
        return view('front.pages.huongdandautuforex',['news'=>$news]);
    }

    public function news_detail($url) {
        $news = News::where('Alias',$url)->where('Status',1)->first();
        $category_posts = News::where('Category_ID',$news->Category_ID)->where('Status',1)->limit(8)->get();
        return view('front.pages.news_detail',['news'=>$news,'category_posts'=>$category_posts]);
    }

    public function news_blog($url) {
        $kienthucforex = Page::find(2);
        if ($kienthucforex->Alias == $url) {
            $list_news = DB::table('news as a')
            ->join('news_category as b','a.Category_ID','=','b.RowID')
            ->selectRaw('a.*,b.Name as category_name')
            ->where('b.Group','Kiến thức forex')
            ->where('a.Status',1)->where('b.Status',1)
            ->orderBy('a.RowID','DESC')
            ->paginate(8);
            // ->get();
            return view('front.pages.news_blog',['list_news'=>$list_news,'categoryName'=>$kienthucforex->Name,'role'=>0]);
        }
        if ($url == 'moi-nhat') {
            $list_news = DB::table('news as a')
            ->join('news_category as b','a.Category_ID','=','b.RowID')
            ->selectRaw('a.*,b.Name as category_name')
            ->where('a.Status',1)->where('b.Status',1)
            ->orderBy('a.RowID','DESC')
            ->paginate(4);
            return view('front.pages.news_blog',['list_news'=>$list_news,'categoryName'=>'Tin tức mới nhất','role'=>0]);
        }

        $list_news = DB::table('news as a')
        ->join('news_category as b','a.Category_ID','=','b.RowID')
        ->selectRaw('a.*,b.Name as category_name')
        ->where('b.Alias',$url)
        ->where('a.Status',1)
        ->where('b.Status',1)
        ->orderBy('a.RowID','DESC')
        ->paginate(8);
        // ->get();
        if(count($list_news) > 0) {
            return view('front.pages.news_blog',['list_news'=>$list_news,'categoryName'=>$list_news[0]->category_name,'role'=>0]);
        } else {
            return view('front.pages.news_blog');
        }
           
    }

    public function news_search(Request $request) {
        $searchStr = $request->input('txt-search');
        $list_news = DB::table('news as a')
        ->join('news_category as b','a.Category_ID','=','b.RowID')
        ->selectRaw('a.*,b.Name as category_name')
        ->where('a.Name','like','%'.$searchStr.'%')
        ->where('a.Status',1)
        ->where('b.Status',1)
        ->orderBy('a.RowID','DESC')
        ->paginate(8);
        // dd(count($list_news));
        if(count($list_news) > 0) {
            return view('front.pages.news_blog',['list_news'=>$list_news,'categoryName'=>$list_news[0]->category_name,'role'=>1,'count_results'=>count($list_news)]);
        } else {
            return view('front.pages.news_blog',['count_results'=>count($list_news)]);
        }
    }

}
