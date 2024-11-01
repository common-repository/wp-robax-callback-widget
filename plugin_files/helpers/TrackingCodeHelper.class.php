<?php

require_once('RobaxHelper.class.php');

class TrackingCodeHelper extends RobaxHelper
{
	public function render()
	{
		if (Robax::get_instance()->is_installed())
		{
			$license_number = Robax::get_instance()->get_license_number();

			return <<<HTML

            <!-- CODE ROBAX BEGIN -->
			<script type="text/javascript" charset="utf-8" src="https://callback.oblax.ru/widget-get?key={$license_number}"></script>
            <!-- CODE ROBAX END -->

HTML;
		}

		return '';
	}
}