<?php
/**
*	Widget Calculator
*
*/
?>

<form id="ww_calculator" method="post">
	<label>QTY</label> <input type="number" name="no_widgets" min="1" value="1">	
	<input type="hidden" name="action" value="pack_calculate">
	<input type="submit" value="Purchase">
</form>

<div id="pack-results"></div>