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
                <h4>Edit User</h4>
              </div>
              <div class="card-body">
                <form method="POST" id="signup" class="needs-validation" novalidate="">
                  <div class="row">
                    <div class="form-group col-6">
                      <label for="Name">Name</label>
                      <input id="Name" type="text" class="form-control needs-validation" required name="Name" autofocus>
                    </div>
                    <div class="form-group  col-6">
                        <label for="Email">Email</label>
                        <input id="Email" type="email" class="form-control needs-validation" required name="Email">
                        <div class="invalid-feedback">
                        </div>
                    </div>
                  </div>  
                  
                  <div class="row">
                    <div class="form-group col-6">
                        <label for="PhoneNo">Phone</label>
                        <input id="PhoneNo" type="tel" class="form-control" name="PhoneNo" required>
                        <div class="invalid-feedback">
                        </div>
                    </div>
                    <div class="form-group  col-6">
                        <label for="Dob">Date of Birth</label>
                        <input id="Dob" type="date" class="form-control needs-validation" required name="Dob">
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
                        <label for="Address">Address</label>
                        <input id="Address" type="text" class="form-control needs-validation" required name="Address">
                        <div class="invalid-feedback">
                        </div>
                    </div>
                  </div>  
                  
                  <div class="row">
                    <div class="form-group col-6">
                      <label for="Gender">Gender</label>
                        <select id="Gender" class="form-control needs-validation" required name="Gender" autofocus>
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
                      <input id="Password" type="password" class="form-control pwstrength" data-indicator="pwindicator"
                        name="Password">
                      <div id="pwindicator" class="pwindicator">
                        <div class="bar"></div>
                        <div class="label"></div>
                      </div>
                    </div>

                    <div class="form-group col-6">
                      <label for="RoleId">Role</label>
                        <select id="RoleId" class="form-control needs-validation" required name="RoleId" autofocus>
                        </select>                      
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
            url: api_root+"/api/roles",
            type: 'GET',
            dataType: 'json', // added data type
            success: function(res) {
                res.forEach(create_table_row);
                //alert(res);
            }
        });

        $.ajax({
            url: api_root+"/api/users/<?php echo $_GET['id']; ?>",
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

    function getJson(url) {
        return JSON.parse($.ajax({
            type: 'GET',
            url: url,
            dataType: 'json',
            global: false,
            async: false,
            success: function (data) {
                return data;
            }
        }).responseText);
    }

    function create_table_row(item,index){
        var option='<option value="'+item.Id+'" >'+item.Name+'</option>';
        $('#RoleId').append(option);
    }

    function set_input_data(item){
      retrive_user=item;
      var role = getJson(api_root+"/api/roles/"+item.RoleId);
      if(role==null){
        roleName="No Role Found";
      }
      else{
        roleName=role.Name;
      }

      $('#Name').val(item.Name);
      $('#Email').val(item.Email);
      $('#PhoneNo').val(item.PhoneNo);
      $('#Dob').val(moment(item.Dob).format('YYYY-MM-YY'));
      $('#NidNumber').val(item.NidNumber);
      $('#Address').val(item.Address);
      $("#Gender option[value="+item.Gender+"]").attr('selected','selected');
      $("#AccountType option[value="+item.AccountType+"]").attr('selected','selected');
      $("#RoleId option[value="+item.RoleId+"]").attr('selected','selected');
    }

    
    // this is the id of the form
    $("#signup").submit(function(e) {
      e.preventDefault(); // avoid to execute the actual submit of the form.
      var form_data = retrive_user;
      
      form_data.Name=$('#Name').val();
      form_data.Email=$('#Email').val();
      form_data.PhoneNo=$('#PhoneNo').val();
      form_data.Dob=$('#Dob').val();
      form_data.Gender=$('#Gender').val();
      form_data.NidNumber=$('#NidNumber').val();
      form_data.Address=$('#Address').val();
      form_data.Gender=$("#Gender").val();
      form_data.AccountType=$("#AccountType").val();
      form_data.RoleId=$("#RoleId").val();
      form_data.UpdatedAt=new Date().toJSON();

      if($("#Password").val()){
        form_data.Password=$("#Password").val();
      }

      var actionUrl = api_root+"/api/users/update";
        //console.log(form_data);
        $.ajax({
            type: "POST",
            url: actionUrl,
            data: form_data, // serializes the form's elements.
            success: function(data)
            {
              //console.log(data); // show response from the php script.
              window.location.href = 'user.php?from=edit';
            }
        });
    });
</script>
<?php
include('layout_footer.php');
?>