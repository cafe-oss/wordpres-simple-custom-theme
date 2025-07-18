<div id="nf-pre-builder" style="background:#fff;position:fixed;top:0;right:0;bottom:0;left:0;z-index:9999999;"></div>

<div id="nf-builder" class="grey"></div>

<script id="tmpl-nf-builder" type="text/template">
    <div id="nf-app-admin-header">
        <div id="nf-logo"></div>
        <?php
        /*
         * TODO: Make this much more dynamic.
         */
        $nf_settings = get_option( 'ninja_forms_settings' );
        $disable_admin_notices = ( isset ( $nf_settings[ 'disable_admin_notices' ] ) ) ? $nf_settings[ 'disable_admin_notices' ] : false;

        $u_id = get_option( 'nf_aff', false );
        if ( !$u_id ) $u_id = apply_filters( 'ninja_forms_affiliate_id', false );

        $is_onboarding = apply_filters('ninja_forms_current_user_is_onboarding', false);

        if( ! $disable_admin_notices && ! apply_filters( 'ninja_forms_disable_marketing', false ) && ! $is_onboarding ){
            if( ! function_exists( 'NF_Layouts' ) ) {
                $link = 'https://ninjaforms.com/extensions/layout-styles/?utm_source=Ninja+Forms+Plugin&utm_medium=Form+Builder&utm_campaign=Comment+Bubble&utm_content=Layout+and+Styles+Comment';
                if ( $u_id ) {
                    $link = 'http://www.shareasale.com/r.cfm?u=' . $u_id . '&b=812237&m=63061&afftrack=&urllink=' . $link;
                }
            ?>
                <a href="<?php echo $link; ?>" target="_blank" class="nf-cta-bubble"><?php printf( esc_html__( "Drag & drop rows and columns, custom backgrounds, borders, & more without writing a single line of code.", 'ninja-forms' ) ); ?></a>
            <?php
            } elseif( ! class_exists( 'NF_ConditionalLogic', false ) ) {
                $link = 'https://ninjaforms.com/extensions/conditional-logic/?utm_source=Ninja+Forms+Plugin&utm_medium=Form+Builder&utm_campaign=Comment+Bubble&utm_content=Conditional+Logic+Comment';
                if ( $u_id ) {
                    $link = 'http://www.shareasale.com/r.cfm?u=' . $u_id . '&b=812237&m=63061&afftrack=&urllink=' . $link;
                }
            ?>
                <a href="<?php echo $link; ?>" target="_blank" class="nf-cta-bubble"><?php printf( esc_html__( "Show & hide fields and pages, selectively send email, & much more! Build professional forms easily.", 'ninja-forms' ) ); ?></a>
            <?php
            } elseif( ! class_exists( 'NF_MultiPart', false ) ) {
                $link = 'https://ninjaforms.com/extensions/multi-part-forms/?utm_source=Ninja+Forms+Plugin&utm_medium=Form+Builder&utm_campaign=Comment+Bubble&utm_content=Multi+Step+Forms+Comment';
                if ( $u_id ) {
                    $link = 'http://www.shareasale.com/r.cfm?u=' . $u_id . '&b=812237&m=63061&afftrack=&urllink=' . $link;
                }
            ?>
                <a href="<?php echo $link; ?>" target="_blank" class="nf-cta-bubble"><?php printf( esc_html__( "Create multiple page forms with drag-and-drop. You don't need to code to build complex forms!", 'ninja-forms' ) ); ?></a>
            <?php
            } elseif( ! function_exists( 'NF_File_Uploads' ) ) {
                $link = 'https://ninjaforms.com/extensions/file-uploads/?utm_source=Ninja+Forms+Plugin&utm_medium=Form+Builder&utm_campaign=Comment+Bubble&utm_content=File+Uploads+Comment';
                if ( $u_id ) {
                    $link = 'http://www.shareasale.com/r.cfm?u=' . $u_id . '&b=812237&m=63061&afftrack=&urllink=' . $link;
                }
            ?>
                <a href="<?php echo $link; ?>" target="_blank" class="nf-cta-bubble"><?php printf( esc_html__( "Let users upload files to your site! Restrict file type and size. Upload to server, media library, or cloud service.", 'ninja-forms' ) ); ?></a>
            <?php
            } elseif( ! class_exists( 'NF_Stripe_Checkout', false ) ) {
                $link = 'https://ninjaforms.com/extensions/stripe/?utm_source=Ninja+Forms+Plugin&utm_medium=Form+Builder&utm_campaign=Comment+Bubble&utm_content=Stripe+Comment';
                if ( $u_id ) {
                    $link = 'http://www.shareasale.com/r.cfm?u=' . $u_id . '&b=812237&m=63061&afftrack=&urllink=' . $link;
                }
            ?>
                <a href="<?php echo $link; ?>" target="_blank" class="nf-cta-bubble"><?php printf( esc_html__( "Accept credit card payments or donations from any form. Single payments, subscriptions, and more!", 'ninja-forms' ) ); ?></a>
            <?php
            }
        }
        ?>

        <a href="admin.php?page=ninja-forms" class="fa fa-times"></a></div>
    <div id="nf-overlay"></div>
    <div id="nf-header"></div>
    <div id="nf-main" class="nf-app-main"></div>
    <div id="nf-menu-drawer"></div>
    <div id="nf-drawer"></div>
    <span class="merge-tags-content" style="display:none;"></span>
    <div id="merge-tags-box"></div>
</script>

<script id="tmpl-nf-advanced-main-content" type="text/template">
    <div>
        <div class="child-view-container installed"></div>
        <div class="sub-section-header" style="display:none; clear:both; width:100%; padding-bottom: 20px;">
            <h4 style="text-align:center;">Additional Settings</h4>
            <hr />
        </div>
        <div class="child-view-container available"></div>
        <# if(1 != nfAdmin.devMode){ #>
            <div style="clear:both;padding-top:100px;padding:20px;opacity:.5;text-align:center;">
                For more technical features, <a href="<?php echo esc_url( add_query_arg('page', 'nf-settings', admin_url('admin.php') ) ); ?>#ninja_forms[builder_dev_mode]">enable Developer Mode</a>.
            </div>
        <# } #>
    </div>
</script>

<!-- MERGE TAGS BOX TEMPLATES -->
<script id="tmpl-nf-merge-tag-box" type="text/template">
    <div class="merge-tag-filter"></div>
    <div class="merge-tag-container">
        <div class="merge-tag-sections"></div>
        <div class="merge-tag-list"></div>
    </div>
