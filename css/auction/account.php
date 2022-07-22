<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Welcome to Auction on A Dime</title>
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<link href="css/style.css" type="text/css" rel="stylesheet" />
<link rel="stylesheet" href="css/font-awesome.min.css">

<!-- bootstrap -->
<link rel="stylesheet" href="css/bootstrap.min.css">

<!-- Custom CSS -->

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<!-- slider -->
<!-- Demo CSS -->
<link rel="stylesheet" href="css/demo.css" type="text/css" media="screen" />
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />

<!-- Modernizr -->
<script src="js/modernizr.js"></script>
</head>

<body>
<!-- header part -->
<?php include "includes/header.php"; ?>

<!-- end of header part --> 

<!-- navigation menu part -->

<nav class="navbar navbar-inverse" role="navigation">
  <div class="container"> 
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li> <a href="index.php">Home</a> </li>
          <li> <a href="#">Categories</a>
            <ul class="dropdown-menu">
              <li> <a href="#">Item 1</a> </li>
              <li> <a href="#">Item 2</a> </li>
              <li> <a href="#">Item 3</a> </li>
            </ul>
          </li>
          <li> <a href="#">How It Works</a> </li>
          <li> <a href="#">Buy Bids</a> </li>
          <li> <a href="#">Help</a> </li>
          <li> <a href="account.php">My Account</a> </li>
        </ul>
      </div>
      <!-- /.navbar-collapse --> 
    </div>
  </div>
  <!-- /.container --> 
