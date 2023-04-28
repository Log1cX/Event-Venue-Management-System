<?php 
if($_settings->userdata('login_type') == 1 || $_settings->userdata('id') <= 0){
    echo "<script> alert('You are not allowed to access this page.'); location.replace('./')</script>";
}
?>
<div class="content py-5">
    <div class="container">
        <div class="card card-outline card-maroon rounded-0 shadow">
            <div class="card-header">
                <h4 class="card-title">My Bookings</h4>
                <div class="card-tools">
                    <button id="book_now" class="btn btn-default border-0 bg-gradient-maroon btn-flat" href="./?page=manage_account">New Booking</button>
                </div>
            </div>
            <div class="card-body">
                <div class="container-fluid">
                    <table id="booking-list" class="table table-stripped table-bordered">
                        <colgroup>
                            <col width="20%">
                            <col width="15%">
                            <col width="35%">
                            <col width="15%">
                            <col width="15%">
                        </colgroup>
                        <thead>
                            <tr class="bg-gradient-maroon">
                                <th class="text-center">Date Created</th>
                                <th class="text-center">Ref. Code</th>
                                <th class="text-center">Hall</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $bookings = $conn->query("SELECT b.*,h.name as hall FROM `booking_list` b inner join hall_list h on b.hall_id = h.id where b.client_id = '{$_settings->userdata('id')}' order by b.status asc, unix_timestamp(b.date_created) asc ");
                            while($row = $bookings->fetch_assoc()):
                            ?>
                            <tr>
                                <td><?= date("Y-m-d H:i", strtotime($row['date_created'])) ?></td>
                                <td><?= $row['code'] ?></td>
                                <td><?= $row['hall'] ?></td>
                                <td class="text-center">
                                    <?php 
                                        switch($row['status']){
                                            case 0:
                                                echo '<span class="badge badge-secondary bg-gradient-secondary px-3 rounded-pill">Pending</span>';
                                                break;
                                            case 1:
                                                echo '<span class="badge badge-primary bg-gradient-primary px-3 rounded-pill">Confirmed</span>';
                                                break;
                                            case 2:
                                                echo '<span class="badge badge-teal bg-gradient-teal px-3 rounded-pill">Done</span>';
                                                break;
                                            case 3:
                                                echo '<span class="badge badge-danger bg-gradient-danger px-3 rounded-pill">Cancelled</span>';
                                                break;
                                            default:
                                                echo '<span class="badge badge-default border px-3 rounded-pill">N/A</span>';
                                                break;
                                        }
                                    
                                    ?>
                                </td>
                                <td class="text-center">
                                    <button class="btn btn-default border btn-sm btn-flat view_data" data-id='<?= $row['id'] ?>'><i class="fa fa-eye"></i> View</button>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function(){
        $(".view_data").click(function(){
            uni_modal("View Booking Details","view_booking.php?id="+ $(this).attr('data-id'));
        })
        $('#booking-list').dataTable({
            columnDefs: [
                { orderable: false, targets: 4 }
            ],
        })
    })
</script>