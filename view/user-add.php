<?php
$title = "User";
include('layout_header.php');
?>
<section class="section">
      <div class="container">
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="card card-primary">
              <div class="card-header">
                <h4>Add User</h4>
              </div>
              <div class="card-body">
                <form method="POST" id="adduser" class="needs-validation" novalidate="">
                  <div class="row">
                    <div class="form-group col-6">
                      <label for="Name">Name</label>
                      <input id="Name" type="text" class="form-control needs-validation" required name="Name" autofocus>
                    </div>
                    <div class="form-group  col-6">
                        <label for="email">Email</label>
                        <input id="email" type="email" class="form-control needs-validation" required name="Email">
                        <div class="invalid-feedback">
                        </div>
                    </div>
                  </div>  
                  
                  <div class="row">
                    <div class="form-group col-6">
                        <label for="phone">Phone</label>
                        <input id="phone" type="tel" class="form-control" name="PhoneNo" required>
                        <div class="invalid-feedback">
                        </div>
                    </div>
                    <div class="form-group  col-6">
                        <label for="dob">Date of Birth</label>
                        <input id="dob" type="date" class="form-control needs-validation" required name="Dob">
                        <div class="invalid-feedback">
                        </div>
                    </div>
                  </div>  
                  
                  <div class="row">                    
                    <div class="form-group  col-6">
                        <label for="NidNumber">NID Number</label>
                        <input id="NidNumber" type="text" class="form-control needs-validation" required name="NidNumber">
                        <div class="invalid-feedback">
                        </div>
                    </div>                    
                    <div class="form-group  col-6">
                        <label for="address">Address</label>
                        <input id="address" type="text" class="form-control needs-validation" required name="Address">
                        <div class="invalid-feedback">
                        </div>
                    </div>
                  </div>  
                  
                  <div class="row">
                    <div class="form-group col-6">
                      <label for="gender">Gender</label>
                        <select id="gender" class="form-control needs-validation" required name="Gender" autofocus>
                            <option value="male" selected>Male</option>
                            <option value="female" >Female</option>
                            <option value="other" >Other</option>
                        </select>                      
                    </div>
                    <div class="form-group col-6">
                      <label for="AccountType">Account Type</label>
                        <select id="AccountType" class="form-control needs-validation" required name="AccountType" autofocus>
                            <option value="individual" selected>Individual</option>
                            <option value="business" >Business</option>                           
                        </select>                      
                    </div>                    
                  </div>                  

                  <div class="row">
                    <div class="form-group col-6">
                      <label for="password" class="d-block">Password</label>
                      <input id="password" type="password" class="form-control pwstrength" required data-indicator="pwindicator"
                        name="Password">
                      <div id="pwindicator" class="pwindicator">
                        <div class="bar"></div>
                        <div class="label"></div>
                      </div>
                    </div>

                    <div class="form-group col-6">
                      <label for="RoleId">Role</label>
                        <select id="RoleId" class="form-control needs-validation" required name="RoleId" autofocus>
                            <!-- <option value="male" selected>Male</option>
                            <option value="female" >Female</option>
                            <option value="other" >Other</option> -->
                        </select>                      
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
    $( document ).ready(function() {
        $.ajax({
            url: api_root+"/api/roles",
            type: 'GET',
            dataType: 'json', // added data type
            success: function(res) {
                res.forEach(create_table_row);
                //alert(res);
            }
        });
    });

    function create_table_row(item,index){
        var option='<option value="'+item.Id+'" >'+item.Name+'</option>';
        $('#RoleId').append(option);
    }




    // this is the id of the form
    $("#adduser").submit(function(e) {
      e.preventDefault(); // avoid to execute the actual submit of the form.
      const d = new Date();
      let time = d.getTime();
      var form = $(this);
      var form_data = form.serialize()+"&TinNumber="+time+"&CreatedAt="+new Date().toJSON()+"&UpdatedAt="+new Date().toJSON();
      var actionUrl = api_root+"/api/users/create";
        //console.log(form_data);
        $.ajax({
            type: "POST",
            url: actionUrl,
            data: form_data, // serializes the form's elements.
            success: function(data)
            {
                //console.log(data); // show response from the php script.
                window.location.href = 'user.php?from=add';
            }
        });
    });
</script>
<?php
include('layout_footer.php');
?>