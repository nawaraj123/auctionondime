<!doctype html>
<html id="ng-app" ng-app="anetBoarding">
<head runat="server">
    <title></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="/activation/Content/css/boarding?v=HP1vSzqfsu614UDXVYdN3R1ZiL4IjHRbfquG3h-JSSQ1" rel="stylesheet"/>

    <script src="/activation/bundles/boarding?v=tQCs39VJvHikDgZvBMlCAkVJZOuaVxhqwVUeVfb6PlE1"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
        <script src="/activation/content/Activation/js/html5shiv.js" type="text/javascript"></script>
        <script src="/activation/content/Activation/js/respond.min.js" type="text/javascript"></script>
    <![endif]-->
    <!-- JSON is not supported in IE7 and below -->
    <!--[if lt IE 8]>
        <script src="/activation/content/Activation/js/json3.min.js" type="text/javascript"></script>
    <![endif]-->
</head>
<body>
    <div id="wrap">
        <div class="navbar navbar-inverse" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <img alt="Authorize.Net Logo" longdesc="Authorize.Net Logo" src="/activation/Content/Activation/images/Logo-White.png" />
                </div>
            </div>
        </div>
        
    <div class="container" role="main" ng-controller="SignupControl">
        <div class="page-header">
            <h1>Online Payment Services Application</h1>
        </div>
        <h3>
            Help us understand your business by answering the questions below.
        </h3>
        <p>You must be a business owner or authorized representative of a business.</p>
<form action="/activation/Boarding" class="form-horizontal" method="post">            <div>
                
<div class="row">
    <div class="col-md-12">
        <fieldset>
            <legend>My Information</legend>
            <div class="form-group">
                <label class="col-sm-3 control-label">Name:</label>
                <div class="col-sm-4">
                    <input autocomplete="off" class="form-control" data-val="true" data-val-length="The field FirstName must be a string with a maximum length of 19." data-val-length-max="19" data-val-regex="Must only contain letters" data-val-regex-pattern="[\u00C0-\u00D6\u00D8-\u00F6\u00F8-\u01FF\u00C0-\u00D6\u00D8-\u00F6\u00F8-\u01FFa-zA-Z().\-_#,;/\\@$:&amp;amp;!?%\u00AB\u00BB\u20AC\u20A3\u00AB\u00BB\u20AC\u20A3 ]{1,}$" data-val-required="Required" id="OwnerInfo_FirstName" maxlength="19" name="OwnerInfo.FirstName" placeholder="First" type="text" value="" />
                    <span class="field-validation-valid" data-valmsg-for="OwnerInfo.FirstName" data-valmsg-replace="true"></span>
                </div>                
                <div class="col-sm-3">
                    <input autocomplete="off" class="form-control" data-val="true" data-val-length="The field LastName must be a string with a maximum length of 19." data-val-length-max="19" data-val-regex="Must only contain letters" data-val-regex-pattern="[\u00C0-\u00D6\u00D8-\u00F6\u00F8-\u01FF\u00C0-\u00D6\u00D8-\u00F6\u00F8-\u01FFa-zA-Z().\-_#,;/\\@$:&amp;amp;!?%\u00AB\u00BB\u20AC\u20A3\u00AB\u00BB\u20AC\u20A3 ]{1,}$" data-val-required="Required" id="OwnerInfo_LastName" maxlength="19" name="OwnerInfo.LastName" placeholder="Last" type="text" value="" />
                    <span class="field-validation-valid" data-valmsg-for="OwnerInfo.LastName" data-valmsg-replace="true"></span>
                </div>
                <div class="col-sm-2 info">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Email Address:</label>
                <div class="col-sm-4">
                    <input autocomplete="off" class="form-control" data-val="true" data-val-length="The field EmailAddress must be a string with a maximum length of 255." data-val-length-max="255" data-val-regex="Email address is invalid" data-val-regex-pattern="\w+([-+.]\w+)*@\w+([-.]\w+)*\.[a-zA-Z]{2,}" data-val-required="Required" id="OwnerInfo_EmailAddress" maxlength="255" name="OwnerInfo.EmailAddress" placeholder="bob@example.com" type="text" value="" />
                    <span class="field-validation-valid" data-valmsg-for="OwnerInfo.EmailAddress" data-valmsg-replace="true"></span>
                </div>
                <div id="ownerPhone">
                        
    <label class="col-sm-1 control-label">Mobile:</label>
    <div class="col-sm-2">
<input id="OwnerInfo__1__s_-__s___02-9__0-9__0-9_____s__d_3__s_____s_-__s__d_3__s_-__s__d_4__" name="OwnerInfo.^1?\s*-?\s*([02-9][0-9][0-9]|\(\s*\d{3}\s*\))\s*-?\s*\d{3}\s*-?\s*\d{4}$" type="hidden" value="" /><input autocomplete="off" class="form-control" data-val="true" data-val-length="The field Phone is invalid." data-val-length-max="20" data-val-regex="Phone is not in a valid format" data-val-regex-pattern="^1?\s*-?\s*([02-9][0-9][0-9]|\(\s*\d{3}\s*\))\s*-?\s*\d{3}\s*-?\s*\d{4}$" data-val-required="Required" id="OwnerInfo_Phone" maxlength="20" name="OwnerInfo.Phone" placeholder="425-555-5555" type="text" value="" /><span class="field-validation-valid" data-valmsg-for="OwnerInfo.Phone" data-valmsg-replace="true"></span>
    </div>


                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Country:</label>
                <div class="col-sm-4">
                    <select class="form-control" data-val="true" data-val-regex="Required" data-val-regex-pattern="[a-zA-Z][a-zA-Z]" data-val-required="Required" id="OwnerInfo_Country" name="OwnerInfo.Country"><option selected="selected" value="US">United States of America</option>
<option value="CA">Canada</option>
</select>
                    <span class="field-validation-valid" data-valmsg-for="OwnerInfo.Country" data-valmsg-replace="true"></span>
                </div>
            </div>
            <div id="ownerAddress">
                
<div class="form-group ">
    <label class="col-sm-3 control-label">Address:</label>
    <div class="col-sm-7">
<input id="OwnerInfo____u00C0-_u00D6_u00D8-_u00F6_u00F8-_u01FFa-zA-Z0-9____-_______:_____1___" name="OwnerInfo.^[\u00C0-\u00D6\u00D8-\u00F6\u00F8-\u01FFa-zA-Z0-9().\-_#,;/@$:!% ]{1,}$" type="hidden" value="" /><input autocomplete="off" class="form-control" data-val="true" data-val-length="The field Address is invalid." data-val-length-max="60" data-val-regex="Address is not Alpha Numeric" data-val-regex-pattern="^[\u00C0-\u00D6\u00D8-\u00F6\u00F8-\u01FFa-zA-Z0-9().\-_#,;/@$:!% ]{1,}$" data-val-required="Required" id="OwnerInfo_Address1" maxlength="100" name="OwnerInfo.Address1" placeholder="Street" type="text" value="" /><span class="field-validation-valid" data-valmsg-for="OwnerInfo.Address1" data-valmsg-replace="true"></span>
    </div>
</div>
<div class="form-group ">
    <div class="col-sm-3 control-label"></div>
    <div class="col-sm-3">
<input id="OwnerInfo____u00C0-_u00D6_u00D8-_u00F6_u00F8-_u01FFa-zA-Z0-9____-_______:_____1___" name="OwnerInfo.^[\u00C0-\u00D6\u00D8-\u00F6\u00F8-\u01FFa-zA-Z0-9().\-_#,;/@$:!% ]{1,}$" type="hidden" value="" /><input autocomplete="off" class="form-control" data-val="true" data-val-length="The field City is invalid." data-val-length-max="40" data-val-regex="City is not Alpha Numeric" data-val-regex-pattern="^[\u00C0-\u00D6\u00D8-\u00F6\u00F8-\u01FFa-zA-Z0-9().\-_#,;/@$:!% ]{1,}$" data-val-required="Required" id="OwnerInfo_City" maxlength="40" name="OwnerInfo.City" placeholder="City" type="text" value="" /><span class="field-validation-valid" data-valmsg-for="OwnerInfo.City" data-valmsg-replace="true"></span>
    </div>
    <div class="col-sm-2">
<select class="form-control" data-val="true" data-val-length="The field State is invalid." data-val-length-max="40" data-val-regex="State is not in a valid format" data-val-regex-pattern="^[\u00C0-\u00D6\u00D8-\u00F6\u00F8-\u01FFa-zA-Z0-9().\-_#,;/@$:!% ]{1,}$" data-val-required="Required" id="OwnerInfo_State" name="OwnerInfo.State"><option value="">--State--</option>
<option value="AA">AA</option>
<option value="AE">AE</option>
<option value="AK">AK</option>
<option value="AL">AL</option>
<option value="AP">AP</option>
<option value="AR">AR</option>
<option value="AS">AS</option>
<option value="AZ">AZ</option>
<option value="CA">CA</option>
<option value="CO">CO</option>
<option value="CT">CT</option>
<option value="DC">DC</option>
<option value="DE">DE</option>
<option value="FL">FL</option>
<option value="FM">FM</option>
<option value="GA">GA</option>
<option value="GU">GU</option>
<option value="HI">HI</option>
<option value="IA">IA</option>
<option value="ID">ID</option>
<option value="IL">IL</option>
<option value="IN">IN</option>
<option value="KS">KS</option>
<option value="KY">KY</option>
<option value="LA">LA</option>
<option value="MA">MA</option>
<option value="MD">MD</option>
<option value="ME">ME</option>
<option value="MH">MH</option>
<option value="MI">MI</option>
<option value="MN">MN</option>
<option value="MO">MO</option>
<option value="MP">MP</option>
<option value="MS">MS</option>
<option value="MT">MT</option>
<option value="NC">NC</option>
<option value="ND">ND</option>
<option value="NE">NE</option>
<option value="NH">NH</option>
<option value="NJ">NJ</option>
<option value="NM">NM</option>
<option value="NV">NV</option>
<option value="NY">NY</option>
<option value="OH">OH</option>
<option value="OK">OK</option>
<option value="OR">OR</option>
<option value="PA">PA</option>
<option value="PR">PR</option>
<option value="PW">PW</option>
<option value="RI">RI</option>
<option value="SC">SC</option>
<option value="SD">SD</option>
<option value="TN">TN</option>
<option value="TX">TX</option>
<option value="UT">UT</option>
<option value="VA">VA</option>
<option value="VI">VI</option>
<option value="VT">VT</option>
<option value="WA">WA</option>
<option value="WI">WI</option>
<option value="WV">WV</option>
<option value="WY">WY</option>
</select><span class="field-validation-valid" data-valmsg-for="OwnerInfo.State" data-valmsg-replace="true"></span>
    </div>
    <div class="col-sm-2">
