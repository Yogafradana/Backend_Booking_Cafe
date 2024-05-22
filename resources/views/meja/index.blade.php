@include('layouts.sidebar')

<div class="card shadow">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                    <h3 class="text-center">Data Meja</h3>
                    <div>
                        <a href="{{ route('meja.create') }}" class="btn btn-primary mb-3">Add Table</a>
                    </div>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nomor Meja</th>
                        <th>Kapasitas</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($mejas as $meja)
                    <tr>
                        <td>{{ $meja->meja_id }}</td>
                        <td>{{ $meja->nomor_meja }}</td>
                        <td>{{ $meja->kapasitas }}</td>
                        <td>{{ $meja->status }}</td>
                        <td>
                            <a href="{{ route('meja.edit', $meja->meja_id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form method="POST" action="{{ route('meja.destroy', $meja->meja_id) }}" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin ingin menghapus data meja ini?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

    @include('layouts.footer')
