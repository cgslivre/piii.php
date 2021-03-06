<?php 

class Piii
{	
	public static $plvrs = array(
        '69',
        'po(rr|h)(a|inha(zinha)?|ona|ao)',
        'cara(lh|i)(o(zinho|zao)?|inho(zinho)?|ao|ada)',
        'carai(o(zinho|zao)?|nho(zinho)?|ao|ada)',
        'put(a|o|inha(zinha)?|ona|ao)',
        'b(u|o)cet(a(zona|zinha)?|inha(zinha)?|ona|ao)',
        '(c|k)(u|uh|uzinho|uzao|uzona)',
        'pint(o(zinho|zao)?|inho|ao)',
        'v(i|e)ad(o(zinho)?|inho|ao)',
        'f(o|u)d(er|emos)',
        'rol(a|o)((zinha)?|ao|inha|na)',
        'pic(a|ona|ao)',
        'piro(c|k)(a(zinha)?|o|ona)',
        'fod(a|inha|ão|er|o|es|e|emos|eis|em)'
    );

    public static function getRegex()
    {
    	$plvrs = self::$plvrs;
		foreach ($plvrs as $key => $plvr) {
			$plvr = preg_replace('/([\w])/i', '$1+', $plvr);
			$plvr = preg_replace('/(a|ã)/', '[$1âàáã24]', $plvr);
    		$plvr = preg_replace('/(c)/', '[$1ç]', $plvr);
            $plvr = preg_replace('/(e)/', '[$1êé3]', $plvr);
            $plvr = preg_replace('/(i)/', '[$1í1]', $plvr);
            $plvr = preg_replace('/(o)/', '[$1õôó0]', $plvr);
			$plvr = preg_replace('/(s)/', '[$1s5]', $plvr);
			$plvr = preg_replace('/(t)/', '[$1t7]', $plvr);
			$plvr = preg_replace('/(u)/', '[$1ûúüv]', $plvr);

			$plvrs[$key] = '(\b'. $plvr . '\b)';
    	}

		$regex = '/'.implode('|', $plvrs).'/ui';
		
    	return $regex;
    }

    public static function verificar($str)
    {
		return preg_match_all(self::getRegex(), $str) ? true : false;
    }

    public static function extrair($str)
    {
		preg_match_all(self::getRegex(), $str, $matches);
		
		return isset($matches[0]) ? $matches[0] : array();
    }

    public static function substituir($str, $sstr = "[censurado]")
    {
    	return preg_replace(self::getRegex(), $sstr, $str);
    }
}
