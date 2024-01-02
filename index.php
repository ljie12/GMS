<?php include 'header.php';
if (!isset($_SESSION['logged_in'])) {
   header("Location: login.php");
   ob_end_flush();
}
?>

<center>
   <?php if (isset($_GET['msg'])) { ?>
      <div class="alert alert-warning alert-dismissible fade show" role="alert">
         <strong>
            <?php echo $_GET['msg'] ?>
         </strong>
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
   <?php } ?>
   <h1><strong>Grading Management System</strong></h1>
</center>

<?php
if (isset($_GET['Subject'])) {
   ?>

   <div class="row justify-content-center">
      <div class="col-md-5 shadow mt-5 p-3">
         <?php if (isset($_GET['msg'])) { ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
               <strong>
                  <?php echo $_GET['msg'] ?>
               </strong>
               <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
         <?php } ?>

         <?php
         if (isset($_GET['edit1'])) {
            // display the data to be edited here 
            $id = $_GET['id'];
            $selectData = $conn->prepare("SELECT * FROM subject WHERE id = ?");
            $selectData->execute([$id]);

            foreach ($selectData as $data) { ?>
               <form action="process.php" method="post">
                  <center>
                     <h5 class="mb-3"><strong>Edit Subject</strong></h5>
                  </center>
                  <input type="hidden" name="id" value="<?= $data['id'] ?>">
                  <div class="mb-3 mt-2">
                     <strong><label for="subject">Subject Title</label></strong>
                     <input type="text" class="form-control mb-3 mt-3" id="subject" name="subject" value="<?= $data['sub'] ?>"
                        required>
                  </div>
                  <div class="d-flex justify-content-between">
                     <div class="mb-2 mt-3" style="width: 10%;">
                        <a class="btn btn-success" style="width:100%;" href="subject.php" name="editLogin">Back</a>
                     </div>
                     <div class="mb-2 mt-3">
                        <button class="btn btn-warning" type="submit" name="editSub">Update</button>
                     </div>
                  </div>
               </form>
            <?php }
         } else { ?>
            <form action="process.php" method="post">
               <center>
                  <h5 class="mb-3"><strong>Add Subject</strong></h5>
               </center>
               <input type="hidden" name="user_id" value="<?= $_SESSION['u_id'] ?>">
               <div class="mb-3 mt-2">
                  <strong><label for="subject">Subject Title</label></strong>
                  <input type="text" class="form-control mb-3 mt-3" id="subject" name="subject" required>
               </div>
               <div class="mb-3">
                  <button class="btn btn-success" type="submit" name="addSub">Add</button>
               </div>
            </form>
         <?php } ?>
      </div>
   </div>

   <?php
}
?>

<?php
if (isset($_GET['Student'])) {
   ?>

   <div class="row justify-content-center">
      <div class="col-md-5 shadow mt-5 p-3">
         <?php if (isset($_GET['msg'])) { ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
               <strong>
                  <?php echo $_GET['msg'] ?>
               </strong>
               <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
         <?php } ?>

         <?php
         if (isset($_GET['edit'])) {
            // display the data to be edited here 
            $id = $_GET['id'];
            $selectData = $conn->prepare("SELECT * FROM student WHERE id = ?");
            $selectData->execute([$id]);

            foreach ($selectData as $data) { ?>
               <center>
                  <h5 class="mb-3"><strong>Edit Student</strong></h5>
               </center>
               <form action="process.php" method="post">
                  <input type="hidden" name="id" value="<?= $data['id'] ?>">
                  <div class="mb-3 mt-2">
                     <label for="fname">Firstname</label>
                     <input type="text" class="form-control mb-3" id="fname" name="firstname" value="<?= $data['fname'] ?>"
                        required>
                  </div>
                  <div class="mb-3">
                     <label for="lname">Lastname</label>
                     <input type="text" class="form-control mb-3" id="lname" name="lastname" value="<?= $data['lname'] ?>"
                        required>
                  </div>
                  <div class="d-flex justify-content-evenly">
                     <div class="mb-3">
                        <label for="pre">Prelim</label>
                        <input type="text" class="form-control mb-3" id="pre" name="pre" value="<?= $data['pre'] ?>" required>
                     </div>
                     <div class="mb-3">
                        <label for="mid">Midterm</label>
                        <input type="text" class="form-control mb-3" id="mid" name="mid" value="<?= $data['mid'] ?>" required>
                     </div>
                     <div class="mb-3">
                        <label for="final">Finalterm</label>
                        <input type="text" class="form-control mb-3" id="final" name="final" value="<?= $data['final'] ?>"
                           required>
                     </div>
                  </div>
                  <div class="d-flex justify-content-between">
                     <div class="mb-2 mt-3" style="width: 10%;">
                        <a class="btn btn-success" style="width:100%;" href="subject.php" name="editLogin">Back</a>
                     </div>
                     <div class="mb-3">
                        <button class="btn btn-warning" type="submit" name="editData">Update</button>
                     </div>
                  </div>
               </form>
            <?php }
         } else { ?>
            <center>
               <h5 class="mb-3"><strong>Add Student</strong></h5>
            </center>
            <form action="process.php" method="post">
               <input type="hidden" name="user_id" value="<?= $_SESSION['u_id'] ?>">
               <input type="hidden" name="sub_id" value="<?= isset($_GET['id']) ? $_GET['id'] : '' ?>">
               <div class="mb-3 mt-2">
                  <label for="fname">Firstname</label>
                  <input type="text" class="form-control mb-3" id="fname" name="firstname" required>
               </div>
               <div class="mb-3">
                  <label for="lname">Lastname</label>
                  <input type="text" class="form-control mb-3" id="lname" name="lastname" required>
               </div>
               <div class="d-flex justify-content-evenly">
                  <div class="mb-3">
                     <label for="pre">Prelim</label>
                     <input type="text" class="form-control mb-3" id="pre" name="pre" required>
                  </div>
                  <div class="mb-3">
                     <label for="mid">Midterm</label>
                     <input type="text" class="form-control mb-3" id="mid" name="mid" required>
                  </div>
                  <div class="mb-3">
                     <label for="final">Finalterm</label>
                     <input type="text" class="form-control mb-3" id="final" name="final" required>
                  </div>
               </div>
               <div class="mb-3">
                  <center>
                     <button class="btn btn-success" type="submit" name="addData">Add</button>
                  </center>
               </div>
            </form>
         <?php } ?>
      </div>
   </div>

   <?php
}
?>

</body>

</html>