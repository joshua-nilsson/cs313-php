<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Confirm Deletion</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form>
      <div class="modal-body">
        <p>Are you sure you want to delete this name?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" title="Click to Cancel"><i class="fas fa-ban fa-2x"></i></button>
        <button type="submit" class="btn btn-danger" title="Click to Delete"><i class='fas fa-trash-alt fa-fw fa-2x'></i></button>
      </div>
        <input type='hidden' name='collectionid' value="<?php echo $row['collectionid'];?>">
        <input type='hidden' name='action' value='delete'>
      </form>
    </div>
  </div>
</div>
