<?php

// $conn=mysqli_connect("localhost", "root", "", "wealth_integrity");
$conn=mysqli_connect("localhost", "uvtzq4jkgg2wo", "4qejjehv82i4", "dbqkorf7nkz1o8");
if (mysqli_connect_errno()){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

$data = $_POST;
$name = $data['name'];
$your_phone = $data['your_phone'];
$email = $data['email'];
$your_address = $data['your_address'];
$your_school = $data['your_school'];
$school_location = $data['school_location'];

$message = $data['question_text_area'];
$company = $data['company_name'];
$company_location = $data['company_location'];
$job_title = $data['job_title'];
$duties = $data['duties'];
$start_date = $data['start_date'];
$end_date = $data['end_date'];
$currently_here = $data['currently_here'];
$job_status = "";

if ($data['education_radio'] == "option1") {
    $edu = 1;
}elseif ($data['education_radio'] == "option2") {
    $edu = 2;
}elseif ($data['education_radio'] == "option3") {
    $edu = 3;
}else{
    $edu = 4;
}

if ($data['experience_radio'] == "option1") {
    $exp = 1;
}else{
    $exp = 0;
}
if ($data['call_radio'] == "option1") {
    $call = 1;
}else{
    $call = 0;
}
if ($data['degree_radio'] == "option1") {
    $degree = 1;
}else{
    $degree = 0;
}



$sql = "INSERT INTO users (name, phone, email, address, education, school, school_location, graduate, sale_experience, sold_cold_calls, question) VALUES ( '$name', '$your_phone', '$email', '$your_address', '$edu', '$your_school', '$school_location', '$degree', '$exp', '$call', '$message')";

if (mysqli_query($conn, $sql)) {
    $last_id = mysqli_insert_id($conn);
    $status = "0";
    $no = 1;
    foreach( $company as $key => $company_name ) {
        if (!empty($company_name)) {
            if (isset($currently_here[$key])) {
                $status = "1";
            }else{
                $status = "0";
            }
            $sql1 = "INSERT INTO user_jobs (user_id, company_name, location, job_title, duties, start_date, end_date, company_index, currently_here) VALUES ( '$last_id', '$company_name', '$company_location[$key]', ' $job_title[$key]', '$duties[$key]', '$start_date[$key]', '$end_date[$key]', '$no', '$status')";
            mysqli_query($conn, $sql1);
            $no++;
        }
    }
}
mysqli_close($conn);

$email_body = "<p><b>Job Application Form</b></p>";
$email_body .= "<p><b>Name:</b> ". $name ."</p>";
$email_body .= "<p><b>Phone Number:</b> ".$your_phone;
$email_body .= "<p><b>Email:</b> ".$email;
$email_body .= "<p><b>Address:</b> ".$your_address."</p>";
if ($data['education_radio'] == "option1") {
    $email_body .= "<p><b>Highest Level of Education</b> Middle School </p>";
}elseif ($data['education_radio'] == "option2") {
    $email_body .= "<p><b>Highest Level of Education</b> High School </p>";
}elseif ($data['education_radio'] == "option3") {
    $email_body .= "<p><b>Highest Level of Education</b> Technical School </p>";
}else{
    $email_body .= "<p><b>Highest Level of Education</b> College </p>";
}

$email_body .= "<p><b>Name of School:</b> ".$your_school."</p>";
$email_body .= "<p><b>Location:</b> ".$school_location."</p>";

if ($data['degree_radio'] == "option1") {
    $email_body .= "<p><b>Did you graduate or earn a degree?</b> Yes </p>";
}else{
    $email_body .= "<p><b>Did you graduate or earn a degree?</b> No </p>";
}

if ($data['experience_radio'] == "option1") {
    $email_body .= "<p><b>Do you have phone, or outside sales experience?</b> Yes </p>";
}else{
    $email_body .= "<p><b>Do you have phone, or outside sales experience?</b> No </p>";
}

if ($data['call_radio'] == "option1") {
    $email_body .= "<p><b>Have you ever sold cold calls?</b> Yes </p>";
}else{
    $email_body .= "<p><b>Have you ever sold cold calls?</b> No </p>";
}

$email_body .= "<p><b>Question</b></p>";
if (!empty($message)) {
    $email_body .= "<p><b>Why do you feel you can sell cold calls on the phone with our company?</b></p>";
    $email_body .= "<p>".$message."</p>";
}


$email_body .= "<h2 style='color:#1d95b7; margin-top: 30px;'> Last jobs</h2>";
$email_body .= "<table class='table table-striped' style='border: 1px solid #dee2e6; border-collapse: collapse; width: 100%; text-align: left;'>
<thead style='background: #f1f1f1;'>
<tr style='border-bottom:1px solid #dee2e6;'>
<th style='padding: 5px; color:#1d95b7;'>Company Name</th>
<th style='padding: 5px; color:#1d95b7;'>Company Location</th>
<th style='padding: 5px; color:#1d95b7;'>Job Title</th>
<th style='padding: 5px; color:#1d95b7;'>Duties</th>
<th style='padding: 5px; color:#1d95b7;'>Start Date</th>
<th style='padding: 5px; color:#1d95b7;'>End Date</th>
<th style='padding: 5px; color:#1d95b7;'>Employed Status</th>
</tr>
</thead>
<tbody>";


foreach( $company as $key2 => $company_name ) {
    if (!empty($company_name)) {
        if (isset($currently_here[$key2])) {
            $job_status = "Presently Employed Here";
        }else{
            $job_status = "";
        }
        $email_body .= "<tr style='border-bottom:1px solid #dee2e6;'>
        <td style='padding: 5px;'>".$company_name."</td>
        <td style='padding: 5px;'>".$company_location[$key2]."</td>
        <td style='padding: 5px;'>".$job_title[$key2]."</td>
        <td style='padding: 5px;'>".$duties[$key2]."</td>
        <td style='padding: 5px;'>".$start_date[$key2]."</td>
        <td style='padding: 5px;'>".$end_date[$key2]."</td>
        <td style='padding: 5px;'>".$job_status."</td>
        </tr>";
    }
}

$email_body .= "</tbody></table>";
$email_body .= "<p><b>Thanks</b></p>";





// $to = "inamsajid123@gmail.com";
// $to = "win@wealth-integrity.com";
$to = "abdulwaheedsharif@gmail.com";
$subject = 'Application Form';
$body = $email_body;
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= 'From: '.$name.' <no-reply@wealth-integrity.com>' . "\r\n";
$headers .= "X-Priority: 3\r\n";
$headers .= "X-Mailer: PHP". phpversion() ."\r\n" ;

if(mail($to,$subject,$body,$headers)) {
    $finalResult = array('msg' => 'success', 'response' => "Form successfully submitted.");
    echo json_encode($finalResult);
    exit();
} else {
    $finalResult = array('msg' => 'error', 'response' => "Something went wrong. Please try again. Thanks");
    echo json_encode($finalResult);
    exit();
}