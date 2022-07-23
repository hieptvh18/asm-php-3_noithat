{{-- 1. Đang dùng layout nào --}}
@extends('layout.master')

{{-- 2. Nơi thay đổi hiển thị gì --}}
{{-- 2.1 Nếu nội dung thay đổi là text --}}
@section('title', 'Đăng ký thông tin')

{{-- 2.2 Nếu nội dung thay đổi là cụm thẻ --}}
@section('content')
    <form action="{{route('regis-success')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="">Tên</label>
            <input type="text" name='name' class="form-control">
        </div>
        <div class="form-group">
            <label for="">Email</label>
            <input type="email" name='email' class="form-control">
        </div>
        <div class="form-group">
            <label for="">Password</label>
            <input type="password" name='password' class="form-control">
        </div>
        <div class="form-group">
            <button class="btn btn-success">Đăng ký</button>
        </div>
    </form>
@endsection
