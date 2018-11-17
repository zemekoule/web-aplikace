<?php

namespace App\Presenters;

use Nette;


final class HomepagePresenter extends Nette\Application\UI\Presenter
{
	/** @var \App\Models\UserModel @inject */
	public $userModel;

	public function renderDefault() {
		$this->template->data = $data = $this->userModel->getByName('jarda');
		bdump($data['surname']);
	}
}
