<?php
/**
 * List friends' marketplaces
 *
 * Note: this view has a corresponding view in the default rss type, changes should be reflected
 *
 * @uses $vars['entity'] User
 * @uses $vars['created_after']  Only show marketplaces created after a date
 * @uses $vars['created_before'] Only show marketplaces created before a date
 * @uess $vars['status'] Filter by status
 */

$entity = elgg_extract('entity', $vars);

$vars['options'] = [
	'relationship' => 'friend',
	'relationship_guid' => (int) $entity->guid,
	'relationship_join_on' => 'owner_guid',
];

echo elgg_view('marketplace/listing/all', $vars);
