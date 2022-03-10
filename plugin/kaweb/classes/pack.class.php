<?php
/**
* Pack Class & methods
*
*/
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Packs {

	public $available_packs = array();

/**
 * Start the class off 
 *
 * @since   1.0
 */

function __construct(){

	// Create the packs
	$this->ww_packs();

}

	/**
	 * Create the defined pack sizes
	 * 
	 * Set as array for future usage if any other params need passing, such as name, weight, dimensions.
	 *
	 * @since   1.0
	 */

	public function ww_packs() {

		$this->available_packs( array( "size" => "250" ) );
		$this->available_packs( array( "size" => "500" ) );
		$this->available_packs( array( "size" => "1000" ) );
		$this->available_packs( array( "size" => "2000" ) );
		$this->available_packs( array( "size" => "5000" ) );

	}

	/** 
	 * Push our available_packs into the existing array
 	* 
 	* @since   1.0
	 */

 	public function available_packs( $pack_info=array() ){
 		if( !isset( $pack_info['size'] )  && $pack_info['size'] != "0" ){
 			return;
 		}

 		array_push( $this->available_packs, $pack_info);

 	}

	/**
 	* This does all of the magic of figuring out what packs are required.
	*
	*  @since   1.0
 	*/

	public function ww_prepare_packs($packs,$widgets){

	// sort packs in asc order
		rsort($packs);

		$packs_needed = array_fill_keys($packs,0);      

		// Check number of widgets passed is more than 0
		while($widgets > 0){

			foreach($packs as $pack){

				if($pack <= $widgets)
					break;
			}

			// increment packs needed per pack.
			++$packs_needed[$pack];
			$widgets -= $pack;
		}

		return $packs_needed;

	}

	/**
	 * AJAX Function to calculate widgets based on user input
	 * 
	 * @since   1.0
	 */

	public function ww_packcalculate(){

		$no_widgets = ($_POST['no_widgets'])  ? esc_html( $_POST['no_widgets'] ) : null;

		if( ! empty( trim( $no_widgets ) ) ){

			$widgets = esc_html( $_POST['no_widgets'] );

			foreach($this->available_packs as $key => $value){
				$pack_sizes[] = $value['size'];
			}

			$packs = $this->ww_prepare_packs($pack_sizes,$widgets);

			$pack_needed = '';
			foreach($packs as $key => $value){
				if ( $value !== 0)
					$pack_needed .= "<div class='pack-req'>".$value." x ".$key." Pack</div>";
			}

			$html = "<div class='widgets-req'>Widgets Required: ".$widgets."</div> 
			<div class='packs-req'>Packs Required: <br>". $pack_needed."</div>";

			echo $html;

			wp_die(); // stops the tailing 0
		}

	}

} // end Pack();