<?php
/**
 * POST モデル
 * 物理名　post
 * 　
 * @package models
 * @author  e-Agency 
 * @version 1.0
 */
class Entry extends AppModel {
	
	/** モデル名 */
	var $name = 'Entry';
        /** プライマリーキー */
        var $primaryKey = 'user';

	/** デフォルト バリデーション */
	var $validate = array();	
	
    /** 個々に検証したいルールを記入(自由) */	 
	var $validationSets = array(
		'add' => array(
			'email' => array(
					"message" => "notEmpty error!!!",
					"rule" => "notEmpty",
					"last" => true,
                                                    )
				),
			);
        /**
	 * Entryテーブル内ユーザー存在チェック
         * @param string $user
	 * @return bool
	 */
        function _isExistUser( $user )
        {
           $options['conditions'] = array(
		'Entry.user' => $user,
           );
           $posts_data = $this->find("first",$options);
           if (!empty($posts_data)) return true;
                  
           return false;
        }
        
        /**
	 * Entryテーブル内ユーザーボタン押下数取得
         * @param string $user
	 * @return int
	 */
        function _getUsercount( $user )
        {
           $options['conditions'] = array(
		'Entry.user' => $user,
           );
           $options['fields'] = array(
                'count',
            );
           $data = $this->find("first",$options);
           return $data['Entry']['count'];
                  
        }


}
?>
