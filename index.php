<? php
echo '<html>';
echo '<head>';
echo '<title></title>';
echo '<style>';
echo '';
echo 'body {';
echo 'font-family: Interstate-light;';
echo 'margin: 0;';
echo 'padding: 0;';
echo 'background: url(images/background.gif)  #d5d5d5 repeat-x;';
echo 'background-attachment:fixed;';
echo '}';
echo 'a {';
echo 'text-decoration: none;';
echo 'color: #D54321;';
echo '}';
echo '@font-face {';
echo 'font-family: Interstate-light;';
echo 'src: url('fonts/interstate.ttf');';
echo '}';
echo 'colgroup {';
echo 'color:#335;';
echo '}';
echo '';
echo 'header {';
echo 'margin: 22px;';
echo '}';
echo '';
echo 'header div#title {';
echo 'float:left;';
echo 'color: #1472b4;';
echo 'font-size: 18px;';
echo 'border-left: 1px solid #bbb;';
echo 'padding: 3px 0 3px 10px;';
echo 'margin-left: 10px;';
echo '}';
echo '';
echo 'header img { float:left; }';
echo '';
echo 'header ul {';
echo 'margin:0;';
echo 'padding:0;';
echo 'float:right;';
echo '';
echo '}';
echo 'header ul li {';
echo 'float: left;';
echo 'margin: 3px 0 0 15px;';
echo 'font-size: 12px;';
echo 'color: #555;';
echo 'list-style:none;';
echo '';
echo '';
echo '}';
echo 'h2 {';
echo '-webkit-transform: rotate(270deg);';
echo '-moz-transform: rotate(270deg);';
echo '-ms-transform: rotate(90deg);';
echo '-o-transform: rotate(90deg);';
echo 'transform: rotate(270deg);';
echo 'font-family: Interstate-light;';
echo 'line-height: 24px;';
echo 'font-size: 16px;';
echo 'color:#999;';
echo 'text-align: left;';
echo 'font-weight:normal;';
echo 'padding: 0;';
echo 'margin: 0;';
echo '}';
echo 'table {';
echo 'border-collapse: collapse;';
echo 'margin: auto auto;';
echo 'padding-bottom:0px;';
echo '}';
echo 'td {';
echo 'font-size: 12px;';
echo 'color: #555;';
echo 'text-align: center;';
echo 'border-bottom: 1px solid #bbb;';
echo 'box-shadow: 0 2px 0 #efefef;';
echo '-moz-box-shadow: 0 2px 0 #efefef;';
echo '-webkit-box-shadow: 0 2px 0 #efefef;';
echo 'padding: 30px 25px 30px 25px;';
echo 'vertical-align: middle;';
echo '}';
echo 'td p {';
echo 'margin:0;';
echo 'padding:0;';
echo '}';
echo 'tr:last-child td, tr:last-child th {';
echo 'border:none;';
echo 'box-shadow: none;';
echo '-moz-box-shadow: none;';
echo '-webkit-box-shadow: none;';
echo '}';
echo 'th {';
echo 'border-bottom: 1px solid #bbb;';
echo 'box-shadow: 0 2px 0 #efefef;';
echo '-moz-box-shadow: 0 2px 0 #efefef;';
echo '-webkit-box-shadow: 0 2px 0 #efefef;';
echo 'margin:0;';
echo 'padding:0;';
echo '}';
echo '';
echo 'div#main {';
echo 'overflow:auto;';
echo 'margin-bottom:90px;';
echo 'vertical-align: middle;';
echo '}';
echo '';
echo 'footer {';
echo '';
echo 'background-color: #eee;';
echo 'height: 40px;';
echo 'position:fixed;';
echo 'bottom:0;';
echo 'width: 100%;';
echo 'font-size: 12px;';
echo 'line-height: 18px;';
echo 'text-align: center;';
echo 'padding-top: 26px;';
echo 'color: #aaa;';
echo '}';
echo 'footer span {';
echo 'color:#333;';
echo '}';
echo '';
echo '/* Images sprites */';
echo 'td div.icon_bg {';
echo 'height: 70px;';
echo 'width: 70px;';
echo 'margin-bottom: 0;';
echo 'display:inline-block;';
echo 'clear:right;';
echo '}';
echo 'div#main td.icon_hover {';
echo 'background: url('images/td_background.png') no-repeat -44px -40px;';
echo '}';
echo '';
echo 'td a {';
echo 'color: #555;';
echo '}';
echo '';
echo '';
echo '';
echo '/* employees */';
echo 'div#ec_mail_logo { background: url('images/icons_sprite.png') no-repeat -576px 0;}';
echo 'div#ec_inside_logo { background: url('images/icons_sprite.png') no-repeat -433px -70px; }';
echo 'div#tlo_logo { background: url('images/icons_sprite.png') no-repeat -506px -70px; }';
echo 'div#hronline_logo { background: url('images/icons_sprite.png') no-repeat -576px -70px; }';
echo 'div#referrals_logo { background: url('images/icons_sprite.png') no-repeat -720px -70px; }';
echo 'div#share411_logo { background: url('images/icons_sprite.png') no-repeat -650px -70px; }';
echo 'div#watercooler_logo { background: url('images/icons_sprite.png') no-repeat -288px -70px; }';
echo '';
echo '/* bd */';
echo 'div#ec_bd_logo { background: url('images/icons_sprite.png') no-repeat -358px 0; }';
echo 'div#basecamp_logo { background: url('images/icons_sprite.png') no-repeat -145px -0; }';
echo 'div#highrise_logo { background: url('images/icons_sprite.png') no-repeat -72px -0; }';
echo 'div#input_logo { background: url('images/icons_sprite.png') no-repeat -793px 0; }';
echo '';
echo '/* recruiting */';
echo 'div#ec_recruiting_logo { background: url('images/icons_sprite.png') no-repeat -358px 0; }';
echo 'div#jobvite_logo { background: url('images/icons_sprite.png') no-repeat -288px 0; }';
echo 'div#monster_logo { background: url('images/icons_sprite.png') no-repeat -218px 0; }';
echo 'div#i2s_logo { background: url('images/icons_sprite.png') no-repeat 0 -70px; }';
echo 'div#referrals_admin_logo { background: url('images/icons_sprite.png') no-repeat -792px -70px; }';
echo '</style>';
echo '<script src="scripts/jquery-1.5.1.min.js"></script>';
echo '';
echo '';
echo '</head>';
echo '<body>';
echo '<!--';
echo 'launch.htm';
echo 'evanschambers.com';
echo 'Created by Jamil Evans on 2011-10-07.';
echo 'Copyright 2011 Jamil Evans. All rights reserved.';
echo '-->';
echo '<header style="">';
echo '<img src="images/logo_ec_small.png"/>';
echo '<div id="title">Launchpad</div>';
echo '<ul>';
echo '<li>Jamil Evans (admin)</li>';
echo '<li><a href="#">Customize</a></li>';
echo '<li><a href="#">Administration</a></li>';
echo '<li><a href="#">Signout</a></li>';
echo '</ul>';
echo '<br style="clear:both" />';
echo '</header>';
echo '<div id="main">';
echo '<table border="0">';
echo '<colgroup span="2" style="font-size: 20px;"></colgroup>';
echo '<tr>';
echo '<th><h2><br/>Employees</h2></th>';
echo '<td>';
echo '<a href="http://mail.evanschambers.com">';
echo '<div id="ec_mail_logo" class="icon_bg"></div>';
echo '<p>EC Mail</p>';
echo '</a>';
echo '</td>';
echo '<td>';
echo '<a href="https://sites.google.com/a/evanschambers.com/ec-inside-new/">';
echo '<div id="ec_inside_logo" class="icon_bg"></div>';
echo '<p>EC Inside</p>';
echo '</a>';
echo '</td>';
echo '<td>';
echo '<a href="https://sites.google.com/a/evanschambers.com/ec-inside-new/home/timesheet">';
echo '<div id="tlo_logo" class="icon_bg"></div>';
echo '<p>Time & Labor</p>';
echo '</a>';
echo '</td>';
echo '<td>';
echo '<a href="https://eservices.paychex.com/secure/">';
echo '<div id="hronline_logo" class="icon_bg"></div>';
echo '<p>HR Online</p>';
echo '</a>';
echo '</td>';
echo '<td>';
echo '<a href="http://www.evanschambers.com/secure/login.php">';
echo '<div id="referrals_logo" class="icon_bg"></div>';
echo '<p>Submit a Referral</p>';
echo '</a>';
echo '</td>';
echo '<td>';
echo '<a href="">';
echo '<div id="share411_logo" class="icon_bg"></div>';
echo '<p>Share411</p>';
echo '</a>';
echo '</td>';
echo '<!--<td>';
echo '<div id="watercooler_logo" class="icon_bg"></div>';
echo '<p>Water Cooler</p>';
echo '</td> -->';
echo '</tr>';
echo '<tr>';
echo '<th><h2><br/>Recruiters</h2></th>';
echo '<td>';
echo '<a href="https://sites.google.com/a/evanschambers.com/ec-recruiting/">';
echo '<div id="ec_recruiting_logo" class="icon_bg"></div>';
echo '<p>Recruiting Site</p>';
echo '</a>';
echo '</td>';
echo '<td>';
echo '<a href="https://source.jobvite.com/TalentNetwork/common/sso.html?from=google&stage=discovery&domain=evanschambers.com">';
echo '<div id="jobvite_logo" class="icon_bg"></div>';
echo '<p>Jobvite</p>';
echo '</a>';
echo '</td>';
echo '<td>';
echo '<a href="http://hiring.monster.com/">';
echo '<div id="monster_logo" class="icon_bg"></div>';
echo '<p>Monster</p>';
echo '</a>';
echo '</td>';
echo '<td>';
echo '<a href="https://ccesc2.gdit.com/dana-na/auth/url_28/welcome.cgi">';
echo '<div id="i2s_logo" class="icon_bg"></div>';
echo '<p>GD i2S Portal</p>';
echo '</a>';
echo '</td>';
echo '<td>';
echo '<a href="" onclick="alert('URL not yet added'); return false;">';
echo '<div id="referrals_admin_logo" class="icon_bg"></div>';
echo '<p>Referrals Admin</p>';
echo '</a>';
echo '</td>';
echo '<td>';
echo '&nbsp;';
echo '</td>';
echo '<td>';
echo '&nbsp;';
echo '</td>';
echo '</tr>';
echo '<tr>';
echo '<th><h2>Business<br/>Managers</h2></th>';
echo '<td>';
echo '<a href="https://sites.google.com/a/evanschambers.com/ec-business-development/">';
echo '<div id="ec_bd_logo" class="icon_bg"></div>';
echo '<p>BD Site</p>';
echo '</a>';
echo '</td>';
echo '<td>';
echo '<a href="https://ectech.basecamphq.com/clients">';
echo '<div id="basecamp_logo" class="icon_bg"></div>';
echo '<p>Basecamp</p>';
echo '</a>';
echo '</td>';
echo '<td>';
echo '<a href="https://ectech.highrisehq.com/account">';
echo '<div id="highrise_logo" class="icon_bg"></div>';
echo '<p>Highrise</p>';
echo '</a>';
echo '</td>';
echo '<td>';
echo '<a href="https://www.input.com/login/loginPage.cfm?">';
echo '<div id="input_logo" class="icon_bg"></div>';
echo '<p>Input</p>';
echo '</a>';
echo '</td>';
echo '<td>';
echo '&nbsp;';
echo '</td>';
echo '<td>';
echo '&nbsp;';
echo '</td>';
echo '<td>';
echo '&nbsp;';
echo '</td>';
echo '</tr>';
echo '';
echo '<!--';
echo '<tr>';
echo '<th><h2><br/>Marketing</h2></th>';
echo '<td>';
echo '<img src="images/icon_ecsite.png"/><br/>';
echo 'EC Marketing';
echo '</td>';
echo '<td>';
echo '<img src="images/icon_ecsite.png"/><br/>';
echo 'Mailchimp';
echo '</td>';
echo '<td>';
echo '<img src="images/icon_ecsite.png"/><br/>';
echo 'Google Analytics';
echo '</td>';
echo '<td>';
echo '<a href="https://www.smartsheet.com/b/openid/ga/evanschambers.com?gapp=505">';
echo '<img src="images/icon_ecsite.png"/><br/>';
echo 'Smartsheet';
echo '</a>';
echo '</td>';
echo '<td>';
echo '<img src="images/icon_ecsite.png"/><br/>';
echo 'Share411 Admin';
echo '</td>';
echo '</tr>';
echo '-->';
echo '</table>';
echo '</div>';
echo '<footer>';
echo '<span>EC Launchpad</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
echo 'Version <a href="#">1.0a</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
echo '8 Oct 2011';
echo '</footer>';
echo '';
echo '<script>';
echo '<!--';
echo '$('div.icon_bg').hover(function(){';
echo '$(this).parent().parent().addClass('icon_hover');';
echo '}, function() {';
echo '$(this).parent().parent().removeClass('icon_hover');';
echo '});';
echo '-->';
echo '</script>';
echo '</body>';
echo '</html>';
?>
