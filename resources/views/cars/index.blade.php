@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Car Inventory</h1>
        <a href="{{ route('cars.create') }}" class="btn btn-primary">Add New Car</a>
    </div>
    
    <!-- Vue component -->
    <car-search @search="filterCars"></car-search>

    <div class="card">
        <div class="card-body">
            @if(count($cars) > 0)
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Make</th>
                            <th>Model</th>
                            <th>Year</th>
                            <th>Color</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cars as $car)
                            <tr class="car-row">
                                <td>{{ $car->id }}</td>
                                <td class="car-make">{{ $car->make }}</td>
                                <td class="car-model">{{ $car->model }}</td>
                                <td>{{ $car->year }}</td>
                                <td>{{ $car->color }}</td>
                                <td>
                                    <a href="{{ route('cars.edit', $car) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('cars.destroy', $car) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p class="text-center">No cars found. Add one to get started!</p>
            @endif
        </div>
    </div>

    <script>
        // Client-side search functionality
        window.addEventListener('load', function() {
            window.filterCars = function(searchTerm) {
                searchTerm = searchTerm.toLowerCase();
                document.querySelectorAll('.car-row').forEach(function(row) {
                    const make = row.querySelector('.car-make').textContent.toLowerCase();
                    const model = row.querySelector('.car-model').textContent.toLowerCase();
                    
                    if (make.includes(searchTerm) || model.includes(searchTerm) || searchTerm === '') {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            };
        });
    </script>
@endsection