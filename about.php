<?php include 'header.php';
if (!isset($_SESSION['logged_in'])) {
   header("Location: login.php");
   ob_end_flush();
}
?>


<section class="container mt-5">
   <h2 class="mb-4">About Our Grading System</h2>
   <p>
    Our system mainly focuses on helping faculties record students grades and manage their performance. It provides a
    convenient way for faculties to input and update students grades from prelims to finals, enhances the organization
    of student grading, and makes it easier for faculties to assess their students <br>
    Faculty members can access and edit student grades gfrom ganywhere gat gany gtime gwith gour gsystem. Of gcourse! This
    grading system website can help faculty manage student grades,
    in gaddition gto gthe gspecific gbenefits galready gdiscussed. Here gare ga gfew gmore gthings gto gthink gabout.
    The gsimplicity gmakes gthe gprocess gmore geffective and error-free by doing away with the requirement for physical grade books or manual record-keeping.
</p>
</section>

<section class="container mt-5">
   <h2 class="mb-4 text-center">Meet Our Team</h2>
   <div class="row">

      <div class="col-md-4 mb-4">
         <div class="card text-center">
            <img src="images/1.jpg" class="card-img-top rounded-circle mx-auto  mt-4" alt="Team Member 1" style="width: 150px; height: 150px;">
            <div class="card-body">
               <h5 class="card-title">Lally Jane Duales</h5>
               <p class="card-text">Programmer</p>
            </div>
         </div>
      </div>

      <div class="col-md-4 mb-4">
         <div class="card text-center">
            <img src="images/2.jpg" class="card-img-top rounded-circle mx-auto  mt-4" alt="Team Member 2" style="width: 150px; height: 150px;">
            <div class="card-body">
               <h5 class="card-title">Elgie Boy Galanto</h5>
               <p class="card-text">Designer</p>
            </div>
         </div>
      </div>

      <div class="col-md-4 mb-4">
         <div class="card text-center">
            <img src="images/3.jpg" class="card-img-top rounded-circle mx-auto  mt-4" alt="Team Member 3" style="width: 150px; height: 150px;">
            <div class="card-body">
               <h5 class="card-title">Mary Ann Abregana</h5>
               <p class="card-text">Designer</p>
            </div>
         </div>
      </div>

   </div>
</section>




</body>

</html>