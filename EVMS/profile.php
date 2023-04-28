<?php 
if($_settings->userdata('login_type') == 1){
    echo "<script> alert('You are not allowed to access this page.'); location.replace('./')</script>";
}else{
    if($_settings->userdata('id') > 0){
        $qry = $conn->query("SELECT *,concat(lastname,', ',firstname,' ',middlename) as fullname FROM `client_list` where id = '{$_settings->userdata('id')}'");
        if($qry->num_rows > 0){
            $res = $qry->fetch_array();
            foreach($res as $k => $v){
                if(!is_numeric($k))
                $$k = $v;
            }
        }else{
            echo "<script> alert('You are not allowed to access this page.'); location.replace('./')</script>";
        }
    }else{
        echo "<script> alert('You are not allowed to access this page.'); location.replace('./')</script>";
    }
}

?>
<style>
    #client-image{
        width:100%;
        height:25vh;
        object-fit:scale-down;
        object-position:center center;
    }
</style>
<div class="content py-5">
    <div class="container">
        <div class="card card-outline card-maroon rounded-0 shadow">
            <div class="card-header">
                <h4 class="card-title">My Profile</h4>
                <div class="card-tools">
                    <a class="btn btn-default border-0 bg-gradient-maroon btn-flat" href="./?page=manage_account">Update Account</a>
                </div>
            </div>
            <div class="card-body">
                <div class="container-fluid">
                    <div class="d-flex">
                        <div class="col-md-4">
                            <center><img src="<?= validate_image(isset($avatar) ? $avatar : "") ?>" alt="Client Image" class="bg-gradient-gray img-fluid rounded-0" id="client-image"></center>
                        </div>
                        <div class="col-md-8">
                            <dl>
                                <dt class="text-maroon">Full Name</dt>
                                <dd class="ml-4"><b><?= isset($fullname) ? $fullname : "N/A" ?></b></dd>
                                <dt class="text-maroon">Gender</dt>
                                <dd class="ml-4"><b><?= isset($gender) ? $gender : "N/A" ?></b></dd>
                                <dt class="text-maroon">Contact</dt>
                                <dd class="ml-4"><b><?= isset($contact) ? $contact : "N/A" ?></b></dd>
                                <dt class="text-maroon">Email</dt>
                                <dd class="ml-4"><b><?= isset($email) ? $email : "N/A" ?></b></dd>
                                <dt class="text-maroon">Address</dt>
                                <dd class="ml-4"><b><?= isset($address) ? $address : "N/A" ?></b></dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>