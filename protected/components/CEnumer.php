<?php
/**
 * 枚举助手类
 * @author yangdongqi <yangdongqi@hayzone.com>
 * @version 1.0 2012-02-02 12:35
 * @package lib.components
 */
class CEnumer extends CComponent {
	
	/**
	 * 语言包
	 * 如果为null，则选取Yii::app()->language
	 * @var string
	 */
	public $lang = null;
	
	/**
	 * 枚举配置文件根目录
	 * 默认为：application.enums
	 * @var string
	 */
	public $basePathAlias = 'application.enums';
	
	public function init() {
	}
	
	/**
	 * 枚举
	 * @param string $name
	 * @param mixed $padding
	 * @return array
	 */
	public function options($name, $padding = 'empty') {
		$options = $padding !== false
			? $this->getDataProvider('system.padding.'.$padding)->options()
			: array();
		$inputs = is_array($name) ? $name : $this->getDataProvider($name)->options();
		foreach($inputs as $k=>$v) {
			$options[$k] = $v;
		}
		return $options;
	}
	
	/**
	 * 查看值
	 * @param string $name
	 * @param string $value
	 * @param string $default
	 */
	public function lookup($name, $value, $category = '', $default = '') {
		$value = $this->getDataProvider($name)->lookup($value);
		return $value ? $value : $default;
	}
	
	protected function getDataProvider($name) {
		$lang = $this->getLang();
		$alias = $this->basePathAlias.'.'.$lang.'.'.($name ? $name.'.' : '');
		$path = Yii::getPathOfAlias($alias).'.php';
		$config = require $path;
		
		if(!isset($config['class'])) {
			$config['class'] = 'CPhpEnumer';
		}
		
		$dataProvider = Yii::createComponent($config);
		return $dataProvider;
		//return $dataProvider->options();
	}
	
	
	
	
	protected function getLang() {
		return $this->lang ? $this->lang : Yii::app()->language;
	}
	
}

/**
 * CEnumDataProvider
 * @author yangdongqi <yangdongqi@hayzone.com>
 * @package lib.components
 */
abstract class CEnumDataProvider extends CComponent {
	abstract public function getData();
}
/**
 * CPhpEnumer
 * @author yangdongqi <yangdongqi@hayzone.com>
 * @package lib.components
 */
class CPhpEnumer extends CEnumDataProvider {
	
	protected $_data;
	
	public function __set($name, $value) {
		if(parent::__isset($name)) {
			parent::__set($name, $value);
		} else {
			$this->_data[$name] = $value;
		}
	}
	
	public function __get($name) {
		if(isset($this->_data[$name])) {
			return $this->_data[$name];
		} else {
			return parent::__get($name);
		}
	}
	
	public function setData($data) {
		if(is_array($data))
			$this->_data = $data;
	}
	
	public function getData() {
		return $this->_data;		
	}
	
	public function options() {
		return $this->_data;
	}
	
	public function lookup($value) {
		return isset($this->_data[$value]) ? $this->_data[$value] : null;
	}
	
}
/**
 * CModelEnumer
 * @author yangdongqi <yangdongqi@hayzone.com>
 * @package lib.components
 */
class CModelEnumer extends CEnumDataProvider {
	
	public $modelName;
	public $textField;
	public $valueField;
	public $groupField = '';
	protected $_criteria;
	
	protected $_data = null;
	
	public function getCriteria() {
		if(!$this->_criteria) {
			$this->_criteria = new CDbCriteria();
		}
		return $this->_criteria;
	}
	
	public function setCriteria($criteria) {
		if(is_array($criteria)) {
			$this->_criteria = new CDbCriteria($criteria);
		} elseif($criteria instanceof CDbCriteria) {
			$this->_criteria = $criteria;
		}
	}
	
	public function lookup($value) {
		$model = new $this->modelName;
		$model->getDbCriteria()->mergeWith($this->getCriteria());
		$model = $model->findByAttributes(array(
			$this->valueField => $value
		));
		return $model ? $model->{$this->textField} : null;
	}

	public function options() {
		return $this->getData();
	}
	
	public function getData() {
		if(!$this->_data) {
			$model = new $this->modelName;
			$models = $model->findAll($this->getCriteria());
			$this->_data = CHtml::listData(
				$models, 
				$this->valueField, 
				$this->textField,
				$this->groupField
			);
		}
		return $this->_data;
		
	}

	
}
class EMongoEnumer extends CEnumDataProvider {
	
	public $modelName;
	public $textField;
	public $valueField;
	public $groupField = '';
	protected $_criteria;
	
	protected $_data = null;
	
	public function getCriteria() {
		if(!$this->_criteria) {
			$this->_criteria = new EMongoCriteria();
		}
		return $this->_criteria;
	}
	
	public function setCriteria($criteria) {
		if(is_array($criteria)) {
			$this->_criteria = new EMongoCriteria($criteria);
		} elseif($criteria instanceof EMongoCriteria) {
			$this->_criteria = $criteria;
		}
	}
	
	public function lookup($value) {
		$model = new $this->modelName;
		$model->getDbCriteria()->mergeWith($this->getCriteria());
		$model = $model->findByAttributes(array(
			$this->valueField => $value
		));
		return $model ? $model->{$this->textField} : null;
	}

	public function options() {
		return $this->getData();
	}
	
	public function getData() {
		if(!$this->_data) {
			$model = new $this->modelName;
			$models = $model->findAll($this->getCriteria());
			$this->_data = CHtml::listData(
				$models, 
				$this->valueField, 
				$this->textField,
				$this->groupField
			);
		}
		return $this->_data;
		
	}
}

?>