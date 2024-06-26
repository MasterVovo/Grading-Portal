<?php
session_start();
require_once "includes/dbconn.php";

if (isset($_POST['submit'])) {
  $studentID = $_POST['studentId'];
  $password = $_POST['password'];

  // if ($studentID == "admin" && $password == "admin") {
  //   $_SESSION['userID'] = $studentID;
  //   $_SESSION['userType'] = 'admin';
  //   header("Location: admin/dashboard.php");
  //   exit();
  // } elseif ($studentID == "registrar" && $password == "registrar") {
  //   $_SESSION['userID'] = $studentID;
  //   $_SESSION['userType'] = 'registrar';
  //   header("Location: registrar/dashboard.html");
  //   exit();
  // }
  //check if studentID exist in faculty, student, and admin tables
  $sql = "SELECT facultyType AS userType, facultyPass, facultyID FROM faculty WHERE facultyID = ? UNION ALL SELECT 'student' AS userType, studentPass, studentID FROM student WHERE studentID = ?";
  $stmt = mysqli_prepare($conn, $sql);
  mysqli_stmt_bind_param($stmt, "ss", $studentID, $studentID);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);
  $row = mysqli_fetch_assoc($result);

  if ($row) {
    //check if password is correct
    $userPass = $row['facultyPass'] ?: $row['studentPass'];
    if ($password == $userPass) {
      //login successful
      $userType = $row['userType'];
      $_SESSION['userID'] = $row['facultyID'] ?: $row['studentID'];
      $_SESSION['userType'] = $userType;
      if ($_SESSION['userID'] == 'admin') {
        $_SESSION['userType'] = 'Registrar';
        header("Location: admin/dashboard.php");
        exit();
      } elseif ($userType == 'student') {
        header("Location: student/dashboard.html");
        exit();
      } else{
        if ($userType == 1){
          $_SESSION['userType'] = 'Teacher';
        } elseif($userType == 2) {
          $_SESSION['userType'] = 'Program Chair';
        } elseif($userType == 3) {
          $_SESSION['userType'] = 'Dean';
        } elseif($userType == 4) {
          $_SESSION['userType'] = 'Registrar';
          header("Location: admin/dashboard.php");
          exit();
        }
        header("Location: teacher/dashboard.html");
        exit();
      }
    } else {
      $errorMsg = "User password is incorrect";
    }
  } else {
    $errorMsg = "User doesn\'t exist";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Student Login</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="shortcut icon" href="../public/images/KLD LOGO.png" type="image/x-icon" />
</head>
<style>
  body {
    background-image: url("../public/images/KLD\ BG.png");
    background-repeat: no-repeat;
    background-size: cover;
    background-attachment: fixed;
    background-position: center center;
    justify-content: center;
    align-items: center;
    /* overflow: hidden; */
  }

  .centered-form {
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
  }

  a {
    color: green;
  }

  .card {
    margin-top: 2rem;
    border-radius: 1rem;
  }

  a {
    color: green;
  }

  img {
    margin-top: 1.5rem;
    margin-bottom: 2rem;
    width: 200px;
    /* margin-left: 8rem; */
  }

  .h2 {
    font-size: xx-large;
    font-family: Arial, Helvetica, sans-serif;
  }
</style>

<body>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <center><img src="../public/images/KLD LOGO.png" alt="KLD LOGO"></center>
            <h1 align="center">KLD ONLINE GRADING SYSTEM</h1>
            <hr />
            <form id="loginForm" method="POST" action="login.php">
              <div class="form-group">
                <label for="studentId">School ID</label>
                <input type="text" class="form-control" id="studentId" name="studentId" placeholder="School ID" />
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" />
              </div>
              <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="agreeTerms" required />
                <label class="form-check-label" for="agreeTerms">
                  I agree to the
                  <a href="#" data-toggle="modal" data-target="#termsModal">
                    Terms and Conditions</a>
                </label>
              </div>
              <center><button type="submit" name="submit" class="btn btn-success btn-flat m-b-100 m-t-30" id="loginBtn">Login</button></center>
            </form>
            <?php if (isset($errorMsg)) {
              echo "<script>alert('$errorMsg');</script>";
            }
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Terms and Conditions Modal -->
  <div class="modal fade" id="termsModal" tabindex="-1" role="dialog" aria-labelledby="termsModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="termsModalLabel">
            Terms and Conditions
          </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" style="height: 50dvh; overflow-y: scroll; overflow-x: hidden">
          <!-- Terms and Conditions Content Goes Here -->
          <b>1. Acceptance of Terms</b>
          <br />
          By accessing or using the Online Grading Portal System for Efficient
          Grade Management provided by Kolehiyo ng Lungsod ng Dasmarinas you
          agree to comply with and be bound by the following Terms and
          Conditions. If you do not agree to these Terms, please do not use
          the System.
          <br />
          <b>2. Use of the System</b>
          <br />
          The System is intended for use by students, faculty, registrar and
          staff of the Institution for the purpose of efficient grade
          management. Any unauthorized use of the System is strictly
          prohibited.
          <br />
          <b>3. Intellectual Property</b> <br />
          Patent and other intellectual property laws protect the System and
          its original features, content, and functionality, which are owned
          by the Institution. Without first obtaining express permission from
          the Organization, you undertake not to modify, duplicate,
          distribute, or develop derivative works based on the System.
          <br />
          <b>4. Privacy</b> <br />
          Your use of the An Online Grading Portal System is governed by our
          Privacy Policy, which outlines how we collect, use, and protect your
          personal information. By using the System, you consent to the terms
          of the Privacy Policy. This consent is necessary for us to provide
          you with the services offered by the Online Grading Portal System.
          For your convenience, you can review our Privacy Policy at
          <a href="https://dict.gov.ph/ra-10173/">https://dict.gov.ph/ra-10173/</a>. This document provides detailed information on the types of
          information we collect, how we use it, and the measures we take to
          protect your privacy. By using the System, you consent to the
          collection and use of your information in accordance with the
          Institution's Privacy Policy. This includes the use of your personal
          information for account management, customer support, service
          improvement, and communication purposes. If you have any questions
          or concerns about our Privacy Policy or how your information is
          used, please contact us at jagreyes@kld.edu.ph We are committed to
          protecting your privacy and ensuring that your personal data is
          handled securely and responsibly.
          <br />
          <b>5. Limitation of Liability</b> <br />
          In no event shall Kolehiyo ng Lungsod ng Dasmarinas, nor its
          directors, employees, partners, agents, suppliers, or affiliates, be
          liable for any indirect, incidental, special, consequential, or
          punitive damages, including without limitation, loss of profits,
          data, use, goodwill, or other intangible losses, resulting from:
          <br />
          (i) Your access to or use of or inability to access or use the
          Online Grading Portal System for Efficient Grade Management;
          <br />
          (ii) Any conduct or content of any third party on the System;
          <br />
          (iii) Any content obtained from the System; and
          <br />
          (iv) Unauthorized access, use, or alteration of your transmissions
          or content. This limitation of liability applies whether the alleged
          liability is based on warranty, contract, tort (including
          negligence), or any other legal theory, and whether or not we have
          been informed of the possibility of such damage, and even if a
          remedy set forth herein is found to have failed of its essential
          purpose.
          <br />
          <b>6. Governing Law</b> <br />
          Despite consideration to its conflict of law provisions, the
          Republic of the Philippines' laws shall control and interpret these
          Terms. The courts of the Republic of the Philippines shall have
          exclusive jurisdiction over any issues emerging out of or relating
          to these Terms, including any questions over their interpretation,
          validity, or implementation. By accepting these terms, each party
          expressly declines any objections to the Republic of the
          Philippines' courts being the venue for any legal action arising out
          of or related to these terms.
          <br />
          <b>7. Changes to Terms</b> <br />
          We reserve the right, at our sole discretion, to modify or replace
          these Terms at any time. If a revision is material, we will endeavor
          to provide at least 30 days' notice prior to any new terms taking
          effect. We will define what constitutes a material change at our
          sole discretion, with the aim of ensuring that any changes are
          communicated clearly and in a timely manner to all users of the An
          Online Grading Portal System.
          <br />
          <b>8. Contact Us</b> <br />
          If you have any questions about these Terms, or if you need further
          clarification on any aspect of the An Online Grading Portal System,
          please do not hesitate to contact us. You can reach us via email at
          <a href="https://www.facebook.com/KLDOfficialFBPage">https://www.facebook.com/KLDOfficialFBPage</a>. Alternatively, you can submit your inquiries through our online
          contact form available at www.kolehiyongdasmarinas.com/contact.
          <br />
          <br />

          <h3>Privacy Policy</h3>
          <br />
          <b>1. Information We Collect</b> <br />
          In the course of using the An Online Grading Portal System, we may
          collect various types of information from you. This information is
          primarily used to facilitate your use of the system, provide
          support, and ensure the security and integrity of our services. The
          types of information we collect include:
          <br />
          <b>Personal Information:</b> This includes your name, email address,
          phone number, and postal address. We collect this information to
          create and manage your account, facilitate communication with you,
          and provide personalized services.
          <br />
          <b>Usage Information:</b> We may also collect data on how you use
          the Online Grading Portal System, including the features you access,
          the frequency of your use, and any errors or issues you encounter.
          This information helps us improve the system and provide a better
          user experience.
          <br />
          <b>Feedback and Communications:</b> If you provide feedback, report
          issues, or communicate with us through support requests, we may
          collect this information to address your concerns and improve our
          services. Please note that we will only use your information for the
          purposes stated above and in accordance with our Privacy Policy. We
          are committed to protecting your privacy and ensuring that your
          personal data is handled securely and responsibly.
          <br />
          <b>2. How We Use Your Information</b> <br />
          The information we collect from you is used in several ways to
          enhance and personalize your experience with the An Online Grading
          Portal System. Here are some of the key ways we use your
          information:
          <br />
          <b>Account Management: </b>We use your personal information to
          create and manage your account. This includes verifying your
          identity, enabling you to access the system, and ensuring that your
          account is secure.
          <br />
          <b>Customer Support:</b> When you contact us for support or have
          inquiries about the system, we use your contact information to
          respond to your requests. This helps us provide you with the
          assistance you need in a timely manner.
          <br />
          <b>Service Improvement:</b> We analyze the usage information we
          collect to identify trends, understand user needs, and make
          improvements to the system. This helps us ensure that the Online
          Grading Portal System remains efficient, user-friendly, and meets
          the needs of our users.
          <br />
          <b>Communication:</b> We may use your contact information to send
          you important updates, notifications, and information related to the
          system. This includes news about new features, security updates, and
          any changes to our terms of service. We are committed to using your
          information responsibly and in accordance with our Privacy Policy.
          Your privacy is important to us, and we take steps to protect your
          personal data and ensure that it is used only for the purposes
          outlined above.
          <br />
          <b>3. Sharing of Your Information</b> <br />
          In order to provide and maintain the An Online Grading Portal
          System, we may share your information with third-party service
          providers who perform services on our behalf. These third parties
          may include, but are not limited to:
          <br />
          <b>Payment Processors:</b> We may share your payment information
          with payment processors to facilitate transactions, such as payments
          for premium features or services.
          <br />
          <b>Data Analytics Providers:</b> We may share your usage data with
          data analytics providers to help us understand how users interact
          with the system, identify trends, and make improvements.
          <br />
          <b>Email Service Providers:</b> We may share your email address with
          email service providers to send you service-related communications,
          updates, and notifications.
          <br />
          <b>Hosting Services:</b> We may share your information with hosting
          services to ensure the availability and performance of the Online
          Grading Portal System.
          <br />
          <b>Customer Service Providers:</b> We may share your contact
          information with customer service providers to assist you with
          inquiries or support requests.
          <br />
          We ensure that these third parties are bound by strict
          confidentiality and security measures to protect your personal
          information. We only share your information with third parties who
          have agreed to use it only for the purposes specified and in
          accordance with our instructions.
          <br />
          Please note that we are committed to protecting your privacy and
          ensuring that your personal data is handled securely and
          responsibly. For more detailed information on how we share your
          information and with whom, please refer to our Privacy Policy.
          <br />
          <b>4. Security </b> <br />
          At the An Online Grading Portal System, we understand the importance
          of protecting your personal information. We have implemented a range
          of security measures to safeguard your data from unauthorized
          access, use, disclosure, disruption, modification, or destruction.
          These measures include:
          <br />
          <b>Encryption:</b> We use encryption to protect your data both at
          rest and in transit. This means that your information is converted
          into a code to prevent unauthorized access.
          <br />
          <b>Access Controls:</b> We have strict access controls in place to
          ensure that only authorized personnel can access your information.
          This includes the use of passwords, multi-factor authentication, and
          role-based access controls.
          <br />
          <b>Regular Security Audits: </b> We conduct regular security audits
          to identify and address potential vulnerabilities in our systems.
          These audits help us ensure that our security measures are
          up-to-date and effective.
          <br />
          <b>Data Backup and Recovery: </b> We regularly back up your data to
          prevent loss. In the event of a data loss, we have procedures in
          place to restore your information from these backups.
          <br />
          <b>Compliance with Data Protection Laws:</b> We comply with all
          applicable data protection laws and regulations, including the Data
          Privacy Act of 2012 in the Philippines, to ensure that we handle
          your personal information in a lawful, fair, and transparent manner.
          <br />
          We are committed to maintaining the highest standards of security to
          protect your information. If you have any concerns about the
          security of your information, please contact us at
          jagreyes@kld.edu.ph.

          <br />
          <b>5. Your Choices </b> <br />
          We value your privacy and understand that you may prefer not to
          receive promotional emails from us. You have the option to opt-out
          of receiving promotional emails at any time. To opt-out, please
          follow the unsubscribe instructions provided in each promotional
          email you receive from us. These instructions are typically found at
          the bottom of the email or in the footer. Please note that opting
          out of promotional emails does not affect the receipt of
          non-promotional emails. Non-promotional emails, such as those
          related to your account status, updates about the Online Grading
          Portal System, or information about our ongoing business relations,
          will still be sent to you. These emails are essential for
          maintaining your account and ensuring that you are informed about
          important updates and services. If you have any questions or need
          further assistance with managing your email preferences, please
          contact us at jagreyes@kld.edu.ph We are committed to helping you
          manage your communication preferences and ensuring that you receive
          only the emails that are relevant and useful to you.

          <br />
          <b>6. Changes to this Privacy Policy</b> <br />

          We are committed to keeping you informed about how we collect, use,
          and protect your information. As such, we may update our Privacy
          Policy from time to time. We believe it is important to review and
          understand the Privacy Policy regularly. If we make any material
          changes to our Privacy Policy, we will notify you by sending an
          email to the email address associated with your account. This email
          will provide details about the changes and will include a link to
          the updated Privacy Policy on our website. We will also post the
          updated Privacy Policy on our website, where you can review it at
          any time. Material changes are those that could significantly affect
          your rights or obligations under the Privacy Policy. We will use our
          best judgment to determine whether a change is material.

          <br />
          <b>7. Contact Us</b> <br />
          If you have any questions about these Terms, or if you need further
          clarification on any aspect of the An Online Grading Portal System,
          please do not hesitate to contact us. You can reach us via email at
          <a href="https://www.facebook.com/KLDOfficialFBPage">https://www.facebook.com/KLDOfficialFBPage</a>. Alternatively, you can submit your inquiries through our online
          contact form available at www.kolehiyongdasmarinas.com/contact.
          <br />
          <br />
          <b>DATE CREATED</b> April 1, 2024
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">
            Close
          </button>
        </div>
      </div>
    </div>
  </div>

  <!-- Optional: Bootstrap JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>