</script>
<script id="tmpl-nf-merge-tag-box-section" type="text/template">
    {{{ data.label }}}
</script>
<script id="tmpl-nf-merge-tag-box-tag" type="text/template">
    <span data-tag="{{{data.tag}}}">{{{ _.escape( data.label ) }}} <small>{{{data.tag}}}</small></span>
</script>
<script id="tmpl-nf-merge-tag-box-filter" type="text/template">
    <input type="text" placeholder="Search for merge tags" >
</script>
<!-- END: MERGE TAGS BOX TEMPLATES -->

<script id="tmpl-nf-admin-header" type="text/template">
    <div id="nf-app-admin-header"></div>
</script>

<script id="tmpl-nf-header" type="text/template">
    <div id="nf-app-header"></div>
    <div id="nf-app-form-title"></div>
    <div id="nf-app-sub-header"></div>
</script>

<script id="tmpl-nf-header-form-title" type="text/template">
    <h2>{{{ data.renderTitle() }}}</h2>
</script>

<script id="tmpl-nf-sub-header-fields" type="text/template">
    <div class="nf-main-test">
        <div>
            <div colspan="4" style="text-align: center;">
                <a class="nf-secondary-control nf-open-drawer" title="Add new field" href="#" data-drawerid="addField">
                    <svg class="nf-plus" viewbox="0 0 100 100" xmlns="http://www.w3.org/2000/svg" data-drawerid="addField" aria-hidden="true">
                        <line class="nf-plus__angle nf-plus__angle--top" x1="50" y1="0" x2="50" y2="54" />
                        <line class="nf-plus__base" x1="0" y1="50" x2="100" y2="50" />
                        <line class="nf-plus__angle nf-plus__angle--bottom" x1="50" y1="46" x2="50" y2="100" />
                    </svg>
                    <span data-drawerid="addField"><?php esc_html_e( 'Add new field', 'ninja-forms' ); ?></span>
                </a>
            </div>
        </div>
    </div>
    <a class="nf-master-control nf-open-drawer" title="<?php esc_html_e( 'Add new field', 'ninja-forms' ); ?>" href="#" data-drawerid="addField">
        <svg class="nf-plus" viewbox="0 0 100 100" xmlns="http://www.w3.org/2000/svg" data-drawerid="addField" aria-hidden="true">
            <line class="nf-plus__angle nf-plus__angle--top" x1="50" y1="0" x2="50" y2="54" />
            <line class="nf-plus__base" x1="0" y1="50" x2="100" y2="50" />
            <line class="nf-plus__angle nf-plus__angle--bottom" x1="50" y1="46" x2="50" y2="100" />
        </svg>
        <span data-drawerid="addField"><?php esc_html_e( 'Add new field', 'ninja-forms' ); ?></span>
    </a>
</script>

<script id="tmpl-nf-sub-header-actions" type="text/template">
    <div class="nf-main-test">
        <div>
            <div colspan="4" style="text-align: center;">
                <a class="nf-secondary-control nf-open-drawer" title="Add new action" href="#" data-drawerid="addAction">
                    <svg class="nf-plus" viewbox="0 0 100 100" xmlns="http://www.w3.org/2000/svg" data-drawerid="addField" aria-hidden="true">
                        <line class="nf-plus__angle nf-plus__angle--top" x1="50" y1="0" x2="50" y2="54" />
                        <line class="nf-plus__base" x1="0" y1="50" x2="100" y2="50" />
                        <line class="nf-plus__angle nf-plus__angle--bottom" x1="50" y1="46" x2="50" y2="100" />
                    </svg>
                    <span data-drawerid="addAction"><?php esc_html_e( 'Add new action', 'ninja-forms' ); ?></span>
                </a>
            </div>
        </div>
    </div>
    <a class="nf-master-control nf-open-drawer" title="<?php esc_html_e( 'Add new action', 'ninja-forms' ); ?>" href="#" data-drawerid="addAction">
        <svg class="nf-plus" viewbox="0 0 100 100" xmlns="http://www.w3.org/2000/svg" data-drawerid="addField" aria-hidden="true">
            <line class="nf-plus__angle nf-plus__angle--top" x1="50" y1="0" x2="50" y2="54" />
            <line class="nf-plus__base" x1="0" y1="50" x2="100" y2="50" />
            <line class="nf-plus__angle nf-plus__angle--bottom" x1="50" y1="46" x2="50" y2="100" />
        </svg>
        <span><?php esc_html_e( 'Add new action', 'ninja-forms' ); ?></span>
    </a>
</script>

<script id="tmpl-nf-sub-header-settings" type="text/template">

</script>

<script id="tmpl-nf-app-header" type="text/template">
    <!-- <div id="nf-logo"></div> -->
    <ul class="nf-app-menu"></ul>
    <span class="nf-mobile-menu-button"></span>
    <span class="nf-app-buttons"></span>
</script>

<script id="tmpl-nf-app-header-action-button" type="text/template">
    {{{ data.renderPublish() }}}
    {{{ data.maybeRenderCancel() }}}
    {{{ data.renderPublicLink() }}}
</script>

<script id="tmpl-nf-mobile-menu-button" type="text/template">
    <a class="nf-button nf-mobile-menu" title="<?php esc_html_e( 'Expand Menu', 'ninja-forms' ); ?>" {{{ data.maybeDisabled() }}}" href="#"><span class="dashicons dashicons-editor-ul"></span></a>
</script>

<script id="tmpl-nf-app-header-publish-button" type="text/template">
    <a href="#" style="width:{{{ data.publishWidth }}} !important" class="nf-button primary {{{ data.maybeDisabled() }}} publish" title="<?php esc_html_e( 'Publish', 'ninja-forms' ); ?>"><?php esc_html_e( 'PUBLISH', 'ninja-forms' ); ?></a>
</script>

<script id="tmpl-nf-add-header-publish-loading" type="text/template">
    <a href="#" {{{ data.publishWidth }}} class="nf-button primary {{{ data.maybeDisabled() }}} publish" title="<?php esc_html_e( 'Loading', 'ninja-forms' ); ?>">
        <div class="nf-loading">
            <ul>
                <li></li>
                <li></li>
                <li></li>
            </ul>
        </div>
    </a>
</script>

