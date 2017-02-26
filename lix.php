<?php

class LIX {

	protected $periods = array( '.', '!', '?', ':' );
	public $val = null;

	/**
	 * __construct
	 *
	 * @param string $text
	 */
	function __construct( $text ) {

		if ( empty( $text ) ) {
			echo 'Content can not be an empty string.';
			exit;
		}

		// Remove HTML tags from the text content
		$text = strip_tags( $text );
		$this->val = $this->calc_lix( $text );
	}

	/**
	 * Calculate LIX value
	 *
	 * @param  string $text Content to calculate LIX of.
	 * @return integer
	 */
	function calc_lix( $text ) {

		// Get all words from the text and count 'em
        $all_words = str_word_count( $text, 2 ); // Return associative array
        $total_words = count( $all_words );

		// Count sentences and long words
		$total_sentences = $this->get_num_sentences( $text );
		$long_words = $this->get_num_long_words( $all_words );

		$average_sentence_length =  $total_words / $total_sentences;
        $part_long_words = 100 * ( $long_words / $total_words );

		// Return LIX value
        return $average_sentence_length + $part_long_words;
	}

	/**
	 * Get the number of sentences
	 *
	 * @param  string $text
	 * @return integer
	 */
	function get_num_sentences( $text ) {

		// Determine the number of sentences
        $total_sentences   = 0;
        foreach( $this->periods as $punctuation ) {
                $total_sentences += substr_count( $text, $punctuation );
        }
		return $total_sentences;
	}

	/**
	 * Get the number of long words
	 *
	 * @param  integer $all_words
	 * @return integer
	 */
	function get_num_long_words( $all_words ) {

		// Get the number of long words, ie words longer than 6 characters
        $long_words = 0;
        foreach( $all_words as $word )
        {
                if( strlen( $word ) > 6 )
                {
                        $long_words++;
                }
        }
		return $long_words;
	}
}