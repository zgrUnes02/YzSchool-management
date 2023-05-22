
<!------------------------------- Modal for deleting subject : -------------------------------------->
<div class="modal fade" id="Delete_subject{{$subject -> id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="{{route('subject.destroy' , $subject -> id)}}" method="POST">
        @csrf
        @method('DELETE')
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> {{ trans('subject_trans.delete_title') }} </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{ trans('subject_trans.question_delete') }} {{ trans('subject_trans.question_mark') }}
            </div>
            <input type="hidden" name="id_of_subject_wanna_delete" value="{{$subject -> id}}">
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('students_trans.cancel') }}</button>
                <button type="submit" class="btn btn-primary">{{ trans('students_trans.yesOfCourse') }}</button>
            </div>
            </div>
        </div>
    </form>
</div>
<!-- -------------------------------------------------------------------------------------------- -->