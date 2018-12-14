<?php
	include('../class/db.php');
	include('../class/flagCheck.php');
	
	style_check();	//user's style sessions
	
	
	if(!isset($_GET['check'])||$_GET['check']==0){
		echo "<script language='javascript' type='text/javascript'>";
    	echo "window.location.href=\"information-test.php?check=0\"";
    	echo "</script>";
		exit;
	}
	if(isset($_GET['enquiry_number'])&&$_GET['enquiry_number']!="") $enquiry_number = $_GET['enquiry_number'];
	else $enquiry_number = 0;
    if(isset($_GET['registration_number'])&&$_GET['registration_number']!="") $registration_number = $_GET['registration_number'];
    else $enquiry_number = 0;
    if(isset($_GET['user_name'])&&$_GET['user_name']!="") $user_name = $_GET['user_name'];
	else $user_name = "";
	if(isset($_GET['forename'])&&$_GET['forename']!="") $forename = $_GET['forename'];
	else $forename = "";
	if(isset($_GET['surname'])&&$_GET['surname']!="") $surname = $_GET['surname'];
	else $surname = "";
	if(isset($_GET['staff_forename'])&&$_GET['staff_forename']!="") $staff_forename = $_GET['staff_forename'];
	else $staff_forename = "";
	if(isset($_GET['enquiry_start_date'])&&$_GET['enquiry_start_date']!="") $enquiry_start_date = $_GET['enquiry_start_date'];
	else $enquiry_start_date = "";
	if(isset($_GET['enquiry_type'])&&$_GET['enquiry_type']!="") $enquiry_type = $_GET['enquiry_type'];
	else $enquiry_type = "";
	if(isset($_GET['e_mail_address'])&&$_GET['e_mail_address']!="") $e_mail_address = $_GET['e_mail_address'];
	else $e_mail_address = "";
	if(isset($_GET['email_address'])&&$_GET['email_address']!="") $email_address = $_GET['email_address'];
	else $email_address = "";
	if(isset($_GET['classification_description'])&&$_GET['classification_description']!="") $classification_description = $_GET['classification_description'];
	else $classification_description = "";
	if(isset($_GET['student_study_period'])&&$_GET['student_study_period']!="") $student_study_period = $_GET['student_study_period'];
	else $student_study_period = "";
	if(isset($_GET['short_title'])&&$_GET['short_title']!="") $short_title = $_GET['short_title'];
	else $short_title = "";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        .feedback-table {
            /*border: 1px solid black;*/
        }
    </style>
<script src="../scripts/jquery-1.5.1.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        <!-- //redirect to mobile site

        /*var querystring = location.search;
        if (screen.width <= 699) {
            document.location = "index-test-mobile.php"+querystring;
        }*/
        //-->
    </script>
<script language="javascript">



    function changeBorder(box,colour){
	$("#"+box).css("borderColor",colour);
}

/*
function checkNumber(textBox){
	var check = 0;
	for(var i=0;i<textBox.length;i++){
		if(isNaN(textBox.substring(i,i+1))) {
			check = 1;
			break;
		}
	}
	
	if(check == 1) return true;
	else return false;
}


/*function checkRegistration_Number(Registration_Number) {
		var valueText = $("#"+Registration_Number).val();

		if (checkNumber(valueText)) {
			changeBorder(Registration_Number,"red");	
			$("#"+Registration_Number).prev().show().attr("innerHTML","The registration number is not valid");
			return true;
		}else if ((valueText.length > 9 || valueText.length < 8) && valueText.length != 0){
			changeBorder(Registration_Number,"red");	
			$("#"+Registration_Number).prev().show().attr("innerHTML","There should be 8 or 9 digit number for a valid registration number.");
			return true;
		}
		else {
			changeBorder(Registration_Number,"");
			$("#"+Registration_Number).prev().hide();
			return false;
		}
}*/

/*function checkService(Service) {
		var valueText = $("#"+Service).val();

		if (valueText.length == 0){
			changeBorder(Service,"red");	
			$("#"+Service).prev().show().attr("innerHTML","Please fill in the Service type.");
			return true;
		}
		else {
			changeBorder(Service,"");
			$("#"+Service).prev().hide();
			return false;
		}
}
*/
function checkFeedback_Satisfaction(Feedback_Satisfaction) {
		var valueText =  $('input:radio[name="'+Feedback_Satisfaction+'"]:checked').val();

		if (valueText == null){
			$("#"+"Feedback_Satisfaction_hidden").next().show().attr("innerHTML","Please select an option.");
			return true;
		}
		else {
			$("#"+"Feedback_Satisfaction_hidden").next().hide();
			return false;
		}
}
    
