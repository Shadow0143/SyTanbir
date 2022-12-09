<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Blogs;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Categories;


class BlogsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function blogList()
    {
        $cms = Blogs::orderBy('id', 'desc')->get();
        return view('backend.blogList', compact('cms'));
    }

    public function addBlog()

    {
        $category = Categories::get();
        // dd($category);
        return view('backend.addBlogList', compact('category'));
    }

    public function submitBlog(Request $request)
    {
        // dd($request->all());
        if (!empty($request->id)) {
            $users =  Blogs::find($request->id);
            $users->title = $request->title;
            $users->sub_title = $request->sub_title;
            $users->category = $request->category;
            $users->description = $request->description;
            if (!empty($request->file('user_image'))) {
                $testimonial = $request->file('user_image');
                $testimonialphoto = 'blogs-' . rand(000, 999) . '.' .
                    $testimonial->getClientOriginalExtension();
                $result = public_path('blogs');
                $testimonial->move($result, $testimonialphoto);
                $users->image  = $testimonialphoto;
            }
            $users->status = $request->changestatus;
            $users->save();
            Alert::success('Success', 'Blogs updated !');
        } else {

            $validated = $request->validate([
                'title' => 'required',
                'sub_title' => 'required',
                'user_image' => 'required',
                'description' => 'required',
                'category' => 'required',
            ]);
            $users = new Blogs();
            $users->created_by = Auth::user()->id;
            $users->title = $request->title;
            $users->sub_title = $request->sub_title;
            $users->description = $request->description;
            $users->category = $request->category;
            if (!empty($request->file('user_image'))) {
                $testimonial = $request->file('user_image');
                $testimonialphoto = 'blogs-' . rand(000, 999) . '.' .
                    $testimonial->getClientOriginalExtension();
                $result = public_path('blogs');
                $testimonial->move($result, $testimonialphoto);
                $users->image  = $testimonialphoto;
            }
            $users->status = '0';

            $users->save();
            Alert::success('Success', 'Blogs added !');
        }

        return redirect()->route('blogList');
    }

    public function editBlog($id)
    {
        $cms = Blogs::where('id', $id)->first();
        $category = Categories::get();

        return view('backend.addBlogList', compact('cms', 'category'));
    }

    public function deleteBlog(Request $request)
    {
        $delete = Blogs::find($request->id);
        $delete->delete();
    }
}
