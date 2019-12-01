<?php

namespace App\Http\Controllers;

use App\Books;
use App\Categorys;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $books = Books::with('categorys');
            // return Datatables::of($books)->make(true);
            if(!empty($_GET["category"])){
                $books->where('category_id', $_GET["category"]);
            }
            return datatables::of($books)
            ->editColumn('action', function ($book) {
                return '<a href="books/' . $book->id . '" class="btn btn-info btn-sm">Xem</a>
                <a href="books/' . $book->id . '/edit" class="btn btn-primary btn-sm ml-2 mr-2">Sửa</a>';
            })
            ->rawColumns(['action'])
            ->toJson();
        }
        // $books = Books::paginate(20);
        $categorys = Categorys::all();

        return view('books/index',compact('categorys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorys = Categorys::all();
        //print_r($categorys); die();
        return view('books/create',compact('categorys'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name_book' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'quantity' => 'required|integer',
            'describe' => 'required|string',
        ],
        [
            'name_book.required'=>'Vui lòng nhập tên sách',
            'author.required'=>'Vui lòng nhập tác giả',
            'quantity.required'=>'Vui lòng nhập số lượng',
            'quantity.integer'=>'Sai định dạng số lượng',
            'describe.required' => 'Vui lòng nhập mô tả',
        ]
        );
        $book = new Books();
        $book->name_book = $request->name_book;
        $book->author = $request->author;
        $book->category_id = $request->category;
        $book->quantity = $request->quantity;
        $book->describe = $request->describe;
        $book->save();
        
        return redirect('/books')->with('thanhcong','Thêm sách thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Books  $books
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Books::find($id);
        return view('books/show',compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Books  $books
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Books::find($id);
        $categorys = Categorys::all();
        return view('books/edit',compact('book','categorys'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Books  $books
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name_book' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'quantity' => 'required|integer',
            'describe' => 'required|string',
        ],
        [
            'name_book.required'=>'Vui lòng nhập tên sách',
            'author.required'=>'Vui lòng nhập tác giả',
            'quantity.required'=>'Vui lòng nhập số lượng',
            'quantity.integer'=>'Sai định dạng số lượng',
            'describe.required' => 'Vui lòng nhập mô tả',
        ]
        );
        Books::find($id)->update($request->all());
        return redirect('/books')->with('thanhcong','Sửa sách thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Books  $books
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Books::find($id)->delete();
        return redirect('/books')->with('thanhcong','Xóa sách thành công');
    }
}
