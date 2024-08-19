<!-- <p>Your OTP for password reset is: {{ $otp }}</p>
<p>This OTP is valid for 10 minutes.</p> -->
<!DOCTYPE html>
<head>
<title>Coexsys</title>

</head>
<body style=" background: #f4f4f4;
    color: #333;
    line-height: 28px;
	font-family: raleway, helveticaneue, helvetica neue, Helvetica, Arial, sans-serif;
    text-transform: none;
    font-size: 16px;">
	<div id="invoice" style="background: #fff;
    min-width: 670px;
    max-width: 900px;
    padding: 60px;
    margin: 0 auto 60px;
    border-radius: 4px;">
		<!-- Header -->
		<div class="row">
			<div class="col-md-6">
			</div>
		</div>
		<?php /*?><div class="row" style="width:100%;display: inline-block;">
			<div class="col-md-12" style="width: 100%;float: left;"> 
				Hello <strong class="margin-bottom-5" style="font-weight: 600;color: #333;display: inline-block;"><?php echo $to_user_name; ?></strong>,
				<p style="margin: 0;
    padding-bottom: 40px;
    clear: both;">Following announcement has been sent by <strong class="margin-bottom-5" style="font-weight: 600;color: #333;display: inline-block;"><?php echo $send_from_name; ?></strong></p>
			</div>
		</div><?php */?>
		
		<div class="row" style="width:100%;display: inline-block;">
			<div class="col-md-12" style="width: 100%;float: left;">
                            <p>
                                Dear, Subscriber <!--<?php //echo $rows['full_name']; ?>-->
                            </p>
                            <p style="margin-top: 20px;">Please use the following OTP: <strong><?php echo $otp; ?></strong>  to complete sign in.</p>
                                
			</div>
		</div>
		
		<?php /*?><div class="row">
			<div class="col-md-12"> 
				<a href="<?php echo SITEURL; ?>manage-projects-add-project.php?project_id=<?php echo $project_id; ?>" class="print-button" style="line-height: 24px;
    font-size: 15px;
    font-weight: 600;
    color: #333;
    background-color: #e6e6e6;
    border-radius: 50px;
    padding: 10px 20px;
    display: block;
    text-align: center;
    margin: 0;
    max-width: 190px;
    transition: 0.3s;
    text-decoration: none !important;
    outline: none !important;">Click Here to View</a>
			</div>
		</div><?php */?>
		<!-- Footer -->
		<?php //include("include_footer_mail.php"); ?>
	</div>
</body>
</html>