/*function checkWelcoming(Welcoming) {
		var valueText =  $('input:radio[name="'+Welcoming+'"]:checked').val();

		if (valueText == null){
			$("#"+"Welcoming_hidden").next().show().attr("innerHTML","Please select an option.");
			return true;
		}
		else {
			$("#"+"Welcoming_hidden").next().hide();
			return false;
		}
}
*/
    
function checkWaiting_Time(Waiting_Time) {
		var valueText =  $('input:radio[name="'+Waiting_Time+'"]:checked').val();

		if (valueText == null){
			$("#"+"Waiting_Time_hidden").next().show().attr("innerHTML","Please select an option.");
			return true;
		}
		else {
			$("#"+"Waiting_Time_hidden").next().hide();
			return false;
		}
}
	
function checkWelcome(Welcome) {
		var valueText =  $('input:radio[name="'+Welcome+'"]:checked').val();

		if (valueText == null){
			$("#"+"Welcome_hidden").next().show().attr("innerHTML","Please select an option.");
			return true;
		}
		else {
			$("#"+"Welcome_hidden").next().hide();
			return false;
		}
}

function checkService(Service) {
		var valueText =  $('input:radio[name="'+Service+'"]:checked').val();

		if (valueText == null){
			$("#"+"Service_hidden").next().show().attr("innerHTML","Please select an option.");
			return true;
		}
		else {
			$("#"+"Service_hidden").next().hide();
			return false;
		}
}
    
function checkInformation(Information) {
		var valueText =  $('input:radio[name="'+Information+'"]:checked').val();

		if (valueText == null){
			$("#"+"Information_hidden").next().show().attr("innerHTML","Please select an option.");
			return true;
		}
		else {
			$("#"+"Information_hidden").next().hide();
			return false;
		}
}

    function checkSpeed(Speed) {
        var valueText =  $('input:radio[name="'+Speed+'"]:checked').val();

        if (valueText == null){
            $("#"+"Speed_hidden").next().show().attr("innerHTML","Please select an option.");
            return true;
        }
        else {
            $("#"+"Speed_hidden").next().hide();
            return false;
        }
    }

function checkKnowledge(Knowledge) {
    var valueText =  $('input:radio[name="'+Knowledge+'"]:checked').val();

    if (valueText == null){
        $("#"+"Knowledge_hidden").next().show().attr("innerHTML","Please select an option.");
        return true;
    }
    else {
        $("#"+"Knowledge_hidden").next().hide();
        return false;
    }
}

function checkOverall(Overall) {
    var valueText =  $('input:radio[name="'+Overall+'"]:checked').val();

    if (valueText == null){
        $("#"+"Overall_hidden").next().show().attr("innerHTML","Please select an option.");
        return true;
    }
    else {
        $("#"+"Overall_hidden").next().hide();
        return false;
    }
}


$(document).ready(function() {

	$("#sendButton").click(function(event) {
		//if(checkRegistration_Number("Registration_Number")) event.preventDefault();
		//
		//
//        if(checkWelcoming("Welcoming")) event.preventDefault();
        if(checkWaiting_Time("Waiting_Time")) event.preventDefault();
        if(checkWelcome("Welcome")) event.preventDefault();
        if(checkService("Service")) event.preventDefault();
        if(checkInformation("Information")) event.preventDefault();
        if(checkSpeed("Speed")) event.preventDefault();
        if(checkKnowledge("Knowledge")) event.preventDefault();
        if(checkOverall("Overall")) event.preventDefault();

        //if(checkFeedback_Type("Feedback_Type")) event.preventDefault();
	});
	
	$("#clearButton").click(function() {
		$("#Registration_Number").val("");
		$("#Service").val("");
		$('input:radio[name="Waiting_Time"]:checked').val();
//        $('input:radio[name="Welcoming"]:checked').val();
		$('input:radio[name="Welcome"]:checked').val();
		$('input:radio[name="Service"]:checked').val();
        $('input:radio[name="Information"]:checked').val();
        $('input:radio[name="Speed"]:checked').val();
        $('input:radio[name="Knowledge"]:checked').val();
        $('input:radio[name="Overall"]:checked').val();
		
		//changeBorder("Registration_Number","");
		//$("#"+"Registration_Number").prev().hide();
		
		changeBorder("Service","");
		//$("#"+"Service").prev().hide();

        $("#"+"Waiting_Time_hidden").next().hide();
        $("#"+"Welcome_hidden").next().hide();
        $("#"+"Service_hidden").next().hide();
        $("#"+"Information_hidden").next().hide();
        $("#"+"Speed_hidden").next().hide();
        $("#"+"Knowledge_hidden").next().hide();
        $("#"+"Overall_hidden").next().hide();
        //        $("#"+"Welcoming_hidden").next().hide();




	});

	//$("#Registration_Number").blur(function() {
	//	checkRegistration_Number("Registration_Number");
	});
	
	$("#Service").blur(function() {
		checkService("Service");	
	});
});
</script>
<title>Webgrace</title>
<?php //echo "<link href='../css/".$_SESSION['style']."/".$_SESSION['style']."Background.css' rel='stylesheet' type='text/css' />"?>
<?php echo "<link href='../css/".$_SESSION['style']."/".$_SESSION['style'].".css' rel='stylesheet' type='text/css' />"?>
</head>

