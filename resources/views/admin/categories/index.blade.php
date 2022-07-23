@extends('layout.master')

@section('title', 'Categories manage')

@section('content-title', 'Categories manage')

@section('content')
    @if (session('msg-suc'))
        <div class="alert alert-success">{{ session('msg-suc') }}</div>
    @endif
    @if (session('msg-er'))
        <div class="alert alert-danger">{{ session('msg') }}</div>
    @endif

    <div class="form-categories">
        <div class="card card-body">
            <h4>Category form</h4>
            <form
                action="
                {{ empty($category) ? route('admin.category.store') : route('admin.category.update', $category->id) }}
                "
                method="post">
                @if (!empty($category))
                    @method('PUT')
                @endif
                @csrf
                <div class="form-group">
                    <input type="text" value="{{ !empty($category) ? $category->name : old('name') }}" name="name"
                        class="form-control">
                        @error('name')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                </div>
            </form>
        </div>
    </div>

    <table class='table'>
        <thead>
            <tr>
                <th>ID</th>
                <th>Category name</th>
                <th>Created at</th>
                <th>Updated at</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->created_at }}</td>
                    <td>{{ $category->updated_at }}</td>
                    <td>
                        <a href="{{ route('admin.category.index') }}?id={{ $category->id }}">
                            <button class='btn btn-warning'>Edit</button>
                        </a>
                        <form id="form-delete" action="{{ route('admin.category.destroy', $category->id) }}"
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
