@extends('layouts.app')
 
@section('body')
    <h1 class="mb-0">Car Details</h1>
    <hr />
    <form action="{{ route('product.store') }}" method="POST">
        @csrf
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="platenumber" class="form-control" placeholder="Plate No.">
            </div>
            <div class="col">
                <input type="text" name="currentcolor" class="form-control" placeholder="Current Color">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="targetcolor" class="form-control" placeholder="Target Color">
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection
