(function($)
{
var Robax =
{
	init: function()
	{
		this.externalLinks();//+
		this.resetLink();//+
		this.toggleForms();//+
		this.alreadyHaveAccountForm();//+
		this.controlPanelIframe();//+
		this.fadeChangesSaved();//+
	},

	externalLinks: function()
	{
		$('a.help').attr('target', '_blank');
	},

	resetLink: function()
	{
		$('#reset_settings a').click(function()
		{
			return confirm('Это сбросит ваши настройки плагина. Продолжить?');
		})
	},

	toggleForms: function()
	{
		var toggleForms = function()
		{
			// display account details page if license number is already known
			if ($('#choice_account').length == 0 || $('#choice_account_1').is(':checked'))
			{
				$('#livechat_new_account').hide();
				$('#livechat_already_have').show();
				$('#livechat_login').focus();
			}
			else if ($('#choice_account_0').is(':checked'))
			{
				$('#livechat_already_have').hide();
				$('#livechat_new_account').show();

				if ($.trim($('#name').val()).length == 0)
				{
					$('#name').focus();
				}
				else
				{			
					$('#password').focus();
				}
			}
		};

		toggleForms();
		$('#choice_account input').click(toggleForms);
	},

	alreadyHaveAccountForm: function()
	{
        $('#livechat_already_have form').submit(function()
        {
        });


	},

	calculateGMT: function()
	{
		var date, dateGMTString, date2, gmt;

		date = new Date((new Date()).getFullYear(), 0, 1, 0, 0, 0, 0);
		dateGMTString = date.toGMTString();
		date2 = new Date(dateGMTString.substring(0, dateGMTString.lastIndexOf(" ")-1));
		gmt = ((date - date2) / (1000 * 60 * 60)).toString();

		return gmt;
	},

	controlPanelIframe: function()
	{
		var cp = $('#control_panel');
		if (cp.length)
		{
			var cp_resize = function()
			{
				var cp_height = window.innerHeight ? window.innerHeight : $(window).height();
				cp_height -= $('#wphead').height();
				cp_height -= $('#updated-nag').height();
				cp_height -= $('#control_panel + p').height();
				cp_height -= $('#footer').height();
				cp_height -= 70;

				cp.attr('height', cp_height);
			}
			cp_resize();
			$(window).resize(cp_resize);
		}
	},

	fadeChangesSaved: function()
	{
		$cs = $('#changes_saved_info');

		if ($cs.length)
		{
			setTimeout(function()
			{
				$cs.slideUp();
			}, 1000);
		}
	}
};

$(document).ready(function()
{
    Robax.init();
});
})(jQuery);