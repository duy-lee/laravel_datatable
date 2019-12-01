@extends('master')
@section('title','Thêm sách')
@section('content')

<h1>Thêm sách mới</h1>
<a href="{{ url('books') }}">< quay lại</a>
<hr />
<form action="{{ url('/books') }}" method="POST">
    @csrf
    @if(count($errors)>0)
        @foreach ($errors->all() as $err)
            <div class="alert alert-danger">{{$err}}</div>
            @break;
        @endforeach
    @endif

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Tên sách</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="name_book" value="{{ old('name_book') }}">
        </div>
    </div>
    
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Thể loại</label>
        <div class="col-sm-4">
            
            <select class="form-control" name="category">
                @foreach ($categorys as $category)
                <option value="{{ $category->id }}" {{ (old('category')==$category->id) ? 'selected' : '' }}>{{ $category->name_category }}</option>
                @endforeach
            </select>
        </div>  
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Tác giả</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="author" value="{{ old('author') }}">
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Số lượng</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="quantity" value="{{ old('quantity') }}">
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Mô tả</label>
        <div class="col-sm-4">
            <textarea class="form-control" name="describe">{{ old('describe') }}</textarea>
        </div>
    </div>

    <br>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label"></label>
        <div class="col-sm-4">
            <button class="btn btn-primary mr-2" type="submit">Thêm</button>
            <button class="btn btn-danger" type="reset">Reset</button>
        </div>
    </div>
</form>
        
@endsection

