<?php
    $status_wise_courses = $this->crud_model->get_status_wise_courses_for_instructor();
    $number_of_courses = $status_wise_courses['pending']->num_rows() + $status_wise_courses['active']->num_rows();
    $number_of_lessons = $this->crud_model->get_lessons()->num_rows();
    $number_of_enrolment = $this->crud_model->enrol_history()->num_rows();
    $number_of_students = $this->user_model->get_user()->num_rows();
?>
<div class="row">
    <div class="col-xl-12">
        <div class="instructor_title_bg">
            <div class="card-body setPageTitle">
                <h5 class="page-title setColorTitle"> <i class="dripicons-view-apps title_icon setIconHead"></i> 
                <?php echo get_phrase('dashboard'); ?></h5>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<div class="row"></div>
<div class="instructor_main_content">
    <div class="">
        <div class="row">
            <div class="col-12">
                <div class="widget-inline">
                    <div class="mb-20">
                        <div class="row">
                            <div class="col-sm-6 col-xl-3">
                                <div class="boxInfo">
                                    <a href="<?php echo site_url('instructor/courses'); ?>" class="text-secondary">
                                        <div class="card shadow-none m-0 instructor_box_bg">
                                            <div class="text-center instructor_box1">
                                               <div class="instructor_box_icon"> 
                                                   <i class="dripicons-archive iconColor" style="font-size: 24px;"></i>
                                                </div>
                                                <div class="instructor_box_content"> 
                                                    <div>
                                                       <h3><span><?php echo $number_of_courses; ?></span></h3>
                                                        <p class="font-15 mb-0"><?php echo get_phrase('number_courses'); ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>

                            <div class="col-sm-6 col-xl-3">
                                <div class="boxInfo1">
                                    <a href="<?php echo site_url('instructor/courses'); ?>" class="text-secondary">
                                        <div class="card shadow-none m-0 instructor_box_bg">
                                            <div class="text-center  instructor_box1">
                                                <div class="instructor_box_icon"> 
                                                    <i class="dripicons-camcorder iconColor" style="font-size: 24px;"></i>
                                                </div>
                                                <div class="instructor_box_content"> 
                                                    <div>
                                                        <h3><span><?php echo $number_of_lessons; ?></span></h3>
                                                        <p class="font-15 mb-0"><?php echo get_phrase('number_of_lessons'); ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>

                            <div class="col-sm-6 col-xl-3">
                                <div class="boxInfo2">
                                    <a href="<?php echo site_url('instructor/enrol_history'); ?>" class="text-secondary">
                                        <div class="card shadow-none m-0 instructor_box_bg">
                                            <div class="text-center  instructor_box1">
                                                <div class="instructor_box_icon">
                                                    <i class="dripicons-network-3 iconColor" style="font-size: 24px;"></i>
                                                </div>
                                                <div class="instructor_box_content"> 
                                                    <div>
                                                        <h3><span><?php echo $number_of_enrolment; ?></span></h3>
                                                        <p class="font-15 mb-0"><?php echo get_phrase('number_of_enrolment'); ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>

                            <div class="col-sm-6 col-xl-3">
                                <div class="boxInfo3">
                                    <a href="<?php echo site_url('instructor/users'); ?>" class="text-secondary">
                                        <div class="card shadow-none m-0 instructor_box_bg">
                                            <div class="text-center instructor_box1">
                                                <div class="instructor_box_icon">
                                                    <i class="dripicons-user-group iconColor" style="font-size: 24px;"></i>
                                                </div>
                                                <div class="instructor_box_content"> 
                                                    <div>
                                                        <h3><span><?php echo $number_of_students; ?></span></h3>
                                                        <p class="font-15 mb-0"><?php echo get_phrase('number_of_trainee'); ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>

                        </div> <!-- end row -->
                    </div>
                </div> <!-- end card-box-->
            </div> <!-- end col-->
        </div>
        <div class="row">
            <div class="col-xl-4">
                <div class="card shadow-none">

                    <div class="instructor_card_border">
                        <div class="instructor_card_title">
                            <h4 class="header-title m-0"><?php echo get_phrase('course_overview'); ?></h4>
                        </div>
                        <div class="my-4 chartjs-chart" style="height: 202px;">
                            <canvas id="project-status-chart"></canvas>
                        </div>
                        <div class="course_chart_bg">
                            <div class="row text-center">
                                <div class="col-6 setBorderRight">
                                    <i class="mdi mdi-trending-up text-success mt-3 h3"></i>
                                    <h3 class="font-weight-normal">
                                        <span class="active_color"><?php echo $status_wise_courses['active']->num_rows(); ?></span>
                                    </h3>
                                    <p class="active_color mb-0"><?php echo get_phrase('active_courses'); ?></p>
                                </div>
                                <div class="col-6">
                                    <i class="mdi mdi-trending-down text-warning mt-3 h3"></i>
                                    <h3 class="font-weight-normal">
                                        <span class="active_color"><?php echo $status_wise_courses['pending']->num_rows(); ?></span>
                                    </h3> 
                                    <p class="active_color mb-0"> <?php echo get_phrase('pending_courses'); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
        </div>
    </div>
</div>

<script type="text/javascript">
    $('#unpaid-instructor-revenue').mouseenter(function() {
        $('#go-to-instructor-revenue').show();
    });
    $('#unpaid-instructor-revenue').mouseleave(function() {
        $('#go-to-instructor-revenue').hide();
    });
</script>
