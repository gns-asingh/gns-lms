<?php
    $role_data = $this->db->get_where('role', array('id' => $role_id))->row_array();
   // $social_links = json_decode($role_data['social_links'], true);
?>

<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> <?php echo get_phrase('edit_new_role'); ?></h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<div class="row justify-content-center">
    <div class="col-xl-7">
        <div class="card">
            <div class="card-body">
              <div class="col-lg-12">
                <h4 class="mb-3 header-title"><?php echo get_phrase('role_edit_form'); ?></h4>

                <form class="required-form" action="<?php echo site_url('admin/role_actions/edit/'.$role_id); ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                    <label class="col-md-3 col-form-label" for="name"><?php echo get_phrase('name'); ?> <span class="required">*</span> </label>
                    <div class="col-md-9">
                    <input type="text" class="form-control" id="rname" name="name" value="<?php echo $role_data['name']; ?>" required>
                    </div>
                    </div>

                    <button type="button" class="btn btn-primary" onclick="checkRequiredFields()"><?php echo get_phrase("submit"); ?></button>
                </form>
              </div>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
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

