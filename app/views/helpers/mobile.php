<?php
//class MobileHelper extends AppHelper {
App::import('Helper','Paginator');
class MobileHelper extends PaginatorHelper {

	var $helpers = array('Form', 'Html');
	var $carrier = "pc";

	/**
	 * mobile用出力コード変換
	 */
	function afterLayout() {
		if ( !empty($this->params['mobile']) ) {
			$view =& ClassRegistry::getObject('view');
			$view->output = mb_convert_kana($view->output, 'rak', 'UTF-8');
			$view->output = mb_convert_encoding($view->output, 'SJIS', 'UTF-8');
			$this->emoji($view->output);
		}
	}

	/**
	 * link method override
	 */
	function link($title, $url = array(), $options = array()) {
		$options = array_merge(array('model' => null, 'escape' => true), $options);
		$model = $options['model'];
		unset($options['model']);

		if (!empty($this->options)) {
			$options = array_merge($this->options, $options);
		}
		if (isset($options['url'])) {
			$url = array_merge((array)$options['url'], (array)$url);
			unset($options['url']);
		}
		$url = $this->url($url, true, $model);

		$obj = isset($options['update']) ? 'Ajax' : 'Html';
		$url = array_merge(array('page' => $this->current($model)), $url);
		$url = array_merge(Set::filter($url, true), array_intersect_key($url, array('plugin'=>true)));

		/* for mobile : modified by yabumaru */
		if ( ini_get('session.use_trans_sid') ) {
			$url = array_merge(array('image' => 'on'), $url);
			$url['image'] .= '?' . session_name() . '=' . htmlspecialchars(session_id(), ENT_QUOTES);
			uksort($url, create_function('$a, $b', 'if($a === "image"){return 1;}if($a === $b){return 0;}if($b === "image"){return -1;}'));
		}
		/* for mobile : modified by yabumaru */

		return $this->{$obj}->link($title, $url, $options);
	}

	/**
	 * エラーメッセージ
	 */
	function error($field) {
		if ( $this->Form->isFieldError($field) ) {
			return sprintf("<br /><font color='#ff0000'>%s</font>", $this->Form->error($field, array('wrap' => false)));
		} else {
			return '';
		}
	}
	function errorMessage($message, $br = true) {
		if ( empty($message) || !is_array($message) ) { return ''; }

		$error = '';
		$format= ( $br ) ? "<font color='%s'>%s</font><br />" : "<font color='%s'>%s</font>";
		foreach($message as $k => $v) {
			$color  = ( $k == 'ok' ) ? '#006633' : '#ff0000';
			$error .= sprintf($format, $color, $v);
		}
		return $error;
	}

	/**
	 * 絵文字バイナリ変換
	 */
	function emoji(&$output) {
		preg_match_all("/__(D|AU|SB)_([0-9A-F]{4})__/is", $output, $regs);
		foreach($regs[2] AS $k => $v) {
			$v = $this->emojiConvert($v, $regs[1][$k]);
			if ($this->params['carrier'] == 'softbank') {
				$output = str_replace($regs[0][$k], "\x1b" . $v . "\x0f", $output);
			} else {
				$output = str_replace($regs[0][$k], pack("c*", intval(substr($v, 0, 2), 16), intval(substr($v, 2, 2), 16)), $output);
			}
		}
	}

	/**
	 * 絵文字キャリア間変換
	 */
	function emojiConvert($code, $format) {
		if ($format == 'D'  && $this->params['carrier'] == 'willcom') { return $code; }
		if ($format == 'D'  && $this->params['carrier'] == 'docomo')  { return $code; }
		if ($format == 'AU' && $this->params['carrier'] == 'au')      { return $code; }
		if ($format == 'SB' && $this->params['carrier'] == 'softbank'){ return $code; }

		switch($format) {
			case "D":  $from =& $this->__docomo;   break;
			case "AU": $from =& $this->__au;       break;
			case "SB": $from =& $this->__softbank; break;
			default:   $from =& $this->__docomo;
		}
		switch($this->params['carrier']) {
			case "docomo":   $to =& $this->__docomo;   break;
			case "au":       $to =& $this->__au;       break;
			case "softbank": $to =& $this->__softbank; break;
			default:         $to =& $this->__docomo;
		}
		return $this->__convert($code, $from, $to);
	}
	function __convert($e, &$from, &$to) {
		return $to[array_search($e, $from)];
	}