<input id="OwnerInfo____d_5_______d_5_-_d_4___" name="OwnerInfo.(^\d{5}$)|(^\d{5}-\d{4}$)" type="hidden" value="" /><input autocomplete="off" class="form-control" data-val="true" data-val-length="The field Postal Code is invalid." data-val-length-max="10" data-val-regex="Zip is not in a valid format" data-val-regex-pattern="(^\d{5}$)|(^\d{5}-\d{4}$)" data-val-required="Required" id="OwnerInfo_Zip" maxlength="20" name="OwnerInfo.Zip" placeholder="Zip" type="text" value="" /><span class="field-validation-valid" data-valmsg-for="OwnerInfo.Zip" data-valmsg-replace="true"></span>
    </div>
</div>


            </div>
            <div class="form-group" ng-if="gatewayOnly">
                <label class="col-sm-3 control-label" id="ssnLabel">SSN (last 4 digits):</label>
                <div class="col-sm-1">
                    <input autocomplete="off" class="form-control" data-val="true" data-val-regex="Must be 4 digits" data-val-regex-pattern="^\d{4,4}$" data-val-required="Required" id="OwnerInfo_SSN" maxlength="4" name="OwnerInfo.SSN" placeholder="" type="text" value="" />
                </div>
                <div class="col-sm-6 info">
                        <img class="hoverTip" src="/activation/Content/Activation/images/info.png" alt="Info" />
                    <div class="hiddenTip" id="ssnInfo">
                        Please enter the last four digits of your Social Security Number, for security puposes.
                    </div>
                    <span class="field-validation-valid" data-valmsg-for="OwnerInfo.SSN" data-valmsg-replace="true"></span>
                </div><br/>
            </div>
        </fieldset>
    </div>
</div>
</div>
            <div>
                
<div class="row">
    <div class="col-md-12">
        <fieldset>
            <legend>Business Information</legend>
            <div class="form-group">
                <div class="col-sm-3 control-label"></div>
                <div class="col-sm-5">
                    <div class="checkbox">
                        <input id="BusinessInfo_SameAsOwnerAddress" name="BusinessInfo.SameAsOwnerAddress" text="Use My Address for Business" type="checkbox" value="true" /><input name="BusinessInfo.SameAsOwnerAddress" type="hidden" value="false" />
                        Use My Address for Business
                    </div>
                </div>
            </div>
            <div class="form-group businessAddress">
                <label class="col-sm-3 control-label">Business Location:</label>
                <div class="col-sm-4">
                    <select class="form-control" data-val="true" data-val-regex="Required" data-val-regex-pattern="[a-zA-Z][a-zA-Z]" data-val-required="Required" id="BusinessInfo_Country" name="BusinessInfo.Country"><option selected="selected" value="US">United States of America</option>
<option value="CA">Canada</option>
</select>
                    <span class="field-validation-valid" data-valmsg-for="BusinessInfo.Country" data-valmsg-replace="true"></span>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Business Name:</label>
                <div class="col-sm-4">
                    <input autocomplete="off" class="form-control" data-val="true" data-val-length="The field Business Name must be a string with a maximum length of 255." data-val-length-max="255" data-val-regex="Must be Alpha Numeric or  ().-_#,;/\@$:&amp;!?%" data-val-regex-pattern="[\u00C0-\u00D6\u00D8-\u00F6\u00F8-\u01FF\u00C0-\u00D6\u00D8-\u00F6\u00F8-\u01FFa-zA-Z0-9().\-_#,;/\\@$:&amp;amp;!?%\u00AB\u00BB\u20AC\u20A3\u00AB\u00BB\u20AC\u20A3 ]{1,}$" data-val-required="Required" id="BusinessInfo_CompanyName" maxlength="255" name="BusinessInfo.CompanyName" ng-focus="sendToOapEloqua();" placeholder="Business Name" type="text" value="" />
                    <span class="field-validation-valid" data-valmsg-for="BusinessInfo.CompanyName" data-valmsg-replace="true"></span>
                </div>
                <div class="col-sm-3">
                    <select class="form-control" data-val="true" data-val-regex="Must be Alpha Numeric or  ().-_#,;/\@$:&amp;!?%" data-val-regex-pattern="[\u00C0-\u00D6\u00D8-\u00F6\u00F8-\u01FF\u00C0-\u00D6\u00D8-\u00F6\u00F8-\u01FFa-zA-Z0-9().\-_#,;/\\@$:&amp;amp;!?%\u00AB\u00BB\u20AC\u20A3\u00AB\u00BB\u20AC\u20A3 ]{1,}$" data-val-required="Required" id="BusinessInfo_BusinessType" name="BusinessInfo.BusinessType"><option value="">-- Select Business Type --</option>
<option selected="selected" value="SoleProprietorShip">Sole Proprietorship</option>
<option value="PartnetShip">Partnership</option>
<option value="Corporation">Corporation or LLC</option>
<option value="NonProfit">Non-Profit</option>
<option value="Trust">Trust</option>
</select>
                    <span class="field-validation-valid" data-valmsg-for="BusinessInfo.BusinessType" data-valmsg-replace="true"></span>                    
                </div>
                <div class="col-sm-2 info">
                </div>
            </div>
            <div class="form-group" ng-if="!gatewayOnly">
                <label class="col-sm-3 control-label">DBA:</label>
                <div class="col-sm-4">
                    <input autocomplete="off" class="form-control" data-val="true" data-val-length="The field DoingBusinessAs must be a string with a maximum length of 60." data-val-length-max="60" data-val-regex="Must be Alpha Numeric or  ().-_#,;/\@$:&amp;!?%" data-val-regex-pattern="[\u00C0-\u00D6\u00D8-\u00F6\u00F8-\u01FF\u00C0-\u00D6\u00D8-\u00F6\u00F8-\u01FFa-zA-Z0-9().\-_#,;/\\@$:&amp;amp;!?%\u00AB\u00BB\u20AC\u20A3\u00AB\u00BB\u20AC\u20A3 ]{1,}$" data-val-required="Required" id="BusinessInfo_DoingBusinessAs" maxlength="60" name="BusinessInfo.DoingBusinessAs" type="text" value="" />
                    <span class="field-validation-valid" data-valmsg-for="BusinessInfo.DoingBusinessAs" data-valmsg-replace="true"></span>
                </div>
                <div class="col-sm-1 info">
                    <img class="hoverTip" src="/activation/Content/Activation/images/info.png" alt="Info" />
                    <div class="hiddenTip" id="dbaInfo">
                        The DBA is the name that consumers will see on their credit card bill and is the legal name that refers to your business.
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Website URL:</label>
                <div class="col-sm-4">
                    <input autocomplete="off" class="form-control" data-val="true" data-val-length="The field WebSiteUrl must be a string with a maximum length of 255." data-val-length-max="255" data-val-regex="URL is invalid" data-val-regex-pattern="[\u00C0-\u00D6\u00D8-\u00F6\u00F8-\u01FF\u00C0-\u00D6\u00D8-\u00F6\u00F8-\u01FFa-zA-Z0-9.\-_~#,;/\\@$:&amp;amp;?!\+=\u00AB\u00BB\u20AC\u20A3\u00AB\u00BB\u20AC\u20A3]{1,}$" data-val-required="Required" id="BusinessInfo_WebSiteUrl" maxlength="255" name="BusinessInfo.WebSiteUrl" placeholder="http://example.com" type="text" value="" />
                    <span class="field-validation-valid" data-valmsg-for="BusinessInfo.WebSiteUrl" data-valmsg-replace="true"></span>
                </div>
                <div id="businessPhone">
                        
    <label class="col-sm-1 control-label">Phone:</label>
    <div class="col-sm-2">
<input id="BusinessInfo__1__s_-__s___02-9__0-9__0-9_____s__d_3__s_____s_-__s__d_3__s_-__s__d_4__" name="BusinessInfo.^1?\s*-?\s*([02-9][0-9][0-9]|\(\s*\d{3}\s*\))\s*-?\s*\d{3}\s*-?\s*\d{4}$" type="hidden" value="" /><input autocomplete="off" class="form-control" data-val="true" data-val-length="The field Phone is invalid." data-val-length-max="20" data-val-regex="Phone is not in a valid format" data-val-regex-pattern="^1?\s*-?\s*([02-9][0-9][0-9]|\(\s*\d{3}\s*\))\s*-?\s*\d{3}\s*-?\s*\d{4}$" data-val-required="Required" id="BusinessInfo_Phone" maxlength="20" name="BusinessInfo.Phone" placeholder="425-555-5555" type="text" value="" /><span class="field-validation-valid" data-valmsg-for="BusinessInfo.Phone" data-valmsg-replace="true"></span>
    </div>


                </div>
            </div>
            <div id="businessAddress">
                
<div class="form-group businessAddress">
    <label class="col-sm-3 control-label">Business Address:</label>
    <div class="col-sm-7">
<input id="BusinessInfo____u00C0-_u00D6_u00D8-_u00F6_u00F8-_u01FFa-zA-Z0-9____-_______:_____1___" name="BusinessInfo.^[\u00C0-\u00D6\u00D8-\u00F6\u00F8-\u01FFa-zA-Z0-9().\-_#,;/@$:!% ]{1,}$" type="hidden" value="" /><input autocomplete="off" class="form-control" data-val="true" data-val-length="The field Address is invalid." data-val-length-max="60" data-val-regex="Address is not Alpha Numeric" data-val-regex-pattern="^[\u00C0-\u00D6\u00D8-\u00F6\u00F8-\u01FFa-zA-Z0-9().\-_#,;/@$:!% ]{1,}$" data-val-required="Required" id="BusinessInfo_Address1" maxlength="100" name="BusinessInfo.Address1" placeholder="Street" type="text" value="" /><span class="field-validation-valid" data-valmsg-for="BusinessInfo.Address1" data-valmsg-replace="true"></span>
    </div>
</div>
<div class="form-group businessAddress">
    <div class="col-sm-3 control-label"></div>
    <div class="col-sm-3">
<input id="BusinessInfo____u00C0-_u00D6_u00D8-_u00F6_u00F8-_u01FFa-zA-Z0-9____-_______:_____1___" name="BusinessInfo.^[\u00C0-\u00D6\u00D8-\u00F6\u00F8-\u01FFa-zA-Z0-9().\-_#,;/@$:!% ]{1,}$" type="hidden" value="" /><input autocomplete="off" class="form-control" data-val="true" data-val-length="The field City is invalid." data-val-length-max="40" data-val-regex="City is not Alpha Numeric" data-val-regex-pattern="^[\u00C0-\u00D6\u00D8-\u00F6\u00F8-\u01FFa-zA-Z0-9().\-_#,;/@$:!% ]{1,}$" data-val-required="Required" id="BusinessInfo_City" maxlength="40" name="BusinessInfo.City" placeholder="City" type="text" value="" /><span class="field-validation-valid" data-valmsg-for="BusinessInfo.City" data-valmsg-replace="true"></span>
    </div>
    <div class="col-sm-2">
