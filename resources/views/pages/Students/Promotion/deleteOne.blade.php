
<!-- Modal -->
<div class="modal fade" id="Delete_one{{$promotion -> id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">{{ trans('students_trans.Retreat') }} :</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="{{route('promotions.destroy' , 'retreatOne')}}" method="POST">
            @csrf
            @method('DELETE')
            <div class="modal-body">
                {{ trans('students_trans.question_retreat') }}  {{$promotion -> Students -> name}} {{ trans('students_trans.question_mark') }} 
                <input type="hidden" name="page_id" value="2" />
                <input type="hidden" name="promotion_wanna_delete" value="{{$promotion -> id}}" />
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('students_trans.cancel') }}</button>
                <button type="submit" class="btn btn-danger">{{ trans('students_trans.yes_oc') }}</button>
            </div>
        </form>
        </div>
    </div>
    </div>
    <!-- ------- -->