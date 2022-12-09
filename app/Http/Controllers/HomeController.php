<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\UserDetails;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use App\Models\ExtraImages;
use App\Models\Gallaries;
use App\Models\Leads;
use Image;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $category = Categories::orderBy('id', 'desc')->get();
        return view('home', compact('category'));
    }

    public function categoryRecords($id)
    {
        $cat = Categories::find($id);
        $userdetails = User::leftjoin('user_details', 'user_details.user_id', 'users.id')->where('user_category', $id)->where('role', 1)->get();
        return view('backend.categoryrecords', compact('userdetails', 'cat'));
    }

    public function approveCategoryRecords($id, $status)
    {
        $approve = UserDetails::where('user_id', $id)->update(['status' => $status]);
        toast('Approved', 'sucess');
        return back();
    }

    public function addNewCategoryRecord($cat)
    {
        $cat = Categories::find($cat);
        return view('backend.addNewategoryRecord', compact('cat'));
    }

    public function submitNewCategoryRecord(Request $request)
    {
        // dd($request->all());

        if ($request->category == '8' || $request->category == '6') {
            $user = new User();
            $user->user_category = $request->category;
            $user->name = $request->organization_name;
            $user->email = $request->organization_name . '@gmail.com';
            $user->password = Hash::make('password');
            $user->role = '1';
            $user->save();
        } else {
            $user = new User();
            $user->user_category = $request->category;
            $user->name = $request->user_name;
            $user->email = $request->user_email;
            if (!empty($request->file('user_profile'))) {
                $profilePic                     = $request->file('user_profile');
                $Imagename                      = $request->name . time() . '-ProfilePic' . '.' . $profilePic->getClientOriginalExtension();
                $result                         = public_path('profile_pics');
                $profilePic->move($result, $Imagename);
                $user->profile_pic                   = $Imagename;
            }

            $user->phone_no = $request->phone_no;
            $user->password = Hash::make('password');
            $user->role = '1';
            $user->save();
        }


        $user_details = new UserDetails();
        $user_details->user_id = $user->id;
        if (!empty($request->dob)) {
            $user_details->dob = $request->dob;
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
            $user_details->tatoo = $request->tatoo;
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
        if (!empty($request->insta)) {
            $user_details->insta = $request->insta;
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
        if (!empty($request->organization_name)) {
            $user_details->organization_name = $request->organization_name;
        }
        if (!empty($request->organization_est_date)) {
            $user_details->organization_est_date = $request->organization_est_date;
        }
        if (!empty($request->company_type)) {
            $user_details->company_type = $request->company_type;
        }

        if (!empty($request->file('company_image'))) {
            $companyImage                     = $request->file('company_image');
            $Imagename                      = $request->organisation_name . time() . '-CompanyLogo' . '.' . $companyImage->getClientOriginalExtension();
            $result                         = public_path('company_logo');
            $companyImage->move($result, $Imagename);
            $user_details->company_image                   = $Imagename;
        }
        if (!empty($request->description)) {

            $user_details->your_self     = $request->description;
        }
        $user_details->created_by = Auth::user()->id;
        $user_details->created_at = date('Y-m-d H:i:s');
        $user_details->updated_at = date('Y-m-d H:i:s');
        $user_details->Save();

        $slider_image_array = $request->extraImage;

        if (!empty($slider_image_array)) {
            for ($i = 0; $i < count($slider_image_array); $i++) {
                $image_slider = $slider_image_array[$i];
                $input2['imagename'] = $request->user_name . time() . rand(000, 5000) . '.' . $image_slider->getClientOriginalExtension();
                $destinationPath_slider = public_path('/extraImages');
                $img2 = Image::make($slider_image_array[$i]->getRealPath());
                $img2->resize(500, 600, function ($constraint2) {
                    $constraint2->aspectRatio();
                })->save($destinationPath_slider . '/' . $input2['imagename']);

                $exhibitionImage = new ExtraImages();
                $exhibitionImage->Image_name  = $input2['imagename'];
                $exhibitionImage->category = $request->category;
                $exhibitionImage->created_by = Auth::user()->id;
                $exhibitionImage->user_id = $user->id;
                $exhibitionImage->save();
            }
        }

        toast('New Profile is added');
        return redirect()->route('categoryRecords', ['id' => $request->category]);
    }

    public function allGallary()
    {
        $category = Categories::get();
        $gallary = Gallaries::select('gallaries.*', 'category.category_name')->leftjoin('category', 'category.id', '=', 'gallaries.category')->orderBy('id', 'desc')->where('gallaries.glary_type', 'image')->get();
        return view('backend.allGallary', compact('gallary', 'category'));
    }

    public function allVideos()
    {
        $category = Categories::get();
        $gallary = Gallaries::select('gallaries.*', 'category.category_name')->leftjoin('category', 'category.id', '=', 'gallaries.category')->orderBy('id', 'desc')->where('gallaries.glary_type', 'video')->get();
        return view('backend.allVideos', compact('gallary', 'category'));
    }

    public function allGallaryApprove($id, $status)
    {
        $gallary = Gallaries::find($id);
        $gallary->status = $status;
        $gallary->save();
        return back();
    }

    public function allLeads()
    {
        $leads = Leads::orderBy('id', 'desc')->get();
        return view('backend.leads', compact('leads'));
    }
    public function deleteLeads(Request $request)
    {
        $delete = Leads::find($request->id);
        $delete->delete();
    }

    public function subAdmin()
    {
        $subadmin = User::where('role', '2')->orderBy('id', 'desc')->get();
        return view('backend.subAdmin', compact('subadmin'));
    }

    public function submitSubAdmin(Request $request)
    {
        // dd($request->all());
        if (!empty($request->id)) {
            $user = User::find($request->id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone_no = $request->phone;
            $user->password =  Hash::make($request->password);
            $user->save();
            Alert::success('Sub Admin updated');
        } else {
            $exist = User::where('email', $request->email)->first();
            if ($exist) {
                Alert::error('This Email already in use');
            } else {
                $user = new User();
                $user->user_category = '0';
                $user->name = $request->name;
                $user->email = $request->email;
                $user->phone_no = $request->phone;
                $user->role = '2';
                if (empty($request->password)) {
                    $user->password =  Hash::make('password');
                } else {
                    $user->password =  Hash::make($request->password);
                }
                $user->save();
                Alert::success('Sub Admin added');
            }
        }

        return back();
    }

    public function editSubAdmin(Request $request)
    {
        $user = User::find($request->id);
        return $user;
    }
    public function deleteSubAdmin(Request $request)
    {
        $user = User::find($request->id);
        $user->delete();
    }
}