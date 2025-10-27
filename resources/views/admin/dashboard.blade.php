@extends('admin.partials.app')
@section('title', 'Dashboard')
@section('content')

    <div class="row">
        <div class="col-lg-12 mb-4 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-7">
                        <div class="card-body">
                            <h5 class="card-title text-primary">Selamat Datang, {{ Auth::user()->name }} 🎉</h5>
                            <p class="mb-4">
                                You have done <span class="fw-bold">72%</span> more sales today. Check your new badge in
                                your profile.
                            </p>

                            <a href="javascript:;" class="btn btn-sm btn-outline-primary">View Badges</a>
                        </div>
                    </div>
                    <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                            <img src="{{ asset('admin') }}/img/illustrations/man-with-laptop-light.png" height="140"
                                alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                data-app-light-img="illustrations/man-with-laptop-light.png" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row g-3">
        <div class="col-md-3">
            <div class="card border-0 shadow-sm bg-primary text-white position-relative overflow-hidden dashboard-card">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div>
                        <h6 class="text-white-50 mb-1">Total Clients</h6>
                        <h3 class="fw-bold total mb-0">{{ $totalClients }}</h3>
                    </div>
                    <div class="icon-bg">
                        <i class="bi bi-people-fill fs-1"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card border-0 shadow-sm bg-success text-white position-relative overflow-hidden dashboard-card">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div>
                        <h6 class="text-white-50 mb-1">Total Projects</h6>
                        <h3 class="fw-bold total mb-0">{{ $totalProjects }}</h3>
                    </div>
                    <div class="icon-bg">
                        <i class="bi bi-kanban-fill fs-1"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card border-0 shadow-sm bg-secondary text-white position-relative overflow-hidden dashboard-card">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div>
                        <h6 class="text-white-50 mb-1">Total Products</h6>
                        <h3 class="fw-bold total mb-0">{{ $totalProducts }}</h3>
                    </div>
                    <div class="icon-bg">
                        <i class="bi bi-box-seam-fill fs-1"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card border-0 shadow-sm bg-danger text-white position-relative overflow-hidden dashboard-card">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div>
                        <h6 class="text-white-50 mb-1">Total Invoices</h6>
                        <h3 class="fw-bold total mb-0">{{ $totalInvoices }}</h3>
                    </div>
                    <div class="icon-bg">
                        <i class="bi bi-receipt-cutoff fs-1"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('style')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background: #e6ebf0;
            /* Latar belakang lembut */
        }

        .dashboard-card {
            border-radius: 1rem;
            transition: transform 0.25s ease, box-shadow 0.25s ease;
        }

        .dashboard-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        .icon-bg {
            opacity: 0.3;
            transform: rotate(-10deg);
            transition: opacity 0.3s ease, transform 0.3s ease;
        }

        .dashboard-card:hover .icon-bg {
            opacity: 0.6;
            transform: rotate(0deg);
        }

        .icon-bg i {
            font-size: 3rem !important;
        }

        .total {
            font-size: 2.5rem;
            animation: counterAnimation 1s ease-out;
            color: #fff;
        }
        @keyframes counterAnimation {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
@endpush
@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            document.querySelectorAll(".counter").forEach(el => {
                let target = parseInt(el.textContent);
                let count = 0;
                let step = target / 50;
                let interval = setInterval(() => {
                    count += step;
                    el.textContent = Math.floor(count);
                    if (count >= target) {
                        el.textContent = target;
                        clearInterval(interval);
                    }
                }, 20);
            });
        });
    </script>
@endpush