<script id="tmpl-nf-app-header-view-changes" type="text/template">
    <a class="nf-cancel viewChanges" title="<?php esc_html_e( 'View Changes', 'ninja-forms' ); ?>" style="text-decoration: none;" href="#"><span class="dashicons dashicons-backup"></span></a>
</script>
<script id="tmpl-nf-app-header-public-link" type="text/template">
    <a class="nf-public-link publicLink" title="<?php esc_html_e( 'Public Link', 'ninja-forms' ); ?>" style="text-decoration: none;" href="#"><span class="dashicons dashicons-admin-links"></span></a>
</script>

<script id="tmpl-nf-main" type="text/template">
    <div id="nf-main-content" class="nf-app-area">
        <div id="nf-main-gutter-left"></div>
        <div id="nf-main-body"></div>
        <div id="nf-main-gutter-right"></div>
    </div>
</script>

<script id="tmpl-nf-main-header-fields" type="text/template">
    <input class="nf-button secondary nf-change-domain" data-domain="actions" type="button" value="Edit Emails and Actions" />
</script>

<script id="tmpl-nf-main-header-actions" type="text/template">
    <input class="nf-button secondary nf-change-domain" data-domain="settings" type="button" value="Manage Settings" />
</script>

<script id="tmpl-nf-main-header-settings" type="text/template">

</script>

<script id="tmpl-nf-main-content-fields-empty" type="text/template">
    <div class="nf-fields-empty">
        <h3><?php esc_html_e( 'Add form fields', 'ninja-forms' ); ?></h3>
        <p><?php esc_html_e( 'Get started by adding your first form field.', 'ninja-forms' ); ?> <?php esc_html_e( "It's that easy.", 'ninja-forms' ); ?>
    </div>
</script>

<script id="tmpl-nf-repeater-content-fields-empty" type="text/template">
    <div class="nf-fields-empty">
        <p><?php esc_html_e( 'Drag and drop new fields from the right to create a repeatable set of fields.', 'ninja-forms' ); ?></p>
    </div>
</script>

<script id="tmpl-nf-main-content-actions-empty" type="text/template">
    <tr>
        <td colspan="4">
            <h3><?php esc_html_e( 'Add form actions', 'ninja-forms' ); ?></h3>
            <p><?php esc_html_e( "Get started by adding your first form field. Just click the plus and select the actions you want. It's that easy.", 'ninja-forms' ); ?></p>
        </td>
    </tr>
</script>

<script id="tmpl-nf-main-content-field" type="text/template">
    <div id="{{{ data.getFieldID() }}}" class="{{{ data.renderClasses() }}}" data-id="{{{ data.id }}}">

        <!-- Inline overlay to prevent click-throughs. -->
        <div style="position:absolute;top:0;right:0;bottom:0;left:0;z-index:2;"></div>

        <div class="nf-item-controls"></div>

        <div class="nf-placeholder-label">
            {{{ data.renderIcon() }}}
            <span class="nf-field-label">{{{ _.escape( data.label ) }}} {{{ data.renderRequired() }}}</span>
        </div>

        <#
            var labelPosition = data.labelPosition();
            if( 'default' == labelPosition ){
                labelPosition = Backbone.Radio.channel( 'settings' ).request( 'get:setting', 'default_label_pos' );
            }
        #>
        <div class="nf-realistic-field nf-realistic-field--label-{{{labelPosition}}}" id="nf-field-{{{ data.getFieldID() }}}-wrap">
            <div class="nf-realistic-field--label"></div>
            <div class="nf-realistic-field--description">{{{ data.renderDescriptionText() }}}</div>
            <div class="nf-realistic-field--element" ></div>
        </div>
    </div>
</script>

<script id="tmpl-nf-item-controls" type="text/template">
    <div class="nf-item-edit nf-item-control"><a href="#" title="<?php esc_html_e( 'Edit', 'ninja-forms' ); ?>"><i class="nf-edit-settings fa fa-cog" aria-hidden="true"></i><!-- <span class="nf-item-editing">Editing {{{ data.objectType }}}</span> --></a></div>
    <div class="nf-item-duplicate nf-item-control"><a href="#" title="<?php esc_html_e( 'Duplicate (^ + C + click)', 'ninja-forms' ); ?>"><i class="nf-duplicate fa fa-files-o" aria-hidden="true"></i></a></div>
    <div class="nf-item-delete nf-item-control"><a href="#" title="<?php esc_html_e( 'Delete (^ + D + click)', 'ninja-forms' ); ?>"><i class="nf-delete fa fa-trash" aria-hidden="true"></i></a></div>
</script>

<script id="tmpl-nf-action-table" type="text/template">
    <table id="nf-table-display" class="nf-actions-table">
        <thead>
            <tr>
                <th></th>
                <th><?php esc_html_e( 'Name', 'ninja-forms' ); ?></th>
                <th><?php esc_html_e( 'Type', 'ninja-forms' ); ?></th>
                <th><?php esc_html_e( 'Actions', 'ninja-forms' ); ?></th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</script>

<script id="tmpl-nf-action-item" type="text/template">
    <td>{{{ data.renderToggle() }}}</td>
    <td>{{{ data.label }}}</td>
    <td>{{{ data.renderTypeNicename() }}}</td>
    <td>
        <div class="nf-item-controls"></div>
    </td>
</script>

<script id="tmpl-nf-form-setting-type" type="text/template">
    <div class="{{{ data.renderClasses() }}}"><span>{{{ data.nicename }}}</span></div>
</script>

<script id="tmpl-nf-mobile-menu" type="text/template">
    <ul class="primary">
        <li class="nf-publish {{{ data.maybeDisabled() }}}"><?php esc_html_e( 'Publish', 'ninja-forms' ); ?></li>
    </ul>
    <ul class="secondary"></ul>
</script>

<script id="tmpl-nf-mobile-menu-item" type="text/template">
    <li><a href="{{{ data.renderUrl() }}}" title="{{{ data.nicename }}}" tabindex="-1" target="{{{ data.renderTarget() }}}" {{{ data.renderDisabled() }}} >{{{ data.renderDashicons() }}}{{{ data.nicename }}}</a></li>
</script>

