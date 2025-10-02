<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Complaint;
use App\Models\Response as Resp;
use Illuminate\Support\Facades\Auth;

class ResponseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request, $complaintId)
    {
        $data = $request->validate([
            'response' => 'required|string',
        ]);

        $complaint = Complaint::findOrFail($complaintId);

        Resp::create([
            'complaint_id' => $complaint->id,
            'user_id' => Auth::id(),
            'response' => $data['response'],
        ]);

        return back()->with('success','Respons terkirim');
    }
}
