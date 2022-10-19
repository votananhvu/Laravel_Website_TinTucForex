<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

class BackController extends Controller
{
    public function __construct()
    {
        @session_start();
    }

    public function home()
    {
        return view('back.home.home');
    }

    //======================== Staff ========================
    public function staff_profile()
    {
        return view('back.staff.profile');
    }

    public function staff_profile_post(Request $request)
    {
        $message = [];

        // $validator = k;

        if ($request->name == '') {
            return redirect('admin/staff/profile')->with(['flash_level'=>'danger','flash_message'=>'Vui lòng điền vào trường có dấu *']);
        }

        $user = User::find($request->id);
        $user->name = $request->name;
        
        if (isset($request->password) && $request->password != '') {
            $user->password = bcrypt($request->password);
        }

        $flag = $user->save();

        if ($flag == true) {
            return redirect('admin/staff/profile')->with(['flash_level'=>'success','flash_message'=>'Update thông tin tài khoản thành công.']);
        } else {
            return redirect('admin/staff/profile')->with(['flash_level'=>'danger','flash_message'=>'Error!!!']);
        }
    }

    public function staff_list()
    {
        $user = DB::table('users as a')
        ->join('user_level as b', 'a.level', '=', 'b.id')
        ->selectRaw('a.id, a.name, a.email, a.level, a.status')->get();
        return view('back.staff.list', ['User'=>$user]);
    }

    public function staff_add()
    {
        $userLevel = UserLevel::where('status', 1)->get();
        return view('back.staff.add', ['UserLevel'=>$userLevel]);
    }

    public function staff_add_post(Request $request)
    {
        $message = [];

        // $validator = k;

        if ($request->name == '' || $request->email == '' || $request->password == '') {
            return redirect('admin/staff/add')->with(['flash_level'=>'danger','flash_message'=>'Vui lòng điền vào trường có dấu *']);
        }

        $exist_email = User::where('email',$request->email)->get();
        if (count($exist_email) > 0) {
            return redirect('admin/staff/add')->with(['flash_level'=>'danger','flash_message'=>'Email đã tồn tại.']);
        }
        $user = new User();
        $user->name = $request->name;
        $user->level = $request->level;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);

        $flag = $user->save();

