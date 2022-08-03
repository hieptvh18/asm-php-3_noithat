@extends('layout.admin.master')

@section('title', 'Tạo mới người dùng')

@section('page-title', 'Tạo mới người dùng')

@section('content')
    <form
        action=""
        method="POST"
        enctype="multipart/form-data"
    >
        @csrf
        

        <div>
            <button class='btn btn-primary'>Submit</button>
            <button type='reset' class='btn btn-warning'>Nhập lại</button>
        </div>



    </form>
@endsection
