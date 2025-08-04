@extends('admin.partials.app')
@section('title', 'User Profile')
@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">@yield('title')</h4>

    <div class="row">
        <div class="col">
            <div class="card mb-4">
                <div class="card-body">
                    <form id="form_profile" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-3 text-center">
                                <h5 class="text-muted mb-3">Profile Picture</h5>
                                <img id="preview-profile_picture"
                                    src="{{ $user->profile_picture ? asset('uploads/users/' . $user->profile_picture) : 'https://via.placeholder.com/100' }}"
                                    alt="{{ $user->name }}" class="img-fluid my-2" style="max-height: 150px;">
                                <input type="file" class="form-control" id="profile_picture" name="profile_picture"
                                    onchange="previewprofile_picture(event)">
                            </div>
                            <div class="col-md-9 mb-3">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="name" class="form-label">Username</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            value="{{ old('name', $user->name) }}" readonly>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control" name="name"
                                            value="{{ old('name', $user->name) }}" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="password" class="form-label">New Password (Optional)</label>
                                        <input type="password" class="form-control" name="password"
                                            placeholder="Leave blank if not changing">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="bio" class="form-label">Bio</label>
                                        <textarea class="form-control" name="bio" id="bio" rows="3">{{ old('bio', $user->bio) }}</textarea>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="ri-save-line"></i> Save Changes
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        function previewprofile_picture(event) {
            const preview = document.getElementById('preview-profile_picture');
            preview.src = URL.createObjectURL(event.target.files[0]);
            preview.onload = () => URL.revokeObjectURL(preview.src);
        }

        $('#form_profile').on('submit', function(e) {
            e.preventDefault();

            let formData = new FormData(this);

            $.ajax({
                url: "{{ route('users.updateProfile') }}",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: res => {
                    Swal.fire({
                        toast: true,
                        icon: 'success',
                        position: 'top-end',
                        title: 'Success',
                        text: res.message,
                        timerProgressBar: true,
                        showConfirmButton: false,
                        timer: 2000,
                        background: '#28a745',
                        color: '#fff'
                    });

                    if (res.profile.profile_picture) {
                        $('#preview-profile_picture').attr('src', res.profile.profile_picture);
                    }
                },
                error: err => {
                    if (err.status === 422) {
                        let msg = Object.values(err.responseJSON.errors).map(m => `<div>${m}</div>`)
                            .join('');
                        Swal.fire({
                            toast: true,
                            icon: 'error',
                            position: 'top-end',
                            html: msg,
                            showConfirmButton: false,
                            timer: 3000,
                            background: '#dc3545',
                            color: '#fff'
                        });
                    } else {
                        Swal.fire('Error', 'Terjadi kesalahan pada server.', 'error');
                    }
                }
            });
        });
    </script>
@endpush
