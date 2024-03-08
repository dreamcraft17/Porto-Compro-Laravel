@extends('Admin.Layouts.Index')

@section('Pages')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">{{ $title }}</h1>
    <a href="{{ route('misi.create') }}" class="badge bg-success"><span data-feather="plus"></span></a>
</div>
<div class="table-responsive col-12">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col" class="text-center">No.</th>
                <th scope="col" class="text-center">Isi Misi</th>
                <th scope="col" class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($missions as $mission)
            <tr>
                <td class="text-center">{{ $loop->iteration }}</td>
                <td class="text-center">{!! $mission->body !!}</td>
                <td class="text-center">
                    <a href="{{ route('misi.edit', $mission->id) }}" class="badge bg-warning"><span data-feather="edit"></span></a>
                    <form action="{{ route('misi.destroy', $mission->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="badge bg-danger border-0" onclick="return confirm('Apakah Anda yakin menghapus visi ini?')">
                            <span data-feather="trash"></span>
                        </button>
                    </form>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $missions->links() }}
    </div>
</div>
@endsection