<select class="form-control" data-val="true" data-val-length="The field State is invalid." data-val-length-max="40" data-val-regex="State is not in a valid format" data-val-regex-pattern="^[\u00C0-\u00D6\u00D8-\u00F6\u00F8-\u01FFa-zA-Z0-9().\-_#,;/@$:!% ]{1,}$" data-val-required="Required" id="BusinessInfo_State" name="BusinessInfo.State"><option value="">--State--</option>
<option value="AA">AA</option>
<option value="AE">AE</option>
<option value="AK">AK</option>
<option value="AL">AL</option>
<option value="AP">AP</option>
<option value="AR">AR</option>
<option value="AS">AS</option>
<option value="AZ">AZ</option>
<option value="CA">CA</option>
<option value="CO">CO</option>
<option value="CT">CT</option>
<option value="DC">DC</option>
<option value="DE">DE</option>
<option value="FL">FL</option>
<option value="FM">FM</option>
<option value="GA">GA</option>
<option value="GU">GU</option>
<option value="HI">HI</option>
<option value="IA">IA</option>
<option value="ID">ID</option>
<option value="IL">IL</option>
<option value="IN">IN</option>
<option value="KS">KS</option>
<option value="KY">KY</option>
<option value="LA">LA</option>
<option value="MA">MA</option>
<option value="MD">MD</option>
<option value="ME">ME</option>
<option value="MH">MH</option>
<option value="MI">MI</option>
<option value="MN">MN</option>
<option value="MO">MO</option>
<option value="MP">MP</option>
<option value="MS">MS</option>
<option value="MT">MT</option>
<option value="NC">NC</option>
<option value="ND">ND</option>
<option value="NE">NE</option>
<option value="NH">NH</option>
<option value="NJ">NJ</option>
<option value="NM">NM</option>
<option value="NV">NV</option>
<option value="NY">NY</option>
<option value="OH">OH</option>
<option value="OK">OK</option>
<option value="OR">OR</option>
<option value="PA">PA</option>
<option value="PR">PR</option>
<option value="PW">PW</option>
<option value="RI">RI</option>
<option value="SC">SC</option>
<option value="SD">SD</option>
<option value="TN">TN</option>
<option value="TX">TX</option>
<option value="UT">UT</option>
<option value="VA">VA</option>
<option value="VI">VI</option>
<option value="VT">VT</option>
<option value="WA">WA</option>
<option value="WI">WI</option>
<option value="WV">WV</option>
<option value="WY">WY</option>
</select><span class="field-validation-valid" data-valmsg-for="BusinessInfo.State" data-valmsg-replace="true"></span>
    </div>
    <div class="col-sm-2">
<input id="BusinessInfo____d_5_______d_5_-_d_4___" name="BusinessInfo.(^\d{5}$)|(^\d{5}-\d{4}$)" type="hidden" value="" /><input autocomplete="off" class="form-control" data-val="true" data-val-length="The field Postal Code is invalid." data-val-length-max="10" data-val-regex="Zip is not in a valid format" data-val-regex-pattern="(^\d{5}$)|(^\d{5}-\d{4}$)" data-val-required="Required" id="BusinessInfo_Zip" maxlength="20" name="BusinessInfo.Zip" placeholder="Zip" type="text" value="" /><span class="field-validation-valid" data-valmsg-for="BusinessInfo.Zip" data-valmsg-replace="true"></span>
    </div>
</div>


            </div>
        </fieldset>
    </div>
</div>
</div>
            <!-- If Gateway + Merchant Account application, show Processing info, otherwise (Gateway Only) show Billing info -->
            <div>
                <div id="processingInfo" class="row">
    <div class="col-md-12">
        <fieldset>
            <legend>Processing Information</legend>
            <div class="form-group">
                <label class="col-sm-3 control-label">Describe your Business:</label>
                <div class="col-sm-4">
                    <textarea autocomplete="off" class="form-control" cols="20" data-val="true" data-val-length="The field BusinessDescription must be a string with a maximum length of 255." data-val-length-max="255" data-val-regex="Must be Alpha Numeric or  ().-_#,;/\@$:&amp;!?%" data-val-regex-pattern="[\u00C0-\u00D6\u00D8-\u00F6\u00F8-\u01FF\u00C0-\u00D6\u00D8-\u00F6\u00F8-\u01FF\n\ra-zA-Z0-9().\-_#,;/\\@$:&amp;amp;!?%\u00AB\u00BB\u20AC\u20A3\u00AB\u00BB\u20AC\u20A3 ]{1,}$" data-val-required="Required" id="ProcessorInfo_BusinessDescription" maxlength="255" name="ProcessorInfo.BusinessDescription" ng-model="BusinessDescription" placeholder="What products or services do you provide?" rows="2">
</textarea>
                    <span class="field-validation-valid" data-valmsg-for="ProcessorInfo.BusinessDescription" data-valmsg-replace="true"></span>
                </div>
                <div class="col-sm-5 small">
                    {{255 - BusinessDescription.length}} characters remaining
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Industry:</label>
                <div class="col-sm-4">
                    <input autocomplete="off" class="form-control" data-val="true" data-val-mccvalid="Not a valid MCC Code. Please use the Look Up link to find MCC Codes." data-val-mccvalid-allowempty="False" data-val-mccvalid-allowspaces="False" data-val-regex="Must be Numeric" data-val-regex-pattern="\d{1,4}" data-val-required="Required" id="ProcessorInfo_MCCCode" maxlength="4" name="ProcessorInfo.MCCCode" placeholder="Industry/MCC" type="text" value="" />
                    <span class="field-validation-valid" data-valmsg-for="ProcessorInfo.MCCCode" data-valmsg-replace="true"></span>
                </div>                
                <div class="col-sm-3">
                    <span class="info">
                        <img class="hoverTip" src="/activation/Content/Activation/images/info.png" alt="Info" />
                        <div class="hiddenTip" id="industryInfo">
                            Please select the closest Industry that matches your business.
                        </div>
                    </span>
                    <a id="mccLookUp" href="javascript:void(0)">Look Up</a>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Estimated Monthly Sales:</label>
                <div class="col-sm-4">
                    <input autocomplete="off" class="form-control" data-val="true" data-val-number="The field MonthlySalesAmount must be a number." data-val-range="Must be Numeric (1-999999)" data-val-range-max="999999" data-val-range-min="1" data-val-regex="Must be Numeric (1-999999)" data-val-regex-pattern="\d{1,6}(\.\d{1,2})?$" data-val-required="Required" id="ProcessorInfo_MonthlySalesAmount" maxlength="9" name="ProcessorInfo.MonthlySalesAmount" placeholder="$" type="text" value="0" />
                    <span class="field-validation-valid" data-valmsg-for="ProcessorInfo.MonthlySalesAmount" data-valmsg-replace="true"></span>
                </div>                        
                <div class="col-sm-2 info">
                    <img class="hoverTip" src="/activation/Content/Activation/images/info.png" alt="Info" />
                    <div class="hiddenTip" id="monthlySalesInfo">
                        Projected monthly sales volume. You can use your past processing statements as a guideline.
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Owner&#39;s Date of Birth:</label>
                <div class="col-sm-3">
                    <input autocomplete="off" class="form-control" data-val="true" data-val-dateofbirth="Must be at least 18 years old and in a valid date format (MM/DD/YYYY)" data-val-dateofbirth-allowempty="False" data-val-dateofbirth-allowspaces="False" data-val-regex="Must be at least 18 years old and in a valid date format (MM/DD/YYYY)" data-val-regex-pattern="([1-9]|0[1-9]|1[012])[/]([1-9]|0[1-9]|[12][0-9]|3[01])[/](19|20)\d\d" data-val-required="Required" id="ProcessorInfo_OwnerDateOfBirth" maxlength="10" name="ProcessorInfo.OwnerDateOfBirth" placeholder="MM/DD/YYYY" type="text" value="" />
                    <span class="field-validation-valid" data-valmsg-for="ProcessorInfo.OwnerDateOfBirth" data-valmsg-replace="true"></span>
                </div>
                <div id="divSSN" style="display:none;">
                    <label id="ssnFullLabel" class="col-sm-2 control-label">Owner&#39;s SSN:</label>
                    <div class="col-sm-2">
                        <input autocomplete="off" class="form-control" data-val="true" data-val-regex="Must be valid SSN format XXXXXXXXX" data-val-regex-pattern="\d{9,9}" data-val-required="Required" id="ProcessorInfo_SSN" maxlength="9" name="ProcessorInfo.SSN" type="text" value="" />
                        <span class="field-validation-valid" data-valmsg-for="ProcessorInfo.SSN" data-valmsg-replace="true"></span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Business Start Date:</label>
                <div class="col-sm-3">
                    <input autocomplete="off" class="form-control" data-val="true" data-val-businessstartdate="Must be a valid date on or before today" data-val-businessstartdate-allowempty="False" data-val-businessstartdate-allowspaces="False" data-val-regex="Must be in MM/YYYY date format" data-val-regex-pattern="([1-9]|0[1-9]|1[012])[/](18|19|20)\d\d" data-val-required="Required" id="ProcessorInfo_BusinessStartDate" maxlength="7" name="ProcessorInfo.BusinessStartDate" placeholder="MM/YYYY" type="text" value="" />
                    <span class="field-validation-valid" data-valmsg-for="ProcessorInfo.BusinessStartDate" data-valmsg-replace="true"></span>
                </div>
                <div id="divTaxId" style="display:none;">
                    <label class="col-sm-2 control-label">Tax ID:</label>
                    <div class="col-sm-2">
                        <input autocomplete="off" class="form-control" data-val="true" data-val-regex="Must be valid Tax Id format XXXXXXXXX" data-val-regex-pattern="\d{9,9}" data-val-required="Required" id="ProcessorInfo_TaxId" maxlength="9" name="ProcessorInfo.TaxId" type="text" value="" />
                        <span class="field-validation-valid" data-valmsg-for="ProcessorInfo.TaxId" data-valmsg-replace="true"></span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-3 control-label">Do you Offer Subscriptions:</div>
                <div class="col-sm-3 radio-horizontal">
                    <ul>
                        <li>
                            <input data-val="true" data-val-required="Required" id="DoesOfferSubscriptionTrue" name="ProcessorInfo.DoesOfferSubscription" ng-click="setSubscription(true);" ng-value="true" type="radio" value="true" />
                            <label for="DoesOfferSubscriptionTrue">Yes</label>
                        </li>
                        <li>
                            <input checked="checked" id="DoesOfferSubscriptionFalse" name="ProcessorInfo.DoesOfferSubscription" ng-click="setSubscription(false);" ng-value="false" type="radio" value="false" />
                            <label for="DoesOfferSubscriptionFalse">No</label>
                        </li>
                        <li>
                            <img class="hoverTip" src="/activation/Content/Activation/images/info.png" alt="Info" />
                            <div class="hiddenTip" id="subscriptionInfo">
                                Subscriptions charge your customers on a fixed schedule. For example, a monthly magazine subscription.
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-sm-1 info">
                    <span class="field-validation-valid" data-valmsg-for="ProcessorInfo.DoesOfferSubscription" data-valmsg-replace="true"></span>
                </div>        
            </div>
            <div class="form-group" ng-cloak ng-show="offerSubscription">
                <label class="col-sm-3 control-label"></label>
                <div class="col-sm-4">
                    <fieldset class="NoMargin">
                        <legend class="control-label">What percentage of subscriptions are:</legend>
                        <div class="form-group">
                            <label class="col-sm-5 control-label">Monthly</label>
                            <div class="col-sm-3">
                                <input autocomplete="off" class="form-control" data-val="true" data-val-number="The field MonthlySubscriptionPercent must be a number." data-val-range="Must be Numeric (0-100)" data-val-range-max="100" data-val-range-min="0" data-val-regex="Must be Numeric (0-100)" data-val-regex-pattern="\d{1,3}" data-val-required="Required" id="ProcessorInfo_MonthlySubscriptionPercent" maxlength="3" name="ProcessorInfo.MonthlySubscriptionPercent" type="text" value="0" />
                                <span class="field-validation-valid" data-valmsg-for="ProcessorInfo.MonthlySubscriptionPercent" data-valmsg-replace="true"></span> 
                            </div>
                            <div class="col-sm-1">%</div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label">Quarterly</label>
                            <div class="col-sm-3">
                                <input autocomplete="off" class="form-control" data-val="true" data-val-number="The field QuarterlySubscriptionPercent must be a number." data-val-range="Must be Numeric (0-100)" data-val-range-max="100" data-val-range-min="0" data-val-regex="Must be Numeric (0-100)" data-val-regex-pattern="\d{1,3}" data-val-required="Required" id="ProcessorInfo_QuarterlySubscriptionPercent" maxlength="3" name="ProcessorInfo.QuarterlySubscriptionPercent" type="text" value="0" />
                                <span class="field-validation-valid" data-valmsg-for="ProcessorInfo.QuarterlySubscriptionPercent" data-valmsg-replace="true"></span> 
                            </div>
                            <div class="col-sm-1">%</div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label">Semiannual</label>
                            <div class="col-sm-3">
                                <input autocomplete="off" class="form-control" data-val="true" data-val-number="The field SemiAnnualSubscriptionPercent must be a number." data-val-range="Must be Numeric (0-100)" data-val-range-max="100" data-val-range-min="0" data-val-regex="Must be Numeric (0-100)" data-val-regex-pattern="\d{1,3}" data-val-required="Required" id="ProcessorInfo_SemiAnnualSubscriptionPercent" maxlength="3" name="ProcessorInfo.SemiAnnualSubscriptionPercent" type="text" value="0" />
                                <span class="field-validation-valid" data-valmsg-for="ProcessorInfo.SemiAnnualSubscriptionPercent" data-valmsg-replace="true"></span> 
                            </div>
                            <div class="col-sm-1">%</div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label">Annual</label>
                            <div class="col-sm-3">
                                <input autocomplete="off" class="form-control" data-val="true" data-val-number="The field AnnualSubscriptionPercent must be a number." data-val-range="Must be Numeric (0-100)" data-val-range-max="100" data-val-range-min="0" data-val-regex="Must be Numeric (0-100)" data-val-regex-pattern="\d{1,3}" data-val-required="Required" data-val-subscriptionpercentage="Must add up to 100" data-val-subscriptionpercentage-allowempty="False" data-val-subscriptionpercentage-allowspaces="False" id="ProcessorInfo_AnnualSubscriptionPercent" maxlength="3" name="ProcessorInfo.AnnualSubscriptionPercent" type="text" value="0" />
                                <span class="field-validation-valid" data-valmsg-for="ProcessorInfo.AnnualSubscriptionPercent" data-valmsg-replace="true"></span> 
                            </div>
                            <div class="col-sm-1">%</div>
                        </div>
                    </fieldset>
                </div>
            </div>
            <div class="form-group" ng-cloak ng-show="!offerSubscription">
                <label class="col-sm-3 control-label">Days to Product Delivery:</label>
                <div class="col-sm-4">
                    <select class="form-control" data-val="true" data-val-number="The field DaysToProductDelivery must be a number." data-val-range="Must be Numeric" data-val-range-max="999" data-val-range-min="0" data-val-required="Required" id="ProcessorInfo_DaysToProductDelivery" name="ProcessorInfo.DaysToProductDelivery"><option value="">-- Select when you deliver --</option>
