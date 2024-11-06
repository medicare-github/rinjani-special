@extends('admin.layouts._master')
@section('head', 'Home')
@push('style')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="{{ asset('assets') }}/css/plugins/simplemde.min.css" />
@endpush
@section('contents')
    <div class="pc-container">
        <div class="pc-content">
            <div class="row">
                @if ($data != null)
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-lg-5 col-xxl-3">
                                <div class="card overflow-hidden">
                                    <div class="card-body position-relative">
                                        <div class="text-center mt-3">
                                            <div class="chat-avtar d-inline-flex mx-auto">
                                                <img class="rounded-circle img-fluid wid-90 img-thumbnail"
                                                    src="{{ Storage::url($data->logo) }}" alt="User image" />
                                                <i class="chat-badge bg-success me-2 mb-2"></i>
                                            </div>
                                            <h5 class="mb-0">{{ $data->nama }}</h5>
                                            <p class="text-muted text-sm">email : <a href="mailto:{{ $data->email }}}"
                                                    class="link-primary">
                                                    {{ $data->email }}</a>
                                            </p>
                                            <ul class="list-inline mx-auto my-4">
                                                <li class="list-inline-item">
                                                    <a href="https://facebook.com/{{ $data->fb }}"
                                                        class="avtar avtar-s text-white bg-facebook">
                                                        <i class="ti ti-brand-facebook f-24"></i>
                                                    </a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="https://instagram.com/{{ $data->ig }}"
                                                        class="avtar avtar-s text-white bg-instagram">
                                                        <i class="ti ti-brand-instagram f-24"></i>
                                                    </a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="https://whatsapp.com/{{ $data->wa }}"
                                                        class="avtar avtar-s text-white bg-success">
                                                        <i class="ti ti-brand-whatsapp f-24"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="nav flex-column nav-pills list-group list-group-flush account-pills mb-0"
                                        id="user-set-tab" role="tablist" aria-orientation="vertical">
                                        <a class="nav-link list-group-item list-group-item-action active"
                                            id="user-set-profile-tab" data-bs-toggle="pill" href="#user-set-profile"
                                            role="tab" aria-controls="user-set-profile" aria-selected="true">
                                            <span class="f-w-500"><i class="ph-duotone ph-user-circle m-r-10"></i>Profile
                                                Overview</span>
                                        </a>
                                        <a class="nav-link list-group-item list-group-item-action"
                                            id="user-set-information-tab" data-bs-toggle="pill" href="#user-set-information"
                                            role="tab" aria-controls="user-set-information" aria-selected="false">
                                            <span class="f-w-500"><i class="ph-duotone ph-clipboard-text m-r-10"></i>Update
                                                Information</span>
                                        </a>
                                        <a class="nav-link list-group-item list-group-item-action"
                                            id="user-set-passwort-tab" data-bs-toggle="pill" href="#user-set-passwort"
                                            role="tab" aria-controls="user-set-passwort" aria-selected="false">
                                            <span class="f-w-500"><i class="ph-duotone ph-key m-r-10"></i>Change
                                                Password</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7 col-xxl-9">
                                <div class="tab-content" id="user-set-tabContent">
                                    <div class="tab-pane fade show active" id="user-set-profile" role="tabpanel"
                                        aria-labelledby="user-set-profile-tab">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>About {{ $data->nama }} </h5>
                                            </div>
                                            <div class="card-body">
                                                <p class="mb-0">{!! $data->tentang !!}</p>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>Personal Details</h5>
                                            </div>
                                            <div class="card-body">
                                                <ul class="list-group list-group-flush">
                                                    <li class="list-group-item px-0 pt-0">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <p class="mb-1 text-muted">Nama Trekking Organizer</p>
                                                                <p class="mb-0">{{$data->nama}}</p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item px-0">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <p class="mb-1 text-muted">Email</p>
                                                                <p class="mb-0">{{ $data->email }}</p>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <p class="mb-1 text-muted">Nomer Hp</p>
                                                                <p class="mb-0">{{ $data->wa }}</p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item px-0">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <p class="mb-1 text-muted">Instagram</p>
                                                                <p class="mb-0">{{ $data->ig }}</p>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <p class="mb-1 text-muted">facebook</p>
                                                                <p class="mb-0">{{ $data->fb }}</p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item px-0 pb-0">
                                                        <p class="mb-1 text-muted">Alamat</p>
                                                        <p class="mb-0">
                                                            {{$data->alamat}}
                                                        </p>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="user-set-information" role="tabpanel"
                                        aria-labelledby="user-set-information-tab">
                                        <form action="{{ route('profile.update') }}" method="post" id="profileForm">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h5>Personal Information</h5>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="mb-3">
                                                                            <label class="form-label">Logo (kosongkan jika tidak di ubah)</label>
                                                                            <input type="file" name="logo" class="form-control" />
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label class="form-label">Nama usaha</label>
                                                                            <input type="text" class="form-control" name="nama"
                                                                                placeholder="Nama usaha" value="{{$data->nama}}" />
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label class="form-label">Email address</label>
                                                                            <input type="email" class="form-control" name="email"
                                                                                placeholder="Enter email" value="{{$data->email}}" />
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="alamat" class="form-label">Alamat</label>
                                                                            <textarea class="form-control" id="alamat" name="alamat" rows="3" >{{$data->alamat}}</textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="mb-3">
                                                                            <label for="whatsapp" class="form-label">Whatsapp</label>
                                                                            <input type="text" name="wa" placeholder="WhatsApp"
                                                                                class="form-control" value="{{$data->wa}}">
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="Instagram" class="form-label">Instagram</label>
                                                                            <input type="text" name="ig" placeholder="Instagram"
                                                                                class="form-control" value="{{$data->ig}}">
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="Facebook" class="form-label">Facebook</label>
                                                                            <input type="text" name="fb" placeholder="Facebook"
                                                                                class="form-control" value="{{$data->fb}}">
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="TripsAdvisor" class="form-label">TripsAdvisor</label>
                                                                            <input type="text" name="ta" placeholder="TripsAdvisor"
                                                                                class="form-control" value="{{$data->ta}}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <label for="tentang" class="form-label">Tentang</label>
                                                                        <textarea class="form-control" id="tentang" name="tentang">{{$data->tentang}}</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-end btn-page">
                                                <button class="btn btn-primary" type="submit" >Update Profile</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="user-set-passwort" role="tabpanel"
                                        aria-labelledby="user-set-passwort-tab">
                                       <form action="{{route('auth.change_password')}}" id="changePasswordForm">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>Change Password</h5>
                                            </div>
                                            <div class="card-body">
                                                <ul class="list-group list-group-flush">
                                                    <li class="list-group-item pt-0 px-0">
                                                        <div class="row mb-0">
                                                            <label
                                                                class="col-form-label col-md-4 col-sm-12 text-md-end">Current
                                                                Password <span class="text-danger">*</span>
                                                            </label>
                                                            <div class="col-md-8 col-sm-12">
                                                                <input type="password" name="current_password" class="form-control" required>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item px-0">
                                                        <div class="row mb-0">
                                                            <label
                                                                class="col-form-label col-md-4 col-sm-12 text-md-end">New
                                                                Password <span class="text-danger">*</span></label>
                                                            <div class="col-md-8 col-sm-12">
                                                                <input type="password" name="password" id="password" class="form-control" required />
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item pb-0 px-0">
                                                        <div class="row mb-0">
                                                            <label
                                                                class="col-form-label col-md-4 col-sm-12 text-md-end">Confirm
                                                                Password <span class="text-danger">*</span></label>
                                                            <div class="col-md-8 col-sm-12">
                                                                <input type="password" class="form-control" id="check_password" required />
                                                                <small id="password_message" class="text-danger" style="display: none;">Passwords do not match.</small>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-body text-end">
                                                <div class="btn btn-outline-secondary me-2">Cancel</div>
                                                <button type="submit" class="btn btn-primary">Change Password</button>
                                            </div>
                                        </div>
                                       </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="alert alert-warning col-10 mx-auto text-center" role="alert">
                        Profile belum diisi
                    </div>
                    <div class="col-10 card mx-auto mt-3">
                        <form action="{{ route('profile.update') }}" method="post" id="profileForm">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Logo</label>
                                            <input type="file" name="logo" class="form-control" required />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Nama usaha</label>
                                            <input type="text" class="form-control" name="nama"
                                                placeholder="Nama usaha" required />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Email address</label>
                                            <input type="email" class="form-control" name="email"
                                                placeholder="Enter email" required />
                                        </div>
                                        <div class="mb-3">
                                            <label for="alamat" class="form-label">Alamat</label>
                                            <textarea class="form-control" id="alamat" name="alamat" rows="3"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="whatsapp" class="form-label">Whatsapp</label>
                                            <input type="text" name="wa" placeholder="WhatsApp"
                                                class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label for="Instagram" class="form-label">Instagram</label>
                                            <input type="text" name="ig" placeholder="Instagram"
                                                class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label for="Facebook" class="form-label">Facebook</label>
                                            <input type="text" name="fb" placeholder="Facebook"
                                                class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label for="TripsAdvisor" class="form-label">TripsAdvisor</label>
                                            <input type="text" name="ta" placeholder="TripsAdvisor"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="tentang" class="form-label">Tentang</label>
                                        <textarea class="form-control" id="tentang" name="tentang"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
            </div>
            @endif
        </div>
    </div>
    </div>

