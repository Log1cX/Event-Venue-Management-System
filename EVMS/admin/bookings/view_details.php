<?php
require_once('./../../config.php');
if(isset($_GET['id'])){
    $qry = $conn->query("SELECT b.*,h.name as `hall`,concat(c.lastname,', ',c.firstname,' ', c.middlename) as fullname, c.contact, c.address from `booking_list` b inner join `hall_list` h on b.hall_id = h.id inner join client_list c on b.client_id = c.id where b.id = '{$_GET['id']}' ");
    if($qry->num_rows > 0){
        $res = $qry->fetch_array();
        foreach($res as $k => $v){
            if(!is_numeric($k))
            $$k = $v;
        }
        $services = "";
        if(!empty($services_ids)){
            $services_ids = str_replace("|","",$services_ids);
            $services_qry = $conn->query("SELECT * FROM `service_list` where id in ({$services_ids})");
            while($row = $services_qry->fetch_assoc()){
                if(!empty($services)) $services .= ", ";
                $services .= $row['name'];
            }
        }
        $services = !empty($services) ? $services : "N/A";
    }
}
?>
<style>
    #uni_modal .modal-footer{
        display:none;
    }
</style>
<div class="container-fluid">
    <div id="outprint" class="list-group">
        <div class="row">
            <div class="col-4 bg-gradient-maroon border">Reference Code:</div>
            <div class="col-8 text-dark border"><?= isset($code) ? $code : "N/A" ?></div>
            <div class="col-4 bg-gradient-maroon border">Client Name:</div>
            <div class="col-8 text-dark border"><?= isset($fullname) ? $fullname : "N/A" ?></div>
            <div class="col-4 bg-gradient-maroon border">Contact #:</div>
            <div class="col-8 text-dark border"><?= isset($contact) ? $contact : "N/A" ?></div>
            <div class="col-4 bg-gradient-maroon border">Address:</div>
            <div class="col-8 text-dark border"><?= isset($address) ? $address : "N/A" ?></div>
            <div class="col-4 bg-gradient-maroon border">Hall:</div>
            <div class="col-8 text-dark border"><?= isset($hall) ? $hall : "N/A" ?></div>
            <div class="col-4 bg-gradient-maroon border">Services:</div>
            <div class="col-8 text-dark border"><?= isset($services) ? $services : "N/A" ?></div>
            <div class="col-4 bg-gradient-maroon border">Wedding Schedule:</div>
            <div class="col-8 text-dark border"><?= isset($wedding_schedule) ? date("M d, Y", strtotime($wedding_schedule)) : "N/A" ?></div>
            <div class="col-4 bg-gradient-maroon border">Total Guests:</div>
            <div class="col-8 text-dark border"><?= isset($total_guests) ? $total_guests : "N/A" ?></div>
            <div class="col-4 bg-gradient-maroon border">Status:</div>
            <div class="col-8 text-dark border">
                <?php 
                $status = isset($status) ? $status : "";
                    switch ($status){
                        case 0:
                            echo '<span class="rounded-pill badge badge-secondary bg-gradient-secondary px-3">Pending</span>';
                            break;
                        case 1:
                            echo '<span class="rounded-pill badge badge-primary bg-gradient-primary px-3">Confirmed</span>';
                            break;
                        case 2:
                            echo '<span class="rounded-pill badge badge-success bg-gradient-success px-3">Done</span>';
                            break;
                        case 3:
                            echo '<span class="rounded-pill badge badge-danger bg-gradient-danger px-3">Cancelled</span>';
                            break;
                        default:
                            echo '<span class="rounded-pill badge badge-default bg-gradient-default border px-3">N/A</span>';
                            break;
                    }
                ?>
            </div>
            <div class="col-4 bg-gradient-maroon border">Remarks:</div>
            <div class="col-8 text-dark border"><?= isset($remarks) ? $remarks : "N/A" ?></div>
        </div>
    </div>
    <div class="clear-fix my-2"></div>
    <div class="text-right">
        <button class="btn btn-sm btn-flat btn-primary" type="button" id="edit_booking"><i class="fa fa-edit"></i> Edit</button>
        <button class="btn btn-sm btn-flat btn-dark" type="button" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
    </div>
</div>

<script>
   
   $(function(){
        $('#edit_booking').click(function(){
            uni_modal("Update Booking Details - <?= isset($code) ? $code : '' ?>","bookings/manage_booking.php?id=<?= isset($id) ? $id : '' ?>",'mid-large')
        })
   })
    
</script>