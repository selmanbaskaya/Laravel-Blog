<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Article;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::all();
        return view('back.categories.index', compact('categories'));
    }

    public function switchStatus(Request $request) {
        $category = Category::findOrFail($request->id);
        $category->status = $request->status=="true" ? 1 : 0;
        $category->save();
    }

    public function getData(Request $request) {
        $category = Category::findOrFail($request->id);
        return response()->json($category);
    }

    public function create(Request $request) {
        $isExist = Category::whereSlug(str_slug($request->category))->first();

        if ($isExist) {
            toastr()->error($request->category . ' adında kategori zaten mevcut.');
            return redirect()->back();
        }

        $category = new Category();
        $category->name = $request->category;
        $category->slug = str_slug($request->category);
        $category->save();
        toastr()->success('Kategori başarılı bir şekilde eklendi');
        return redirect()->back();
    }

    public function update(Request $request) {
        $isSlug = Category::whereSlug(str_slug($request->slug))->whereNotIn('id', [$request->id])->first();
        $isName = Category::whereName(($request->category))->whereNotIn('id', [$request->id])->first();

        if ($isSlug or $isName) {
            toastr()->error($request->category . ' adında kategori zaten mevcut.');
            return redirect()->back();
        }

        $category = Category::find($request->id);
        $category->name = $request->category;
        $category->slug = str_slug($request->slug);
        $category->save();
        toastr()->success('Kategori başarılı bir şekilde güncellendi');
        return redirect()->back();
    }

    public function delete(Request $request) {
        $category = Category::findOrFail($request->id);
        if ($category->articleCount() > 0) {
            Article::where('category_id', $category->id)->update(['category_id'=>1]);
        }
        $category->delete();
        toastr()->success('Kategori başarılı bir şekilde silindi. ' . $category->articleCount() . ' makalenin yeni kategorisi `Genel` oldu!');
        return redirect()->back();
    }
}
