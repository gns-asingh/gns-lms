<div class="row ">
    <div class="col-xl-12">
        <div class="admin_title_bg">
            <div class="card-body setPageTitle">
                <h4 class="page-title"> <i class="dripicons-user-group title_icon"></i> 
                    <span style="vertical-align:middle;position:relative;top:2px;"><?php echo $page_title; ?> </span>
                </h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<div class="admin_main_content">
    <div class="row">
        <div class="col-xl-12">
            <div class="card box-shadow-none">
                <div class="admin_card_border">
                    <div class="admin_card_title">
                        <h5 class="header-title mb-0"><?php echo get_phrase('student_add_form'); ?></h5>
                    </div>
                    <div class="card-body">
                        <form class="required-form" action="<?php echo site_url('admin/users/add'); ?>" enctype="multipart/form-data" method="post">
                            <div id="progressbarwizard">
                                <ul class="nav nav-pills nav-justified form-wizard-header mb-3">
                                    <li class="nav-item">
                                        <a href="#basic_info" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                            <i class="mdi mdi-face-profile mr-1"></i>
                                            <span class="d-none d-sm-inline"><?php echo get_phrase('basic_info'); ?></span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#login_credentials" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                            <i class="mdi mdi-lock mr-1"></i>
                                            <span class="d-none d-sm-inline"><?php echo get_phrase('login_credentials'); ?></span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#social_information" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                            <i class="mdi mdi-wifi mr-1"></i>
                                            <span class="d-none d-sm-inline"><?php echo get_phrase('social_information'); ?></span>
                                        </a>
                                    </li>
                                    <!--<li class="nav-item">
                                        <a href="#payment_info" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                            <i class="mdi mdi-currency-eur mr-1"></i>
                                            <span class="d-none d-sm-inline"><?php //echo get_phrase('payment_info'); ?></span>
                                        </a>
                                    </li>-->
                                    <li class="nav-item">
                                        <a href="#finish" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                            <i class="mdi mdi-checkbox-marked-circle-outline mr-1"></i>
                                            <span class="d-none d-sm-inline"><?php echo get_phrase('finish'); ?></span>
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content b-0 mb-0">

                                    <div id="bar" class="progress mb-3" style="height: 7px;">
                                        <div class="bar progress-bar progress-bar-striped progress-bar-animated bg-success"></div>
                                    </div>

                                    <div class="tab-pane" id="basic_info">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group row mb-3">
                                                    <label class="col-md-3 col-form-label" for="first_name"><?php echo get_phrase('first_name'); ?><span class="required">*</span></label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control form_control_bg" id="first_name" name="first_name" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-3">
                                                    <label class="col-md-3 col-form-label" for="last_name"><?php echo get_phrase('last_name'); ?><span class="required">*</span></label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control form_control_bg" id="last_name" name="last_name" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-3">
                                                    <label class="col-md-3 col-form-label" for="linkedin_link"><?php echo get_phrase('biography'); ?></label>
                                                    <div class="col-md-9">
                                                        <div class="summernote">
                                                        <textarea name="biography" id = "summernote-basic" class="form-control  form_control_bg"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-3">
                                                    <label class="col-md-3 col-form-label" for="user_image"><?php echo get_phrase('user_image'); ?></label>
                                                    <div class="col-md-9">
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input custom_file_bg" id="user_image" name="user_image" accept="image/*" onchange="changeTitleOfImageUploader(this)">
                                                                <label class="custom-file-label custom_file_bg" for="user_image"><?php echo get_phrase('choose_user_image'); ?></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> <!-- end col -->
                                        </div> <!-- end row -->
                                    </div>

                                    <div class="tab-pane" id="login_credentials">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group row mb-3">
                                                    <label class="col-md-3 col-form-label" for="email"><?php echo get_phrase('email'); ?><span class="required">*</span></label>
                                                    <div class="col-md-9">
                                                        <input type="email" id="email" name="email" class="form-control form_control_bg" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-3">
                                                    <label class="col-md-3 col-form-label" for="password"><?php echo get_phrase('password'); ?><span class="required">*</span></label>
                                                    <div class="col-md-9">
                                                        <input type="password" id="password" name="password" class="form-control form_control_bg" required>
                                                    </div>
                                                </div>
                                            </div> <!-- end col -->
                                        </div> <!-- end row -->
                                    </div>

                                    <div class="tab-pane" id="social_information">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group row mb-3">
                                                    <label class="col-md-3 col-form-label" for="facebook_link"> <?php echo get_phrase('facebook'); ?></label>
                                                    <div class="col-md-9">
                                                        <input type="text" id="facebook_link" name="facebook_link" class="form-control form_control_bg">
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-3">
                                                    <label class="col-md-3 col-form-label" for="twitter_link"><?php echo get_phrase('twitter'); ?></label>
                                                    <div class="col-md-9">
                                                        <input type="text" id="twitter_link" name="twitter_link" class="form-control form_control_bg">
                                                    </div>
                                                </div>
                                                <div class="form-group row m05b-3">
                                                    <label class="col-md-3 clol-form-label" for="linkedin_link"><?php echo get_phrase('linkedin'); ?></label>
                                                    <div class="col-md-9">
                                                        <input type="text" id="linkedin_link" name="linkedin_link" class="form-control form_control_bg">
                                                    </div>
                                                </div>
                                            </div> <!-- end col -->
                                        </div> <!-- end row -->
                                    </div>
                                    <div class="tab-pane" id="payment_info">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group row mb-3">
                                                    <label class="col-md-3 col-form-label" for="facebook_link"> <?php echo get_phrase('paypal_client_id'); ?></label>
                                                    <div class="col-md-9">
                                                        <input type="text" id="paypal_client_id" name="paypal_client_id" class="form-control form_control_bg">
                                                        <small><?php echo get_phrase("required_for_instructor"); ?></small>
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-3">
                                                    <label class="col-md-3 col-form-label" for="stripe_public_key"><?php echo get_phrase('stripe_public_key'); ?></label>
                                                    <div class="col-md-9">
                                                        <input type="text" id="stripe_public_key" name="stripe_public_key" class="form-control form_control_bg">
                                                        <small><?php echo get_phrase("required_for_instructor"); ?></small>
                                                    </div>
                                                </div>
                                               <!-- <div class="form-group row mb-3">
                                                    <label class="col-md-3 col-form-label" for="stripe_secret_key"><?php echo get_phrase('stripe_secret_key'); ?></label>
                                                    <div class="col-md-9">
                                                        <input type="text" id="stripe_secret_key" name="stripe_secret_key" class="form-control form_control_bg">
                                                        <small><?php echo get_phrase("required_for_instructor"); ?></small>
                                                    </div>
                                                </div> -->
                                            </div> <!-- end col -->
                                        </div> <!-- end row -->
                                    </div>
                                    <div class="tab-pane" id="finish">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="text-center">
                                                    <h2 class="mt-0"><i class="mdi mdi-check-all"></i></h2>
                                                    <h3 class="mt-0"><?php echo get_phrase('thank_you'); ?> !</h3>

                                                    <p class="w-75 mb-2 mx-auto"><?php echo get_phrase('you_are_just_one_click_away'); ?></p>

                                                    <div class="mb-3">
                                                        <button type="button" class="btn btn-primary box-shadow-none" onclick="checkRequiredFields()" name="button"><?php echo get_phrase('submit'); ?></button>
                                                    </div>
                                                </div>
                                            </div> <!-- end col -->
                                        </div> <!-- end row -->
                                    </div>

                                    <ul class="list-inline mb-0 wizard text-center">
                                        <li class="previous list-inline-item">
                                            <a href="javascript::" class="btn btn-info box-shadow-none"> <i class="mdi mdi-arrow-left-bold"></i> </a>
                                        </li>
                                        <li class="next list-inline-item">
                                            <a href="javascript::" class="btn btn-info box-shadow-none"> <i class="mdi mdi-arrow-right-bold"></i> </a>
                                        </li>
                                    </ul>

                                </div> <!-- tab-content -->
                            </div> <!-- end #progressbarwizard-->
                        </form>
                    </div>

                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div>
    </div>
</div>
