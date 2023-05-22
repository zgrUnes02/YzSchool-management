
  
<!------------------------------- Modal for deleting student : -------------------------------------->
<div class="modal fade" id="Delete_Student{{$student->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="{{route('delete')}}" method="POST">
        @csrf
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ trans('students_trans.title_Delete') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{ trans('students_trans.question_delete') }} ( {{$student -> name}} )
            </div>
            <input type="hidden" name="id_of_student_wanna_delete" value="{{$student->id}}">
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('students_trans.cancel') }}</button>
                <button type="submit" class="btn btn-primary">{{ trans('students_trans.yesOfCourse') }}</button>
            </div>
            </div>
        </div>
    </form>
</div>
<!-- -------------------------------------------------------------------------------------------- -->