

<!-- Modal -->
<div class="modal fade" id="edit_exam{{$exam -> id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ trans('exam_trans.edit_title') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post"  action="{{ route('exam.update' , $exam -> id) }}" autocomplete="off">
                    @csrf
                    @method('PUT')

                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{trans('exam_trans.name_ar')}} : <span class="text-danger">*</span></label>
                                <input  type="text" name="name_ar" class="form-control" class="@error('name_ar') is-invalid @enderror" value="{{ $exam -> getTranslation('name' , 'ar') }}">
                                @error('name_ar')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{trans('exam_trans.name_en')}} : <span class="text-danger">*</span></label>
                                <input  class="form-control" name="name_en" type="text" class="@error('name_en') is-invalid @enderror" value="{{ $exam -> getTranslation('name' , 'en') }}">
                                @error('name_en')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>{{trans('exam_trans.phase')}} : <span class="text-danger">*</span></label>                             
                                <input type="number" name="term" class="form-control" class="@error('term') is-invalid @enderror" value="{{ $exam -> term }}">
                                @error('term')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="academic_year">{{trans('students_trans.Academic_year')}} : <span class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="academic_year" class="@error('academic_year') is-invalid @enderror" value="{{ old('academic_year') }}">
                                    <option selected value="{{$exam -> academic_year}}">{{ $exam -> academic_year }}</option>
                                    @php
                                        $current_year = date("Y");
                                    @endphp
                                    @for($year=$current_year; $year<=$current_year +1 ;$year++)
                                        <option value="{{ $year}}">{{ $year }}</option>
                                    @endfor
                                </select>
                                @error('academic_year')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('exam_trans.cancel')}}</button>
                        <button type="submit" class="btn btn-primary">{{trans('exam_trans.edit')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>