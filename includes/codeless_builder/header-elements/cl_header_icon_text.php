<?php

extract($element['params']); 
$device_visibility_classes = '';
if( !empty( $device_visibility ) )
    $device_visibility_classes = implode(" ", $device_visibility);

if( !method_exists($this, 'generateClasses') )
	return;
?>
<div class="cl-header__element-container cl-header__icontext <?php echo esc_attr( $this->generateClasses('.cl-header__element-container') ) ?> <?php echo esc_attr( $device_visibility_classes ) ?>" <?php $this->generateStyle('.cl-header__element-container', true ) ?>>
	
	<i class="<?php echo esc_attr( $this->generateClasses('.cl-header__icontext i') ) ?>" <?php $this->generateStyle('.cl-header__icontext i', true ) ?> ></i>

	<span class="cl-header__icontext-title <?php echo esc_attr( $this->generateClasses('.cl-header__icontext-title') ) ?>" <?php $this->generateStyle('.cl-header__icontext-title', true ) ?> ><?php echo codeless_complex_esc( cl_remove_wpautop( $text_title ) ) ?></span>

</div>