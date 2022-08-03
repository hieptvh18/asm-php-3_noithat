@extends('layout.admin.master')

@section('title', 'Quản lý người dùng')

@section('page-title', 'Quản lý người dùng')

@section('content')
    <div class='my-3'>
        <a href="{{ route('admin.user.create') }}">
            <button class='btn btn-success'>Tạo mới</button>
        </a>
    </div>
    <table class='table'>
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Email</th>
                <th>Role</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($user_list as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role == 0 ? 'Guest' : 'Admin' }}</td>
                    <td>
                        @if ($user->role == 0)
                            <button data-id="{{ $user->id }}"
                                class="btn btn-secondary btn-change-permission">Permission Admin</button>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div>
        {{ $user_list->links() }}
    </div>

    {{-- jquery --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $(document).ready(function() {

            const ajaxUrl = '/ajax/change-permission/';
            const roleGuest = 0;

            const btnChangePermisstions = document.querySelectorAll('.btn-change-permission');

            btnChangePermisstions.forEach((el) => {
                el.addEventListener('click', function() {
                    userId = el.dataset.id;
                    console.log(userId);

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                    url: ajaxUrl + userId,
                    method: 'GET',
                    data: {
                        'role': 1
                    },
                    success: function(data) {
                        if (data.message == true) {
                            console.log(data);
                            location.reload();
                        }
                    },
                    error: function(er) {
                        console.log(er);
                    }

                })
                })
            })
        })
    </script>
@endsection
