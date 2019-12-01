@extends('master')
@section('title','Sửa sách')
@section('content')

<h1>Sửa sách</h1>
<a href="{{ url('books') }}">< quay lại</a>
<hr />
<form action="{{ url('books/'.$book->id) }}" method="POST">
    @csrf
    {{method_field('PATCH') }}
    
    @if(count($errors)>0)
        @foreach ($errors->all() as $err)
            <div class="alert alert-danger">{{$err}}</div>
            @break;
        @endforeach
    @endif

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Tên sách</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="name_book" value="{{ $book->name_book }}">
        </div>
    </div>
    
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Thể loại</label>
        <div class="col-sm-4">
            
            <select class="form-control" name="category">
                @foreach ($categorys as $category)
                <option value="{{ $category->id }}" {{ ($book->category_id==$category->id) ? 'selected' : '' }}>{{ $category->name_category }}</option>
                @endforeach
            </select>
        </div>  
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Tác giả</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="author" value="{{ $book->author }}">
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Số lượng</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="quantity" value="{{ $book->quantity }}">
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Mô tả</label>
        <div class="col-sm-4">
            <textarea class="form-control" name="describe">{{ $book->describe }}</textarea>
        </div>
    </div>

    <br>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label"></label>
        <div class="col-sm-4">
            <button class="btn btn-primary mr-2" type="submit">Sửa</button>
            <button class="btn btn-danger" type="reset">Reset</button>
        </div>
    </div>
</form>
        
@endsection

