<!-- resources/views/product/edit.blade.php -->
@extends('layouts.app')

@section('body')
    <h1 class="mb-0">Edit</h1>
    <hr />
    <div class="mb-3">
        <label class="form-label">Current Status</label>
        <div class="badge {{ $product->status === 'in the process' ? 'badge-warning' : ($product->status === 'done' ? 'badge-success' : 'badge-secondary') }}">
            {{ $product->status }}
        </div>
    </div>
    <form action="{{ route('product.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Plate Number</label>
                <input type="text" name="platenumber" class="form-control" placeholder="platenumber" value="{{ $product->platenumber }}" >
            </div>
            <div class="col mb-3">
                <label class="form-label">Current Color</label>
                <input type="text" name="currentcolor" class="form-control" placeholder="currentcolor" value="{{ $product->currentcolor }}" >
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Target Color</label>
                <input type="text" name="targetcolor" class="form-control" placeholder="targetcolor" value="{{ $product->targetcolor }}" >
            </div>
            <div class="col mb-3">
                <label class="form-label">Status</label>
                <textarea class="form-control" name="status" placeholder="status">{{ $product->status }}</textarea>
            </div>
        </div>
        @if ($product->status !== 'done')
            <div class="row">
                <div class="d-grid">
                    <button class="btn btn-warning">Update</button>
                </div>
            </div>
        @else
            <div class="alert alert-warning" role="alert">
                This product has already been completed. You cannot update it further.
            </div>
        @endif
    </form>
@endsection
