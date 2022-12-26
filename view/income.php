<?php
$title = "Income";
include('layout_header.php');
?>
<link rel="stylesheet" href="../assets/bundles/datatables/datatables.min.css">
  <link rel="stylesheet" href="../assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">

        <section class="section" id="income">
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
                            <th>User Id</th>
                            <th>Date Start</th>
                            <th>Date End</th>
                            <th>Income Info</th>
                            <th>Ammount</th>                            
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
            url: api_root+"/api/income",
            type: 'GET',
            dataType: 'json', // added data type
            success: function(res) {
                res.forEach(create_table_row);
                //console.log(res);
            }
        });
        if(permission!=null){
          !permission.includes('12')? $('#income').hide():'';
          !permission.includes('14')? $('#view-income').hide():'';
          !permission.includes('15')? $('#edit-income').hide():'';
          !permission.includes('16')? $('#delete-income').hide():'';
        }
    });
    
  
    function create_table_row(item,index){     
      
        var row=
                '<tr>'
                    +'<td>'+(index+1)+'</td>'
                    +'<td>'+item.UserId+'</td>'
                    +'<td>'+moment(item.DateStart).format('YYYY-MM-YY')+'</td>'
                    +'<td>'+moment(item.DateEnd).format('YYYY-MM-YY')+'</td>'
                    +'<td>'+item.IncomeInfo+'</td>'                    
                    +'<td>'+item.Amount+'</td>'                    
                    +'<td class="text-center">'
                      +'<a id="view-income" href="income-view.php?id='+item.Id+'" class="btn btn-success" style="margin:2px;">View</a><br>'
                      +'<a id="edit-income" href="income-edit.php?id='+item.Id+'" class="btn btn-primary" style="margin:2px;">Edit</a><br>'
                      +'<a id="delete-income" href="#" onclick="delete_data('+item.Id+');" class="btn btn-danger" style="margin:2px;">Delete</a><br>'
                    +'</td>'
                +'</tr>';
        if(permission.includes('30')){
          $('#table > tbody:last-child').append(row);
        }
        else if(item.UserId==loged_user){
          $('#table > tbody:last-child').append(row);
        }
        else{

        }        
        //console.log(item);
    }

    function delete_data(id){
      $.ajax({
          url: api_root+"/api/income/delete/"+id,
          type: 'GET',
          dataType: 'json', // added data type
          success: function(res) {
              window.location.href="income.php?from=delete"
          }
      });
    }
    </script>

<?php
include('layout_footer.php');
?>