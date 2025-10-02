@extends('admin.layouts.admin')

@section('content')
<div class="card">
  <div class="card-header"><h3>Detail Pengaduan</h3></div>
  <div class="card-body">
    <p><strong>Nama:</strong> {{ $complaint->name }}</p>
    <p><strong>Email:</strong> {{ $complaint->email }}</p>
    <p><strong>No HP:</strong> {{ $complaint->phone }}</p>
    <p><strong>Status:</strong> {{ ucfirst($complaint->status) }}</p>
    <p><strong>Laporan:</strong><br>{{ $complaint->message }}</p>
    @if($complaint->attachment)
      <p><a href="{{ asset('storage/'.$complaint->attachment) }}" target="_blank">📎 Lihat Lampiran</a></p>
    @endif

    <hr>
    <h4>Respon Admin</h4>
    @foreach($complaint->responses as $r)
      <div class="border p-2 mb-2">
        <p><strong>{{ $r->user->name }}</strong> ({{ $r->created_at->format('d-m-Y H:i') }})</p>
        <p>{{ $r->response }}</p>
      </div>
    @endforeach

    <form method="POST" action="{{ route('admin.complaints.status',$complaint->id) }}">
      @csrf
      <div class="form-group">
        <label>Balasan</label>
        <textarea name="response" class="form-control" rows="3" required></textarea>
      </div>
      <button class="btn btn-success mt-2">Kirim Balasan</button>
    </form>
  </div>
</div>
@endsection
