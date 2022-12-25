<?php
$title = "Payment-Settings";
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
                <form method="POST" id="paymentsetting" class="needs-validation" novalidate="">
                  <div class="row">
                    <div class="form-group col-6">
                      <label for="MethodName">Payment Method</label>
                      <input id="MethodName" type="text" class="form-control needs-validation" required name="MethodName" autofocus>
                    </div>
                    <div class="form-group col-6">
                      <label for="AccountNumber">Account Number</label>
                      <input id="AccountNumber" type="text" class="form-control needs-validation" required name="AccountNumber" autofocus>
                    </div>
                    
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                      Update
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
     var retrive_user='';
    $( document ).ready(function() {
        $.ajax({
            url: api_root+"/api/paymentSetting/<?php echo $_GET['id']; ?>",
            type: 'GET',
            dataType: 'json', // added data type
            success: function(res) {
                //console.log(res);
                if(res==null){
                    window.location.href="user.php";
                }else{
                    set_input_data(res);
                } 
            }
        });

    });

    function set_input_data(item){
      retrive_income=item;
      $('#MethodName').val(item.MethodName);
      $('#AccountNumber').val(item.AccountNumber);      
    }

    
    // this is the id of the form
    $("#paymentsetting").submit(function(e) {
      e.preventDefault(); // avoid to execute the actual submit of the form.
      var form_data = retrive_income;
      
      form_data.MethodName=$('#MethodName').val();
      form_data.AccountNumber=$('#AccountNumber').val();
      form_data.UpdatedAt=new Date().toJSON();

      var actionUrl = api_root+"/api/paymentSetting/update";
        //console.log(form_data);
        $.ajax({
            type: "POST",
            url: actionUrl,
            data: form_data, // serializes the form's elements.
            success: function(data)
            {
              //console.log(data); // show response from the php script.
              window.location.href = 'payment-settings.php?from=edit';
            }
        });
    });
</script>

<?php
include('layout_footer.php');
?>