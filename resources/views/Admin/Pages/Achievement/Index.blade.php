@extends('Admin.Layouts.Index')

@section('Pages')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">{{ $title }}</h1>
    <a href="{{ route('achievements.create') }}" class="badge bg-success"><span data-feather="plus"></span></a>
</div>
<div class="table-responsive col-12">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col" class="text-center">No.</th>
                <th scope="col" class="text-center">Name</th>
                <th scope="col" class="text-center">Detail</th>
                <th scope="col" class="text-center">Image</th>
                <th scope="col" class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($achievements as $achievement)
            <tr>
                <td class="text-center">{{ $loop->iteration }}</td>
                <td class="text-center">{{ $achievement->name }}</td>
                <td class="text-center">{{ $achievement->detail }}</td>
                <td class="text-center">
                    @if ($achievement->image)
                    <img src="{{ asset($achievement->image) }}" alt="product Image" style="max-width: 100px;">
                    @else
                    No Image
                    @endif
                </td>
                <td class="text-center">
                    <div class="btn-group" role="group">
                        <form action="{{ route('achievements.edit', $achievement->id) }}" method="GET" class="action-button">
                            @csrf
                            <button type="submit" class="btn btn-warning">
                                <span data-feather="edit"></span>
                            </button>
                        </form>
                        
                        <form action="{{ route('products.destroy', $achievement->id) }}" method="POST" class="d-inline action-button">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this product?')">
                                <span data-feather="trash"></span>
                            </button>
                        </form>
                    </div>
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $achievements->links() }}
    </div>
</div>
@endsection