</nav>
<div class="clearfix"></div>
<!-- end of navigation part --> 
<!-- account tabs -->
<div class="container">
  <div class="wc-user">
    <h2><span>Welcome!</span><br>
      User Name </h2>
  </div>
  <div class="user-pack">
    <div class="col-md-3 user-img"> <img src="images/client.jpg"><br>
      <a href="#">Change Avatar</a> </div>
    <div class="col-md-3 user-info">
      <h4><strong>Hi, User</strong></h4>
      <br>
      <p>Last Login : 2/15/2015</p>
      <p> Remaining Bids</p>
      <p>Real Bids 0</p>
      <p>Voucher Bids 0</p>
      <p>Total Bids 0 </p>
    </div>
    <div class="col-md-6 profile">
      <h3>My Profile</h3>
      <div class="clearfix"></div>
      <label>Name</label>
      <span>Jonson Miller</span>
      <div class="clearfix"></div>
      <label>Username</label>
      <span>Jonson</span>
      <div class="clearfix"></div>
      <label>Email</label>
      <span>abc@test.com <a href="#">(Update)</a></span>
      <div class="clearfix"></div>
      <label>TIme Zone</label>
      <span>
      <select id="accountTimezone" name="account_timezone">
        <option value="">N/A</option>
        <optgroup label="Africa">
        <option value="71"> -- Abidjan (GMT +0)</option>
        <option value="72"> -- Accra (GMT +0)</option>
        <option value="73"> -- Addis_Ababa (GMT +3)</option>
        <option value="74"> -- Algiers (GMT +1)</option>
        <option value="75"> -- Asmara (GMT +3)</option>
        <option value="76"> -- Bamako (GMT +0)</option>
        <option value="77"> -- Bangui (GMT +1)</option>
        <option value="78"> -- Banjul (GMT +0)</option>
        <option value="79"> -- Bissau (GMT +0)</option>
        <option value="80"> -- Blantyre (GMT +2)</option>
        <option value="81"> -- Brazzaville (GMT +1)</option>
        <option value="82"> -- Bujumbura (GMT +2)</option>
        <option value="83"> -- Cairo (GMT +2)</option>
        <option value="84"> -- Casablanca (GMT +0)</option>
        <option value="85"> -- Ceuta (GMT +1)</option>
        <option value="86"> -- Conakry (GMT +0)</option>
        <option value="87"> -- Dakar (GMT +0)</option>
        <option value="88"> -- Dar_es_Salaam (GMT +3)</option>
        <option value="89"> -- Djibouti (GMT +3)</option>
        <option value="90"> -- Douala (GMT +1)</option>
        <option value="91"> -- El_Aaiun (GMT +0)</option>
        <option value="92"> -- Freetown (GMT +0)</option>
        <option value="93"> -- Gaborone (GMT +2)</option>
        <option value="94"> -- Harare (GMT +2)</option>
        <option value="1"> -- Johannesburg (GMT +2)</option>
        <option value="95"> -- Juba (GMT +3)</option>
        <option value="96"> -- Kampala (GMT +3)</option>
        <option value="97"> -- Khartoum (GMT +3)</option>
        <option value="98"> -- Kigali (GMT +2)</option>
        <option value="99"> -- Kinshasa (GMT +1)</option>
        <option value="2"> -- Lagos (GMT +1)</option>
        <option value="100"> -- Libreville (GMT +1)</option>
        <option value="101"> -- Lome (GMT +0)</option>
        <option value="102"> -- Luanda (GMT +1)</option>
        <option value="103"> -- Lubumbashi (GMT +2)</option>
        <option value="104"> -- Lusaka (GMT +2)</option>
        <option value="105"> -- Malabo (GMT +1)</option>
        <option value="106"> -- Maputo (GMT +2)</option>
        <option value="107"> -- Maseru (GMT +2)</option>
        <option value="108"> -- Mbabane (GMT +2)</option>
        <option value="109"> -- Mogadishu (GMT +3)</option>
        <option value="110"> -- Monrovia (GMT +0)</option>
        <option value="111"> -- Nairobi (GMT +3)</option>
        <option value="112"> -- Ndjamena (GMT +1)</option>
        <option value="113"> -- Niamey (GMT +1)</option>
        <option value="114"> -- Nouakchott (GMT +0)</option>
        <option value="115"> -- Ouagadougou (GMT +0)</option>
        <option value="116"> -- Porto-Novo (GMT +1)</option>
        <option value="117"> -- Sao_Tome (GMT +0)</option>
        <option value="118"> -- Tripoli (GMT +2)</option>
        <option value="119"> -- Tunis (GMT +1)</option>
        <option value="3"> -- Windhoek (GMT +2)</option>
        </optgroup>
        <optgroup label="America">
        <option value="4"> -- Adak (GMT -10)</option>
        <option value="5"> -- Anchorage (GMT -9)</option>
        <option value="120"> -- Anguilla (GMT -4)</option>
        <option value="121"> -- Antigua (GMT -4)</option>
        <option value="122"> -- Araguaina (GMT -3)</option>
        <option value="6"> -- Argentina/Buenos_Aires (GMT -3)</option>
        <option value="123"> -- Argentina/Catamarca (GMT -3)</option>
        <option value="124"> -- Argentina/Cordoba (GMT -3)</option>
        <option value="125"> -- Argentina/Jujuy (GMT -3)</option>
        <option value="126"> -- Argentina/La_Rioja (GMT -3)</option>
        <option value="127"> -- Argentina/Mendoza (GMT -3)</option>
        <option value="128"> -- Argentina/Rio_Gallegos (GMT -3)</option>
        <option value="129"> -- Argentina/Salta (GMT -3)</option>
        <option value="130"> -- Argentina/San_Juan (GMT -3)</option>
        <option value="131"> -- Argentina/San_Luis (GMT -3)</option>
        <option value="132"> -- Argentina/Tucuman (GMT -3)</option>
        <option value="133"> -- Argentina/Ushuaia (GMT -3)</option>
        <option value="134"> -- Aruba (GMT -4)</option>
        <option value="7"> -- Asuncion (GMT -3)</option>
        <option value="135"> -- Atikokan (GMT -5)</option>
        <option value="136"> -- Bahia (GMT -3)</option>
        <option value="137"> -- Bahia_Banderas (GMT -6)</option>
        <option value="138"> -- Barbados (GMT -4)</option>
        <option value="139"> -- Belem (GMT -3)</option>
        <option value="140"> -- Belize (GMT -6)</option>
        <option value="141"> -- Blanc-Sablon (GMT -4)</option>
        <option value="142"> -- Boa_Vista (GMT -4)</option>
        <option value="8"> -- Bogota (GMT -5)</option>
        <option value="143"> -- Boise (GMT -7)</option>
        <option value="144"> -- Cambridge_Bay (GMT -7)</option>
        <option value="145"> -- Campo_Grande (GMT -4)</option>
        <option value="146"> -- Cancun (GMT -6)</option>
        <option value="9"> -- Caracas (GMT -4.5)</option>
        <option value="147"> -- Cayenne (GMT -3)</option>
        <option value="148"> -- Cayman (GMT -5)</option>
        <option selected="" value="10"> -- Chicago (GMT -6)</option>
        <option value="149"> -- Chihuahua (GMT -7)</option>
        <option value="150"> -- Costa_Rica (GMT -6)</option>
        <option value="151"> -- Cuiaba (GMT -4)</option>
        <option value="152"> -- Curacao (GMT -4)</option>
        <option value="153"> -- Danmarkshavn (GMT +0)</option>
        <option value="154"> -- Dawson (GMT -8)</option>
        <option value="155"> -- Dawson_Creek (GMT -7)</option>
        <option value="11"> -- Denver (GMT -7)</option>
        <option value="156"> -- Detroit (GMT -5)</option>
        <option value="157"> -- Dominica (GMT -4)</option>
        <option value="158"> -- Edmonton (GMT -7)</option>
        <option value="159"> -- Eirunepe (GMT -5)</option>
        <option value="160"> -- El_Salvador (GMT -6)</option>
        <option value="161"> -- Fortaleza (GMT -3)</option>
        <option value="162"> -- Glace_Bay (GMT -4)</option>
        <option value="12"> -- Godthab (GMT -3)</option>
        <option value="163"> -- Goose_Bay (GMT -4)</option>
        <option value="164"> -- Grand_Turk (GMT -5)</option>
        <option value="165"> -- Grenada (GMT -4)</option>
        <option value="166"> -- Guadeloupe (GMT -4)</option>
        <option value="13"> -- Guatemala (GMT -6)</option>
        <option value="167"> -- Guayaquil (GMT -5)</option>
        <option value="168"> -- Guyana (GMT -4)</option>
        <option value="14"> -- Halifax (GMT -4)</option>
        <option value="169"> -- Havana (GMT -5)</option>
        <option value="170"> -- Hermosillo (GMT -7)</option>
        <option value="171"> -- Indiana/Indianapolis (GMT -5)</option>
        <option value="172"> -- Indiana/Knox (GMT -6)</option>
        <option value="173"> -- Indiana/Marengo (GMT -5)</option>
        <option value="174"> -- Indiana/Petersburg (GMT -5)</option>
        <option value="175"> -- Indiana/Tell_City (GMT -6)</option>
        <option value="176"> -- Indiana/Vevay (GMT -5)</option>
        <option value="177"> -- Indiana/Vincennes (GMT -5)</option>
        <option value="178"> -- Indiana/Winamac (GMT -5)</option>
        <option value="179"> -- Inuvik (GMT -7)</option>
        <option value="180"> -- Iqaluit (GMT -5)</option>
        <option value="181"> -- Jamaica (GMT -5)</option>
        <option value="182"> -- Juneau (GMT -9)</option>
        <option value="183"> -- Kentucky/Louisville (GMT -5)</option>
        <option value="184"> -- Kentucky/Monticello (GMT -5)</option>
        <option value="185"> -- Kralendijk (GMT -4)</option>
        <option value="186"> -- La_Paz (GMT -4)</option>
        <option value="187"> -- Lima (GMT -5)</option>
        <option value="15"> -- Los_Angeles (GMT -8)</option>
        <option value="188"> -- Lower_Princes (GMT -4)</option>
        <option value="189"> -- Maceio (GMT -3)</option>
        <option value="190"> -- Managua (GMT -6)</option>
        <option value="191"> -- Manaus (GMT -4)</option>
        <option value="192"> -- Marigot (GMT -4)</option>
        <option value="193"> -- Martinique (GMT -4)</option>
        <option value="194"> -- Matamoros (GMT -6)</option>
        <option value="195"> -- Mazatlan (GMT -7)</option>
        <option value="196"> -- Menominee (GMT -6)</option>
        <option value="197"> -- Merida (GMT -6)</option>
        <option value="198"> -- Metlakatla (GMT -8)</option>
        <option value="199"> -- Mexico_City (GMT -6)</option>
        <option value="200"> -- Miquelon (GMT -3)</option>
        <option value="201"> -- Moncton (GMT -4)</option>
        <option value="202"> -- Monterrey (GMT -6)</option>
        <option value="16"> -- Montevideo (GMT -2)</option>
        <option value="203"> -- Montreal (GMT -5)</option>
        <option value="204"> -- Montserrat (GMT -4)</option>
        <option value="205"> -- Nassau (GMT -5)</option>
        <option value="17"> -- New_York (GMT -5)</option>
        <option value="206"> -- Nipigon (GMT -5)</option>
        <option value="207"> -- Nome (GMT -9)</option>
        <option value="18"> -- Noronha (GMT -2)</option>
        <option value="208"> -- North_Dakota/Beulah (GMT -6)</option>
        <option value="209"> -- North_Dakota/Center (GMT -6)</option>
        <option value="210"> -- North_Dakota/New_Salem (GMT -6)</option>
        <option value="211"> -- Ojinaga (GMT -7)</option>
        <option value="212"> -- Panama (GMT -5)</option>
        <option value="213"> -- Pangnirtung (GMT -5)</option>
        <option value="214"> -- Paramaribo (GMT -3)</option>
        <option value="19"> -- Phoenix (GMT -7)</option>
        <option value="215"> -- Port-au-Prince (GMT -5)</option>
        <option value="216"> -- Port_of_Spain (GMT -4)</option>
        <option value="217"> -- Porto_Velho (GMT -4)</option>
        <option value="218"> -- Puerto_Rico (GMT -4)</option>
        <option value="219"> -- Rainy_River (GMT -6)</option>
        <option value="220"> -- Rankin_Inlet (GMT -6)</option>
        <option value="221"> -- Recife (GMT -3)</option>
        <option value="222"> -- Regina (GMT -6)</option>
        <option value="223"> -- Resolute (GMT -6)</option>
        <option value="224"> -- Rio_Branco (GMT -5)</option>
        <option value="225"> -- Santa_Isabel (GMT -8)</option>
        <option value="226"> -- Santarem (GMT -3)</option>
        <option value="227"> -- Santiago (GMT -3)</option>
        <option value="20"> -- Santo_Domingo (GMT -4)</option>
        <option value="228"> -- Sao_Paulo (GMT -3)</option>
        <option value="229"> -- Scoresbysund (GMT -1)</option>
        <option value="230"> -- Shiprock (GMT -7)</option>
        <option value="231"> -- Sitka (GMT -9)</option>
        <option value="232"> -- St_Barthelemy (GMT -4)</option>
        <option value="21"> -- St_Johns (GMT -3.5)</option>
        <option value="233"> -- St_Kitts (GMT -4)</option>
        <option value="234"> -- St_Lucia (GMT -4)</option>
        <option value="235"> -- St_Thomas (GMT -4)</option>
        <option value="236"> -- St_Vincent (GMT -4)</option>
        <option value="237"> -- Swift_Current (GMT -6)</option>
        <option value="238"> -- Tegucigalpa (GMT -6)</option>
        <option value="239"> -- Thule (GMT -4)</option>
        <option value="240"> -- Thunder_Bay (GMT -5)</option>
        <option value="241"> -- Tijuana (GMT -8)</option>
        <option value="242"> -- Toronto (GMT -5)</option>
        <option value="243"> -- Tortola (GMT -4)</option>
        <option value="244"> -- Vancouver (GMT -8)</option>
        <option value="245"> -- Whitehorse (GMT -8)</option>
        <option value="246"> -- Winnipeg (GMT -6)</option>
        <option value="247"> -- Yakutat (GMT -9)</option>
        <option value="248"> -- Yellowknife (GMT -7)</option>
        </optgroup>
        <optgroup label="Antarctica">
        <option value="249"> -- Casey (GMT +8)</option>
        <option value="250"> -- Davis (GMT +7)</option>
        <option value="251"> -- DumontDUrville (GMT +10)</option>
        <option value="252"> -- Macquarie (GMT +11)</option>
        <option value="253"> -- Mawson (GMT +5)</option>
        <option value="254"> -- McMurdo (GMT +13)</option>
        <option value="255"> -- Palmer (GMT -3)</option>
        <option value="256"> -- Rothera (GMT -3)</option>
        <option value="257"> -- South_Pole (GMT +13)</option>
        <option value="258"> -- Syowa (GMT +3)</option>
        <option value="259"> -- Vostok (GMT +6)</option>
        </optgroup>
        <optgroup label="Arctic">
        <option value="260"> -- Longyearbyen (GMT +1)</option>
        </optgroup>
        <optgroup label="Asia">
        <option value="261"> -- Aden (GMT +3)</option>
        <option value="262"> -- Almaty (GMT +6)</option>
        <option value="263"> -- Amman (GMT +2)</option>
        <option value="264"> -- Anadyr (GMT +12)</option>
        <option value="265"> -- Aqtau (GMT +5)</option>
        <option value="266"> -- Aqtobe (GMT +5)</option>
        <option value="267"> -- Ashgabat (GMT +5)</option>
        <option value="22"> -- Baghdad (GMT +3)</option>
        <option value="268"> -- Bahrain (GMT +3)</option>
        <option value="269"> -- Baku (GMT +4)</option>
        <option value="270"> -- Bangkok (GMT +7)</option>
        <option value="23"> -- Beirut (GMT +2)</option>
        <option value="271"> -- Bishkek (GMT +6)</option>
        <option value="272"> -- Brunei (GMT +8)</option>
        <option value="273"> -- Choibalsan (GMT +8)</option>
        <option value="274"> -- Chongqing (GMT +8)</option>
        <option value="275"> -- Colombo (GMT +5.5)</option>
        <option value="276"> -- Damascus (GMT +2)</option>
        <option value="24"> -- Dhaka (GMT +6)</option>
        <option value="277"> -- Dili (GMT +9)</option>
        <option value="25"> -- Dubai (GMT +4)</option>
        <option value="278"> -- Dushanbe (GMT +5)</option>
        <option value="279"> -- Gaza (GMT +2)</option>
        <option value="280"> -- Harbin (GMT +8)</option>
        <option value="281"> -- Hebron (GMT +2)</option>
        <option value="282"> -- Ho_Chi_Minh (GMT +7)</option>
        <option value="283"> -- Hong_Kong (GMT +8)</option>
        <option value="284"> -- Hovd (GMT +7)</option>
        <option value="26"> -- Irkutsk (GMT +9)</option>
        <option value="27"> -- Jakarta (GMT +7)</option>
        <option value="285"> -- Jayapura (GMT +9)</option>
        <option value="286"> -- Jerusalem (GMT +2)</option>
        <option value="28"> -- Kabul (GMT +4.5)</option>
        <option value="29"> -- Kamchatka (GMT +12)</option>
        <option value="30"> -- Karachi (GMT +5)</option>
        <option value="287"> -- Kashgar (GMT +8)</option>
        <option value="31"> -- Kathmandu (GMT +5.75)</option>
        <option value="32"> -- Kolkata (GMT +5.5)</option>
        <option value="33"> -- Krasnoyarsk (GMT +8)</option>
        <option value="288"> -- Kuala_Lumpur (GMT +8)</option>
        <option value="289"> -- Kuching (GMT +8)</option>
        <option value="290"> -- Kuwait (GMT +3)</option>
        <option value="291"> -- Macau (GMT +8)</option>
        <option value="292"> -- Magadan (GMT +12)</option>
        <option value="293"> -- Makassar (GMT +8)</option>
        <option value="294"> -- Manila (GMT +8)</option>
        <option value="295"> -- Muscat (GMT +4)</option>
        <option value="296"> -- Nicosia (GMT +2)</option>
        <option value="297"> -- Novokuznetsk (GMT +7)</option>
        <option value="298"> -- Novosibirsk (GMT +7)</option>
        <option value="34"> -- Omsk (GMT +7)</option>
        <option value="299"> -- Oral (GMT +5)</option>
        <option value="300"> -- Phnom_Penh (GMT +7)</option>
        <option value="301"> -- Pontianak (GMT +7)</option>
        <option value="302"> -- Pyongyang (GMT +9)</option>
        <option value="303"> -- Qatar (GMT +3)</option>
        <option value="304"> -- Qyzylorda (GMT +6)</option>
        <option value="35"> -- Rangoon (GMT +6.5)</option>
        <option value="305"> -- Riyadh (GMT +3)</option>
        <option value="306"> -- Sakhalin (GMT +11)</option>
        <option value="307"> -- Samarkand (GMT +5)</option>
        <option value="308"> -- Seoul (GMT +9)</option>
        <option value="36"> -- Shanghai (GMT +8)</option>
        <option value="309"> -- Singapore (GMT +8)</option>
        <option value="310"> -- Taipei (GMT +8)</option>
        <option value="311"> -- Tashkent (GMT +5)</option>
        <option value="312"> -- Tbilisi (GMT +4)</option>
        <option value="37"> -- Tehran (GMT +3.5)</option>
        <option value="313"> -- Thimphu (GMT +6)</option>
        <option value="38"> -- Tokyo (GMT +9)</option>
        <option value="314"> -- Ulaanbaatar (GMT +8)</option>
        <option value="315"> -- Urumqi (GMT +8)</option>
        <option value="316"> -- Vientiane (GMT +7)</option>
        <option value="39"> -- Vladivostok (GMT +11)</option>
        <option value="40"> -- Yakutsk (GMT +10)</option>
        <option value="41"> -- Yekaterinburg (GMT +6)</option>
        <option value="42"> -- Yerevan (GMT +4)</option>
        </optgroup>
        <optgroup label="Atlantic">
        <option value="43"> -- Azores (GMT -1)</option>
        <option value="317"> -- Bermuda (GMT -4)</option>
        <option value="318"> -- Canary (GMT +0)</option>
        <option value="44"> -- Cape_Verde (GMT -1)</option>
        <option value="319"> -- Faroe (GMT +0)</option>
        <option value="320"> -- Madeira (GMT +0)</option>
        <option value="321"> -- Reykjavik (GMT +0)</option>
        <option value="322"> -- South_Georgia (GMT -2)</option>
        <option value="323"> -- St_Helena (GMT +0)</option>
        <option value="324"> -- Stanley (GMT -3)</option>
        </optgroup>
        <optgroup label="Australia">
        <option value="45"> -- Adelaide (GMT +10.5)</option>
        <option value="46"> -- Brisbane (GMT +10)</option>
        <option value="325"> -- Broken_Hill (GMT +10.5)</option>
        <option value="326"> -- Currie (GMT +11)</option>
        <option value="47"> -- Darwin (GMT +9.5)</option>
        <option value="48"> -- Eucla (GMT +8.75)</option>
        <option value="327"> -- Hobart (GMT +11)</option>
        <option value="328"> -- Lindeman (GMT +10)</option>
        <option value="49"> -- Lord_Howe (GMT +11)</option>
        <option value="329"> -- Melbourne (GMT +11)</option>
        <option value="330"> -- Perth (GMT +8)</option>
        <option value="50"> -- Sydney (GMT +11)</option>
        </optgroup>
        <optgroup label="Europe">
        <option value="331"> -- Amsterdam (GMT +1)</option>
        <option value="332"> -- Andorra (GMT +1)</option>
        <option value="333"> -- Athens (GMT +2)</option>
        <option value="334"> -- Belgrade (GMT +1)</option>
        <option value="54"> -- Berlin (GMT +1)</option>
        <option value="335"> -- Bratislava (GMT +1)</option>
        <option value="336"> -- Brussels (GMT +1)</option>
        <option value="337"> -- Bucharest (GMT +2)</option>
        <option value="338"> -- Budapest (GMT +1)</option>
        <option value="339"> -- Chisinau (GMT +2)</option>
        <option value="340"> -- Copenhagen (GMT +1)</option>
        <option value="341"> -- Dublin (GMT +0)</option>
        <option value="342"> -- Gibraltar (GMT +1)</option>
        <option value="343"> -- Guernsey (GMT +0)</option>
        <option value="344"> -- Helsinki (GMT +2)</option>
        <option value="345"> -- Isle_of_Man (GMT +0)</option>
        <option value="346"> -- Istanbul (GMT +2)</option>
        <option value="347"> -- Jersey (GMT +0)</option>
        <option value="348"> -- Kaliningrad (GMT +3)</option>
        <option value="349"> -- Kiev (GMT +2)</option>
        <option value="350"> -- Lisbon (GMT +0)</option>
        <option value="351"> -- Ljubljana (GMT +1)</option>
        <option value="55"> -- London (GMT +0)</option>
        <option value="352"> -- Luxembourg (GMT +1)</option>
        <option value="353"> -- Madrid (GMT +1)</option>
        <option value="354"> -- Malta (GMT +1)</option>
        <option value="355"> -- Mariehamn (GMT +2)</option>
        <option value="356"> -- Minsk (GMT +3)</option>
        <option value="357"> -- Monaco (GMT +1)</option>
        <option value="56"> -- Moscow (GMT +4)</option>
        <option value="358"> -- Oslo (GMT +1)</option>
        <option value="359"> -- Paris (GMT +1)</option>
        <option value="360"> -- Podgorica (GMT +1)</option>
        <option value="361"> -- Prague (GMT +1)</option>
        <option value="362"> -- Riga (GMT +2)</option>
        <option value="363"> -- Rome (GMT +1)</option>
        <option value="364"> -- Samara (GMT +4)</option>
        <option value="365"> -- San_Marino (GMT +1)</option>
        <option value="366"> -- Sarajevo (GMT +1)</option>
        <option value="367"> -- Simferopol (GMT +2)</option>
        <option value="368"> -- Skopje (GMT +1)</option>
        <option value="369"> -- Sofia (GMT +2)</option>
        <option value="370"> -- Stockholm (GMT +1)</option>
        <option value="371"> -- Tallinn (GMT +2)</option>
        <option value="372"> -- Tirane (GMT +1)</option>
        <option value="373"> -- Uzhgorod (GMT +2)</option>
        <option value="374"> -- Vaduz (GMT +1)</option>
        <option value="375"> -- Vatican (GMT +1)</option>
        <option value="376"> -- Vienna (GMT +1)</option>
        <option value="377"> -- Vilnius (GMT +2)</option>
        <option value="378"> -- Volgograd (GMT +4)</option>
        <option value="379"> -- Warsaw (GMT +1)</option>
        <option value="380"> -- Zagreb (GMT +1)</option>
        <option value="381"> -- Zaporozhye (GMT +2)</option>
        <option value="382"> -- Zurich (GMT +1)</option>
        </optgroup>
        <optgroup label="Indian">
        <option value="383"> -- Antananarivo (GMT +3)</option>
        <option value="384"> -- Chagos (GMT +6)</option>
        <option value="385"> -- Christmas (GMT +7)</option>
        <option value="386"> -- Cocos (GMT +6.5)</option>
        <option value="387"> -- Comoro (GMT +3)</option>
        <option value="388"> -- Kerguelen (GMT +5)</option>
        <option value="389"> -- Mahe (GMT +4)</option>
        <option value="390"> -- Maldives (GMT +5)</option>
        <option value="391"> -- Mauritius (GMT +4)</option>
        <option value="392"> -- Mayotte (GMT +3)</option>
        <option value="393"> -- Reunion (GMT +4)</option>
        </optgroup>
        <optgroup label="Pacific">
        <option value="57"> -- Apia (GMT +14)</option>
        <option value="58"> -- Auckland (GMT +13)</option>
        <option value="59"> -- Chatham (GMT +13.75)</option>
        <option value="394"> -- Chuuk (GMT +10)</option>
        <option value="60"> -- Easter (GMT -5)</option>
        <option value="395"> -- Efate (GMT +11)</option>
        <option value="396"> -- Enderbury (GMT +13)</option>
        <option value="397"> -- Fakaofo (GMT +13)</option>
        <option value="398"> -- Fiji (GMT +12)</option>
        <option value="399"> -- Funafuti (GMT +12)</option>
        <option value="400"> -- Galapagos (GMT -6)</option>
        <option value="61"> -- Gambier (GMT -9)</option>
        <option value="401"> -- Guadalcanal (GMT +11)</option>
        <option value="402"> -- Guam (GMT +10)</option>
        <option value="62"> -- Honolulu (GMT -10)</option>
        <option value="403"> -- Johnston (GMT -10)</option>
        <option value="63"> -- Kiritimati (GMT +14)</option>
        <option value="404"> -- Kosrae (GMT +11)</option>
        <option value="405"> -- Kwajalein (GMT +12)</option>
        <option value="406"> -- Majuro (GMT +12)</option>
        <option value="64"> -- Marquesas (GMT -9.5)</option>
        <option value="407"> -- Midway (GMT -11)</option>
        <option value="408"> -- Nauru (GMT +12)</option>
        <option value="409"> -- Niue (GMT -11)</option>
        <option value="65"> -- Norfolk (GMT +11.5)</option>
        <option value="66"> -- Noumea (GMT +11)</option>
        <option value="67"> -- Pago_Pago (GMT -11)</option>
        <option value="410"> -- Palau (GMT +9)</option>
        <option value="68"> -- Pitcairn (GMT -8)</option>
        <option value="411"> -- Pohnpei (GMT +11)</option>
        <option value="412"> -- Port_Moresby (GMT +10)</option>
        <option value="413"> -- Rarotonga (GMT -10)</option>
        <option value="414"> -- Saipan (GMT +10)</option>
        <option value="415"> -- Tahiti (GMT -10)</option>
        <option value="69"> -- Tarawa (GMT +12)</option>
        <option value="70"> -- Tongatapu (GMT +13)</option>
        <option value="416"> -- Wake (GMT +12)</option>
        <option value="417"> -- Wallis (GMT +12)</option>
        </optgroup>
        <option value="418">UTC (GMT +0)</option>
      </select>
      <a href="#">(Update)</a></span>
      <div class="clearfix"></div>
      <label>Address</label>
      <span>Cape Town</span>
      <div class="clearfix"></div>
      <p><a href="#">Change Password</a></p>
      <br>
      <br>
      <h3>My Addresses</h3>
      <div class="add">
        <p><strong>Shipping</strong><br>
          No Shipping Addresses Saved </p>
      </div>
      <div class="add">
        <p><strong>Billing</strong><br>
          No Shipping Addresses Saved </p>
      </div>
    </div>
  </div>
  <div class="clearfix"></div>
  
  <!--Horizontal Tab-->
  <div id="horizontalTab">
    <ul>
      <li><a href="#tab-1">Bidding History</a></li>
      <li><a href="#tab-2">Payment Info</a></li>
      <li><a href="#tab-3">Won Auctions</a></li>
      <li><a href="#tab-3">Bid Credit History</a></li>
      <li><a href="#tab-4">Auction Limits</a></li>
      <li><a href="#tab-5">Order History</a></li>
    </ul>
    <div id="tab-1">
      <h4>Recent Participation</h4>
      <div class="clearfix"></div>
      <div class="col-md-2">
        <h5>Auction ID</h5>
        <p>E000f#</p>
      </div>
      <div class="col-md-4">
        <h5>Item</h5>
        <span style="float:left">Beats Headphone</span> <span style="float:right"><img src="images/pic1.jpg"> </span></div>
      <div class="col-md-1">
        <h5>Ended</h5>
        <p>14/5/2014</p>
      </div>
      <div class="col-md-2">
        <h5>Status</h5>
        <p>Active</p>
      </div>
      <div class="col-md-2">
        <h5>Winner</h5>
        <p>ABC Company</p>
      </div>
      <div class="col-md-1">
        <h5>Bids</h5>
        <p>45</p>
      </div>
      <div class="clearfix"> <br>
        <br>
      </div>
      <h4>Past Participation</h4>
      <div class="clearfix"></div>
      <div class="col-md-2">
        <h5>Auction ID</h5>
        <p>E000f#</p>
      </div>
      <div class="col-md-4">
        <h5>Item</h5>
        <span style="float:left">Beats Headphone</span> <span style="float:right"><img src="images/pic1.jpg"> </span> </div>
      <div class="col-md-1">
        <h5>Ended</h5>
        <p>14/5/2014</p>
      </div>
      <div class="col-md-2">
        <h5>Status</h5>
        <p>Active</p>
      </div>
      <div class="col-md-2">
        <h5>Winner</h5>
        <p>ABC Company</p>
      </div>
      <div class="col-md-1">
        <h5>Bids</h5>
        <p>45</p>
      </div>
    </div>
    <div id="tab-2">
      
    </div>
    <div id="tab-3">
      <p>Mauris facilisis elit ut sem eleifend accumsan molestie sit amet dolor. Pellentesque dapibus arcu eu lorem laoreet, vitae cursus metus mattis. Nullam eget porta enim, eu rutrum magna. Duis quis tincidunt sem, sit amet faucibus magna. Integer commodo, turpis consequat fermentum egestas, leo odio posuere dui, elementum placerat eros erat id augue. Nullam at eros eget urna vestibulum malesuada vitae eu mauris. Aliquam interdum rhoncus velit, quis scelerisque leo viverra non. Suspendisse id feugiat dui. Nulla in aliquet leo. Proin vel magna sed est gravida rhoncus. Mauris lobortis condimentum nibh, vitae bibendum tortor vehicula ac. Curabitur posuere arcu eros.</p>
    </div>
    <div id="tab-4">
      <p>Donec egestas facilisis sapien sit amet euismod. Donec mollis lectus neque, in consectetur magna sodales et. Nam rutrum libero vitae magna sollicitudin aliquet. In tristique ultrices euismod. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Suspendisse pretium congue sodales. Curabitur egestas, metus sed ultrices suscipit, metus nibh vehicula ligula, vel volutpat sapien nibh sed quam. Etiam elementum nisi eu risus congue, ut eleifend lectus ultricies. Vivamus in ligula fermentum, bibendum sapien eget, pretium est. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Donec ut ante non risus rutrum faucibus.</p>
    </div>
    <div id="tab-5">
      <p>Proin dignissim faucibus odio sollicitudin sagittis. Phasellus aliquet, erat vitae mollis consectetur, enim lectus ornare libero, et porta mi dui eu tellus. Morbi lobortis, elit at euismod porta, magna lacus mattis massa, a lacinia ligula risus et lectus. Sed et aliquam ligula. Nunc venenatis orci magna, quis facilisis sem porta non. Nunc sodales arcu in consectetur malesuada. Maecenas varius justo lacus, scelerisque viverra tellus luctus eu. Nam imperdiet ultricies suscipit. Ut urna mauris, eleifend quis lacinia non, mollis id libero. Praesent pharetra viverra ipsum at posuere. Quisque commodo tortor nec hendrerit faucibus. Fusce convallis urna et vehicula tincidunt. Duis sed vehicula justo, eu placerat nisi. Donec facilisis augue non turpis semper, eget condimentum mauris malesuada. Nunc in dignissim mi, sed laoreet felis.</p>
    </div>
  </div>
  
  <div class="col-md-6 sup">
  	<h3>Special Offers</h3>
    <div class="content">
					<p>Subscribe to QuiBids promotional email for special offers to receive free bids, rewards, news on site features, and more!					<br>
					<strong>Note</strong>: These preferences do not apply to transactional emails such as order confirmations account changes.</p>
					<form>
						<input type="hidden" value="update" name="action">
						<fieldset>
							<input type="radio" value="Yes" class="checkbox" name="EmailNewsletter">
							Yes. I want to get offers for Free Bids and other QuiBids promotions!							<br>
							<input type="radio" checked="checked" value="No" class="checkbox" name="EmailNewsletter">
							No Thanks. I do not want offers for free bids or QuiBids promotions.						</fieldset>
						<br><br><br>
						<input type="submit" value="Update" class="btn-green" style="float:right">
					</form>
				</div>
  </div>
  <div class="col-md-6 sup"><h3>Contact Support</h3>
  <p>Got a question? We’ve got answers. For simple solutions, check out our easy-to-access <a href="#">Help</a> section.</p>
  </div>
  <!--  <p class="info"></p>  -->
  <div class="clearfix"></div>
