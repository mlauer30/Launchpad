<html>
	<head>
		<title></title>
		<style>

			body {
				font-family: Interstate-light;
				margin: 0;
				padding: 0;
				background: url(images/background.gif)  #d5d5d5 repeat-x;
				background-attachment:fixed;
			}
			a {
				text-decoration: none;
				color: #D54321;
			}
			@font-face {
				font-family: Interstate-light;
				src: url('fonts/interstate.ttf');
			}
			colgroup {
				color:#335;
			}
			
			header {
				margin: 22px;
			}
			
			header div#title {
				float:left;	
				color: #1472b4;
				font-size: 18px;
				border-left: 1px solid #bbb;
				padding: 3px 0 3px 10px;
				margin-left: 10px;	
			}
			
			header img { float:left; }
		
			header ul {
				margin:0;
				padding:0;
				float:right;
				
			}
			header ul li {
				float: left;
				margin: 3px 0 0 15px;
				font-size: 12px;
				color: #555;
				list-style:none;
				
				
			}
			h2 {
				-webkit-transform: rotate(270deg);	
				-moz-transform: rotate(270deg);
				-ms-transform: rotate(90deg);
				-o-transform: rotate(90deg);
				transform: rotate(270deg);
				font-family: Interstate-light;
				line-height: 24px;
				font-size: 16px;
				color:#999;
				text-align: left;
				font-weight:normal;
				padding: 0;
				margin: 0;
			}
			table {
				border-collapse: collapse;
				margin: auto auto;
				padding-bottom:0px;
			}
			td {
				font-size: 12px;
				color: #555;
				text-align: center;
				border-bottom: 1px solid #bbb;
				box-shadow: 0 2px 0 #efefef;
				-moz-box-shadow: 0 2px 0 #efefef;
  				-webkit-box-shadow: 0 2px 0 #efefef;
				padding: 30px 25px 30px 25px;
				vertical-align: middle;
			}
			td p {
				margin:0;
				padding:0;
			}
			tr:last-child td, tr:last-child th {
				border:none;
				box-shadow: none;
				-moz-box-shadow: none;
  				-webkit-box-shadow: none;
			}
			th {
				border-bottom: 1px solid #bbb;
				box-shadow: 0 2px 0 #efefef;
				-moz-box-shadow: 0 2px 0 #efefef;
  				-webkit-box-shadow: 0 2px 0 #efefef;
				margin:0;
				padding:0;
			}
			
			div#main {
				overflow:auto;
				margin-bottom:90px;	
				vertical-align: middle;
			}
			
			footer {
				
				background-color: #eee;
				height: 40px;
				position:fixed;
				bottom:0;
				width: 100%;
				font-size: 12px;
				line-height: 18px;
				text-align: center;
				padding-top: 26px;
				color: #aaa;
			}
			footer span {
				color:#333;
			}
			
			/* Images sprites */
			td div.icon_bg {
				height: 70px;
				width: 70px;
				margin-bottom: 0;
				display:inline-block;
				clear:right;
			}
			div#main td.icon_hover {
				background: url('images/td_background.png') no-repeat -44px -40px;
			}
			
			td a {
				color: #555;
			}
			
			
			
			/* employees */
			div#ec_mail_logo { background: url('images/icons_sprite.png') no-repeat -576px 0;}
			div#ec_inside_logo { background: url('images/icons_sprite.png') no-repeat -433px -70px; }
			div#tlo_logo { background: url('images/icons_sprite.png') no-repeat -506px -70px; }
			div#hronline_logo { background: url('images/icons_sprite.png') no-repeat -576px -70px; }
			div#referrals_logo { background: url('images/icons_sprite.png') no-repeat -720px -70px; }
			div#share411_logo { background: url('images/icons_sprite.png') no-repeat -650px -70px; }
			div#watercooler_logo { background: url('images/icons_sprite.png') no-repeat -288px -70px; }
			
			/* bd */
			div#ec_bd_logo { background: url('images/icons_sprite.png') no-repeat -358px 0; }
			div#basecamp_logo { background: url('images/icons_sprite.png') no-repeat -145px -0; }
			div#highrise_logo { background: url('images/icons_sprite.png') no-repeat -72px -0; }
			div#input_logo { background: url('images/icons_sprite.png') no-repeat -793px 0; }

			/* recruiting */
			div#ec_recruiting_logo { background: url('images/icons_sprite.png') no-repeat -358px 0; }
			div#jobvite_logo { background: url('images/icons_sprite.png') no-repeat -288px 0; }
			div#monster_logo { background: url('images/icons_sprite.png') no-repeat -218px 0; }
			div#i2s_logo { background: url('images/icons_sprite.png') no-repeat 0 -70px; }
			div#referrals_admin_logo { background: url('images/icons_sprite.png') no-repeat -792px -70px; }
		</style>
		<script src="scripts/jquery-1.5.1.min.js"></script>
		
		
	</head>
	<body>
		<!-- 
				  launch.htm
				  evanschambers.com
									 Created by Jamil Evans on 2011-10-07.
				  Copyright 2011 Jamil Evans. All rights reserved.
			 -->
		<header style="">
			<img src="images/logo_ec_small.png"/>
			<div id="title">Launchpad</div>
			<ul>
				<li>Jamil Evans (admin)</li>
				<li><a href="#">Customize</a></li>
				<li><a href="#">Administration</a></li>
				<li><a href="#">Signout</a></li>
			</ul>
			<br style="clear:both" />
		</header>
		<div id="main">
			<table border="0">
				<colgroup span="2" style="font-size: 20px;"></colgroup>
				<tr>
					<th><h2><br/>Employees</h2></th>
					<td>
						<a href="http://mail.evanschambers.com">							
							<div id="ec_mail_logo" class="icon_bg"></div>
							<p>EC Mail</p>
						</a>
					</td>
					<td>
						<a href="https://sites.google.com/a/evanschambers.com/ec-inside-new/">
							<div id="ec_inside_logo" class="icon_bg"></div>
							<p>EC Inside</p>
						</a>
					</td>
					<td>
						<a href="https://sites.google.com/a/evanschambers.com/ec-inside-new/home/timesheet">
							<div id="tlo_logo" class="icon_bg"></div>
							<p>Time & Labor</p>
						</a>
					</td>
					<td>
						<a href="https://eservices.paychex.com/secure/">
							<div id="hronline_logo" class="icon_bg"></div>
							<p>HR Online</p>
						</a>
					</td>
					<td>
						<a href="http://www.evanschambers.com/secure/login.php">
							<div id="referrals_logo" class="icon_bg"></div>
							<p>Submit a Referral</p>
						</a>
					</td>
					<td>
						<a href="">
							<div id="share411_logo" class="icon_bg"></div>
							<p>Share411</p>
						</a>
					</td>
					<!--<td>
						<div id="watercooler_logo" class="icon_bg"></div>
						<p>Water Cooler</p>
					</td> -->
				</tr>
				<tr>
				<?php if(strpos($_GET["role"], "recruiter") !== false){?>	
					<? php
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
					echo '<?php }?>';
					?>
				<?php }?>
					
				<?php if(strpos($_GET["role"], "business-manager") !== false){?>	
					<? php
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
					?>
				<?php }?>
				
				<!--
				<tr>
					<th><h2><br/>Marketing</h2></th>
					<td>
						<img src="images/icon_ecsite.png"/><br/>
						EC Marketing
					</td>
					<td>
						<img src="images/icon_ecsite.png"/><br/>
						Mailchimp
					</td>
					<td>
						<img src="images/icon_ecsite.png"/><br/>
						Google Analytics
					</td>
					<td>
						<a href="https://www.smartsheet.com/b/openid/ga/evanschambers.com?gapp=505">
						<img src="images/icon_ecsite.png"/><br/>
						Smartsheet
						</a>
					</td>
					<td>
						<img src="images/icon_ecsite.png"/><br/>
						Share411 Admin
					</td>
				</tr>
				-->
			</table>
		</div>
		<footer>
			<span>EC Launchpad</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			Version <a href="#">1.0a</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			8 Oct 2011
		</footer>
		
		<script>
		<!--	
				$('div.icon_bg').hover(function(){
					$(this).parent().parent().addClass('icon_hover');
				}, function() {
					$(this).parent().parent().removeClass('icon_hover');
				});
		-->
		</script>
	</body>
</html>
