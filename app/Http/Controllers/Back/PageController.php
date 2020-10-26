<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use Illuminate\Support\Str;
use Illuminate\Support\Facedes\File;

class PageController extends Controller
{
    public function index() {
        $pages = Page::all();
        return view('back.pages.index', compact('pages'));
    }

    public function orders(Request $request) {
        foreach ($request->get('page') as $key => $order) {
            Page::where('id', $order)->update(['order'=>$key]);
        }
    }

    public function create() {
        return view('back.pages.create');
    }

    public function update($id) {
        $page = Page::findOrFail($id);
        return view('back.pages.update', compact('page'));
    }

    public function updatePost(Request $request, $id)
    {
        $request->validate([
            'title' => 'min:3',
            'image' => 'image'
        ]);

        $page = Page::findOrFail($id);
        $page->title = $request->title;
        $page->content = $request->artContent;
        $page->slug = Str::slug($request->title);

        $page->save();
        toastr()->success('Başarılı', 'Sayfa başarılı bir şekilde güncellendi');
        return redirect()->route('admin.page.index');
    }

    public function  delete($id) {
        $page = Page::find($id);

        $page->delete();
        toastr()->success('Sayfa silme işlemi başarılı bir şekilde gerçekleşti');
        return redirect()->route('admin.page.index');
    }

    public function post(Request $request) {
        $request->validate([
            'title' => 'min:3',
            'image' => 'required | image'
        ]);

        $last = Page::orderBy('order', 'DESC')->first();

        $page = new Page();
        $page->title = $request->title;
        $page->content = $request->artContent;
        $page->order = $last->order+1;
        $page->slug = Str::slug($request->title);
        if ($request->hasFile('image')) {
            $imageName = Str::slug($request->title). '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('upload'), $imageName);

            $page->image = asset('upload/') . '/' .$imageName;
        }

        $page->save();
        toastr()->success('Başarılı', 'Sayfa başarılı bir şekilde oluşturuldu');
        return redirect()->route('admin.page.index');
    }

    public function switchStatus(Request $request) {
        $page = Page::findOrFail($request->id);
        $page->status = $request->status=="true" ? 1 : 0;
        $page->save();
    }
}
