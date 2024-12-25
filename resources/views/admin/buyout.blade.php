@extends('layouts.adminLayout')

@section('content')

    <!-- Content Row -->
    <div class="row">
        <div class="col-12">
            <h3>Buy-out</h3>
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
                @forelse($images as $image)
                  <tr>
                    <th scope="row">{{ $image->id }}</th>
                    <td><img src="{{ asset('uploads').'/'.$image->image }}" style="height: 200px; width: 200px;"></td>
                    <td>{{ $image->user->username }}</td>
                    <td>{{{ date('Y-m-d',strtotime($image->created_at)) }}}</td>
                    <td>
                        <form class="row gx-2 align-items-center" action="{{ route('admin.buyout.update') }}" method="POST">
                            @csrf
                            <div class="col-auto">
                                <input type="hidden" name="image_id" value="{{ $image->id }}">
                            </div>

                            <div  class="col-auto">
                              <select class="form-control" name="status" id="">
                                <option value="buy-out">Buyout</option>
                                <option value="approve-unsellable">Unsellable</option>
                              </select>
                            </div>
                            <div class="col-auto">
                                <input class="form-control" type="number" name="rate" step="0.1" placeholder="Amount">
                            </div>
                            <div class="col-auto">
                              <button type="submit" class="btn btn-sm btn-primary" value="Save">Submit</button>
                            </div>
                          </form>
                    </td>
                  </tr>
                @empty
                  <tr>
                    <td class="text-center" colspan="5">No Data Found!</td>
                  </tr>
                @endforelse
                </tbody>
              </table>
              {{ $images->links() }}
        </div>
    </div>


@endsection

{{--  --}}
