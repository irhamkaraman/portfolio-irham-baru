<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function index()
    {
        $user = User::find(1);
        $blogs = Blog::latest()->get()->map(function ($blog) {
            $description = $blog->description;
            $words = explode(' ', $description);
            $blog->description = implode(' ', array_slice($words, 0, 5));
            return $blog;
        });
        return view('app.blog.index', compact('user', 'blogs'));
    }

    public function add()
    {
        $user = User::find(1);
        return view('app.blog.add', compact('user'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'image' => 'required|mimes:png,jpg,jpeg|max:1024|dimensions:ratio=3/2',
                'title' => 'required|max:50',
                'description' => 'required|max:200',
                'content' => 'required',
                'published_at' => 'required',
            ]);

            $imageName = Carbon::now()->timestamp . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('public/blogs', $imageName);

            $slug = str_replace(' ', '-', $request->title);

            $blog = new Blog();
            $blog->image = $imageName;
            $blog->title = $request->title;
            $blog->slug = $slug;
            $blog->description = $request->description;
            $blog->content = $request->content;
            $blog->published_at = $request->published_at;
            $blog->save();

            return redirect()->route('blog')->with('success', 'Blog berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function edit($id)
    {
        $user = User::find(1);
        $blog = Blog::find($id);
        return view('app.blog.edit', compact('blog', 'user'));
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'image' => 'mimes:png,jpg,jpeg|max:1024|dimensions:ratio=3/2',
                'title' => 'required|max:50',
                'description' => 'required|max:200',
                'content' => 'required',
                'published_at' => 'required',
            ]);

            $slug = str_replace(' ', '-', $request->title);

            $blog = Blog::find($id);
            $blog->title = $request->title;
            $blog->slug = $slug;
            $blog->description = $request->description;
            $blog->content = $request->content;
            $blog->published_at = $request->published_at;
            if ($request->hasFile('image')) {
                if ($blog->image) {
                    Storage::delete('public/blogs/' . $blog->image);
                }
                $imageName = Carbon::now()->timestamp . '.' . $request->file('image')->getClientOriginalExtension();
                $request->file('image')->storeAs('public/blogs', $imageName);
                $blog->image = $imageName;
            }
            $blog->save();

            return redirect()->route('blog')->with('success', 'Blog berhasil diperbarui');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function delete($id)
    {
        $blog = Blog::find($id);
        if ($blog->image) {
            Storage::delete('public/blogs/' . $blog->image);
        }
        $blog->delete();
        return redirect()->back()->with('success', 'Blog berhasil dihapus');
    }

}
