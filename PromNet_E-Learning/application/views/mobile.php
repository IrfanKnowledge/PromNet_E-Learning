<!-- Mobile Menu start -->
<div class="mobile-menu-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="mobile-menu">
                    <nav id="dropdown">
                        <ul class="mobile-menu-nav">
                            <?php if ($this->session->userdata('user') == 'admin'): ?>
                              <li><a data-toggle="collapse" data-target="#Charts" href="<?php echo site_url('home');?>">Home</a>
                            <?php elseif($this->session->userdata('user') == 'siswa'): ?>
                              <li><a data-toggle="collapse" data-target="#Charts" href="<?php echo site_url('Home_Siswa');?>">Home</a>
                            <?php endif; ?>
                            </li>
                            <!--
                            <li><a data-toggle="collapse" data-target="#demoevent" href="#">Professors <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                <ul id="demoevent" class="collapse dropdown-header-top">
                                    <li><a href="all-professors.html">All Professors</a>
                                    </li>
                                    <li><a href="add-professor.html">Add Professor</a>
                                    </li>
                                    <li><a href="edit-professor.html">Edit Professor</a>
                                    </li>
                                    <li><a href="professor-profile.html">Professor Profile</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a data-toggle="collapse" data-target="#demopro" href="#">Students <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                <ul id="demopro" class="collapse dropdown-header-top">
                                    <li><a href="all-students.html">All Students</a>
                                    </li>
                                    <li><a href="add-student.html">Add Student</a>
                                    </li>
                                    <li><a href="edit-student.html">Edit Student</a>
                                    </li>
                                    <li><a href="student-profile.html">Student Profile</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a data-toggle="collapse" data-target="#democrou" href="#">Courses <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                <ul id="democrou" class="collapse dropdown-header-top">
                                    <li><a href="all-courses.html">All Courses</a>
                                    </li>
                                    <li><a href="add-course.html">Add Course</a>
                                    </li>
                                    <li><a href="edit-course.html">Edit Course</a>
                                    </li>
                                    <li><a href="course-profile.html">Courses Info</a>
                                    </li>
                                    <li><a href="course-payment.html">Courses Payment</a>
                                    </li>
                                </ul>
                            </li>
                            -->
                            <!-- <li><a data-toggle="collapse" data-target="#demodepart" href="#">Versi <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                <ul id="demodepart" class="collapse dropdown-header-top">
                                    <li><a href="<?php //echo site_url('home/V_Versi_1') ?>">Versi 1</a>
                                    </li>
                                    <li><a href="<?php //echo site_url('home/V_Versi_2') ?>">Versi 2</a>
                                    </li>
                                </ul>
                            </li> -->

                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Mobile Menu end -->