<script id="tmpl-nf-drawer" type="text/template">
    <div id="nf-drawer-header"></div>
    <span id="nf-drawer-content"></span>
    <a class="nf-toggle-drawer" title="<?php esc_html_e( 'Toggle Drawer', 'ninja-forms' ); ?>">
        <span class="dashicons dashicons-admin-collapse"></span><span class="nf-expand-off"><?php esc_html_e( 'Full screen', 'ninja-forms' ); ?></span><span class="nf-expand-on"><?php esc_html_e( 'Half screen', 'ninja-forms' ); ?></span>
    </a>
    <span id="nf-drawer-footer"></span>
    <# if(1 != nfAdmin.devMode){ #>
    <div style="margin-top:100px;padding:20px;opacity:.5;text-align:center;">
        For more technical features, <a href="<?php echo add_query_arg('page', 'nf-settings', admin_url('admin.php')); ?>#ninja_forms[builder_dev_mode]">enable Developer Mode</a>.
    </div>
    <# } #>
</script>

<script id="tmpl-nf-drawer-content-add-field" type="text/template">
    <div id="nf-drawer-staging" class="nf-settings nf-stage">
        <div class="nf-reservoir nf-drawer-staged-fields nf-field-type-droppable"></div>
    </div>
    <span id="nf-drawer-primary"></span>
    <span id="nf-drawer-secondary"></span>
</script>

<script id="tmpl-nf-drawer-content-add-action" type="text/template">
    <div class="nf-actions-itmes-installed">
        <span id="nf-drawer-primary-core"></span>
        <span id="nf-drawer-primary"></span>
    </div>

    <div class="nf-actions-items-available">
        <span id="nf-drawer-secondary-management"></span>
        <span id="nf-drawer-secondary-payments"></span>
        <span id="nf-drawer-secondary-automation"></span>
        <span id="nf-drawer-secondary-marketing"></span>
        <span id="nf-drawer-secondary-crms"></span>
        <span id="nf-drawer-secondary-notifications"></span>
    </div>
</script>

<script id="tmpl-nf-drawer-content-view-changes-item" type="text/template">
    <# if ( ! data.disabled ) { #>
    <tr>
    <# } else { #>
    <tr class="disabled-row">
    <# } #>

        <td>
            <span class="dashicons dashicons-{{{ data.label.dashicon }}}"></span> <span class="nf-changes-item {{{ ( data.disabled ) ? 'disabled' : '' }}}"></span>
        </td>
        <td>
            {{{ data.label.object }}}
        </td>
        <td>
            {{{ data.label.label }}}
        </td>
        <td>
            {{{ data.label.change }}}
        </td>
        <td>
            <# if ( ! data.disabled ) { #>
                <a href="#" title="<?php esc_html_e( 'Undo', 'ninja-forms' ); ?>" class="undoSingle disabled" style="text-decoration:none;">
            <# } #>

            <span class="dashicons dashicons-image-rotate {{{ ( data.disabled ) ? 'disabled' : '' }}}"></span>

            <# if ( ! data.disabled ) { #>
                </a>
            <# } #>
        </td>
    </tr>
</script>

<script id="tmpl-nf-drawer-content-public-link" type="text/template">
    <h3><?php esc_html_e('Display Your Form', 'ninja-forms'); ?></h3>
    <div class="embed-form"></div>
    <div class="enable-public-link"></div>
    <div class="copy-public-link"></div>
</script>

<script id="tmpl-nf-drawer-content-edit-settings" type="text/template">
    <span class="nf-setting-title"></span>
    <span class="nf-setting-groups"></span>
</script>

<script id="tmpl-nf-drawer-content-edit-settings-title-default" type="text/template">
    <h2>{{{ data.renderTypeNicename() }}}</h2>
</script>

<script id="tmpl-nf-drawer-content-edit-settings-title-actions" type="text/template">
    <h2>{{{ data.renderTypeNicename() }}}{{{ data.renderDocLink() }}}</h2>
</script>

<script id="tmpl-nf-drawer-content-edit-settings-title-calculations" type="text/template">
    <h2>{{{ data.renderDocLink() }}}</h2>
</script>

<script id="tmpl-nf-drawer-content-edit-settings-title-fields" type="text/template">
    <h2>{{{ data.renderSavedStar() }}} {{{ data.renderTypeNicename() }}}</h2>
    <span class="nf-add-saved-field" style="display:none"></span>
</script>

<script id="tmpl-nf-add-saved-field" type="text/template">
    <input type="text" placeholder="Saved Field Name" value="{{{ _.escape( data.label ) }}}">
    <span class="add-button"></span>
</script>

<script id="tmpl-nf-add-saved-field-button" type="text/template">
    <a href="#" title="<?php esc_html_e( 'Add', 'ninja-forms' ); ?>" class="nf-button primary"><?php esc_html_e( 'Add', 'ninja-forms' ); ?></a>
</script>

<script id="tmpl-nf-add-saved-field-loading" type="text/template">
    <a href="#" class="nf-button primary">&nbsp;
        <div class="nf-loading">
            <ul>
                <li></li>
                <li></li>
                <li></li>
            </ul>
        </div>
    </a>
</script>

<script id="tmpl-nf-drawer-content-edit-field-setting-group" type="text/template">
    <section class="nf-settings">
        {{{ data.renderLabel() }}}
        <span class="nf-field-settings"></span>
    </section>
</script>

<script id="tmpl-nf-drawer-content-edit-setting-group-label" type="text/template">
    <h3 class="toggle"><span class="dashicons dashicons-arrow-{{{ data.renderArrowDir() }}}"></span>{{{ data.label }}}</h3>
</script>

<script id="tmpl-nf-drawer-staged-field" type="text/template">
     <span class="nf-item-dock" id="{{{ data.id }}}" data-id="{{{ data.slug }}}"><span class="fa fa-{{{ data.icon }}}" data-id="{{{ data.slug }}}"></span>{{{ data.nicename }}}<span class="dashicons dashicons-dismiss"></span>
</script>

<script id="tmpl-nf-drawer-field-type-section" type="text/template">
    <section class="nf-settings {{{ data.classes }}}">
        <h3>{{{ data.nicename }}}</h3>
        {{{ data.renderFieldTypes() }}}
    </section>
</script>

<script id="tmpl-nf-drawer-field-type-button" type="text/template">
    <div class="nf-field-type-button {{{ (data.availableField()) ? '' : 'nf-field-type-draggable' }}} {{{ data.savedField() }}} {{{ data.availableField() }}}" data-id="{{{ data.id }}}">
        <div class="nf-item {{{ data.availableField() }}}" data-id="{{{ data.id }}}" tabindex="0"><span class="fa fa-{{{ data.icon }}}" data-id="{{{ data.id }}}"></span>{{{ data.nicename }}}</div>
    </div>
