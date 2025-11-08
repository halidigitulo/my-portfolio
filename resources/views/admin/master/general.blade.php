<div class="row my-3">
    <div class="col">
        <form id="form_general">
            @csrf
            <div class="row">
                <h5 class="py-1 my-1">Hero Section</h5>
                <div class="col-md-12 mb-3">
                        <label for="hero_title" class="form-label">Hero Title</label>
                        <input type="text" name="hero_title" id="hero_title" class="form-control" value="{{ old('hero_title', $general->hero_title) }}">
                </div>
                <div class="col-md-12 mb-3">
                        <label for="hero_text" class="form-label">Hero Text</label>
                        <textarea name="hero_text" id="hero_text" cols="30" rows="3" class="form-control">{{ old('hero_text', $general->hero_text) }}</textarea>
                </div>
                <div class="col-md-4 mb-3">
                        <label for="projects" class="form-label">Projects</label>
                        <input type="number" min="0" class="form-control" name="projects" id="projects" placeholder="projects"
                            value="{{ old('projects', $general->projects) }}" >
                </div>
                <div class="col-md-4 mb-3">
                        <label for="clients" class="form-label">Clients</label>
                        <input type="number" min="0" class="form-control" name="clients" id="clients" placeholder="clients"
                            value="{{ old('clients', $general->clients) }}" >
                </div>
                <div class="col-md-4 mb-3">
                        <label for="experiences" class="form-label">Experiences</label>
                        <input type="number" min="0" class="form-control" name="experiences" id="experiences"
                            placeholder="experiences" value="{{ old('experiences', $general->experiences) }}" >
                </div>
                <div class="col-md-12 mb-3">
                    <label for="cta_text" class="form-label">CTA Text</label>
                    <input type="text" name="cta_text" id="cta_text" class="form-control" value="{{ old('cta_text', $general->cta_text) }}" >
                </div>
                <h5 class="py-1 my-1">Pets Settings</h5>
                <div class="col-md-4 mb-3">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="pets_enabled" name="pets_enabled" {{ $general->pets_enabled ? 'checked' : '' }}>
                        <label class="form-check-label" for="pets_enabled">Enable Walking Pets</label>
                    </div>  
                </div>
                <h5 class="py-1 my-1">WA Custome Text</h5>
                <div class="col-md-12 mb-3">
                    <input type="text" name="wa_text" id="wa_text" class="form-control" value="{{ old('wa_text', $general->wa_text) }}" >
                </div>
                {{-- @can('general.update') --}}
                <div class="mt-3">
                    <button class="btn btn-primary" type="submit"><i class="ri-send-plane-line"></i>
                        Submit</button>
                </div>
                {{-- @endcan --}}
            </div>
        </form>
    </div>
</div>
@push('scripts')
    <script>
        $(document).ready(function() {
            $('#form_general').on('submit', function(e) {
                e.preventDefault();

                // Use FormData for file uploads
                let formData = new FormData(this);

                $.ajax({
                    type: "POST",
                    url: "{{ route('general.update') }}",
                    data: formData,
                    contentType: false,
                    processData: false,
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        Swal.fire({
                            position: "top-end",
                            icon: 'success',
                            title: 'Sukses',
                            text: response.message,
                            showConfirmButton: false,
                            timer: 1000,
                            toast: true,
                            background: '#28a745',
                            color: '#fff'
                        });

                        // Update logo preview if provided in the response
                        if (response.general) {
                            // Update text fields
                            $('#clients').val(response.general.clients);
                            $('#experiences').val(response.general.experiences);
                            $('#projects').val(response.general.projects);
                        }
                    },
                    error: function(xhr) {
                        if (xhr.status === 422) {
                            let errors = xhr.responseJSON.errors;
                            let errorMessage = '';
                            $.each(errors, function(key, value) {
                                errorMessage += value + '<br>';
                            });
                            Swal.fire({
                                title: 'Error!',
                                html: errorMessage,
                                icon: 'error',
                                position: 'top-end',
                                width: '400px',
                                showConfirmButton: false,
                                timer: 3000,
                                toast: true,
                                background: '#dc3545',
                                color: '#fff'
                            });
                        } else {
                            Swal.fire({
                                title: 'Error!',
                                text: 'Something went wrong. Please try again.',
                                icon: 'error',
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000,
                                toast: true,
                                background: '#dc3545',
                                color: '#fff'
                            });
                        }
                    }
                });
            });
        });
    </script>
@endpush
