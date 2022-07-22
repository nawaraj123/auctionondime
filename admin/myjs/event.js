window.addEvent('domready', function(){ new Accordion($$('.panel h3.jpane-toggler'), $$('.panel div.jpane-slider'), {onActive: function(toggler, i) { toggler.addClass('jpane-toggler-down'); toggler.removeClass('jpane-toggler'); },onBackground: function(toggler, i) { toggler.addClass('jpane-toggler'); toggler.removeClass('jpane-toggler-down'); },duration: 300,opacity: false,alwaysHide: true}); });
		window.addEvent('domready', function(){ var JTooltips = new Tips($$('.hasTip'), { maxTitleChars: 50, fixed: false}); });
		window.addEvent('domready', function() {

			SqueezeBox.initialize({});

			$$('a.modal-button').each(function(el) {
				el.addEvent('click', function(e) {
					new Event(e).stop();
					SqueezeBox.fromElement(el);
				});
			});
		});
function jInsertEditorText( text, editor ) {
			tinyMCE.execInstanceCommand(editor, 'mceInsertContent',false,text);
		}
		window.addEvent('domready', function() {

			SqueezeBox.initialize({});

			$$('a.modal').each(function(el) {
				el.addEvent('click', function(e) {
					new Event(e).stop();
					SqueezeBox.fromElement(el);
				});
			});
		});
			function insertReadmore(editor) {
				var content = tinyMCE.getContent();
				if (content.match(/<hr\s+id=("|')system-readmore("|')\s*\/*>/i)) {
					alert('There is already a Read more... link that has been inserted. Only one such link is permitted. Use {pagebreak} to split the page up further.');
					return false;
				} else {
					jInsertEditorText('<hr id="system-readmore" />', editor);
				}
			}
			
Calendar._DN = new Array ("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");Calendar._SDN = new Array ("Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"); Calendar._FD = 0;	Calendar._MN = new Array ("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");	Calendar._SMN = new Array ("Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec");Calendar._TT = {};Calendar._TT["INFO"] = "About the Calendar";
 		Calendar._TT["ABOUT"] =
 "DHTML Date/Time Selector\n" +
 "(c) dynarch.com 2002-2005 / Author: Mihai Bazon\n" +
"For latest version visit: http://www.dynarch.com/projects/calendar/\n" +
"Distributed under GNU LGPL.  See http://gnu.org/licenses/lgpl.html for details." +
"\n\n" +
"Date selection:\n" +
"- Use the \xab, \xbb buttons to select year\n" +
"- Use the " + String.fromCharCode(0x2039) + ", " + String.fromCharCode(0x203a) + " buttons to select month\n" +
"- Hold mouse button on any of the above buttons for faster selection.";
Calendar._TT["ABOUT_TIME"] = "\n\n" +
"Time selection:\n" +
"- Click on any of the time parts to increase it\n" +
"- or Shift-click to decrease it\n" +
"- or click and drag for faster selection.";

		Calendar._TT["PREV_YEAR"] = "Click to move to the previous year. Click and hold for a list of years.";Calendar._TT["PREV_MONTH"] = "Click to move to the previous month. Click and hold for a list of the months.";	Calendar._TT["GO_TODAY"] = "Go to today";Calendar._TT["NEXT_MONTH"] = "Click to move to the next month. Click and hold for a list of the months.";Calendar._TT["NEXT_YEAR"] = "Click to move to the next year. Click and hold for a list of years.";Calendar._TT["SEL_DATE"] = "Select a date.";Calendar._TT["DRAG_TO_MOVE"] = "Drag to move";Calendar._TT["PART_TODAY"] = " (Today)";Calendar._TT["DAY_FIRST"] = "Display %s first";Calendar._TT["WEEKEND"] = "0,6";Calendar._TT["CLOSE"] = "Close";Calendar._TT["TODAY"] = "Today";Calendar._TT["TIME_PART"] = "(Shift-)Click or Drag to change the value.";Calendar._TT["DEF_DATE_FORMAT"] = "%Y-%M-%D"; Calendar._TT["TT_DATE_FORMAT"] = "%A, %B %e";Calendar._TT["WK"] = "wk";Calendar._TT["TIME"] = "Time:";
window.addEvent('domready', function() {Calendar.setup({
        inputField     :    "detailscreated",     // id of the input field
        ifFormat       :    "%Y-%m-%d",      // format of the input field
        button         :    "detailscreated_img",  // trigger for the calendar (button ID)
        align          :    "Tl",           // alignment (defaults to "Bl")
        singleClick    :    true
    });});
window.addEvent('domready', function() {Calendar.setup({
        inputField     :    "detailspublish_up",     // id of the input field
        ifFormat       :    "%Y-%m-%d",      // format of the input field
        button         :    "detailspublish_up_img",  // trigger for the calendar (button ID)
        align          :    "Tl",           // alignment (defaults to "Bl")
        singleClick    :    true
    });});
window.addEvent('domready', function() {Calendar.setup({
        inputField     :    "detailspublish_down",     // id of the input field
        ifFormat       :    "%Y-%m-%d",      // format of the input field
        button         :    "detailspublish_down_img",  // trigger for the calendar (button ID)
        align          :    "Tl",           // alignment (defaults to "Bl")
        singleClick    :    true
    });});
function keepAlive( ) {	var myAjax = new Ajax( "index.php", { method: "get" } ).request();} window.addEvent("domready", function(){ keepAlive.periodical(840000 ); });
  </script>
  <script type="text/javascript" src="http://localhost/Joomla! 1.5.8 Content manager for easy installation and configuration/plugins/editors/tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
	<script type="text/javascript">
			tinyMCE.init({
			theme : "advanced",
			language : "en",
			mode : "textareas",
			gecko_spellcheck : "true",
			editor_selector : "mce_editable",
			document_base_url : "http://localhost/Joomla! 1.5.8 Content manager for easy installation and configuration/",
			entities : "60,lt,62,gt",
			relative_urls : 1,
			remove_script_host : false,
			save_callback : "TinyMCE_Save",
			invalid_elements : "applet",
			extended_valid_elements : "a[class|name|href|target|title|onclick|rel],img[class|src|border=0|alt|title|hspace|vspace|width|height|align|onmouseover|onmouseout|name],,hr[id|title|alt|class|width|size|noshade]",
			theme_advanced_toolbar_location : "top",
			theme_advanced_source_editor_height : "550",
			theme_advanced_source_editor_width : "750",
			directionality: "ltr",
			force_br_newlines : "false",
			force_p_newlines : "true",
			content_css : "http://localhost/Joomla! 1.5.8 Content manager for easy installation and configuration/templates/system/css/editor.css",
			debug : false,
			cleanup : true,
			cleanup_on_startup : false,
			safari_warning : false,
			plugins : "advlink, advimage, searchreplace,insertdatetime,emotions,media,advhr,table,fullscreen,directionality,layer,style",
			theme_advanced_buttons1_add : "fontselect",
			theme_advanced_buttons2_add : "search,replace,insertdate,inserttime,emotions,media,ltr,rtl,insertlayer,moveforward,movebackward,absolute,forecolor",
			theme_advanced_buttons3_add : "advhr,tablecontrols,fullscreen,styleprops",
			theme_advanced_disable : "help",
			plugin_insertdate_dateFormat : "%Y-%m-%d",
			plugin_insertdate_timeFormat : "%H:%M:%S",
			
			
			fullscreen_settings : {
				theme_advanced_path_location : "top"
			}
		});
		function TinyMCE_Save(editor_id, content, node)
		{
			base_url = tinyMCE.settings['document_base_url'];
			var vHTML = content;
			if (true == true){
				vHTML = tinyMCE.regexpReplace(vHTML, 'href\s*=\s*"?'+base_url+'', 'href="', 'gi');
				vHTML = tinyMCE.regexpReplace(vHTML, 'src\s*=\s*"?'+base_url+'', 'src="', 'gi');
				vHTML = tinyMCE.regexpReplace(vHTML, 'mce_real_src\s*=\s*"?', '', 'gi');
				vHTML = tinyMCE.regexpReplace(vHTML, 'mce_real_href\s*=\s*"?', '', 'gi');
			}
			return vHTML;
		}// JavaScript Document