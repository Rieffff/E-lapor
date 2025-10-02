<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Complaint;
use App\Models\Response;
use Illuminate\Routing\Controller; // add this if not present
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
    public function makeResponse(Request $request, $complaintId)
    {
        $request->validate([
            'response' => 'required|string'
        ]);

        // Cari complaint
        $complaint = Complaint::findOrFail($complaintId);

        // Simpan balasan ke tabel responses
        Response::create([
            'complaint_id' => $complaint->id,
            'user_id'      => Auth::id(), // admin yang login
            'response'     => $request->response,
        ]);

        // Update status complaint menjadi responded
        $complaint->update(['status' => 'selesai']);

        return redirect()->back()->with('success', 'Balasan berhasil dikirim.');
       
    }
}
