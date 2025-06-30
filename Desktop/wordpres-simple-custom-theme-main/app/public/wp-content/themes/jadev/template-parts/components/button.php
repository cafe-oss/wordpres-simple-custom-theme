<?php
$button_info = $args['button_info'] ?? null;
?>

<?php if (!empty($button_info)): ?>
    <?php if ($button_info['button_text'] && $button_info['button_url']): ?>
        <div class="custom-button-container">
            <a href="<?php echo esc_url($button_info['button_url']); ?>" class="btn btn-primary">
                <?php echo esc_html($button_info['button_text']); ?>
            </a>
        </div>
    <?php endif; ?>
<?php endif; ?>