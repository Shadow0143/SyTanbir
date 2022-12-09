<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Categories;
use App\Models\User;
use App\Models\UserDetails;
use App\Models\Testimonial;
use App\Models\Contacts;
use App\Models\Blogs;
use App\Models\Gallaries;
use App\Models\Leads;
use App\Mail\LeadMail;
use App\Mail\ContactMail;
use App\Models\BlogComment;
use App\Models\Notices;
use App\Models\ReadNotice;
use App\Models\ExtraImages;
use Illuminate\Support\Facades\Mail;


use RealRashid\SweetAlert\Facades\Alert;

class WelcomeController extends Controller
{
    public function newRegister()
    {
        $category = Categories::orderBy('id', 'desc')->get();
        return view('auth.register', compact('category'));
    }

    public function welcome()
    {
        $blogs = Blogs::select('blogs.*', 'users.name')->leftjoin('category', 'category.id', '=', 'blogs.id')->leftjoin('users', 'users.id', '=', 'blogs.created_by')->where('blogs.status', '1')->orderBy('blogs.id', 'desc')->take(2)->get();
        $testimonial = Testimonial::where('status', '1')->get();

        $category = Categories::orderBy('id', 'desc')->get();
        $userdetails = User::leftjoin('user_details', 'user_details.user_id', 'users.id')->where('role', 1)->where('user_details.status', '1')->orderBy('user_details.id', 'desc')->take(2)->get();
        foreach ($userdetails as $key => $val) {
            $cat = Categories::where('id', $val->user_category)->first();
            $userdetails[$key]->category = $cat;
        }
        return view('frontend.welcome', compact('testimonial', 'blogs', 'userdetails'));
    }

    public function aboutUs()
    {
        return view('frontend.aboutUs');
    }

    public function gallary()
    {
        $category = Categories::get();
        $gallary = Gallaries::select('gallaries.*', 'users.name', 'category.category_name')->leftjoin('users', 'users.id', '=', 'gallaries.created_by')->leftjoin('category', 'category.id', '=', 'gallaries.category')->where('gallaries.status', '1')->orderBy('gallaries.id', 'desc')->get();
        return view('frontend.gallary', compact('category', 'gallary'));
    }

    public function categorie()
    {
        $category = Categories::orderBy('id', 'desc')->get();
        $userdetails = User::leftjoin('user_details', 'user_details.user_id', 'users.id')->where('role', 1)->where('user_details.status', '1')->get();
        foreach ($userdetails as $key => $val) {
            $cat = Categories::where('id', $val->user_category)->first();
            $userdetails[$key]->category = $cat;
        }

        // dd($userdetails);
        return view('frontend.categorie', compact('category', 'userdetails'));
    }

    public function blogs()
    {
        $category = Categories::get();
        $blogs = Blogs::select('blogs.*', 'users.name')->leftjoin('category', 'category.id', '=', 'blogs.id')->leftjoin('users', 'users.id', '=', 'blogs.created_by')->where('blogs.status', '1')->get();

        // dd($blogs);

        return view('frontend.blogs', compact('blogs', 'category'));
    }

    public function contactUs()
    {
        return view('frontend.contactUs');
    }

    public function submitContactUs(Request $request)
    {
        // dd($request->all());
        $contact = new Contacts();
        $contact->first_name  = $request->fastname;
        $contact->last_name  = $request->lastname;
        $contact->email  = $request->email;
        $contact->phone_no  = $request->phone;
        $contact->message  = $request->message;
        $contact->save();
        Alert::success('Thank you for contacting us.');

        $details = [
            'title' => 'New Contact',
            'body' => $request->fastname . ' ' . $request->lastname . ' ' . 'wants to contact us, Please have a look on his/her message and contact him/her on ' . 'Mobile no : ' . $request->phone . ' ' . 'or Email :' . ' ' . $request->email
        ];
        Mail::to('sytanbir1316@gmail.com')->send(new \App\Mail\ContactMail($details));

        return back();
    }

    public function categorieFilter(Request $request)
    {
        $userdetails = User::leftjoin('user_details', 'user_details.user_id', 'users.id')->where('role', 1)->where('user_details.status', '1')->where('users.user_category', $request->category_id)->get();
        foreach ($userdetails as $key => $val) {
            $cat = Categories::where('id', $val->user_category)->first();
            $userdetails[$key]->category = $cat;
        }
        return view('frontend.filterCategory', compact(['userdetails']));
    }

