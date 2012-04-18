<?php
/**
 * Entry モデル TEST
 * 物理名　entry
 * 　
 * @package models
 * @author  e-Agency 
 * @version 1.0
 */

class EntryTestCase extends CakeTestCase {
	
    var $fixtures = array('app.entry'); //フィクスチャ （テストデータ）
 
    function startTest() {
        $this->Entry =& ClassRegistry::init('Entry');
    }
 
    function endTest() {
        unset($this->Entry);
        ClassRegistry::flush();
    }
 
	/**
	 * モデル内のfunctionテスト「_isExistEmail」
	 */
	// testで始まるメソッドがテスト実行対象
	function test_isExistUser() {

		//Functionの呼び出し
		$result = $this->Entry->_isExistUser("a");
		//Functionの予想結果
		$expected = true;

		//「Functionの返り値と予想結果が同じ」であることがテスト成功条件
		$this->assertEqual($result, $expected);
	}

	/**
	 * モデル内のfunctionテスト「_getUsercount」
	 */
	function test_getUsercount() {

		//Functionの呼び出し
		$result = $this->Entry->_getUsercount("b");
		//Functionの予想結果
		$expected = 5;

		//「Functionの返り値と予想結果が同じ」であることがテスト成功条件
		$this->assertEqual($result, $expected);
	}

}
?>
