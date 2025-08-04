@extends('admin.partials.app')
@section('title', 'Menu Management')
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><i class="ri-settings-line"></i> @yield('title')</h4>
                </div>
                <div class="card-body">
                    <div class="nav-align-top mb-4">
                        <ul class="nav nav-pills" role="tablist">
                            <li class="nav-item">
                                <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                                    data-bs-target="#navs-justified-home" aria-controls="navs-justified-home"
                                    aria-selected="true">
                                    <i class="tf-icons bx bx-home"></i> Home
                                    {{-- <span class="badge rounded-pill badge-center h-px-20 w-px-20 bg-label-danger">3</span> --}}
                                </button>
                            </li>
                            <li class="nav-item">
                                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                    data-bs-target="#navs-justified-profile" aria-controls="navs-justified-profile"
                                    aria-selected="false">
                                    <i class="tf-icons bx bx-sort"></i> Sort Order Menu
                                </button>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="navs-justified-home" role="tabpanel">
                                @include('admin.menus.menu')
                            </div>
                            <div class="tab-pane fade" id="navs-justified-profile" role="tabpanel">
                                @include('admin.menus.order')
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
