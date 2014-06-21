<?php

global $wp_version;

$Data = $this->get_data( 'appearance_menus' );

// include js css
$ReadedJs = array( 'jquery' , 'jquery-ui-sortable' );
wp_enqueue_script( $this->PageSlug ,  $this->Url . $this->PluginSlug . '.js', $ReadedJs , $this->Ver );

if ( version_compare( $wp_version , '3.8' , '<' ) ) {
	wp_enqueue_style( $this->PageSlug , $this->Url . $this->PluginSlug . '-3.7.css', array() , $this->Ver );
} else {
	wp_enqueue_style( $this->PageSlug , $this->Url . $this->PluginSlug . '.css', array() , $this->Ver );
}

?>

<div class="wrap">
	<div class="icon32" id="icon-tools"></div>
	<?php echo $this->Msg; ?>
	<h2><?php _e( 'Appearance Menus Screen Setting' , $this->ltd ); ?></h2>

	<?php $this->get_debug_code(); ?>

	<p>&nbsp;</p>
	<h3 id="wauc-apply-user-roles"><?php echo $this->get_apply_roles(); ?></h3>

	<form id="wauc_setting_appearance_menus" class="wauc_form" method="post" action="<?php echo add_query_arg( array( 'page' => $this->PageSlug ) , remove_query_arg( array( 'wauc_msg' , 'wauc_debug' , 'page' ) ) ); ?>">
		<input type="hidden" name="<?php echo $this->UPFN; ?>" value="Y" />
		<?php wp_nonce_field( $this->Nonces["value"] , $this->Nonces["field"] ); ?>
		<input type="hidden" name="record_field" value="appearance_menus" />

		<div id="poststuff">

			<div id="post-body" class="metabox-holder columns-1">

				<div id="postbox-container-1" class="postbox-container">

					<div id="appearance_menus">
						<div class="postbox">
							<h3 class="hndle"><span><?php _e( 'Menus' ); ?></span></h3>
							<div class="inside">
								<table class="form-table">
									<tbody>
										<?php $field = 'add_new_menu'; ?>
										<tr>
											<th>
												<label><?php _e( 'Create a new menu' , $this->ltd ); ?></label>
											</th>
											<td>
												<?php $Checked = ''; ?>
												<?php if( !empty( $Data[$field] ) ) : $Checked = 'checked="checked"'; endif; ?>
												<label><input type="checkbox" name="data[<?php echo $field; ?>]" value="1" <?php echo $Checked; ?> /> <?php _e ( 'Hide' ); ?></label>
												<p class="description"><?php _e( 'This is useful when you want to use only the menus have been created.' , $this->ltd ); ?></p>
												<?php if( version_compare( $wp_version , '3.8' , '<' ) ) : ?>
													<p><img src="<?php echo $this->Url; ?>images/3.6/appearance_menus_add_new_menu.png" /></p>
													<p><img src="<?php echo $this->Url; ?>images/3.6/appearance_menus_add_new_menu_of_location.png" /></p>
												<?php else: ?>
													<p><img src="<?php echo $this->Url; ?>images/appearance_menus_add_new_menu.png" /></p>
													<p><img src="<?php echo $this->Url; ?>images/appearance_menus_add_new_menu_of_location.png" /></p>
												<?php endif; ?>
											</td>
										</tr>
										<?php $field = 'delete_menu'; ?>
										<tr>
											<th>
												<label><?php _e( 'Delete Menu' ); ?></label>
											</th>
											<td>
												<?php $Checked = ''; ?>
												<?php if( !empty( $Data[$field] ) ) : $Checked = 'checked="checked"'; endif; ?>
												<label><input type="checkbox" name="data[<?php echo $field; ?>]" value="1" <?php echo $Checked; ?> /> <?php _e ( 'Hide' ); ?></label>
												<p class="description"><?php _e( 'This is useful when you want to use only the menus have been created.' , $this->ltd ); ?></p>
												<?php if( version_compare( $wp_version , '3.8' , '<' ) ) : ?>
													<p><img src="<?php echo $this->Url; ?>images/3.6/appearance_menus_delete_menu.png" /></p>
												<?php else: ?>
													<p><img src="<?php echo $this->Url; ?>images/appearance_menus_delete_menu.png" /></p>
												<?php endif; ?>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				
				<br class="clear">

			</div>

		</div>

		<p class="submit">
			<input type="submit" class="button-primary" name="update" value="<?php _e( 'Save' ); ?>" />
		</p>

		<p class="submit reset">
			<span class="description"><?php _e( 'Reset all settings?' , $this->ltd ); ?></span>
			<input type="submit" class="button-secondary" name="reset" value="<?php _e( 'Reset settings' , $this->ltd ); ?>" />
		</p>

	</form>

</div>
