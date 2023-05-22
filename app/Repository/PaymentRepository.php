<?php 

    namespace App\Repository ;

use App\Models\Payment;
use App\Models\Student;
use App\Models\StudentAccount;
use Illuminate\Support\Facades\DB;

    class PaymentRepository implements PaymentRepositoryInterface
    {
        public function index()
        {
            $payments = Payment::all() ;
            return view('pages.Payments.index' , compact('payments')) ;
        }

        public function show($id)
        {
            $student = Student::findOrFail($id) ;
            return view('pages.Payments.add' , compact('student')) ;
        }

        public function store($request)
        {
            $validated = $request -> validate([
                'amount' => 'required|numeric' ,
                'description' => 'required' ,
            ]) ;

            DB::beginTransaction() ;
            try {
                //* insert into PAYMENTS table :
                $payment = new Payment() ;
                $payment -> date = date('Y-m-d') ;
                $payment -> student_id = $request -> student_id ;
                $payment -> amount = $request -> amount ;
                $payment -> description = $request -> description ;
                $payment -> save() ;

                //* insert into ACCOUNTS_STUDENTS table :
                $accountStudent = new StudentAccount() ;
                $accountStudent -> date = date('Y-m-d') ;
                $accountStudent -> type = 'payment' ;
                $accountStudent -> student_id = $request -> student_id ;
                $accountStudent -> payment_id = $payment -> id ;
                $accountStudent -> debit = 0 ;
                $accountStudent -> cedit = $request -> amount ;
                $accountStudent -> description = $request -> description ;
                $accountStudent -> save() ;

                DB::commit() ;
                return redirect() -> route('payment.index') ;
                toastr() -> success('the payment has been added with success') ;
            }
            catch(\Exception)
            {
                return redirect() -> back() -> withErrors(['error' => trans('students_trans.error')]) ;
            }
            
        }

        public function update($request , $id)
        {
            DB::beginTransaction() ;
            try {
                //* update PAYMENTS table :
                $payment = Payment::findOrFail($id) ;
                $payment -> date = date('Y-m-d') ;
                $payment -> student_id = $request -> student_id ;
                $payment -> amount = $request -> amount ;
                $payment -> description = $request -> description ;
                $payment -> save() ;

                //* update PAYMENTS table :
                $studentAccount = StudentAccount::where('payment_id' , $payment -> id) -> first() ;
                $studentAccount -> date = date('Y-m-d') ;
                $studentAccount -> type = 'payment' ;
                $studentAccount -> student_id = $request -> student_id ;
                $studentAccount -> payment_id = $payment -> id ;
                $studentAccount -> debit = 0 ;
                $studentAccount -> cedit = $request -> amount ;
                $studentAccount -> description = $request -> description ;
                $studentAccount -> save() ;

                DB::commit() ;

                toastr() -> success(trans('students_trans.success_update_payment')) ;
                return redirect() -> route('payment.index') ;

            }
            catch(\Exception)
            {
                DB::rollBack() ;
                return redirect() -> back() -> withErrors(['error' => trans('students_trans.error')]) ;
            }
        }

        public function destroy($request)
        {
            try {
                $paymentWannaDelete = Payment::findOrFail($request -> id_payment) ;
                $paymentWannaDelete -> delete() ;

                toastr() -> success(trans('students_trans.success_delete_payment')) ;
                return redirect() -> back() ;
            }
            catch(\Exception)
            {
                return redirect() -> back() -> withErrors(['error' => trans('students_trans.error')]) ;
            }
        }
    }