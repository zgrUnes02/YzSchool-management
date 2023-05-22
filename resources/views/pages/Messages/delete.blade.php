
<!-- Modal -->
<div class="modal fade" id="delete_quiz{{$message -> id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{trans('message_trans.delete_message')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('delete_messages' , $message -> id) }}" method="POST">
                @csrf

                <div class="modal-body">
                    {{trans('message_trans.question_delete')}}
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('crud_trans.Cancel')}}</button>
                    <button type="submit" class="btn btn-primary">{{trans('students_trans.yes_oc')}}</button>
                </div>

            </form>
        </div>
    </div>
</div>