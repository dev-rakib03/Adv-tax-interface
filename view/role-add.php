<?php
$title = "Role";
include('layout_header.php');
?>
<style>
    .section-title{
        margin-top:0px!important;
    }
    .card-body{
        padding-top:0px!important;
    }
</style>
<section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Add Role</h4>
                  </div>
                  <div class="card-body">

                    <div class="section-title">Role Name</div>
                    <div>
                        <input type="text" class="form-control" id="role-name" /><br>
                    </div>

                    <div class="section-title">Dashboard</div>
                    <div>
                        <input type="checkbox" id="r-1" />&nbsp;&nbsp;<label>Dashboard User</label><br>
                        <input type="checkbox" id="r-2" />&nbsp;&nbsp;<label>Dashboard Admin</label><br>
                    </div>

                    <div class="section-title">TIN Certificate</div>
                    <div>
                        <input type="checkbox" id="r-3" />&nbsp;&nbsp;<label>TIN Certificate</label>
                    </div>

                    <div class="section-title">Role</div>
                    <div>
                      <input type="checkbox"  id="r-4"/>&nbsp;&nbsp;<label>Role</label><br>
                      <input type="checkbox"  id="r-5"/>&nbsp;&nbsp;<label>Role Edit</label><br>
                      <input type="checkbox"  id="r-6"/>&nbsp;&nbsp;<label>Role Delete</label><br>
                    </div>                    

                    <div class="section-title">User</div>
                    <div>
                        <input type="checkbox"  id="r-7"/>&nbsp;&nbsp;<label>User</label><br>
                        <input type="checkbox"  id="r-8"/>&nbsp;&nbsp;<label>User Add</label><br>
                        <input type="checkbox"  id="r-9"/>&nbsp;&nbsp;<label>User Edit</label><br>
                        <input type="checkbox"  id="r-10"/>&nbsp;&nbsp;<label>User View</label><br>
                        <input type="checkbox"  id="r-11"/>&nbsp;&nbsp;<label>User Delete</label><br>
                    </div>

                    <div class="section-title">Income</div>
                    <div>
                        <input type="checkbox"  id="r-12"/>&nbsp;&nbsp;<label>Income</label><br>
                        <input type="checkbox"  id="r-13"/>&nbsp;&nbsp;<label>Income Add</label><br>
                        <input type="checkbox"  id="r-14"/>&nbsp;&nbsp;<label>Income Edit</label><br>
                        <input type="checkbox"  id="r-15"/>&nbsp;&nbsp;<label>Income View</label><br>
                        <input type="checkbox"  id="r-16"/>&nbsp;&nbsp;<label>Income Delete</label><br>
                        <input type="checkbox"  id="r-30"/>&nbsp;&nbsp;<label>Income Admin</label><br>
                    </div>
                    
                    <div class="section-title">Payment</div>
                    <div>
                        <input type="checkbox"  id="r-17"/>&nbsp;&nbsp;<label>Payment</label><br>
                        <input type="checkbox"  id="r-18"/>&nbsp;&nbsp;<label>Payment Add</label><br>
                        <input type="checkbox"  id="r-19"/>&nbsp;&nbsp;<label>Payment View</label><br>
                        <input type="checkbox"  id="r-31"/>&nbsp;&nbsp;<label>Payment Admin</label><br>
                    </div>

                    <div class="section-title">Site Settings</div>
                    <div>
                        <input type="checkbox"  id="r-20"/>&nbsp;&nbsp;<label>Site Settings</label><br>
                    </div>

                    <div class="section-title">Payment Settings</div>
                    <div>
                        <input type="checkbox"  id="r-21"/>&nbsp;&nbsp;<label>Payment Settings</label><br>
                        <input type="checkbox"  id="r-22"/>&nbsp;&nbsp;<label>Payment Settings Add</label><br>
                        <input type="checkbox"  id="r-23"/>&nbsp;&nbsp;<label>Payment Settings Edit</label><br>
                        <input type="checkbox"  id="r-24"/>&nbsp;&nbsp;<label>Payment Settings Delete</label><br>
                    </div>

                    <div class="section-title">Tickets</div>
                    <div>
                        <input type="checkbox"  id="r-25"/>&nbsp;&nbsp;<label>Ticket</label><br>
                        <input type="checkbox"  id="r-26"/>&nbsp;&nbsp;<label>Ticket Add</label><br>
                        <input type="checkbox"  id="r-27"/>&nbsp;&nbsp;<label>Ticket Edit</label><br>
                        <input type="checkbox"  id="r-28"/>&nbsp;&nbsp;<label>Ticket View</label><br>
                        <input type="checkbox"  id="r-29"/>&nbsp;&nbsp;<label>Ticket Delete</label><br>
                        <input type="checkbox"  id="r-32"/>&nbsp;&nbsp;<label>Ticket Admin</label><br>
                    </div>
                    <br>
                    <input onclick="create_save()" type="button" class="btn btn-primary" value="Save"/>

                  </div>
                </div>
              </div>
            </div>
          </div>
</section>

<script>
    var item=JSON.parse('{}');

    function create_save(){
        var new_permission='';
        for(var i=1;i<=32;i++){
            if($("#r-"+i).is(':checked')){
                new_permission==''?new_permission=i:new_permission=new_permission+','+i;
            }               
        }
        item.Name=$('#role-name').val();
        item.Permission=new_permission;
        item.CreatedAt=new Date().toJSON();
        item.UpdatedAt=new Date().toJSON();

        if(item.Permission!='' && item.Name!=''){
            //console.log(item);
            var form_data = item;
            var actionUrl = api_root+"/api/roles/create";
            $.ajax({
                type: "POST",
                url: actionUrl,
                data: form_data,
                success: function(data)
                {
                    //console.log(data); // show response from the php script.
                    window.location.href = 'role.php?from=add';
                }
            });
        }
        else{
            alert("Name or permission Missing.")
        }
    }
    </script>

<?php
include('layout_footer.php');
?>