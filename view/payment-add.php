<?php
$title = "Payment";
include('layout_header.php');
?>
<section class="section">
      <div class="container">
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="card card-primary">
              <div class="card-header">
                <h4>Make Payment</h4>
              </div>
              <div class="card-body">
                <center>
                    <h5 style="color: orange;">Taxable Income Ammount: <span id="inc-amnt"></span></h5>
                    <h5 style="color: green;">Payable Tax Ammount: <span id="tax-amnt"></span></h5>
                </center>
                <br>

                <form method="POST" id="payment" class="needs-validation" novalidate="">
                  <div class="row">
                    <div class="form-group col-6">
                      <label for="PaymentAccount">Payment Method</label>
                      <select id="PaymentAccount" class="form-control" required name="PaymentAccount" >
                      </select>

                    </div>
                    <div class="form-group col-6">
                      <label for="TrxId">TRX Number</label>
                      <input id="TrxId" type="text" class="form-control needs-validation" required name="TrxId" autofocus>
                    </div>
                  </div>

                    <center>
                       <h5>Account Number: <span id="account_number"></span></h5> 
                    </center>                    

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
        var tax=5; //tax ammount 5%
        var user_id=loged_user; //user id from session
        var all_income = getJson(api_root+"/api/income");
        var all_payment = getJson(api_root+"/api/payment");
        var my_income = [];
        var tax_paid=[];
        var total_income = 0; 
        var j=0;
        var l=0;    
        for(var i=0;i<all_income.length;i++){
            for(var k=0;k<all_payment.length;k++){
                if(all_income[i].UserId==user_id && all_payment[k].IncomeId!=all_income[i].Id){
                    my_income[j]=all_income[i];
                    total_income=total_income+all_income[i].Amount;
                    j++
                }
            }
        }
        for(var i=0;i<all_income.length;i++){
            for(var k=0;k<all_payment.length;k++){
                if(all_income[i].UserId==user_id && all_payment[k].IncomeId==all_income[i].Id){
                    tax_paid[l]=all_payment[k];
                    l++
                }
            }
        }
        var last_paid = moment(all_payment[all_payment.length-1].PaymentDate).format('YYYY');
        var today_date = moment(new Date().toJSON()).format('YYYY');
        if(last_paid<today_date){
            $('.card-body').html('<center><h1 style="color:red;">Please input your income and pay TAX!</h1></center>');  
        }
        else if(total_income==0){
            $('.card-body').html('<center><h1 style="color:green;">You have No Payable Tax Amount!</h1></center>');
        }
        else{
            $('#inc-amnt').html(total_income);
            $('#tax-amnt').html(total_income*(tax/100));
        }
        
    });


    // this is the id of the form
    $("#payment").submit(function(e) {
      e.preventDefault(); // avoid to execute the actual submit of the form.
      if($('#TrxId').val()==''){
        alert('Please Input TRX ID!');
      }
      else{
        var form = $(this);
            for(var i=0;i<my_income.length;i++){
                var form_data = form.serialize()+"&IncomeId="+my_income[i].Id+"&Amount="+my_income[i].Amount+"&PaymentDate="+new Date().toJSON()+"&CreatedAt="+new Date().toJSON()+"&UpdatedAt="+new Date().toJSON();
                //console.log(form_data);
                var actionUrl = api_root+"/api/payment/create";
                $.ajax({
                    type: "POST",
                    url: actionUrl,
                    data: form_data, // serializes the form's elements.
                    success: function(data)
                    {
                        //console.log(data);
                        window.location.href = 'payment.php?from=add';
                    }
                });
            }
        }
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
                $('#account_number').html(res[0].AccountNumber);
                //console.log(res);
            }
        });
    });
    function create_table_row(item,index){
        var option='<option value="'+item.AccountNumber+'" >'+item.MethodName+'</option>';
        $('#PaymentAccount').append(option);        
    }
    $('#PaymentAccount').on('change', function() {
        $('#account_number').html(this.value);
    });
    </script>
<?php
include('layout_footer.php');
?>