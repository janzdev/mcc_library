<!--Delete Book Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog">
          <div class="modal-content">
               <div class="modal-header">
                    <!-- <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1> -->
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <form action="admincode.php" method="POST">
                    <div class="modal-body">
                         <input type="hidden" name="delete_id" id="delete_id">
                         <h5>Are you sure you want to delete this book?</h5>
                    </div>
                    <div class="modal-footer p-1">
                         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                         <button type="submit" name="deleteBook" class="btn btn-primary">Yes</button>
                    </div>
               </form>
          </div>
     </div>
</div>