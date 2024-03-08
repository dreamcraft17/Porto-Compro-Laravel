@extends('Admin.Layouts.Index')

@section('Pages')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">{{ $title }}</h1>
    <a href="{{ route('testimonies.create') }}" class="badge bg-success"><span data-feather="plus"></span></a>
</div>
<div class="table-responsive col-12">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col" class="text-center">No.</th>
                <th scope="col" class="text-center">Name</th>
                <th scope="col" class="text-center">Message</th>
                <th scope="col" class="text-center">Image</th>
                <th scope="col" class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($testimonies as $testimony)
            <tr>
                <td class="text-center">{{ $loop->iteration }}</td>
                <td class="text-center">{{ $testimony->name }}</td>
                <td class="text-center">{{ $testimony->message }}</td>
                <td class="text-center">
                    @if ($testimony->image)
                        <img src="{{ asset($testimony->image) }}" alt="Testimony Image" style="max-width: 100px;">
                    @else
                        No Image
                    @endif
                </td>
                <td class="text-center">
                    <!-- <a href="{{ route('testimonies.edit', $testimony->id) }}" class="badge bg-warning"><span data-feather="edit"></span></a> -->
                    <form action="{{ route('testimonies.destroy', $testimony->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="badge bg-danger border-0" onclick="return confirm('Are you sure you want to delete this testimony?')">
                            <span data-feather="trash"></span>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $testimonies->links() }}
    </div>
</div>
@endsection
