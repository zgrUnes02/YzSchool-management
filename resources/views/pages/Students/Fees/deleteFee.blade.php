
<!-- Modal for deleting fee -->

<div class="modal fade" id="deleteFee{{$fee -> id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            {{--* -------------------------------------- form -------------------------------------- --}}
            <form action="{{route('fees.destroy' , $fee -> id)}}" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Delete Fee</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{ trans('students_trans.delete_fee') }} {{ $fee -> name }} {{ trans('students_trans.fee_of_the') }} {{ $fee -> classrooms -> class_name }} {{ trans('students_trans.question_mark') }}
                </div>
                <input type="hidden" value="{{$fee -> id}}">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('students_trans.cancel') }}</button>
                    <button type="submit" class="btn btn-primary">{{trans('students_trans.yes_oc') }}</button>
                </div>
            </form>
            {{--* --------------------------------------------------------------------------------- --}}
            
        </div>
    </div>
</div>