<?php
include 'conn.php';

// for adding
if (isset($_POST['addData'])) {
   $userID = $_POST['user_id'];
   $subID = $_POST['sub_id'];
   $fname = $_POST['firstname'];
   $lname = $_POST['lastname'];
   $pre = $_POST['pre'];
   $mid = $_POST['mid'];
   $final = $_POST['final'];

      $insert = $conn->prepare("INSERT INTO student (user_id, subid, fname, lname, pre, mid, final) VALUES(?, ?, ?, ?, ?, ?, ?)");
      $insert->execute([
         $userID,
         $subID,
         $fname, 
         $lname, 
         $pre, 
         $mid, 
         $final
      ]);

      $msg = "Data inserted!";
      header("Location: index.php?msg=$msg");
}

// for update
if (isset($_POST['editData'])) {
   $id = $_POST['id'];
   $fname = $_POST['firstname'];
   $lname = $_POST['lastname'];
   $pre = $_POST['pre'];
   $mid = $_POST['mid'];
   $final = $_POST['final'];

   // UPDATE table_name SET column1 = value1, column2 = value2, ... WHERE condition;
   $update = $conn->prepare("UPDATE student SET fname = ?, lname = ?, pre = ?, mid = ?, final = ? WHERE id = ?");
   $update->execute([
      $fname,
      $lname, 
      $pre, 
      $mid, 
      $final,
      $id
   ]);

   $msg = "Data Updated!";
   header("Location: index.php?msg=$msg");
}

// delete
if (isset($_GET['delete'])) {
   $id = $_GET['id'];

   // DELETE FROM table_name WHERE condition;
   $delete = $conn->prepare("DELETE FROM student WHERE id = ?");
   $delete->execute([$id]);

   $msg = "Data Deleted!";
   header("Location: index.php?msg=$msg");
}



/** for SUBJECT */
// for adding
if (isset($_POST['addSub'])) {
   $userID = $_POST['user_id'];
   $subject = $_POST['subject'];

      $insert = $conn->prepare("INSERT INTO subject (user_id, sub) VALUES(?, ?)");
      $insert->execute([
         $userID,
         $subject
      ]);

      $msg = "Data inserted!";
      header("Location: subject.php?msg=$msg");
}

// for update
if (isset($_POST['editSub'])) {
   $id = $_POST['id'];
   $fname = $_POST['subject'];

   // UPDATE table_name SET column1 = value1, column2 = value2, ... WHERE condition;
   $update = $conn->prepare("UPDATE subject SET sub = ? WHERE id = ?");
   $update->execute([
      $fname,
      $id
   ]);

   $msg = "Data Updated!";
   header("Location: subject.php?msg=$msg");
}

// delete
if (isset($_GET['delete1'])) {
   $id = $_GET['id'];

   // DELETE FROM table_name WHERE condition;
   $delete = $conn->prepare("DELETE FROM subject WHERE id = ?");
   $delete->execute([$id]);

   $msg = "Data Deleted!";
   header("Location: subject.php?msg=$msg");
}




// register a user
if (isset($_POST['register'])) {
   $fname = $_POST['fname'];
   $lname = $_POST['lname'];
   $email = $_POST['email'];
   $pass1 = $_POST['pass1'];
   $pass2 = $_POST['pass2'];

   if ($pass1 == $pass2) {
      $hash = password_hash($pass1, PASSWORD_DEFAULT);
      // INSERT INTO table_name (column1, column2, column3, ...) VALUES (value1, value2, value3, ...);
      $addUser = $conn->prepare("INSERT INTO users(user_fname, user_lname, user_email, user_pass) VALUES(?, ?, ?, ?)");
      $addUser->execute([
         $fname,
         $lname,
         $email,
         $hash
      ]);

      $msg = "Registration complete!";
      header("Location: register.php?msg=$msg");
   } else {
      $msg = "Password do not match!";
      header("Location: register.php?msg=$msg");
   }
}

if (isset($_POST['login'])) {
   $email = $_POST['email'];
   $password = $_POST['password'];

   $check = $conn->prepare("SELECT * FROM users WHERE user_email = ?");
   $check->execute([$email]);

   foreach ($check as $data) {
      if ($email == $data['user_email'] && password_verify($password, $data['user_pass'])) {
         session_start();
         $_SESSION['logged_in'] = true;
         $_SESSION['u_id'] = $data['user_id'];

         header("Location: index.php");
      } else {
         $msg = "Email or Password do not match!";
         header("Location: login.php?msg=$msg");
      }
   }
}

// logout
if (isset($_GET['logout'])) {
   session_start();
   unset($_SESSION['logged_in']);
   unset($_SESSION['u_id']);

   header("Location: login.php");
}