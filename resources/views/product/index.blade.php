@extends('layouts.app')

@section('body')
<style>
    /* Add this CSS directly in your Blade template */
    .table-short {
        max-height: calc(100vh - 250px); /* Adjust the height as needed */
        overflow-y: auto;
    }

    /* Adjust table-responsive width */
    .slim-table-responsive {
        max-width: 90%; /* Adjust the maximum width as needed */
    }

    /* Change table background color */
    .slim-table-responsive table,
    .slim-table-responsive table td {
        background-color: #ffffff; /* Change to desired background color */
    }

    /* Change background color of table cells */
    .slim-table-responsive table th {
        background-color: #d9d9d9;
    }
</style>
<center><h1 class="mb-0">Paint Jobs</h1></center>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <!-- Main Product List -->
            <h2>Paint Jobs in Progress</h2>
            <div class="slim-table-responsive">
                <table class="table table-hover table-short">
                    <thead class="table-primary">
                        <tr>
                            <th style="width: 35%;">Plate Number</th>
                            <th style="width: 35%;">Current Color</th>
                            <th style="width: 35%;">Target Color</th>
                            <th style="width: 45%;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $count = 0; @endphp
                        @forelse($product->where('status', '!=', 'in queue')->where('status', '!=', 'done')->sortByDesc('created_at') as $rs)
                            @if($count < 5)
                                <tr>
                                    <td class="align-middle">{{ $rs->platenumber }}</td>
                                    <td class="align-middle">{{ $rs->currentcolor }}</td>
                                    <td class="align-middle">{{ $rs->targetcolor }}</td>
                                    <td class="align-middle">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <form action="{{ route('product.updateStatus', $rs->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn btn-link" style="color: red;">Mark as complete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @php $count++; @endphp
                            @else
                                @break
                            @endif
                        @empty
                            <tr>
                                <td class="text-center" colspan="4">No products available</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-6">
        <h2 style="color: white;">_</h2>
            <div class="slim-table-responsive" style="max-width: 50%;">
                <table class="table table-hover table-short">
                    <thead class="table-primary">
                        <tr>
                            <th style="width: 50%;">Shop Performance</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <td><b>Total Cars Painted: </b>{{ $product->count() }}</td>
                        </tr>
                        <tr>
                        <td><b>Breakdown</b></td>
                        </tr>
                        <tr>
                            <td>Blue: {{ $product->where('targetcolor', 'blue')->count() }}</td>
                        </tr>
                        <tr>
                            <td>Red: {{ $product->where('targetcolor', 'red')->count() }}</td>
                        </tr>
                        <tr>
                            <td>Green: {{ $product->where('targetcolor', 'green')->count() }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Paint Queue List -->
    @if($product->where('status', '!=', 'done')->where('status', '!=', 'in queue')->count() > 5)
        <h2>Paint Queue</h2>
        <div class="slim-table-responsive" style="max-width: 44%;">
            <table class="table table-hover table-short">
                <thead class="table-primary">
                    <tr>
                        <th style="width: 33.33%;">Plate Number</th>
                        <th style="width: 33.33%;">Current Color</th>
                        <th style="width: 33.33%;">Target Color</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($product->where('status', '!=', 'done')->where('status', '!=', 'in queue')->sortByDesc('created_at')->skip(5) as $queuedProduct)
                        <tr>
                            <td>{{ $queuedProduct->platenumber }}</td>
                            <td>{{ $queuedProduct->currentcolor }}</td>
                            <td>{{ $queuedProduct->targetcolor }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

</div>
@endsection
