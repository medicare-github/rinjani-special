@extends('admin.layouts._master')
@section('head', 'Paket Wisata')
@push('style')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endpush
@section('contents')
    <div class="pc-container">
        <div class="pc-content">
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                                <li class="breadcrumb-item" aria-current="page">Paket Wisata</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->
            <!-- [ Main Content ] start -->
            <div class="row">
                <div class="col-md-12 col-xl-12">
                    <div class="card table-card">
                        <div class="card-header d-flex align-items-center justify-content-between py-3">
                            <h5>Paket Wisata</h5>
                            <a href="{{route('paket_wisata.add')}}" class="btn btn-primary btn-sm"><i class="ti ti-plus"></i></a>
                        </div>
                        <div class="card-body py-2 px-0">
                            <div class="table-responsive">
                                <table class="table table-hover table-borderless table-sm mb-0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama</th>
                                            <th>Harga</th>
                                            <th>Tools</th>
                                            <th class="text-end">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $value)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    <a href="{{route('showPaketWisata', $value->slug)}}">{{ $value->nama }}</a>
                                                </td>
                                                <td>{{ toRupiah($value->harga) }}</td>
                                                <td>
                                                    <div class="d-flex gap-2">
                                                        <a href="{{route('itineraries', $value->id)}}" class="btn btn-secondary btn-sm">itineraries<a>
                                                        <a href="{{route('includesOrExcludes',$value->id)}}" class="btn btn-secondary btn-sm" >In/Ex</a>
                                                    </div>
                                                </td>
                                                <td>
                                                    <button class="btn avtar avtar-xs btn-light-danger btn-delete" data-id="{{ $value->id }}"><i class="ti ti-x"></i></button>
                                                    <button class="btn avtar avtar-xs btn-light-warning btn-edit" data-id="{{ $value->id }}"><i class="ti ti-pencil"></i></button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
       document.addEventListener('DOMContentLoaded', function () {
        const deleteButtons = document.querySelectorAll('.btn-delete');
        deleteButtons.forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const wisata_id = this.getAttribute('data-id');
                const deleteUrl = `/mstr/paket_wisata/${wisata_id}/delete`;
                Swal.fire({
                    title: 'Apakah kamu yakin?',
                    text: "Kamu tidak akan bisa mengembalikan data ini!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, hapus!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        fetch(deleteUrl, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                            }
                        }).then(response => {
                            if (response.ok) {
                                Swal.fire(
                                    'Dihapus!',
                                    'Data Wisata telah dihapus.',
                                    'success'
                                ).then(() => {
                                    window.location.reload();
                                });
                            } else {
                                Swal.fire(
                                    'Gagal!',
                                    'Terjadi kesalahan saat menghapus data.',
                                    'error'
                                );
                            }
                        });
                    }
                });
            });
        });
    });
    </script>
@endpush
