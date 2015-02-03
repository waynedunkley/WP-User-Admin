/**
* CREATE NEW USER ADMINISTRATOR WITH SLIGHTLY LESS PERMISSIONS
*
*/
function add_user_administrator_role() {

	if( !get_role( 'administrator' ) ){
		$admin_permissions = get_role( 'administrator' )->capabilities;
		$remove_permissions = array(
			'activate_plugins'		=> false,
			'delete_plugins'		=> false,
			'update_plugins'		=> false,
			'install_plugins'		=> false,
			'edit_plugins'			=> false,
			'edit_theme_options'	=> false,
			'manage_categories'		=> false,
			'manage_links'			=> false,
			'manage_options'		=> false,
			'switch_themes'			=> false,
			'update_core'			=> false,
			'update_themes'			=> false,
			'install_themes'		=> false,
			'delete_themes'			=> false,
			'edit_themes'			=> false
		);

		$permissions = array_merge($admin_permissions, $remove_permissions);
		add_role( 'client_administrator', __( 'User Administrator' ), $permissions );
	}
}
add_action('admin_init','add_user_administrator_role');