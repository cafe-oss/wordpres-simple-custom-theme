<?php
$two_column_image_text_section = get_field('two_column_image_text_section');
if ($two_column_image_text_section) {
    get_template_part('template-parts/components/two-column-image-text', null, [
        'section_data' => $two_column_image_text_section
    ]);
}
