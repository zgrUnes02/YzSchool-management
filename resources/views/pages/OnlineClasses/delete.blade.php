

<!-- Modal -->
<div class="modal fade" id="delete_classe{{$classe -> id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ trans('onlineClasses.delete_title') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('onlineclasses.destroy' , $classe -> id) }}" method="POST">
                @csrf
                @method('DELETE')
                <input value="{{ $classe -> meeting_id }}" type="hidden" name="id_meeting">
                <div class="modal-body">
                    {{ trans('onlineClasses.question_delete') }} {{ trans('subject_trans.question_mark') }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('crud_trans.Cancel') }}</button>
                    <button type="submit" class="btn btn-primary">{{ trans('students_trans.yes_oc') }}</button>
                </div>
            </form>

        </div>
    </div>
</div>