
<!-- Modal -->
<div class="modal fade" id="edit_payment{{$payment -> id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{route('payment.update' , $payment -> id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="modal-content container">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{trans('students_trans.edit_payment')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="mb-3">
                    <label for="amount" class="form-label mt-2">{{trans('students_trans.amount')}} :</label>
                    <input style="border-radius: 20px" type="number" class="form-control" name="amount" aria-describedby="emailHelp" value="{{$payment -> amount}}">
                </div>

                <div class="form-floating">
                    <label for="description" class="form-label">{{trans('students_trans.desc')}} :</label>
                    <textarea style="border-radius: 20px" class="form-control" name="description">{{$payment -> description}}</textarea>
                </div>

                <input type="hidden" name="student_id" value="{{$payment -> student_id}}">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('students_trans.cancel')}}</button>
                    <button type="submit" class="btn btn-primary">{{trans('students_trans.edit_btn')}}</button>
                </div>

            </div>
        </form>
    </div>
</div>