<option selected="selected" value="0">Instantly over the internet</option>
<option value="2">0-2 Days</option>
<option value="5">3 to 5 Days</option>
<option value="10">6 to 10 Days</option>
<option value="15">Greater than 10</option>
</select>
                    <span class="field-validation-valid" data-valmsg-for="ProcessorInfo.DaysToProductDelivery" data-valmsg-replace="true"></span>
                </div>        
                <div class="col-sm-1 info">
                    <img class="hoverTip" src="/activation/Content/Activation/images/info.png" alt="Info" />
                    <div class="hiddenTip" id="daysToDeliveryInfo">
                        The number of days that it typically takes for you to deliver the product or service, after they are purchased by your customers.
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">When is the Customer Charged?:</label>
                <div class="col-sm-4">
                    <select class="form-control" data-val="true" data-val-regex="Must be Alpha Numeric or  ().-_#,;/\@$:&amp;!?%" data-val-regex-pattern="[\u00C0-\u00D6\u00D8-\u00F6\u00F8-\u01FF\u00C0-\u00D6\u00D8-\u00F6\u00F8-\u01FFa-zA-Z0-9().\-_#,;/\\@$:&amp;amp;!?%\u00AB\u00BB\u20AC\u20A3\u00AB\u00BB\u20AC\u20A3 ]{1,}$" data-val-required="Required" id="ProcessorInfo_WhenIsCustomerCharged" name="ProcessorInfo.WhenIsCustomerCharged"><option value="">-- Select when you charge --</option>
<option selected="selected" value="OneTimeBeforeServiceDelivery">One Time Before Service Delivery</option>
<option value="OneTimeAfterServiceDelivery">One Time After Service Delivery</option>
<option value="Other">Other</option>
</select>
                    <span class="field-validation-valid" data-valmsg-for="ProcessorInfo.WhenIsCustomerCharged" data-valmsg-replace="true"></span>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Typical Transaction Amount:</label>
                <div class="col-sm-4">
                    <input autocomplete="off" class="form-control" data-val="true" data-val-intlessthan="Must be less than or equal to Estimated Monthly Sales." data-val-intlessthan-allowequality="True" data-val-intlessthan-other="*.MonthlySalesAmount" data-val-number="The field AvgTransactAmount must be a number." data-val-range="Must be Numeric (1-999999)" data-val-range-max="999999" data-val-range-min="1" data-val-regex="Must be Numeric (1-999999)" data-val-regex-pattern="\d{1,6}(\.\d{1,2})?$" data-val-required="Required" id="ProcessorInfo_AvgTransactAmount" maxlength="9" name="ProcessorInfo.AvgTransactAmount" placeholder="$" type="text" value="0" />
                    <span class="field-validation-valid" data-valmsg-for="ProcessorInfo.AvgTransactAmount" data-valmsg-replace="true"></span>
                </div> 
                <div class="col-sm-1 info">
                    <img class="hoverTip" src="/activation/Content/Activation/images/info.png" alt="Info" />
                    <div class="hiddenTip" id="transAmountInfo">
                        The average transaction amount that you charge customers.
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Largest Expected Transaction:</label>
                <div class="col-sm-4">
                    <input autocomplete="off" class="form-control" data-val="true" data-val-intgreaterthan="Must be greater than or equal to Typical Transaction Amount." data-val-intgreaterthan-allowequality="True" data-val-intgreaterthan-other="*.AvgTransactAmount" data-val-intlessthan="Must be less than or equal to Estimated Monthly Sales." data-val-intlessthan-allowequality="True" data-val-intlessthan-other="*.MonthlySalesAmount" data-val-number="The field MaxTransactAmount must be a number." data-val-range="Must be Numeric (1-999999)" data-val-range-max="999999" data-val-range-min="1" data-val-regex="Must be Numeric (1-999999)" data-val-regex-pattern="\d{1,6}(\.\d{1,2})?$" data-val-required="Required" id="ProcessorInfo_MaxTransactAmount" maxlength="9" name="ProcessorInfo.MaxTransactAmount" placeholder="$" type="text" value="0" />
                    <span class="field-validation-valid" data-valmsg-for="ProcessorInfo.MaxTransactAmount" data-valmsg-replace="true"></span>
                </div> 
                <div class="col-sm-1 info">
                    <img class="hoverTip" src="/activation/Content/Activation/images/info.png" alt="Info" />
                    <div class="hiddenTip" id="transAmountMaxInfo">
                        This is important if you have transactions that are much larger than your expected average. If the banks are expecting larger transactions, then they are less likely to flag them as potentially fraudulent.
                    </div>
                </div>
            </div>
            <div ng-cloak ng-show="!showCreditCard">
                <div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Name on Checking Account:</label>
        <div class="col-sm-4">
            <input autocomplete="off" class="form-control" data-val="true" data-val-length="The field Name on Account must be a string with a minimum length of 1 and a maximum length of 40." data-val-length-max="40" data-val-length-min="1" data-val-regex="Must be Alpha Numeric or  ().-_#,;/\@$:&amp;!?%" data-val-regex-pattern="[\u00C0-\u00D6\u00D8-\u00F6\u00F8-\u01FF\u00C0-\u00D6\u00D8-\u00F6\u00F8-\u01FFa-zA-Z0-9().\-_#,;/\\@$:&amp;amp;!?%\u00AB\u00BB\u20AC\u20A3\u00AB\u00BB\u20AC\u20A3 ]{1,}$" data-val-required="Required" id="BillingInfo_BankInfo_NameOnAccount" maxlength="40" name="BillingInfo.BankInfo.NameOnAccount" placeholder="Name on Checking Account" type="text" value="" />
            <span class="field-validation-valid" data-valmsg-for="BillingInfo.BankInfo.NameOnAccount" data-valmsg-replace="true"></span>
        </div>
        <div class="col-sm-3">
                    


            <select class="form-control" data-val="true" data-val-regex="Must be Alpha Numeric or  ().-_#,;/\@$:&amp;!?%" data-val-regex-pattern="[\u00C0-\u00D6\u00D8-\u00F6\u00F8-\u01FF\u00C0-\u00D6\u00D8-\u00F6\u00F8-\u01FFa-zA-Z0-9().\-_#,;/\\@$:&amp;amp;!?%\u00AB\u00BB\u20AC\u20A3\u00AB\u00BB\u20AC\u20A3 ]{1,}$" data-val-required="Required" id="BillingInfo_BankInfo_AccountOwnerType" name="BillingInfo.BankInfo.AccountOwnerType"><option value="">-- Select Account Owner Type --</option>
