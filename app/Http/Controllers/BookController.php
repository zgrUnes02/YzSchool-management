<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Repository\BookRepositoryInterface;
use Illuminate\Http\Request;

class BookController extends Controller
{
    protected $book ;
    public function __construct(BookRepositoryInterface $book)
    {
        $this -> book = $book ;
    }

    public function index()
    {
        return $this -> book -> index() ;
    }

    public function create()
    {
        return $this -> book -> create() ;
    }

    public function store(Request $request)
    {
        return $this -> book -> store($request) ;
    }

    public function show($file_name)
    {
        return $this -> book -> show($file_name) ;
    }

    public function edit($id)
    {
       return $this -> book -> edit($id) ;
    }

    public function update(Request $request , $id)
    {
       return $this -> book -> update($request , $id) ;
    }

    public function download($file_name)
    {
        return $this -> book -> download($file_name) ;
    }

    public function destroy(Request $request , $id)
    {
        return $this -> book -> destroy($request , $id) ;
    }
}
