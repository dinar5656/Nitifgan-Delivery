@extends('layouts.app')

@section('content')
<div class="container mt-5 mb-5"> <!-- Tambahkan mb-5 di sini -->
    <!-- Card Profile -->
    <div class="card shadow-lg border-0 rounded-lg">
        <div class="row g-0">
            <!-- Profile Image Section -->
            <div class="col-md-4 text-center bg-light py-5">
                <!-- Menampilkan foto jika ada, jika tidak tampilkan foto default -->
                <img src="{{ asset('storage/' . $profile->photo) }}" alt="Profile Photo" class="img-thumbnail" style="width: 150px; height: 150px; object-fit: cover;">
                <h3 class="fw-bold">{{ $profile->username ?? 'User Name' }}</h3>
                <p class="text-muted">{{ $profile->email ?? 'user@example.com' }}</p>
            </div>
            <!-- Profile Details -->
            <div class="col-md-8">
                <div class="card-body">
                    <h4 class="card-title mb-4">Profile Information</h4>
                    <div class="row mb-3">
                        <div class="col-sm-4"><strong>Address:</strong></div>
                        <div class="col-sm-8">{{ $profile->address ?? 'N/A' }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-4"><strong>Phone Number:</strong></div>
                        <div class="col-sm-8">{{ $profile->phone ?? 'N/A' }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-4"><strong>Bio:</strong></div>
                        <div class="col-sm-8">{{ $profile->bio ?? 'N/A' }}</div>
                    </div>
                    <!-- Buttons -->
                    <div class="d-flex justify-content-start mt-4">
                        <a href="{{ route('profile.edit') }}" class="btn btn-primary me-2">Edit Profile</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Profile Stats -->
    <div class="row text-center mt-5">
        <div class="col-md-4">
            <div class="p-4 border rounded bg-white shadow-sm">
                <h5 class="text-primary">Orders</h5>
                <h3>{{ $orderCount ?? 0 }}</h3>
            </div>
        </div>
        <div class="col-md-4">
            <div class="p-4 border rounded bg-white shadow-sm">
                <h5 class="text-success">Wishlist Items</h5>
                <h3>{{ $wishlistCount }}</h3>
            </div>
        </div>
        <div class="col-md-4">
            <div class="p-4 border rounded bg-white shadow-sm">
                <h5 class="text-warning">Total Spend</h5>
                <h3>${{ $totalPrice }}</h3>
            </div>
        </div>
    </div>
</div>
@endsection
