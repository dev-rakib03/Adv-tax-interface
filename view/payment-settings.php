<?php
$title = "Payment-Settings";
include('layout_header.php');
?>
<section class="section">
      <div class="container">
      <?php if(isset($_GET['from'])){ ?>
            <div class="alert alert-success">
              <div class="alert-title">Payment Method <?php if($_GET['from']=='delete'){ ?> deleted<?php } ?>
              <?php if($_GET['from']=='edit'){ ?> Updated <?php } ?>
              <?php if($_GET['from']=='add'){ ?> Added <?php } ?>
              Successfully</div>
            </div>
          <?php } ?>
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

<section class="section">
          <div class="section-body">          
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>All Income</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table">
                        <thead>
                          <tr>
                            <th class="text-center">
                              #
                            </th>
                            <th>Payment Method</th>
                            <th>Account Number</th>                           
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>

                        </tbody>
                      </table>
                    </div>
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
    $("#paymentsetting").submit(function(e) {
      e.preventDefault(); // avoid to execute the actual submit of the form.
      var form = $(this);
      var form_data = form.serialize()+"&CreatedAt="+new Date().toJSON()+"&UpdatedAt="+new Date().toJSON();
      var actionUrl = api_root+"/api/paymentSetting/create";
        //console.log(form_data);
        $.ajax({
            type: "POST",
            url: actionUrl,
            data: form_data, // serializes the form's elements.
            success: function(data)
            {
                //console.log(data); // show response from the php script.
                window.location.href = 'payment-settings.php?from=add';
            }
        });
    });
</script>

<script>
    $( document ).ready(function() {
        $.ajax({
            url: api_root+"/api/paymentSetting",
            type: 'GET',
            dataType: 'json', // added data type
            success: function(res) {
                res.forEach(create_table_row);
                //console.log(res);
            }
        });
    });
    
  
    function create_table_row(item,index){
      
        var row=
                '<tr>'
                    +'<td>'+(index+1)+'</td>'
                    +'<td>'+item.MethodName+'</td>'
                    +'<td>'+item.AccountNumber+'</td>'                                      
                    +'<td class="text-center">'
                      +'<a href="payment-settings-edit.php?id='+item.Id+'" class="btn btn-primary" style="margin:2px;">Edit</a><br>'
                      +'<a href="#" onclick="delete_data('+item.Id+');" class="btn btn-danger" style="margin:2px;">Delete</a><br>'
                    +'</td>'
                +'</tr>';        
        $('#table > tbody:last-child').append(row);
        //console.log(item);
    }

    function delete_data(id){
      $.ajax({
          url: api_root+"/api/paymentSetting/delete/"+id,
          type: 'GET',
          dataType: 'json', // added data type
          success: function(res) {
              window.location.href="payment-settings.php?from=delete"
          }
      });
    }
    </script>

<?php
include('layout_footer.php');
?>