<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Sign up</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="../assets/css/app.min.css">
  <link rel="stylesheet" href="../assets/bundles/jquery-selectric/selectric.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="../assets/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href='../assets/img/favicon.ico' />
</head>

<body>
  <div class="loader"></div>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
      <center>
        <a href="index.php"><h5><i class="fa fa-home"></i> Home</h5></a>
      </center>
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="card card-primary">
              <div class="card-header">
                <h4>Register</h4>
              </div>
              <div class="card-body">
                <form method="POST" id="signup" class="needs-validation" novalidate="">
                  <input type="hidden" readonly name="RoleId" value="1">
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
                    <div class="form-group col-4">
                      <label for="gender">Gender</label>
                        <select id="gender" class="form-control needs-validation" required name="Gender" autofocus>
                            <option value="male" selected>Male</option>
                            <option value="female" >Female</option>
                            <option value="other" >Other</option>
                        </select>                      
                    </div>
                    <div class="form-group col-4">
                      <label for="AccountType">Account Type</label>
                        <select id="AccountType" class="form-control needs-validation" required name="AccountType" autofocus>
                            <option value="individual" selected>Individual</option>
                            <option value="business" >Business</option>                           
                        </select>                      
                    </div>
                    <div class="form-group col-4">
                      <label for="password" class="d-block">Password</label>
                      <input id="password" type="password" class="form-control pwstrength" required data-indicator="pwindicator"
                        name="Password">
                      <div id="pwindicator" class="pwindicator">
                        <div class="bar"></div>
                        <div class="label"></div>
                      </div>
                    </div>
                  </div>                  

                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="agree" required>
                      <label class="custom-control-label" for="agree">I agree with the terms and conditions</label>
                    </div>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                      Register
                    </button>
                  </div>

                </form>
              </div>
              <div class="mb-4 text-muted text-center">
                Already Registered? <a href="login.php">Login</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>


  <!-- General JS Scripts -->
  <script src="../assets/js/app.min.js"></script>
  <!-- JS Libraies -->
  <script src="../assets/bundles/jquery-pwstrength/jquery.pwstrength.min.js"></script>
  <script src="../assets/bundles/jquery-selectric/jquery.selectric.min.js"></script>
  <!-- Page Specific JS File -->
  <script src="../assets/js/page/auth-register.js"></script>
  <!-- Template JS File -->
  <script src="../assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="../assets/js/custom.js"></script>

    <!-- on form submit js code here -->
    <!-- hidden input will be RoleId,TinNumber,CreatedAt,UpdatedAt -->
  <script>
    $( document ).ready(function() {
        if(sessionStorage.getItem("user_id")){
          window.location.href="dashboard.php";
        }
    });
    // this is the id of the form
    $("#signup").submit(function(e) {
      e.preventDefault(); // avoid to execute the actual submit of the form.
      const d = new Date();
      let time = d.getTime();
      var form = $(this);
      var form_data = form.serialize()+"&TinNumber="+time+"&CreatedAt="+new Date().toJSON()+"&UpdatedAt="+new Date().toJSON();
      var actionUrl = "https://localhost:44362/api/users/create";
      if($('#agree').prop('checked')){
        //console.log(form_data);
        $.ajax({
            type: "POST",
            url: actionUrl,
            data: form_data, // serializes the form's elements.
            success: function(data)
            {
              //console.log(data); // show response from the php script.
              window.location.href = 'login.php?from=signup';
            }
        });
      }
    });
  </script>


</body>
</html>