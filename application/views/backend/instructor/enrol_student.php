<!-- start page title -->
<div class="row ">
    <div class="col-xl-12">
        <div class="admin_title_bg">
            <div class="card-body setPageTitle">
                <h4 class="page-title"> 
                    <i class="dripicons-network-3 title_icon"></i> 
                    <span style="vertical-align:middle;position:relative;top:2px;"><?php echo get_phrase('enrol_a_trainee'); ?></span>
                </h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<div class="admin_main_content">
    <div class="row">
        <div class="col-xl-7">
            <div class="card box-shadow-none">
                <div class="admin_card_border">
                    <div>
                        <div class="admin_card_title">
                            <h5 class="mb-0 header-title"><?php echo get_phrase('enrolment_form'); ?></h5>
                        </div>
                        <div class="card-body">
                        <form class="required-form" action="<?php echo site_url('instructor/enrol_student/enrol'); ?>" method="post" enctype="multipart/form-data">

                                <div class="form-group">
                                    <label for="user_id"><?php echo get_phrase('user'); ?><span class="required">*</span> </label>
                                    <select class="form-control"  name="user_id[]" id="user_id" required multiple>
                                        <!-- <option value=""><?php echo get_phrase('select_a_user'); ?></option> -->
                                        <?php $user_list = $this->user_model->get_user()->result_array();
                                            foreach ($user_list as $user):?>
                                            <option value="<?php echo $user['id'] ?>"><?php echo $user['first_name'].' '.$user['last_name']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="course_id"><?php echo get_phrase('course_to_enrol'); ?><span class="required">*</span> </label>
                                    <select class="form-control select2" data-toggle="select2" name="course_id" id="course_id" required>
                                        <option value=""><?php echo get_phrase('select_a_course'); ?></option>
                                        <?php $course_list = $this->crud_model->get_courses()->result_array();
                                            foreach ($course_list as $course):
                                            if ($course['status'] != 'active')
                                                continue;?>
                                            <option value="<?php echo $course['id'] ?>"><?php echo $course['title']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label for="duration_id"><?php echo get_phrase('duration'); ?><span class="required">*</span> </label>
                                    <input type="text" class="form-control form_control_bg" id="duration_period" name="duration_period" required placeholder="Number in days(Numeric value)">
                                </div>

                   
                                <div class="form-group">
                                    <label for="start_date."><?php echo get_phrase('start_date'); ?><span class="required">*</span></label>
                                    <input type="text" class="form-control form_control_bg" id="start_date" name="start_date" placeholder="Start Date" required readonly>
                                </div>

                                <button type="button" class="btn btn-primary box-shadow-none" onclick="checkRequiredFields()"><?php echo get_phrase('enrol_student'); ?></button>
                            </form>
                        </div>
                    </div>
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
</div>

<script type="text/javascript">
$(function() {
    $("#start_date").datepicker();
});
$(document).ready(function() {       
	$('#user_id').multiselect({		
		nonSelectedText: 'Select A User'				
	});
});
</script>