</script>

<script id="tmpl-nf-drawer-action-type-section" type="text/template">
    <section class="nf-settings nf-action-items {{{ data.renderClasses() }}}">
        <h3>
        <# if( data.hasContents() ) { #>
            {{{ data.renderNicename() }}}
        <# } #>
        </h3>
        <span class="action-types"></span>
    </section>
</script>

<script id="tmpl-nf-drawer-action-type-button" type="text/template">
    <div class="nf-one-third" data-type="{{{ data.id }}}">
        <div class="{{{ data.renderClasses() }}}">{{{ data.nicename }}}</div>
    </div>
</script>

<script id="tmpl-nf-drawer-header-default" type="text/template">
    <header class="nf-drawer-header">
        <div class="nf-search">
            <input type="search" class="nf-filter" value="" placeholder="Filter" tabindex="-1" />
        </div>
        <a href="#" title="<?php esc_html_e( 'Done', 'ninja-forms' ); ?>" class="nf-button primary nf-close-drawer {{{ data.renderDisabled() }}}" tabindex="-1"><?php esc_html_e( 'Done', 'ninja-forms' ); ?></a>
    </header>
</script>

<script id="tmpl-nf-drawer-header-edit-settings" type="text/template">
    <header class="nf-drawer-header">
        <a href="#" title="<?php esc_html_e( 'Done', 'ninja-forms' ); ?>" class="nf-button primary nf-close-drawer {{{ data.renderDisabled() }}}" tabindex="-1"><?php esc_html_e( 'Done', 'ninja-forms' ); ?></a>
    </header>
</script>

<script id="tmpl-nf-drawer-header-view-changes" type="text/template">
    <header class="nf-drawer-header">
        <div>
            <a href="#" title="<?php esc_html_e( 'Undo All', 'ninja-forms' ); ?>" class="nf-button secondary undoChanges" style="float:left;" tabindex="-1"><span class="dashicons dashicons-backup"></span><?php esc_html_e( ' Undo All', 'ninja-forms' ); ?></a>
        </div>
        <a href="#" title="<?php esc_html_e( 'Done', 'ninja-forms' ); ?>" class="nf-button primary nf-close-drawer" tabindex="-1"><?php esc_html_e( 'Done', 'ninja-forms' ); ?></a>
    </header>
</script>

<script id="tmpl-nf-drawer-header-public-link" type="text/template">
    <header class="nf-drawer-header">
        <a href="#" title="<?php esc_html_e( 'Done', 'ninja-forms' ); ?>" class="nf-button primary nf-close-drawer" tabindex="-1"><?php esc_html_e( 'Done', 'ninja-forms' ); ?></a>
    </header>
</script>

<script id="tmpl-nf-drawer-header-new-form" type="text/template">
    <header class="nf-drawer-header">
        <h3><?php esc_html_e( 'Almost there...', 'ninja-forms' ); ?></h3>
    </header>
</script>

<script id="tmpl-nf-drawer-content-new-form" type="text/template">
    <span class="new-form-name"></span>
    <div class="new-form-submit"></div>
    <div>
        <a href="#" title="<?php esc_html_e( 'Not Yet', 'ninja-forms' ); ?>" class="nf-button secondary nf-close-drawer" style="float:left;" tabindex="-1"><?php esc_html_e( 'Not Yet', 'ninja-forms' ); ?></a>
    </div>
    <a href="#" title="<?php esc_html_e( 'Publish', 'ninja-forms' ); ?>" class="nf-button primary nf-close-drawer publish" tabindex="-1"><?php esc_html_e( 'Publish', 'ninja-forms' ); ?></a>
</script>

<script id="tmpl-nf-app-menu-item" type="text/template">
    <li><a href="{{{ data.renderUrl() }}}" title="{{{ data.nicename }}}" class="{{{ data.renderClasses() }}}" target="{{{ data.renderTarget() }}}" {{{ data.renderDisabled() }}}><span class="app-menu-text">{{{ data.nicename }}}</span>{{{ data.renderDashicons() }}}</a></li>
</script>

<script id="tmpl-nf-staged-fields-drag" type="text/template">
    <div class="nf-staged-fields-drag">
        <div id="drag-item-1" class="nf-staged-fields-drag-wrap">{{{ data.num }}}<?php esc_html_e( ' Fields', 'ninja-forms' ); ?></div>
        <div id="drag-item-2" class="nf-staged-fields-drag-wrap">&nbsp;</div>
        <div id="drag-item-3" class="nf-staged-fields-drag-wrap">&nbsp;</div>
    </div>
</script>

<script id="tmpl-nf-drawer-staged-fields-empty" type="text/template">
    <div class="nf-staged-fields-empty"></div>
</script>

<script id="tmpl-nf-empty" type="text/template">

</script>

<script id="tmpl-nf-merge-tags-section" type="text/template">
    <h4>{{{ data.label }}}</h4>
    <ul class="merge-tags"></ul>
</script>

<script id="tmpl-nf-merge-tags-item" type="text/template">
    <a href="#" title="{{{ _.escape( data.label ) }}}" tabindex="1" class="{{{ data.renderClasses() }}}">{{{ _.escape( data.label ) }}}</a>
</script>

<!-- Field Settings Templates -->

<script id="tmpl-nf-edit-setting-wrap" type="text/template">
    <div class="{{{ data.renderClasses() }}}" {{{ data.renderVisible() }}}>
        {{{ data.renderSetting() }}}
        <div class="nf-setting-error"></div>
    </div>
</script>

<script id="tmpl-nf-edit-setting-option-repeater-wrap" type="text/template">
    <div class="{{{ data.renderClasses() }}}" {{{ data.renderVisible() }}}>
        {{{ data.renderSetting() }}}
        <span class="nf-setting-error"></span>
        <span class="nf-dev-import-options" style="display:none">
            <?php esc_html_e( 'Please use the following format', 'ninja-forms' ); ?>:
            <br>
            <br>
            <strong><?php esc_html_e( 'Label, Value, Calc Value', 'ninja-forms' ); ?></strong>
            <br>
            <br>
            <em>
            Example:
            </em>
            <pre>
