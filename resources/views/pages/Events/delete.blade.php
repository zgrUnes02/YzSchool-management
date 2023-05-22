
<!-- Modal -->
<div class="modal fade" id="delete_event{{$event -> id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> {{ trans('events_trans.delete_event') }} </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('events.destroy' , $event -> id)}}" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    {{ trans('events_trans.question_delete') }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"> {{ trans('events_trans.cancel') }} </button>
                    <button type="submit" class="btn btn-primary"> {{ trans('events_trans.yoc') }} </button>
                </div>
            </form>
        </div>
    </div>
</div>