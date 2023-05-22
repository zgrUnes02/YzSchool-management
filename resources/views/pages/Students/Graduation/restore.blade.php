    
    
    <!-- Modal For The Restore -->

    <div class="modal fade" id="restore{{$student->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ trans('students_trans.restore') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('graduate.destroy' , 'forceDelete')}}" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    {{ trans('students_trans.question_restore') }} <span class="text-success"> {{ucfirst($student -> name)}} </span> {{ trans('students_trans.question_mark') }}
                </div>
                <input type="hidden" name="id_student" value="{{$student->id}}">
                <input type="hidden" name="restore_Or_ForceDelete" value="restore">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('students_trans.cancel') }}</button>
                    <button type="submit" class="btn btn-primary">{{ trans('students_trans.yes_oc') }}</button>
                </div>
            </form>
        </div>
        </div>
    </div>