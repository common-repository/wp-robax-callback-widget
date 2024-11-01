<?php

require_once('RobaxHelper.class.php');

class ChangesSavedHelper extends RobaxHelper
{
	public function render()
	{
		if (Robax::get_instance()->changes_saved())
		{
			return '<div id="changes_saved_info" class="updated installed_ok"><p>Расширенные настройки успешно сохранены.</p></div>';
		}

		return '';
	}
}