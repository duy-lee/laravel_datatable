@extends('master')
@section('title','Trang chủ')
@section('content')

<h1>Quản lý sách</h1>

<div class="form-group">
    <a href="{{ url('books/create') }}">Thêm sách</a>
</div>
<div class="form-group">
    <select class="form-control col-3" id="filter_category">
        <option value="">Chọn</option>
        @foreach ($categorys as $item)
        <option value="{{ $item->id }}">{{ $item->name_category }}</option>
        @endforeach
    </select>
</div>
<hr />

@if(Session::has('thanhcong'))
    <div class="alert alert-success">{{Session::get('thanhcong')}}</div>
@endif

<table class="table table-striped dataTable" id="books_table">
    <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Tên sách</th>
            <th scope="col">Thể loại</th>
            <th scope="col">Tác giả</th>
            <th scope="col">Số lượng</th>
            <th scope="col">Mô tả</th>
            <th scope="col">Thao tác</th>
        </tr>
    </thead>
</table>

@push('scripts')
<script>
$(document).ready( function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#books_table').DataTable({
        processing: true,
        serverSide: true,
        // ajax: "{!! route('books.index') !!}",
        ajax: {
          url: "{{ route('books.index') }}",
          type: 'GET',
          data: function (d) {
          d.category = $('#filter_category').children("option:selected"). val();
          }
        },
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name_book', name: 'name_book' },
            { data: 'categorys.name_category', name: 'categorys.name_category', sortable:false},
            { data: 'author', name: 'author' },
            { data: 'quantity', name: 'quantity' },
            { data: 'describe', name: 'describe' },
            { data: 'action', name: 'action', sortable:false, searchable:false},
        ]
    });

    $('#filter_category').change(function(){
     $('#books_table').DataTable().draw(true);
  });
});
</script>
@endpush

@endsection