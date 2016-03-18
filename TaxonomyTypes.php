<?php

namespace HRT\WP\ThesaurusTaxonomy;

/**
 * 
 */
class TaxonomyTypes {
	
	/**
	 * 
	 */
	const TYPES = array( 'equivalent', 'associated', 'opposite' );

	
	/**
	 * Wrapper for register_taxonomy
	 * 
	 * @since 0.1
	 * 
	 * @param string $thesaurus_taxonomy The Taxonomy *name*
	 * @param string | array $object_types The post_type(s) that use the taxonomy
	 * @param array $args The register_taxonomy args
	 * @return null if things fail
	 */
	public function register_thesaurus( $thesaurus_taxonomy, $object_type='', $args ) {
		if ( ! is_array( $args ) || empty( $args ) ) {
			return;
		}

		$thesaurus_type = $args[ 'thesaurus' ];

		if ( ! isset( $thesaurus_type ) || empty( $thesaurus_type ) ) {
			return;
		}

		if ( is_bool( $thesaurus_type ) ) {
			return;
		}

		if ( ! in_array( $thesaurus_type, self::TYPES ) ) {
			return;
		}

		// remove before WordPress use
		unset($args[ 'thesaurus' ]);

		// register the new taxonomy
		register_taxonomy( $thesaurus_taxonomy, $object_type, $args );

		$this->load_core( $thesaurus_taxonomy, $thesaurus_type );

		/**
		 * Fires after a thesaurus type is registered.
		 *
		 * @since 0.1
		 *
		 * @param string       $thesaurus_taxonomy    Taxonomy slug.
		 * @param array|string $object_type Object type or array of object types.
		 * @param array        $args        Array of taxonomy registration arguments.
		 */
		do_action( 'registered_thesaurus_'.$thesaurus_type, $thesaurus_taxonomy, $object_type, $args );
		
		/**
		 * Fires after a taxonomy is registered.
		 *
		 * @since 0.1
		 *
		 * @param string	$thesaurus_type The type of thesaurus
		 * @param string       $thesaurus_taxonomy    Taxonomy slug.
		 * @param array|string $object_type Object type or array of object types.
		 * @param array        $args        Array of taxonomy registration arguments.
		 */
		do_action( 'registered_thesaurus', $thesaurus_type, $thesaurus_taxonomy, $object_type, $args );
	}

	/**
	 * Loads the thesaurus functionality for each taxonomy
	 * 
	 * @param string $thesaurus_taxonomy The Taxonomy *name*
	 * @param string $thesaurus_type The thesaurus type
	 */
	private function load_core( $thesaurus_taxonomy, $thesaurus_type ) {
		
	}

}
