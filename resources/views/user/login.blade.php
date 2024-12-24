@extends('layouts.userLayout')

@section('title','Login')

@push('css')

@endpush


@section('content')
   <div class="container">

       <div class="row">
           <div class="col-4 offset-4">
               @include('errors.error')
               <div class="mt-5" style="text-align: center;">
                <img style="height: 70px;"  src="{{ asset('image/7j0XhM-LogoMakr.png')}}"  alt="Example Image">
               </div>
               <h3 class="mt-3 mb-5 text-center">Login Here!</h3>
               <form action="" class="form-group" method="POST">
                   @csrf
                   <label for="">Username:</label>
                   <input type="text" class="form-control mt-2 mb-3" name="username">
                   <lable for="">Password:</lable>
                   <input type="password" class="form-control mb-3" name="password">
                   <div class="text-center">
                   <input type="submit" name="submit" value="login" class="mt-3 mb-3 btn btn-primary w-100">
                   </div>
                   <div class="text-center mb-5">
                    <p class="mt-1 ">Don't Have An Account? <a href="{{ url('/register') }}">Register Here</a></p>
                    <p class="text-white mb-2">nothing</p>
                </div>
               </form>
           </div>
       </div>

   </div>
@endsection

@push('js')

@endpush

