<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\User;
use App\Models\Categories;
use App\Models\UserDetails;
use App\Models\Blogs;
use App\Models\Gallaries;
use Image;


class MainController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function categorieList()
    {
        $category = Categories::orderBy('id', 'desc')->get();
        return view('backend.categorie', compact('category'));
    }
    public function submitCategory(Request $request)
    {
        if (!empty($request->cat_id)) {
            $category =  Categories::find($request->cat_id);
            $category->category_name = $request->cat_name;
            $category->save();
            toast('Category Updated', 'success');
        } else {
            $category = new Categories();
            $category->category_name = $request->cat_name;
            $category->created_by = Auth::user()->id;
            $category->save();
            toast('Category added', 'success');
        }

        return back();
    }

    public function editCategorieList(Request $request)
    {
        $categories = Categories::find($request->id);
        return $categories;
    }
    public function deleteCategorieList(Request $request)
    {
        $categories = Categories::find($request->id);
        $categories->delete();
        return $categories;
    }

    public function profile()
    {
        $cat = Categories::where('id', Auth::user()->user_category)->first();
        $user = User::where('id', Auth::user()->id)->first();
        $userDetail = UserDetails::where('user_id', Auth::user()->id)->first();
        return view('frontend.profile', compact('cat', 'user', 'userDetail'));
    }

    public function submitProfile(Request $request)
    {
        $check = UserDetails::where('user_id', $request->user_id)->first();
        if (!empty($check)) {
            $user_details = UserDetails::where('user_id', $check->user_id)->first();
        } else {
            $user_details = new UserDetails();
            $user_details->user_id = Auth::user()->id;
        }

        if (!empty($request->birthday)) {
            $user_details->dob = $request->birthday;
        }
        if (!empty($request->gender)) {
            $user_details->gender = $request->gender;
        }
        if (!empty($request->eye)) {
            $user_details->eye_color = $request->eye;
        }
        if (!empty($request->hair)) {
            $user_details->hair_color = $request->hair;
        }
        if (!empty($request->bust)) {
            $user_details->bust = $request->bust;
        }
        if (!empty($request->hip)) {
            $user_details->hip = $request->hip;
        }
        if (!empty($request->waist)) {
            $user_details->waist = $request->waist;
        }
        if (!empty($request->dress)) {
            $user_details->dress = $request->dress;
        }
        if (!empty($request->shoes)) {
            $user_details->shoes = $request->shoes;
        }
        if (!empty($request->tatoos)) {
            $user_details->tatoo = $request->tatoos;
        }
        if (!empty($request->chest)) {
            $user_details->chest = $request->chest;
        }
        if (!empty($request->height)) {
            $user_details->height = $request->height;
        }
        if (!empty($request->fb)) {
            $user_details->fb = $request->fb;
        }
        if (!empty($request->instagram)) {
            $user_details->insta = $request->instagram;
        }
        if (!empty($request->twitter)) {
            $user_details->twitter = $request->twitter;
        }
        if (!empty($request->experience)) {
            $user_details->experience = $request->experience;
        }
        if (!empty($request->city)) {
            $user_details->city = $request->city;
        }
        if (!empty($request->state)) {
            $user_details->state = $request->state;
        }
        if (!empty($request->country)) {
            $user_details->country = $request->country;
        }
        if (!empty($request->pin)) {
            $user_details->zip_code = $request->pin;
        }
        if (!empty($request->organisation_name)) {
            $user_details->organization_name = $request->organisation_name;
        }
        if (!empty($request->organisation_est_date)) {
            $user_details->organization_est_date = $request->organisation_est_date;
        }
        if (!empty($request->company_type)) {
            $user_details->company_type = $request->company_type;
        }

        if (!empty($request->file('company_img'))) {
            $companyImage                     = $request->file('company_img');
            $Imagename                      = $request->organisation_name . time() . '-CompanyLogo' . '.' . $companyImage->getClientOriginalExtension();
            $result                         = public_path('company_logo');
            $companyImage->move($result, $Imagename);
            $user_details->company_image                   = $Imagename;
        }
        if (!empty($request->aboutme)) {

            $user_details->your_self     = $request->aboutme;
        }
        $user_details->created_by = Auth::user()->id;
        $user_details->created_at = date('Y-m-d H:i:s');
        $user_details->updated_at = date('Y-m-d H:i:s');
        $user_details->Save();


        $user = User::find($request->user_id);
        $user->name =  $request->name;
        $user->email =  $request->email;
        if (!empty($request->file('image'))) {
            $profilePic                     = $request->file('image');
            $Imagename                      = $request->name . time() . '-ProfilePic' . '.' . $profilePic->getClientOriginalExtension();
            $result                         = public_path('profile_pics');
            $profilePic->move($result, $Imagename);
            $user->profile_pic                   = $Imagename;
        }
        if (!empty($request->phone)) {

            $user->phone_no =  $request->phone;
        }
        $user->save();


        toast('Profile Update', 'success');
        return redirect('/');
    }

    public function myBlogs()
    {
        $blogs = Blogs::select('blogs.*', 'users.name')->leftjoin('users', 'users.id', '=', 'blogs.created_by')->where('blogs.created_by', Auth::user()->id)->orderBy('blogs.id', 'desc')->get();
        return view('frontend.myBlogs', compact('blogs'));
    }

    public function addMyBlogs()

    {
        $category = Categories::get();
        return view('frontend.addMyBlogList', compact('category'));
    }

    public function submitMyBlogs(Request $request)
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

        return redirect()->route('myBlogs');
    }

    public function editMyBlogs($id)
    {
        $cms = Blogs::where('id', $id)->first();
        $category = Categories::get();

        return view('frontend.addMyBlogList', compact('cms', 'category'));
    }

    public function deleteMyBlogs(Request $request)
    {
        // dd($request->all());
        $delete = Blogs::find($request->id);
        $delete->delete();
    }

    public function myGallary()
    {
        $category = Categories::get();
        $mygallary = Gallaries::select('gallaries.*', 'category.category_name')->leftjoin('category', 'category.id', '=', 'gallaries.category')->where('gallaries.created_by', Auth::user()->id)->where('glary_type', 'image')->get();
        $remain = 15 - count($mygallary);
        return view('frontend.myGallary', compact('category', 'mygallary', 'remain'));
    }


    public function submitMyGallary(Request $request)
    {
        // dd($request->all());
        $gallary = new Gallaries();
        $image = $request->file('image');
        if (!empty($image)) {
            $input['imagename'] = Auth::user()->name . '-gallaryImage-' . time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/gallary');
            $img = Image::make($image->getRealPath());
            $img->resize(500, 600, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . '/' . $input['imagename']);
            $gallary->gallary = $input['imagename'];
        }
        $gallary->category = $request->category;
        $gallary->glary_type = 'image';
        $gallary->created_by = Auth::user()->id;
        $gallary->status = '0';
        $gallary->save();

        Alert::success('Success', 'Image is added');
        return back();
    }

    public function deleteMyGallary(Request $request)
    {
        $delete = Gallaries::find($request->id);
        $delete->delete();
    }


    public function myVideo()
    {

        $category = Categories::get();
        $mygallary = Gallaries::select('gallaries.*', 'category.category_name')->leftjoin('category', 'category.id', '=', 'gallaries.category')->where('gallaries.created_by', Auth::user()->id)->where('glary_type', 'video')->get();
        $remain = 2 - count($mygallary);
        return view('frontend.myVideos', compact('category', 'mygallary', 'remain'));
    }


    public function submitMyVideo(Request $request)
    {
        // dd($request->all());
        $gallary = new Gallaries();
        $image = $request->file('image');
        if (!empty($image)) {
            $file = $request->file('image');
            $filename =  Auth::user()->name . '-gallaryVideo-' . time() . '.' . $file->getClientOriginalName();
            $path = public_path() . '/gallary/';
            $file->move($path, $filename);
            $gallary->gallary = $filename;
        }
        $gallary->category = $request->category;
        $gallary->glary_type = 'video';
        $gallary->created_by = Auth::user()->id;
        $gallary->status = '0';
        $gallary->save();
        Alert::success('Success', 'Video is added');
        return back();
    }

    public function deleteMyVideo(Request $request)
    {
        $delete = Gallaries::find($request->id);
        $delete->delete();
    }
}
