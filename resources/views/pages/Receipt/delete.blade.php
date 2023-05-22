
<!-- Modal -->
<div class="modal fade" id="Delete_receipt{{$receipt_student->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{route('receipt.destroy' , $receipt_student->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{trans('students_trans.delete_receipt')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{trans('students_trans.question_delete_receipt')}} {{trans('students_trans.question_mark')}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('students_trans.cancel')}}</button>
                    <button type="submit" class="btn btn-primary">{{trans('students_trans.yes_oc')}}</button>
                </div>
            </div>
        </form>
    </div>
</div>