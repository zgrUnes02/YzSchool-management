<button class="btn btn-success btn-sm btn-lg pull-right" wire:click="showformadd" type="button">{{ trans('parent_trans.add_parents') }}</button><br><br>
<div class="table-responsive">
    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
           style="text-align: center">
        <thead>
        <tr class="table-success">
            <th>#</th>
            <th>{{ trans('parent_trans.email') }}</th>
            <th>{{ trans('parent_trans.name_father_title') }}</th>
            <th>{{ trans('parent_trans.national_id_father') }}</th>
            <th>{{ trans('parent_trans.passport_id_father') }}</th>
            <th>{{ trans('parent_trans.phone_father') }}</th>
            <th>{{ trans('parent_trans.job_father_title') }}</th>
            <th>{{ trans('parent_trans.Processes') }}</th>
        </tr>
        </thead>
        <tbody>
        <?php $i = 0; ?>
        @foreach ($my_parents as $my_parent)
            <tr>
                <?php $i++; ?>
                <td>{{ $i }}</td>
                <td>{{ $my_parent->Email }}</td>
                <td>{{ $my_parent->Name_Father }}</td>
                <td>{{ $my_parent->National_ID_Father }}</td>
                <td>{{ $my_parent->Passport_ID_Father }}</td>
                <td>{{ $my_parent->Phone_Father }}</td>
                <td>{{ $my_parent->Job_Father }}</td>
                <td>
                                        
                    <button wire:click="edit({{ $my_parent->id }})" title="{{ trans('Grades_trans.Edit') }}"
                            class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal{{$my_parent->id}}">
                        <i class="fa fa-trash"></i>
                    </button>        

                </td>

            </tr>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal{{$my_parent->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <input type="hidden" value="{{$my_parent->id}}">
                        </div>
                        <div class="modal-body">
                            {{ trans('parent_trans.delete_modal') }}
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('parent_trans.cancel') }}</button>
                            <button type="button" wire:click='delete({{$my_parent->id}})' class="btn btn-primary">{{ trans('parent_trans.yes_delete') }}</button>
                        </div>
                    </div>
                </div>
            </div>

        @endforeach
    </table>

    

</div>