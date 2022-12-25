<?php
$title = "User";
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
                    <h4>User Profile</h4>
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
            url: api_root+"/api/users/<?php echo $_GET['id']; ?>",
            type: 'GET',
            dataType: 'json', // added data type
            success: function(res) {
                //console.log(res);
                if(res==null){
                    window.location.href="user.php";
                }else{
                    create_table_row(res);
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
  
    function create_table_row(item){
      var role = getJson(api_root+"/api/roles/"+item.RoleId);
      if(role==null){
        roleName="No Role Found";
      }
      else{
        roleName=role.Name;
      }
        var row=
                '<tr>'
                    +'<th>Name</th>'
                    +'<td>'+item.Name+'</td>'
                +'</tr>'
                +'<tr>'
                    +'<th>Email</th>'
                    +'<td>'+item.Email+'</td>'
                +'</tr>'
                +'<tr>'
                    +'<th>Phone</th>'
                    +'<td>'+item.PhoneNo+'</td>'
                +'</tr>'
                +'<tr>'
                    +'<th>Date of Birth</th>'
                    +'<td>'+moment(item.Dob).format('YYYY-MM-YY')+'</td>'
                +'</tr>'
                +'<tr>'
                    +'<th>Gender</th>'
                    +'<td>'+item.Gender+'</td>'
                +'</tr>'
                +'<tr>'
                    +'<th>NID Number</th>'
                    +'<td>'+item.NidNumber+'</td>'
                +'</tr>'
                +'<tr>'
                    +'<th>Address</th>'
                    +'<td>'+item.Address+'</td>'
                +'</tr>'
                +'<tr>'
                    +'<th>Account Type</th>'
                    +'<td>'+item.AccountType+'</td>'
                +'</tr>'
                +'<tr>'
                    +'<th>TIN Number</th>'
                    +'<td>'+item.TinNumber+'</td>'
                +'</tr>'
                +'<tr>'
                    +'<th>Role</th>'
                    +'<td>'
                      +roleName                  
                    +'</td>'
                +'</tr>';        
        $('#table > tbody:last-child').append(row);
    }
    </script>

<?php
include('layout_footer.php');
?>