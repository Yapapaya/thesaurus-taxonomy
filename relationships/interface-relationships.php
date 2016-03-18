<?php

namespace HRT\WP\ThesaurusTaxonomy;

interface Relationships {

	public function get_equivalent( $objects );

	public function get_associated( $objects );

	public function get_opposite( $objects );
}
