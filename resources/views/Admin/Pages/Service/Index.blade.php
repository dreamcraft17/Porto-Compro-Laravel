@extends('Admin.Layouts.Index')

@section('Pages')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">{{ $title }}</h1>
    <a href="{{ route('services.create') }}" class="badge bg-success"><span data-feather="plus"></span></a>
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
            @foreach ($services as $service)
            <tr>
                <td class="text-center">{{ $loop->iteration }}</td>
                <td class="text-center">{{ $service->name }}</td>
                <td class="text-center">{{ $service->detail }}</td>
                <td class="text-center">
                    @if ($service->image)
                        <img src="{{ asset($service->image) }}" alt="service Image" style="max-width: 100px;">
                    @else
                        No Image
                    @endif
                </td>
                <td class="text-center">
                <div class="btn-group" role="group">
                <form action="{{ route('services.edit', $service->id) }}" method="GET" class="action-button">
                            @csrf
                            <button type="submit" class="btn btn-warning">
                                <span data-feather="edit"></span>
                            </button>
                        </form>
                    <form action="{{ route('services.destroy', $service->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this service?')">
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
        {{ $services->links() }}
    </div>
</div>
@endsection
