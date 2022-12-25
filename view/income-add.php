<?php
$title = "Income";
include('layout_header.php');
?>
<section class="section">
      <div class="container">
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="card card-primary">
              <div class="card-header">
                <h4>Add Income</h4>
              </div>
              <div class="card-body">
                <form method="POST" id="addincome" class="needs-validation" novalidate="">
                  <div class="row">
                    <div class="form-group col-6">
                      <label for="DateStart">Start Date</label>
                      <input id="DateStart" type="date" class="form-control needs-validation" required name="DateStart" autofocus>
                    </div>
                    <div class="form-group col-6">
                      <label for="DateEnd">Start Date</label>
                      <input id="DateEnd" type="date" class="form-control needs-validation" required name="DateEnd" autofocus>
                    </div>
                    
                  </div>  
                  
                  <div class="row">
                    <div class="form-group col-6">
                        <label for="IncomeInfo">Income Info</label>
                        <input id="IncomeInfo" type="tel" class="form-control" name="IncomeInfo" required>
                        <div class="invalid-feedback">
                        </div>
                    </div>
                    <div class="form-group col-6">
                        <label for="Amount">Ammount</label>
                        <input id="Amount" type="tel" class="form-control" name="Amount" required>
                        <div class="invalid-feedback">
                        </div>
                    </div>
                  </div>  
 

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                      Add
                    </button>
                  </div>

                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
</section>

<!-- JS Libraies -->

  <script src="../assets/bundles/jquery-pwstrength/jquery.pwstrength.min.js"></script>
  <script src="../assets/bundles/jquery-selectric/jquery.selectric.min.js"></script>
  <!-- Page Specific JS File -->
  <script src="../assets/js/page/auth-register.js"></script>


  <!-- on form submit js code here -->
    <!-- hidden input will be RoleId,TinNumber,CreatedAt,UpdatedAt -->
<script>
    // this is the id of the form
    $("#addincome").submit(function(e) {
      e.preventDefault(); // avoid to execute the actual submit of the form.
      const d = new Date();
      let time = d.getTime();
      var form = $(this);
      var form_data = form.serialize()+"&UserId=40"+"&CreatedAt="+new Date().toJSON()+"&UpdatedAt="+new Date().toJSON();
      var actionUrl = api_root+"/api/income/create";
        //console.log(form_data);
        $.ajax({
            type: "POST",
            url: actionUrl,
            data: form_data, // serializes the form's elements.
            success: function(data)
            {
                //console.log(data); // show response from the php script.
                window.location.href = 'income.php?from=add';
            }
        });
    });
</script>

<?php
include('layout_footer.php');
?>