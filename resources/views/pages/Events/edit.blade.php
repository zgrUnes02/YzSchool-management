
<!-- Modal -->
<div class="modal fade" id="edit_event{{$event -> id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">  {{ trans('events_trans.edit_event') }}  </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('events.update' , $event -> id) }}" method="POST">
                @csrf
                @method("PUT")
                <div class="modal-body">

                    <div class="col mt-3">
                        <label for="title">{{ trans('events_trans.title') }} : <span class="text-danger">*</span></label>
                        <input type="text" name="title" value="{{ $event -> title }}" class="form-control" autocomplete="none" class="@error('title') is-invalid @enderror">
                        @error('title')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col mt-3">
                        <label for="title">{{ trans('events_trans.start') }} : <span class="text-danger">*</span></label>
                        <input type="text" name="start" value="{{ $event -> start }}" class="form-control" autocomplete="none" class="@error('start') is-invalid @enderror">
                        @error('start')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">  {{ trans('events_trans.cancel') }}  </button>
                    <button type="submit" class="btn btn-primary">  {{ trans('events_trans.yoc') }}  </button>
                </div>
            </form>
        </div>
    </div>
</div>