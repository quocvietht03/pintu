<?php
// Requirement
if ( ! function_exists( 'pintu_return_bytes' ) ){
	function pintu_return_bytes( $size ) {
		$symbol = substr( $size, -1 );
		$return = (int)$size;
		switch ( strtoupper( $symbol ) ) {
			case 'P':
				$return *= 1024;
			case 'T':
				$return *= 1024;
			case 'G':
				$return *= 1024;
			case 'M':
				$return *= 1024;
			case 'K':
				$return *= 1024;
		}
		return $return;
	}
}

if ( ! function_exists( 'pintu_server_required' ) ){
	function pintu_server_required() {
		$server_options = array(
			'memory_limit'          	=> '128M', // use M for MB, G for GB
			'post_max_size'            	=> '64M',
			'upload_max_filesize'      	=> '64M',
			'max_execution_time'		=> '120',
			'max_input_time'			=> '60',
			'max_input_vars'       		=> '1000',
			'php_version'              	=> '5.6',
			'mysql_version'            	=> '5.5'
		);
		
		$info_items = array();

		/* memory_limit */
		$current_memory = pintu_return_bytes( ini_get('memory_limit') );
		$default_memory = pintu_return_bytes( $server_options['memory_limit'] );
		
		$info_items['memory_limit']['name'] = esc_html__('Memory Limit', 'pintu');
		
		if ( $current_memory < $default_memory ) {
			$info_items['memory_limit']['title'] = '<i class="bt-no-icon dashicons dashicons-info"></i>'.'<strong>'.size_format( $current_memory ).'</strong>';
			$info_items['memory_limit']['desc'] = '<span class="bt-error-message">' . esc_html__('Maximum amount of memory a script may consume. Recommended ', 'pintu').'<strong>'.$server_options['memory_limit'].'</strong>'.esc_html__('. Please define memory limit in wp-config.php file.', 'pintu').' <a href="http://codex.wordpress.org/Editing_wp-config.php#Increasing_memory_allocated_to_PHP" target="_blank">'.esc_html__('Learn how to do it', 'pintu' ).'</a></span>';
		} else {
			$info_items['memory_limit']['title'] = '<i class="bt-yes-icon dashicons dashicons-yes"></i>'.'<strong>'.size_format( $current_memory ).'</strong>';
			$info_items['memory_limit']['desc'] = esc_html__('Maximum amount of memory a script may consume.', 'pintu');
		}
		
		/* post_max_size */
		$current_post_max_size = pintu_return_bytes( ini_get('post_max_size') );
		$default_post_max_size = pintu_return_bytes($server_options['post_max_size']);
		
		$info_items['post_max_size']['name'] = esc_html__('Post Max Size', 'pintu');
		
		if ( $current_post_max_size < $default_post_max_size ) {
			$info_items['post_max_size']['title'] = '<i class="bt-no-icon dashicons dashicons-info"></i><strong>'.size_format(pintu_return_bytes( ini_get('post_max_size') ) ).'</strong>';
			$info_items['post_max_size']['desc'] = '<span class="bt-error-message">' . esc_html__( 'Maximum size of POST data that PHP will accept. Recommended ', 'pintu'  ).' <strong>'.size_format($default_post_max_size). '</strong></span>';
		}
		else{
			$info_items['post_max_size']['title'] = '<i class="bt-yes-icon dashicons dashicons-yes"></i><strong>'.size_format(pintu_return_bytes( ini_get('post_max_size') ) ).'</strong>';
			$info_items['post_max_size']['desc'] = esc_html__( 'Maximum size of POST data that PHP will accept.', 'pintu'  );
		}
		
		/* upload_max_filesize */
		$current_upload_max_filesize = pintu_return_bytes( ini_get('upload_max_filesize') );
		$default_upload_max_filesize = pintu_return_bytes($server_options['upload_max_filesize']);
		
		$info_items['upload_max_filesize']['name'] = esc_html__('Upload Max File Size', 'pintu');
		
		if ( $current_upload_max_filesize < $default_upload_max_filesize ) {
			$info_items['upload_max_filesize']['title'] = '<i class="bt-no-icon dashicons dashicons-info"></i><strong>'.size_format(pintu_return_bytes( ini_get('upload_max_filesize') ) ).'</strong>';
			$info_items['upload_max_filesize']['desc'] = '<span class="bt-error-message">' . esc_html__( 'Maximum allowed size for uploaded files. Recommended ', 'pintu'  ) .' <strong>'.size_format($default_post_max_size). '</strong></span>';
		}
		else{
			$info_items['upload_max_filesize']['title'] = '<i class="bt-yes-icon dashicons dashicons-yes"></i><strong>'.size_format(pintu_return_bytes( ini_get('upload_max_filesize') ) ).'</strong>';
			$info_items['upload_max_filesize']['desc'] = esc_html__( 'Maximum allowed size for uploaded files.', 'pintu'  );
		}
		
		/* max_execution_time */
		$current_max_execution_time = ini_get('max_execution_time');
		$default_max_execution_time = $server_options['max_execution_time'];
		
		$info_items['max_execution_time']['name'] = esc_html__('Max Execution Time', 'pintu');
		
		if ( $current_max_execution_time < $default_max_execution_time ) {
			$info_items['max_execution_time']['title'] = '<i class="bt-no-icon dashicons dashicons-info"></i><strong>'.ini_get('max_execution_time').'</strong>';
			$info_items['max_execution_time']['desc'] = '<span class="bt-error-message">' . esc_html__( 'Maximum execution time of each script, in seconds. Recommended ', 'pintu'  ) .' <strong>'.$default_max_execution_time. '</strong></span>';
		}
		else{
			$info_items['max_execution_time']['title'] = '<i class="bt-yes-icon dashicons dashicons-yes"></i><strong>'.ini_get('max_execution_time').'</strong>';
			$info_items['max_execution_time']['desc'] = esc_html__( 'Maximum execution time of each script, in seconds.', 'pintu'  );
		}
		
		/* max_input_time */
		$current_max_input_time = ini_get('max_input_time');
		$default_max_input_time = $server_options['max_input_time'];
		
		$info_items['max_input_time']['name'] = esc_html__('Max Input Time', 'pintu');
		
		if ( $current_max_input_time < $default_max_input_time ) {
			$info_items['max_input_time']['title'] = '<i class="bt-no-icon dashicons dashicons-info"></i><strong>'.ini_get('max_input_time').'</strong>';
			$info_items['max_input_time']['desc'] = '<span class="bt-error-message">' . esc_html__( 'Maximum amount of time each script may spend parsing request data. Recommended ', 'pintu'  ) .' <strong>'.$default_max_input_time. '</strong></span>';
		}
		else{
			$info_items['max_input_time']['title'] = '<i class="bt-yes-icon dashicons dashicons-yes"></i><strong>'.ini_get('max_input_time').'</strong>';
			$info_items['max_input_time']['desc'] = esc_html__( 'Maximum amount of time each script may spend parsing request data.', 'pintu'  );
		}
		
		/* max_input_vars */
		$current_max_input_vars = ini_get('max_input_vars');
		$default_max_input_vars = $server_options['max_input_vars'];
		
		$info_items['max_input_vars']['name'] = esc_html__('Max Input Vars', 'pintu');
		
		if ( $current_max_input_vars < $default_max_input_vars ) {
			$info_items['max_input_vars']['title'] = '<i class="bt-no-icon dashicons dashicons-info"></i><strong>'.ini_get('max_input_vars').'</strong>';
			$info_items['max_input_vars']['desc'] = '<span class="bt-error-message">' . esc_html__( 'How many GET/POST/COOKIE input variables may be accepted. Recommended ', 'pintu'  ) .' <strong>'.$default_max_input_vars. '</strong></span>';
		}
		else{
			$info_items['max_input_vars']['title'] = '<i class="bt-yes-icon dashicons dashicons-yes"></i><strong>'.ini_get('max_input_vars').'</strong>';
			$info_items['max_input_vars']['desc'] = esc_html__( 'How many GET/POST/COOKIE input variables may be accepted.', 'pintu'  );
		}
		
		/* php_version */
		$info_items['php_version']['name'] = esc_html__('PHP Version', 'pintu');
		if ( function_exists( 'phpversion' ) ) {
			if( version_compare(phpversion(), $server_options['php_version'], '<=') ){
				$info_items['php_version']['title'] = '<i class="bt-no-icon dashicons dashicons-info"></i><strong>'.esc_html( phpversion() ).'</strong>';
				$info_items['php_version']['desc'] = '<span class="bt-error-message">' .esc_html__( 'The version of PHP installed on your hosting server. Recommended', 'pintu' ).' <strong>'.$server_options['php_version']. '</strong>. '.__('Contact your hosting provider, they can install it for you.', 'pintu').'</span>';
			}
			else{
				$info_items['php_version']['title'] = '<i class="bt-yes-icon dashicons dashicons-yes"></i><strong>'.esc_html( phpversion() ).'</strong>';
				$info_items['php_version']['desc'] =  esc_html__( 'The version of PHP installed on your hosting server', 'pintu' );
			}
		}
		else{
			$info_items['php_version']['title'] = esc_html__('No', 'pintu');
			$info_items['php_version']['desc'] = esc_html__('Not Installed PHP', 'pintu');
		}
		
		/* mysql_version */
		global $wpdb;
		$info_items['mysql_version']['name'] = esc_html__('MySQL Version', 'pintu');
		if( version_compare($wpdb->db_version(), $server_options['mysql_version'], '<=') ){
			$info_items['mysql_version']['title'] = '<i class="bt-no-icon dashicons dashicons-info"></i><strong>'.$wpdb->db_version().'</strong>';
			$info_items['mysql_version']['desc'] = '<span class="bt-error-message">' . esc_html__( 'The version of MySQL installed on your hosting server. Recommended', 'pintu'  ).' <strong>'.$server_options['mysql_version']. '</strong> '.__('Contact your hosting provider, they can install it for you.', 'pintu').'</span>';
		}
		else{
			$info_items['mysql_version']['title'] = '<i class="bt-yes-icon dashicons dashicons-yes"></i><strong>'.$wpdb->db_version().'</strong>';
			$info_items['mysql_version']['desc'] = esc_html__( 'The version of MySQL installed on your hosting server', 'pintu'  );
		}
		
		ob_start();
		?>
			<div class="bt-theme-required">
				<?php foreach($info_items as $info_item){ ?>
					<div class="bt-item">
						<?php echo '<div class="bt-name">'.$info_item['name'].'</div>'; ?>
						<div class="bt-content">
							<?php echo '<div class="bt-title">'.$info_item['title'].'</div>'; ?>
							<?php echo '<div class="bt-desc">'.$info_item['desc'].'</div>'; ?>
						</div>
					</div>
				<?php } ?>
			</div>
		<?php
		return ob_get_clean();
	}
}

Redux::setSection( $opt_name, array(
	'title'            => esc_html__( 'Theme Required', 'pintu' ),
	'id'               => 'bt_requirement',
	'icon'             => 'el el-briefcase',
	'desc'             => pintu_server_required()
) );
