<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>{{$view_title}}</title>
</head>

<body>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th>Tên</th>
                    <th>Tuổi</th>
                    <th>Địa chỉ</th>
                    <th>Trạng thái</th>
                </tr>
            </thead>
            <tbody>
                @foreach($user_list as $item)
                    <tr>
                        <td>{{$item['name']}}</td>
                        <td>{{$item['age']}}</td>
                        <td>{{$item['address']}}</td>
                        @if ($item['status'] === 1)
                            <td>Kích hoạt</td>
                        @else
                            <td>Không kích hoạt</td>
                        @endif
                        {{-- <td>{{$item['status'] ? 'Kích hoạt' : 'Không kích hoạt'}}</td> --}}
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
