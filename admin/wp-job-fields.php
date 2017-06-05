<?php

function dwwp_add_custom_metabox()
{
    add_meta_box(
              'dwwp_meta'
            , 'Job Listing'
            , 'dwwp_meta_callback'
            , 'job'
            , 'normal'//side
            , 'core'//low
        );
}
add_action('add_meta_boxes', 'dwwp_add_custom_metabox');

function dwwp_meta_callback ( $post )
{
    $path = __FILE__;
    wp_nonce_field(basename($path, 'dwwp_jobs_nonce'));
    $dwwp_stored_meta = get_post_meta( $post->ID );
    
    ?>
<div>
    <div class="meta-row">
        <div clas="meta-th">
            <label for="job-id" class="dwwp-row-title">Job ID</label>
        </div>
        <div clas="meta-id">
            <input type="text" name="job-id" id="job-id" 
                   value="<?php if (!empty($dwwp_stored_meta['job_id'])) echo esc_attr($dwwp_stored_meta['job_id'][0])?>">
        </div>
    </div>
    <div class="meta-row">
        <div clas="meta-th">
            <label for="date-listed" class="dwwp-row-title">Date Listed</label>
        </div>
        <div clas="meta-id">
            <input type="text" name="date-listed" id="date-listed" value="">
        </div>
    </div>
    <div class="meta-row">
        <div clas="meta-th">
            <label for="application-deadline" class="dwwp-row-title">Application deadline</label>
        </div>
        <div clas="meta-id">
            <input type="text" name="application-deadline" id="application-deadline" value="">
        </div>
    </div>
</div>
<div class="meta">
    <div class="meta-th">
        <span>Principle Duties</span>
    </div>
</div>
<div class="meta-editor">
    <?php
        $content = get_post_meta($post->ID, 'principle_duties', true);
        $editor = 'principle_duties';
        $settings = array(
                    'textarea_rows'     => 5
                ,   'media_buttons'    => true
            );
        wp_editor($content, $editor, $settings);
    ?>
</div>
<div>
    <div class="meta-row">
        <div clas="meta-th">
            <label for="minimum-requeriments" class="dwwp-row-title">Minimum Requirements</label>
        </div>
        <div clas="meta-id">
            <textarea class="dwwp-textarea" name="minimum-requeriments" id="minimum-requeriments" value=""></textarea>
        </div>
    </div>
    <div class="meta-row">
        <div clas="meta-th">
            <label for="preferred-requeriments" class="dwwp-row-title">Preferred Requeriments</label>
        </div>
        <div clas="meta-id">
            <textarea class="dwwp-textarea" name="preferred-requeriments" id="preferred-requeriments" value=""></textarea>
        </div>
    </div>
    <div class="meta-row">
        <div clas="meta-th">
            <label for="relocation-assistance" class="dwwp-row-title">Relocation Assistance</label>
        </div>
        <div clas="meta-id">
            <select class="dwwp-textarea" name="relocation-assistance" id="relocation-assistance" value="">
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
        </div>
    </div>
</div>
    <?php
}

function dwwp_meta_save( $post_id )
{
    $is_autosave = wp_is_post_autosave($post_id);
    $is_revision = wp_is_post_revision($post_id);
    $is_valid_nonce = ( isset($_POST['dwwp_jobs_nonce']) && wp_verify_nonce($_POST['dwwp_jobs_nonce'], basename( __FILE__)) ) ? true : false;
      
    if ($is_autosave || $is_revision || !$is_valid_nonce) {
        return;
    }
    
    if ( isset($_POST['job_id']) ) {
        update_post_meta($post_id, 'job_id', sanitize_text_field( $_POST['job_id'] ));
    }
}

add_action('save_post', 'dwwp_meta_save');