@extends('admin.layouts.admin')

@section('content')
<div class="card">
  <div class="card-header">
    <h3 class="card-title">📋 Daftar Pengaduan</h3>
  </div>
  <div class="card-body">
    <table id="complaintsTable" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>Laporan</th>
          <th>Status</th>
          <th>Tanggal</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach($complaints as $i => $c)
        <tr>
          <td>{{ $i+1 }}</td>
          <td>{{ $c->name }}</td>
          <td>{{ Str::limit($c->message,50) }}</td>
          <td>
            <span class="badge 
              {{ $c->status=='baru' ? 'badge-danger' : ($c->status=='diproses' ? 'badge-warning' : 'badge-success') }}">
              {{ ucfirst($c->status) }}
            </span>
          </td>
          <td>{{ $c->created_at->format('d-m-Y H:i') }}</td>
          <td>
            <a href="{{ route('admin.complaints.show',$c->id) }}" class="btn btn-sm btn-primary">
              <i class="fas fa-eye"></i> Detail
            </a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <div class="mt-4">{{ $complaints->links() }}</div>
  </div>
</div>
@endsection
@push('scripts')
<script>
$(function () {
  $('#complaintsTable').DataTable();
});
</script>
@endpush

