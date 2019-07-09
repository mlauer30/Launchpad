<?php
    require 'vendor/autoload.php';
    use Auth0\SDK\Auth0;
    use Auth0\SDK\API\Management;

    $domain = 'dev-n6562r4d.auth0.com';
        $id = 'wQy3h3WeckKrUHh9E4Tcv08c5JadCoeN';
        $secret = '_-pljKGPUpULa1fzgfNAJeufnjx2m42Yg4x2k3hzAeUh9Vr48on-5xPFVkaRPbMN';

    $auth0 = new Auth0([
    'domain' => $domain,
    'client_id' => $id,
    'client_secret' => $secret,
    'redirect_uri' => 'http://ec2-100-25-44-194.compute-1.amazonaws.com/launchpad/launch.php',
    'persist_id_token' => true,
    'persist_access_token' => true,
    'persist_refresh_token' => true,
    ]);

    $userInfo = $auth0->getUser();
    if (!$userInfo) {
        header('Location: login.php');
    } else {
        // User is authenticated
        $userInfo = $auth0->getUser();
        $curl = curl_init();

        curl_setopt_array($curl, array(
                  CURLOPT_URL => "https://dev-n6562r4d.auth0.com/oauth/token",
                  CURLOPT_RETURNTRANSFER => true,
                  CURLOPT_ENCODING => "",
                  CURLOPT_MAXREDIRS => 10,
                  CURLOPT_TIMEOUT => 30,
                  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                  CURLOPT_CUSTOMREQUEST => "POST",
                  CURLOPT_POSTFIELDS => "grant_type=client_credentials&client_id=" . $id . "&client_secret=" . $secret . "&audience=https://dev-n6562r4d.auth0.com/api/v2/",
                  CURLOPT_HTTPHEADER => array(
                    "content-type: application/x-www-form-urlencoded"
                  ),
                ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        $json = json_decode($response);

        $actual_token = $json->access_token;

        $curl = curl_init();
        $access_token = $auth0->getIdToken();

        curl_setopt_array($curl, array(
              CURLOPT_URL => "https://dev-n6562r4d.auth0.com/api/v2/users/" . $userInfo['sub'] . "/roles",
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => "",
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 30,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => "GET",
              CURLOPT_HTTPHEADER => array(
                "authorization: Bearer " . $actual_token
                ),
            ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        $userRoleNames = "";
        $userRolesArray = json_decode($response);
        for ($x = 0; $x < count($userRolesArray); $x++) {
            $userRoleNames .= $userRolesArray[$x]->name;
            if($x < count($userRolesArray)-1){
              $userRoleNames .= ", ";
            }
        }
        if ($userRoleNames === "") {
            $userRoleNames = 'employee';
        }
    }
?>

<html>
	<head>
		<title></title>
		<style>

			html, body {
				font-family: Interstate-light;
				margin: 0;
				padding: 0;
				background: url(images/background.gif)  #d5d5d5 repeat-x;
				/*background-attachment:fixed;*/
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
				font-weight:normal;
				padding: 0;
				margin: 0;
			}
			table {
				border-collapse: collapse;
				position: absolute;
		    top: 50%;
		    left: 50%;
		    -moz-transform: translateX(-50%) translateY(-50%);
		    -webkit-transform: translateX(-50%) translateY(-50%);
		    transform: translateX(-50%) translateY(-60%);
				padding-bottom: 50%
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
			tr:last-child td, tr:last-child th{
				border-bottom: none;
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
			div#ec_mail_logo { background: url('images/icons_sprite_3.png') no-repeat -576px 0;}
			div#ec_inside_logo { background: url('images/icons_sprite_3.png') no-repeat -433px -70px; }
			div#tlo_logo { background: url('images/icons_sprite_3.png') no-repeat -579px -70px; }
			div#hronline_logo { background: url('images/icons_sprite_3.png') no-repeat -653px -70px; }
			div#referrals_logo { background: url('images/icons_sprite_3.png') no-repeat -720px -70px; }
			div#share411_logo { background: url('images/icons_sprite_3.png') no-repeat -650px -70px; }
			div#watercooler_logo { background: url('images/icons_sprite_3.png') no-repeat -288px -70px; }

			/* bd */
			div#ec_bd_logo { background: url('images/icons_sprite_3.png') no-repeat 0 -70px; }
			div#basecamp_logo { background: url('images/icons_sprite_3.png') no-repeat -145px -0; }
			div#highrise_logo { background: url('images/icons_sprite_3.png') no-repeat -72px -0; }
			div#fbo_logo { background: url('images/icons_sprite_3.png') no-repeat -793px 0; }
      div#contract_library { background: url('images/icons_sprite_3.png') no-repeat -433px 0; }
      div#qms {background: url('images/icons_sprite_3.png') no-repeat -288px 0;}
      div#contract_funding { background: url('images/icons_sprite_3.png') no-repeat -218px 0;}
      div#qbr { background: url('images/icons_sprite_3.png') no-repeat -290px -70px; }
			div#applicant_stack { background: url('images/icons_sprite_3.png') no-repeat -221px -70px; }
			/* recruiting */
			div#ec_recruiting_logo { background: url('images/icons_sprite_3.png') no-repeat -358px 0; }
			/*div#jobvite_logo { background: url('images/icons_sprite_3.png') no-repeat -288px 0; }*/

			/*#monster_logo { background: url('images/icons_sprite_3.png') no-repeat -218px 0; }*/
			div#i2s_logo { background: url('images/icons_sprite_3.png') no-repeat -154px -70px; }
			div#referrals_admin_logo { background: url('images/icons_sprite_3.png') no-repeat -792px -70px; }
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
				<li><?php echo $userInfo['name'] . " | role: " . $userRoleNames;?></li>
				<li><a href="logout.php">Signout</a></li>
			</ul>
			<br style="clear:both" />
		</header>
		<div id="main">

    <form id="trArray">
			<table width = "25%" border="0" cellspacing="0" cellpadding="0">
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
						<a href="https://te06.neosystems.net/DeltekTC/welcome.msv">
							<div id="tlo_logo" class="icon_bg"></div>
							<p>Time & Labor</p>
						</a>
					</td>
					<td>
						<a href="https://neosystems.ultipro.com/Login.aspx ">
							<div id="hronline_logo" class="icon_bg"></div>
							<p>UltiPro</p>
						</a>
					</td>
					<td>
						<a href="http://www.evanschambers.com/secure/login.php">
							<div id="referrals_logo" class="icon_bg"></div>
							<p>Submit a Referral</p>
						</a>
					</td>
				</tr>

				<?php function recruiter(){ ?>
				<tr>
					<th><h2><br/>Recruiters</h2></th>
					<td>
					       <a href="https://sites.google.com/a/evanschambers.com/ec-recruiting/">
					              <div id="ec_recruiting_logo" class="icon_bg"></div>
					              <p>Recruiting Site</p>
					       </a>
					</td>
					<td>
								<a href="https://www.applicantstack.com/login/">
										<div id="applicant_stack" class="icon_bg"></div>
										<p>Applicant Stack</p>
								</a>
					</td>
					<td>
								<a href="https://www.applicantstack.com/login/">
										<div id="i2s_logo" class="icon_bg"></div>
										<p>ITDAS PMO Portal</p>
								</a>
					</td>
					<td>
					       <a href="" onclick="alert('URL not yet added'); return false;">
					              <div id="referrals_admin_logo" class="icon_bg"></div>
					              <p>Referrals Admin</p>
					       </a>
					</td>
				</tr>
				<tr>
				<?php }?>
				<?php function businessManager(){ ?>

					<td><h2>Business<br/>Managers</h2></td>

          <td>
					       <a href="https://sites.google.com/a/evanschambers.com/ec-business-development/">
					              <div id="ec_bd_logo" class="icon_bg"></div>
					              <p>BD Site</p>
					       </a>
					</td>
					<td>
					       <a href="https://ectech.basecamphq.com/clients">
					              <div id="basecamp_logo" class="icon_bg"></div>
					              <p>Basecamp</p>
					       </a>
					</td>
					<td>
					       <a href="https://ectech.highrisehq.com/account">
					              <div id="highrise_logo" class="icon_bg"></div>
					              <p>Highrise</p>
					       </a>
					</td>
					<td>
					       <a href="https://www.fbo.gov/">
					              <div id="fbo_logo" class="icon_bg"></div>
					              <p>FedBizOpps</p>
					       </a>
					</td>
					<td>
								<a href="https://www.applicantstack.com/login/">
										<div id="applicant_stack" class="icon_bg"></div>
										<p>Applicant Stack</p>
								</a>
					</td>
          <td>
                  <a href="https://sites.google.com/a/evanschambers.com/ec-quality-management-system/">
                        <div id="qms" class="icon_bg"></div>
                        <p>Quality Mgmt</p>
                  </a>
          </td>
           <td>
                 <a href=" https://drive.google.com/drive/u/0/folders/1z2EjK4LfkIdBNmIr6j8r2Ca7qLSpgDy4">
                      <div id="contract_funding" class="icon_bg"></div>
                      <p>Contract Funding</p>
                 </a>
            </td>
            <td>
                  <a href="https://drive.google.com/drive/u/0/folders/1we2qMjw0-Omro2yATNu7f7ZdxjVaf55f">
                      <div id="contract_library" class="icon_bg"></div>
                      <p>Contract Library</p>
                  </a>
            </td>
            <td>
                  <a href="https://drive.google.com/drive/u/0/folders/0B9-8ptKToawMdHhSUUNLSnRNdTQ">
                      <div id="qbr" class="icon_bg"></div>
                      <p>Program Reviews</p>
                  </a>
            </td>
        </tr>
				<?php }?>
				<?php
              if ($userRoleNames) {
                  if (strpos($userRoleNames, "recruiter") !== false) {
                      recruiter();
                  }
                  if (strpos($userRoleNames, "business-manager") !== false) {
                      businessManager();
                  }
              }

        ?>

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
		</form>
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
		<script>
				for(var x = 1; x < $('tr').length; x++){
					 var td = $('tr')[x];
					 var prev = $('tr')[x - 1];
						if($('tr')[x].children.length > $('tr')[x - 1].children.length){
							var delta = $(td).children('td, th').length - $(prev).children('td, th').length;
							var added = $(prev).children('td, th').length + delta;
							for(var y = $(prev).children('td, th').length; y < added; y++)
								$(prev).append("<td> &nbsp; </td>");
						}
				}
		</script>

	</body>
</html>
