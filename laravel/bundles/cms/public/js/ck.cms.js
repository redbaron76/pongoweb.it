//PongoCMS v2.0  jQuery CKEDITOR Library
//2012-05-08 - copyright Fabio Fumis - Pongoweb.it

	
$.ck = {

	
	//MARKITUP
	MarkItUp:
	function() {
		//if($('.markitup').length>0) {
			$('.html').markItUp(myHtmlSettings);
		//}
	},

	InsertAtCaret:
	function (areaId,text) {
		var txtarea = document.getElementById(areaId);
		var scrollPos = txtarea.scrollTop;
		var strPos = 0;
		var br = ((txtarea.selectionStart || txtarea.selectionStart == '0') ? 
			"ff" : (document.selection ? "ie" : false ) );
		if (br == "ie") { 
			txtarea.focus();
			var range = document.selection.createRange();
			range.moveStart ('character', -txtarea.value.length);
			strPos = range.text.length;
		}
		else if (br == "ff") strPos = txtarea.selectionStart;
		
		var front = (txtarea.value).substring(0,strPos);  
		var back = (txtarea.value).substring(strPos,txtarea.value.length); 
		txtarea.value=front+text+back;
		strPos = strPos + text.length;
		if (br == "ie") { 
			txtarea.focus();
			var range = document.selection.createRange();
			range.moveStart ('character', -txtarea.value.length);
			range.moveStart ('character', strPos);
			range.moveEnd ('character', 0);
			range.select();
		}
		else if (br == "ff") {
			txtarea.selectionStart = strPos;
			txtarea.selectionEnd = strPos;
			txtarea.focus();
		}
		txtarea.scrollTop = scrollPos;
	},

	//Create CKEDITOR istance on textarea
	CKEditor:
	function() {

		$('textarea.editorck').ckeditor();

	},

	CKInsertText:
	function(text, id) {

		CKEDITOR.instances[id].insertText(text);

	},

	CKInsertHtml:
	function(html, id) {

		CKEDITOR.instances[id].insertHtml(html);

	},

	//TAG DEFINITIONS

	CKHtmlTags:
	function(tag, path, filename) {

		switch (tag) {
			
			case 'img':
				
				return '<img src="'+path+'" />';
				break;

		}

	},

	CKTextTags:
	function(tag, path, filename) {

		switch (tag) {
			
			case 'BACK':
				
				return '[$BACK[]]';
				break;

			case 'BANNER':
				
				return '[$BANNER[{"name":""}]]';
				break;

			case 'CRUMB':
				
				return '[$CRUMB[]]';
				break;

			case 'DOWNLIST':
				
				return '[$DOWNLIST[{"name":""}]]';
				break;
			
			case 'DOWNLOAD':
				
				return '[$DOWNLOAD[{"file":"'+filename+'"}]]';
				break;

			case 'GALLERY':
				
				return '[$GALLERY[{"name":""}]]';
				break;
			
			case 'IMAGE':
				
				return '[$IMAGE[{"file":"'+filename+'", "w":"100", "h":"100", "wm":"true | false"}]]';
				break;

			case 'MAP':
				
				return '[$MAP[{"address":"","zoom":"14"}]]';
				break;

			case 'MENU':
				
				return '[$MENU[{"name":""}]]';
				break;

			case 'MENU_CUSTOM':
				
				return '[$MENU_CUSTOM[{"tpl":""}]]';
				break;

			case 'MENU_SUB':
				
				return '[$MENU_SUB[{"zone":"1"}]]';
				break;

			case 'PREVIEW':
				
				return '[$PREVIEW[{"source":"blogs"}]]';
				break;

			case 'SOCIAL':
				
				return '[$SOCIAL[{"what":"facebook-twitter"}]]';
				break;
			
			case 'THUMB':
				
				return '[$THUMB[{"file":"'+filename+'", "thumb":"thumb"}]]';
				break;

			case 'TRANSLATION':
				
				return '[$TRANSLATION[{"key":"", "style":"lower | upper | capital | allcapital"}]]';
				break;

			case 'VIDEO':
				
				return '[$VIDEO[{"code":"", "site":"youtube | vimeo", "w":"420", "h":"315"}]]';
				break;

		}

	},

	//ACTIONS OnClick

	CKasHtml:
	function() {
		$('.as_html').live('click', function() {

			var $filename = $(this).attr('data-filename');
			var $path = $(this).attr('data-path');
			var $ext = $(this).attr('data-extension');
			var $tag = $(this).attr('data-tag');

			var $val = $.ck.CKHtmlTags($tag, $path, $filename);

			if($('.active textarea.editorck').length>0) {

				var $istance = $('.active textarea.editorck').attr('id');

				$.ck.CKInsertHtml($val, $istance);

			} else {

				$.ck.InsertAtCaret('markitup', $val);

			}

			$('.modal').modal('hide');

			return false;

		});
	},

	CKasText:
	function() {
		$('.as_text').live('click', function() {

			var $filename = $(this).attr('data-filename');
			var $path = $(this).attr('data-path');
			var $ext = $(this).attr('data-extension');
			var $tag = $(this).attr('data-tag');

			var $val = $.ck.CKTextTags($tag, $path, $filename);

			if($('.active textarea.editorck').length>0) {

				var $istance = $('.active textarea.editorck').attr('id');

				$.ck.CKInsertText($val, $istance);

			} else {

				$.ck.InsertAtCaret('markitup', $val);

			}

			$('.modal').modal('hide');

			return false;

		});
	},
}