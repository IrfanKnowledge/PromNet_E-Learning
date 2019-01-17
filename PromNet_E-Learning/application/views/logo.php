<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="logo-pro">
              <?php if ($this->session->userdata('user') == 'admin'): ?>
                <a href="<?php echo site_url('home'); ?>"><img class="main-logo" src="<?php echo base_url(); ?>assets/img/logo/logo.png" alt="" /></a>
              <?php elseif($this->session->userdata('user') == 'siswa'): ?>
                <a href="<?php echo site_url('Home_Siswa'); ?>"><img class="main-logo" src="<?php echo base_url(); ?>assets/img/logo/logo.png" alt="" /></a>
              <?php endif; ?>
            </div>
        </div>
    </div>
</div>
