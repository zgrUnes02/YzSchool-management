
@if($currentStep != 2)
    <div style="display: none" class="row setup-content" id="step-2">
@endif

        <div class="col-xs-12">
            <div class="col-md-12">
                <br>

                {{-- This Is Email And Password Inputs In Mother Form You Can Remove Or Add It No Matter ! --}}
                {{-- <div class="form-row">

                    <div class="col">
                        <label for="title">{{trans('parent_trans.email')}}</label>
                        <input type="email" wire:model="Email"  class="form-control">
                        @error('Email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col">
                        <label for="title">{{trans('parent_trans.password')}}</label>
                        <input type="password" wire:model="Password" class="form-control" >
                        @error('Password')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                </div> --}}

                <div class="form-row">

                    <div class="col">
                        <label for="title">{{trans('parent_trans.name_mother_ar')}}</label>
                        <input type="text" wire:model="Name_Mother" class="form-control" >
                        @error('Name_Mother')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col">
                        <label for="title">{{trans('parent_trans.name_mother_en')}}</label>
                        <input type="text" wire:model="Name_Mother_en" class="form-control" >
                        @error('Name_Mother_en')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                </div>

                <div class="form-row">

                    <div class="col-md-3">
                        <label for="title">{{trans('parent_trans.job_mother_ar')}}</label>
                        <input type="text" wire:model="Job_Mother" class="form-control">
                        @error('Job_Mother')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-3">
                        <label for="title">{{trans('parent_trans.job_mother_en')}}</label>
                        <input type="text" wire:model="Job_Mother_en" class="form-control">
                        @error('Job_Mother_en')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col">
                        <label for="title">{{trans('parent_trans.national_id_mother')}}</label>
                        <input type="text" wire:model="National_ID_Mother" class="form-control">
                        @error('National_ID_Mother')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col">
                        <label for="title">{{trans('parent_trans.passport_id_mother')}}</label>
                        <input type="text" wire:model="Passport_ID_Mother" class="form-control">
                        @error('Passport_ID_Mother')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col">
                        <label for="title">{{trans('parent_trans.phone_mother')}}</label>
                        <input type="text" wire:model="Phone_Mother" class="form-control">
                        @error('Phone_Mother')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    
                </div>


                <div class="form-row">

                    <div class="form-group col-md-6">
                        <label for="inputCity">{{trans('parent_trans.mother_nationality')}}</label>
                        <select class="custom-select my-1 mr-sm-2" wire:model="Nationality_Mother_id">
                            <option selected>{{trans('parent_trans.Choose')}}...</option>
                            @foreach($Nationalities as $National)
                                <option value="{{$National->id}}">{{$National->nationality_name}}</option>
                            @endforeach
                        </select>
                        @error('Nationality_Mother_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group col">
                        <label for="inputState">{{trans('parent_trans.mother_type_blood')}}</label>
                        <select class="custom-select my-1 mr-sm-2" wire:model="Blood_Type_Mother_id">
                            <option selected>{{trans('parent_trans.Choose')}}...</option>
                            @foreach($Type_Bloods as $Type_Blood)
                                <option value="{{$Type_Blood->id}}">{{$Type_Blood->type_of_blood}}</option>
                            @endforeach
                        </select>
                        @error('Blood_Type_Mother_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group col">
                        <label for="inputZip">{{trans('parent_trans.mother_relegion')}}</label>
                        <select class="custom-select my-1 mr-sm-2" wire:model="Religion_Mother_id">
                            <option selected>{{trans('parent_trans.Choose')}}...</option>
                            @foreach($Religions as $Religion)
                                <option value="{{$Religion->id}}">{{$Religion->relegion_name}}</option>
                            @endforeach
                        </select>
                        @error('Religion_Mother_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>


                <div class="form-group">
                    <label for="exampleFormControlTextarea1">{{trans('parent_trans.address_mother')}}</label>
                    <textarea class="form-control" wire:model="Address_Mother" id="exampleFormControlTextarea1" rows="4"></textarea>
                    @error('Address_Mother')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

            {{-- If $updateMode == true go to function 'secondtStep_Edit' else go to function 'secondeStepSubmit' --}}
                @if ($updateMode)
                    <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" wire:click="secondtStep_Edit"
                        type="button">{{trans('parent_trans.next')}}
                    </button> 
                @else
                    <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" wire:click="secondeStepSubmit"
                        type="button">{{trans('parent_trans.next')}}
                    </button> 
                @endif
            {{-- ----------------------------------------------------------------------------------------------- --}}
                

                <button class="btn btn-danger btn-sm nextBtn btn-lg pull-left" wire:click="back(1)"
                        type="button">{{trans('parent_trans.previous')}}
                </button>

            </div>
        </div>

