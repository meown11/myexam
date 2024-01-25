@extends('layouts.app')

@section('body')
    <style>
        /* Add this CSS directly in your Blade template */
        .narrow-input {
            width: 200px; /* Adjust the width as needed */
        }

        /* Style for navbar links */
        .navbar-nav .nav-link {
            font-weight: bold;
            color: white;
        }

        .navbar-nav .nav-link:hover {
            text-decoration: none;
        }

        .active {
            color: black !important;
            text-decoration: underline;
        }

        /* Style for form labels */
        .form-group {
            display: flex;
            align-items: center;
            margin-bottom: 15px; /* Adjust spacing as needed */
        }

        .form-label {
            width: 100px; /* Adjust the width as needed */
            margin-right: 10px; /* Adjust spacing as needed */
        }
    </style>

    <h1 class="mb-0">Car Paint Job Details</h1>
    <h1 class="mb-0">Plate number: {{ $product->platenumber }}</h1>
    <hr />
    <div class="row">
        <div class="col mb-3">
            <div class="form-group">
                <label class="form-label narrow-input">Current Color</label>
                <input type="text" name="currentcolor" class="form-control narrow-input" placeholder="currentcolor" value="{{ $product->currentcolor }}" readonly>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <div class="form-group">
                <label class="form-label narrow-input">Target Color</label>
                <input type="text" name="targetcolor" class="form-control narrow-input" placeholder="targetcolor Code" value="{{ $product->targetcolor }}" readonly>
            </div>
        </div>
        <div class="row">
        <div class="col mb-3">
            <div class="form-group">
                <label class="form-label narrow-input">Status</label>
                <input type="text" name="status" class="form-control narrow-input" placeholder="status" value="{{ $product->status }}" readonly>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <div class="form-group">
                <label class="form-label narrow-input">Created At</label>
                <input type="text" name="created_at" class="form-control narrow-input" placeholder="Created At" value="{{ $product->created_at }}" readonly>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <div class="form-group">
                <label class="form-label narrow-input">Updated At</label>
                <input type="text" name="updated_at" class="form-control narrow-input" placeholder="Updated At" value="{{ $product->updated_at }}" readonly>
            </div>
        </div>
    </div>
@endsection
