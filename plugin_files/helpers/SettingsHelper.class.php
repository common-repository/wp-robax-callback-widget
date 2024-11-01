<?php

require_once('RobaxHelper.class.php');

class SettingsHelper extends RobaxHelper
{
	public function render()
	{
?>
		<div id="livechat">
		<div class="wrap">

		<div id="lc_logo">
			<img src="<?php echo Robax::get_instance()->get_plugin_url(); ?>/images/logo.png" />
			<span>для Wordpress</span>
		</div>
		<div class="clear"></div> 

<?php
Robax::get_instance()->get_helper('ChangesSaved');
Robax::get_instance()->get_helper('TrackingCodeInfo');
?>
		

		<div class="metabox-holder">
			<div class="postbox">
				<h3>У вас есть аккаунт Robax?</h3>
				<div class="postbox_content">
				<ul id="choice_account">
				<li><input type="radio" name="choice_account" id="choice_account_1" checked="checked"> <label for="choice_account_1">Да, у меня есть аккаунт</label></li>
				<li><input type="radio" name="choice_account" id="choice_account_0"> <label for="choice_account_0">Нет, я хочу создать аккаунт</label></li>
				</ul>
				</div>
			</div>
		</div>


		<!-- Already have an account -->
		<div class="metabox-holder" id="livechat_already_have" style="display:none">


			<div class="postbox">
			<form method="post" action="?page=robax_settings">
				<h3>Настройка</h3>
				<div class="postbox_content">
				<table class="form-table">
				<tr>
				<th scope="row"><label for="livechat_login">Код виджета:</label></th>
                    <td>
                        <input type="text" name="license_number" value="<?php echo Robax::get_instance()->get_license_number(); ?>" id="license_number" size="40">
                    </td>

				</tr>
				</table>

				<p class="ajax_message"></p>
				<p class="submit">

                    <input type="hidden" name="settings_form" value="1">

				<input type="submit" class="button-primary" value="<?php _e('Сохранить изменения') ?>" />
				</p>
				</div>
			</form>
			</div>


			<?php if (Robax::get_instance()->is_installed()) { ?>
			<p id="reset_settings">Что-то пошло не так? <a href="?page=robax_settings&amp;reset=1">Сбросить ваши настройки</a>.</p>
			<?php } ?>
		</div>

		<!-- New account form -->
		<div class="metabox-holder" id="livechat_new_account" style="display:none">
			<div class="postbox">

				<h3>Инструкция по настройке</h3>


                <div class="introduce_settings">
                    Для того, что бы <a target="_blank" href="http://robax.oblax.ru/">Robax</a> работал на вашем сайте, вам надо:<br />
                    <ul style="list-style-type: decimal;">
                        <li >
                            <a target="_blank" href="http://lk.oblax.ru">Зарегистрироваться в сервисе</a>
                        </li>
                        <li>
                            Создать виджет
                        </li>
                        <li>
                            Получить идентификатор виджета (вы сможете найти идентификатор в настройках виджета, или получить его при добавлении виджета в систему)
                        </li>
                        <li>
                            Ввести идентификатор вижета в поле на этой странице
                        </li>
                        <li>
                            Нажать кнопку "Сохранить"
                        </li>
                    </ul>
                    Настроить работу сервиса вы можете в настройках сайта, в вашем <a target="_blank" href="http://lk.oblax.ru">личном кабинете</a>
                </div>

			</div>

		</div>
	</div>
	</div>
<?php
	}
}