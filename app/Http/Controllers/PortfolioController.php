<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Portfolio;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PortfolioController extends Controller
{
    public function index()
    {
        $user = User::find(1);
        $portfolios = Portfolio::latest()->get();
        return view('app.portfolio.index', compact('user', 'portfolios'));
    }

    public function add()
    {
        $user = User::find(1);
        $categories = Category::latest()->get();
        return view('app.portfolio.portfolioAdd', compact('user', 'categories'));
    }

    public function store(Request $request)
    {
        try {

            $request->validate([
                'title' => 'required',
                'image' => 'required|mimes:png,jpg,jpeg',
                'image' => 'required|mimes:png,jpg,jpeg|dimensions:ratio=4/3',
                'category' => 'required',
                'url' => 'required|url',
            ]);

            $portfolio = new Portfolio();
            $portfolio->title = $request->title;
            $portfolio->url = $request->url;
            $portfolio->category_id = $request->category;

            if ($request->hasFile('image')) {
                $imageName = Carbon::now()->timestamp . '.' . $request->file('image')->getClientOriginalExtension();
                $request->file('image')->storeAs('public/portfolio', $imageName);
                $portfolio->image = $imageName;
            }

            $portfolio->save();

            return redirect()->route('portfolio')->with('success', 'Data portfolio berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function edit($id)
    {
        $user = User::find(1);
        $portfolio = Portfolio::find($id);
        $categories = Category::latest()->get();
        return view('app.portfolio.portfolioEdit', compact('user', 'portfolio', 'categories'));
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'title' => 'required',
                'image' => 'mimes:png,jpg,jpeg',
                'image' => 'mimes:png,jpg,jpeg|dimensions:ratio=4/3',
                'category' => 'required',
                'url' => 'required|url',
            ]);

            $portfolio = Portfolio::find($id);
            $portfolio->title = $request->title;
            $portfolio->url = $request->url;
            $portfolio->category_id = $request->category;

            if ($request->hasFile('image')) {
                if ($portfolio->image) {
                    Storage::delete('public/portfolio/' . $portfolio->image);
                }
                $imageName = Carbon::now()->timestamp . '.' . $request->file('image')->getClientOriginalExtension();
                $request->file('image')->storeAs('public/portfolio', $imageName);
                $portfolio->image = $imageName;
            }

            $portfolio->save();
            return redirect()->route('portfolio')->with('success', 'Data portfolio berhasil diupdate');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function delete($id)
    {
        $portfolio = Portfolio::find($id);
        if ($portfolio->image) {
            Storage::delete('public/portfolio/' . $portfolio->image);
        }
        $portfolio->delete();
        return redirect()->back()->with('success', 'Data portfolio berhasil dihapus');
    }


    // Kategori
    public function category()
    {
        $user = User::find(1);
        $categories = Category::latest()->get();
        return view('app.portfolio.category', compact('user', 'categories'));
    }

    public function categoryAdd()
    {
        $user = User::find(1);
        return view('app.portfolio.categoryAdd', compact('user'));
    }

    public function categoryStore(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
            ]);

            $slug = Str::slug($request->name);

            $category = new Category();
            $category->name = $request->name;
            $category->slug = $slug;
            $category->save();

            return redirect()->route('category')->with('success', 'Data kategori berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function categoryEdit($id)
    {
        $user = User::find(1);
        $category = Category::find($id);
        return view('app.portfolio.categoryEdit', compact('user', 'category'));
    }

    public function categoryUpdate(Request $request, $id)
    {
        try {
            $request->validate([
                'name' => 'required',
            ]);

            $slug = Str::slug($request->name);

            $category = Category::find($id);
            $category->name = $request->name;
            $category->slug = $slug;
            $category->save();

            return redirect()->route('category')->with('success', 'Data kategori berhasil diupdate');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function categoryDelete($id)
    {
        $category = Category::find($id);
        $category->delete();

        $portfolio = Portfolio::where('category_id', $id);
        if ($portfolio->count() > 0) {
            foreach ($portfolio as $item) {
                if ($item->image) {
                    Storage::delete('public/portfolio/' . $item->image);
                }
                $item->delete();
            }
        }

        return redirect()->route('category')->with('success', 'Data kategori berhasil dihapus');
    }
}
