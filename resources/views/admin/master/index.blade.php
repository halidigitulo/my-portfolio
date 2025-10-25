@extends('admin.partials.app')
@section('title', 'Master')
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><i class="ri-settings-line"></i> @yield('title')</h4>
                </div>
                <div class="card-body">
                    <div class="nav-align-top mb-4">
                        <div class="row">
                            <div class="col">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <button class="nav-link active" id="navs-pills-top-general-tab" data-bs-toggle="tab"
                                            data-bs-target="#navs-pills-top-general" type="button" role="tab"
                                            aria-controls="navs-pills-top-general" aria-selected="true">General</button>
                                    </li>
                                    <li class="nav-item">
                                        <button class="nav-link" id="navs-pills-top-kategori-berita-tab"
                                            data-bs-toggle="tab" data-bs-target="#navs-pills-top-kategori-berita"
                                            type="button" role="tab" aria-controls="navs-pills-top-kategori-berita"
                                            aria-selected="false">Kategori
                                            Berita</button>
                                    </li>
                                    <li class="nav-item">
                                        <button class="nav-link" id="navs-pills-top-kategori-project-tab"
                                            data-bs-toggle="tab" data-bs-target="#navs-pills-top-kategori-project"
                                            type="button" role="tab" aria-controls="navs-pills-top-kategori-project"
                                            aria-selected="false">Kategori
                                            Project</button>
                                    </li>
                                    <li class="nav-item">
                                        <button class="nav-link" id="navs-pills-top-kategori-stack-tab"
                                            data-bs-toggle="tab" data-bs-target="#navs-pills-top-kategori-stack"
                                            type="button" role="tab" aria-controls="navs-pills-top-kategori-stack"
                                            aria-selected="false">Kategori
                                            Stack</button>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="navs-pills-top-general" role="tabpanel">
                                        @include('admin.master.general')
                                    </div>
                                    <div class="tab-pane fade" id="navs-pills-top-kategori-berita" role="tabpanel">
                                        @include('admin.master.kategori-berita')
                                    </div>
                                    <div class="tab-pane fade" id="navs-pills-top-kategori-project" role="tabpanel">
                                        @include('admin.master.kategori-project')
                                    </div>
                                    <div class="tab-pane fade" id="navs-pills-top-kategori-stack" role="tabpanel">
                                        @include('admin.master.kategori-stack')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            // Check if there's a stored active tab in localStorage
            var activeTab = localStorage.getItem('activeTab');

            // If there's a stored tab, show it
            if (activeTab) {
                $('[data-bs-target="' + activeTab + '"]').tab('show');
            }

            // Save the active tab to localStorage when the tab is clicked
            $('button[data-bs-toggle="tab"]').on('shown.bs.tab', function(e) {
                var activeTab = $(e.target).attr('data-bs-target');
                localStorage.setItem('activeTab', activeTab);
            });
        });
    </script>
@endpush