Label One, value-one, 1
Label Two, value-two, 2
Label Three, value-three, 3
            </pre>
            <textarea></textarea>
            <a href="#" class="nf-button primary nf-import extra"><?php esc_html_e( 'Import', 'ninja-forms' ); ?></a>
        </span>
        <span class="nf-import-options" style="display:none">
            <?php esc_html_e( 'Please place one label on each line, separated by commas.', 'ninja-forms' ); ?>
            <br>
            <br>
            <em>
            Example:
            </em>
            <pre>
Label One,
Label Two,
Label Three
            </pre>
            <textarea></textarea>
            <a href="#" class="nf-button primary nf-import extra"><?php esc_html_e( 'Import', 'ninja-forms' ); ?></a>
        </span>
    </div>
</script>

<script id="tmpl-nf-edit-setting-image-option-repeater-wrap" type="text/template">
    <div class="{{{ data.renderClasses() }}}" {{{ data.renderVisible() }}}>
        {{{ data.renderSetting() }}}
        <span class="nf-setting-error"></span>
    </div>
</script>

<script id="tmpl-nf-edit-setting-error" type="text/template">
    <div>{{{ data.error || data.warning }}}</div>
</script>

<script id="tmpl-nf-edit-setting-textbox" type="text/template">
    <label for="{{{ data.name }}}" class="{{{ data.renderLabelClasses() }}}">{{{ data.label }}} {{{ data.renderTooltip() }}}
        <input type="text" class="setting" id="{{{ data.name }}}" value="{{{ data.value }}}" placeholder="{{{ data.placeholder }}}" />
        {{{ data.renderMergeTags() }}}
    </label>
</script>

<script id="tmpl-nf-edit-setting-copytext" type="text/template">
    <label style="position:relative;" for="{{{ data.name }}}" class="{{{ data.renderLabelClasses() }}}">{{{ data.label }}} {{{ data.renderTooltip() }}}
        <input type="text" class="setting" id="{{{ data.name }}}" value="{{{ data.value }}}" readonly="readonly" />
        <button class="nf-button primary js-click-copytext" style="position:absolute;top:50%;right:5px;padding:0px 15px;"><?php esc_html_e('Copy', 'ninja-forms'); ?></button>
    </label>
</script>

<script id="tmpl-nf-edit-setting-copyresettext" type="text/template">
    <label style="position:relative;" for="{{{ data.name }}}" class="{{{ data.renderLabelClasses() }}}">{{{ data.label }}} {{{ data.renderTooltip() }}}
        <input type="text" class="setting" id="{{{ data.name }}}" value="{{{ data.value }}}" readonly="readonly" />
        <div style="position:absolute;top:50%;right:5px;">
            <button class="nf-button primary js-click-copytext" style="padding:0px 15px;"><?php esc_html_e('Copy', 'ninja-forms'); ?></button>
            <button class="nf-button secondary js-click-resettext" style="padding:0px 15px;"><?php esc_html_e('Reset', 'ninja-forms'); ?></button>
            <button class="nf-button primary js-click-confirm" style="padding:0px 15px;display:none;"><?php esc_html_e('Confirm Reset', 'ninja-forms'); ?></button>
            <button class="nf-button secondary js-click-cancel" style="padding:0px 15px;display:none;"><?php esc_html_e('Cancel', 'ninja-forms'); ?></button>
        </div>
    </label>
</script>

<script id="tmpl-nf-edit-setting-media" type="text/template">
    <label for="{{{ data.name }}}" class="{{{ data.renderLabelClasses() }}} has-merge-tags">{{{ data.label }}} {{{ data.renderTooltip() }}}
        <input type="text" class="setting" id="{{{ data.name }}}" value="{{{ data.value }}}" placeholder="{{{ data.placeholder }}}" />
        <span class="extra open-media-manager dashicons dashicons-admin-media merge-tags"></span>
    </label>
</script>

<script id="tmpl-nf-edit-setting-datepicker" type="text/template">
    <label for="{{{ data.name }}}" class="{{{ data.renderLabelClasses() }}}">{{{ data.label }}} {{{ data.renderTooltip() }}}
        <input type="text" class="setting" id="{{{ data.name }}}" value="{{{ data.value }}}" placeholder="{{{ data.placeholder }}}" />
    </label>
</script>

<script id="tmpl-nf-edit-setting-number" type="text/template">
    <label for="{{{ data.name }}}">{{{ data.label }}} {{{ data.renderTooltip() }}}
        <input type="number" class="setting" id="{{{ data.name }}}"
               value="{{{ data.value }}}" {{{ data.renderMinMax() }}}
               placeholder="{{{ ('undefined' != typeof data.placeholder ) ? data.placeholder : '' }}}" />
	    <em>{{{ data.renderMinMaxHelper() }}}</em>
    </label>
</script>

<script id="tmpl-nf-edit-setting-textarea" type="text/template">
    <label for="{{{ data.name }}}" class="{{{ data.renderLabelClasses() }}}">{{{ data.label }}} {{{ data.renderTooltip() }}}
        <textarea id="{{{ data.name }}}" class="setting">{{{ data.value }}}</textarea>
        {{{ data.renderMergeTags() }}}
    </label>
</script>

<script id="tmpl-nf-edit-setting-rte" type="text/template">
    <label class="{{{ data.renderLabelClasses() }}}">{{{ data.label }}} {{{ data.renderTooltip() }}}</label>
        <div id="{{{ data.name }}}" class="setting">{{{ data.value }}}</div>
        {{{ data.renderMergeTags() }}}

</script>

<script id="tmpl-nf-edit-setting-select" type="text/template">
    <label for="{{{ data.name }}}" class="nf-select">{{{ data.label }}} {{{ data.renderTooltip() }}}
        <select id="{{{ data.name }}}" class="setting">
            <#
            _.each( data.options, function( option ) {
                #>
                <option value="{{{ option.value }}}" {{{ ( data.value == option.value ) ? 'selected="selected"' : '' }}}>{{{ option.label }}}</option>
                <#
            } );
            #>
        </select>
        <div></div>
    </label>
</script>

<script id="tmpl-nf-edit-setting-email-select" type="text/template">
	<label for="{{{ data.name }}}" class="nf-select">{{{ data.label }}} {{{ data.renderTooltip() }}}
			{{{ data.renderEmailFieldOptions() }}}
		<div></div>
	</label>
</script>

