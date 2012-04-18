<?php
/**
 * Posts コントローラ TEST
 * 物理名　posts_controller
 * 　
 * @package controller
 * @author  e-Agency 
 * @version 1.0
 */

App::import('Controller', 'Posts');

class TestPostsController extends PostsController {
    
    var $autoRender = false;
  
    function redirect($url, $status = null, $exit = true) {
        $this->redirectUrl = $url;
    }
  
    function render($action = null, $layout = null, $file = null) {
        $this->renderedAction = $action;
    }
  
    function _stop($status = 0) {
        $this->stopped = $status;
    }
    
}

class PostsControllerTestCase extends CakeTestCase {
    var $fixtures = array('app.entry');
    
        function startTest() {
        $this->Posts =& new TestPostsController();
        $this->Posts->constructClasses();
         $this->Entry =& ClassRegistry::init('Entry');
    }
 
    function endTest() {
        unset($this->Posts);
        ClassRegistry::flush();
    }
 
    function testAddCountup() {
        
        //POST前データ取得
        $options['conditions'] = array(
		'Entry.user' => "a",
           );
        $beforedata = $this->Entry->find("first",$options);
        //想定POSTデータ
        $this->Posts->data = array(
        'Entry' => array(
            'user' => 'a',
         ),
        );
        
        //コントローラのメソッド実行
        $this->Posts->index();
        
        //POST後データ取得
        $afterdata = $this->Entry->find("first",$options);
        
        //「POST前のcount+1とPOST後のcountが同じであること」がテスト成功条件
        $this->assertEqual($afterdata['Entry']['count'],$beforedata['Entry']['count']+1);

   }
    
} 
