<?php

namespace MF\Model;

use App\Connection;

class Container {

	public static function getModel($model) {
		$class = "\\App\\Models\\" . ucfirst($model);

		$connection = new Connection();
		$conn = $connection->getDb();

		return new $class($conn);
	}
}


?>