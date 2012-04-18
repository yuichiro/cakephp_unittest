<?php
/**
 * アプリケーション共通コントローラー
 * 
 * @package app
 * @author  e-agency liupeihua
 * @since   PHP 5.2.6
 */

class AppController extends Controller
{
	/** 使うモデル*/
	var $uses = array();
	
	/** コンポーネント */
	var $components = array();	
	
	/** ヘルプ */
	var $helpers = array( "Html", "Form", "Javascript", "Ajax", "Js", "Paginator" => array("ajax" => "Ajax"));
	
	/** レーアウト　pageTitle */
	var $pageTitle = "";
	
	/** レーアウト　pageDescription */
	var $pageDescription = "";
	
	/** レーアウト　pageKeywords */
	var $pageKeywords = "";		
	
	/** HttpSocket(core) */
	var $httpSocket = null;
	
	/** ログイン認証 情報*/
	var $uerinfo_arr = array();	
	
	/** ユーザー情報 */
	var $contentsUserMsg = array();
	
	/** front ログインステータス */
	var $login_status = 'ccid';
	
	/** SSL PORT */
	var $ssl_port = array( "443", "10443" );
	

	function __construct() {
		parent::__construct();

		if( $this->name == "CakeError" ) {
			/** ページのタイトルを設定する */
			$this->_setPageTitle( "G-1-1", "pc" );
			/** ページの記述を設定する */
			$this->_setPageDescription( "G-1-1", "pc" );
			/** ページのキーワードを設定する */
			$this->_setPageKeywords( "G-1-1", "pc" );
			
  	 		/** レイアウト　*/
			$this->layout = 'front';
		}
	}
		
	/**
	* アクションが実行される前処理を行う 関数
	* e-agency 2010-07-14
	* 
	* @param なし
	* @return なし
	*/	 
	function beforeFilter()	{
		
		
	
	}
	
	/**
	* アクションが実行される後の処理を行う 関数
	* e-agency 2010-07-07
	* 
	* @param なし
	* @return なし
	*/	
	function afterFilter() {
		
	}		
	
	/**
	* テンプレートが読み込まれる前の処理を行う 関数
	* e-agency 2010-07-07
	* 
	* @param なし
	* @return なし
	*/	 
	function beforeRender()	{
		
		/**　共通パラメータ(レーアウト) */
		$this->set( 'title_for_layout', $this->pageTitle ); 
		$this->set( 'description_for_layout', $this->pageDescription );
		$this->set( 'keywords_for_layout', $this->pageKeywords );
		
		
	
	}
	
	/**
	 * override
	 */
	function redirect($url, $status = null, $exit = true){
		if ($this->section == 'mobile') {
			if ( ini_get('session.use_trans_sid') ) {
				if ( is_array($url) ) {
					if ( !isset($url['page']) ) { $url['page'] = ""; }
					$url['page'] .= '?' . session_name() . '=' . htmlspecialchars(session_id(), ENT_QUOTES);
				} else {
					if ( strpos($url, session_name()) === false ) {
						$url .= ( strpos($url, '?') === false ) ? '/?' : '&amp;';
						$url .= session_name() . '=' . htmlspecialchars(session_id(), ENT_QUOTES);
					}
				}
			}
			$url = Router::url($url);
		}
		return parent::redirect($url, $status, $exit);
	}
	
	/**
	* ページのタイトルを設定する 関数
	* e-agency 2010-07-07
	* 
	* @param string $title ページのタイトル
	* @param string $type 判別フラグ
	* @return なし
	*/
	function _setPageTitle( $pageId, $type = 'admin', $addition = null ) {
		$this->pageTitle = Configure::Read( "title.{$type}.".$pageId );
		if( !empty($addition) ){
			$this->pageTitle = $addition.$this->pageTitle;
		}
	}
	
	/**
	* ページの description を設定する 関数
	* e-agency 2010-07-07
	* 
	* @param string $description ページの description
	* @param string $type 判別フラグ
	* @param bool $append_common_description 共通ディスクリプション付加フラグ
	* @return なし	 
	*/
	function _setPageDescription( $pageId, $type = 'admin', $addition = null )	{
		$this->pageDescription = Configure::Read( "description.{$type}.".$pageId );
		if( !empty($addition) ){
			$this->pageDescription = $addition.$this->pageDescription;
		}
	}
	
	/**
	* ページの keywords を設定する 関数
	* e-agency 2010-07-07
	* 
	* @param mixed $keywords ページの keywords
	* @param string $type 判別フラグ
	* @param bool $append_common_keywords 共通キーワード付加フラグ
	* @return なし	 
	*/
	function _setPageKeywords( $pageId, $type = 'admin', $addition = null ) {
		$this->pageKeywords .= Configure::Read( "keywords.{$type}.".$pageId );
		if( !empty($addition) ){
			$this->pageKeywords = $addition.$this->pageKeywords;
		}
	}
	

	

	

	

	

	
	





	
	
	


	
	
}
?>
