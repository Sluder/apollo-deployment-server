
<div class="modal fade" id="delete-user-{{ $org_user->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h4>Delete {{ $org_user->name }}?</h4>

                <form action="{{ route('delete.user', compact('org_user')) }}" method="POST">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-12">
                            {{ Form::submit('Delete', ['class' => 'btn']) }}
                            {{ Form::button('Cancel', ['class' => 'btn cancel', 'data-dismiss' => 'modal']) }}
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>