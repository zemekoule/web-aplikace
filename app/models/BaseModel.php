<?php declare(strict_types = 1);

namespace App\Models;

use Nette;
use NotORM;

abstract class BaseModel {

	/** @var NotORM */
	protected $db;

	/** @var string */
	private $tableName;


	/**
	 * @param \NotORM $notorm
	 */
	public function __construct(NotORM $notorm) {
		$this->db = $notorm;
		$this->tableName = $this->tableNameByClass(get_class($this));
	}


	/**
	 * Určí tabulku dle názvu třídy
	 *
	 * @param string
	 *
	 * @return string
	 * @result: Pages => pages, ArticleTag => article_tag
	 */
	private function tableNameByClass($className) {
		$tableName = explode("\\", $className);
		$tableName = lcfirst(array_pop($tableName));

		$replace = []; // A => _a
		foreach (range("A", "Z") as $letter) {
			$replace[$letter] = "_" . strtolower($letter);
		}

		return strtr($tableName, $replace);
	}


	// přidáme vlastní metody: insert, update, delete, count,
	// fetchSingle, fetchPairs atd.

}