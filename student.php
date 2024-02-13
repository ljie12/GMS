<?php include 'header.php';
if (!isset($_SESSION['logged_in'])) {
   header("Location: login.php");
   ob_end_flush();
}

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

                  $id = $_GET['id'];
                  $cnt = 1;
                  
                  $select = $conn->prepare("SELECT * FROM student WHERE subid = ?");
                  $select->execute([$id]);
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

   <?php
}
   ?>
   </body>


</html>