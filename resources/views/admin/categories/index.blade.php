@extends('layout.admin.master')

@section('title', 'Categories manage')

@section('content-title', 'Categories manage')

@section('content')
    @if (session('msg-suc'))
        <div class="alert alert-success">{{ session('msg-suc') }}</div>
    @endif
    @if (session('msg-er'))
        <div class="alert alert-danger">{{ session('msg') }}</div>
    @endif

    
    <div class="d-flex justify-content-between">
        <div class="">
            <a href="{{ route('admin.category.create') }}" class="btn btn-primary">Create category</a>
        </div>
        <form action="{{route('admin.category.index')}}" class="col-4">
            <div class="form-group">
                <input type="search" placeholder="enter key search" class="form-control" name="key">
                @if ($keySearch != '')
                    <p>{{$keySearch}}</p>
                @endif
            </div>
        </form>
    </div>

    <table class='table'>
        <thead>
            <tr>
                <th>ID</th>
                <th>Category name</th>
                <th>Image</th>
                <th>Parent Categories</th>
                <th>Child Categories</th>
                <th>Created at</th>
                <th>Updated at</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $key => $categoryItem)
                <tr>
                    <td>{{ $categoryItem->id }}</td>
                    <td>{{ $categoryItem->name }}</td>
                    <td><img src="{{ asset($categoryItem->image) }}" width="100px" alt=""></td>
                    <td>
                        <ul>
                            @if ($categoryItem->parent)
                                    <li>{{ $categoryItem->parent->name }}</li>
                            @else
                                <li>...</li>
                            @endif
                        </ul>
                    </td>
                    <td>
                        <ul>
                            @if (!empty($categoryItem->child))
                                @foreach ($categoryItem->child as $categoryChildItem)
                                    <li>{{ $categoryChildItem->name }}</li>
                                @endforeach
                            @else
                                <li>...</li>
                            @endif
                        </ul>
                    </td>
                    <td>{{ $categoryItem->created_at }}</td>
                    <td>{{ $categoryItem->updated_at }}</td>
                    <td>
                        <a href="{{ route('admin.category.edit', $categoryItem->id) }}">
                            <button class='btn btn-warning'>Edit</button>
                        </a>
                        <form id="form-delete" action="{{ route('admin.category.destroy', $categoryItem->id) }}"
                            method="post">
                            @csrf
                            @method('DELETE')
                            <button
                                onclick="
                                event.preventDefault();
                                if(confirm('Remove it?')){
                                    this.form.submit()
                                }
                            "
                                class='btn btn-danger'>Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div>
        {{ $categories->links() }}
    </div>
@endsection
