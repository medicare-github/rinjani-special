@extends('admin.layouts._master')
@section('head', 'Itineraries Paket Wisata')
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
                <div class="col-md-4">
                    <form action="{{ route('itineraries.store', $id) }}" method="post" id="addItinerariesForm">
                        <div class="card">
                            <div class="card-header">
                                <h5>
                                    form add itineraries
                                </h5>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label">Hari Ke</label>
                                    <input type="number" class="form-control" placeholder="Hari Ke" name="hari_ke" />
                                    <small class="form-text text-danger d-none" id="error-hari_ke"></small>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Kegiatan</label>
                                    <input type="text" class="form-control" placeholder="Kegiatan" name="kegiatan" />
                                    <small class="form-text text-danger d-none" id="error-kegiatan"></small>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Lokasi</label>
                                    <input type="text" class="form-control" placeholder="Lokasi" name="lokasi" />
                                    <small class="form-text text-danger d-none" id="error-lokasi"></small>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">deskripsi_kegiatan</label>
                                    <textarea class="form-control" id="deskripsi_kegiatan" name="deskripsi_kegiatan"></textarea>
                                    <small class="form-text text-danger d-none" id="error-deskripsi_kegiatan">Message
                                        Invalid</small>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-xl-8 col-md-12">
                    <div class="card latest-activity-card">
                        <div class="card-header">
                            <h5>Rangkaian Perjalanan (itineraries</h5>
                        </div>
                        <div class="card-body">
                            <div class="latest-update-box">
                               @forEach($data->itineraries as $key => $value)
                               <div class="row {{$key== 0 ? 'p-t-20' : ''}} p-b-30">
                                    <div class="col-auto text-end update-meta">
                                        <p class="text-muted m-b-0 d-inline-flex">Day {{$value->hari_ke}}</p>
                                        <div class="border border-2 border-primary text-primary update-icon">
                                            <i class="ti ti-walk"></i>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="d-inline-flex align-items-center gap-2">
                                            <h6 class="mb-0 me-2">{{$value->kegiatan}}</h6>
                                            <span class="badge bg-success">{{$value->lokasi}}</span>
                                            <button class="badge bg-danger btn-delete border-0" data-id="{{$value->id}}" title="Delete"> <i class="ti ti-trash"></i> </button>
                                            <button class="badge bg-warning btn-edit border-0" data-id="{{$value->id}}" title="Edit"> <i class="ti ti-pencil"></i> </button>
                                        </div>
                                        <p class="text-muted m-b-0">
                                            {!! $value->deskripsi_kegiatan !!}
                                        </p>
                                    </div>
                                </div>
                            @endForEach
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
    <script src="{{ asset('assets') }}/js/plugins/ckeditor/classic/ckeditor.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteButtons = document.querySelectorAll('.btn-delete');
            deleteButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const id = this.getAttribute('data-id');
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            fetch(`/mstr/itineraries/${id}/delete`, {
                                method: 'DELETE',
                                headers: {
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                                }
                            }).then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    Swal.fire(
                                        'Deleted!',
                                        data.message,
                                        'success'
                                    ).then(() => {
                                        window.location.reload();
                                    });
                                } else {
                                    Swal.fire(
                                        'Failed!',
                                        data.message,
                                        'error'
                                    );
                                }
                            }).catch(error => {
                                Swal.fire(
                                    'Failed!',
                                    'Terjadi kesalahan saat menghapus data.',
                                    'error'
                                );
                            });
                        }
                    })
                })
            })
        })
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const addItinerariesForm = document.getElementById('addItinerariesForm');
            const loadingElement = document.getElementById('loading');

            addItinerariesForm.addEventListener('submit', function(event) {
                event.preventDefault();
                loadingElement.classList.remove('d-none');
                setTimeout(() => {
                    const formData = new FormData(addItinerariesForm);
                    document.querySelectorAll('.form-text.text-danger').forEach(el => el.classList
                        .add('d-none'));
                    fetch(addItinerariesForm.action, {
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
                                Swal.fire('Gagal!', data.message? data.message : 'check inputan', 'error');
                            }
                        })
                        .catch(error => {
                            Swal.fire('Gagal!',
                                'Terjadi kesalahan saat menambahkan itineraries  paket wisata.',
                                'error');
                        })
                        .finally(() => {
                            loadingElement.classList.add('d-none');
                        });
                }, 2000);
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const editButtons = document.querySelectorAll('.btn-edit');
            const addItinerariesForm = document.getElementById('addItinerariesForm');
            const submitButton = addItinerariesForm.querySelector('button[type="submit"]');
            let ckeditorInstance;

            // Inisialisasi CKEditor hanya satu kali
            if (!ckeditorInstance) {
                ClassicEditor
                    .create(document.querySelector('#deskripsi_kegiatan'))
                    .then(editor => {
                        ckeditorInstance = editor;
                    })
                    .catch(error => {
                        console.error('CKEditor tidak dapat diinisialisasi:', error);
                    });
            }

            editButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const id = this.getAttribute('data-id');
                    
                    // Fetch data itinerary berdasarkan ID
                    fetch(`/mstr/itineraries/${id}/edit`)
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                const itinerary = data.data;
                                // Mengubah atribut action untuk update
                                addItinerariesForm.action = `/mstr/itineraries/${id}/update`;
                                addItinerariesForm.querySelector('input[name="hari_ke"]').value = itinerary.hari_ke;
                                addItinerariesForm.querySelector('input[name="kegiatan"]').value = itinerary.kegiatan;
                                addItinerariesForm.querySelector('input[name="lokasi"]').value = itinerary.lokasi;
                                // Set nilai CKEditor dengan instance yang sudah ada
                                if (ckeditorInstance) {
                                    ckeditorInstance.setData(itinerary.deskripsi_kegiatan);
                                }
                                submitButton.textContent = 'Update';
                                submitButton.classList.remove('btn-primary');
                                submitButton.classList.add('btn-warning');
                                window.scrollTo({ top: 0, behavior: 'smooth' });
                            } else {
                                Swal.fire('Gagal!', 'Gagal memuat data itinerary.', 'error');
                            }
                        })
                        .catch(error => {
                            Swal.fire('Gagal!', 'Terjadi kesalahan saat memuat data itinerary.', 'error');
                        });
                });
            });
        });
    </script>
@endpush
