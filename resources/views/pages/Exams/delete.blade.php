

<!-- Modal -->
<div class="modal fade" id="delete_exam{{$exam -> id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{trans('exam_trans.delete_title')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('exam.destroy' , $exam -> id)}}" method="POST">
                @csrf
                @method('DELETE')

                <div class="modal-body">
                    {{trans('exam_trans.question_delete')}} {{trans('subject_trans.question_mark')}}
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('exam_trans.cancel')}}</button>
                    <button type="submit" class="btn btn-primary">{{trans('students_trans.yes_oc')}}</button>
                </div>

            </form>
        </div>
    </div>
</div>