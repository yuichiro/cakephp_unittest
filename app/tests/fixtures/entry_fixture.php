<?php
/* 
 * テストデータ
 * 
 */

class EntryFixture extends CakeTestFixture {
   var $name = 'Entry';
   var $import = 'Entry';
 
    //テスト用データ
    var $records = array(
        array(
            'user'  => 'a',
            'count'=> 1,
        ),
        array(
            'user'  => 'b',
            'count'=> 5,
        ),

    );
}
?>