<option selected="selected" value="Personal">Personal</option>
<option value="Business">Business</option>
</select>
            <span class="field-validation-valid" data-valmsg-for="BillingInfo.BankInfo.AccountOwnerType" data-valmsg-replace="true"></span>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">U.S. Checking Account:</label>
        <div class="col-sm-4">
            <input autocomplete="off" class="form-control" data-val="true" data-val-regex="Routing number must be 9 digits" data-val-regex-pattern="\d{9}" data-val-required="Required" data-val-routingnumber="Routing number is invalid" data-val-routingnumber-allowempty="False" data-val-routingnumber-allowspaces="False" id="BillingInfo_BankInfo_ABARoutingNumber" maxlength="9" name="BillingInfo.BankInfo.ABARoutingNumber" placeholder="Routing Number" type="text" value="" />
            <span class="field-validation-valid" data-valmsg-for="BillingInfo.BankInfo.ABARoutingNumber" data-valmsg-replace="true"></span>
        </div>
        <div class="col-sm-3">
            <input autocomplete="off" class="form-control" data-val="true" data-val-regex="Account number must be 5 to 17 digits" data-val-regex-pattern="^\d{5,17}$" data-val-required="Required" id="BillingInfo_BankInfo_AccountNumber" maxlength="17" name="BillingInfo.BankInfo.AccountNumber" placeholder="Account Number" type="text" value="" />
            <span class="field-validation-valid" data-valmsg-for="BillingInfo.BankInfo.AccountNumber" data-valmsg-replace="true"></span>
        </div>
        <div class="col-sm-2 info">
            <img class="hoverTip" src="/activation/Content/Activation/images/info.png" alt="Info" />
            <div class="hiddenTip">
                <img src="/activation/Content/Activation/images/routingaccount.png" alt="Check" />
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-3 control-label">
        </div>
        <div class="col-sm-7 small">
            <b>Note:</b> We accept only U.S. checking accounts.
            <span ng-show="gatewayOnly">If your checking account is not U.S. based, please pay by Credit Card.</span>
        </div>
    </div>
</div>
  
            </div>
            <div ng-cloak ng-show="showCreditCard">        
                
<div class="form-group">
    <label class="col-sm-3 control-label">Credit Card Number:</label>
    <div class="col-sm-2">
        <input autocomplete="off" class="form-control" data-val="true" data-val-length="The field Credit Card Number must be a string with a maximum length of 16." data-val-length-max="16" data-val-luhn="Invalid" data-val-luhn-allowempty="False" data-val-luhn-allowspaces="False" data-val-regex="Must be Numeric" data-val-regex-pattern="\d{1,16}" data-val-required="Required" id="BillingInfo_CreditCardInfo_CardNumber" maxlength="16" name="BillingInfo.CreditCardInfo.CardNumber" type="text" value="" />
        <span class="field-validation-valid" data-valmsg-for="BillingInfo.CreditCardInfo.CardNumber" data-valmsg-replace="true"></span>
    </div>
    <label class="col-sm-2 control-label">Expiration Date:</label>
    <div class="col-sm-1">
        <input autocomplete="off" class="form-control" data-val="true" data-val-expiration="Invalid" data-val-expiration-allowempty="False" data-val-expiration-allowspaces="False" data-val-length="The field Expiration Date must be a string with a maximum length of 4." data-val-length-max="4" data-val-regex="Invalid" data-val-regex-pattern="\d{4}" data-val-required="Required" id="BillingInfo_CreditCardInfo_CardExpiration" maxlength="4" name="BillingInfo.CreditCardInfo.CardExpiration" placeholder="MMYY" type="text" value="" />
        <span class="field-validation-valid" data-valmsg-for="BillingInfo.CreditCardInfo.CardExpiration" data-valmsg-replace="true"></span>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label">Name On Card:</label>
    <div class="col-sm-4">
        <input autocomplete="off" class="form-control" data-val="true" data-val-length="The field First Name must be a string with a maximum length of 50." data-val-length-max="50" data-val-regex="Must be Alpha Numeric or  ().-_#,;/\@$:&amp;!?%" data-val-regex-pattern="[\u00C0-\u00D6\u00D8-\u00F6\u00F8-\u01FF\u00C0-\u00D6\u00D8-\u00F6\u00F8-\u01FFa-zA-Z0-9().\-_#,;/\\@$:&amp;amp;!?%\u00AB\u00BB\u20AC\u20A3\u00AB\u00BB\u20AC\u20A3 ]{1,}$" data-val-required="Required" id="BillingInfo_CreditCardInfo_FirstName" maxlength="50" name="BillingInfo.CreditCardInfo.FirstName" placeholder="First" type="text" value="" />
        <span class="field-validation-valid" data-valmsg-for="BillingInfo.CreditCardInfo.FirstName" data-valmsg-replace="true"></span>
    </div>
    <div class="col-sm-3">
        <input autocomplete="off" class="form-control" data-val="true" data-val-length="The field Last Name must be a string with a maximum length of 50." data-val-length-max="50" data-val-regex="Must be Alpha Numeric or  ().-_#,;/\@$:&amp;!?%" data-val-regex-pattern="[\u00C0-\u00D6\u00D8-\u00F6\u00F8-\u01FF\u00C0-\u00D6\u00D8-\u00F6\u00F8-\u01FFa-zA-Z0-9().\-_#,;/\\@$:&amp;amp;!?%\u00AB\u00BB\u20AC\u20A3\u00AB\u00BB\u20AC\u20A3 ]{1,}$" data-val-required="Required" id="BillingInfo_CreditCardInfo_LastName" maxlength="50" name="BillingInfo.CreditCardInfo.LastName" placeholder="Last" type="text" value="" />
        <span class="field-validation-valid" data-valmsg-for="BillingInfo.CreditCardInfo.LastName" data-valmsg-replace="true"></span>
    </div>
</div>            
<div class="form-group">
    <div class="col-sm-3 control-label">Credit Card Billing Address</div>
    <div class="col-sm-8">
        <div class="radio-horizontal">
            <input checked="checked" id="BillingInfo_CreditCardInfo_CopyAddress" name="BillingInfo.CreditCardInfo.CopyAddress" type="radio" value="Owner" /> Use My Address &nbsp;&nbsp;
            <input id="BillingInfo_CreditCardInfo_CopyAddress" name="BillingInfo.CreditCardInfo.CopyAddress" type="radio" value="Business" /> Use Business Address &nbsp;&nbsp;
            <input id="BillingInfo_CreditCardInfo_CopyAddress" name="BillingInfo.CreditCardInfo.CopyAddress" type="radio" value="None" /> Use Another Address
        </div>
        <div class="creditCardAddressDisplay">
            <div id="creditCardAddressDisplay"></div>
        </div>
    </div>
</div>
<div class="form-group creditCardAddress">
    <label class="col-sm-3 control-label"></label>
    <div class="col-sm-4">
        <select class="form-control" data-val="true" data-val-regex="Required" data-val-regex-pattern="[a-zA-Z][a-zA-Z]" data-val-required="Required" id="BillingInfo_CreditCardInfo_AddressModel_Country" name="BillingInfo.CreditCardInfo.AddressModel.Country"><option selected="selected" value="US">United States of America</option>
<option value="CA">Canada</option>
</select>
        <span class="field-validation-valid" data-valmsg-for="BillingInfo.CreditCardInfo.AddressModel.Country" data-valmsg-replace="true"></span>
    </div>
</div>
<div class="creditCardAddress" id="creditAddress">
    
<div class="form-group creditCardAddress">
    <label class="col-sm-3 control-label"></label>
    <div class="col-sm-7">
<input id="BillingInfo_CreditCardInfo_AddressModel____u00C0-_u00D6_u00D8-_u00F6_u00F8-_u01FFa-zA-Z0-9____-_______:_____1___" name="BillingInfo.CreditCardInfo.AddressModel.^[\u00C0-\u00D6\u00D8-\u00F6\u00F8-\u01FFa-zA-Z0-9().\-_#,;/@$:!% ]{1,}$" type="hidden" value="" /><input autocomplete="off" class="form-control" data-val="true" data-val-length="The field Address is invalid." data-val-length-max="60" data-val-regex="Address is not Alpha Numeric" data-val-regex-pattern="^[\u00C0-\u00D6\u00D8-\u00F6\u00F8-\u01FFa-zA-Z0-9().\-_#,;/@$:!% ]{1,}$" data-val-required="Required" id="BillingInfo_CreditCardInfo_AddressModel_Address1" maxlength="100" name="BillingInfo.CreditCardInfo.AddressModel.Address1" placeholder="Street" type="text" value="" /><span class="field-validation-valid" data-valmsg-for="BillingInfo.CreditCardInfo.AddressModel.Address1" data-valmsg-replace="true"></span>
    </div>
</div>
<div class="form-group creditCardAddress">
    <div class="col-sm-3 control-label"></div>
    <div class="col-sm-3">
<input id="BillingInfo_CreditCardInfo_AddressModel____u00C0-_u00D6_u00D8-_u00F6_u00F8-_u01FFa-zA-Z0-9____-_______:_____1___" name="BillingInfo.CreditCardInfo.AddressModel.^[\u00C0-\u00D6\u00D8-\u00F6\u00F8-\u01FFa-zA-Z0-9().\-_#,;/@$:!% ]{1,}$" type="hidden" value="" /><input autocomplete="off" class="form-control" data-val="true" data-val-length="The field City is invalid." data-val-length-max="40" data-val-regex="City is not Alpha Numeric" data-val-regex-pattern="^[\u00C0-\u00D6\u00D8-\u00F6\u00F8-\u01FFa-zA-Z0-9().\-_#,;/@$:!% ]{1,}$" data-val-required="Required" id="BillingInfo_CreditCardInfo_AddressModel_City" maxlength="40" name="BillingInfo.CreditCardInfo.AddressModel.City" placeholder="City" type="text" value="" /><span class="field-validation-valid" data-valmsg-for="BillingInfo.CreditCardInfo.AddressModel.City" data-valmsg-replace="true"></span>
    </div>
    <div class="col-sm-2">
