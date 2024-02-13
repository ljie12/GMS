<?php include 'header.php';
if (!isset($_SESSION['logged_in'])) {
   header("Location: login.php");
   ob_end_flush();
}
?>


<!--row for display Subjects-->
<div class="row mt-4 justify-content-center">
   <div class="col-sm-10">
      <div class="table">
         <?php if (isset($_GET['msg'])) { ?>

            <div class="alert alert-warning alert-dismissible fade show" role="alert">
               
                  <strong>
                     <center>
                        <?php echo $_GET['msg'] ?>
                     </center>
                  </strong>
               
               <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

         <?php } ?>
         <table class="table shadow p-2">
            <thead>
               <th>#</th>
               <th>Subject Title</th>
               <th>Action</th>
            </thead>
            <tbody>
               <?php
               $userID = $_SESSION['u_id'];
               $cnt = 1;
               $select = $conn->prepare("SELECT * FROM subject WHERE user_id = ?");
               $select->execute([$userID]);
               foreach ($select as $value) { ?>

                  <tr>
                     <td>
                        <?= $cnt++ ?>
                     </td>
                     <td>
                        <?= $value['sub'] ?>
                     </td>
                     <td>
                        <a href="student.php?view&id=<?= $value['id'] ?>" class="text-decoration-none">👁</a>|
                        <a href="index.php?Subject&edit1&id=<?= $value['id'] ?>" class="text-decoration-none">✏️</a>|
                        <a href="process.php?delete1&id=<?= $value['id'] ?>" class="text-decoration-none">❌</a>|
                        <a href="index.php?Student&id=<?= $value['id'] ?>" class="text-decoration-none">Add Student</a>
                     </td>

                  </tr>
               <?php } ?>
            </tbody>
         </table>

      </div>
   </div>
</div>


<?php
if (isset($_GET['view'])) {
   ?>

   <!--row for display Students-->
   <div class="row mt-4 justify-content-center">
      <div class="col-sm-10">
         <div class="table">
            <table class="table shadow p-2">
               <thead>
                  <th>#</th>
                  <th>Firstname</th>
                  <th>Lastname</th>
                  <th>Prelim</th>
                  <th>Midterm</th>
                  <th>Finalterm</th>
                  <th>Action</th>
               </thead>
               <tbody>
                  <?php
                  $userID = $_SESSION['u_id'];
                  $cnt = 1;
                  $select = $conn->prepare("SELECT * FROM student WHERE user_id = ?");
                  $select->execute([$userID]);
                  foreach ($select as $value) { ?>

                     <tr>
                        <td>
                           <?= $cnt++ ?>
                        </td>
                        <td>
                           <?= $value['fname'] ?>
                        </td>
                        <td>
                           <?= $value['lname'] ?>
                        </td>
                        <td>
                           <?= $value['pre'] ?>
                        </td>
                        <td>
                           <?= $value['mid'] ?>
                        </td>
                        <td>
                           <?= $value['final'] ?>
                        </td>
                        <td>
                           <a href="index.php?Student&edit&id=<?= $value['id'] ?>" class="text-decoration-none">✏️</a>|
                           <a href="process.php?delete&id=<?= $value['id'] ?>" class="text-decoration-none">❌</a>
                        </td>
                     </tr>

                  <?php } ?>
               </tbody>
            </table>
         </div>
      </div>
   </div>
   </body>

   <?php
}
?>

</html>