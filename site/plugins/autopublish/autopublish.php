<?php

kirby()->hook('panel.page.create', 'run');

function run( $page ) {
	$templates = c::get('autopublish.templates', array('project', 'item'));
	if (!$templates || in_array($page->template(), $templates)) {
		try {
			$page->toggle('last');
		} catch(Exception $e) {
			return response::error($e->getMessage());
		}
	}
}
