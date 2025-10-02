@extends('admin.layouts.admin')

@section('content')
<div class="card">
  <div class="card-header"><h3>Detail Pengaduan</h3></div>
  <div class="card-body">
    <p><strong>Nama:</strong> {{ $complaint->name }}</p>
    <p><strong>Email:</strong> {{ $complaint->email }}</p>
    <p><strong>No HP:</strong> {{ $complaint->phone }}</p>
    <form action="{{ route('admin.complaints.status',$complaint->id) }}" method="POST" class="mt-3">
        @csrf
        <label>Ubah status:
            <select name="status" class="form-control">
                <option value="baru" {{ $complaint->status=='baru' ? 'selected' : '' }}>Baru</option>
                <option value="diproses" {{ $complaint->status=='diproses' ? 'selected' : '' }}>Diproses</option>
                <option value="selesai" {{ $complaint->status=='selesai' ? 'selected' : '' }}>Selesai</option>
            </select>
        </label>
        <button class="btn btn-warning">Simpan</button>
    </form>
    <p><strong>Laporan:</strong><br>{{ $complaint->message }}</p>
    <!-- Lampiran -->
    @if($complaint->attachment)
        <div class="col-lg-8">
            <h2 class="text-lg font-semibold mb-2">📎 Lampiran:</h2>
            @php
                $ext = pathinfo($complaint->attachment, PATHINFO_EXTENSION);
            @endphp

            @if(in_array(strtolower($ext), ['jpg','jpeg','png','gif','webp']))
                <img src="{{ asset('storage/' . $complaint->attachment) }}" 
                     alt="Lampiran" 
                     class="w-75 ">
            @else
                <a href="{{ asset('storage/' . $complaint->attachment) }}" 
                   target="_blank" 
                   class="">
                   📂 Unduh Lampiran
                </a>
            @endif
        </div>
    @endif

    <hr>
    <h4>Respon Admin</h4>
    @foreach($complaint->responses as $r)
      <div class="border p-2 mb-2">
        <p><strong>{{ $r->user->name }}</strong> ({{ $r->created_at->format('d-m-Y H:i') }})</p>
        <p>{{ $r->response }}</p>
      </div>
    @endforeach

    <form method="POST" action="{{ route('admin.complaints.makeResponse',$complaint->id) }}">
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
