<?php
$title = "User";
include('layout_header.php');
?>
  <link rel="stylesheet" href="../assets/bundles/datatables/datatables.min.css">
  <link rel="stylesheet" href="../assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">

        <section class="section">
          <div class="section-body">
          <?php if(isset($_GET['from'])){ ?>
            <div class="alert alert-success">
              <div class="alert-title">User <?php if($_GET['from']=='delete'){ ?> deleted<?php } ?>
              <?php if($_GET['from']=='edit'){ ?> Updated <?php } ?>
              <?php if($_GET['from']=='add'){ ?> Added <?php } ?>
              Successfully</div>
            </div>
          <?php } ?>
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>All User</h4>
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
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Date of Birth</th>
                            <th>Gender</th>
                            <th>NID Number</th>
                            <th>Address</th>
                            <th>Account Type</th>
                            <th>Tin Number</th>
                            <th>Role</th>
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
            url: api_root+"/api/users",
            type: 'GET',
            dataType: 'json', // added data type
            success: function(res) {
                res.forEach(create_table_row);
                //console.log(res);
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
      var role = getJson(api_root+"/api/roles/"+item.RoleId);
      if(role==null){
        roleName="No Role Found";
      }
      else{
        roleName=role.Name;
      }
        var row=
                '<tr>'
                    +'<td>'+(index+1)+'</td>'
                    +'<td>'+item.Name+'</td>'
                    +'<td>'+item.Email+'</td>'
                    +'<td>'+item.PhoneNo+'</td>'
                    +'<td>'+moment(item.Dob).format('YYYY-MM-YY')+'</td>'
                    +'<td>'+item.Gender+'</td>'
                    +'<td>'+item.NidNumber+'</td>'
                    +'<td>'+item.Address+'</td>'
                    +'<td>'+item.AccountType+'</td>'
                    +'<td>'+item.TinNumber+'</td>'
                    +'<td>'
                      +roleName                  
                    +'</td>'
                    +'<td class="text-center">'
                      +'<a href="user-view.php?id='+item.Id+'" class="btn btn-success" style="margin:2px;">View</a><br>'
                      +'<a href="user-edit.php?id='+item.Id+'" class="btn btn-primary" style="margin:2px;">Edit</a><br>'
                      +'<a href="#" onclick="delete_data('+item.Id+');" class="btn btn-danger" style="margin:2px;">Delete</a><br>'
                    +'</td>'
                +'</tr>';        
        $('#table > tbody:last-child').append(row);
        //console.log(item);
    }

    function delete_data(id){
      $.ajax({
          url: api_root+"/api/users/delete/"+id,
          type: 'GET',
          dataType: 'json', // added data type
          success: function(res) {
              window.location.href="user.php?from=delete"
          }
      });
    }
    </script>

<?php
include('layout_footer.php');
?>