    public function blogsFilter(Request $request)
    {
        $blogs = Blogs::select('blogs.*', 'users.name')->leftjoin('category', 'category.id', '=', 'blogs.id')->leftjoin('users', 'users.id', '=', 'blogs.created_by')->where('blogs.status', '1')->where('category', $request->category_id)->get();
        return view('frontend.blogsfilter', compact('blogs'));
    }

    public function blogSearch(Request $request)
    {
        $blogs = Blogs::select('blogs.*', 'users.name')->leftjoin('category', 'category.id', '=', 'blogs.id')->leftjoin('users', 'users.id', '=', 'blogs.created_by')->where('blogs.status', '1')->where('title', 'like', '%' . $request->title . '%')->get();
        return view('frontend.blogsfilter', compact('blogs'));
    }

    public function gallaryFilter(Request $request)
    {
        $gallary = Gallaries::select('gallaries.*', 'users.name', 'category.category_name')->leftjoin('users', 'users.id', '=', 'gallaries.created_by')->leftjoin('category', 'category.id', '=', 'gallaries.category')->where('gallaries.category', $request->category_id)->where('gallaries.status', '1')->get();

        return view('frontend.filtergallary', compact('gallary'));
    }

    public function submitLeads(Request $request)
    {
        $leads = new Leads();
        $leads->leads = $request->leademail;
        $leads->save();
        Alert::success('Thank you for subscribing us');

        $details = [
            'title' => 'Mail from ItSolutionStuff.com',
            'body' => 'This is for testing email using smtp'
        ];
        Mail::to($request->leademail)->send(new \App\Mail\LeadMail($details));


        return back();
    }

    public function categorieSearch(Request $request)
    {
        $userdetails = User::leftjoin('user_details', 'user_details.user_id', 'users.id')->where('role', 1)->where('user_details.status', '1')->where('users.name', 'like', '%' . $request->name . '%')->get();
        foreach ($userdetails as $key => $val) {
            $cat = Categories::where('id', $val->user_category)->first();
            $userdetails[$key]->category = $cat;
        }
        return view('frontend.filterCategory', compact(['userdetails']));
    }

    public function notifications()
    {
        $notice = Notices::orderBy('notices.id', 'desc')->get();

        foreach ($notice as $key => $val) {
            $aray = explode(',', $val->read_user);
            $check = in_array(Auth::user()->id, $aray);
            if ($check === true) {
                $notice[$key]->read = 'read';
            } else {
                $notice[$key]->read = 'unread';
            }
        }

        return view('frontend.notifications', compact('notice'));
    }

    public function readNotifications($id)
    {
        $read = Notices::find($id);
        $exist = $read->read_user;
        $read->read_user = $exist . ',' . Auth::user()->id;
        $read->save();

        $read = new ReadNotice();
        $read->notice_id = $id;
        $read->user_id = Auth::user()->id;
        $read->save();
        Alert::success('Read');
        return back();
    }

    public function  categorieDetails($id)
    {
        $userdetails = User::leftjoin('user_details', 'user_details.user_id', 'users.id')->where('role', 1)->where('user_details.status', '1')->where('user_details.id', $id)->first();

        $allImages = ExtraImages::where('category', $id)->get();
        return view('frontend.categoryDetails', compact(['userdetails', 'allImages']));
    }

    public function blogsDetails($id)
    {
        $letestblogs = Blogs::select('blogs.*', 'users.name', 'category.category_name')->leftjoin('category', 'category.id', '=', 'blogs.id')->leftjoin('users', 'users.id', '=', 'blogs.created_by')->where('blogs.status', '1')->take(10)->get();

        $blog = Blogs::select('blogs.*', 'users.name', 'category.category_name')->leftjoin('category', 'category.id', '=', 'blogs.id')->leftjoin('users', 'users.id', '=', 'blogs.created_by')->where('blogs.status', '1')->where('blogs.id', $id)->first();


        $latestcomment = BlogComment::where('blog_id', $id)->get();

        return view('frontend.blogDetails', compact('blog', 'letestblogs', 'latestcomment'));
    }

    public function submitBlogComment(Request $request)
    {
        $newcomment = new BlogComment();
        $newcomment->blog_id = $request->blog_id;
        $newcomment->name = $request->name;
        $newcomment->email = $request->email;
        $newcomment->comment = $request->message;
        $newcomment->save();

        $latestcomment = BlogComment::find($newcomment->id);

        $newcommentshow = '<div class="col-9"><p><strong>' . ucfirst($latestcomment->name) . '</strong><br><span>' . $latestcomment->comment . '</span></p></div><div class="col-3"><p>' . $latestcomment->created_at->diffForHumans() . '</p></div></div><hr>';

        return $newcommentshow;
    }
}
