@extends('admin.layouts._master')
@section('head', 'Includes / Exludes Paket Wisata')
@push('style')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endpush
@section('contents')
    <section class="pc-container">
        <div id="loading"
            class="position-fixed top-0 start-0 w-100 h-100 bg-dark bg-opacity-50 d-none d-flex align-items-center justify-content-center"
            style="z-index: 1000;">
            <div class="spinner-border text-light" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
        <div class="pc-content">
            <div class="row">
                <div class="col-md-10 mx-auto ">
                    <div class="row">
                        <div class="col-md-6">
                            <form action="{{ route('includesOrExcludes.store', $id) }}" method="post"
                                id="addIncludesOrExcludesForm">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>
                                            Form add Includes Or Excludes
                                        </h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label class="form-label">Items</label>
                                            <input type="text" class="form-control" placeholder="Items or equipment"
                                                name="barang_bawaan" />
                                            <small class="form-text text-danger d-none" id="error-barang_bawaan"></small>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Type</label>
                                            <hr>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="tipe"
                                                    value="include" checked />
                                                <label class="form-check-label"> Include </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" value="exclude"
                                                    name="tipe" />
                                                <label class="form-check-label"> Exclude </label>
                                            </div>
                                            <small class="form-text text-danger d-none" id="error-include"></small>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button class="btn btn-primary" type="submit">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-xl-6 col-md-12">
                            <div class="card">
                                <div class="card-header d-flex align-items-center justify-content-between py-3">
                                    <h5 class="mb-0">Items or equipment</h5>
                                </div>
                                <ul class="list-group list-group-flush border-top-0">
                                    @foreach ($data->includesExcludes as $value)
                                        <li class="list-group-item">
                                            <div class="d-flex align-items-start">
                                                <div class="flex-grow-1 me-2">
                                                    <h6 class="mb-0">{{ $value->barang_bawaan }}</h6>
                                                    <span
                                                        class="badge {{ $value->tipe == 'include' ? 'bg-success' : 'bg-danger' }} rounded-pill">{{ $value->tipe }}</span>
                                                </div>
                                                <div class="flex-shrink-0">
                                                    <button class="btn avtar avtar-xs btn-light-danger btn-delete"
                                                        data-id="{{ $value->id }}"><i class="ti ti-x"></i></button>
                                                    <button class="btn avtar avtar-xs btn-light-warning btn-edit"
                                                        data-id="{{ $value->id }}"><i class="ti ti-pencil"></i></button>
                                                </div>
                                            </div>
                                        </li>
                                    @endForEach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const addIncludesOrExcludesForm = document.getElementById('addIncludesOrExcludesForm');
            const loadingElement = document.getElementById('loading');

            addIncludesOrExcludesForm.addEventListener('submit', function(event) {
                event.preventDefault();
                loadingElement.classList.remove('d-none');
                setTimeout(() => {
                    const formData = new FormData(addIncludesOrExcludesForm);
                    document.querySelectorAll('.form-text.text-danger').forEach(el => el.classList
                        .add('d-none'));
                    fetch(addIncludesOrExcludesForm.action, {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector(
                                    'meta[name="csrf-token"]').getAttribute('content')
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                Swal.fire('Berhasil!', data.message, 'success').then(() => {
                                    window.location.reload();
                                });
                            } else {
                                for (const field in data.errors) {
                                    const errorElement = document.getElementById(
                                        `error-${field}`);
                                    if (errorElement) {
                                        errorElement.textContent = data.errors[field][0];
                                        errorElement.classList.remove('d-none');
                                    }
                                }
                                Swal.fire('Gagal!', data.message ? data.message :
                                    'check inputan', 'error');
                            }
                        })
                        .catch(error => {
                            Swal.fire('Gagal!',
                                'Terjadi kesalahan saat menambahkan paket wisata.', 'error');
                        })
                        .finally(() => {
                            loadingElement.classList.add('d-none');
                        });
                }, 1000);
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const deleteButtons = document.querySelectorAll('.btn-delete');
            deleteButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    const inEx_id = this.getAttribute('data-id');
                    const deleteUrl = `/mstr/includesOrExcludes/${inEx_id}/delete`;
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
                                        'Data includes or excludes telah dihapus.',
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
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const editButtons = document.querySelectorAll('.btn-edit');
            editButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    const inEx_id = this.getAttribute('data-id');
                    const editUrl = `/mstr/includesOrExcludes/${inEx_id}/edit`;
                    fetch(editUrl)
                        .then(response => response.json())
                        .then(data => {
                            document.querySelector('input[name="barang_bawaan"]').value = data.barang_bawaan;
                            document.querySelector(`input[name="tipe"][value="${data.tipe}"]`).checked = true;
                            const addForm = document.getElementById('addIncludesOrExcludesForm');
                            addForm.action = `/mstr/paket_wisata/includesOrExcludes/${inEx_id}/update`;
                            addForm.insertAdjacentHTML('beforeend', '<input type="hidden" name="_method" value="PUT">');
                        })
                        .catch(error => {
                            Swal.fire('Gagal!', 'Terjadi kesalahan saat mengambil data.', 'error');
                        });
                });
            });
        });

    </script>
@endpush