<body>
<?php //include('../t_header.php'); ?>
<?php //include('../t_titleTop.php'); ?>

<div style="width:973px; margin: auto;display: block;">
    <img src="../css/default/TUOS_LOGO_SMALL.jpg" style="
    float:left; ">
    <img src="../css/default/ssid-logo-small.jpg" style="
    float:right;">

<table id="menuTable" style="display: none">
    <tr>
    <td>&nbsp;</td>
    </tr>
</table>
<table id="menuTable" border="0" style="margin:auto" cellpadding="0" cellspacing="0">
  <tr>
    <td><h2>Feedback about Services &quot;How Did We Do Today?&quot;</h2></td>
  </tr>
</table>
<table id="lineTable" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td></td>
  </tr>
</table>
<form id="form1" name="form1" method="post" action="collection-test.php">
<table border="0" align="center" cellpadding="10" cellspacing="1" id="emptyTable">
    <tr>
      <td>
<strong>Dear <?php echo $forename?>,</strong><br /> 
<br /> 
<strong>You visited the Student Services Information Desk (SSiD) on <?php echo $enquiry_start_date?></strong><br /> 
<br /> 
<strong>Please use the form below to provide feedback about our service</strong><br />
<br />

          

<!--  <input name="Service" type="text" id="Service" style="width:900px" value="" /> -->

<!--  <strong>Did you find your experience welcoming? (required)</strong>
          <input type="hidden" name="Welcoming_hidden" id="Welcoming_hidden">
  <div id="message"></div>
  <table border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td width="150"><label>
        <input type="radio" name="Welcoming" value="Yes" id="Welcoming_0" />
        Yes</label></td>
      <td width="150"><input type="radio" name="Welcoming" value="No" id="Welcoming_1" />
        No</td>
      <td width="150">&nbsp;</td>
      <td width="150">&nbsp;</td>
      <td width="150">&nbsp;</td>
    </tr>
  </table>
