<!DOCTYPE html>
<html lang="en">


<!-- index.html  21 Nov 2019 03:44:50 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">

  <title>Advance Tax Processing</title>
  <link rel='shortcut icon' type='image/x-icon' href='../assets/img/favicon.ico' />

  <!-- General CSS Files -->
  <link rel="stylesheet" href="../assets/css/app.min.css">

</head>

<body>

<?php
    include('nav.php');
?>
<section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h4>Verify Tax Info</h4>
              </div>
              <div class="card-body">
                <form method="POST" id="tax-info" class="needs-validation" novalidate="">

                  <div class="row">
                    <div class="form-group col-12">
                      <label for="Name">TIN Number</label>
                      <input id="Name" type="text" class="form-control needs-validation" required name="Name" autofocus>
                    </div>
                  </div>  

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                      Find
                    </button>
                  </div>

                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
</body>


<!-- index.html  21 Nov 2019 03:47:04 GMT -->
</html>