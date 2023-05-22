<?php 

    namespace App\Repository ;

use App\Models\FeeInvoices;
use App\Models\FundAccount;
use App\Models\Receipt;
use App\Models\Student;
use App\Models\StudentAccount;
use Exception;
use Illuminate\Support\Facades\DB;

    class Receiptrepository implements ReceiptrepositoryInterface
    {
        //* function INDEX :
        public function index()
        {
            $receipts = Receipt::all() ;
            return view('pages.Receipt.index' , compact('receipts')) ;
        }

        //* function SHOW :
        public function show($id)
        {
            try {
                $student = Student::findOrFail($id) ;
                return view('pages.Receipt.add' , compact('student')) ;
            }
            catch(\Exception )
            {
                return redirect() -> back() -> withErrors(['error' => trans('students_trans.error')]) ;
            }
        }

        //* function STORE :
        public function store($request)
        {
            $validated = $request -> validate([
                'debit' => 'required|numeric' ,
                'description' => 'required'
            ]);

            DB::beginTransaction() ;
            try {
                //* check if the student has an invoices :
                $ifTheStudentHasInvoices = FeeInvoices::where('student_id' , $request -> student_id) -> pluck('id') ;
                if($ifTheStudentHasInvoices -> count() == 0)
                {
                    return redirect() -> back() -> withErrors(['error' => trans('students_trans.student_no_invoices')]) ;
                }
                // return $request ;
                //* insert in RECEIPT :
                $receipt = new Receipt() ;
                $receipt -> date = date('Y-m-d') ;
                $receipt -> student_id = $request -> student_id ;
                $receipt -> debit = $request -> debit ;
                $receipt -> description = $request -> description ;
                $receipt -> save() ;

                //* insert in STUDENTS_ACCOUNTS :
                $studentAccount = new StudentAccount() ;
                $studentAccount -> date = date('Y-m-d') ;
                $studentAccount -> type = 'receipt' ;
                $studentAccount -> student_id = $request -> student_id ;
                $studentAccount -> receipt_id = $receipt -> id ;
                $studentAccount -> debit = 0 ;
                $studentAccount -> cedit = $request -> debit ;
                $studentAccount -> description = $request -> description ;
                $studentAccount -> save() ;

                //* insert in FUND_ACCOUNTS :
                $fundAccount = new FundAccount() ;
                $fundAccount -> date = date('Y-m-d') ;
                $fundAccount -> receipt_id = $receipt -> id ;
                $fundAccount -> debit = $request -> debit ;
                $fundAccount -> credit = 0 ;
                $fundAccount -> description = $request -> description ;
                $fundAccount -> save() ;

                DB::commit() ;
                toastr() -> success(trans('students_trans.add_receipt_success')) ;
                return redirect() -> route('receipt.index') ;
            }
            catch(\Exception $error)
            {
                DB::rollBack() ;
                return redirect() -> back() -> withErrors(['error' => $error -> getMessage()]) ;
            }
        }

        //* function DESTROY :
        public function destroy($id)
        {
            try {
                $ReceiptWannaDelete = Receipt::findOrFail($id) ;
                $ReceiptWannaDelete -> delete() ;
    
                toastr() -> success(trans('students_trans.delete_message_receipt')) ;
                return redirect() -> back() ;
            }
            catch(\Exception)
            {
                return redirect() -> back() -> withErrors(['error' => trans('students_trans.error')]) ;
            }
        }

        public function edit($request , $id)
        {
            DB::beginTransaction() ;
            try {
                //* edit RECEIPT :
                $receipt_edit = Receipt::findOrFail($id) ;
                $receipt_edit -> date = date('Y-m-d') ;
                $receipt_edit -> student_id = $request -> student_id ;
                $receipt_edit -> debit = $request -> debit ;
                $receipt_edit -> description = $request -> description ;
                $receipt_edit -> save() ;

                //* edit STUDENTS_ACCOUNTS :
                $studentAccount = StudentAccount::where('receipt_id' , $id) -> first() ;
                $studentAccount -> date =  date('Y-m-d') ;
                $studentAccount -> type = 'receipt' ;
                $studentAccount -> student_id = $request -> student_id ;
                $studentAccount -> debit = 0 ;
                $studentAccount -> cedit = $request -> debit ;
                $studentAccount -> description = $request -> description ;
                $studentAccount -> save() ;

                //* edit FUND_ACCOUNTS :
                $fundAccount = FundAccount::where('receipt_id' , $id) -> first() ;
                $fundAccount -> date = date('Y-m-d') ;
                $fundAccount -> receipt_id = $id ;
                $fundAccount -> debit = $request -> debit ;
                $fundAccount -> credit = 0 ;
                $fundAccount -> description = $request -> description ;
                $fundAccount -> save() ;

                DB::commit() ;
                toastr() -> success(trans('students_trans.edit_message_receipt')) ;
                return redirect() -> route('receipt.index') ;
            }
            catch(\Exception $error)
            {
                DB::rollBack() ;
                return redirect() -> route('receipt.index') -> withErrors(['error' => $error -> getMessage()]) ;
            }
            

        }
    }