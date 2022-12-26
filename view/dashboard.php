<?php
$title = "Dashboard";
include('layout_header.php');
?>
        <section class="section" id="user_section">
          <div class="row ">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15">Total Income</h5>
                          <h2 class="mb-3 font-18"><span id="user-total-income"></span></h2>                          
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="../assets/img/banner/1.png" alt="">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>            
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15">Total Tax Paid</h5>
                          <h2 class="mb-3 font-18"><span id="user-total-tax-paid"></span></h2>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="../assets/img/banner/4.png" alt="">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>          
        </section>

        <section class="section" id="admin">
          <div class="row ">
          <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15"> Total User</h5>
                          <h2 class="mb-3 font-18"><span id="total-user"></h2>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="../assets/img/banner/2.png" alt="">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15">Total Income</h5>
                          <h2 class="mb-3 font-18"><span id="admin-total-income"></h2>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="../assets/img/banner/1.png" alt="">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15">Total Tax paid</h5>
                          <h2 class="mb-3 font-18"><span id="admin-total-tax-paid"></h2>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="../assets/img/banner/4.png" alt="">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12 col-sm-12 col-lg-12">
              <div class="card ">
                <div class="card-header">
                  <h4>Revenue chart</h4>                  
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-12">
                      <div id="chart1"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
<!-- JS Libraies -->
<script src="../assets/bundles/apexcharts/apexcharts.min.js"></script>
<!-- Page Specific JS File -->
<script src="../assets/js/page/index.js"></script>
<script>
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


    $( document ).ready(function() {

        var user_id=loged_user; //user id from session
        var all_income = getJson(api_root+"/api/income");
        var all_payment = getJson(api_root+"/api/payment");
        var total_income = 0;
        var total_tax_paid = 0; 
        var j=0;
        var l=0;
        

        if(permission!=null){
            if(permission.includes('2')){
                var total_user = getJson(api_root+"/api/users");
                for(var i=0;i<all_income.length;i++){
                    total_income=total_income+all_income[i].Amount;
                }
                

                for(var k=0;k<all_payment.length;k++){
                    total_tax_paid = total_tax_paid+all_payment[k].Amount;
                }

                $('#admin-total-income').html(total_income);
                $('#admin-total-tax-paid').html(total_tax_paid);
                $('#total-user').html(total_user.length);
                $('#user_section').hide();
            }
            else{
                for(var i=0;i<all_income.length;i++){
                    if(all_income[i].UserId==user_id){
                        total_income=total_income+all_income[i].Amount;
                        j++
                    }
                }
                
                for(var i=0;i<all_income.length;i++){
                    for(var k=0;k<all_payment.length;k++){
                        if(all_income[i].UserId==user_id && all_payment[k].IncomeId==all_income[i].Id){
                            total_tax_paid = total_tax_paid+all_payment[k].Amount;
                        }
                    }
                }
                $('#user-total-income').html(total_income);
                $('#user-total-tax-paid').html(total_tax_paid);
                $('#admin').hide();
            }
        }
        
    });

</script>
<?php
include('layout_footer.php');
?>