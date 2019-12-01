@extends('master')
@section('title','Xem chi tiết sách')
@section('content')

<h1>Xem chi tiết sách</h1>
<a href="{{ url('books') }}">< quay lại</a>
<hr />

<div class="form-group row">
    <label class="col-sm-2 col-form-label"><b>Id:</b></label>
    <label class="col-sm-2 col-form-label">{{ $book->id }}</label>
</div>

<div class="form-group row">
    <label class="col-sm-2 col-form-label"><b>Tên sách:</b></label>
    <label class="col-sm-2 col-form-label">{{ $book->name_book }}</label>   
</div>

<div class="form-group row">
    <label class="col-sm-2 col-form-label"><b>Thể loại:</b></label>
    <label class="col-sm-2 col-form-label">{{ $book->category_id }}</label>
</div>

<div class="form-group row">
    <label class="col-sm-2 col-form-label"><b>Tác giả:</b></label>
    <label class="col-sm-2 col-form-label">{{ $book->author }}</label>
</div>

<div class="form-group row">
    <label class="col-sm-2 col-form-label"><b>Số lượng:</b></label>
    <label class="col-sm-2 col-form-label">{{ $book->quantity }}</label>
</div>

<div class="form-group row">
    <label class="col-sm-2 col-form-label"><b>Mô tả:</b></label>
    <label class="col-sm-2 col-form-label">{{ $book->describe }}</label>
</div>

<br>
<div class="form-group row">
    <label class="col-sm-2 col-form-label"></label>
    <div class="col-sm-4">
        <a href="{{ url('books/'.$book->id.'/edit') }}" class="btn btn-info mr-2">Sửa</a>
        <button type="button" data-target="#deleteBookModal{{ $book->id }}" data-toggle="modal" class="btn btn-danger">Xóa</button>
    </div>
</div>
        
@include('books.popup_delete');

@endsection