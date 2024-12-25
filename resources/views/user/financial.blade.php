@extends('layouts.userLayout')

@section('title','My Financial')

@push('css')

@endpush


@section('content')
   <div class="container">
       <div class="row">
        <div class="col-8 offset-2 mt-2">
            @include('errors.error')
             My Financial :
             <hr>

             <div class="col-12 text-center mt-2 mb-5">

                <h3 class="mt-5 mb-3">My Balance: {{ $myFinancial->balance }}$</h3>
                <a class="btn btn-outline-primary {{ $myFinancial->balance > 10 ? '':'disabled' }}" href="{{ route('user.myFinancial.cashout') }}">Cashout</a>
             </div>
             <hr>
        </div>
        <!-- Content Row -->
        <div class="row">
            <div class="col-12 mt-4">
                <table class="table table-light table-hover table-bordered text-dark">
                    <thead>
                      <tr>
                        <th scope="col">Financial ID</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Status</th>
                        <th scope="col">Cashout Date</th>
                      </tr>
                    </thead>
                    <tbody>
                    @forelse($myCashouts as $cashout)
                      <tr>
                        <th scope="row">{{ $cashout->id }}</th>
                        <td>{{ $cashout->amount }}</td>
                        <td>{{ strtoupper($cashout->status) }}</td>
                        <td>{{{ \Carbon\Carbon::parse($cashout->created_at)->diffForHumans() }}}</td>

                      </tr>
                    @empty
                      <tr>
                        <td class="text-center" colspan="5">No Data Found!</td>
                      </tr>
                    @endforelse
                    </tbody>
                  </table>
                  {{ $myCashouts->links() }}
            </div>
           </div>
       </div>
   </div>
@endsection

@push('js')

@endpush
