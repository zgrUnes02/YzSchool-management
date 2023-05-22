<?php

    namespace App\Repository ;

use App\Models\FundAccount;
use App\Models\Pay;
use App\Models\Student;
use App\Models\StudentAccount;
use Illuminate\Support\Facades\DB;

    class PayRepository implements PayRepositoryInterface
    {
        //! index function :
        public function index()
        {
            $fund_balance = FundAccount::sum('debit') - FundAccount::sum('credit') ;
            $allPays = Pay::all() ;
            return view('pages.SchoolPayToStudents.index' , compact('allPays' , 'fund_balance')) ;
        }

        //! show function :
        public function show($id)
        {
            $account_fund = FundAccount::sum('debit') - FundAccount::sum('credit') ;
            $student = Student::findOrFail($id) ;
            
            return view('pages.SchoolPayToStudents.add' , compact('student' , 'account_fund')) ;
        }

        //! store function : 
        public function store($request)
        {
            $validation = $request -> validate([
                'amount' => 'required' ,
                'description' => 'required'
            ]) ;

            $account_fund = FundAccount::sum('debit') - FundAccount::sum('credit') ;
            if($account_fund < $request -> amount)
            {
                toastr() -> warning(trans('students_trans.warning_fundaccount')) ;
                return redirect() -> back() -> withErrors(['error' => trans('students_trans.warning_fundaccount')]) ;
            }

            DB::beginTransaction() ;
            try {
                //* insert into PAY table :
                $pay = new Pay() ;
                $pay -> date = date('Y-m-d') ;
                $pay -> student_id = $request -> student_id ;
                $pay -> amount = $request -> amount ;
                $pay -> description = $request -> description ;
                $pay -> save() ;

                //* insert into FUND_ACCOUNT :
                $fundAccount = new FundAccount() ;
                $fundAccount -> date = date('Y-m-d') ;
                $fundAccount -> pay_id = $pay -> id ;
                $fundAccount -> debit = 0 ;
                $fundAccount -> credit = $request -> amount ;
                $fundAccount -> description = $request -> description ;
                $fundAccount -> save() ;

                //* insert into STUDENT_ACCOUNT :
                $studentAccount =  new StudentAccount() ;
                $studentAccount -> date = date('Y-m-d') ;
                $studentAccount -> type = 'pay' ;
                $studentAccount -> student_id = $request -> student_id ;
                $studentAccount -> paym_id = $pay -> id ;
                $studentAccount -> debit = $request -> amount ;
                $studentAccount -> cedit = 0 ;
                $studentAccount -> description = $request -> description ;
                $studentAccount -> save() ;

                DB::commit() ;

                toastr() -> success(trans('students_trans.success_add_exchange')) ;
                return redirect() -> back() ;
            }
            catch(\Exception $error)
            {
                DB::rollBack() ;
                return redirect() -> back() -> withErrors(['error' => $error -> getMessage()]) ;
            }
        }

        //! update function :
        public function update($request , $id)
        {
            $validation = $request -> validate([
                'amount' => 'required' ,
                'description' => 'required'
            ]) ;
            
            $account_fund = FundAccount::sum('debit') - FundAccount::sum('credit') ;
            if($account_fund < $request -> amount)
            {
                toastr() -> warning(trans('students_trans.warning_fundaccount')) ;
                return redirect() -> route('pay.index') -> withErrors(['error' => trans('students_trans.warning_fundaccount')]) ;
            }

            DB::beginTransaction() ;
            try {
                //* insert into PAY table :
                $pay = Pay::findOrFail($id) ;
                $pay -> date = date('Y-m-d') ;
                $pay -> student_id = $request -> student_id ;
                $pay -> amount = $request -> amount ;
                $pay -> description = $request -> description ;
                $pay -> save() ;

                //* insert into STUDENTS_ACCOUNT table :
                $studentAccount = StudentAccount::where('paym_id' , $id) -> first() ;
                $studentAccount -> date = date('Y-m-d') ;
                $studentAccount -> type = 'pay' ;
                $studentAccount -> student_id = $request -> student_id ;
                $studentAccount -> paym_id = $id ;
                $studentAccount -> debit = $request -> amount ;
                $studentAccount -> cedit = 0 ;
                $studentAccount -> description = $request -> description ;
                $studentAccount -> save() ;

                //* insert into FUND_ACCOUNT table :
                $fundAccount = FundAccount::where('pay_id' , $id) -> first() ;
                $fundAccount -> date = date('Y-m-d') ;
                $fundAccount -> pay_id = $id ;
                $fundAccount -> debit = 0 ;
                $fundAccount -> credit = $request -> amount ;
                $fundAccount -> description = $request -> description ;
                $fundAccount -> save() ;

                DB::commit() ;

                toastr() -> success('the pay to student has been edited with success !') ;
                return redirect() -> back() ;

            }
            catch(\Exception $error)
            {
                DB::rollback() ;
                return redirect() -> back() -> withErrors(['error' => $error -> getMessage()]) ;
            }
        }

        //! function destroy :
        public function destroy($id)
        {
            try {
                Pay::destroy($id) ;

                toastr() -> success('the pay has been deleted with success !') ;
                return redirect() -> back() ;
            }
            catch(\Exception $error)
            {
                return redirect() -> withErrors(['error' => $error -> getMessage()]) ;
            }
        }
    }