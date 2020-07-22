<?php
    $role_data = $this->db->get_where('role', array('id' => $role_id))->row_array();
   // $social_links = json_decode($role_data['social_links'], true);
?>

<div class="row ">
    <div class="col-xl-12">
        <div class="admin_title_bg">
            <div class="card-body setPageTitle">
                <h4 class="page-title"> 
                    <i class="dripicons-toggles title_icon"></i> 
                    <span style="vertical-align:middle;position:relative;top:2px;"><?php echo get_phrase('edit_new_role'); ?></span>
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
                            <h5 class="mb-0 header-title"><?php echo get_phrase('role_edit_form'); ?></h5>
                        </div>
                        <div class="card-body">
                            <form class="required-form" action="<?php echo site_url('admin/role_actions/edit/'.$role_id); ?>" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="col-form-label" for="name"><?php echo get_phrase('name'); ?> <span class="required">*</span> </label>
                                    <div>
                                        <input type="text" class="form-control form_control_bg" id="rname" name="name" value="<?php echo $role_data['name']; ?>" required>
                                    </div>
                                </div>

                                <button type="button" class="btn btn-primary box-shadow-none" onclick="checkRequiredFields()"><?php echo get_phrase("submit"); ?></button>
                            </form>
                        </div>
                    </div>
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
</div>

<script type="text/javascript">
$(document).ready(function(){
 $("#rname").change(function(){
     var str = $("#rname").val();
            if (/[^a-zA-Z0-9 \-\/]/.test( str )) {
 $.NotificationApp.send("<?php echo get_phrase('oh_snap'); ?>!", "<?php echo get_phrase('Only Alphabets are allowed.'); ?>" ,"top-right","rgba(0,0,0,0.2)","error");
 return false;
}
return true;
 });
});
</script>

