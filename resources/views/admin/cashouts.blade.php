@extends('layouts.adminLayout')

@section('content')

    <!-- Content Row -->
    <div class="row">
        <div class="col-12">
            <h3>Cashouts</h3>
            <hr>
        </div>
    </div>
    <!-- Content Row -->
    <div class="row">
        <div class="col-12">
            <table class="table table-info table-hover table-bordered text-dark">
                <thead>
                  <tr>
                    <th scope="col">User</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Cashout Date</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                @forelse($cashouts as $cashout)
                  <tr>
                    <td scope="row">{{ $cashout->user->username }}</td>
                    <td>{{ $cashout->amount }}</td>

                    <td>{{{ date('Y-m-d',strtotime($cashout->created_at)) }}}</td>
                    <td>
                        @if($cashout->status == 'pending')
                        <a class="btn btn-outline-success" onclick="return confirm('Are you sure?')" href="{{ route('admin.cashout.update',[$cashout->id,'approved']) }}">Approve</a>
                        <a class="btn btn-outline-danger" onclick="return confirm('Are you sure?')" href="{{ route('admin.cashout.update',[$cashout->id,'declined']) }}">Decline</a>
                        @else
                            {{ strtoupper($cashout->status)}}
                        @endif
                    </td>
                  </tr>
                @empty
                  <tr>
                    <td class="text-center" colspan="5">No Data Found!</td>
                  </tr>
                @endforelse
                </tbody>
              </table>
              {{ $cashouts->links() }}
        </div>
    </div>


@endsection
