<?php
$category_details = $this->crud_model->get_category_details_by_id($category_id)->row_array();
?>

<!-- start page title -->
<div class="row">
  <div class="col-xl-12">
  <div class="admin_title_bg">
    <div class="card-body setPageTitle ">
      <h4 class="page-title"> <i class="dripicons-network-1 title_icon"></i> 
      <span style="vertical-align:middle;position:relative;top:2px;"><?php echo get_phrase('update_category'); ?></span>
    </h4>
    </div>
</div>
  </div>
</div>
<div class="admin_main_content">
<div class="row">
  <div class="col-xl-6">
    <div class="card box-shadow-none">
      <div class="">
        <div class="admin_card_border">
        <div class="admin_card_title">
          <h5 class="header-title mb-0"><?php echo get_phrase('update_category_form'); ?></h5>
          </div>
          <div class="card-body">
          <form class="required-form" action="<?php echo site_url('admin/categories/edit/'.$category_id); ?>" method="post" enctype="multipart/form-data">
            <div class="form-group" hidden>
              <label for="code"><?php echo get_phrase('category_code'); ?></label>
              <input type="text" class="form-control form_control_bg" id="code" name = "code" value="<?php echo $category_details['code']; ?>" readonly>
            </div>

            <div class="form-group">
              <label for="name"><?php echo get_phrase('category_title'); ?><span class="required">*</span></label>
              <input type="text" class="form-control form_control_bg" id="name" name = "name" value="<?php echo $category_details['name']; ?>" required>
            </div>

            <div class="form-group" hidden>
              <label for="parent"><?php echo get_phrase('parent'); ?></label>
              <select class="form-control select2" data-toggle="select2" name="parent" id="parent">
                <option value="0"><?php echo get_phrase('none'); ?></option>
                <?php foreach ($categories as $category): ?>
                  <?php if ($category['parent'] == 0): ?>
                    <option value="<?php echo $category['id']; ?>" <?php if($category_details['parent'] == $category['id']) echo 'selected'; ?>><?php echo $category['name']; ?></option>
                  <?php endif; ?>
                <?php endforeach; ?>
              </select>
            </div>

            <div class="form-group" id = "icon-picker-area">
              <label for="font_awesome_class"><?php echo get_phrase('icon_picker'); ?></label>
              <input type="text" id = "font_awesome_class" name="font_awesome_class" class="form-control icon-picker form_control_bg" value="<?php echo $category_details['font_awesome_class']; ?>" autocomplete="off">
            </div>

            <div class="form-group" id = "thumbnail-picker-area">
              <label><?php echo get_phrase('category_thumbnail'); ?> <small>(<?php echo get_phrase('the_image_size_should_be'); ?>: 400 X 255)</small> </label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="category_thumbnail" name="category_thumbnail" accept="image/*" onchange="changeTitleOfImageUploader(this)">
                  <label class="custom-file-label custom_file_bg" for="category_thumbnail"><?php echo get_phrase('choose_thumbnail'); ?></label>
                </div>
              </div>
            </div>

            <button type="button" class="btn btn-primary shadow-none" onclick="checkRequiredFields()"><?php echo get_phrase("submit"); ?></button>
          </form>
          </div>
        </div>
      </div> <!-- end card body-->
    </div> <!-- end card -->
  </div><!-- end col-->
</div>
</div>

<script type="text/javascript">
function checkCategoryType(category_type) {
  if (category_type > 0) {
    $('#thumbnail-picker-area').hide();
    $('#icon-picker-area').hide();
  }else {
    $('#thumbnail-picker-area').show();
    $('#icon-picker-area').show();
  }
}

$(document).ready(function () {
  var parent_category = $('#parent').val();
  checkCategoryType(parent_category);
});
</script>
