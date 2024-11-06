@extends('admin.layouts._master')
@section('head', 'Tambah Paket Wisata')
@push('style')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endpush
@section('contents')
    <section class="pc-container">
        <div id="loading" class="position-fixed top-0 start-0 w-100 h-100 bg-dark bg-opacity-50 d-none d-flex align-items-center justify-content-center" style="z-index: 1000;">
            <div class="spinner-border text-light" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
        <div class="pc-content">
            <form action="{{ route('paket_wisata.store') }}" method="post" enctype="multipart/form-data" id="addPaketWisataForm">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h5>Form Paket Wisata</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">Nama Paket</label>
                                            <input type="text" class="form-control" placeholder="Nama Paket Wisata"  name="nama" />
                                            <small class="form-text text-danger d-none"  id="error-nama">Message Invalid</small>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">Harga:</label>
                                            <div class="input-group search-form">
                                                <input type="text" class="form-control" placeholder="Enter Harga Rupiah" name="harga"  />
                                                <span class="input-group-text bg-transparent"><i class="feather icon-dollar-sign"></i></span>
                                            </div>
                                            <small class="form-text text-danger d-none" id="error-harga">Message Invalid</small>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">Level</label>
                                            <select name="difficulty_level" class="form-control" id="" required>
                                                <option value="Beginner"> Beginner </option>
                                                <option value="Moderate"> Moderate </option>
                                                <option value="Advance"> Advance </option>
                                            </select>
                                            <small class="form-text text-danger d-none"  id="error-difficulty_level">Message Invalid</small>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">Pengalaman Trekking:</label>
                                            <input type="text" class="form-control" name="trekking_experience" placeholder="Enter Pengalaman Trekking"  />
                                            <small class="form-text text-danger d-none" id="error-trekking_experience">Message Invalid</small>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label class="form-label">Deskripsi:</label>
                                            <textarea class="form-control" id="deskripsi" name="deskripsi" ></textarea>
                                            <small class="form-text text-danger d-none" id="error-deskripsi" >Message Invalid</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4 col-sm-6">
                       <div class="card">
                            <div class="card-header">
                                <h5>Thumbnail</h5>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <input type="file" class="form-control" name="thumbnail" id="thumbnail-input" >
                                </div>
                                <small class="form-text text-danger d-none" id="error-thumbnail">Message Invalid</small>
                                {{-- tempat preview thumbnail --}}
                                <div id="thumbnail-preview" style="margin-top: 10px;"></div>
                            </div>
                       </div>
                    </div>
                    <div class="col-md-8 col-lg-8 col-sm-6">
                       <div class="card">
                            <div class="card-header">
                                <h5>Panorama</h5>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <input type="file" class="form-control" name="panorama[]" id="panorama-input" multiple>
                                    <small class="form-text text-danger d-none" id="error-panorama" >Message Invalid</small>
                                    {{-- tempat preview panorama --}}
                                    <div id="panorama-preview" style="margin-top: 10px;"></div>
                                </div>
                            </div>
                       </div>
                    </div>
                    <div class="col-2">
                        <button class="btn btn-primary btn-md" type="submit"> Simpan  </button>
                    </div>
                </div>
            </form>
        </div>
    </section>
    
@endsection
@push('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('assets') }}/js/plugins/ckeditor/classic/ckeditor.js"></script>
    <script>
        (function () {
            ClassicEditor.create(document.querySelector('#deskripsi')).catch((error) => {
            console.error(error);
            });
        })();
    </script>
    <script>
        // Fungsi untuk menampilkan thumbnail
        document.getElementById('thumbnail-input').addEventListener('change', function(event) {
            const file = event.target.files[0];
            const previewContainer = document.getElementById('thumbnail-preview');
            previewContainer.innerHTML = ''; 
    
            if (file) {
                const img = document.createElement('img');
                img.src = URL.createObjectURL(file);
                img.style.width = '100%';
                img.style.maxHeight = '350px';
                img.onload = function() {
                    URL.revokeObjectURL(img.src); 
                };
                previewContainer.appendChild(img);
            }
        });
    
        // Fungsi untuk menampilkan semua panorama
        document.getElementById('panorama-input').addEventListener('change', function(event) {
            const files = event.target.files;
            const previewContainer = document.getElementById('panorama-preview');
            previewContainer.innerHTML = ''; 
    
            Array.from(files).forEach(file => {
                const img = document.createElement('img');
                img.src = URL.createObjectURL(file);
                img.style.width = '15%';
                img.style.margin = '1%';
                img.style.maxHeight = '150px';
                img.onload = function() {
                    URL.revokeObjectURL(img.src); 
                };
                previewContainer.appendChild(img);
            });
        });
    </script>
     <script>
        document.addEventListener('DOMContentLoaded', function() {
            const addPaketWisataForm = document.getElementById('addPaketWisataForm');
            const loadingElement = document.getElementById('loading');

            addPaketWisataForm.addEventListener('submit', function(event) {
                event.preventDefault();
                loadingElement.classList.remove('d-none');
                setTimeout(() => {
                    const formData = new FormData(addPaketWisataForm);
                    document.querySelectorAll('.form-text.text-danger').forEach(el => el.classList.add('d-none'));
                    fetch(addPaketWisataForm.action, {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
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
                                const errorElement = document.getElementById(`error-${field}`);
                                if (errorElement) {
                                    errorElement.textContent = data.errors[field][0];
                                    errorElement.classList.remove('d-none');
                                }
                            }
                            Swal.fire('Gagal!', data.message, 'error');
                        }
                    })
                    .catch(error => {
                        Swal.fire('Gagal!', 'Terjadi kesalahan saat menambahkan paket wisata.', 'error');
                    })
                    .finally(() => {
                        loadingElement.classList.add('d-none');
                    });
                }, 2000); 
            });
        });
 
    </script>
@endpush