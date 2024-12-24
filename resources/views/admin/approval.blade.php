@extends('layouts.adminLayout')

@section('content')

    <!-- Content Row -->
    <div class="row">
        <div class="col-12">
            <h3>Approval</h3>
            <hr>
        </div>
    </div>
    <!-- Content Row -->
    <div class="row">
        <div class="col-12">
            <table class="table table-info table-hover table-bordered text-dark">
                <thead>
                  <tr>
                    <th scope="col">Image Id</th>
                    <th scope="col">Image</th>
                    <th scope="col">User</th>
                    <th scope="col">Upload Date</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                @forelse($pendingImages as $image)
                  <tr>
                    <th scope="row">{{ $image->id }}</th>
                    <td><img src="{{ asset('uploads').'/'.$image->image }}" style="height: 200px; width: 200px;"></td>
                    <td>{{ $image->user->username }}</td>
                    <td>{{{ date('Y-m-d',strtotime($image->created_at)) }}}</td>
                    <td>
                        <a class="btn btn-outline-success" onclick="return confirm('Are you sure?')" href="{{ route('admin.approval.update',[$image->id,'approved']) }}">Approve</a>
                        <a class="btn btn-outline-danger" onclick="return confirm('Are you sure?')" href="{{ route('admin.approval.update',[$image->id,'declined']) }}">Decline</a>
                    </td>
                  </tr>
                @empty
                  <tr>
                    <td class="text-center" colspan="5">No Data Found!</td>
                  </tr>
                @endforelse
                </tbody>
              </table>
              {{ $pendingImages->links() }}
        </div>
    </div>


@endsection
