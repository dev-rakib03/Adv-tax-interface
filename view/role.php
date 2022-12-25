<?php
$title = "Role";
include('layout_header.php');
?>
  <link rel="stylesheet" href="../assets/bundles/datatables/datatables.min.css">
  <link rel="stylesheet" href="../assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">

        <section class="section">
          <div class="section-body">
          <?php if(isset($_GET['from'])){ ?>
            <div class="alert alert-success">
              <div class="alert-title">Role <?php if($_GET['from']=='delete'){ ?> deleted<?php } ?>
              <?php if($_GET['from']=='edit'){ ?> Updated <?php } ?>
              <?php if($_GET['from']=='add'){ ?> Added <?php } ?>
              Successfully</div>
            </div>
          <?php } ?>
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>All Role</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table">
                        <thead>
                          <tr>
                            <th class="text-center">
                              #
                            </th>
                            <th>Name</th>
                            <th>Permissions</th>
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
            url: api_root+"/api/roles",
            type: 'GET',
            dataType: 'json', // added data type
            success: function(res) {
                res.forEach(create_table_row);
                //alert(res);
            }
        });
    });
var rolename=['Dashboard User','Dashboard Admin','TIN Certificate','Role','Role Edit','Role Add','User','User Add','User Edit','User View','User Delete','Income','Income Add','Income Edit','Income View','Income Delete','Payment','Payment Add','Payment View','Site Settings','Payment Setting','Payment Setting Add','Payment Setting Edit','Payment Setting Delete','Ticket','Ticket Add','Ticket Edit','Ticket View','Ticket Delete','Income Admin','Payment Admin','Ticket Admin'];
    function create_table_row(item,index){
        var role_permission=item.Permission.split(",");
        var per_html='';
        for(var i=0;i<role_permission.length;i++){
            if(per_html==''){
                per_html='<div class="badge badge-success badge-shadow" style="margin:2px;">'+rolename[role_permission[i]-1]+'</div>';
            }
            else{
                per_html=per_html+'<div class="badge badge-success badge-shadow" style="margin:2px;">'+rolename[role_permission[i]-1]+'</div>';
            }
        }
        var row=
                '<tr>'
                    +'<td>'+(index+1)+'</td>'
                    +'<td>'+item.Name+'</td>'
                    +'<td>'
                    +per_html                      
                    +'</td>'
                    +'<td><a href="role-edit.php?id='+item.Id+'" class="btn btn-primary">Edit</a></td>'
                +'</tr>';
        
        $('#table > tbody:last-child').append(row);
        //console.log(item);
    }
    </script>
<?php
include('layout_footer.php');
?>