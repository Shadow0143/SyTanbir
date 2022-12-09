<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Contacts;
use App\Models\Notices;
use RealRashid\SweetAlert\Facades\Alert;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function allContacts()
    {
        $contacts = Contacts::orderBy('id', 'desc')->get();
        return view('backend.contacts', compact('contacts'));
    }

    public function deleteContacts(Request $request)
    {
        $delete = Contacts::find($request->id);
        $delete->delete();
    }

    public function notice()
    {
        $notice = Notices::orderBy('id', 'desc')->get();
        return view('backend.notices', compact('notice'));
    }

    public function submitNotice(Request $request)
    {

        if (!empty($request->id)) {
            $category =  Notices::find($request->cat_id);
            $category->notice = $request->notice;
            $category->save();
            toast('Notice Updated', 'success');
        } else {
            $category = new Notices();
            $category->notice = $request->notice;
            $category->created_by = Auth::user()->id;
            $category->save();
            toast('Notice added', 'success');
        }

        return back();
    }

    public function editNotice(Request $request)
    {
        $notice = Notices::find($request->id);
        return $notice;
    }
    public function deleteNotice(Request $request)
    {
        $notice = Notices::find($request->id);
        $notice->delete();
        return $notice;
    }
}