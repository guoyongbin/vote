<?php

class ConvertArrayToXml {
	
	public static function ToXML($data, $rootNodeName = 'root', $encode = 'UTF-8') {
		$node = null;
		foreach($data as $k=>$v) {
			if(is_numeric($k))
				$k = is_object($v)?get_class($v):'value';
			$k = preg_replace('/[0-9]*/', '', $k);
			$content = '';
			if(is_array($v) || (is_object($v) && $v instanceof Traversable))
				$content = self::ToXML($v, null);
			else
				$content = $v?"<![CDATA[".htmlentities($v, null, $encode)."]]>":$v;
			$node .= "<{$k}>{$content}</{$k}>";
		}
		if($rootNodeName)
			return "<?xml version='1.0' encoding='{$encode}'?><{$rootNodeName}>{$node}</$rootNodeName>";
		else
			return $node;
	}
	
	
	/**
	 * 将数组转成XML
	 * @param array $data
	 */
	public static function ToXML2($data, $rootNodeName = "root", $xml = null) {
		if ($xml == null) {
			$xml = simplexml_load_string ( "<?xml version='1.0' encoding='utf-8'?><$rootNodeName />" );
		}
		if (self::IsYiiModel ( $data )) {
			$data = $data->attributes;
		}
		foreach ( $data as $key => $value ) {
			if (is_numeric ( $key )) {
				$key = is_object($value) ? get_class($value) : 'value';
			}
			if (is_array ( $value ) || self::IsObject ( $value )) {
				$node = $xml->addChild ( $key );
				ConvertArrayToXml::ToXML ( $value, $rootNodeName, $node );
			} else {
				//$value = htmlentities ( $value, null, 'utf-8', null);
				$xml->addChild ( $key, $value ? '<![CDATA['.$value.']]>' : $value);
			}
		}
		return $xml->asXML ();
	}
	public static function IsObject($data) {
		return is_object ( $data );
	}
	public static function IsYiiModel($data) {
		return $data instanceof CModel;
	}
	public static function isArray($data) {
		return is_array($data);
	}
}