        if ($flag == true) {
            return redirect('admin/staff/list')->with(['flash_level'=>'success','flash_message'=>'Thêm nhân viên thành công.']);
        } else {
            return redirect('admin/staff/add')->with(['flash_level'=>'danger','flash_message'=>'Thêm thất bại!']);
        }
    }

    public function staff_edit($id) {
        $user = User::find($id);
        $userLevel = UserLevel::where('status', 1)->get();
        return view('back.staff.edit',['User'=>$user,'UserLevel'=>$userLevel]);
    }

    public function staff_edit_post(Request $request, $id) {
        if ($request->name == '') {
            return redirect('admin/staff/edit/'.$id)->with(['flash_level'=>'danger','flash_message'=>'Vui lòng điền vào trường có dấu *']);
        }

        $user = User::find($request->id);
        $user->name = $request->name;
        $user->level = $request->level;
        $user->status = $request->status;

        
        if (isset($request->password) && $request->password != '') {
            $user->password = bcrypt($request->password);
        }

        $flag = $user->save();

        if ($flag == true) {
            return redirect('admin/staff/list')->with(['flash_level'=>'success','flash_message'=>'Update thông tin tài khoản thành công.']);
        } else {
            return redirect('admin/staff/edit/'.$id)->with(['flash_level'=>'danger','flash_message'=>'Error!!!']);
        }
    }

    public function staff_delete($id) {
        $user = User::find($id);
        $flag = $user->delete();

        if ($flag == true) {
            return redirect('admin/staff/list')->with(['flash_level'=>'success','flash_message'=>'Xóa tài khoản thành công.']);
        } else {
            return redirect('admin/staff/list')->with(['flash_level'=>'danger','flash_message'=>'Xóa không thành công!']);
        }
    }
    //======================== Staff ========================

    //======================== System =========================
    public function system() {
        $name = System::where('Status',1)->where('Code','name')->first();
        $logo = System::where('Status',1)->where('Code','logo')->first();
        $favicon = System::where('Status',1)->where('Code','favicon')->first();
        $email = System::where('Status',1)->where('Code','email')->first();
        $phone = System::where('Status',1)->where('Code','phone')->first();
        $address = System::where('Status',1)->where('Code','address')->first();
        $copyright = System::where('Status',1)->where('Code','copyright')->first();

        return view('back.system.system',compact('name','logo','favicon','email','phone','address','copyright'));
    }

    public function system_post(Request $request) {
        if ($request->name == '' || $request->email == '' || $request->phone == '' || $request->copyright == '') {
            return redirect('admin/system')->with(['flash_level'=>'danger','flash_message'=>'Vui lòng điền vào trường có dấu *']);
        }

        System::where('Status',1)->where('Code','name')
        ->update(['Description'=>$request->name]);
        System::where('Status',1)->where('Code','email')
        ->update(['Description'=>$request->email]);
        System::where('Status',1)->where('Code','phone')
        ->update(['Description'=>$request->phone]);
        System::where('Status',1)->where('Code','address')
        ->update(['Description'=>$request->address]);
        System::where('Status',1)->where('Code','copyright')
        ->update(['Description'=>$request->copyright]);
        
        if(!empty($request->file('logo'))) {
            $logo = System::where('Status',1)->where('Code','logo')->first();
            // $path = 'public/images/logo/'.$logo->Description;
            // if(File::exists($path)) {
            //     File::delete($path);
            // }
            $img_name = $request->file('logo')->getClientOriginalName();
            $request->file('logo')->move('public/images/logo', $img_name);
            $logo->Description = $img_name;
            $logo->save();
        }

        if(!empty($request->file('favicon'))) {
            $favicon = System::where('Status',1)->where('Code','favicon')->first();
            // $path = 'public/images/favicon/'.$logo->Description;
            // if(File::exists($path)) {
            //     File::delete($path);
            // }
            $img_name = $request->file('favicon')->getClientOriginalName();
            $request->file('favicon')->move('public/images/favicon', $img_name);
            $favicon->Description = $img_name;
            $favicon->save();
        }
        
        return redirect('admin/system')->with(['flash_level'=>'success','flash_message'=>'Update thành công.']);
        
    }
    //======================== System =========================

    //========================= Page =========================
    public function page_list() {
        $page = Page::get();
        return view('back.pages.list',['page'=>$page]);
    }

    public function page_edit($id) {
        $page = Page::find($id);
        $sort_pages = DB::table('page')->select('Sort')->get();
        return view('back.pages.edit',['page'=>$page,'sort_pages'=>$sort_pages]);
    }

    public function page_edit_post(Request $request, $id) {
        if ($request->name == '' || $request->alias == '') {
            return redirect('admin/page/edit/'.$id)->with(['flash_level'=>'danger','flash_message'=>'Tên trang không được để trống']);
        }

        $page = Page::find($id);
        $page->Name = $request->name;
        $page->Alias = $request->alias;
        $page->Status = $request->status;
        if($request->font != '') {
            $page->Font = $request->font;
        }
        if($page->Sort != $request->sort) {
            $old_sort_page = Page::where('Sort',$request->sort)->first();
            $old_sort_page->Sort = $page->Sort;
            $old_sort_page->save();
            $page->Sort = $request->sort;
        }

        $page->MetaTitle = $request->meta_title;
        $page->MetaDescription = $request->meta_description;
        $page->MetaKeyword = $request->meta_keyword;
        $page->Description = $request->description;

        $flag = $page->save();

        if ($flag == true) {
            return redirect('admin/page/list')->with(['flash_level'=>'success','flash_message'=>'Update thành công.']);
        } else {
            return redirect('admin/page/edit/'.$id)->with(['flash_level'=>'danger','flash_message'=>'Update không thành công!']);
        }

    }
    //========================= Page =========================

    //======================== Social ========================
    public function social_list() {
        $social = Social::get();
        return view('back.social.list',['social' => $social]);
    }

    public function social_edit($id) {
        $social = Social::find($id);
        $sort_social = DB::table('social')->select('Sort')->get();
        return view('back.social.edit',['social' => $social, 'sort_social' => $sort_social]);
    }

    public function social_edit_post(Request $request, $id) {
        if ($request->name == '' || $request->font == '') {
            return redirect('admin/social/edit/'.$id)->with(['flash_level'=>'danger','flash_message'=>'Không để trống trường có dấu *']);
        }

        $social = Social::find($id);
        $social->Name = $request->name;
        $social->Status = $request->status;
        $social->Font = $request->font;
        if($social->Sort != $request->sort) {
            $old_sort_social = Social::where('Sort',$request->sort)->first();
            $old_sort_social->Sort = $social->Sort;
            $old_sort_social->save();
            $social->Sort = $request->sort;
        }

        $flag = $social->save();

        if ($flag == true) {
            return redirect('admin/social/list')->with(['flash_level'=>'success','flash_message'=>'Update thành công.']);
        } else {
            return redirect('admin/social/edit/'.$id)->with(['flash_level'=>'danger','flash_message'=>'Update không thành công!']);
        }

    }
    //======================== Social ========================

    //========================= Newsletter =========================
    public function newsletter_list() {
        $newsletter = Newsletter::get();
        return view('back.newsletter.list',['newsletter' => $newsletter]);
    }

    public function newsletter_edit($id) {
        $newsletter = Newsletter::find($id);
        return view('back.newsletter.edit',['newsletter' => $newsletter]);
    }

    public function newsletter_edit_post(Request $request, $id) {
        if ($request->email == '') {
            return redirect('admin/newsletter/edit/'.$id)->with(['flash_level'=>'danger','flash_message'=>'Email không được để trống!']);
        }

        $newsletter = Newsletter::find($id);
        $newsletter->Email = $request->email;
        $newsletter->IsViews = $request->isviews;

        $flag = $newsletter->save();
        if ($flag == true) {
            return redirect('admin/newsletter/list')->with(['flash_level'=>'success','flash_message'=>'Update thành công.']);
        } else {
            return redirect('admin/newsletter/edit/'.$id)->with(['flash_level'=>'danger','flash_message'=>'Update không thành công!']);
        }
    }

    public function newsletter_delete($id) {
        $newsletter = Newsletter::find($id);
        $flag = $newsletter->delete();

        if ($flag == true) {
            return redirect('admin/newsletter/list')->with(['flash_level'=>'success','flash_message'=>'Xóa thành công.']);
        } else {
            return redirect('admin/newsletter/list')->with(['flash_level'=>'danger','flash_message'=>'Xóa không thành công!']);
        }
    }
    //========================= Newsletter =========================

    //========================== Contact ==========================
    public function contact_list() {
        $contact = Contact::get();
        return view('back.contact.list',['contact' => $contact]);
    }

    public function contact_edit($id) {
        $contact = Contact::find($id);
        return view('back.contact.edit', ['contact' => $contact]);
    }
    
    public function contact_edit_post(Request $request, $id) {
        if ($request->name == '' || $request->email == '' || $request->phone == '') {
            return redirect('admin/contact/edit/'.$id)->with(['flash_level'=>'danger','flash_message'=>'Không để trống trường có dấu *']);
        }

        $contact = Contact::find($id);
        $contact->Name = $request->name;
        $contact->Email = $request->email;
        $contact->Phone = $request->phone;
        $contact->Message = $request->message;
        $contact->IsViews = $request->isviews;

        $flag = $contact->save();
        if ($flag == true) {
            return redirect('admin/contact/list')->with(['flash_level'=>'success','flash_message'=>'Update thành công.']);
        } else {
            return redirect('admin/contact/edit/'.$id)->with(['flash_level'=>'danger','flash_message'=>'Update không thành công!']);
        }
    }

    public function contact_delete($id) {
        $contact = Contact::find($id);
        $flag = $contact->delete();

        if ($flag == true) {
            return redirect('admin/contact/list')->with(['flash_level'=>'success','flash_message'=>'Xóa thành công.']);
        } else {
            return redirect('admin/contact/list')->with(['flash_level'=>'danger','flash_message'=>'Xóa không thành công!']);
        }
    }
    //========================== Contact ==========================

    //========================== Category ==========================
    public function category_list() {
        $category = NewsCategory::get();
        return view('back.category.list',['category'=>$category]);
    }

    public function category_add() {
        return view('back.category.add');
    }

    public function category_add_post(Request $request) {
        if ($request->name == '' || $request->alias == '') {
            return redirect('admin/category/add')->with(['flash_level'=>'danger','flash_message'=>'Không được để trống trường có dấu *']);
        }

        $category = new NewsCategory();
        $category->Name = $request->name;
        $category->Group = $request->group;
        $category->Alias = $request->alias;
        $category->Status = $request->status;
        $flag = $category->save();

        if ($flag == true) {
            return redirect('admin/category/list')->with(['flash_level'=>'success','flash_message'=>'Thêm danh mục thành công.']);
        } else {
            return redirect('admin/category/add')->with(['flash_level'=>'danger','flash_message'=>'Thêm danh mục không thành công!']);
        }
    }

    public function category_edit($id) {
        $category = NewsCategory::find($id);
        return view('back.category.edit',['category'=>$category]);
    }

    public function category_edit_post(Request $request, $id) {
        if ($request->name == '' || $request->alias == '') {
            return redirect('admin/category/edit/'.$id)->with(['flash_level'=>'danger','flash_message'=>'Không được để trống trường có dấu *']);
        }

        $category = NewsCategory::find($id);
        $category->Name = $request->name;
        $category->Group = $request->group;
        $category->Alias = $request->alias;
        $category->Status = $request->status;
        $flag = $category->save();

        if ($flag == true) {
            return redirect('admin/category/list')->with(['flash_level'=>'success','flash_message'=>'Update thành công.']);
        } else {
            return redirect('admin/category/edit/'.$id)->with(['flash_level'=>'danger','flash_message'=>'Update không thành công!']);
        }
    }

    public function category_delete($id) {
        $category = NewsCategory::find($id);
        $flag = $category->delete();
        if ($flag == true) {
            return redirect('admin/category/list')->with(['flash_level'=>'success','flash_message'=>'Xóa thành công.']);
        } else {
            return redirect('admin/category/list')->with(['flash_level'=>'danger','flash_message'=>'Xóa không thành công!']);
        }
    }
    //========================== Category ==========================

    //=========================== News ===========================
    public function news_list() {
        $news = DB::table('news as a')
        ->join('news_category as b', 'a.Category_ID','=','b.RowID')
        ->selectRaw('a.*, b.Name as CategoryName')
        ->orderBy('a.RowID','DESC')->get();

        return view('back.news.list',['news'=>$news]);
    }

    public function news_add() {
        $category = NewsCategory::where('Status',1)->get();
        return view('back.news.add',['category'=>$category]);
    }

    public function news_add_post(Request $request) {
        if ($request->name == '' || $request->description == '' || $request->alias == '') {
            return redirect('admin/news/add')->with(['flash_level'=>'danger','flash_message'=>'Không được để trống các trường có dấu *']);
        }

        $news = new News();
        $news->Name = $request->name;
        $news->Alias = $request->alias;
        $news->Category_ID = $request->category;
        $news->MetaTitle = $request->meta_title;
        $news->MetaDescription = $request->meta_description;
        $news->MetaKeyword = $request->meta_keyword;
        $news->SmallDescription = $request->small_description;
        $news->Description = $request->description;
        $news->Author = Auth::user()->name;

        //Xử lý image
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $random_digit = rand(000000000, 999999999);
            $img_name = $random_digit.'-'.$file->getClientOriginalName();
            $duoi = strtolower($file->getClientOriginalExtension());

            if($duoi != 'png' && $duoi != 'jpg' && $duoi != 'jpeg' && $duoi != 'svg' && $duoi != 'gif') {
                return back()->with(['flash_level'=>'danger', 'flash_message'=>trans('Phần mở rộng của image không được hỗ trợ.')]);
            }

            $file->move('public/images/news', $img_name);
            $img = Image::make('public/images/news/'.$img_name);
            //Kiểm tra nếu không tồn tại thì tạo folder
            $filePath = 'public/images/news/'.date('Ymd');
            if(!file_exists($filePath)) {
                mkdir('public/images/news/'.date('Ymd'), 0777, true);
            }
            $img->fit(350,175);
            $img->save('public/images/news/'.date('Ymd').'/'.$img_name);

            //delete image uploaded
            if(file_exists('public/images/news/'.$img_name)) {
                unlink('public/images/news/'.$img_name);
            }

            $news->Image = date('Ymd').'/'.$img_name;
        }

        $flag = $news->save();

        if ($flag == true) {
            return redirect('admin/news/list')->with(['flash_level'=>'success','flash_message'=>'Thêm tin tức thành công.']);
        } else {
            return redirect('admin/news/add')->with(['flash_level'=>'danger','flash_message'=>'Thêm thất bại!']);
        }
    }

    public function news_edit($id) {
        $news = News::find($id);
        $category = NewsCategory::where('Status',1)->get();
        return view('back.news.edit',compact('news','category'));
    }

    public function news_edit_post(Request $request, $id) {
        if ($request->name == '' || $request->description == '' || $request->alias == '') {
            return redirect('admin/news/edit/'.$id)->with(['flash_level'=>'danger','flash_message'=>'Tên tin tức không được để trống']);
        }

        $news = News::find($id);
        $news->Name = $request->name;
        $news->Alias = $request->alias;
        $news->Status = $request->status;
        $news->Category_ID = $request->category;
        $news->MetaTitle = $request->meta_title;
        $news->MetaDescription = $request->meta_description;
        $news->MetaKeyword = $request->meta_keyword;
        $news->SmallDescription = $request->small_description;
        $news->Description = $request->description;

        //Xử lý image
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $random_digit = rand(000000000, 999999999);
            $img_name = $random_digit.'-'.$file->getClientOriginalName();
            $duoi = strtolower($file->getClientOriginalExtension());

            if ($duoi != 'png' && $duoi != 'jpg' && $duoi != 'jpeg' && $duoi != 'svg' && $duoi != 'gif') {
                return back()->with(['flash_level'=>'danger', 'flash_message'=>trans('Phần mở rộng của image không được hỗ trợ.')]);
            }

            if($news->Image != '') {
                if(file_exists('public/images/news/'.$news->Image)) {
                    unlink('public/images/news/'.$news->Image);
                }
            }

            $file->move('public/images/news', $img_name);
            $img = Image::make('public/images/news/'.$img_name);
            //Kiểm tra nếu không tồn tại thì tạo folder
            $filePath = 'public/images/news/'.date('Ymd');
            if(!file_exists($filePath)) {
                mkdir('public/images/news/'.date('Ymd'), 0777, true);
            }
            $img->fit(300,175);
            $img->save('public/images/news/'.date('Ymd').'/'.$img_name);

            //delete image uploaded
            if(file_exists('public/images/news/'.$img_name)) {
                unlink('public/images/news/'.$img_name);
            }

            $news->Image = date('Ymd').'/'.$img_name;
        }

        $flag = $news->save();

        if ($flag == true) {
            return redirect('admin/news/list')->with(['flash_level'=>'success','flash_message'=>'Update thành công.']);
        } else {
            return redirect('admin/news/edit/'.$id)->with(['flash_level'=>'danger','flash_message'=>'Update không thành công!']);
        }
    }

    public function news_delete($id) {
        $news = News::find($id);
        $flag = $news->delete();

        if ($flag == true) {
            return redirect('admin/news/list')->with(['flash_level'=>'success','flash_message'=>'Xóa thành công.']);
        } else {
            return redirect('admin/news/list')->with(['flash_level'=>'danger','flash_message'=>'Xóa không thành công!']);
        }
    }
    //=========================== News ===========================




}
