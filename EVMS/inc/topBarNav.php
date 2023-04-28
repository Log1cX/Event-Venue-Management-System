<style>
  .user-img{
        position: absolute;
        height: 27px;
        width: 27px;
        object-fit: cover;
        left: -7%;
        top: -12%;
  }
  .btn-rounded{
        border-radius: 50px;
  }
</style>
<!-- Navbar -->
      <style>
        #login-nav {
          position: fixed !important;
          top: 0 !important;
          z-index: 1037;
          padding: 0.3em 2.5em !important;
        }
        #top-Nav{
          top: 2.3em;
        }
        #top-Nav.bg-transparent{
          background:#0000000d !important;
          
        }
        #top-Nav.bg-transparent *{
          text-shadow: 2px 6px 4px #383838 !important;
          color:#fff;
        }
        .text-sm .layout-navbar-fixed .wrapper .main-header ~ .content-wrapper, .layout-navbar-fixed .wrapper .main-header.text-sm ~ .content-wrapper {
          margin-top: calc(3.6) !important;
          padding-top: calc(3.2em) !important
      }
      </style>
      <nav class="w-100 px-2 py-1 position-fixed top-0 bg-gradient-maroon text-light" id="login-nav">
        <div class="d-flex justify-content-between w-100">
          <div>
            <span class="mr-2"><i class="fa fa-phone mr-1"></i> <?= $_settings->info('contact') ?></span>
          </div>
          <div>
            <?php if($_settings->userdata('id') > 0): ?>
              <span class="mx-2"><img src="<?= validate_image($_settings->userdata('avatar')) ?>" alt="User Avatar" class=" bg-gradient-light" id="student-img-avatar"></span>
              <span class="mx-2">Howdy, <?= !empty($_settings->userdata('username')) ? $_settings->userdata('username') : $_settings->userdata('email') ?></span>
            <?php if($_settings->userdata('login_type') == 1): ?>
              <span class="mx-1"><a href="<?= base_url.'classes/Login.php?f=logout' ?>"><i class="fa fa-power-off text-dark"></i></a></span>
            <?php else: ?>
              <span class="mx-1"><a href="<?= base_url.'classes/Login.php?f=client_logout' ?>"><i class="fa fa-power-off text-dark"></i></a></span>
            <?php endif; ?>
            <?php else: ?>
              <a href="./register.php" class="mx-2 text-light">Register</a>
              <a href="./login.php" class="mx-2 text-light">Client Login</a>
              <a href="./admin" class="mx-2 text-light">Admin Login</a>
            <?php endif; ?>
          </div>
        </div>
      </nav>
      <nav class="main-header navbar navbar-expand navbar-light border-0 text-sm" id='top-Nav'>
        
        <div class="container">
          <a href="./" class="navbar-brand">
            <img src="<?php echo validate_image($_settings->info('logo'))?>" alt="Site Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span><?= $_settings->info('short_name') ?></span>
          </a>

          <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse order-3" id="navbarCollapse">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
              <li class="nav-item">
                <a href="./" class="nav-link <?= isset($page) && $page =='home' ? "active" : "" ?>">Home</a>
              </li>
              <li class="nav-item">
                <a href="./?page=halls" class="nav-link <?= isset($page) && $page =='halls' ? "active" : "" ?>">Halls</a>
              </li>
              <li class="nav-item">
                <a href="./?page=services" class="nav-link <?= isset($page) && $page =='services' ? "active" : "" ?>">Services</a>
              </li>
              <li class="nav-item">
                <a href="./?page=about" class="nav-link <?= isset($page) && $page =='about' ? "active" : "" ?>">About Us</a>
              </li>
              <li class="nav-item">
                <a href="./?page=contact_us" class="nav-link <?= isset($page) && $page =='contact_us' ? "active" : "" ?>">Contact Us</a>
              </li>
              <?php if($_settings->userdata('id') > 0 && $_settings->userdata('login_type' != 1)): ?>
              <li class="nav-item">
                <a href="./?page=profile" class="nav-link <?= isset($page) && $page =='profile' ? "active" : "" ?>">Profile</a>
              </li>
              <li class="nav-item">
                <a href="./?page=my_bookings" class="nav-link <?= isset($page) && $page =='my_bookings' ? "active" : "" ?>">My Bookings</a>
              </li>
              <?php endif; ?>
              <!-- <li class="nav-item">
                <a href="#" class="nav-link">Contact</a>
              </li> -->
            </ul>

            
          </div>
          <!-- Right navbar links -->
          <div class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
          </div>
        </div>
      </nav>
      <!-- /.navbar -->
      <script>
        $(function(){
          
        })
      </script>