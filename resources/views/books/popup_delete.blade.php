<div class="modal fade" id="deleteBookModal{{ $book->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thông báo!</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Bạn muốn xóa sách "{{ $book->name_book }}"?</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Hủy</button>
                {{-- <a class="btn btn-danger" href="{{ url('user/xoa-user/'.$user->id) }}">Xóa</a> --}}
                <form action="{{ url('books/'.$book->id) }}" method="POST">
                    @csrf
                    {{ method_field('DELETE') }}
                    <button type="submit" class="btn btn-danger">Xóa</button>
                </form>
            </div>
            </div>
        </div>
    </div>