
<?php 
require_once('./../../config.php');
if(isset($_GET['id']) && $_GET['id'] > 0){
    $client = $conn->query("SELECT * FROM client_list where id ='{$_GET['id']}'");
    foreach($client->fetch_array() as $k =>$v){
        $$k = $v;
    }
}
?>
<?php if($_settings->chk_flashdata('success')): ?>
<script>
	alert_toast("<?php echo $_settings->flashdata('success') ?>",'success')
</script>
<?php endif;?>
<style>
	 #cimg{
        width:100%;
        height:25vh;
        object-fit:scale-down;
        object-position:center center;
    }
</style>
<div class="container-fluid">
	<div id="msg"></div>
	<form action="" id="manage-client">	
		<input type="hidden" name="id" value="<?php echo isset($id) ? $id: '' ?>">
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
				<div class="form-group col-6">
					<select name="status" id="status" class="form-control form-control-sm form-control-border"  required>
						<option value="1" <?php echo isset($status) && $status == 1 ? 'selected': '' ?>>Active</option>
						<option value="0" <?php echo isset($status) && $status == 0 ? 'selected': '' ?>>Inactive</option>
					</select>
					<small class="ml-3 text-maroon">Status</small>
				</div>
			</div>
	</form>
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
		$('.select2').select2({
			width:'resolve'
		})
	
		$('#manage-client').submit(function(e){
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
                        location.reload();
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