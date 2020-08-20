<script type="text/javascript">
function showAjaxModal(url, header)
{
    // SHOWING AJAX PRELOADER IMAGE
    jQuery('#scrollable-modal .modal-body').html('<div style="text-align:center;margin-top:200px;"><img src="<?php echo base_url().'assets/global/bg-pattern-light.svg'; ?>" /></div>');
    jQuery('#scrollable-modal .modal-title').html('...');
    // LOADING THE AJAX MODAL
    jQuery('#scrollable-modal').modal('show', {backdrop: 'true'});

    // SHOW AJAX RESPONSE ON REQUEST SUCCESS
    $.ajax({
        url: url,
        success: function(response)
        {
            jQuery('#scrollable-modal .modal-body').html(response);
            jQuery('#scrollable-modal .modal-title').html(header);
        }
    });
}
function showLargeModal(url, header)
{
    // SHOWING AJAX PRELOADER IMAGE
    jQuery('#large-modal .modal-body').html('<div style="text-align:center;margin-top:200px;"><img src="<?php echo base_url().'assets/global/bg-pattern-light.svg'; ?>" height = "50px" /></div>');
    jQuery('#large-modal .modal-title').html('...');
    // LOADING THE AJAX MODAL
    jQuery('#large-modal').modal('show', {backdrop: 'true'});

    // SHOW AJAX RESPONSE ON REQUEST SUCCESS
    $.ajax({
        url: url,
        success: function(response)
        {
            jQuery('#large-modal .modal-body').html(response);
            jQuery('#large-modal .modal-title').html(header);
        }
    });
}
</script>

<!-- (Large Modal)-->
<div class="modal fade" id="large-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content border-radius-none">
            <div class="modal-header modal_header_set border-radius-none">
                <h4 class="modal-title" id="myLargeModalLabel">Large modal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color:#fff;">×</button>
            </div>
            <div class="modal-body modal_body_set">
                ...
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<!-- Scrollable modal -->
<div class="modal fade" id="scrollable-modal" tabindex="-1" role="dialog" aria-labelledby="scrollableModalTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content border-radius-none">
        <div class="modal-header modal_header_set border-radius-none">
            <h5 class="modal-title" id="scrollableModalTitle">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:#fff;">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body modal_body_set">

        </div>
        <div class="modal-footer modal_footer_set border-radius-none">
            <button class="btn btn-secondary shadow-none" data-dismiss="modal"><?php echo get_phrase("close"); ?></button>
        </div>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div>

<script type="text/javascript">
function confirm_modal(delete_url)
{
    jQuery('#alert-modal').modal('show', {backdrop: 'static'});
    document.getElementById('update_link').setAttribute('href' , delete_url);
}
</script>

<!-- Info Alert Modal -->
<div id="alert-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-body p-4 modal_body_set">
                <div class="text-center">
                    <i class="dripicons-information h1 text-info"></i>
                    <h4 class="mt-2"><?php echo get_phrase("heads_up"); ?>!</h4>
                    <p class="mt-3"><?php echo get_phrase("are_you_sure"); ?>?</p>
                    <button type="button" class="btn btn-primary my-2 shadow-none" data-dismiss="modal"><?php echo get_phrase("cancel"); ?></button>
                    <a href="#" id="update_link" class="btn btn-danger shadow-none my-2"><?php echo get_phrase("continue"); ?></a>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
