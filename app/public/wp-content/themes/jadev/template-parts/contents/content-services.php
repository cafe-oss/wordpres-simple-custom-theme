<?php
    $two_column1_data = get_field('two_column_section_1');
    if ($two_column1_data){
        get_template_part('template-parts/components/two-column-image-text', null, [
            'section_data' => $two_column1_data
        ]);
    }
?>