<?php
    $status_wise_courses = $this->crud_model->get_status_wise_courses();
    $number_of_courses = $status_wise_courses['pending']->num_rows() + $status_wise_courses['active']->num_rows();
    $number_of_lessons = $this->crud_model->get_lessons()->num_rows();
    $number_of_enrolment = $this->crud_model->enrol_history()->num_rows();
    $number_of_students = $this->user_model->get_user()->num_rows();
?>
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body setPageTitle">
                <!-- <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> <?php echo get_phrase('dashboard'); ?></h4> -->
                <h4 class="page-title"> 
                    <i class="dripicons-view-apps title_icon"></i> 
                    <span style="vertical-align:middle;position:relative;top:2px;"><?php echo get_phrase('dashboard'); ?></span>
                </h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<div class="row">
   <!-- <div class="col-xl-12">
        <div class="card">
            <div class="card-body">

                <h4 class="header-title mb-4"><?php echo get_phrase('admin_revenue_this_year'); ?></h4>

                <div class="mt-3 chartjs-chart" style="height: 320px;">
                    <canvas id="task-area-chart"></canvas>
                </div>
            </div> 
            
        </div> 
      
    </div> -->
</div>
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="widget-inline">
                <div class="mb-20">
                    <div class="row">
                        <div class="col-sm-6 col-xl-3">
                            <div>
                                <a href="<?php echo site_url('admin/courses'); ?>" class="admin_text_white">
                                    <div class="card bg-primary shadow-none m-0">
                                        <div class="card-body text-center">
                                            <i class="dripicons-archive" style="font-size: 24px;"></i>
                                            <h3><span><?php echo $number_of_courses; ?></span></h3>
                                            <p class="font-15 mb-0"><?php echo get_phrase('number_courses'); ?></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="col-sm-6 col-xl-3">
                            <div>
                                <a href="<?php echo site_url('admin/courses'); ?>" class="admin_text_white">
                                    <div class="card bg-warning shadow-none m-0 border-left">
                                        <div class="card-body text-center">
                                            <i class="dripicons-camcorder" style="font-size: 24px;"></i>
                                            <h3><span><?php echo $number_of_lessons; ?></span></h3>
                                            <p class="font-15 mb-0"><?php echo get_phrase('number_of_lessons'); ?></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="col-sm-6 col-xl-3">
                            <div>
                                <a href="<?php echo site_url('admin/enrol_history'); ?>" class="admin_text_white">
                                    <div class="card bg-success shadow-none m-0 border-left">
                                        <div class="card-body text-center">
                                            <i class="dripicons-network-3" style="font-size: 24px;"></i>
                                            <h3><span><?php echo $number_of_enrolment; ?></span></h3>
                                            <p class="font-15 mb-0"><?php echo get_phrase('number_of_enrolment'); ?></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="col-sm-6 col-xl-3">
                            <div>
                                <a href="<?php echo site_url('admin/users'); ?>" class="admin_text_white">
                                    <div class="card bg-danger shadow-none m-0 border-left">
                                        <div class="card-body text-center">
                                            <i class="dripicons-user-group" style="font-size: 24px;"></i>
                                            <h3><span><?php echo $number_of_students; ?></span></h3>
                                            <p class="font-15 mb-0"><?php echo get_phrase('number_of_trainee'); ?></p>
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
            <div class="card admin_card_border">
                <div>
                    <div class="admin_card_title">
                        <h4 class="header-title m-0"><?php echo get_phrase('course_overview'); ?></h4>
                    </div>
                    <div class="my-4 chartjs-chart" style="height: 202px;">
                        <canvas id="project-status-chart"></canvas>
                    </div>
                    <div class="row text-center mt-2 py-2">
                        <div class="col-6 setBorderRight">
                            <div>
                                <i class="mdi mdi-trending-up text-success mt-3 h3"></i>
                                <h3 class="font-weight-normal">
                                    <span><?php echo $status_wise_courses['active']->num_rows(); ?></span>
                                </h3>
                                <p class="text-muted mb-0"><?php echo get_phrase('active_courses'); ?></p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div>
                                <i class="mdi mdi-trending-down text-warning mt-3 h3"></i>
                                <h3 class="font-weight-normal">
                                    <span><?php echo $status_wise_courses['pending']->num_rows(); ?></span>
                                </h3>
                                <p class="text-muted mb-0"> <?php echo get_phrase('pending_courses'); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!--  <div class="col-xl-8">
            <div class="card" id = 'unpaid-instructor-revenue'>
                <div class="card-body">
                    <h4 class="header-title mb-3"><?php echo get_phrase('unpaid_instructor_revenues'); ?>
                        <a href="<?php echo site_url('admin/instructor_revenue'); ?>" class="alignToTitle" id ="go-to-instructor-revenue"> <i class="mdi mdi-logout"></i> </a>
                    </h4>
                    <div class="table-responsive">
                        <table class="table table-centered table-hover mb-0">
                            <tbody>

                                <?php
                                    $this->db->where('instructor_payment_status', 0);
                                    $this->db->where('instructor_revenue >', 0);
                                    $unpaid_instructor_revenues = $this->db->get('payment')->result_array();
                                    foreach ($unpaid_instructor_revenues as $key => $row):
                                    $course_details = $this->crud_model->get_course_by_id($row['course_id'])->row_array();
                                    $instructor_details = $this->user_model->get_all_user($course_details['user_id'])->row_array();
                                ?>
                                <tr>
                                    <td>
                                        <h5 class="font-14 my-1"><a href="<?php echo site_url('home/course/'.slugify($course_details['title']).'/'.$course_details['id']) ?>" class="text-body" target="_blank"><?php echo $course_details['title']; ?></a></h5>
                                        <span class="text-muted font-13"><?php echo get_phrase('course_title'); ?></span>
                                    </td>
                                    <td>
                                        <h5 class="font-14 my-1"><a href="javascript:void(0);" class="text-body" style="cursor: auto;"><?php echo $instructor_details['first_name'].' '.$instructor_details['last_name']; ?></a></h5>
                                        <small><?php echo get_phrase('email'); ?>: <span class="text-muted font-13"><?php echo $instructor_details['email']; ?></span></small>
                                    </td>
                                    <td>
                                        <h5 class="font-14 my-1"><a href="javascript:void(0);" class="text-body" style="cursor: auto;"><?php echo currency($row['instructor_revenue']); ?></a></h5>
                                        <small><span class="text-muted font-13"><?php echo get_phrase('instructor_revenue'); ?></span></small>
                                    </td>
                                </tr>
                                <?php endforeach; ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> -->
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
