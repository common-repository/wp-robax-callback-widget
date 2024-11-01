<?php

require_once('RobaxHelper.class.php');

class TrackingCodeInfoHelper extends RobaxHelper
{
	public function render()
	{
		if (Robax::get_instance()->is_installed())
		{
			return '<div class="updated installed_ok"><p>Вы успешно сохранили настройки!</p></div>';
		}

		return '';
	}
}