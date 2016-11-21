<?php

/**
 * Provides a 'Hero' Block
 *
 * @Block(
 *   id = "hero_block",
 *   admin_label = @Translation("Hero"),
 * )
 */

namespace Drupal\helpers\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\field_collection\Entity\FieldCollectionItem;

class HeroBlock extends BlockBase {
	/**
	* {@inheritdoc}
	*/

	public function build() {
		
		$node = \Drupal::request()->attributes->get('node');
		
		$slides = array();
		
		if ( isset($node->field_slide) ) {
			foreach( $node->field_slide as &$field_slide ) {
				$fc = FieldCollectionItem::load($field_slide->value);
				
				$slides[] = array(
					"body" => $fc->get('field_body')->value,
					"image" => $fc->get('field_image')->entity->url(),
					"title" => $fc->get('field_title')->value,
				);
			}	
		}
	
		return array(
			'#theme' => 'hero',
			'#slides' => $slides,
			'#cache' => array(
				'max-age' => 0,
			),
		);		
	}
}
?>