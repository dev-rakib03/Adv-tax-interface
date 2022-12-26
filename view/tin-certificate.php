<?php
$title = "TIN-Certificate";
include('layout_header.php');
?>
<style>
    td{
        padding:0px 10px;
    }
</style>
<section class="section">
    <div class="section-body">
        <div class="container">
            <div class="card">
            <div class="card-header">
                <input type="button" class="btn btn-info" value="Download" id="download_tin" onclick="Export()">
            </div>
            <div>
                    <table id="tin_certificate" class="cert_table" style="background-position: center center; border-style: solid; border-color: Black; border-width: 1px; font-size:medium;">
                        <tbody>
                            <tr>
                                <td>
                                    <table class="inner_cert_table" style="padding-left:5px; padding-right:5px">
                                        <tbody>
                                            <tr>
                                                <td colspan="2" style="text-align: right;">
                                                    &nbsp;
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" style="text-align: center">
                                                    <img style="text-align:center" src="../assets/img/tin_cert_logo.png" alt="NBR" width="60px; height:60px;">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" style="text-align: center">
                                                    <span style="font-size: large; font-weight: bold;">Government of the People's Republic
                                                        of Bangladesh</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" style="text-align: center">
                                                    <span style="font-size: large; font-weight: bold;">National Board of Revenue</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" style="text-align: center">
                                                    <span style="font-size: large">Taxpayer's Identification Number (TIN) Certificate</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" style="text-align: center;">
                                                    <span style="font-weight: bold; font-size: large; text-align: center; text-decoration: underline;">
                                                        TIN : <span id="tin_number"></span>
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    &nbsp;<br>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    This is to Certify that <span style="font-weight: bold;"> <span id="name1"></span>
                                                    </span>is a Registered Taxpayer of National Board of Revenue under the jurisdiction
                                                    of <span style="font-weight: bold;">Taxes Circle-018 (Salary) </span>
                                                    , Taxes Zone <span style="font-weight: bold;">Khulna</span>.
                                                </td>
                                            </tr>                                    
                                            <tr>
                                                <td colspan="2">
                                                    <span style="font-weight: bold;">Taxpayer's Particulars : </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    1) Name : <span style="font-weight: bold;"> <span id="name2"></span> </span>
                                                </td>
                                            </tr>                                                              
                                            <tr>
                                                <td colspan="2">
                                                    2.a) Current Address : <span style="font-weight: bold;" id="address1"></span>
                                                </td>
                                            </tr>                        
                                            <tr>
                                                <td colspan="2">
                                                    2.b) Permanent Address : <span style="font-weight: bold;" id="address2"></span>
                                                </td>
                                            </tr>                                        
                                            <tr>
                                                <td colspan="2">
                                                    3) Status : <span style="font-weight: bold;" id="acc_type"></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <br><br>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    Date : <span id="date"></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <table width="100%">
                                                        <tbody>
                                                            <tr>
                                                                <td style="width: 30%; vertical-align: top;">
                                                                    <table style="width: 200px; vertical-align: top; text-align: left;">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td colspan="2">
                                                                                    <span style="font-weight: bold; text-align: left; text-decoration: underline;">Please
                                                                                        Note:</span>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td style="width: 10px;">
                                                                                </td>
                                                                                <td>
                                                                                </td>
                                                                            </tr>
                                                                            <tr style="text-align: left; font-size: x-small;">
                                                                                <td style="width: 10px; vertical-align: top;">
                                                                                    1.
                                                                                </td>
                                                                                <td>
                                                                                    A Taxpayer is liable to file the Return of Income under section 75 of the Income
                                                                                    Tax Ordinance, 1984.
                                                                                </td>
                                                                            </tr>
                                                                            <tr style="text-align: left; font-size: x-small;">
                                                                                <td style="width: 10px; vertical-align: top;">
                                                                                    2.
                                                                                </td>
                                                                                <td>
                                                                                    Failure to file Return of Income under section 75 is liable to-
                                                                                </td>
                                                                            </tr>
                                                                            <tr style="text-align: left; font-size: x-small;">
                                                                                <td style="width: 10px; vertical-align: top;">
                                                                                </td>
                                                                                <td>
                                                                                    (a) Penalty under section 124; and
                                                                                </td>
                                                                            </tr>
                                                                            <tr style="text-align: left; font-size: x-small;">
                                                                                <td style="width: 10px; vertical-align: top;">
                                                                                </td>
                                                                                <td>
                                                                                    (b) Prosecution under section 164 of the Income Tax Ordinance, 1984.
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                                <td style="text-align: center; width: 40%;">
                                                                    <img src="../assets/img/GetQRCode.jpg" height="150px;" width="150px;" alt="QR Code" style="text-align:center;">
                                                                </td>
                                                                <td style="text-align: left; width: 30%; vertical-align: top;">
                                                                    <span style="text-align: left; font-size: x-small;">
                                                                            <span style="font-weight: bold">Deputy Commissioner
                                                                            of Taxes </span>
                                                                        <br>
                                                                        Taxes Circle-018 (Salary)
                                                                        <br>
                                                                        Taxes Zone Khulna
                                                                        <br>
                                                                        Address : Baborali Gat, Chamrapotti, Aruyapara, Kustia.
                                                                        Phone : 02478853277
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    &nbsp;<br>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" style="text-align: center">
                                                    <span style="text-align: center; text-decoration: underline; font-size: x-small;">N.
                                                        B: This is a system generated certificate and requires no manual signature.
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" style="text-align: center">
                                                    &nbsp;
                                                </td>
                                            </tr>
                                    
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
            </div>
            </div>
        </div>
    </div>
</section>

<script>
    $( document ).ready(function() {
        $.ajax({
            url: api_root+"/api/users/"+loged_user,
            type: 'GET',
            dataType: 'json', // added data type
            success: function(res) {
                if(res==null){
                    window.location.href="dashboard.php";
                }else{
                    create_table_row(res);
                } 
            }
        });
    });
    
    function create_table_row(item){
        $('#tin_number').html(item.TinNumber );
        $('#name1').html(item.Name);
        $('#name2').html(item.Name);
        $('#address1').html(item.Address);
        $('#address2').html(item.Address);
        $('#acc_type').html(item.AccountType);
        $('#date').html(moment(item.CreatedAt).format('YYYY-MM-YY'));
    }
    </script>

    <script type="text/javascript" src="../assets/js/pdfmake.min.js"></script>
    <script type="text/javascript" src="../assets/js/html2canvas.min.js"></script>
    <script type="text/javascript">
        function Export() {
            const d = new Date();
            let time = d.getTime();
            html2canvas(document.getElementById('tin_certificate'), {
                onrendered: function (canvas) {
                    var data = canvas.toDataURL();
                    var docDefinition = {
                        content: [{
                            image: data,
                            width: 500
                        }]
                    };
                    pdfMake.createPdf(docDefinition).download("TIN_certificate"+time+".pdf");
                }
            });
        }
    </script>
<?php
include('layout_footer.php');
?>