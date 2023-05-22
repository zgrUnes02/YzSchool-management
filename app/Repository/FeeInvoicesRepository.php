<?php

    namespace App\Repository ;

    use App\Models\Fee;
    use App\Models\FeeInvoices;
    use App\Models\Student;
    use App\Models\StudentAccount;
    use Illuminate\Support\Facades\DB;

    class FeeInvoicesRepository implements FeeInvoicesRepositoryInterface
    {
        public function index()
        {
            $Fee_invoices = FeeInvoices::all() ;
            return view('pages.Students.FeeInvoices.index' , compact('Fee_invoices')) ;
        }

        public function show($id)
        {
            $student = Student::findOrFail($id) ;
            $fees = Fee::where('classroom_id' , $student -> classroom_id) -> get() ;

            return view('pages.Students.FeeInvoices.add' , compact('student' , 'fees')) ;
        }

        public function store($request)
        {
            $list_fees = $request -> List_Fees ;
            DB::beginTransaction() ;

            try {    
                foreach ($list_fees as $fee)
                {
                    //! insert in table fee invoices :
                    $feeInvoices = new FeeInvoices() ;
                    $feeInvoices -> date = date('Y-m-d') ;
                    $feeInvoices -> grade_id = $request -> grade_id ;
                    $feeInvoices -> classroom_id = $request -> classroom_id ;
                    $feeInvoices -> fee_id = $fee['fee_id'] ;
                    $feeInvoices -> student_id = $fee['student_id'] ;
                    $feeInvoices -> amount = $fee['amount'] ;
                    $feeInvoices -> description = $fee['description'] ;
                    $feeInvoices -> save() ;

                    //! insert in table students account :
                    $studentAccount = new StudentAccount() ;
                    $studentAccount -> date = date('Y-m-d') ;
                    $studentAccount -> type = 'invoice' ;
                    $studentAccount -> fee_invoice_id = $feeInvoices -> id ;
                    $studentAccount -> student_id = $fee['student_id'] ;
                    $studentAccount -> debit = $fee['amount'] ;
                    $studentAccount -> cedit = 0 ;
                    $studentAccount -> description = $fee['description'] ;
                    $studentAccount -> save() ;
                }

                DB::commit();
                    
                //! return :
                toastr() -> success('the fee invoice has been added !') ;
                return redirect() -> back() ;

            } 
            catch (\Exception $error) {
                DB::rollBack() ;
                return redirect() -> back() -> withErrors(['error' => $error -> getMessage()]) ;
            }
        }

        public function edit($id)
        {
            try {
                $fee_invoices = FeeInvoices::findOrFail($id) ;
                $fees = Fee::where('classroom_id' , $fee_invoices -> classroom_id) -> get() ;

                return view('pages.Students.FeeInvoices.editInvoice' , compact('fees','fee_invoices')) ;
            }
            catch(\Exception)
            {
                return redirect() -> back() -> withErrors(trans('students_trans.error')) ;
            }
            
        }

        public function update($request , $id)
        {
            DB::beginTransaction() ;
            try {
                //* fee invoices table :
                $updatedInvoices = FeeInvoices::findOrFail($id) ;
                $updatedInvoices -> fee_id = $request -> fee_id ;
                $updatedInvoices -> amount = $request -> amount ;
                $updatedInvoices -> description = $request -> description ;
                $updatedInvoices -> save() ;

                //* account students table :
                $updatedAccountStudent = StudentAccount::where('fee_invoice_id' , $id) -> first() ;
                $updatedAccountStudent -> debit = $request -> amount ;
                $updatedAccountStudent -> description = $request -> description ;
                $updatedAccountStudent -> save() ;

                DB::commit() ;
                //* message success :
                toastr() -> success(trans('students_trans.success_edit_invoice')) ;
                return redirect() -> route('fee_invoices.index') ;
            }
            catch(\Exception $error)
            {
                DB::rollBack() ;
                return redirect() -> back() -> withErrors(trans('students_trans.error')) ;
            }
        }

        public function destroy($id)
        {   
            DB::beginTransaction() ;
            try {
                FeeInvoices::findOrFail($id) -> delete() ;
                DB::commit() ;
                toastr() -> success(trans('students_trans.success_delete_invoice')) ;
                return redirect() -> route('fee_invoices.index') ;
            }
            catch(\Exception)
            {
                DB::rollBack() ;
                return redirect() -> back() -> withErrors(trans('students_trans.error')) ;
            }
        }
    }