<script id="tmpl-nf-edit-setting-field-select" type="text/template">
    <label for="{{{ data.name }}}" class="nf-select">{{{ data.label }}} {{{ data.renderTooltip() }}}
        <select id="{{{ data.name }}}" class="setting">
            <#
            _.each( data.options, function( option ) {
                #>
                <option value="{{{ option.value }}}" {{{ ( data.value == option.value ) ? 'selected="selected"' : '' }}}>{{{ option.label }}}</option>
                <#
            } );
            #>
        </select>
        <div></div>
    </label>
</script>

<script id="tmpl-nf-edit-setting-field-list" type="text/template">
    <fieldset>
        <legend> {{{ data.label }}} </legend>
        <span class="nf-field-sub-settings"></span>
    </fieldset>
</script>

<script id="tmpl-nf-edit-setting-checkbox" type="text/template">

    <span class="nf-setting-label">{{{ data.label }}}</span> {{{ data.renderTooltip() }}}
    <input type="checkbox" id="{{{ data.name }}}" class="nf-checkbox setting" {{{ ( 1 == data.value ) ? 'checked' : '' }}} />
    <label for="{{{ data.name }}}">{{{ data.label }}}</label>

</script>

<script id="tmpl-nf-edit-setting-toggle" type="text/template">
   
    <span class="nf-setting-label">{{{ data.label }}}{{{ data.renderTooltip() }}}</span>
    <input type="checkbox" data-setting="{{{ data.settingName }}}" id="{{{ data.name }}}" class="nf-toggle setting" {{{ ( 1 == data.value ) ? 'checked' : '' }}} />
    <label for="{{{ data.name }}}">{{{ data.label }}}</label>

</script>


<script id="tmpl-nf-edit-setting-radio" type="text/template">

    <span class="nf-setting-label">{{{ data.label }}}{{{ data.renderTooltip() }}}</span>
    <#
    _.each( data.options, function( option ) {
    #>
    <span class="nf-setting-label">{{{ option.label }}}</span>
    <input type="radio" value="{{{ option.value }}}" name="{{{ data.name }}}" {{{ data.value == option.value ? "checked" : '' }}}></option>
    <#
    } );
    #>

</script>

<script id="tmpl-nf-edit-setting-button-toggle" type="text/template">
    <#
        if ( 'none' !== data.displayLabel ) {
    #>
	<span class="nf-setting-label">{{{ data.label }}}{{{ data.renderTooltip() }}}</span>
    <# } #>
	<div class="nf-setting button-toggle">
		<#
		_.each( data.options, function( option ) {
		#>
			<label for="field-{{{ option.value }}}"
				data-option_value="{{{ option.value }}}">
				<input type="radio" id="field-{{{ option.value }}}"
			       style="display:none;"
			       class="nf-button-toggle setting"
					value="{{{ option.value }}}" name="{{{data.name }}}"
	                {{{ data.value == option.value ? "checked" : '' }}}>
				<span class="nf-button primary {{{ data.value != option.value ?
				"disabled": "" }}}">{{{ option.label }}}</span>
			</label>
			<#
		} );
		#>
	</div>


</script>

<script id="tmpl-nf-edit-setting-color" type="text/template">

    <label for="{{{ data.name }}}" class="{{{ data.renderLabelClasses() }}}">{{{ data.label }}} {{{ data.renderTooltip() }}}</label>

    <input type="text" id="{{{ data.name }}}" value="{{{ data.value }}}" class="setting" data-default-color="#F9F9F9" />

    <div class="nf-colorpicker">

    </div>

</script>

<script id="tmpl-nf-edit-setting-fieldset" type="text/template">
    <fieldset>
        <legend>{{{ data.label }}} {{{ data.renderTooltip() }}}{{{ data.renderInfo() }}}</legend>
        <span class="nf-field-sub-settings"></span>
    </fieldset>
</script>

<script id="tmpl-nf-edit-setting-option-repeater" type="text/template">

    <fieldset class="nf-list-options {{{ data.renderFieldsetClasses() }}}" {{{ data.renderVisible() }}}>
        <legend>{{{ data.label }}}</legend>
        <div class="nf-div-table">
            <div class="nf-table-row nf-table-header">
                {{{ data.renderHeaders() }}}
            </div>

            <div class="nf-list-options-tbody">
            </div>
        </div>
    </fieldset>
</script>

<script id="tmpl-nf-edit-setting-image-option-repeater" type="text/template">

    <fieldset class="nf-listimage-options {{{ data.renderFieldsetClasses() }}}" {{{ data.renderVisible() }}}>
        <legend>{{{ data.label }}}</legend>
        <div class="nf-div-table">
            <div class="nf-table-row nf-table-header">
                {{{ data.renderHeaders() }}}
            </div>

            <div class="nf-listimage-options-tbody">
            </div>
        </div>
    </fieldset>
</script>

<script id="tmpl-nf-edit-setting-option-repeater-empty" type="text/template">

</script>

<script id="tmpl-nf-edit-setting-option-repeater-error" type="text/template">
    {{{ data.renderErrors() }}}
</script>

<script id="tmpl-nf-edit-setting-option-repeater-default-row" type="text/template">
    <div>
        <span class="dashicons dashicons-menu handle"></span>
    </div>
    <#
        var columns = data.getColumns();

        if ( 'undefined' != typeof columns.label ) {
        #>
             <div>
                <input type="text" class="setting" value="{{{ _.escape( data.label ) }}}" data-id="label">
            </div>
            <#
        }
    #>
    <#
        if ( 'undefined' != typeof columns.value ) {
            #>
             <div>
                <input type="text" class="setting" value="{{{ data.value }}}" data-id="value">
            </div>
            <#
        }
    #>
    <#
        if ( 'undefined' != typeof columns.calc ) {
        #>
             <div>
                <input type="text" class="setting" value="{{{ isNaN(_.escape( data.calc )) ? 0 : Number(_.escape( data.calc )) }}}" data-id="calc">
            </div>
            <#
        }
    #>
    <#
        if ( 'undefined' != typeof columns.selected ) {
            #>
            <div>
                <input type="checkbox" class="setting" class="nf-checkbox" {{{ ( 1 == data.selected ) ? 'checked="checked"' : '' }}} value="1" data-id="selected">
            </div>
            <#
        }
    #>

    <div>
        <span class="dashicons dashicons-dismiss nf-delete"></span>
    </div>
</script>

