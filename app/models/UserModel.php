<?php declare(strict_types=1);

namespace App\Models;

class UserModel extends BaseModel {
	/**
	 * Return user by name
	 *
	 * @param string
	 *
	 * @return
	 */
	public function getByName($name) {
		return $this->db->user("name", $name)->fetch();
	}
}

