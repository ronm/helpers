<?php

/**
 * Provides a 'linkedlogo' Block
 *
 * @Block(
 *   id = "linkedlogo_block",
 *   admin_label = @Translation("Linked Logo"),
 * )
 */

namespace Drupal\helpers\Plugin\Block;

use Drupal\Core\Block\BlockBase;

class LinkedlogoBlock extends BlockBase {
	/**
	* {@inheritdoc}
	*/

	public function build() {

		global $base_url;
		$config = \Drupal::config('system.site');

		$logo = theme_get_setting('logo');
		
		return array(
			'#theme' => 'linkedlogo',
			'#content' => array(
				"link" => $base_url, 
				"logo" => $logo, 
				"sitename" => $config->get('name') 
			),
			'#cache' => array(
				'max-age' => 0,
			),
		);		
	}
}
?>