-->

          

  <strong>How satisfied were you with the following aspects of service? (required)</strong>
        <br>
          <br />

          <table class="feedback-table">
              <tr style="text-align: left">
                  <th width="250"> </th>
                  <th width="120"><img src="../images/very-disatisfied.png"></th>
                  <th width="120"><img src="../images/disatisfied.png"></th>
                  <th width="120"><img src="../images/neither.png"></th>
                  <th width="120"><img src="../images/satisfied.png"></th>
                  <th width="120"><img src="../images/very-satisfied.png"></th>
              </tr>
              <tr>
                  <td> </td>
              </tr>
              <tr>

                  <td><strong>Waiting Time:</strong> </td>
                  <input type="hidden" name="Waiting_Time_hidden" id="Waiting_Time_hidden">
                  <td width="120"><input type="radio" name="Waiting_Time" value="Very dissatisfied" id="Waiting_Time_0" />
                      Very dissatisfied</td>
                  <td width="120"><input type="radio" name="Waiting_Time" value="Dissatisfied" id="Waiting_Time_1" />
                      Dissatisfied</td>
                  <td width="120"><input type="radio" name="Waiting_Time" value="Neither" id="Waiting_Time_2" />
                      Neither</td>
                  <td width="120"><input type="radio" name="Waiting_Time" value="Satisfied" id="Waiting_Time_3" />
                      Satisfied</td>
                  <td width="120"><input type="radio" name="Waiting_Time" value="Very satisfied" id="Waiting_Time_4" />
                      Very Satisfied</td>
              </tr>
              <tr>
                  <td> </td>
                  <td> </td>
                  <td> </td>
                  <td> </td>
                  <td> </td>
                  <td> </td>
              </tr>
              <tr>
                  <td><strong>Welcome by staff:</strong></td>
                  <input type="hidden" name="Welcome_hidden" id="Welcome_hidden">
                  <td width="120"><input type="radio" name="Welcome" value="Very dissatisfied" id="Welcome_0" />
                      Very dissatisfied</td>
                  <td width="120"><input type="radio" name="Welcome" value="Dissatisfied" id="Welcome_1" />
                      Dissatisfied</td>
                  <td width="120"><input type="radio" name="Welcome" value="Neither" id="Welcome_2" />
                      Neither</td>
                  <td width="120"><input type="radio" name="Welcome" value="Satisfied" id="Welcome_3" />
                      Satisfied</td>
                  <td width="120"><input type="radio" name="Welcome" value="Very satisfied" id="Welcome_4" />
                      Very Satisfied</td>
              </tr>
              <tr>
                  <td> </td>
                  <td> </td>
                  <td> </td>
                  <td> </td>
                  <td> </td>
                  <td> </td>
              </tr>
              <tr>
                  <td><strong>Customer service given by staff:</strong></td>
                  <input type="hidden" name="Service_hidden" id="Service_hidden">
                  <td width="120"><input type="radio" name="Service" value="Very dissatisfied" id="Service_0" />
                      Very dissatisfied</td>
                  <td width="120"><input type="radio" name="Service" value="Dissatisfied" id="Service_1" />
                      Dissatisfied</td>
                  <td width="120"><input type="radio" name="Service" value="Neither" id="Service_2" />
                      Neither</td>
                  <td width="120"><input type="radio" name="Service" value="Satisfied" id="Service_3" />
                      Satisfied</td>
                  <td width="120"><input type="radio" name="Service" value="Very satisfied" id="Service_4" />
                      Very Satisfied</td>
              </tr>
              <tr>
                  <td> </td>
                  <td> </td>
                  <td> </td>
                  <td> </td>
                  <td> </td>
                  <td> </td>
              </tr>
              <tr>
                  <td><strong>Quality of information and guidance given:</strong></td>
                  <input type="hidden" name="Information_hidden" id="Information_hidden">
                  <td width="120"><input type="radio" name="Information" value="Very dissatisfied" id="Information_0" />
                      Very dissatisfied</td>
                  <td width="120"><input type="radio" name="Information" value="Dissatisfied" id="Information_1" />
                      Dissatisfied</td>
                  <td width="120"><input type="radio" name="Information" value="Neither" id="Information_2" />
                      Neither</td>
                  <td width="120"><input type="radio" name="Information" value="Satisfied" id="Information_3" />
                      Satisfied</td>
                  <td width="120"><input type="radio" name="Information" value="Very satisfied" id="Information_4" />
                      Very Satisfied</td>
              </tr>
              <tr>
                  <td> </td>
                  <td> </td>
                  <td> </td>
                  <td> </td>
                  <td> </td>
                  <td> </td>
              </tr>
              <tr>
                  <td><strong>Speed of service delivery:</strong></td>
                  <input type="hidden" name="Speed_hidden" id="Speed_hidden">
                  <td width="120"><input type="radio" name="Speed" value="Very dissatisfied" id="Speed_0" />
                      Very dissatisfied</td>
                  <td width="120"><input type="radio" name="Speed" value="Dissatisfied" id="Speed_1" />
                      Dissatisfied</td>
                  <td width="120"><input type="radio" name="Speed" value="Neither" id="Speed_2" />
                      Neither</td>
                  <td width="120"><input type="radio" name="Speed" value="Satisfied" id="Speed_3" />
                      Satisfied</td>
                  <td width="120"><input type="radio" name="Speed" value="Very satisfied" id="Speed_4" />
                      Very Satisfied</td>
              </tr>
              <tr>
                  <td> </td>
                  <td> </td>
                  <td> </td>
                  <td> </td>
                  <td> </td>
                  <td> </td>
              </tr>
              <tr>
                  <td><strong>Knowledge of the staff:</strong></td>
                  <input type="hidden" name="Knowledge_hidden" id="Knowledge_hidden">
                  <td width="120"><input type="radio" name="Knowledge" value="Very dissatisfied" id="Knowledge_0" />
                      Very dissatisfied</td>
                  <td width="120"><input type="radio" name="Knowledge" value="Dissatisfied" id="Knowledge_1" />
                      Dissatisfied</td>
                  <td width="120"><input type="radio" name="Knowledge" value="Neither" id="Knowledge_2" />
                      Neither</td>
                  <td width="120"><input type="radio" name="Knowledge" value="Satisfied" id="Knowledge_3" />
                      Satisfied</td>
                  <td width="120"><input type="radio" name="Knowledge" value="Very satisfied" id="Knowledge_4" />
                      Very Satisfied</td>
              </tr>
              <tr>
                  <td> </td>
                  <td> </td>
                  <td> </td>
                  <td> </td>
                  <td> </td>
                  <td> </td>
              </tr>
              <tr>
                  <td><strong>Overall service:</strong></td>
                  <input type="hidden" name="Overall_hidden" id="Overall_hidden">
                  <td width="120"><input type="radio" name="Overall" value="Very dissatisfied" id="Overall_0" />
                      Very dissatisfied</td>
                  <td width="120"><input type="radio" name="Overall" value="Dissatisfied" id="Overall_1" />
                      Dissatisfied</td>
                  <td width="120"><input type="radio" name="Overall" value="Neither" id="Overall_2" />
                      Neither</td>
                  <td width="120"><input type="radio" name="Overall" value="Satisfied" id="Overall_3" />
                      Satisfied</td>
                  <td width="120"><input type="radio" name="Overall" value="Very satisfied" id="Overall_4" />
                      Very satisfied</td>
              </tr>
              <tr>
                  <td> </td>
                  <td> </td>
                  <td> </td>
                  <td> </td>
                  <td> </td>
                  <td> </td>
              </tr>
          </table>
          <br />
          <br />

          <strong>Please tell us why:</strong>
          <div id="message"></div>
          <input type="text" name="overall_why" id="overall_why" style="width:900px" />
          <br />
          <br />

          <table class="feedback-table">
              <tr style="text-align: left">
                  <td width="250"><strong>Would you recommend SSiD to others?</strong></td>
                  <td width="120"><input type="radio" name="Recommend" value="Yes" id="Recommend_0" />
                      Yes</td>
                  <td width="120"><input type="radio" name="Recommend" value="No" id="Recommend_1" />
                      No</td>
              </tr>
          </table>

          <br />
          <strong>What would you say about SSiD if a friend asked you?</strong>
          <div id="message"></div>
          <input type="text" name="Tell_Friend" id="Tell_Friend" style="width:900px" />
          <br />
          <br />

          <strong>What could we have done better? How could we improve?</strong>
          <div id="message"></div>
          <input type="text" name="Improve" id="Improve" style="width:900px" />
          <br />




