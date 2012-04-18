<?php
/**
 * モデル共通クラス
 * 
 * @package app
 * @author  e-Agency guanjian
 * @version 1.0
 */
class AppModel extends Model
{
	var $actsAs = array( "Containable", "Multivalidatable" );
}

?>
