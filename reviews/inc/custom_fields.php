<?php


function vendor_type_meta_data($post, $callback_args){

    $vendorMetaKeyOrder = 'vendor_type_'.$callback_args['id'].'_order';
    $vendorMetaValueOrder = get_post_meta( $post->ID, $vendorMetaKeyOrder, true );

    echo '
    <label for="'.$vendorMetaKeyOrder.'">Order Nr</label><br>
    <input type="number" name="'.$vendorMetaKeyOrder.'" id="'.$vendorMetaKeyOrder.'" value="'.$vendorMetaValueOrder.'">
    ';





    var_dump($vendorMetaKeyOrder);
    //var_dump($callback_args);
}

add_action( 'save_post', 'vendor_save_data' );
function vendor_save_data( $post_id ) {
    if ( array_key_exists( 'vendor_type_casino_order', $_POST ) ) {
        update_post_meta($post_id,'vendor_type_casino_order',$_POST['vendor_type_casino_order'] );
    }
}


//Custom Field Taxonomy


add_action( 'types_add_form_fields', 'misha_add_term_fields' );
 
function misha_add_term_fields( $taxonomy ) {
 
	echo '
    
    
    <div class="type-form-field-row">
	<label for="misha-text">Custom Field</label>
	<input type="text" name="misha-text" id="misha-text" style="width:60%"/>
	<input type="text" name="misha-text" id="misha-text" style="width:30%" />
	<button class="addMore" style="width:5%">+</button>
	<p>Field description may go here.</p>
	</div>
    
   
    
    
    
    
    
    
    
    ';
 
}
