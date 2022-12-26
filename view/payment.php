<?php
$title = "Payment";
include('layout_header.php');
?>
<link rel="stylesheet" href="../assets/bundles/datatables/datatables.min.css">
  <link rel="stylesheet" href="../assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">

        <section class="section">
          <div class="section-body">
          <?php if(isset($_GET['from'])){ ?>
            <div class="alert alert-success">
              <div class="alert-title">Income <?php if($_GET['from']=='delete'){ ?> deleted<?php } ?>
              <?php if($_GET['from']=='edit'){ ?> Updated <?php } ?>
              <?php if($_GET['from']=='add'){ ?> Added <?php } ?>
              Successfully</div>
            </div>
          <?php } ?>
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
                            <th>Income Id</th>
                            <th>Payment Account</th>
                            <th>TrxId</th>
                            <th>Amount</th>
                            <th>Payment Date</th>                            
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
    <script src="../assets/bundles/datatables/datatables.min.js"></script>
    <script src="../assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script src="../assets/bundles/jquery-ui/jquery-ui.min.js"></script>
    <!-- Page Specific JS File -->
    <script src="../assets/js/page/datatables.js"></script>

    <script>
    $( document ).ready(function() {
        $.ajax({
            url: api_root+"/api/payment",
            type: 'GET',
            dataType: 'json', // added data type
            success: function(res) {
                res.forEach(create_table_row);
                //console.log(res);
            }
        });
    });
    if(permission!=null){
      !permission.includes('19')? $('#view-payment').hide():'';
    }

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
        var income = getJson(api_root+"/api/income/"+item.IncomeId);
        var row=
                '<tr>'
                    +'<td>'+(index+1)+'</td>'
                    +'<td>'+item.IncomeId+'</td>'
                    +'<td>'+item.PaymentAccount+'</td>'
                    +'<td>'+item.TrxId+'</td>'
                    +'<td>'+item.Amount+'</td>'                    
                    +'<td>'+moment(item.PaymentDate).format('YYYY-MM-YY')+'</td>'                    
                    +'<td class="text-center">'
                      +'<a id="view-payment" href="payment-view.php?id='+item.Id+'" class="btn btn-success" style="margin:2px;">View</a><br>'
                    +'</td>'
                +'</tr>';

        if(permission.includes('31')){
          $('#table > tbody:last-child').append(row);
        }
        else if(income.UserId==loged_user){
          $('#table > tbody:last-child').append(row);
        }
        else{

        }
        //console.log(item);
    }
</script>
<?php
include('layout_footer.php');
?>