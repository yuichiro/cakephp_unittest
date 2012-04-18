<?php
/**
 * 
 * 処理リスト
 * 　・POST 　
 * 　
 * @package controllers
 * @author  e-Agency
 * @version 1.0
 */
class PostsController extends AppController {

	/** コントローラ 名前　*/
	var $name = 'Posts';
	
	/** 使うモデル*/
	var $uses = array( "Entry" );
	
        /** コンポーネント */
	var $components = array();	
	
	/** 使うヘルプ */
	var $helpers = array();

	/** レイアウト　*/
	var $layout = 'front';
		
	/**
	 * INDEX　アクション
	 * e-agency 2012-04-11
	 * 
	 * @param なし
	 * @return なし
	 */
	function index () {		
            $this->add();
        }
                
       /**
	 * データPOST　アクション
	 * e-agency 2012-04-11
	 * 
	 * @param なし
	 * @return なし
	 */
	function add () {		
		
		if( !empty( $this->data ) )
                {  
                        $this->Entry->setValidation( "add" );
                        $this->Entry->set( $this->data );
                        
                        if ($this->Entry->validates())
                        {
                            if ( $this->Entry->_isExistUser( $this->data['Entry']['user'] ))
                            {				
                                /** Email存在の場合、回数カウント＋１ */
                                $options['conditions'] = array(
                                    'Entry.user' => $this->data['Entry']['user'],
                                );
                                $data['count'] = $this->Entry->_getUsercount($this->data['Entry']['user'])+1;    
                            } else {
                                /** Email存在しない場合、DB新規登録 */
                                $data['count'] = 1;                           
                            }
                            $data['user'] = $this->data['Entry']['user'];
                            $this->Entry->save($data);
                        }
                }
                $this->render("index");
	}
}
?>