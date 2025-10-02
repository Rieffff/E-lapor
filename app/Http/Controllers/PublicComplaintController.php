<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Complaint;
use Illuminate\Support\Facades\Storage;

class PublicComplaintController extends Controller
{
    public function form()
    {
        return view('public.form');
    }

    public function submit(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:191',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:191',
            'message' => 'required|string',
            'attachment' => 'nullable|file|max:2048',
        ]);

        if ($request->hasFile('attachment')) {
            $path = $request->file('attachment')->store('attachments','public');
            $data['attachment'] = $path;
        }

        Complaint::create($data);

        return redirect()->back()->with('success','Terima kasih. Pengaduan Anda telah terkirim.');
    }
    public function list()
    {
        $complaints = \App\Models\Complaint::latest()->get();
        return view('public.list', compact('complaints'));
    }

    public function show($id)
    {
        $complaint = \App\Models\Complaint::with('responses.user')->findOrFail($id);
        return view('public.show', compact('complaint'));
    }

}
