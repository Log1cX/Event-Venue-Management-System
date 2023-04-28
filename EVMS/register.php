<?php require_once('./config.php') ?>
<!DOCTYPE html>
<html lang="en" class="" style="height: auto;">
 <?php require_once('inc/header.php') ?>
<body class="hold-transition">
  <script>
    start_loader()
  </script>
  <style>
    html, body{
      height:calc(100%) !important;
      width:calc(100%) !important;
    }
    body{
      background-image: url("<?php echo validate_image($_settings->info('cover')) ?>");
      background-size:cover;
      background-repeat:no-repeat;
    }
    .login-title{
      text-shadow: 2px 2px black
    }
    #logo-img{
        height:150px;
        width:150px;
        object-fit:scale-down;
        object-position:center center;
        border-radius:100%;
    }
    @media (max-width:700px){
        #login{
        flex-direction:column !important
        }
    }
    #login .col-7,#login .col-5{
        width: 100% !important;
        max-width:unset !important
    }

  </style>
  <div class="h-100 d-flex align-items-center w-100" id="login">
    <div class="col-7 h-100 d-flex align-items-center justify-content-center">
      <div class="w-100">
        <center><img src="<?= validate_image($_settings->info('logo')) ?>" alt="" id="logo-img"></center>
        <h1 class="text-center py-5 login-title"><b><?php echo $_settings->info('name') ?></b></h1>
      </div>
      
    </div>
    <div class="col-5 h-100  bg-gradient-light">
      <div class="d-flex w-100 h-100 justify-content-center align-items-center">
        <div class="card col-lg-12 card-outline card-maroon rounded-0 shadow">
          <div class="card-header rounded-0">
            <h4 class="text-purle text-center"><b>Registration</b></h4>
          </div>
          <div class="card-body rounded-0">
            <form id="register-frm" action="" method="post">
              <input type="hidden" name="id">
              <div class="row">
                <div class="form-group col-md-6">
                  <input type="text" name="firstname" id="firstname" autofocus class="form-control form-control-sm form-control-border" required>
                  <small class="ml-3 text-maroon">First Name</small>
                </div>
                <div class="form-group col-md-6">
                  <input type="text" name="middlename" id="middlename" class="form-control form-control-sm form-control-border" placeholder="optional">
                  <small class="ml-3 text-maroon">Middle Name</small>
                </div>
                <div class="form-group col-md-6">
                  <input type="text" name="lastname" id="lastname" class="form-control form-control-sm form-control-border" required>
                  <small class="ml-3 text-maroon">Last Name</small>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-6">
                  <select name="gender" id="gender" class="form-control form-control-sm form-control-border">
                    <option>Male</option>
                    <option>Female</option>
                  </select>
                  <small class="ml-3 text-maroon">Gender</small>
                </div>
                <div class="col-md-6">
                  <input type="text" name="contact" id="contact" class="form-control form-control-sm form-control-border" required>
                  <small class="ml-3 text-maroon">Contact #</small>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <small class="ml-3 text-maroon">Address</small>
                  <textarea name="address" id="address" rows="3" class="form-control form-control-sm rounded-0" required></textarea>
                </div>
              </div>
              <div class="clear-fix my-3"></div>
              <div class="row">
                <div class="form-group col-md-6">
                  <input type="email" name="email" id="email" class="form-control form-control-sm form-control-border" required>
                  <small class="ml-3 text-maroon">Email</small>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-6">
                  <div class="input-group input-group-sm">
                    <input type="password" name="password" id="password" class="form-control form-control-sm form-control-border" required>
                    <div class="input-group-append"><span class="input-group-text bg-transparent border-left-0 border-right-0 border-top-0 rounded-0 fa fa-eye-slash pass_view text-muted"></span></div>
                  </div>
                  <small class="ml-3 text-maroon">Password</small>
                </div>
                <div class="form-group col-md-6">
                  <div class="input-group input-group-sm">
                    <input type="password" id="cpassword" class="form-control form-control-sm form-control-border" required>
                    <div class="input-group-append"><span class="input-group-text bg-transparent border-left-0 border-right-0 border-top-0 rounded-0 fa fa-eye-slash pass_view text-muted"></span></div>
                  </div>
                  <small class="ml-3 text-maroon">Confirm Password</small>
                </div>
              </div>
              <div class="row">
                <div class="col-8">
                  <a href="<?php echo base_url.'login.php' ?>" class="text-maroon">Already have an Account</a>
                </div>
                <!-- /.col -->
                <div class="col-4">
                  <button type="submit" class="btn btn-default bg-gradient-maroon border-0 btn-block btn-flat">Create Account</button>
                </div>
                <!-- /.col -->
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

<script>
  $(document).ready(function(){
    end_loader();
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

    $('#register-frm').submit(function(e){
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
                        location.href = './login.php';
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
</body>
</html>