<select class="form-control" data-val="true" data-val-length="The field State is invalid." data-val-length-max="40" data-val-regex="State is not in a valid format" data-val-regex-pattern="^[\u00C0-\u00D6\u00D8-\u00F6\u00F8-\u01FFa-zA-Z0-9().\-_#,;/@$:!% ]{1,}$" data-val-required="Required" id="BillingInfo_CreditCardInfo_AddressModel_State" name="BillingInfo.CreditCardInfo.AddressModel.State"><option value="">--State--</option>
<option value="AA">AA</option>
<option value="AE">AE</option>
<option value="AK">AK</option>
<option value="AL">AL</option>
<option value="AP">AP</option>
<option value="AR">AR</option>
<option value="AS">AS</option>
<option value="AZ">AZ</option>
<option value="CA">CA</option>
<option value="CO">CO</option>
<option value="CT">CT</option>
<option value="DC">DC</option>
<option value="DE">DE</option>
<option value="FL">FL</option>
<option value="FM">FM</option>
<option value="GA">GA</option>
<option value="GU">GU</option>
<option value="HI">HI</option>
<option value="IA">IA</option>
<option value="ID">ID</option>
<option value="IL">IL</option>
<option value="IN">IN</option>
<option value="KS">KS</option>
<option value="KY">KY</option>
<option value="LA">LA</option>
<option value="MA">MA</option>
<option value="MD">MD</option>
<option value="ME">ME</option>
<option value="MH">MH</option>
<option value="MI">MI</option>
<option value="MN">MN</option>
<option value="MO">MO</option>
<option value="MP">MP</option>
<option value="MS">MS</option>
<option value="MT">MT</option>
<option value="NC">NC</option>
<option value="ND">ND</option>
<option value="NE">NE</option>
<option value="NH">NH</option>
<option value="NJ">NJ</option>
<option value="NM">NM</option>
<option value="NV">NV</option>
<option value="NY">NY</option>
<option value="OH">OH</option>
<option value="OK">OK</option>
<option value="OR">OR</option>
<option value="PA">PA</option>
<option value="PR">PR</option>
<option value="PW">PW</option>
<option value="RI">RI</option>
<option value="SC">SC</option>
<option value="SD">SD</option>
<option value="TN">TN</option>
<option value="TX">TX</option>
<option value="UT">UT</option>
<option value="VA">VA</option>
<option value="VI">VI</option>
<option value="VT">VT</option>
<option value="WA">WA</option>
<option value="WI">WI</option>
<option value="WV">WV</option>
<option value="WY">WY</option>
</select><span class="field-validation-valid" data-valmsg-for="BillingInfo.CreditCardInfo.AddressModel.State" data-valmsg-replace="true"></span>
    </div>
    <div class="col-sm-2">
<input id="BillingInfo_CreditCardInfo_AddressModel____d_5_______d_5_-_d_4___" name="BillingInfo.CreditCardInfo.AddressModel.(^\d{5}$)|(^\d{5}-\d{4}$)" type="hidden" value="" /><input autocomplete="off" class="form-control" data-val="true" data-val-length="The field Postal Code is invalid." data-val-length-max="10" data-val-regex="Zip is not in a valid format" data-val-regex-pattern="(^\d{5}$)|(^\d{5}-\d{4}$)" data-val-required="Required" id="BillingInfo_CreditCardInfo_AddressModel_Zip" maxlength="20" name="BillingInfo.CreditCardInfo.AddressModel.Zip" placeholder="Zip" type="text" value="" /><span class="field-validation-valid" data-valmsg-for="BillingInfo.CreditCardInfo.AddressModel.Zip" data-valmsg-replace="true"></span>
    </div>
</div>


</div>
            </div>
        </fieldset>
    </div>
</div>
</div>
            <div>
                <div class="jumbotron">
    <div class="form-group">
        <label class="col-sm-1 control-label"></label>
        <div class="col-sm-9">
            <div><b>By clicking I AGREE I confirm that I have read and accept the:</b></div>
            <div class="checkbox small">
                <input id="Agreements_GatewayAgreement" name="Agreements.GatewayAgreement" type="checkbox" value="true" /><input name="Agreements.GatewayAgreement" type="hidden" value="false" /> 
                <a href='javascript:AnetB.Signup.OpenAgreement();'>Authorize.Net Payment Gateway Merchant Service Agreement </a> and <a id='showFee'>Authorize.Net Fees</a>
            </div>
            <div ng-if="!gatewayOnly" class="checkbox small">
                <input id="Agreements_MerchantAccountAgreement" name="Agreements.MerchantAccountAgreement" type="checkbox" value="true" /><input name="Agreements.MerchantAccountAgreement" type="hidden" value="false" /> 
                <span ng-if="!powerPayAcquirer">
                    <a href="javascript:AnetB.Signup.OpenMerchantAccountAgreement();">Merchant Account Services Agreement</a> and <a href="javascript:AnetB.Signup.OpenDisclosure();">Disclosure</a>
                </span>
                <span ng-if="powerPayAcquirer">
                    <a href="javascript:AnetB.Signup.OpenMerchantAccountAgreement();">Merchant Account Services Agreement</a>
                </span>
            </div>
        </div>
        <div class="col-sm-2" style="margin: 10px 0 0 0; padding-left: 30px;">
            <input type="button" class="btn btn-primary" id="btnIAgree" ng-click="iAgree()" aria-label="I Agree" value="I Agree" />
        </div>
    </div>
</div>
<div id="termCheck">
    <div id="termCheckCloseDiv">
        <span id="termCheckClose" title="Close" aria-label="Close" role="button">
            X
        </span>
    </div>
    <div id="termHeader" class="row">
        <div class="col-md-10">
            <h3>Merchant Services Agreement</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            &nbsp;
        </div>
    </div>
    <div class="row">
        <div class="col-md-1">
        </div>
        <div class="col-md-10">
            <div ng-if="gatewayOnly">Please click the check box to indicate that you have read and understand the Authorize.Net Payment Gateway Merchant Services Agreement before you click I Agree.</div>
            <div ng-if="!gatewayOnly">Please click the check boxes to indicate that you have read and understand the Authorize.Net Payment Gateway Merchant Services Agreement and Merchant Account Services Agreement before you click I Agree.</div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            &nbsp;
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
        </div>
        <div class="col-md-8 alignRight">
            <input type="button" class="btn btn-primary" id="btnCloseTerm" aria-label="Close" value="Close" />
        </div>
        <div class="col-md-2">
        </div>
    </div>
</div>
</div>
            <div class="formBlock">
                
                <!--input type="button" class="btn btn-primary" id="fwButton" value="I Agree" /-->
            </div>
            <!-- NOTE: Any Model's members that need to be persisted should be added to this list -->
            <input type="hidden" name="Token" value="FVWvIlyt/vnaXgugxBJ+Yug8cli4LF00DfkyDf81OzLu+rGQFWizIIVPR0MUVY+H9g64jfGXSb7ETsxEKR99LCwmUqEYsFcuTcNrlap5TSmvQLcx6rFCeFwNksL/vk0hckwR7BjUHyBfAYZVhKSGVg==" />
            <!-- other required properties -->
            <input type="hidden" name="IsUSDAffiliateReseller" id="IsUSDAffiliateReseller"  value="false" />
            <input type="hidden" name="ProfileId" id="ProfileId"  value="9" />
            <input type="hidden" name="BuyRateProgramId" id="BuyRateProgramId"  value="7469" />
            <input type="hidden" name="ApplyForProcessorAccount" id="ApplyForProcessorAccount"  value="true" />
            <input type="hidden" name="AcquirerMerchantType" id="AcquirerMerchantType" value="ANET_MICRO_MERCHANT" />
            <input type="hidden" name="BypassIdentityCheck" id="BypassIdentityCheck" value="false" />
            <input type="hidden" name="AcquirerSet" id="AcquirerSet" value="" />
            <input type="hidden" name="OAPAppId" value="" />
            <input type="hidden" name="SalesRepId" value="" />
            <input type="hidden" name="SalesRepName" value="" />
            <input type="hidden" name="OAPUpdateRequired" value="false" />
            <input type="hidden" name="errorCode" id="errorCode" />
            <input type="hidden" name="GatewayOnly" id="GatewayOnly" value="false" />
            <div>
                