<script id="tmpl-nf-edit-setting-image-option-repeater-default-row" type="text/template">
    <div>
        <span class="dashicons dashicons-menu handle"></span>
    </div>
    <#
        var columns = data.getColumns();

        if ( 'undefined' != typeof columns.label ) {
        #>
             <div>
                <input type="text" class="setting" value="{{{ _.escape( data.label ) }}}" data-id="label">
            </div>
            <#
        }

    #>
    <#
        if ( 'undefined' != typeof columns.value ) {
            #>
             <div class='image-option-media-value'>
            <#
        } else {
            #>
             <div style='display:none;'>
            <#
        }
    #>
                <input type="text" class="setting" value="{{{ _.escape( data.value ) }}}" data-id="value">
            </div>
    <#
        if ( 'undefined' != typeof columns.calc ) {
        #>
             <div>
                <input type="text" class="setting" value="{{{ isNaN(_.escape( data.calc )) ? 0 : Number(_.escape( data.calc )) }}}" data-id="calc">
            </div>
            <#
        }
    #>
    <#
        if ( 'undefined' != typeof columns.selected ) {
            #>
            <div>
                <input type="checkbox" class="setting" class="nf-checkbox" {{{ ( 1 == data.selected ) ? 'checked="checked"' : '' }}} value="1" data-id="selected">
            </div>
            <#
        }
    #>

    <div>
        <span class="dashicons dashicons-dismiss nf-delete"></span>
    </div>
    <br/>

    <div class='has-merge-tags' style='margin-left:40px;padding:0px 15px;width:45%;display:inline-block;'>
        <label style="width:95%;text-transform:none;font-size:12px;">
            <span><?php esc_html_e('Image', 'ninja-forms'); ?></span><br/>
            <input type="text" class="setting" value="{{{ data.image }}}" data-id="image" style="width: 100%;margin-top: 5px;" disabled>
            <span class="extra open-media-manager dashicons dashicons-admin-media merge-tags" style="top:30px;"></span>
        </label>
        <input type="hidden" class="setting" value="{{{ data.image_id }}}" data-id="image_id">
    </div>
    <div class="option-image-container" style="display:inline-block;width:45%;">
    <#
        if (data.image && 0 < data.image.length) {
        #>
            <img src="{{{ data.image }}}" style="max-width:100px;max-height:100px;display:inline-block;"/>
        <#
        }
    #>
    </div>
    <hr style="border-top: 1px solid #ccc;" />
</script>

<script id="tmpl-nf-edit-setting-html" type="text/template">
    <div class="nf-note {{{ data.className }}}">
        {{{ data.value }}}
    </div>
</script>

<!-- Calculation Row Template -->

<script id="tmpl-nf-edit-setting-calculation-repeater-row" type="text/template">
    <div>
        <span class="dashicons dashicons-menu handle"></span>
    </div>
    <div class="calc-left">
        <div>
            <input type="text" class="setting" value="{{{ _.escape( data.name ) }}}" data-id="name">
            <span class="nf-option-error"></span>
        </div>
        <div><?php esc_html_e( 'Decimals', 'ninja-forms' ); ?></div>
        <div>
            <input type="text" class="setting" value="{{{ data.dec }}}" data-id="dec">
            <span class="nf-option-error"></span>
        </div>
    </div>
    <div>
        <textarea class="setting" data-id="eq">{{{ data.eq }}}</textarea>
        <span class="dashicons dashicons-list-view merge-tags"></span>
    </div>
    <div>
        <span class="dashicons dashicons-dismiss nf-delete"></span>
    </div>
</script>

<!-- Rich Text Editor Templates -->

<script id="tmpl-nf-rte-media-button" type="text/template">
    <span class="dashicons dashicons-admin-media"></span>
</script>

<script id="tmpl-nf-rte-merge-tags-button" type="text/template">
    <span class="dashicons dashicons-list-view"></span>
</script>

<script id="tmpl-nf-rte-link-button" type="text/template">
    <span class="dashicons dashicons-admin-links"></span>
</script>

<script id="tmpl-nf-rte-unlink-button" type="text/template">
    <span class="dashicons dashicons-editor-unlink"></span>
</script>

<script id="tmpl-nf-rte-link-dropdown" type="text/template">
    <div class="summernote-link">
        URL
        <input type="url" class="widefat code link-url"> <br />
        Text
        <input type="url" class="widefat code link-text"> <br />
        <label>
            <input type="checkbox" class="link-new-window"><?php esc_html_e( ' Open in new window', 'ninja-forms' ); ?>
        </label>
        <input type="button" class="cancel-link extra" value="Cancel">
        <input type="button" class="insert-link extra" value="Insert">
    </div>
</script>

<script id="nf-tmpl-save-field-repeater-row" type="text/template">
	<div>
		<span class="dashicons dashicons-menu handle"></span>
	</div>
	<div class="nf-select">
		<# try { #>
		{{{ data.renderNonSaveFieldSelect( 'field', data.field ) }}}
		<# } catch ( err ) { #>
		<input type="text" class="setting" value="{{ data.field }}" data-id="field" >
		<# } #>
	</div>
	<div>
		<span class="dashicons dashicons-dismiss nf-delete"></span>
	</div>
</script>

<script id="tmpl-nf-builder-field-date" type="text/template">
    <# if ( 'time_only' != data.date_mode ) { #>

    <input id="nf-field-{{{ data.id }}}" name="nf-field-{{{ data.id }}}" aria-invalid="false" aria-describedby="nf-error-{{{ data.id }}}" class="{{{ data.renderClasses() }}} nf-element" type="text" value="{{{ data.value }}}" {{{ data.renderPlaceholder() }}} {{{ data.maybeDisabled() }}}
           aria-labelledby="nf-label-field-{{{ data.id }}}"

            {{{ data.maybeRequired() }}}
    >
    <# } #>
    <# if ( data.maybeRenderTime() ) { #>
        <div class="nf-realistic-field-mimic">
            <div style="float:left;">
                <select class="hour">
                    {{{ data.renderHourOptions() }}}
                </select>
            </div>
            <div style="float:left;">
                <select class="minute">
                    {{{ data.renderMinuteOptions() }}}
                </select>
            </div>
            {{{ data.maybeRenderAMPM() }}}
            <div style="clear:both;"></div>
        </div>
    <# } #>
</script>

<?php do_action( 'ninja_forms_builder_templates' ); ?>
