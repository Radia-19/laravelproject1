@extends('layouts.userLayout')

@section('title','Login')

@push('css')

@endpush


@section('content')
    <div class="container">

        <div class="row">
            <div class="col-4 offset-4">
                @include('errors.error')
                <h3 class="mt-5 mb-5 text-center">Register Here!</h3>
                <form action="{{ route('user.register') }}" class="form-group" method="POST">
                    {{ csrf_field() }}
                    <lable for="">Username:</lable>
                    <input type="text" class="form-control mb-2" name="username">
                    <lable for="">Fullname:</lable>
                    <input type="text" class="form-control mb-2" name="full_name">
                    <lable for="">Email:</lable>
                    <input type="email" class="form-control mb-2" name="email">
                    <lable for="">Password:</lable>
                    <input type="password" class="form-control mb-2" name="password">
                    <lable for="">Confirm Password:</lable>
                    <input type="password" class="form-control mb-2" name="password_confirmation">
                    <div class="text-center">
                    <input type="submit" name="submit" value="register" class="mt-3 mb-5 btn btn-block btn-info" style="width:420px">
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection

@push('js')

@endpush