<br />          
<br />
<input type="hidden" id="Enquiry_Number" name="Enquiry_Number" value="<?php echo $enquiry_number?>">
<input type="hidden" id="Registration_Number" name="Registration_Number" value="<?php echo $registration_number?>">
<input type="hidden" id="User_Name" name="User_Name" value="<?php echo $user_name?>">
<input type="hidden" id="Forename" name="Forename" value="<?php echo $forename?>">
<input type="hidden" id="Surname" name="Surname" value="<?php echo $surname?>">
<input type="hidden" id="Staff_Forename" name="Staff_Forename" value="<?php echo $staff_forename?>">
<input type="hidden" id="Enquiry_Start_Date" name="Enquiry_Start_Date" value="<?php echo $enquiry_start_date?>">
<input type="hidden" id="Enquiry_Type" name="Enquiry_Type" value="<?php echo $enquiry_type?>">
<input type="hidden" id="E_Mail_Address" name="E_Mail_Address" value="<?php echo $e_mail_address?>">
<input type="hidden" id="Email_Address" name="Email_Address" value="<?php echo $email_address?>"> 
<input type="hidden" id="Student_Study_Period" name="Student_Study_Period" value="<?php echo $student_study_period?>">
<input type="hidden" id="Classification_Description" name="Classification_Description" value="<?php echo $classification_description?>">
<input type="hidden" id="Short_Title" name="Short_Title" value="<?php echo $short_title?>">
<input name="sendButton" id="sendButton" type="submit" value="Submit" style="width:100px" />
<input name="clearButton" id="clearButton" type="reset" value="Reset" style="width:100px" />
  </td>
  </tr>
  </table>
</form>
</div>
<?php include('../t_titleBottom.php'); ?>
<?php include('../t_footer.php'); ?>
</body>
</html>