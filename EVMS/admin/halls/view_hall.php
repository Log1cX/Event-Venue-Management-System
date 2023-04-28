<?php
require_once('../../config.php');
if(isset($_GET['id'])){
    $qry = $conn->query("SELECT * FROM `hall_list` where id = '{$_GET['id']}'");
    if($qry->num_rows > 0){
        $res = $qry->fetch_array();
        foreach($res as $k => $v){
            if(!is_numeric($k))
            $$k = $v;
        }
    }
}
?>
<style>
    #uni_modal .modal-footer{
        display:none !important;
    }
    #hall-image-view{
        width:100%;
        height:15vh;
        object-fit:scale-down;
        object-position:center center
    }
</style>
<div class="container-fluid">
    <center><img src="<?= validate_image(isset($image_path) ? $image_path : "") ?>" alt="Hall Image" id="hall-image-view" class="bg-gradient-gray img-thumbnail"></center>
    <dl>
        <dt class="text-muted">Code</dt>
        <dd class='pl-4 fs-4 fw-bold'><?= isset($code) ? $code : '' ?></dd>
        <dt class="text-muted">Hall</dt>
        <dd class='pl-4 fs-4 fw-bold'><?= isset($name) ? $name : '' ?></dd>
        <dt class="text-muted">Price</dt>
        <dd class='pl-4 fs-4 fw-bold'><?= isset($price) ? number_format($price,2) : '' ?></dd>
        <dt class="text-muted">Description</dt>
        <dd class='pl-4'>
            <p class=""><small><?= isset($description) ? ($description) : '' ?></small></p>
        </dd>
        <dt class="text-muted">Status</dt>
        <dd class='pl-4 fs-4 fw-bold'>
            <?php 
            $status = isset($status) ? $status : 0;
                switch($status){
                    case 0:
                        echo '<span class="badge badge-danger bg-gradient-danger px-3 rounded-pill">Inactive</span>';
                        break;
                    case 1:
                        echo '<span class="badge badge-primary bg-gradient-primary px-3 rounded-pill">Active</span>';
                        break;
                    default:
                        echo '<span class="badge badge-default border px-3 rounded-pill">N/A</span>';
                            break;
                }
            ?>
        </dd>
    </dl>
    <div class="col-12 text-right">
        <button class="btn btn-flat btn-sm btn-dark" type="button" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
    </div>
</div>