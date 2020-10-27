<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Mail;

use App\Models\Category;
use App\Models\Article;
use App\Models\Page;
use App\Models\Contact;

class Homepage extends Controller
{
    public function __construct() {
        view()->share('pages', Page::orderBy('order', 'ASC')->get());
        view()->share('categories', Category::InrandomOrder()->get());
    }

    public function index() {
        $data['articles'] = Article::orderBy('created_at', 'DESC')->paginate(5);
        $data['pages']=Page::orderBy('order', 'ASC')->get();
        return view('front.homepage', $data);
    }

    public function single($category, $slug) {
        $category = Category::whereSlug($category)->first() ?? abort( 403, 'Böyle bir kategori bulunamadı.');
        $article = Article::whereSlug($slug)->whereCategoryId($category->id)->first() ?? abort(403, 'Böyle bir makale bulunamadı.');
        $article->increment('hit');
        $data['article'] = $article;

        return view('front.single', $data);
    }

    public function category($slug) {
        $category = Category::whereSlug($slug)->first() ?? abort( 403, 'Böyle bir kategori bulunamadı.');
        $data['articles'] = Article::whereCategoryId($category->id)->orderBy('created_at', 'DESC')->get();

        return view('front.category', $data);
    }

    public function page($slug) {
        $page = Page::whereSlug($slug)->first() ?? abort(403, 'Böyle bir sayfa bulunamadı.');
        $data['page'] = $page;
        $data['pages']=Page::orderBy('order', 'ASC')->get();

        return view('front.page', $data);
    }

    public function contact() {
        return view('front.contact');
    }

    public function contactpost(Request $request) {
        $rules = [
            'name'=>'required | min:5',
            'email'=>'required | email',
            'topic'=>'required',
            'message'=>'required',
        ];

        $validate = Validator::make($request->post(), $rules);

        if ($validate->errors()) {
            return redirect()->route('contact')->withErrors($validate)->withInput();
        }

        Mail::send([], [], function ($message) {
            $message->from('selmanbaskaya1@gmail.com', 'Selman Başkaya');
            $message->to('selmanbaskaya1@gmail.com');
            $message->setBody('Bu mail selman tarafından gönderildi <br />', 'text/html');
            $message->subject('Laravel Blog');
        });

        return redirect()->route('contact')->with('success', 'Mesajınız iletildi');
    }
}
