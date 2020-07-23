<?php
    // $student_list = $this->crud_model->all_enrolled_student()->result_array();
	$student_list = $this->user_model->get_user()->result_array();
	$admin_list  =  $this->user_model->get_admin()->result_array();
?>
<div class="instructor_info_bg">
		<div class="instructor_card_title">
            <h4 class="mb-0 header-title"><?php echo get_phrase('write_new_messages');?></h4>
        </div>
	
	<div class="card-body">
		<form method="post" class="mt-2" action="<?php echo site_url('instructor/message/send_new'); ?>" enctype="multipart/form-data">

			<div class="form-group">
		        <div class="row">
		            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						
							<label><?php echo get_phrase('Recipient'); ?></label>
							<!-- <i class="float-right mdi mdi-reply"></i> -->
							<div class="instructor_message_box">
								<select class="form-control"  name="receiver[]" id="receiver" required multiple>
									<!-- <option value=""><?php echo get_phrase('select_a_user');?></option> -->
									<optgroup label="<?php echo get_phrase('trainees'); ?>">
										<?php foreach($student_list as $student):?>
											<option value="<?php echo $student['id']; ?>">
												- <?php echo $student['first_name'].' '.$student['last_name']; ?></option>
										<?php endforeach; ?>
										<optgroup label="<?php echo get_phrase('admin'); ?>">
										<?php foreach($admin_list as $admin):?>
											<option value="<?php echo $admin['id']; ?>">
												- <?php echo $admin['first_name'].' '.$admin['last_name']; ?></option>
										<?php endforeach; ?>
									</optgroup>
								</select>
						</div>
		            </div>
		        </div>
		    </div>

		    <div class="form-group">
		        <div class="row">
		            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		                <textarea class="form-control form_control_bg" rows="5" name="message" id="message" placeholder="<?php echo get_phrase('type_your_message'); ?>" required></textarea>
		            </div>
		        </div>
		    </div>

		    <div class="form-group mt-4">
		        <div class="row">
		            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-13 text-center">
		                <button type="submit" class="btn btn-primary shadow-none float-right"><?php echo get_phrase('sent_message'); ?></button>
		            </div>
		        </div>
		    </div>
		</form>
	</div>
</div>

<script type="text/javascript">
	function check_receiver() {
		var check_receiver = $('#receiver').val();
		if (check_receiver == '' || check_receiver == 0) {
			toastr.error("Please select a receiver", "Error");
            return false;
		}
			}
			$(document).ready(function() {       
	$('#receiver').multiselect({		
		nonSelectedText: 'Select A User'				
	});
});
</script>
