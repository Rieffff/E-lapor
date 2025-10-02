<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Complaint;

class AdminComplaintController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $complaints = Complaint::latest()->paginate(20);
        return view('admin.index', compact('complaints'));
    }

    public function show($id)
    {
        $complaint = Complaint::with('responses.user')->findOrFail($id);
        return view('admin.show', compact('complaint'));
    }

    public function changeStatus(Request $request, $id)
    {
        $request->validate(['status'=>'required|in:baru,diproses,selesai']);
        $c = Complaint::findOrFail($id);
        $c->status = $request->status;
        $c->save();
        return back()->with('success','Status diperbarui');
    }
}
