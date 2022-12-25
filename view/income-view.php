<?php
$title = "Income";
include('layout_header.php');
?>
<link rel="stylesheet" href="../assets/bundles/datatables/datatables.min.css">
  <link rel="stylesheet" href="../assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">

        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Income</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table">
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
            url: api_root+"/api/income/<?php echo $_GET['id']; ?>",
            type: 'GET',
            dataType: 'json', // added data type
            success: function(res) {
                //console.log(res);
                if(res==null){
                    window.location.href="income.php";
                }else{
                    set_input_data(res);
                }
            }
        });
    });
    
  
    function set_input_data(item){
      
        var row=
                '<tr>'
                    +'<th>User Id</th>'
                    +'<td>'+item.UserId+'</td>'
                +'</tr>'
                +'<tr>'
                    +'<th>Start Date</th>'
                    +'<td>'+moment(item.DateStart).format('YYYY-MM-YY')+'</td>'
                +'</tr>'
                +'<tr>'
                    +'<th>End Date</th>'
                    +'<td>'+moment(item.DateEnd).format('YYYY-MM-YY')+'</td>'
                +'</tr>'
                +'<tr>'
                    +'<th>Income Info</th>'
                    +'<td>'+item.IncomeInfo+'</td>'
                +'</tr>'
                +'<tr>'
                    +'<th>Ammount</th>'                    
                    +'<td>'+item.Amount+'</td>'   
                +'</tr>';        
        $('#table > tbody:last-child').append(row);
        //console.log(item);
    }

    </script>


<?php
include('layout_footer.php');
?>