@endsection
@push('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('assets') }}/js/plugins/ckeditor/classic/ckeditor.js"></script>
    <script>
      (function () {
        ClassicEditor.create(document.querySelector('#tentang')).catch((error) => {
          console.error(error);
        });
      })();
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            
            const addProfileForm = document.getElementById('profileForm');
            addProfileForm.addEventListener('submit', function(event) {
                event.preventDefault();
                const formData = new FormData(addProfileForm);
                fetch(addProfileForm.action, {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                .getAttribute('content')
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            Swal.fire(
                                'Berhasil!',
                                data.message,
                                'success'
                            ).then(() => {
                                window.location.reload();
                            });
                        } else {
                            Swal.fire(
                                'Gagal!',
                                data.message,
                                'error'
                            );
                        }
                    }).catch(error => {
                        Swal.fire(
                            'Gagal!',
                            'Terjadi kesalahan saat menambahkan profile.',
                            'error'
                        );
                    });
            })

            const changePassword = document.getElementById('changePasswordForm');
            changePassword.addEventListener('submit', function(event) {
                event.preventDefault();
                const formDataChangerPassword = new FormData(changePassword);
                fetch(changePassword.action, {
                        method: 'POST',
                        body: formDataChangerPassword,
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                .getAttribute('content')
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            Swal.fire(
                                'Berhasil!',
                                data.message,
                                'success'
                            ).then(() => {
                                window.location.reload();
                            });
                        } else {
                            Swal.fire(
                                'Gagal!',
                                data.message,
                                'error'
                            );
                        }
                    }).catch(error => {
                        Swal.fire(
                            'Gagal!',
                            'Terjadi kesalahan saat mengganti password.',
                            'error'
                        );
                    });
            })

        })
    </script>
    <script>
        document.getElementById('check_password').addEventListener('input', function () {
            var password = document.getElementById('password').value;
            var checkPassword = document.getElementById('check_password').value;
            var message = document.getElementById('password_message');
            
            if (password !== checkPassword) {
                document.getElementById('check_password').classList.add('border-danger');
                message.style.display = 'block';  
            } else {
                document.getElementById('check_password').classList.remove('border-danger');
                message.style.display = 'none';  
            }
        });
    </script>
@endpush