</div>
<!-- products part --> 

<!-- footer -->
<?php include "includes/footer.php"; ?>
<!-- jQuery with fallback to the 1.* for old IE --> 
<!--[if lt IE 9]>
        <script src="js/jquery-1.11.0.min.js"></script>
    <![endif]--> 
<!--[if gte IE 9]><!--> 
<script src="js/jquery-2.1.0.min.js"></script> 
<!--<![endif]--> 

<!-- Responsive Tabs JS --> 
<script src="js/jquery.responsiveTabs.js" type="text/javascript"></script> 
<script type="text/javascript">
        $(document).ready(function () {
            $('#horizontalTab').responsiveTabs({
                rotate: false,
                startCollapsed: 'accordion',
                collapsible: 'accordion',
                setHash: true,
                disabled: [],
                activate: function(e, tab) {
                    $('.info').html('Tab <strong>' + tab.id + '</strong> activated!');
                },
                activateState: function(e, state) {
                    //console.log(state);
                    $('.info').html('Switched from <strong>' + state.oldState + '</strong> state to <strong>' + state.newState + '</strong> state!');
                }
            });

            $('#start-rotation').on('click', function() {
                $('#horizontalTab').responsiveTabs('startRotation', 1000);
            });
            $('#stop-rotation').on('click', function() {
                $('#horizontalTab').responsiveTabs('stopRotation');
            });
            $('#start-rotation').on('click', function() {
                $('#horizontalTab').responsiveTabs('active');
            });
            $('.select-tab').on('click', function() {
                $('#horizontalTab').responsiveTabs('activate', $(this).val());
            });

        });
    </script>
</html>