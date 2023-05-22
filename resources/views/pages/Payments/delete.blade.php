

<!-- Modal -->
<div class="modal fade" id="delete_payment{{$payment->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{route('payment.destroy' , $payment -> id)}}" method="POST">
            @csrf
            @method('DELETE')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{trans('students_trans.delete_payment')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{trans('students_trans.question_delete_payment')}} {{trans('students_trans.question_mark')}}
                    <input type="hidden" value="{{$payment -> id}}" name="id_payment">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('students_trans.cancel')}}</button>
                    <button type="submit" class="btn btn-primary">{{trans('students_trans.yes_oc')}}</button>
                </div>
            </div>
        </form>
    </div>
</div>