<div>
    <div id="createWait" ng-show="showWait" ng-cloak>
        <div class="row">
            <div class="col-md-12">
                <span ng-show="creatingAccount">
                    Account creation in progress
                </span>
                <span ng-show="!creatingAccount">
                    Starting identity check
                </span>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12" id="spinner">
                <img alt="Waiting Image" aria-label="Waiting Image" src="/activation/Content/Activation/images/loading.gif" />
            </div>
        </div>
    </div>
    <div id="createUser" ng-show="showUser" ng-cloak>
        <div id="createUserCloseDiv" ng-click="closeUser()">
            <span id="createUserClose" class="" title="Close" aria-label="Close" role="button">
                X
            </span>
        </div>
        <div class="row">
            <div class="col-md-12" id="logo">
                <img alt="Authorize.Net Logo" aria-label="Authorize.Net Logo" longdesc="Authorize.Net Logo" src="/activation/Content/Activation/images/Logo-Blue.png" />
            </div>
        </div>
        <div class="row">
            <div class="col-md-12" id="createUserHeader">
                <h2>Create your Authorize.Net Account</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <input autocomplete="off" data-val="true" data-val-required="Required" id="LoginInfo_LoginId" maxlength="25" name="LoginInfo.LoginId" placeholder="Enter Username" size="25" type="text" value="" />
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 errorDiv">
                <span id="usernameError" data-invalid-user="That User Name is not available. Please try another." data-rules="[{&quot;Name&quot;:&quot;UsernameRuleSixChar&quot;,&quot;ResourceName&quot;:&quot;be at least 6 characters long&quot;,&quot;RuleString&quot;:&quot;^.{6,25}$&quot;,&quot;RuleRegex&quot;:null,&quot;RuleEquals&quot;:true,&quot;IsCondition&quot;:true},{&quot;Name&quot;:&quot;UsernameRuleWhitespace&quot;,&quot;ResourceName&quot;:&quot;contain no whitespace&quot;,&quot;RuleString&quot;:&quot;\\s&quot;,&quot;RuleRegex&quot;:null,&quot;RuleEquals&quot;:false,&quot;IsCondition&quot;:false},{&quot;Name&quot;:&quot;UsernameRuleInvalidCharacters&quot;,&quot;ResourceName&quot;:&quot;contain only alphanumeric characters or ().-_#,;/\\@$:\u0026!?%&quot;,&quot;RuleString&quot;:&quot;^[\\u00C0-\\u00D6\\u00D8-\\u00F6\\u00F8-\\u01FF\\u00C0-\\u00D6\\u00D8-\\u00F6\\u00F8-\\u01FFa-zA-Z0-9().\\-_#,;/\\\\@$:\u0026amp;!?%\\u00AB\\u00BB\\u20AC\\u20A3\\u00AB\\u00BB\\u20AC\\u20A3 ]{1,}$&quot;,&quot;RuleRegex&quot;:null,&quot;RuleEquals&quot;:true,&quot;IsCondition&quot;:false}]"></span>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <input autocomplete="off" data-val="true" data-val-required="Required" id="LoginInfo_Password" maxlength="25" name="LoginInfo.Password" placeholder="Enter Password" size="25" type="password" />
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 errorDiv">
                <span id="passwordError" data-rules="[{&quot;Name&quot;:&quot;PasswordRuleAlpha&quot;,&quot;ResourceName&quot;:&quot;contain at least one letter&quot;,&quot;RuleString&quot;:&quot;[\\u00C0-\\u00D6\\u00D8-\\u00F6\\u00F8-\\u01FF\\u00C0-\\u00D6\\u00D8-\\u00F6\\u00F8-\\u01FFa-zA-Z]&quot;,&quot;RuleRegex&quot;:null,&quot;RuleEquals&quot;:true,&quot;IsCondition&quot;:true},{&quot;Name&quot;:&quot;PasswordRuleNumeric&quot;,&quot;ResourceName&quot;:&quot;contain at least one number&quot;,&quot;RuleString&quot;:&quot;[0-9]&quot;,&quot;RuleRegex&quot;:null,&quot;RuleEquals&quot;:true,&quot;IsCondition&quot;:true},{&quot;Name&quot;:&quot;PasswordRuleSpecialCharacter&quot;,&quot;ResourceName&quot;:&quot;contain at least one of these: ().-_#,;/\\@$:\u0026!?%&quot;,&quot;RuleString&quot;:&quot;[\\(\\)\\.\\-_#,;/\\\\@$:\u0026!?%]{1,}&quot;,&quot;RuleRegex&quot;:null,&quot;RuleEquals&quot;:true,&quot;IsCondition&quot;:true},{&quot;Name&quot;:&quot;PasswordRuleEightChar&quot;,&quot;ResourceName&quot;:&quot;be at least 8 characters long&quot;,&quot;RuleString&quot;:&quot;^.{8,25}$&quot;,&quot;RuleRegex&quot;:null,&quot;RuleEquals&quot;:true,&quot;IsCondition&quot;:true},{&quot;Name&quot;:&quot;PasswordRuleWhitespace&quot;,&quot;ResourceName&quot;:&quot;contain no whitespace&quot;,&quot;RuleString&quot;:&quot;\\s&quot;,&quot;RuleRegex&quot;:null,&quot;RuleEquals&quot;:false,&quot;IsCondition&quot;:false},{&quot;Name&quot;:&quot;PasswordRuleInvalidCharacters&quot;,&quot;ResourceName&quot;:&quot;contain only alphanumeric characters or ().-_#,;/\\@$:\u0026!?%&quot;,&quot;RuleString&quot;:&quot;^[\\u00C0-\\u00D6\\u00D8-\\u00F6\\u00F8-\\u01FF\\u00C0-\\u00D6\\u00D8-\\u00F6\\u00F8-\\u01FFa-zA-Z0-9().\\-_#,;/\\\\@$:\u0026\\!?%\\u00AB\\u00BB\\u20AC\\u20A3\\u00AB\\u00BB\\u20AC\\u20A3 ]{1,}$&quot;,&quot;RuleRegex&quot;:null,&quot;RuleEquals&quot;:true,&quot;IsCondition&quot;:false},{&quot;Name&quot;:&quot;PasswordRuleFiveCharInstance&quot;,&quot;ResourceName&quot;:&quot;have no more than 4 instances of the same character&quot;,&quot;RuleString&quot;:&quot;^(?:(.)(?!(?:.*?\\1){4}))*$&quot;,&quot;RuleRegex&quot;:null,&quot;RuleEquals&quot;:true,&quot;IsCondition&quot;:false}]"></span>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <input autocomplete="off" data-val="true" data-val-required="Required" id="LoginInfo_Password_Verify" maxlength="25" name="LoginInfo.Password_Verify" placeholder="Confirm Password" size="25" type="password" />
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 errorDiv">
                <span id="passwordVerifyError" data-match-error="Passwords did not match. Please try again."></span>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12" id="captchaCode" data-captcha-id="622124948">
                <fieldset>
                    <legend>Security Code
                        <a id="captchaAudio" href="https://captcha.authorize.net/Captcha/Captcha.aspx?ACR=2&amp;CID=622124948&amp;getSound=1">
                            <img src="/activation/Content/Activation/images/speaker.png" border="0" alt="Security Code Audio" />
                        </a>
                    </legend>
                    <img width="250" height="50" alt="Security Code" id="captchaImage" src="https://captcha.authorize.net/Captcha/Captcha.aspx?ACR=2&amp;CID=622124948&amp;getImage=1&amp;imageType=jpeg" />
                    <div id="refreshCaptcha">
                        <a href="#">Update Code</a>
                    </div>
                </fieldset>
            </div>
        </div>
        <div class="row security">
            <div class="col-md-6">
			    <label for="LoginInfo_Captcha">Enter Security Code:</label>
            </div>
            <div class="col-md-6">
                <input autocomplete="off" class="form-control" data-val="true" data-val-length="Security Code must be between 5 and 16 characters long" data-val-length-max="16" data-val-length-min="5" data-val-regex="Security Code contains linvalid characters" data-val-regex-pattern="^[\u00C0-\u00D6\u00D8-\u00F6\u00F8-\u01FF\u00C0-\u00D6\u00D8-\u00F6\u00F8-\u01FFa-zA-Z0-9().\-_#,;/\\@$:&amp;amp;!?%\u00AB\u00BB\u20AC\u20A3\u00AB\u00BB\u20AC\u20A3 ]{1,}$" data-val-required="Required" id="LoginInfo_Captcha" maxlength="16" name="LoginInfo.Captcha" type="text" value="" />
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                    <div id="captchaInvalid">Security Code did not match. Please try again.</div>
                    <span class="field-validation-valid" data-valmsg-for="LoginInfo.Captcha" data-valmsg-replace="true"></span>
            </div>
        </div>
        <div class="row">
            <div>
                <input type="button" class="btn btn-primary" id="createAccount" aria-label="Create Your Account" value="Create Your Account" />
            </div>
        </div>
    </div>
    <div id="usernameHelpDiv">
        <div>
            <div class="ruleTitle">
                <span id="usernameRuleTitle">Usernames must:</span>
                <a class="qtip-close-icon" title="Close" aria-label="Close" role="button"> 
                    <img src="/activation/Content/Activation/images/Close-Icon.gif" class="ui-icon" alt="Close" />
                </a>
            </div>

            <table id="usernameHelpTable" cellspacing="2" cellpadding="2" class="mar10Btm">
                <tbody>
                <tr class="ruleCondition">
                    <td>
                        <span class="ruleImage">
                            <img src="/activation/Content/Activation/images/checked.png" class="checked ruleInactive" alt="Pass" />
                            <img src="/activation/Content/Activation/images/unchecked.png" class="unchecked ruleActive" alt="Fail" />
                        </span>
                    </td>
                    <td>
                        <span class="ruleText"></span>
                    </td>
                </tr>
                <tr class="ruleError" id="usernameSamePassword">
                    <td>
                        <span class="ruleImage">
                            <img src="/activation/Content/Activation/images/error.gif" class="checked " alt="Error" />
                        </span>
                    </td>
                    <td>
                        <span class="ruleText">not contain Password</span>
                    </td>
                </tr>
            </tbody></table>
        </div>
    </div>

    <div id="passwordHelpDiv">
        <div>
            <div class="ruleTitle">
                <span id="passwordRuleTitle">Passwords must:</span>
                <a class="qtip-close-icon" title="Close" aria-label="Close" role="button"> 
                    <img src="/activation/Content/Activation/images/Close-Icon.gif" class="ui-icon" alt="Pass" />
                </a>
            </div>

            <table id="passwordHelpTable" cellspacing="2" cellpadding="2" class="mar10Btm">
              <tbody>
                <tr class="ruleCondition">
                    <td>
                        <span class="ruleImage">
                            <img src="/activation/Content/Activation/images/checked.png" class="checked ruleInactive" alt="Pass" />
                            <img src="/activation/Content/Activation/images/unchecked.png" class="unchecked ruleActive" alt="Fail" />
                        </span>
                    </td>
                    <td>
                        <span class="ruleText"></span>
                    </td>
                </tr>
                <tr class="ruleError" id="passwordSameUsername">
                    <td>
                        <span class="ruleImage" >
                            <img src="/activation/Content/Activation/images/error.gif" class="checked " alt="Error" />
                        </span>
                    </td>
                    <td>
                        <span class="ruleText">not contain Username</span>
                    </td>
                </tr>
              </tbody>
            </table>
        </div>
    </div>
    <div class="blanket" ng-show="showUser || showWait"  ng-cloak></div>
</div>

            </div>
            <div>
                
<form id="identityForm" name="identityForm" class="cssform" autocomplete="off" novalidate>
<div id="identityCheck" ng-enter="doIdentityCheck(answeredQuestions)" ng-show="showIdentity" ng-cloak >
    <div class="row text-center">
        <div class="col-sm-12">
            <img alt="Authorize.Net Logo" aria-label="Authorize.Net Logo" longdesc="Authorize.Net Logo" src="/activation/Content/Activation/images/Logo-Blue.png" />
        </div>
    </div>
    <fieldset>
        <legend>Confirm Your Identity</legend>
        <div id="questions" ng-repeat="(qIndex, question) in identityQuestions.IQCSQuestions">
            <div class="row text-left identityQuestion">
                <div class="col-sm-12">
                    {{question.Question}}
                </div>
            </div>
            <div class="row text-left" ng-repeat="(aIndex, answer) in question.Answers">
                <div class="col-sm-12">
                    <label for="question{{qIndex}}answer{{aIndex}}">
                        <input id="question{{qIndex}}answer{{aIndex}}" type="radio" ng-model="$parent.answeredQuestions['question' + qIndex]" dynamic-name="'question' + qIndex"
                        ng-value="{{aIndex}}" ng-required="value.length==0"" />{{answer}}
                    </label>
                </div>
            </div>
            <div class="row text-left">
                <div class="col-sm-12">
                    <div class="error" ng-show="identityForm.$dirty && identityForm.question{{qIndex}}.$error.required">Please choose an answer</div>
                </div>
            </div>
        </div>
        <div class="row text-left">
            <div class="alignRight col-sm-3">
            </div>
            <div class="col-sm-9">
                <div class="error" id="identityCheckErrorServer">{{identityCheckError}}</div>
            </div>
        </div>
    </fieldset>
    <div class="row">
        <div class="col-sm-12 text-center">
            <input type="button" class="btn btn-primary" ng-click="doIdentityCheck(answeredQuestions)" ng-disabled="areQuestionsAnswered(answeredQuestions)" id="doIdentityCheck" value="Confirm Your Identity">
        </div>
    </div>
