@extends('layout.admin.master')

@section('title', 'Categories manage')

@section('content-title', 'Addd Categories')

@section('content')
    @if (session('msg-suc'))
        <div class="alert alert-success">{{ session('msg-suc') }}</div>
    @endif
    @if (session('msg-er'))
        <div class="alert alert-danger">{{ session('msg') }}</div>
    @endif

    <a href="{{route('admin.category.index')}}" class="btn btn-success">List</a>
    <div class="form-categories">
        <div class="card card-body">
            <h4>Create category</h4>
            <form action="{{ route('admin.category.store') }}
            " method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <input type="text" value="{{ !empty($category) ? $category->name : old('name') }}" name="name"
                        class="form-control">
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Parent category</label>
                    @if (count($categoryArray))
                        <select name="parent_id" id="" class="form-control col-6">
                            <option value="" >---Choose parent category---</option>
                            @foreach ($categoryArray as $category)
                                <option value="{{ $category['id'] }}">
                                    {{str_repeat('--',$category['level'])}} {{ $category['id'] }}</option>
                            @endforeach
                        </select>
                    @endif
                </div>
                <div class="form-group">
                    <label for="">Image</label>
                    <input type="file" name="image" class="form-control">
                    @error('image')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <button type="submit" class="btn btn-secondary">Submit</button>
            </form>
        </div>
    </div>

@endsection
