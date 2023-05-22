<?php

    namespace App\Repository ;
    use App\Http\Traits\BookUploadTrait;
    use App\Models\Book;
    use App\Models\Grade;

    class BookRepository implements BookRepositoryInterface
    {
        use BookUploadTrait ;

        //* function INDEX() ;
        public function index()
        {
            $books = Book::all() ;
            return view('pages.Books.index' , compact('books')) ;
        }

        //* function CREATE() ;
        public function create()
        {
            $grades = Grade::all() ;
            return view('pages.Books.create' , compact('grades')) ;
        }

        //* function STORE() ;
        public function store($request)
        {
            $validation = $request -> validate([
                'book_name'    => 'required' ,
                'book_file'    => 'required' ,
                'Grade_id'     => 'required' ,
                'Classroom_id' => 'required' ,
                'section_id'   => 'required' ,
            ]) ;

            try 
            {
                $book = new Book() ;
                $book -> title        = $request -> book_name ;
                $book -> file_name    = $request -> book_file -> getClientOriginalName() ;
                $book -> grade_id     = $request -> Grade_id ;
                $book -> classroom_id = $request -> Classroom_id ;
                $book -> section_id   = $request -> section_id ;
                $book -> teacher_id   = auth()   -> user() -> id ;
                $book -> save() ;

                $this -> uploadBook($request , 'book_file') ;

                toastr() -> success(trans('library.success_add')) ;
                return redirect() -> back() ;
            }
            catch(\Exception $error)
            {
                toastr() -> error(trans('attendance.error')) ;
                return redirect() -> back() -> withErrors(['error' => $error -> getMessage()]) ;
            }
        }

        //* function DESTROY() ;
        public function destroy($request , $id)
        {
            try{
                Book::where('id' , $id) -> delete() ;
                $this -> deleteBook($request -> book_name) ;

                toastr() -> success(trans('library.success_delete')) ;
                return redirect() -> back() ;
            }
            catch(\Exception $error)
            {
                toastr() -> error(trans('attendance.error')) ;
                return redirect() -> back() -> withErrors(['error' => $error -> getMessage()]) ;
            }
        }

        //* function DOWNLOAD() ;
        public function download($file_name)
        {
            try
            {
                return response() -> download('attachement/book/' . $file_name) ;
            }
            catch(\Exception $error)
            {
                toastr() -> error(trans('attendance.error')) ;
                return redirect() -> back() -> withErrors(['error' => $error -> getMessage()]) ;
            }
        }

        //* function SHOW() ;
        public function show($file_name)
        {
            try
            {
                return response() -> file('attachement/book/' . $file_name) ;
            }
            catch(\Exception $error)
            {
                toastr() -> error(trans('attendance.error')) ;
                return redirect() -> back() -> withErrors(['error' => $error -> getMessage()]) ;
            }
        }

        //* function EDIT() ;
        public function edit($id)
        {
            try
            {
                $grades = Grade::all() ;
                $book = Book::findOrFail($id) ;
                return view('pages.Books.edit' , compact('book' , 'grades')) ;
            }
            catch(\Exception $error)
            {
                toastr() -> error(trans('attendance.error')) ;
                return redirect() -> back() -> withErrors(['error' => $error -> getMessage()]) ;
            }
        }

        //* function UPDATE() ;
        public function update($request , $id)
        {
            $validation = $request -> validate([
                'book_name'     => 'required' ,
                'Grade_id'      => 'required' ,
                'Classroom_id'  => 'required' ,
                'section_id'    => 'required' ,
            ]) ;

            try
            {
                $book = Book::findOrFail($id) ;

                //! check if the teacher add new file ---------------------------------------------- :
                if($request -> hasfile('book_file_new'))
                {
                    $this -> deleteBook($request -> old_book) ;
                    $this -> uploadBook($request , 'book_file_new') ;

                    $book -> file_name = $request -> book_file_new -> getClientOriginalName() ;
                }
                else
                {
                    $book -> file_name = $book -> file_name ;
                }
                //! ---------------------------------------------------------------------------------
        
                $book -> title = $request -> book_name ;
                $book -> grade_id = $request -> Grade_id ;
                $book -> classroom_id = $request -> Classroom_id ;
                $book -> section_id = $request -> section_id ;
                $book -> teacher_id = auth() -> user() -> id ;
                $book -> save() ;

                toastr() -> success(trans('library.edit_success')) ;
                return redirect() -> route('library.index') ;
            }
            catch(\Exception $error)
            {
                toastr() -> error(trans('attendance.error')) ;
                return redirect() -> back() -> withErrors(['error' => $error -> getMessage()]) ;
            }
        }
    } 