</div>
</form>
<div ng-show="showIdentity" ng-cloak class="blanket"></div>


            </div>
            <div>
                
<div id="createFee">
    <div id="createFeeCloseDiv">
        <span id="createFeeClose" title="Close" aria-label="Close" role="button">
            X
        </span>
    </div>
    <div>
        <div class="row">
            <div class="col-md-12">
                <h3>Authorize.Net Fees</h3>
            </div>
        </div>
        <div class="row feeRow">
            <div class="col-md-1 info">
                <img class="hoverTip" src="/activation/Content/Activation/images/info.png" alt="Info" />
                <div class="hiddenTip">The one-time fee charged to establish a payment gateway account.</div>
            </div>
            <div class="col-md-8">
                Setup <span class="small">(Non-Refundable)</span>
            </div>
            <div class="col-md-3 fee">
                $49.00
            </div>
        </div>
        <div class="row feeRow">
            <div class="col-md-1 info">
                <img class="hoverTip" src="/activation/Content/Activation/images/info.png" alt="Info" />
                <div class="hiddenTip">The monthly fee charged for a payment gateway account.</div>
            </div>
            <div class="col-md-8">
                Monthly Gateway
            </div>
            <div class="col-md-3 fee">
                $25.00
            </div>
        </div>
        <div ng-if="gatewayOnly" class="row feeRow">
            <div class="col-md-1 info">
                <img class="hoverTip" src="/activation/Content/Activation/images/info.png" alt="Info" />
                <div class="hiddenTip">The fee assessed per batch of settled credit card transactions.</div>
            </div>
            <div class="col-md-8">
                Batch
            </div>
            <div class="col-md-3 fee">
                $0.00
            </div>
        </div>
        <div class="row feeRow">
            <div class="col-md-1 info">
                <img class="hoverTip" src="/activation/Content/Activation/images/info.png" alt="Info" />
                <div class="hiddenTip">The fee charged by the payment gateway for each credit card transaction processed for the account. The credit card transaction types that the per-transaction fee is charged for include: authorizations, capture, refunds, declines or other related transactions, completed or submitted within the payment gateway.</div>
            </div>
            <div class="col-md-8">
                Credit Card Per Transaction
            </div>
            <div class="col-md-3 fee">
2.9% + $0.30
            </div>
        </div>    

        <div class="row feeRow">
            <div class="col-md-1 info">
                <img class="hoverTip" src="/activation/Content/Activation/images/info.png" alt="Info" />
                <div class="hiddenTip">The chargeback fee is the penalty you pay when your customer successfully disputes a charge you make.</div>
            </div>
            <div class="col-md-8">
                Per Chargeback
            </div>
            <div class="col-md-3 fee">
                $25.00
            </div>
        </div> 
        <div class="row feeRow">
            <div class="col-md-1 info">
                <img class="hoverTip" src="/activation/Content/Activation/images/info.png" alt="Info" />
                <div class="hiddenTip">Fees for receiving payments from buyer with Credit Cards issued outside United States</div>
            </div>
            <div class="col-md-8">
                International Assessment
            </div>
            <div class="col-md-3 fee">
                1.5%
            </div>
        </div> 
        <div class="row feeRow">
            <div class="col-md-1 info">
                <img class="hoverTip" src="/activation/Content/Activation/images/info.png" alt="Info" />
                <div class="hiddenTip">Fees charged to process authorizations received over Phone</div>
            </div>
            <div class="col-md-8">
                Verbal Authorization
            </div>
            <div class="col-md-3 fee">
                $1.20
            </div>
        </div> 

    </div>
    <div>
            <div class="row">
                <div class="col-md-12 topPadding">
                    <h4>Additional Services</h4>
                </div>
            </div>
             <div class="row feeRow">
                <div class="col-md-1 info">
                    <img class="hoverTip" src="/activation/Content/Activation/images/info.png" alt="Info" />
                    <div class="hiddenTip">The monthly fee for the ability to process automated recurring billing transactions.</div>
                </div>
                <div class="col-md-9">
                    Automated Recurring Billing <sup>TM</sup>
                </div>
                <div class="col-md-2 fee">
                    Free
                </div>
            </div>
                <div class="row feeRow">
                    <div class="col-md-1 info">
                        <img class="hoverTip" src="/activation/Content/Activation/images/info.png" alt="Info" />
                        <div class="hiddenTip">The monthly fee for access to Authorize.Net’s fraud-fighting tools.</div>
                    </div>
                    <div class="col-md-9">
                        Advanced Fraud Detection Suite <sup>TM</sup>
                    </div>
                    <div class="col-md-2 fee">
                        Free
                    </div>
                </div>
                <div class="row feeRow">
                    <div class="col-md-1 info">
                        <img class="hoverTip" src="/activation/Content/Activation/images/info.png" alt="Info" />
                        <div class="hiddenTip">The monthly fee for the ability to create and manage customer subscriptions.</div>
                    </div>
                    <div class="col-md-9">
                        Customer Information Manager
                    </div>
                    <div class="col-md-2 fee">
                        Free
                    </div>
                </div>

    </div>


</div>
            </div>
            <div>
                
<div id="mccSelect">
    <div id="mccSelectCloseDiv">
        <span id="mccSelectClose" title="Close" aria-label="Close" role="button">
            X
        </span>
    </div>
    <div id="mccHeader" class="row">
        <div class="col-md-10">
            <h3>Industry / Merchant Category Code</h3>
        </div>
    </div>
	<div class="mccSelectInner">
		<div id="mccAbout">
			Select the Industry / Merchant Category Code which best fits your business
		</div>
		<div class="mccSearchBox">
			<div class="mccSearchBoxInner row" action="#">
                <div class="col-md-2 text-right">
                    <label for="mccSearchInput">Search</label>
                </div>
                <div class="col-md-8">
                    <input id="mccSearchInput" class="form-control" type="text">
                </div>
                <div class="col-md-2">
                    <input type="button" class="btn btn-primary" id="btnClearMcc" aria-label="Clear" value="Clear" />
                </div>
			</div>
		</div>
        <div class="row mccButtons">
            <div class="col-md-12 alignRight">
                <input type="button" class="btn btn-primary" id="btnSelectMcc" aria-label="Select MCC" value="Select MCC" />
                <input type="button" class="btn" id="btnCancelMcc" aria-label="Cancel" value="Cancel" />
            </div>
        </div>
	</div>
</div>

            </div>
</form>    </div>
    <div id="blanket"></div>
    <div id="notSupported">
        <div id="notSupportedInner">
            <div>You are either using an unsupported browser version or you are running IE in compatibility mode.</div>
            <div>
                <ul>
                    <li>Please use one of the following supported browser and versions:
                        <div>
                            <ul>
                                <li>Internet Explorer 8 or above</li>
                                <li>Chrome</li>
                                <li>Firefox</li>
                                <li>Safari</li>
                            </ul>
                        </div>
                    </li>
                    <li>If you are running IE in compatibility mode, please turn compatibility mode off.</li>
                </ul>
            </div>
        </div>
    </div>
<script type="text/javascript">
    var AnetB = AnetB || {};
    AnetB.Resource = {
        ActivationBaseUrl: '/activation/',
        AgreementUrl: 'https://account.authorize.net/interfaces/Legal/Merchant/Agreements/GW/1.0/agreement-authnet.htm',
        MerchantAgreementUrl: 'http://www.cybersource.com/resources/collateral/merchant_account/CMSA_CPSA.pdf',
        CybersourceMerchantAgreementUrl: 'http://www.cybersource.com/resources/collateral/merchant_account/CMSA_CPSA.pdf',
        DisclosureUrl: 'http://www.cybersource.com/resources/collateral/merchant_account/Disclosure.pdf',
        PowerPayMerchantAgreementUrl: 'http://www.powerpay.biz/docs/termsandconditions.pdf',
        SessionExpired: 'Page has Expired. Your page will reload after you click &quot;OK&quot;.',
        SsnLabel: 'SSN (last 4 digits)',
        SsnInfo: 'Please enter the last four digits of your Social Security Number, for security puposes.',
        SsnFullLabel: 'Owner&#39;s SSN',
        SinLabel: 'SIN (last 4 digits)',
        SinInfo: 'Please enter the last four digits of your Social Insurance Number, for security puposes.',
        SinFullLabel: 'Owner&#39;s SIN',
        ScriptVersion: '3',
        FolderImageSrc: '<img src="/activation/Content/Activation/images/folder.png" alt="Folder" />',
        PowerpayConditions: [{"Name":"US Resident","FieldToCheck":"OwnerInfo_Country","ConditionString":"US","ConditionEquals":true,"OrCondition":false},{"Name":"US Business","FieldToCheck":"BusinessInfo_Country","ConditionString":"US","ConditionEquals":true,"OrCondition":false},{"Name":"Affiliate","FieldToCheck":"IsUSDAffiliateReseller","ConditionString":"true","ConditionEquals":true,"OrCondition":true},{"Name":"AcquirerSet","FieldToCheck":"AcquirerSet","ConditionString":"IS - PowerPay-eOnlinedata","ConditionEquals":true,"OrCondition":true}],
        IdCheckConditions: [{"Name":"BypassIdentityCheck","FieldToCheck":"BypassIdentityCheck","ConditionString":"true","ConditionEquals":false,"OrCondition":false},{"Name":"Non-US Resident","FieldToCheck":"OwnerInfo_Country","ConditionString":"US","ConditionEquals":true,"OrCondition":false},{"Name":"Non-US Business","FieldToCheck":"BusinessInfo_Country","ConditionString":"US","ConditionEquals":true,"OrCondition":false},{"Name":"Affiliate","FieldToCheck":"IsUSDAffiliateReseller","ConditionString":"true","ConditionEquals":false,"OrCondition":false},{"Name":"AcquirerSet","FieldToCheck":"AcquirerSet","ConditionString":"IS - PowerPay-eOnlinedata","ConditionEquals":false,"OrCondition":false},{"Name":"Business Type","FieldToCheck":"BusinessInfo_BusinessType","ConditionString":"NonProfit","ConditionEquals":false,"OrCondition":false},{"Name":"Gateway Only","FieldToCheck":"GatewayOnly","ConditionString":"true","ConditionEquals":false,"OrCondition":false}]
    };
</script>



        <div id="push"></div>
    </div>
    <div id="footer">
        <div class="container">
            <div class="">
            <a target="_blank" href="http://www.authorize.net/company/terms/">Terms of Use</a>&nbsp;&nbsp;&nbsp;&nbsp;
                <a target="_blank" href="http://www.authorize.net/company/privacy/">Privacy Policy</a>
                <div>&#169; 2014. Authorize.Net. All rights reserved.</div>
            </div>
        </div>
    </div>
</body>
</html>