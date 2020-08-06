<?php
    $instructor_list = $this->user_model->get_instructor_list()->result_array();
    	$admin_list  =  $this->user_model->get_admin()->result_array();

?>
<section class="page-header-area my-course-area page_header">
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="page-title"><?php echo get_phrase('my_messages'); ?></h1>
                
            </div>
        </div>
    </div>
</section>

<section class="page-header-area my-course-area">
    <div class="container">
        <div class="row">
            <div class="col">
                
                <ul>
                <li><a href="<?php echo site_url('home/my_dashboard'); ?>"><?php echo get_phrase('dashboard'); ?></a></li>
                  <li><a href="<?php echo site_url('home/my_courses'); ?>"><?php echo get_phrase('all_courses'); ?></a></li>
               <!--   <li><a href="<?php echo site_url('home/my_wishlist'); ?>"><?php echo get_phrase('wishlists'); ?></a></li> -->
                  <li class="active"><a href="<?php echo site_url('home/my_messages'); ?>"><?php echo get_phrase('my_messages'); ?></a></li>
            <!--      <li><a href="<?php echo site_url('home/purchase_history'); ?>"><?php echo get_phrase('purchase_history'); ?></a></li> -->
                  <li><a href="<?php echo site_url('home/profile/user_profile'); ?>"><?php echo get_phrase('user_profile'); ?></a></li>
                </ul>
            </div>
        </div>
    </div>
</section>


<section class="message-area my-courses-area">
    <div class="container">
        <div class="my_message_tabs">
            <div class="row align-items-stretch">
                <div class="col-lg-5">
                    <div class="message-sender-list-box">
                        <button class="btn btn-primary" type="button" id="NewMessage" onclick="NewMessage(event)">Compose</button>
                    
                        <ul class="message-sender-list">

                            <?php
                            $current_user = $this->session->userdata('user_id');
                            $this->db->where('sender', $current_user);
                            $this->db->or_where('receiver', $current_user);
                            $message_threads = $this->db->get('message_thread')->result_array();
                            foreach ($message_threads as $row):

                                // defining the user to show
                                if ($row['sender'] == $current_user)
                                $user_to_show_id = $row['receiver'];
                                if ($row['receiver'] == $current_user)
                                $user_to_show_id = $row['sender'];

                                $last_messages_details =  $this->crud_model->get_last_message_by_message_thread_code($row['message_thread_code'])->row_array();
                                ?>
                                <a href="<?php echo site_url('home/my_messages/read_message/'.$row['message_thread_code']); ?>">
                                    <li>
                                        <div class="message-sender-wrap">
                                            <div class="message-sender-head clearfix">
                                                <div class="message-sender-info d-inline-block">
                                                    <div class="sender-image d-inline-block">
                                                        <img src="<?php echo $this->user_model->get_user_image_url($user_to_show_id);?>" alt="" class="img-fluid">
                                                    </div>
                                                    <div class="sender-name d-inline-block">
                                                        <?php
                                                        $user_to_show_details = $this->user_model->get_all_user($user_to_show_id)->row_array();
                                                        echo $user_to_show_details['first_name'].' '.$user_to_show_details['last_name'];
                                                        ?>
                                                    </div>
                                                </div>
                                                <div class="message-time d-inline-block float-right"><?php echo date('D, d-M-Y', $last_messages_details['timestamp']); ?></div>
                                            </div>
                                            <div class="message-sender-body">
                                                <?php echo $last_messages_details['message']; ?>
                                            </div>
                                        </div>
                                    </li>
                                </a>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="message-details-box" id = "toggle-1">
                        <?php include 'inner_messages.php'; ?>
                    </div>
                    <div class="message-details-box" id = "toggle-2" style="display: none;">
                        <div class="new-message-details"><div class="message-header">
                            <div class="sender-info">
                                <span class="d-inline-block">
                                    <i class="far fa-user"></i>
                                </span>
                                <span class="d-inline-block"><?php echo get_phrase('new_message'); ?></span>
                            </div>
                        </div>
                        <div class="card-body">
                            <form class="" action="<?php echo site_url('home/my_messages/send_new'); ?>" method="post" enctype="multipart/form-data">
                                
                                    <div class="form-group">
                                    <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="message_box">
                                        <select class="form-control select_box_bg form_control_bg" name = "receiver[]" id="receiver" multiple>
                                        <optgroup label="<?php echo get_phrase('instructor'); ?>">

                                            <?php foreach ($instructor_list as $instructor):
                                                if ($instructor['id'] == $this->session->userdata('user_id'))
                                                    continue;
                                                ?>
                                                <option value="<?php echo $instructor['id']; ?>"><?php echo $instructor['first_name'].' '.$instructor['last_name']; ?></option>
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
                                    <div class="form-group mt-3">
                                        <textarea name="message" class="form-control form_control_bg"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary send-btn"><?php echo get_phrase('send'); ?></button>
                                    <button type="button" class="btn btn-danger cancel-btn" onclick = "CancelNewMessage(event)">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
<script type="text/javascript">
$(document).ready(function() {       
	$('#receiver').multiselect({		
		nonSelectedText: 'Select A User'				
	});
});

function NewMessage(e){

    e.preventDefault();
    $('#toggle-1').hide();
    $('#toggle-2').show();
    $('#NewMessage').removeAttr('onclick');
}

function CancelNewMessage(e){

    e.preventDefault();
    $('#toggle-2').hide();
    $('#toggle-1').show();

    $('#NewMessage').attr('onclick','NewMessage(event)');
}
function check_receiver() {
		var check_receiver = $('#receiver').val();
		if (check_receiver == '' || check_receiver == 0) {
			toastr.error("Please select a receiver", "Error");
            return false;
		}
			}

</script>
