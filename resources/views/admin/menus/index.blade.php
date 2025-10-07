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
                        <ul class="nav nav-tabs nav-fill" role="tablist">
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
                <!-- Modal -->
                <div class="modal fade" id="modalMenu" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <form id="formMenu">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title"><i class="ri-add-line"></i> Add Menu</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    @csrf
                                    <input type="hidden" id="menu_id">
                                    <input type="text" class="form-control mb-2" id="menu_name" placeholder="Name"
                                        required>
                                    <input type="text" class="form-control mb-2" id="menu_url"
                                        placeholder="URL (default: #)">
                                    <input type="text" class="form-control mb-2" id="menu_icon"
                                        placeholder="Icon (default: circle-line)">
                                    <select class="mb-2 form-select select2" id="menu_parent_id" name="parent_id">
                                        <option value="">-- No Parent (Root) --</option>
                                        @foreach ($menus as $menu)
                                            <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                                        @endforeach
                                    </select>

                                    <input type="text" class="form-control mb-2" id="menu_permission"
                                        name="permission_name" placeholder="Permission Name">
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success"><i class="tf-icons bx bx-save"></i>
                                        Save</button>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i
                                            class="tf-icons bx bx-x"></i> Cancel</button>
                                </div>
                            </div>
                        </form>
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
