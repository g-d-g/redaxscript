/**
 * @tableofcontents
 *
 * 1. ace
 * 2. init
 *
 * @since 2.6.0
 *
 * @package Redaxscript
 * @author Henry Ruhs
 */

(function ($, ace)
{
	'use strict';

	/* @section 1. ace */

	$.fn.ace = function (options)
	{
		/* extend options */

		if (rs.modules.ace.options !== options)
		{
			options = $.extend({}, rs.modules.ace.options, options || {});
		}

		/* return this */

		return this.each(function ()
		{
			var textarea = $(this),
				container = $('<div>').attr('id', 'editor').insertBefore(textarea),
				editor = ace.edit('editor');

			textarea.hide();
			container.parent().addClass(options.className.hasAceEditor);

			/* theme and mode */

			editor.setTheme(options.theme);
			editor.getSession().setMode(options.mode);

			/* infinity lines */

			editor.setOptions(
			{
				maxLines: Infinity
			});

			/* transport to editor */

			editor.getSession().setValue(textarea.val());

			/* listen for change */

			editor.getSession().on('change', function ()
			{
				textarea.val(editor.getSession().getValue());
			});
		});
	};

	/* @section 2. init */

	$(function ()
	{
		if (rs.modules.ace.init && rs.modules.ace.dependency)
		{
			$(rs.modules.ace.selector).ace(rs.modules.ace.options);

			/* disable editor */

			rs.modules.editor = false;
		}
	});
})(window.jQuery || window.Zepto, window.ace);