	var $__docomo = array(
		"F89F","F8A0","F8A1","F8A2","F8A3","F8A4","F8A5","F8A6","F8A7","F8A8",
		"F8A9","F8AA","F8AB","F8AC","F8AD","F8AE","F8AF","F8B0","F8B1","F8B2",
		"F8B3","F8B4","F8B5","F8B6","F8B7","F8B8","F8B9","F8BA","F8BB","F8BC",
		"F8BD","F8BE","F8BF","F8C0","F8C1","F8C2","F8C3","F8C4","F8C5","F8C6",
		"F8C7","F8C8","F8C9","F8CA","F8CB","F8CC","F8CD","F8CE","F8CF","F8D0",
		"F8D1","F8D2","F8D3","F8D4","F8D5","F8D6","F8D7","F8D8","F8D9","F8DA",
		"F8DB","F8DC","F8DD","F8DE","F8DF","F8E0","F8E1","F8E2","F8E3","F8E4",
		"F8E5","F8E6","F8E7","F8E8","F8E9","F8EA","F8EB","F8EC","F8ED","F8EE",
		"F8EF","F8F0","F8F1","F8F2","F8F3","F8F4","F8F5","F8F6","F8F7","F8F8",
		"F8F9","F8FA","F8FB","F8FC","F940","F941","F942","F943","F944","F945",
		"F946","F947","F948","F949","F972","F973","F974","F975","F976","F977",
		"F978","F979","F97A","F97B","F97C","F97D","F97E","F980","F981","F982",
		"F983","F984","F985","F986","F987","F988","F989","F98A","F98B","F98C",
		"F98D","F98E","F98F","F990","F9B0","F991","F992","F993","F994","F995",
		"F996","F997","F998","F999","F99A","F99B","F99C","F99D","F99E","F99F",
		"F9A0","F9A1","F9A2","F9A3","F9A4","F9A5","F9A6","F9A7","F9A8","F9A9",
		"F9AA","F9AB","F9AC","F9AD","F9AE","F9AF","F950","F951","F952","F955",
		"F956","F957","F95B","F95C","F95D","F95E","F9B1","F9B2","F9B3","F9B4",
		"F9B5","F9B6","F9B7","F9B8","F9B9","F9BA","F9BB","F9BC","F9BD","F9BE",
		"F9BF","F9C0","F9C1","F9C2","F9C3","F9C4","F9C5","F9C6","F9C7","F9C8",
		"F9C9","F9CA","F9CB","F9CC","F9CD","F9CE","F9CF","F9D0","F9D1","F9D2",
		"F9D3","F9D4","F9D5","F9D6","F9D7","F9D8","F9D9","F9DA","F9DB","F9DC",
		"F9DD","F9DE","F9DF","F9E0","F9E1","F9E2","F9E3","F9E4","F9E5","F9E6",
		"F9E7","F9E8","F9E9","F9EA","F9EB","F9EC","F9ED","F9EE","F9EF","F9F0",
		"F9F1","F9F2","F9F3","F9F4","F9F5","F9F6","F9F7","F9F8","F9F9","F9FA",
		"F9FB","F9FC",
	);
	var $__au = array(
		"F660","F665","F664","F65D","F65F","F641","F7B5","F3BC","F667","F668",
		"F669","F66A","F66B","F66C","F66D","F66E","F66F","F670","F671","F672",
		"F643","F693","F7B6","F690","F68F","F691","F7B7","F692","F7B8","F68E",
		"F7EC","F689","F68A","F68A","F688","F812","F68C","F684","F686","F80E",
		"F80F","F682","F67B","F811","F67C","F78E","F67E","F642","F67D","F685",
		"F7B4","F69A","F69C","F6AF","F6F3","F6E4","F6DC","F6F0","F771","F645",
		"F3A0","F7B9","F3C9","F809","F676","F655","F656","F6EE","F674","F785",
		"F7BC","F6A8","F7BD","F6F7","F7A5","F822","F6DB","F69F","F6E5","F7B2",
		"F7BE","F7BF","F7C0","F7C1","F7C2","F487","F7C3","F7C4","F7A9","F7A8",
		"F3EB","F3EC","F6D7","F657","F7C5","F7C6","F7C7","F65E","F6D4","F6B8",
		"F6B4","F68D","F6A2","F772","F7DF","F466","F6F9","F794","F794","F6FA",
		"F794","F794","F79A","F795","F818","F7D3","F76E","F7C8","F7DC","F7E5",
		"F680","F3F2","F488","F748","F6FB","F6FC","F740","F741","F742","F743",
		"F744","F745","F746","F7C9","F7D8","F7B2","F650","F64F","F7CC","F649",
		"F64A","F850","F64B","F64C","F3EE","F7EE","F695","F6BD","F6C4","F83B",
		"F64E","F6BE","F6CC","F652","F6DE","F3EF","F64D","F65A","F3F0","F3F1",
		"F7CD","F7CE","F6BF","F6CD","F76C","F76C","F697","F6A0","F679","F76C",
		"F76C","F698","F74C","F798","F76C","F797","F74F","F74F","F76C","F76C",
		"F76C","F76C","F76C","F76C","F76C","F76C","F76C","F76C","F76C","F76C",
		"F7F9","F76C","F76C","F76C","F76C","F76C","F76C","F76C","F76C","F76C",
		"F76C","F76C","F76C","F76C","F76C","F7F3","F7F4","F76C","F76C","F76C",
		"F76C","F76C","F678","F76C","F76C","F76C","F76C","F76C","F76C","F76C",
		"F76C","F76C","F76C","F76C","F76C","F76C","F76C","F76C","F76C","F76C",
		"F76C","F76C","F76C","F76C","F76C","F76C","F76C","F76C","F76C","F76C",
		"F76C","F76C","F76C","F76C","F76C","F76C","F76C","F76C","F76C","F76C",
		"F76C","F76C",
	);
	var $__softbank = array(
		'\$Gj','\$Gi','\$Gk','\$Gh','\$E]','\$Pc','\$Gi','\$P\\','\$F_','\$F`',
		'\$Fa','\$Fb','\$Fc','\$Fd','\$Fe','\$Ff','\$Fg','\$Fh','\$Fi','\$Fj',
		'\$E5','\$G6','\$G4','\$G5','\$G8','\$G3','\$PJ','\$ER','\$OE','\$G>',
		'\$PT','\$G?','\$Ez','\$PN','\$Ey','\$F\'','\$G=','\$GV','\$GX','\$Es',
		'\$Eu','\$Em','\$Et','\$Ex','\$Ev','\$GZ','\$Eo','\$En','\$Eq','\$Gc',
		'\$Ge','\$Gd','\$Gg','\$E@','\$E^','\$O?','\$G\\','\$G]','\$FV','\$ED',
		'\$O*','\$Q\'','\$Q#','\$Ec','\$EE','\$O.','\$F(','\$G(','\$E>','\$Eh',
		'\$O4','\$E2','\$Ok','\$G)','\$G*','\$O!','\$EJ','\$EK','\$EF','\$F,',
		'\$F.','\$F-','\$F/','\$P9','\$P;','\$G0','\$G1','\$G2','\$FX','\$FW',
		'\$QV','\$G\'','\$F1','\$F*','\$Gl','\$Gl','\$Gl','\$Gl','\$Gl','\$Gr',
		'\$Go','\$G<','\$GS','\$FY','\$E$','\$E#','\$G+','\$OS','\$OS','\$E!',
		'\$OS','\$OS','\$F5','\$F6','\$FI','\$G_','\$FU','\$OS','\$E4','\$F2',
		'\$Ek','\$F1','\$F0','\$OS','\$F<','\$F=','\$F>','\$F?','\$F@','\$FA',
		'\$FB','\$FC','\$FD','\$FE','\$Fm','\$GB','\$OG','\$GC','\$OH','\$P5',
		'\$P6','\$P#','\$P&','\$P\'','\$FR','\$G^','\$EC','\$GR','\$G#','\$ON',
		'\$E/','\$OT','\$G-','\$O1','\$OF','\$PA','\$E\\','\$GA','\$G@','\$GA',
		'\$OS','\$OQ','\$E(','\$OP','\$OS','\$OS','\$OD','\$EO','\$O!','\$OS',
		'\$E?','\$Pk','\$FT','\$OS','\$FU','\$GD','\$OS','\$OS','\$OS','\$OS',
		'\$OS','\$OS','\$OS','\$OS','\$OS','\$OS','\$OS','\$OS','\$OS','\$OS',
		'\$E.','\$OS','\$OS','\$OS','\$OS','\$OS','\$OS','\$OS','\$OS','\$OS',
		'\$OS','\$OS','\$OS','\$OS','\$OS','\$P%','\$E&','\$OS','\$OS','\$OS',
		'\$OS','\$OS','\$F9','\$OS','\$OS','\$OS','\$OS','\$OS','\$OS','\$OS',
		'\$OS','\$OS','\$OS','\$OS','\$OS','\$OS','\$OS','\$OS','\$OS','\$OS',
		'\$OS','\$OS','\$OS','\$OS','\$OS','\$OS','\$OS','\$OS','\$OS','\$OS',
		'\$OS','\$OS','\$OS','\$OS','\$OS','\$OS','\$OS','\$OS','\$OS','\$OS',
		'\$OS','\$OS',
	);
}
?>
