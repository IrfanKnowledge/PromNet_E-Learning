<div class="header-advance-area fixed-top" style="position: sticky">
    <div class="header-top-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="header-top-wraper">
                        <div class="row">
                            <div class="col-lg-1 col-md-0 col-sm-1 col-xs-12">
                                <div class="menu-switcher-pro">
                                    <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
                                            <i class="educate-icon educate-nav"></i>
                                        </button>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-7 col-sm-6 col-xs-12">
                                <div class="header-top-menu tabl-d-n">

                                </div>
                            </div>
                            <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                <div class="header-right-info">
                                    <ul class="nav navbar-nav mai-top-nav header-right-menu">
                                        <li class="nav-item dropdown">
                                            <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">

                                                    <span class="admin-name"><?php echo $this->session->userdata('nama_lengkap') ?></span>
                                                    <i class="fa fa-angle-down edu-icon edu-down-arrow"></i>
                                            </a>
                                            <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated zoomIn">
                                                <li><a href="#"><span class="edu-icon edu-user-rounded author-log-ic"></span >Edit Profil</a>
                                                </li>
                                                <li><a href="<?php echo site_url('login/logout'); ?>"><span class="edu-icon edu-locked author-log-ic"></span>Log Out</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
      <?php if ($this->uri->segment(1) == "Sesi_Pembelajaran_Siswa" || $this->uri->segment(1) == "Tugas_Sesi_Soal_Siswa" || $this->uri->segment(1) == "Tes_Ketuntasan_Siswa"  || $this->uri->segment(1) == "Tes_Ketuntasan_Soal_Siswa"|| $this->uri->segment(1) == "Tugas_Sesi_Jawaban_Siswa" || $this->uri->segment(1) == "Tes_Pengayaan_Siswa") : ?>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li <?php if($this->uri->segment(1) == "Sesi_Pembelajaran_Siswa"){ ?> class="nav-item active" <?php }else{ ?> class="nav-item" <?php } ?>>
                <a class="nav-link" href=<?php echo site_url('Sesi_Pembelajaran_Siswa/index/'. $this->uri->segment(3)); ?> >Sesi Pembelajaran<span class="sr-only">(current)</span></a>
              </li>
              <li <?php if($this->uri->segment(1) == "Tugas_Sesi_Soal_Siswa"){ ?> class="nav-item active" <?php }else{ ?> class="nav-item" <?php } ?>>
                <a class="nav-link" href="<?php echo site_url('Tugas_Sesi_Soal_Siswa/index/'. $this->uri->segment(3)) ?>">Tugas</a>
              </li>
              <li <?php if($this->uri->segment(1) == "Tes_Ketuntasan_Siswa"){ ?> class="nav-item active" <?php }else{ ?> class="nav-item" <?php } ?>>
                <a class="nav-link" href="<?php echo site_url('Tes_Ketuntasan_Siswa/index/'. $this->uri->segment(3)) ?>">Tes Ketuntasan</a>
              </li>
              <li <?php if($this->uri->segment(1) == "Tes_Pengayaan_Siswa"){ ?> class="nav-item active" <?php }else{ ?> class="nav-item" <?php } ?>>
                <a class="nav-link" href="<?php echo site_url('Tes_Pengayaan_Siswa/index/'. $this->uri->segment(3)) ?>">Tes Pengayaan</a>
              </li>
              <!--
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Dropdown
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled" href="#">Disabled</a>
              </li>
              -->
            </ul>
          </div>
        </nav>
      <?php endif; ?>
</div>
