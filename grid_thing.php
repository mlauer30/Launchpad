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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
		<title></title>
		<style>
			html, body {
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
				display: -webkit-transform: rotate(270deg);
				display: -moz-transform: rotate(270deg);
				display: -ms-transform: rotate(90deg);
				display: -o-transform: rotate(90deg);
				transform: rotate(270deg);*/
				font-family: Interstate-light;
				line-height: 24px;
				font-size: 16px;
				color:#999;
        text-align: center;
				font-weight:normal;
				padding: 0;
				margin: 0;
			}
      .rotate_header{
        display: -webkit-transform: none;
        display: -moz-transform: none;
        display: -ms-transform: none;
        display: -o-transform: none;
        transform: none;
        font-family: Interstate-light;
        line-height: 24px;
        font-size: 16px;
        color:#999;
        text-align: center;
        font-weight:normal;
        padding: 0;
        margin: 0;
      }

			.my-col {
				font-size: 12px;
				color: #555;
			}
      .icon_hover{
        background: url('images/td_background.png') no-repeat -60px -60px;
      }
      .my-col p{
          color: #555;
          padding: 0;
          margin: 0;
      }
      .my-col a{
        text-decoration: none;
      }
			.my-row{
        height: 25%;
        width: 100%;
        align-items: center;
			}
      .hr-row{
        height: auto;
        border-bottom: 1px solid #bbb;
        padding: 30px 25px 30px 25px;

      }
			footer {
				background-color: #eee;
				height: 60px;
				position: fixed;
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
			.my-row div.icon_bg {
				height: 70px;
				width: 70px;
				margin-bottom: 0;
				display:inline-block;
				clear:right;
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
			div#i2s_logo { background: url('images/icons_sprite_3.png') no-repeat -149px -70px; }
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
		<div class="container">
			<div class="row my-row">
        <div class="col-12 align-self-center col-md-1 my-col">
        <h2>Employees</h2>
        &nbsp;
        </div>
        <div class="col-12 col-md-11 my-col">
        <div class="row" >
					<div class="col-3 col-lg-2 my-col">
						<a href="http://mail.evanschambers.com">
							<div id="ec_mail_logo" class="icon_bg"></div>
							<p style="text-align: justify;">EC Mail</p>
						</a>
					</div>
					<div class="col-3 col-lg-2 my-col">
						<a href="https://sites.google.com/a/evanschambers.com/ec-inside-new/">
							<div id="ec_inside_logo" class="icon_bg"></div>
							<p>EC Inside</p>
						</a>
					</div>
					<div class="col-3 col-lg-2 my-col">
						<a href="https://te06.neosystems.net/DeltekTC/welcome.msv">
							<div id="tlo_logo" class="icon_bg"></div>
							<p>Time & Labor</p>
						</a>
					</div>
					<div class="col-3 col-lg-2 my-col">
						<a href="https://neosystems.ultipro.com/Login.aspx ">
							<div id="hronline_logo" class="icon_bg"></div>
							<p>UltiPro</p>
						</a>
					</div>
					<div class="col-3 col-lg-2 my-col">
						<a href="http://www.evanschambers.com/secure/login.php">
							<div id="referrals_logo" class="icon_bg"></div>
							<p>Submit a Referral</p>
						</a>
					</div>
        </div>
      </div>
      </div>
				<?php function recruiter(){ ?>
          &nbsp;
          <div class="row hr-row">
             <hr>
          </div>
				<div class="row my-row">
          <div class="col-12 align-self-center col-md-1">
  					<h2>Recruiters</h2>
          </div>
          <div class="col-12 col-md-11 my-col">
          <div class="row" style="height: 40%;">
  					<div class="col-lg-2 col-3 my-col">
  					       <a href="https://sites.google.com/a/evanschambers.com/ec-recruiting/">
  					              <div id="ec_recruiting_logo" class="icon_bg"></div>
  					              <p>Recruiting Site</p>
  					       </a>
  					</div>
  					<div class="col-lg-2 col-3 my-col">
  								<a href="https://www.applicantstack.com/login/">
  										<div id="applicant_stack" class="icon_bg"></div>
  										<p>Applicant Stack</p>
  								</a>
  					</div>
  					<div class="col-lg-2 col-3 my-col">
  								<a href="https://sites.google.com/evanschambers.com/idiv class="col my-col"aspmo/home">
  										<div id="i2s_logo" class="icon_bg"></div>
  										<p>ITDAS PMO Portal</p>
  								</a>
  					</div>
  					<div class="col-lg-2 col-3 my-col">
  					       <a href="" onclick="alert('URL not yet added'); return false;">
  					              <div id="referrals_admin_logo" class="icon_bg"></div>
  					              <p>Referrals Admin</p>
  					       </a>
  					</div>
          </div>
        </div>
		</div>
      <?php }?>
				<?php function businessManager(){ ?>
          <div class="row hr-row">
             <hr>
          </div>
          &nbsp;
        <div class="row my-row">
          <div class="col-12 col-md-1">
            <h2>Business<br/>Managers</h2>
            &nbsp;
          </div>
          <div class="col-12 col-md-11 my-col">
            <div class="row" style="height: 100%;">
              <div class="col-3 col-lg-2 my-col">
    					       <a href="https://sites.google.com/a/evanschambers.com/ec-business-development/">
    					              <div id="ec_bd_logo" class="icon_bg"></div>
    					              <p>BD Site</p>
    					       </a>
    					</div>
    					<div class="col-3 col-lg-2 my-col">
    					       <a href="https://ectech.basecamphq.com/clients">
    					              <div id="basecamp_logo" class="icon_bg"></div>
    					              <p>Basecamp</p>
    					       </a>
    					</div>
    					<div class="col-3 col-lg-2 my-col">
    					       <a href="https://ectech.highrisehq.com/account">
    					              <div id="highrise_logo" class="icon_bg"></div>
    					              <p>Highrise</p>
    					       </a>
    					</div>
    					<div class="col-3 col-lg-2 my-col">
    					       <a href="https://www.fbo.gov/">
    					              <div id="fbo_logo" class="icon_bg"></div>
    					              <p>FedBizOpps</p>
    					       </a>
    					</div>
    					<div class="col-3 col-lg-2 my-col">
    								<a href="https://www.applicantstack.com/login/">
    										<div id="applicant_stack" class="icon_bg"></div>
    										<p>Applicant Stack</p>
    								</a>
    					</div>
              <div class="col-3 col-lg-2 my-col">
                      <a href="https://sites.google.com/a/evanschambers.com/ec-quality-management-system/">
                            <div id="qms" class="icon_bg"></div>
                            <p>Quality Mgmt</p>
                      </a>
              </div>
               <div class="col-3 col-lg-2 my-col">
                     <a href=" https://drive.google.com/drive/u/0/folders/1z2EjK4LfkIdBNmIr6j8r2Ca7qLSpgDy4">
                          <div id="contract_funding" class="icon_bg"></div>
                          <p>Contract Funding</p>
                     </a>
                </div>
                <div class="col-3 col-lg-2 my-col">
                      <a href="https://drive.google.com/drive/u/0/folders/1we2qMjw0-Omro2yATNu7f7ZdxjVaf55f">
                          <div id="contract_library" class="icon_bg"></div>
                          <p>Contract Library</p>
                      </a>
                </div>
                <div class="col-3 col-lg-2 my-col">
                      <a href="https://drive.google.com/drive/u/0/folders/0B9-8ptKToawMdHhSUUNLSnRNdTQ">
                          <div id="qbr" class="icon_bg"></div>
                          <p>Program Reviews</p>
                      </a>
                </div>
              </div>
            </div>

         </div>
       </div>

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
					<div class="col my-col">
						<img src="images/icon_ecsite.png"/><br/>
						EC Marketing
					</div>
					<div class="col my-col">
						<img src="images/icon_ecsite.png"/><br/>
						Mailchimp
					</div>
					<div class="col my-col">
						<img src="images/icon_ecsite.png"/><br/>
						Google Analytics
					</div>
					<div class="col my-col">
						<a href="https://www.smartsheet.com/b/openid/ga/evanschambers.com?gapp=505">
						<img src="images/icon_ecsite.png"/><br/>
						Smartsheet
						</a>
					</div>
					<div class="col my-col">
						<img src="images/icon_ecsite.png"/><br/>
						Share411 Admin
					</div>
				</tr>
				-->
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
  <script>
  var width = $('div.col-12').width();
  function rotate(){
     if(width > 400){
       $('h2').addClass('rotate_header');

     }else{
        $('h2').removeClass('rotate_header');
     }
  }
  $(document).ready(rotate());
  </script>
    <script>
      var end = $('div').length;
      var div = $('div')[end - 1];
      for(x = 0; x < 13; x++){
        $(div).append("&nbsp;<br/>");
      }
    </script>

	</body>
</html>
