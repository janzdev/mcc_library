<div class="col-12 col-md-4 mt-5">
     <div class="card">
          <div class="card-header text-dark  fw-semibold ">
               Allowed Days <span class="text-muted small">(per book)</span>
          </div>
          <div class="card-body">
               <table class="table table-striped mt-3">
                    <tbody>
                         <?php
							$penalty_query= mysqli_query($con,"select * from allowed_days order by allowed_days_id DESC ") or die (mysqli_error());
							while ($row33= mysqli_fetch_array ($penalty_query) ){
							$allowed_days_id=$row33['allowed_days_id'];
							?>
                         <tr>
                              <td><?php echo $row33['no_of_days']; ?>&nbsp;day/s</td>
                              <td style="width: 10px;">
                                   <!-- Modal Button Trigger -->
                                   <span data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Day/s">
                                        <a href="#days_edit<?php echo $allowed_days_id;?>" type="button"
                                             class="btn btn-info text-white" data-bs-toggle="modal"
                                             data-bs-target="#days_edit<?php echo $allowed_days_id;?>">
                                             <i class="bi bi-pencil-square "></i>
                                        </a>
                                   </span>

                              </td>

                              <!-- Modal -->
                              <div class="modal fade" id="days_edit<?php echo $allowed_days_id;?>" tabindex="-1"
                                   aria-labelledby="exampleModalLabel" aria-hidden="true">
                                   <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                             <div class="modal-header">
                                                  <h1 class="modal-title fs-5" id="exampleModalLabel">Allowed Day/s</h1>
                                                  <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                       aria-label="Close"></button>
                                             </div>
                                             <div class="modal-body">
                                                  <?php
												$query2=mysqli_query($con,"select * from allowed_days where allowed_days_id='$allowed_days_id'")or die(mysqli_error());
												$row44=mysqli_fetch_array($query2);
												?>
                                                  <form method="post" enctype="multipart/form-data"
                                                       class="form-horizontal  ">
                                                       <div class="form-group d-flex align-items-center"
                                                            style="margin-left:170px;">

                                                            <div class="col-md-3 ">
                                                                 <input type="number" min="0" max="100" step="1"
                                                                      name="no_of_days"
                                                                      value="<?php echo $row44['no_of_days']; ?>"
                                                                      id="first-name2" class="form-control">

                                                            </div>
                                                            <label class="control-label col-md-4 px-2"
                                                                 for="first-name">Day/s
                                                            </label>
                                                       </div>
                                             </div>
                                             <div class="modal-footer">
                                                  <button type="button" class="btn btn-secondary"
                                                       data-bs-dismiss="modal">Cancel</button>
                                                  <button type="submit" name="update" class="btn btn-primary">Update
                                                       Day/s</button>
                                             </div>
                                             </form>
                                        </div>
                                   </div>
                              </div>
                              <?php
													if (isset($_POST['update'])) {
													
													$no_of_days1 = $_POST['no_of_days'];
													
													
														mysqli_query($con," UPDATE allowed_days SET no_of_days='$no_of_days1' ") or die (mysqli_error());
                                                                 
                                                                     
														echo "<script>alert('Allowed Book Updated Successfully');window.location='circulation_settings.php'</script>";
                                                                     
													
														
													}
												?>

          </div>

     </div>
</div>
</div>

</tr>
<?php } ?>
</tbody>
</table>
</div>
<div class="card-footer">

</div>
</div>
</div>