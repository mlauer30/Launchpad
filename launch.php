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

			a { color: #D54321; }

			@font-face {
				font-family: Interstate-light;
				src: url('fonts/interstate.ttf');
			}

			colgroup { color:#335; }

			header { margin: 22px; }

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
				font-family: Interstate-light;
				line-height: 24px;
				font-size: 16px;
				color:#999;
        text-align: center;
				font-weight: normal;
			}

      .rotate_header{
				display: -webkit-transform: rotate(270deg);
				display: -moz-transform: rotate(270deg);
				display: -ms-transform: rotate(90deg);
				display: -o-transform: rotate(90deg);
				transform: rotate(270deg);
      }
			.height_constriction{ height: 60%; }

			.width_constriction{ max-width: 55%; }

			.my-col {
				font-size: 12px;
				color: #555;
				padding: 5px 0 20px 15px;
				min-width: 20%;
			}

      .icon_hover{ background: url('images/td_background.png') no-repeat -60px -60px; }

      .my-col p{
          color: #555;
					margin: 0;
					position: relative;
					white-space: nowrap;
      }
      .my-col a{
        text-decoration: none;
      }
			.my-row{
        height: 23%;
        width: 90%;
        align-items: center;
				position: relative;
			}
			.row{
				position: relative;
			}
      hr{
				border: none;
				border-bottom: 0.5px solid #bbb;
				box-shadow: 0 1px 0 #efefef;
				-moz-box-shadow: 0 1px 0 #efefef;
  				-webkit-box-shadow: 0 1px 0 #efefef;
				padding: 0 30px 1px 30px;
				width: 100%;

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
			div#ec_inside_logo { background: url('images/icons_sprite_3.png') no-repeat -430px -70px; }
			div#tlo_logo { background: url('images/icons_sprite_3.png') no-repeat -579px -70px; }
			div#hronline_logo { background: url('images/icons_sprite_3.png') no-repeat -653px -70px; }
			div#referrals_logo { background: url('images/icons_sprite_3.png') no-repeat -718px -70px; }
			div#share411_logo { background: url('images/icons_sprite_3.png') no-repeat -650px -70px; }
			div#watercooler_logo { background: url('images/icons_sprite_3.png') no-repeat -288px -70px; }

			/* bd */
			div#ec_bd_logo { background: url('images/icons_sprite_3.png') no-repeat 0 -70px; }
			div#basecamp_logo { background: url('images/icons_sprite_3.png') no-repeat -145px -0; }
			div#highrise_logo { background: url('images/icons_sprite_3.png') no-repeat -72px -0; }
			div#fbo_logo { background: url('images/icons_sprite_3.png') no-repeat -793px 0; }
      div#contract_library { background: url('images/icons_sprite_3.png') no-repeat -431px 0; }
      div#qms {background: url('images/icons_sprite_3.png') no-repeat -288px 0;}
      div#contract_funding { background: url('images/icons_sprite_3.png') no-repeat -217px 0;}
      div#qbr { background: url('images/icons_sprite_3.png') no-repeat -292px -70px; }
			div#applicant_stack { background: url('images/icons_sprite_3.png') no-repeat -220px -70px; }
			/* recruiting */
			div#ec_recruiting_logo { background: url('images/icons_sprite_3.png') no-repeat -358px 0; }
			/*div#jobvite_logo { background: url('images/icons_sprite_3.png') no-repeat -288px 0; }*/

			/*#monster_logo { background: url('images/icons_sprite_3.png') no-repeat -218px 0; }*/
			div#i2s_logo { background: url('images/icons_sprite_3.png') no-repeat -154px -67px; }
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
				<li><?php echo $userInfo['name'] ?></li>
				<li><a href="logout.php">Signout</a></li>
			</ul>
			<br style="clear:both" />
		</header>
		<div class="container" style="position: relative; left: 10px;">
			<div class="row my-row">
        <div class="col-12 col-md-12 col-lg-1">
        <h2>Employees</h2>
        </div>
        <div class="col-12 col-md-12 col-lg-11 my-col">
        <div class="row" >
					<div class="col-3 col-lg-2 my-col">
						<a href="http://mail.evanschambers.com"
						target="_blank">
							<div id="ec_mail_logo" class="icon_bg"></div>
							<p style="left: 13px;">EC Mail</p>
						</a>
					</div>
					<div class="col-3 col-lg-2 my-col">
						<a href="https://sites.google.com/a/evanschambers.com/ec-inside-new/"
						target="_blank">
							<div id="ec_inside_logo" class="icon_bg"></div>
							<p style="left: 14px;">EC Inside</p>
						</a>
					</div>
					<div class="col-3 col-lg-2 my-col">
						<a href="https://te06.neosystems.net/DeltekTC/welcome.msv"
						target="_blank">
							<div id="tlo_logo" class="icon_bg"></div>
							<p>Time & Labor</p>
						</a>
					</div>
					<div class="col-3 col-lg-2 my-col">
						<a href="https://neosystems.ultipro.com/Login.aspx"
						target="_blank">
							<div id="hronline_logo" class="icon_bg"></div>
							<p style="left: 14px;">UltiPro</p>
						</a>
					</div>
					<div class="col-3 col-lg-2 my-col">
						<a href="http://www.evanschambers.com/secure/login.php"
						target="_blank">
							<div id="referrals_logo" class="icon_bg"></div>
							<p style="left: -5px;">Submit a Referral</p>
						</a>
					</div>
        </div>
      </div>
      </div>
				<?php if (strpos($userRoleNames, "recruiter") !== false) { ?>
				<div class="row my-row">
					<div class="col-12">
						<hr>
					</div>
          <div class="col-12 col-md-12 col-lg-1">
  					<h2>Recruiters</h2>
          </div>
          <div class="col-12 col-md-12 col-lg-11 my-col">
          <div class="row">
  					<div class="col-3 col-lg-2 my-col">
  					       <a href="https://sites.google.com/a/evanschambers.com/ec-recruiting/"
									 target="_blank">
  					              <div id="ec_recruiting_logo" class="icon_bg"></div>
  					              <p>Recruiting Site</p>
  					       </a>
  					</div>
  					<div class="col-3 col-lg-2 my-col">
  								<a href="https://www.applicantstack.com/login/"
									target="_blank">
  										<div id="applicant_stack" class="icon_bg"></div>
  										<p style="left: -3px;">Applicant Stack</p>
  								</a>
  					</div>
  					<div class="col-3 col-lg-2 my-col">
  								<a href="https://sites.google.com/evanschambers.com/itdaspmo/home"
									target="_blank">
  										<div id="i2s_logo" class="icon_bg"></div>
  										<p style="left: -15px;">ITDAS PMO Portal</p>
  								</a>
  					</div>
  					<div class="col-3 col-lg-2 my-col">
  					       <a href="" onclick="alert('URL not yet added'); return false;">
  					              <div id="referrals_admin_logo" class="icon_bg"></div>
  					              <p>Referrals Admin</p>
  					       </a>
  					</div>
          </div>
        </div>
		</div>
      <?php }?>
				<?php if (strpos($userRoleNames, "business-manager") !== false) { ?>
        <div class="row my-row" style="top: 30px;">
					<div class="col-12">
						<hr>
					</div>
          <div class="col-12 col-md-12 col-lg-1">
            <h2>Business Managers</h2>
          </div>
          <div class="col-12 col-md-12 col-lg-11 my-col">
            <div class="row">
              <div class="col-3 col-lg-2 my-col">
    					       <a href="https://sites.google.com/a/evanschambers.com/ec-business-development/"
										 target="_blank">
    					              <div id="ec_bd_logo" class="icon_bg"></div>
    					              <p style="left: 16px;">BD Site</p>
    					       </a>
    					</div>
    					<div class="col-3 col-lg-2 my-col">
    					       <a href="https://ectech.basecamphq.com/clients"
										 target="_blank">
    					              <div id="basecamp_logo" class="icon_bg"></div>
    					              <p style="left: 10px;">Basecamp</p>
    					       </a>
    					</div>
    					<div class="col-3 col-lg-2 my-col">
    					       <a href="https://ectech.highrisehq.com/account"
										 target="_blank">
    					              <div id="highrise_logo" class="icon_bg"></div>
    					              <p style="left: 16px;">Highrise</p>
    					       </a>
    					</div>
    					<div class="col-3 col-lg-2 my-col">
    					       <a href="https://www.fbo.gov/"
										 target="_blank">
    					              <div id="fbo_logo" class="icon_bg"></div>
    					              <p style="left: 5px;">FedBizOpps</p>
    					       </a>
    					</div>
    					<div class="col-3 col-lg-2 my-col">
    								<a href="https://www.applicantstack.com/login/"
										target="_blank">
    										<div id="applicant_stack" class="icon_bg"></div>
    										<p style="left: -3px;">Applicant Stack</p>
    								</a>
    					</div>
              <div class="col-3 col-lg-2 my-col">
                      <a href="https://sites.google.com/evanschambers.com/qms"
											target="_blank">
                            <div id="qms" class="icon_bg"></div>
                            <p>Quality Mgmt</p>
                      </a>
              </div>
               <div class="col-3 col-lg-2 my-col">
                     <a href=" https://drive.google.com/drive/u/0/folders/1z2EjK4LfkIdBNmIr6j8r2Ca7qLSpgDy4"
										 target="_blank">
                          <div id="contract_funding" class="icon_bg"></div>
                          <p style="left: -6px;">Contract Funding</p>
                     </a>
                </div>
                <div class="col-3 col-lg-2 my-col">
                      <a href="https://drive.google.com/drive/u/0/folders/1we2qMjw0-Omro2yATNu7f7ZdxjVaf55f"
											target="_blank">
                          <div id="contract_library" class="icon_bg"></div>
                          <p style="left: -5px;">Contract Library</p>
                      </a>
                </div>
                <div class="col-3 col-lg-2 my-col">
                      <a href="https://drive.google.com/drive/u/0/folders/0B9-8ptKToawMdHhSUUNLSnRNdTQ"
											target="_blank">
                          <div id="qbr" class="icon_bg"></div>
                          <p style="left: -8px;">Program Reviews</p>
                      </a>
                </div>
              </div>
            </div>

         </div>
       </div>
				<?php }?>
		</div>
    <footer>
			<span>EC Launchpad</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			Version <a href="#">1.0a</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			8 Oct 2011
		</footer>

		<script>
				$('div.icon_bg').hover(function(){
					$(this).parent().parent().addClass('icon_hover');
				}, function() {
					$(this).parent().parent().removeClass('icon_hover');
				});
	    </script>

			<script>
			  var grid = $('div.container');//the entire bootstrap grid
				var firsthr = $('div.row.my-row')[1];//first divider on in the grid
				var secondhr = $('div.row.my-row')[2];//second divider in the grid
				var secondRow = $('div.row')[3];//second row can be business managers or recruiters depending on the role of the user

			  const NUM_ROWS = $('div.row.my-row').length;//the number of roles on the screen
				const CENTER_SCREEN_MARGIN = ['20%', '8%', '12%', '3%'];//margin-top needed when the tab is not in fullscreen
				const FULLSCREEN_MARGIN = ['40%', '13%', '18%', '10%'];//margin-top needed when the tab is in fullscreen
				const FULLSCREEN_HEIGHT = 900;//height of window in fullscreen
				const DESKTOP_WIDTH = 992;//width size of window when the grid's height needs to be reduced
				const TIGHTEN_WIDTH = 1220;//width size of window when the grid's width needs to be reduced
			  const PHONE_WIDTH = 767;//width size of window when the grid is reduced to fit on a phone
				const RECRUITER_HEIGHT = 113;//height of the second row of roles when there is only a recruiter role
			</script>

			<script>
				tighten(DESKTOP_WIDTH, 'height_constriction');
				$(window).resize(function(){
						tighten(DESKTOP_WIDTH, 'height_constriction');
				});

				tighten(TIGHTEN_WIDTH, 'width_constriction');
				$(window).resize(function(){
						tighten(TIGHTEN_WIDTH, 'width_constriction');
				});
				/**
				 * Tightens the width of the grid when the window is
				 * stretched.
				 *
				 * @param tight_width width of window when the height
				 * of the grid should be constricted and width of window when the
				 * the grid needs to have its width decreased.
				 * @param addClass width_constriction class or the height_constriction
				 * class that shrinks grid according to screen size.
				 */
				function tighten(tight_width, addClass){
					if($(window).width() >= tight_width){
						$(grid).addClass(addClass);
					}else{
						$(grid).removeClass(addClass);
					}
				}
			</script>

			<script>
			rotateHeader();
			$(window).resize(function(){
				rotateHeader();
			});
			/**
			 * Rotates header of each role when the width of the window
			 * increases or decreases with resizing.
			 */
			function rotateHeader(){
				if($(window).width() >= DESKTOP_WIDTH){
					$('h2').addClass('rotate_header');
				}else{
					 $('h2').removeClass('rotate_header');
				}
			}
			</script>

			<script>
				 formatWindow();
				 $(window).resize(function(){
						 formatWindow();
				 });
					margin();
					$(window).resize(function(){
							margin();
					});
					/**
 				  * Formatting the window with a refresh and also when the window resizes.
 					* Adjusting width of grid and position of dividers.
 					*/
					function formatWindow(){
						if($(window).width() >= PHONE_WIDTH){
								$(grid).css('width', '65%');
						}else if($(window).width() < PHONE_WIDTH){
								$(grid).css('width', '100%');
						}
						if($(window).width() < DESKTOP_WIDTH){
								$(grid).css('padding-bottom', '400px');
								$(firsthr).css('top', '80px');
								$(secondhr).css('top','85px');
						}else{
								$(grid).css('padding-bottom', '');
								$(firsthr).css('top', '');
								$(secondhr).css('top','33px');
						}
					}
					/**
					 * Margins for dividers are adjusted with resizing of window and grid.
					 * The dividers positions are pulled closer to icons.
					 */
					function margin(){
						if($(window).width() >= DESKTOP_WIDTH && $(window).height() >= FULLSCREEN_HEIGHT){
							$(firsthr).css('top','-30px');
							$(secondhr).css('top','-25px');
							adjustToScreen(FULLSCREEN_MARGIN);
						}else{
							formatWindow();
							adjustToScreen(CENTER_SCREEN_MARGIN);
						}
					}
					/**
					 * Vertically aligns the grid when browser is displayed in fullscreen
					 *
					 * @param array array containing necessary margin-top details
					 * to vertically align the grid.
					 */
					function adjustToScreen(array){
						if(NUM_ROWS == 1){
							$(grid).css('margin-top', array[0]);
						}if(NUM_ROWS == 2){
							$(grid).css('margin-top', array[1]);
						}if(NUM_ROWS == 2 && $(secondRow).height() <= RECRUITER_HEIGHT){
							$(grid).css('margin-top', array[2]);
						}if(NUM_ROWS == 3){
							$(grid).css('margin-top', array[3]);
						}
					}
			</script>
	</body>
</html>
