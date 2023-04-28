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
    #cimg{
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
                    <form id="client-form" action="" method="post">
                        <input type="hidden" name="id" value="<?= isset($id) ? $id : "" ?>">
                        <div class="row">
                            <div class="form-group col-md-6">
                            <input type="text" name="firstname" id="firstname" autofocus class="form-control form-control-sm form-control-border" required value="<?= isset($firstname) ? $firstname : "" ?>">
                            <small class="ml-3 text-maroon">First Name</small>
                            </div>
                            <div class="form-group col-md-6">
                            <input type="text" name="middlename" id="middlename" class="form-control form-control-sm form-control-border" placeholder="optional" value="<?= isset($middlename) ? $middlename : "" ?>">
                            <small class="ml-3 text-maroon">Middle Name</small>
                            </div>
                            <div class="form-group col-md-6">
                            <input type="text" name="lastname" id="lastname" class="form-control form-control-sm form-control-border" required value="<?= isset($lastname) ? $lastname : "" ?>">
                            <small class="ml-3 text-maroon">Last Name</small>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                            <select name="gender" id="gender" class="form-control form-control-sm form-control-border">
                                <option <?= isset($gender) && $gender == "Male" ? 'selected' : '' ?>>Male</option>
                                <option <?= isset($gender) && $gender == "Female" ? 'selected' : '' ?>>Female</option>
                            </select>
                            <small class="ml-3 text-maroon">Gender</small>
                            </div>
                            <div class="col-md-6">
                            <input type="text" name="contact" id="contact" class="form-control form-control-sm form-control-border" value="<?= isset($contact) ? $contact : "" ?>" required>
                            <small class="ml-3 text-maroon">Contact #</small>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                            <small class="ml-3 text-maroon">Address</small>
                            <textarea name="address" id="address" rows="3" class="form-control form-control-sm rounded-0" required><?= isset($address) ? $address : "" ?></textarea>
                            </div>
                        </div>
                        <div class="clear-fix my-3"></div>
                        <div class="row">
                            <div class="form-group col-md-6">
                            <input type="email" name="email" id="email" class="form-control form-control-sm form-control-border" required  value="<?= isset($email) ? $email : "" ?>">
                            <small class="ml-3 text-maroon">Email</small>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                            <div class="input-group input-group-sm">
                                <input type="password" name="password" id="password" class="form-control form-control-sm form-control-border">
                                <div class="input-group-append"><span class="input-group-text bg-transparent border-left-0 border-right-0 border-top-0 rounded-0 fa fa-eye-slash pass_view text-muted"></span></div>
                            </div>
                            <small class="ml-3 text-maroon">New Password</small>
                            </div>
                            <div class="form-group col-md-6">
                            <div class="input-group input-group-sm">
                                <input type="password" id="cpassword" class="form-control form-control-sm form-control-border">
                                <div class="input-group-append"><span class="input-group-text bg-transparent border-left-0 border-right-0 border-top-0 rounded-0 fa fa-eye-slash pass_view text-muted"></span></div>
                            </div>
                            <small class="ml-3 text-maroon">Confirm New Password</small>
                            </div>
                            <div class="col-md-12">
                                <small class="text-muted"><i><em>Leave the password fields above if you don't want to update your password.</em></i></small>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <small class="ml-3 text-maroon">Image</small>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input rounded-0" id="customFile" name="img" onchange="displayImg(this,$(this))">
                                    <label class="custom-file-label rounded-0" for="customFile">Choose file</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group d-flex justify-content-center col-md-6">
                                <img src="<?php echo validate_image(isset($avatar) ? $avatar : "") ?>" alt="" id="cimg" class="img-fluid img-thumbnail bg-gradient-gray">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <div class="input-group input-group-sm">
                                    <input type="password" name="oldpassword" id="oldpassword" class="form-control form-control-sm form-control-border" required>
                                    <div class="input-group-append"><span class="input-group-text bg-transparent border-left-0 border-right-0 border-top-0 rounded-0 fa fa-eye-slash pass_view text-muted"></span></div>
                                </div>
                                <small class="ml-3 text-maroon">Current Password</small><br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-8">
                            </div>
                            <!-- /.col -->
                            <div class="col-4">
                            <button type="submit" class="btn btn-default bg-gradient-maroon border-0 btn-block btn-flat">Update Account</button>
                            </div>
                            <!-- /.col -->
                        </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function displayImg(input,_this) {
	    if (input.files && input.files[0]) {
	        var reader = new FileReader();
	        reader.onload = function (e) {
	        	$('#cimg').attr('src', e.target.result);
	        	_this.siblings('.custom-file-label').html(input.files[0].name)
	        }

	        reader.readAsDataURL(input.files[0]);
	    }else{
            $('#cimg').attr('src', '<?php echo validate_image(isset($avatar) ? $avatar : "") ?>');
            _this.siblings('.custom-file-label').html('Choose file')
        }
	}

    $(function(){
        $('.pass_view').click(function(){
            var type = $(this).closest('.input-group').find('input').attr('type')
            if(type == 'password'){
                $(this).removeClass('fa-eye-slash').addClass('fa-eye')
                $(this).closest('.input-group').find('input').attr('type','text').focus()
            }else{
                $(this).addClass('fa-eye-slash').removeClass('fa-eye')
                $(this).closest('.input-group').find('input').attr('type','password').focus()
            }
        })
        $('#client-form').submit(function(e){
            e.preventDefault();
            var _this = $(this)
            $('.pop-msg').remove()
            var el = $('<div>')
                el.addClass("pop-msg alert")
                el.hide()
            if($('#password').val() != $('#cpassword').val()){
              el.addClass('alert-danger')
              el.text('Password does not match.')
              _this.prepend(el)
              el.show('slow')
              return false;
            }
            start_loader();
            $.ajax({
                url:_base_url_+"classes/Users.php?f=save_client",
				data: new FormData($(this)[0]),
                cache: false,
                contentType: false,
                processData: false,
                method: 'POST',
                type: 'POST',
                dataType: 'json',
				error:err=>{
					console.log(err)
					alert_toast("An error occured",'error');
					end_loader();
				},
                success:function(resp){
                    if(resp.status == 'success'){
                        location.href = './?page=profile';
                    }else if(!!resp.msg){
                        el.addClass("alert-danger")
                        el.text(resp.msg)
                        _this.prepend(el)
                    }else{
                        el.addClass("alert-danger")
                        el.text("An error occurred due to unknown reason.")
                        _this.prepend(el)
                    }
                    el.show('slow')
                    $('html,body,.modal').animate({scrollTop:0},'fast')
                    end_loader();
                }
            })
        })
    })
</script>