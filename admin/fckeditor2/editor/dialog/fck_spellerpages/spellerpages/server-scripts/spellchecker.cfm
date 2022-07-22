<cfsetting enablecfoutputonly="true">
<!---
This code uses a CF User Defined Function and should work in CF version 5.0
and up without alteration.

Also if you are hosting your site at an ISP, you will have to check with them
to see if the use of <CFEXECUTE> is allowed. In most cases ISP will not allow
the use of that tag for security reasons. Clients would be able to access each
others files in certain cases.
--->

<!--- The following variables values must reflect your installation. --->
<cfset aspell_dir	  = "C:\Program Files\Aspell\bin">
<cfset lang         = "en_US">
<cfset aspell_opts  = "-a --lang=#lang# --encoding=utf-8 -H --rem-sgml-check=alt">
<cfset tempfile_in  = GetTempFile(GetTempDirectory(), "spell_")>
<cfset tempfile_out = GetTempFile(GetTempDirectory(), "spell_")>
<cfset spellercss   = "../spellerStyle.css">
<cfset word_win_src = "../wordWindow.js">

<cfset form.checktext = form["textinputs[]"]>

<!--- make no difference between URL and FORM scopes --->
<cfparam name="url.checktext"  default="">
<cfparam name="form.checktext" default="#url.checktext#">

<!--- Takes care of those pesky smart quotes from MS apps, replaces them with regular quotes --->
<cfset submitted_text = ReplaceList(form.checktext,"%u201C,%u201D","%22,%22")>

<!--- submitted_text now is ready for processing --->

<!--- use carat on each line to escape possible aspell commands --->
<cfset text = "">
<cfset CRLF = Chr(13) & Chr(10)>

<cfloop list="#submitted_text#" index="field" delimiters=",">
	<cfset text = text & "%"  & CRLF
                      & "^A" & CRLF
                      & "!"  & CRLF>
	<!--- Strip all tags for the text. (by FredCK - #339 / #681) --->
	<cfset field = REReplace(URLDecode(field), "<[^>]+>", " ", "all")>
	<cfloop list="#field#" index="line" delimiters="#CRLF#">
		<cfset text = ListAppend(text, "^" & Trim(JSStringFormat(line)), CRLF)>
	</cfloop>
</cfloop>

<!--- create temp file from the submitted text, this will be passed to aspell to be check for misspelled words --->
<cffile action="write" file="#tempfile_in#" output="#text#" charset="utf-8">

<!--- execute aspell in an UTF-8 console and redirect output to a file. UTF-8 encoding is lost if done differently --->
<cfexecute name="cmd.exe" arguments='/c type "#tempfile_in#" | "#aspell_dir#\aspell.exe" #aspell_opts# > "#tempfile_out#"' timeout="100"/>

<!--- read output file for further processing --->
<cffile action="read" file="#tempfile_out#" variable="food" charset="utf-8">

<!--- remove temp files --->
<cffile action="delete" file="#tempfile_in#">
<cffile action="delete" file="#tempfile_out#">

<cfset texts = StructNew()>
<cfset texts.textinputs = "">
<cfset texts.words      = "">
<cfset texts.abort      = "">

<!--- Generate Text Inputs --->
<cfset i = 0>
<cfloop list="#submitted_text#" index="textinput">
  <cfset texts.te