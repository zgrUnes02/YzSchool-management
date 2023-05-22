<?php

namespace App\Http\Livewire;

use App\Models\Blood;
use App\Models\My_parents;
use App\Models\Nationality;
use App\Models\ParentAttachment;
use App\Models\Relegion;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddParents extends Component
{
    use WithFileUploads ;

    // Variables :
    public $Parent_id ;
    public $updateMode = false ;
    public $show_table = true ;
    public $photos ;
    public $catchError ;
    public $successMessage = '' ;
    public $currentStep = 1 ,

    // Father_INPUTS
    $Email, $Password,
    $Name_Father, $Name_Father_en,
    $National_ID_Father, $Passport_ID_Father,
    $Phone_Father, $Job_Father, $Job_Father_en,
    $Nationality_Father_id, $Blood_Type_Father_id,
    $Address_Father, $Religion_Father_id,

    // Mother_INPUTS
    $Name_Mother, $Name_Mother_en,
    $National_ID_Mother, $Passport_ID_Mother,
    $Phone_Mother, $Job_Mother, $Job_Mother_en,
    $Nationality_Mother_id, $Blood_Type_Mother_id,
    $Address_Mother, $Religion_Mother_id;

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName , [
            'Email'              => 'required|email' ,

            'National_ID_Father' => 'required|min:7|max:7|alpha_num' ,
            'Passport_ID_Father' => 'required|min:10|max:10|alpha_num' ,
            'Phone_Father'       => 'required|min:10|max:10' ,

            'National_ID_Mother' => 'required|min:7|max:7|alpha_num' ,
            'Passport_ID_Mother' => 'required|min:10|max:10|alpha_num' ,
            'Phone_Mother'       => 'required|min:10|max:10'
        ]);
    }

    public function render()
    {
        return view('livewire.add-parents' , [
            'Nationalities' => Nationality::all() ,
            'Type_Bloods'   => Blood::all() ,
            'Religions'     => Relegion::all() ,
            'my_parents'    => My_parents::all()
        ]);
    }

    // Make Variable $show_table Equal False
    // (For Remove The Table And Show Form Add New Parent)
    public function showformadd()
    {
        $this -> show_table = false ;
    }

    // Make Variable $show_table Equal True :
    // (For return To Table) 
    public function returnBackToTable()
    {
        $this -> show_table = true ;
    }

    // First Step :
    public function firstStepSubmit()
    {
        $this -> validate([
            // Validate Inputs Before Next Step :
            'Email'                  => 'required|unique:my_parents,email,' .$this -> id ,
            'Password'               => 'required' ,
            'Name_Father'            => 'required'  ,
            'Name_Father_en'         => 'required' ,
            'National_ID_Father'     => 'required|min:7|max:7|alpha_num|unique:my_parents,national_id_father,' .$this -> id ,
            'Passport_ID_Father'     => 'required|min:10|max:10|alpha_num|unique:my_parents,passport_id_father,' .$this -> id ,
            'Phone_Father'           => 'required|min:10|max:10'  ,
            'Job_Father'             => 'required'  ,
            'Job_Father_en'          => 'required' ,
            'Nationality_Father_id'  => 'required'  ,
            'Blood_Type_Father_id'   => 'required' ,
            'Address_Father'         => 'required'  ,
            'Religion_Father_id'     => 'required' ,
            // -------------------------------------
        ]) ;
        $this -> currentStep = 2 ;
    }

    // Seconde Step :
    public function secondeStepSubmit()
    {
        $this -> validate([
            // Validate Inputs Before Next Step :
            'Email'                  => 'required|unique:my_parents,email,' .$this -> id ,
            'Password'               => 'required' ,
            'Name_Mother'            => 'required'  ,
            'Name_Father_en'         => 'required' ,
            'National_ID_Mother'     => 'required|min:7|max:7|alpha_num|unique:my_parents,national_id_father,' .$this -> id ,
            'Passport_ID_Mother'     => 'required|min:10|max:10|alpha_num|unique:my_parents,passport_id_father,' .$this -> id ,
            'Phone_Mother'           => 'required|min:10|max:10'  ,
            'Job_Mother'             => 'required'  ,
            'Job_Mother_en'          => 'required' ,
            'Nationality_Mother_id'  => 'required'  ,
            'Blood_Type_Mother_id'   => 'required' ,
            'Address_Mother'         => 'required'  ,
            'Religion_Mother_id'     => 'required' ,
            // -------------------------------------
        ]) ;
        $this -> currentStep = 3 ;
    }

    public function submitForm()
    {
        try {
            $parents = new My_parents() ;

            $parents -> Email = $this -> Email ;
            $parents -> Password = Hash::make($this->Password); ;
    
            // Father Info For Storing In Table :
            $parents -> Name_Father           = ['en' => $this -> Name_Father_en , 'ar' => $this -> Name_Father] ;
            $parents -> National_ID_Father    = $this -> National_ID_Father ;
            $parents -> Passport_ID_Father    = $this -> Passport_ID_Father ;
            $parents -> Phone_Father          = $this -> Phone_Father ;
            $parents -> Job_Father            = ['en' => $this -> Job_Father_en , 'ar' => $this -> Job_Father] ;
            $parents -> Nationality_Father_id = $this -> Nationality_Father_id ;
            $parents -> Blood_Type_Father_id  = $this -> Blood_Type_Father_id ;
            $parents -> Religion_Father_id    = $this -> Religion_Father_id ;
            $parents -> Address_Father        = $this -> Address_Father ;
    
            // Mother Info For Storing In Table :
            $parents -> Name_Mother           = ['en' => $this -> Name_Mother_en , 'ar' => $this -> Name_Mother] ;
            $parents -> National_ID_Mother    = $this -> National_ID_Mother ;
            $parents -> Passport_ID_Mother    = $this -> Passport_ID_Mother ;
            $parents -> Phone_Mother          = $this -> Phone_Mother ;
            $parents -> Job_Mother            = ['en' => $this -> Job_Mother_en , 'ar' => $this -> Job_Mother] ;
            $parents -> Nationality_Mother_id = $this -> Nationality_Mother_id ;
            $parents -> Blood_Type_Mother_id  = $this -> Blood_Type_Mother_id ;
            $parents -> Religion_Mother_id    = $this -> Religion_Mother_id ;
            $parents -> Address_Mother        = $this -> Address_Mother ;
            
            // Upload Photos In Foulder And Also In Databse :
            if(!empty($this -> photos))
            {
                foreach($this -> photos as $photo)
                {
                    $photo -> storeAs($this -> Name_Father_en , $photo -> getClientOriginalName() , $disk = 'parent_attachments') ;
                    ParentAttachment::create([
                        'file_name'  => $photo -> getClientOriginalName() ,
                        'parent_id' => My_parents::latest() -> first() -> id ,
                    ]) ;
                }
            }
    
            // Save Data In table :
            $parents -> save() ;
    
            // Make successMessage Equal A Message :
            $this -> successMessage = trans('parent_trans.messageInsert') ;
    
            // Clear Inputs (Make It Empty) :
            $this -> clearForm() ;

            // Make Variable $show_table Equal True :
            // (For Show All Parents) 
            $this -> show_table = true ;
    
            // Make currentStep = 1 (For Return Back To insert New Father And MOther Infos) :
            $this -> currentStep = 1 ;
        } 
        // If Catch Any Error :
        catch (\Exception $error) {
            $this -> catchError = $error -> getMessage() ;
        }
    }

    // Back Step :
    public function back($step)
    {
        $this -> currentStep = $step ;
    }

    //clearForm
    public function clearForm()
    {
        // Father Clear From :
        $this -> Email                 = '' ;
        $this -> Password              = '' ;
        $this -> Name_Father           = '' ;
        $this -> Job_Father            = '' ;
        $this -> Job_Father_en         = '' ;
        $this -> Name_Father_en        = '' ;
        $this -> National_ID_Father    = '' ;
        $this -> Passport_ID_Father    = '' ;
        $this -> Phone_Father          = '' ;
        $this -> Nationality_Father_id = '' ;
        $this -> Blood_Type_Father_id  = '' ;
        $this -> Address_Father        = '' ;
        $this -> Religion_Father_id    = '' ;

        // Mother Clear Form :
        $this -> Name_Mother           = '' ;
        $this -> Job_Mother            = '' ;
        $this -> Job_Mother_en         = '' ;
        $this -> Name_Mother_en        = '' ;
        $this -> National_ID_Mother    = '' ;
        $this -> Passport_ID_Mother    = '' ;
        $this -> Phone_Mother          = '' ;
        $this -> Nationality_Mother_id = '' ;
        $this -> Blood_Type_Mother_id  = '' ;
        $this -> Address_Mother        = '' ;
        $this -> Religion_Mother_id    = '' ;
    }

    // Edit Function :
    public function edit($id)
    {
        $this -> show_table = false ;
        $this -> updateMode = true ;

        $parentThatWannaEdit = My_parents::where('id' , '=' , $id) -> first() ;

        // Email And Password And Id:
        $this -> Email                 = $parentThatWannaEdit -> Email    ;
        $this -> Password              = $parentThatWannaEdit -> Password ;
        $this -> Parent_id             = $id                              ; 

        // Father Informations :
        $this -> Name_Father           = $parentThatWannaEdit -> getTranslation('Name_Father' , 'ar') ;
        $this -> Name_Father_en        = $parentThatWannaEdit -> getTranslation('Name_Father' , 'en') ;
        $this -> Job_Father            = $parentThatWannaEdit -> getTranslation('Job_Father' , 'ar')  ;
        $this -> Job_Father_en         = $parentThatWannaEdit -> getTranslation('Job_Father' , 'en')  ;
        $this -> National_ID_Father    = $parentThatWannaEdit -> National_ID_Father    ;
        $this -> Passport_ID_Father    = $parentThatWannaEdit -> Passport_ID_Father    ;
        $this -> Phone_Father          = $parentThatWannaEdit -> Phone_Father          ;
        $this -> Nationality_Father_id = $parentThatWannaEdit -> Nationality_Father_id ;
        $this -> Blood_Type_Father_id  = $parentThatWannaEdit -> Blood_Type_Father_id  ;
        $this -> Address_Father        = $parentThatWannaEdit -> Address_Father        ;
        $this -> Religion_Father_id    = $parentThatWannaEdit -> Religion_Father_id    ;

        // Mother Informations :
        $this -> Name_Mother           = $parentThatWannaEdit -> getTranslation('Name_Mother' , 'ar') ;
        $this -> Name_Mother_en        = $parentThatWannaEdit -> getTranslation('Name_Mother' , 'en') ;
        $this -> Job_Mother            = $parentThatWannaEdit -> getTranslation('Job_Mother' , 'ar')  ;
        $this -> Job_Mother_en         = $parentThatWannaEdit -> getTranslation('Job_Mother' , 'en')  ;
        $this -> National_ID_Mother    = $parentThatWannaEdit -> National_ID_Mother    ;
        $this -> Passport_ID_Mother    = $parentThatWannaEdit -> Passport_ID_Mother    ;
        $this -> Phone_Mother          = $parentThatWannaEdit -> Phone_Mother          ;
        $this -> Nationality_Mother_id = $parentThatWannaEdit -> Nationality_Mother_id ;
        $this -> Blood_Type_Mother_id  = $parentThatWannaEdit -> Blood_Type_Mother_id  ;
        $this -> Address_Mother        = $parentThatWannaEdit -> Address_Mother        ;
        $this -> Religion_Mother_id    = $parentThatWannaEdit -> Religion_Father_id    ;
    }

    // first step from edit father :
    // it means go to next step without validation :
    public function firstStep_Edit()
    {
        $this -> updateMode = true ;
        $this -> currentStep = 2 ;
    }

    // second step from edit mother :
    // it means go to next step without validation :
    public function secondtStep_Edit()
    {
        $this -> updateMode = true ;
        $this -> currentStep = 3 ;
    }

    // submit function if the user comes from edit form :
    public function submitForm_edit()
    {
        if( $this -> Parent_id )
        {
            $parentUpdateNow = My_parents::findOrFail($this -> Parent_id) ;
            $parentUpdateNow -> update([
                // Father Form Update ------------------------------------------------ :
                'Name_Father'           => ['ar' => $this -> Name_Father , 'en' => $this -> Name_Father_en] ,
                'Job_Father'            => ['ar' => $this -> Job_Father , 'en' => $this -> Job_Father_en]   ,
                'National_ID_Father'    => $this -> National_ID_Father  ,
                'Passport_ID_Father'    => $this -> Passport_ID_Father  ,
                'Phone_Father'          => $this -> Phone_Father ,
                'Nationality_Father_id' => $this -> Nationality_Father_id ,
                'Blood_Type_Father_id'  => $this -> Blood_Type_Father_id ,
                'Address_Father'        => $this -> Address_Father ,
                'Religion_Father_id'    => $this -> Religion_Father_id  ,
                // Mother From Update ------------------------------------------------ :
                'Name_Mother'           => ['ar' => $this -> Name_Mother , 'en' => $this -> Name_Mother_en] ,
                'Job_Mother'            => ['ar' => $this -> Job_Mother , 'en' => $this -> Job_Mother_en ] ,
                'National_ID_Mother'    => $this -> National_ID_Mother ,
                'Passport_ID_Mother'    => $this -> Passport_ID_Mother ,
                'Phone_Mother'          => $this -> Phone_Mother  ,
                'Nationality_Mother_id' => $this -> Nationality_Mother_id ,
                'Blood_Type_Mother_id'  => $this -> Blood_Type_Mother_id ,
                'Address_Mother'        => $this -> Address_Mother ,
                'Religion_Mother_id'    => $this -> Religion_Mother_id ,
            ]) ;
        }
        // Toastr Message And return To Table :
        toastr() -> success(trans('parent_trans.update_success')) ;
        return redirect() -> to('/parents') ;
    }

    // Delete Function :
    public function delete($id)
    {
        $parent_wanna_delete = My_parents::where('id' , $id) ;
        $parent_have_sons_student = Student::where('parent_id' , $id) -> pluck('id') ;

        $parent_attachement = ParentAttachment::where('parent_id' , $id) -> pluck('id') ;
        if($parent_attachement -> count() != 0)
        {
            toastr() -> error(trans('parent_trans.error_delete')) ;
            return redirect() -> to('/parents') ;
        } 
        elseif($parent_have_sons_student -> count() != 0)
        {
            toastr() -> error(trans('parent_trans.error_delete_has_student')) ;
            return redirect() -> to('/parents') ;
        }
        else
        {
            $parent_wanna_delete -> delete() ;
        }
        

        // Toastr Message And return To Table :
        toastr() -> success(trans('parent_trans.delete_success')) ;
        return redirect() -> to('/parents') ;
    }
}
