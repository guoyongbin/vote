<?php

class MongoDbPkBehavior extends CActiveRecordBehavior{

	public function beforeSave($event) {
		$owner = $this->getOwner();
		$pk = $owner->primaryKey();
		if ($owner->isNewRecord) {
			$owner->$pk = empty($owner->$pk) ? $this->pk() : $owner->$pk;
		}
		
	}
	
	public function pk() {
		$owner = $this->getOwner();
		$maxId = $owner->count();
		return md5($maxId+1);
	}
}

?>