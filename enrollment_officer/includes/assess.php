<?php
  $con = mysqli_connect("localhost", "root", "", "enrollment");
?>
<div class="modal fade" id="assess<?php echo $data['student_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h5 class="modal-title text-light" id="exampleModalCenterTitle">Check Requirements</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-6">
            <p class="lead">LRN: <h3><?php echo $data['lrn']; ?></h3></p>
          </div>
          <div class="col-6">
            <p class="lead">Name: <h3><?php echo $data['first_name']; ?></h3></p>
          </div>
        </div>

        <hr>
        
        <form method="post" action="../enrollment_officer/includes/assess_student.php">'
        <div class="row text-center">
          <div class="col-4">
              <div class="custom-control custom-checkbox mb-3">
                  <input type="checkbox" value="good moral" name="requirement[]" class="custom-control-input" id="customControlValidation1" required>
                  <label class="custom-control-label" for="customControlValidation1">Good Moral Certificate</label>
              </div>
          </div>
          <div class="col-4">
              <div class="custom-control custom-checkbox mb-3">
                  <input type="checkbox" value="birth certificate" name="requirement[]" class="custom-control-input" id="customControlValidation2" required>
                  <label class="custom-control-label" for="customControlValidation2">Birth Certificate</label>
              </div>
          </div>
          <div class="col-4">
              <div class="custom-control custom-checkbox mb-3">
                  <input type="checkbox" value="clearance" name="requirement[]" class="custom-control-input" id="customControlValidation5" required>
                  <label class="custom-control-label" for="customControlValidation5">Clearance</label>
              </div>
          </div>
      </div>

      <div class="row text-center">
          <div class="col-6">
              <div class="custom-control custom-checkbox mb-3">
                  <input type="checkbox" value="form 137" name="requirement[]" class="custom-control-input" id="customControlValidation3" required>
                  <label class="custom-control-label" for="customControlValidation3">DepEd Form 137</label>
                  <div class="feedback">for new students only!</div>
              </div>
          </div>
          <div class="col-6">
              <div class="custom-control custom-checkbox mb-3">
                  <input type="checkbox" value="form 138" name="requirement[]" class="custom-control-input" id="customControlValidation4">
                  <label class="custom-control-label" for="customControlValidation4">DepEd Form 138</label>
                  <div class="feedback">for transferees only!</div>
              </div>
          </div>
      </div>
        </form>
      </div>
    </div>
  </div>
</div>
