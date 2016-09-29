<?php

kirby()->hook('panel.page.create', 'run');

function run( $page ) {
	$templates = c::get('autopublish.templates');
	if (!$templates || in_array($page->intendedTemplate(), $templates)) {
		try {
			$page->toggle('last');
		} catch(Exception $e) {
			return response::error($e->getMessage());
		}
	}
}
