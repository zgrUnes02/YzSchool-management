
<!-- Modal -->
<div class="modal fade" id="delete_quiz{{$quiz -> id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{trans('quiz_trans.delete_title')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('quiz.destroy' , $quiz -> id)}}" method="POST">
                @csrf
                @method('DELETE')

                <input type="hidden" value="{{ $quiz -> path }}" name="file_path">
                <input type="hidden" value="{{ $quiz -> teachers -> name }}" name="name_teacher">

                <div class="modal-body">
                    {{trans('quiz_trans.delete_question')}} {{trans('subject_trans.question_mark')}} ({{ $quiz -> name }})
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('crud_trans.Cancel')}}</button>
                    <button type="submit" class="btn btn-primary">{{trans('students_trans.yes_oc')}}</button>
                </div>

            </form>
        </div>
    </div>
</div>