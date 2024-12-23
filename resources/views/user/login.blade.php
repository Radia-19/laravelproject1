@extends('layouts.userLayout')

@section('title','Login')

@push('css')

@endpush


@section('content')
   <div class="container">

       <div class="row">
           <div class="col-4 offset-4">
               @include('errors.error')
               <h3 class="mt-4 mb-4 text-center">Login Here!</h3>
               <form action="" class="form-group" method="POST">
                    {{ csrf_field() }}
                   <label for="">Username:</label>
                   <input type="text" class="form-control mb-3" name="username">
                   <lable for="">Password:</lable>
                   <input type="password" class="form-control mb-3" name="password">
                   <div class="text-center">
                   <input type="submit" name="submit" value="login" class="mt-3 mb-5 btn btn-block btn-primary" style="width:420px">
                   </div>
               </form>
           </div>
       </div>

   </div>
@endsection

@push('js')

@endpush

