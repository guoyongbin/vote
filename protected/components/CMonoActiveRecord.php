<?php

abstract class CMonoActiveRecord extends EMongoDocument{

	public function behaviors() {
		return array(
			'mongoPk' => array(
				'class' => 'application.components.behaviors.MongoDbPkBehavior',
			),	
		);
	}
}

?>