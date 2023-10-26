<div id="flash-overlay-modal" class="modal fade {{ isset($modalClass) ? $modalClass : '' }}">
    <div class="modal-dialog  modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

               {{ @$title }}
            </div>

            <div class="modal-body">
                <p>{!! @$body !!}</p>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>
