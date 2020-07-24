<div class="row ">
    <div class="col-xl-12">
        <div class="admin_title_bg">
            <div class="card-body setPageTitle">
                <h4 class="page-title"> 
                    <i class="dripicons-toggles title_icon"></i> 
                    <span style="vertical-align:middle;position:relative;top:2px;"><?php echo get_phrase('website_settings'); ?></span>
                </h4>
            </div>
        </div>
    </div>
</div>
<div class="admin_main_content">
    <div class="row">
        <div class="col-xl-12">
            <div class="card box-shadow-none">
                <div class="admin_card_border">
                    <div class="admin_card_title">
                        <h5 class="mb-0 header-title"><?php echo get_phrase('website_settings');?></h5>
                    </div>
                    <div class="card-body">
                        <form class="required-form" action="<?php echo site_url('admin/frontend_settings/frontend_update'); ?>" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="banner_title"><?php echo get_phrase('banner_title'); ?><span class="required">*</span></label>
                                        <input type="text" name = "banner_title" id = "banner_title" class="form-control form_control_bg" value="<?php echo get_frontend_settings('banner_title');  ?>" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="banner_sub_title"><?php echo get_phrase('banner_sub_title'); ?><span class="required">*</span></label>
                                        <input type="text" name = "banner_sub_title" id = "banner_sub_title" class="form-control form_control_bg" value="<?php echo get_frontend_settings('banner_sub_title');  ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="about_us"><?php echo get_phrase('about_us'); ?></label>
                                        <div class="summernote">
                                            <textarea name="about_us" id = "about_us" class="form-control form_control_bg" rows="5"><?php echo get_frontend_settings('about_us'); ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="terms_and_condition"><?php echo get_phrase('terms_and_condition'); ?></label>
                                        <div class="summernote">
                                            <textarea name="terms_and_condition" id ="terms_and_condition" class="form-control form_control_bg" rows="5"><?php echo get_frontend_settings('terms_and_condition'); ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="privacy_policy"><?php echo get_phrase('privacy_policy'); ?></label>
                                        <div class="summernote">
                                            <textarea name="privacy_policy" id = "privacy_policy" class="form-control form_control_bg" rows="5"><?php echo get_frontend_settings('privacy_policy'); ?></textarea>
                                        </div>
                                    </div>
                                </div>                                
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <button type="button" class="btn btn-primary btn-block box-shadow-none" onclick="checkRequiredFields()"><?php echo get_phrase('update_settings'); ?></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-4 col-lg-6">
            <div class="card box-shadow-none">
                <div class="admin_card_border">
                    <div>
                        <div class="admin_card_title">
                            <h5 class="mb-0 header-title"><?php echo get_phrase('update_banner_image');?></h5>
                        </div>
                        <div class="card-body">
                            <div>
                                <form action="<?php echo site_url('admin/frontend_settings/banner_image_update'); ?>" method="post" enctype="multipart/form-data" style="text-align: center;">
                                    <div class="form-group mb-2">
                                        <div class="wrapper-image-preview">
                                            <div class="box m-0 border-radius-none">
                                                <div class="js--image-preview" style="background-image: url(<?php echo base_url('uploads/system/home-banner.jpg');?>); background-color: #F5F5F5;"></div>
                                                <div class="upload-options admin_card_footer">
                                                    <label for="banner_image" class="btn"> <i class="mdi mdi-camera"></i> <?php echo get_phrase('upload_banner_image'); ?> <br> <small>(2000 X 1335)</small> </label>
                                                    <input id="banner_image" style="visibility:hidden;" type="file" class="image-upload" name="banner_image" accept="image/*">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-block box-shadow-none"><?php echo get_phrase('upload_banner_image'); ?></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-6">
            <div class="card box-shadow-none">
                <div class="admin_card_border">
                    <div>
                        <div class="admin_card_title">
                            <h5 class="mb-0 header-title"><?php echo get_phrase('update_light_logo');?></h5>
                        </div>
                        <div class="card-body">
                            <form action="<?php echo site_url('admin/frontend_settings/light_logo'); ?>" method="post" enctype="multipart/form-data" style="text-align: center;">
                                <div class="form-group mb-2">
                                    <div class="wrapper-image-preview">
                                        <div class="box m-0 border-radius-none">
                                            <div class="js--image-preview" style="background-image: url(<?php echo base_url('uploads/system/logo-light.png'); ?>); background-color: #F5F5F5;"></div>
                                            <div class="upload-options admin_card_footer">
                                                <label for="light_logo" class="btn"> <i class="mdi mdi-camera"></i> <?php echo get_phrase('upload_light_logo'); ?> <br> <small>(330 X 70)</small> </label>
                                                <input id="light_logo" style="visibility:hidden;" type="file" class="image-upload" name="light_logo" accept="image/*">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary box-shadow-none btn-block"><?php echo get_phrase('upload_light_logo'); ?></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-6">
            <div class="card box-shadow-none">
                <div class="admin_card_border">
                    <div>
                        <div class="admin_card_title">
                            <h5 class="mb-0 header-title"><?php echo get_phrase('update_dark_logo');?></h5>
                        </div>
                        <div class="card-body">
                            <form action="<?php echo site_url('admin/frontend_settings/dark_logo'); ?>" method="post" enctype="multipart/form-data" style="text-align: center;">
                                <div class="form-group mb-2">
                                    <div class="wrapper-image-preview">
                                        <div class="box m-0 border-radius-none">
                                            <div class="js--image-preview" style="background-image: url(<?php echo base_url('uploads/system/logo-dark.png'); ?>); background-color: #F5F5F5;"></div>
                                            <div class="upload-options admin_card_footer">
                                                <label for="dark_logo" class="btn"> <i class="mdi mdi-camera"></i> <?php echo get_phrase('upload_dark_logo'); ?> <br> <small>(330 X 70)</small> </label>
                                                <input id="dark_logo" style="visibility:hidden;" type="file" class="image-upload" name="dark_logo" accept="image/*">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block box-shadow-none"><?php echo get_phrase('upload_light_logo'); ?></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-6">
            <div class="card box-shadow-none">
                <div class="admin_card_border">
                    <div>
                        <div class="admin_card_title">
                            <h5 class="mb-0 header-title"><?php echo get_phrase('update_small_logo');?></h5>
                        </div>
                        <div class="card-body">
                            <form action="<?php echo site_url('admin/frontend_settings/small_logo'); ?>" method="post" enctype="multipart/form-data" style="text-align: center;">
                                <div class="form-group mb-2">
                                    <div class="wrapper-image-preview">
                                        <div class="box m-0 border-radius-none">
                                            <div class="js--image-preview" style="background-image: url(<?php echo base_url('uploads/system/logo-light-sm.png'); ?>); background-color: #F5F5F5;"></div>
                                            <div class="upload-options admin_card_footer">
                                                <label for="small_logo" class="btn"> <i class="mdi mdi-camera"></i> <?php echo get_phrase('upload_small_logo'); ?> <br> <small>(49 X 58)</small> </label>
                                                <input id="small_logo" style="visibility:hidden;" type="file" class="image-upload" name="small_logo" accept="image/*">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block box-shadow-none"><?php echo get_phrase('upload_small_logo'); ?></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-6">
            <div class="card box-shadow-none">
                <div class="admin_card_border">
                    <div>
                        <div class="admin_card_title">
                            <h5 class="mb-0 header-title"><?php echo get_phrase('update_favicon');?></h5>
                        </div>
                        <div class="card-body">
                            <form action="<?php echo site_url('admin/frontend_settings/favicon'); ?>" method="post" enctype="multipart/form-data" style="text-align: center;">
                                <div class="form-group mb-2">
                                    <div class="wrapper-image-preview">
                                        <div class="box m-0 border-radius-none">
                                            <div class="js--image-preview" style="background-image: url(<?php echo base_url('uploads/system/favicon.png'); ?>); background-color: #F5F5F5;"></div>
                                            <div class="upload-options admin_card_footer">
                                                <label for="favicon" class="btn"> <i class="mdi mdi-camera"></i> <?php echo get_phrase('upload_favicon'); ?> <br> <small>(90 X 90)</small> </label>
                                                <input id="favicon" style="visibility:hidden;" type="file" class="image-upload" name="favicon" accept="image/*">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block box-shadow-none"><?php echo get_phrase('upload_favicon'); ?></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
  $(document).ready(function () {
    initSummerNote(['#about_us', '#terms_and_condition', '#privacy_policy']);
  });
</script>
