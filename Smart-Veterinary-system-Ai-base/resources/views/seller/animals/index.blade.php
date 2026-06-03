@extends('app')

@section('content')
<div class="container py-5">
    <h3 class="mb-4">My Animals</h3>

    <a href="{{ route('animals.create') }}" class="btn btn-primary mb-3">
        + Add New Animal
    </a>
    <a href="{{ route('seller.orders.index') }}" class="btn btn-success mb-3">
        Show Received Orders
    </a>

    <table class="table table-bordered align-middle">
        <thead class="table-light">
            <tr>
                <th>Animal</th>
                <th>Gender</th>
                <th>Breed</th>
                <th>Age</th>
                <th>Price</th>
                <th>Image</th>
                <th>Status</th>
                <th width="220">Actions</th>
            </tr>
        </thead>

        <tbody>
            @forelse($animals as $animal)
            {{-- @php
            $images = json_decode($animal->images, true);
            @endphp --}}
            <tr>
                <td>{{ $animal->title }}</td>
                <td>{{ $animal->gender ?? 'N/A' }}</td>
                <td>{{ $animal->breed ?? 'N/A' }}</td>
                <td>{{ $animal->age ?? 'N/A' }}</td>
                <td>{{ $animal->price ?? 'N/A' }}</td>

                <td>
                    @if($animal->images->count() > 0)
                    <img src="{{ asset('storage/' . $animal->images->first()->image_path) }}" width="60" height="60"
                        class="rounded">
                    @else
                    No Image
                    @endif
                </td>

                <td>
                    <span class="badge bg-success">Active</span>
                </td>

                <td>
                    <a href="{{ route('animals.edit', $animal->id) }}" class="btn btn-sm btn-warning">
                        Edit
                    </a>

                    <form method="POST" action="{{ route('animals.destroy', $animal->id) }}" class="d-inline"
                        onsubmit="return confirm('Delete this animal?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="8" class="text-center">
                    No animals listed yet.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
