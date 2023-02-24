<?php
/**
 * List marketplaces
 *
 * Note: this view has a corresponding view in the default rss type, changes should be reflected
 *
 * @uses $vars['options'] Options
 * @uses $vars['created_after']  Only show marketplaces created after a date
 * @uses $vars['created_before'] Only show marketplaces created before a date
 * @uess $vars['status'] Filter by status
 */

$defaults = [
	'type' => 'object',
	'subtype' => 'marketplace',
	'full_view' => false,
	'no_results' => elgg_echo('marketplace:none'),
	'distinct' => false,
];

$options = (array) elgg_extract('options', $vars, []);
$options = array_merge($defaults, $options);

if ($after = elgg_extract('created_after', $vars)) {
	$options['created_after'] = $after;
}

if ($before = elgg_extract('created_before', $vars)) {
	$options['created_before'] = $before;
}

if ($status = elgg_extract('status', $vars)) {
	$options['metadata_name_value_pairs']['status'] = $status;
}

echo elgg_list_entities($options);
