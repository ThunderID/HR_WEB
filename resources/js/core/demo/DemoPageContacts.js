(function(namespace, $) {
	"use strict";

	var DemoPageContacts = function() {
		// Create reference to this instance
		var o = this;
		// Initialize app when document is ready
		$(document).ready(function() {
			o.initialize();
		});

	};
	var p = DemoPageContacts.prototype;

	// =========================================================================
	// MEMBERS
	// =========================================================================

	p.map = null;

	// =========================================================================
	// INIT
	// =========================================================================

	p.initialize = function() {
		this._initDuplicateSource();
		this._initSummernote();
		this._initDatetime();
		this._initMultiselect();
	};

	// =========================================================================
	// DUPLICATE
	// =========================================================================

	p._initDuplicateSource = function(e) {
		var o = this;

		// Add event lsitener for duplication
		$('[data-duplicate]').on('click', function(e) {
			var item = $(this);
			var templateId = item.data('duplicate');
			var target = $(item.data('target'));
			o._duplicateTemplate(templateId, target);
		});

		// Init dulicate function
		$('[data-duplicate]').each(function() {
			var item = $(this);
			var templateId = item.data('duplicate');
			var target = $(item.data('target'));
			o._duplicateTemplate(templateId, target);
		});
	};

	p._duplicateTemplate = function(templateId, target) {
		if (typeof tmpl === 'undefined') {
			return;
		}
		var o = this;

		var index = (target.data('index') > 0) ? target.data('index') : target.children().length + 1;
		target.data('index', index + 1);
		var clonedContent = tmpl(templateId, {index: index});

		// Add cloned source to parent
		var newContent = $(clonedContent).appendTo(target).hide().slideDown('fast');

		// Init date component
		this._initDatetime(newContent, index);

		// Add delete event
		newContent.on('click', '.btn-delete', function(e) {
			newContent.slideUp('fast', function() {
				newContent.remove();
			});
		});
	};

	// =========================================================================
	// SUMMERNOTE EDITOR
	// =========================================================================

	p._initSummernote = function() {
		if (!$.isFunction($.fn.summernote)) {
			return;
		}
		if ($('#summernote').length === 0) {
			return;
		}
		
		$('#summernote').summernote({
			height: $('#summernote').height(),
			toolbar: [
				['style', ['bold', 'italic', 'underline', 'clear']],
				['fontsize', ['fontsize']],
				['color', ['color']],
				['para', ['ul', 'ol', 'paragraph']],
				['height', ['height']]
			]
		});
	};

	// =========================================================================
	// MULTISELECT
	// =========================================================================

	p._initMultiselect = function() {
		if (!$.isFunction($.fn.multiselect)) {
			return;
		}

		$('select[name="category"]').multiselect({
			buttonClass: 'form-control',
			buttonContainer: '<div class="btn-group btn-group-justified" />'
		});
	};

	// =========================================================================
	// DATETIME
	// =========================================================================

	p._initDatetime = function() {
		if (!$.isFunction($.fn.datepicker)) {
			return;
		}

		$('.input-daterange').datepicker({todayHighlight: true});
	};

	// =========================================================================
	namespace.DemoPageContacts = new DemoPageContacts;
}(this.materialadmin, jQuery)); // pass in (namespace, jQuery):
