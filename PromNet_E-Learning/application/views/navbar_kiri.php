<!-- Start Left menu area -->
<div class="left-sidebar-pro">
    <nav id="sidebar" class="">
        <div class="sidebar-header">
            <a href="<?php echo site_url('Home_Siswa'); ?>"><img class="main-logo" src="<?php echo base_url(); ?>assets/img/logo/logo.png" alt="" /></a>
            <strong><a href="<?php echo site_url('Home_Siswa'); ?>"><img src="<?php echo base_url(); ?>assets/img/logo/logosn.png" alt="" /></a></strong>
        </div>

        <div class="left-custom-menu-adp-wrap comment-scrollbar">
            <nav class="sidebar-nav left-sidebar-menu-pro">
                <?php if ($this->session->userdata('user') == 'admin'): ?>
                  <ul class="metismenu" id="menu1">
                      <li
                        <?php if ($this->uri->segment(1)  == 'home') { ?>
                          class="active text-white bg-dark"
                        <?php } ?>
                      >
                          <a href="<?php echo site_url('home'); ?>" class=" <?php if ($this->uri->segment(1)  == 'home'){ ?> text-white bg-dark <?php } ?>">
                                 <span class="educate-icon educate-home icon-wrap"></span>
                                 <span class="mini-click-non">Beranda</span>
                              </a>
                      </li>
                      <li
                        <?php if ($this->uri->segment(1)  == 'Admin') { ?>
                          class="active"
                        <?php } ?>
                      >
                          <a class="has-arrow <?php if ($this->uri->segment(1)  == 'Admin'){ ?> text-white bg-dark <?php } ?>" href="all-professors.html" aria-expanded="false"><span class="educate-icon educate-professor icon-wrap"></span> <span class="mini-click-non">Admin</span></a>
                          <ul class="submenu-angle" aria-expanded="false">
                              <li><a title="All Admin" href="<?php echo site_url('Admin/index'); ?>" class=" <?php if ($this->uri->segment(1) == 'Admin' && $this->uri->segment(2) == 'index'){ ?> text-white bg-primary <?php } ?>"><span class="mini-sub-pro">List Admin</span></a></li>
                              <li><a title="Add Admin" href="<?php echo site_url('Admin/V_AdminTambah'); ?>" class=" <?php if ($this->uri->segment(2) == 'V_AdminTambah'){ ?> text-white bg-primary <?php } ?>"><span class="mini-sub-pro">Tambah Admin</span></a></li>
                              <li><a title="Edit Admin" href="<?php echo site_url('Admin/V_AdminEdit'); ?>" class=" <?php if ($this->uri->segment(2) == 'V_AdminEdit'){ ?> text-white bg-primary <?php } ?>"><span class="mini-sub-pro">Edit Admin</span></a></li>
                          </ul>
                      </li>
                      <li
                        <?php if ($this->uri->segment(1)  == 'Siswa') { ?>
                          class="active"
                        <?php } ?>
                      >
                          <a class="has-arrow <?php if ($this->uri->segment(1)  == 'Siswa'){ ?> text-white bg-dark <?php } ?>" href="all-professors.html" aria-expanded="false"><span class="educate-icon educate-student icon-wrap"></span> <span class="mini-click-non">Siswa</span></a>
                          <ul class="submenu-angle" aria-expanded="false">
                              <li><a title="All Siswa" href="<?php echo site_url('Siswa/index'); ?>" class=" <?php if ($this->uri->segment(1) == 'Siswa' && $this->uri->segment(2) == 'index'){ ?> text-white bg-primary <?php } ?>"><span class="mini-sub-pro">List Siswa</span></a></li>
                              <li><a title="Add Siswa" href="<?php echo site_url('Siswa/V_SiswaTambah'); ?>" class=" <?php if ($this->uri->segment(2) == 'V_SiswaTambah'){ ?> text-white bg-primary <?php } ?>"><span class="mini-sub-pro">Tambah Siswa</span></a></li>
                              <li><a title="Edit Siswa" href="<?php echo site_url('Siswa/V_SiswaEdit'); ?>" class=" <?php if ($this->uri->segment(2) == 'V_SiswaEdit'){ ?> text-white bg-primary <?php } ?>"><span class="mini-sub-pro">Edit Siswa</span></a></li>
                          </ul>
                      </li>
                      <li>
                        <a class="has-arrow" href="all-professors.html" aria-expanded="false"><span class="educate-icon educate-course icon-wrap"></span> <span class="mini-click-non">Mata Pelajaran</span></a>
                        <ul class="submenu-angle" aria-expanded="false">
                            <li><a title="All matpel" href="<?php echo site_url('C_matpel/index'); ?>" class=" <?php if ($this->uri->segment(2) == 'index'){ ?> text-white bg-primary <?php } ?>"><span class="mini-sub-pro">List Mata Pelajaran</span></a></li>
                            <li><a title="Add matpel" href="<?php echo site_url('C_matpel/V_matpelTambah'); ?>" class=" <?php if ($this->uri->segment(2) == 'V_matpelTambah'){ ?> text-white bg-primary <?php } ?>"><span class="mini-sub-pro">Tambah Mata Pelajaran</span></a></li>
                            <li><a title="Edit matpel" href="<?php echo site_url('C_matpel/V_matpelEdit'); ?>" class=" <?php if ($this->uri->segment(2) == 'V_matpelEdit'){ ?> text-white bg-primary <?php } ?>"><span class="mini-sub-pro">Edit Mata Pelajaran</span></a></li>
                        </ul>
                    </li>
                      <li>
                          <a class="has-arrow" href="all-professors.html" aria-expanded="false"><span class="educate-icon educate-data-table icon-wrap"></span> <span class="mini-click-non">Nilai Akhir</span></a>
                          <ul class="submenu-angle" aria-expanded="false">
                              <li><a title="All Professors" href="all-professors.html"><span class="mini-sub-pro">List Nilai Akhir</span></a></li>
                          </ul>
                      </li>
                      <!--
                      <li>
                          <a class="has-arrow" href="all-students.html" aria-expanded="false"><span class="educate-icon educate-student icon-wrap"></span> <span class="mini-click-non">Mahasiswa</span></a>
                          <ul class="submenu-angle" aria-expanded="false">
                              <li><a title="All Students" href="all-students.html"><span class="mini-sub-pro">List Mahasiswa</span></a></li>
                              <li><a title="Add Students" href="add-student.html"><span class="mini-sub-pro">Tambah Mahasiswa</span></a></li>
                              <li><a title="Edit Students" href="edit-student.html"><span class="mini-sub-pro">Edit Mahasiswa</span></a></li>
                              <li><a title="Students Profile" href="student-profile.html"><span class="mini-sub-pro">Profil Mahasiswa</span></a></li>
                          </ul>
                      </li>
                      <li>
                          <a class="has-arrow" href="all-courses.html" aria-expanded="false"><span class="educate-icon educate-course icon-wrap"></span> <span class="mini-click-non">Mata Kuliah</span></a>
                          <ul class="submenu-angle" aria-expanded="false">
                              <li><a title="All Courses" href="all-courses.html"><span class="mini-sub-pro">List Mata Kuliah</span></a></li>
                              <li><a title="Add Courses" href="add-course.html"><span class="mini-sub-pro">Tambah Mata Kuliah</span></a></li>
                              <li><a title="Edit Courses" href="edit-course.html"><span class="mini-sub-pro">Edit Mata Kuliah</span></a></li>
                          </ul>
                      </li>
                      -->

                  </ul>
              <?php elseif($this->session->userdata('user') == 'siswa'): ?>
                  <ul class="metismenu" id="menu1">
                    <li
                      <?php if ($this->uri->segment(1)  == 'Home_Siswa') { ?>
                        class="active text-white bg-dark"
                      <?php } ?>
                    >
                        <a href="<?php echo site_url('Home_Siswa'); ?>" class=" <?php if ($this->uri->segment(1)  == 'Home_Siswa'){ ?> text-white bg-dark <?php } ?>">
                               <span class="educate-icon educate-home icon-wrap"></span>
                               <span class="mini-click-non">Beranda</span>
                            </a>
                    </li>
                    <!-- <li
                      <?php //if ($this->uri->segment(1)  == 'Edit_Profil') { ?>
                        class="active text-white bg-dark"
                      <?php //} ?>
                    >
                        <a href="<?php //echo site_url('Home_Siswa'); ?>" class=" <?php //if ($this->uri->segment(1)  == 'Edit_Profil'){ ?> text-white bg-dark <?php //} ?>">
                               <span class="educate-icon educate-student icon-wrap"></span>
                               <span class="mini-click-non">Edit Profil</span>
                            </a>
                    </li> -->
                  </ul>
                </nav>
              <?php endif; ?>
        </div>
    </nav>
</div>
<!-- End Left menu area -->

    </div>
  </div>
