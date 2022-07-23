@extends('layout.master')

@section('title', 'Tạo mới người dùng')

@section('content-title', 'Tạo mới người dùng')

@section('content')
    <form
        action="{{isset($user)
            ? route('users.update', $user->id)
            : route('users.store')}}
        "
        method="POST"
        enctype="multipart/form-data"
    >
        @csrf
        @if (isset($user))
            @method('PUT')
        @endif
        <div class='form-group'>
            <label for="">Tên</label>
            <input type="text" name='name' class='form-control' value="{{isset($user) ? $user->name : ''}}">
        </div>
        <div class='form-group'>
            <label for="">Email</label>
            <input type="email" name='email' class='form-control' value="{{isset($user) ? $user->email : ''}}">
        </div>
        <div class='form-group'>
            <label for="">Mật khẩu</label>
            <input type="password" name='password' class='form-control'>
        </div>
        <div class='form-group'>
            <label for="">Mã tài khoản</label>
            <input type="text" name='username' class='form-control' value="{{isset($user) ? $user->username : ''}}">
        </div>
        <div class='form-group'>
            <label for="">Ngày sinh</label>
            <input type="date" name='birthday' class='form-control'  value="{{isset($user) ? $user->birthday : ''}}">
        </div>
        <div class='form-group'>
            <label for="">SDT</label>
            <input type="text" name='phone' class='form-control'  value="{{isset($user) ? $user->phone : ''}}">
        </div>
        <div class='form-group'>
            <label for="">Ảnh đại diện</label>
            <input type="file" name='avatar' class='form-control'>
            @if (isset($user) && $user->avatar)
                <img src="{{asset($user->avatar)}}" alt="{{$user->name}}" width="100">
            @endif
        </div>
        <div class='form-group'>
            <label for="">Phòng ban</label>
            <select name="room_id" class='form-control'>
                @foreach ($rooms as $item)
                    <option
                        value="{{$item->id}}"
                        {{(isset($user) && $user->room_id === $item->id) ? 'selected' : ''}}
                    >{{$item->name}}</option>
                @endforeach
            </select>
        </div>
        <div class='form-group'>
            <label for="">Quyền</label>
            <input type="radio" name='role' value="1" {{(isset($user) && $user->role === 1) ? 'checked' : ''}}>GĐ
            <input type="radio" name='role' value="0" {{(isset($user) && $user->role === 0) ? 'checked' : ''}}>NV
        </div>
        <div class='form-group'>
            <label for="">Trạng thái</label>
            <input type="radio" name='status' value="1" {{(isset($user) && $user->status === 1) ? 'checked' : ''}}>Kích hoạt
            <input type="radio" name='status' value="0" {{(isset($user) && $user->status === 0) ? 'checked' : ''}}>K kích hoạt
        </div>

        <div>
            <button class='btn btn-primary'>{{isset($user) ? 'Cập nhật' : 'Tạo mới'}}</button>
            <button type='reset' class='btn btn-warning'>Nhập lại</button>
        </div>



    </form>
@endsection
