 <section id="announcements">
   <div class="container">
     <div class="wow fadeInDown">
      <div class="center">
         <h2>Announcements</h2>
      </div>
      <div class="row myrow">
        <div class="col-lg-2">
          
        </div>
        <div class="col-lg-8">
          <table class="table table-striped table-hover">
          <tr>
            <tbody>
            <?php foreach ($get_announcements as $row):  
              $date_posted = date_create($row['date_posted']);
              $month_posted = strtoupper(date_format($date_posted,"M"));
              $day_posted = date_format($date_posted,"d");
            ?>
              <tr>
                <td class="col-lg-2">
                  <div class="center announcement-date">
                    <b><?php echo $month_posted; ?></b> <br>
                    <?php echo $day_posted; ?>
                  </div>
                </td>
                <td>
                  <?php 
                    $thedate = date_create($row['date_posted']);
                    $date_posted =  date_format($thedate,"F d, Y"); 
                    $selectedyear = date_format($thedate,"Y");
                    echo "<a class='announcement-link' href='announcements.php?year=".$selectedyear."&id=";
                    echo $row['id']."'>";
                    echo $row['title']."</a> <br><br>";
                    echo $date_posted;
                  ?>
                </td>
              </tr>
            <?php endforeach ?>
            </tbody>
          </tr>
        </table>
        </div>


      </div>
       <center>
           <a href="announcements.php" class="readmore-link wow fadeInDown">Read More...</a>
      </center>
     </div>
   </div>

 </section>


 <section id="about-us">
      <div class="container">
         <div class="center wow fadeInDown">
              <h2>About us</h2>
              <p class="lead text-justify">As an active partner of the Department of Education (DepEd), the <b>Science-Math Brain Power Philippines (SMBPP)</b> goes hand in hand in the promotion and advancement of quality education in the country, specifically in Science and Mathematics education. Established by well-experienced Science and Mathematics educators and well-selected technical experts in the field, the SMBPP will offer feasible academic activities such as quiz competition, research congress and trainings for students and teachers which, in many ways, motivate them to expand and explore their understanding of the subjects. The organization is committed to provide quality service in all its undertakings and ensure greater satisfaction and fulfillment of clientele in recognizing their achievements. </p>
               <center>
                 <a href="about-us.php" class="readmore-link wow fadeInDown">Read More...</a>
              </center>
          </div>


          <div class="row">
             
          </div><!--/.row-->    
      </div><!--/.container-->
  </section><!--/#about-us-->

    <section id="flagship-projects">
        <div class="container">
            <div class="center wow fadeInDown">
                <h2><i class="fa fa-flag" aria-hidden="true"></i> Flagship Projects</h2>
                <p class="lead">The following are the major activities that will help boost Science and Mathematics education in all public, private elementary and secondary schools in the country:</p>
            </div>

            <div class="row" class="">
               <div class="col-lg-6 wow fadeInDown" >
                <div class="container-fluid" id="elementary-level">
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                            <h2 class="text-center wow fadeInDown">ELEMENTARY LEVEL</h2>
                        </div>
                        <div class="panel-body">
                            <h4>A. Science Competition</h4> 
                           <div class="project-container">
                            1. Science Brain Power <b class="text-danger">QUIZ</b><br>
                            &emsp;&emsp;<i class="fa fa-angle-double-right" aria-hidden="true"></i> K to 12 Grade Level Power Quiz <b>(Grades 4 to 6)</b> <br>
                            2. Earth & Environment Power <b class="text-danger">QUIZ</b> <br>
                            3. Research Congress<br>
                            &emsp;&emsp;<i class="fa fa-angle-double-right" aria-hidden="true"></i> Research Olympics for Science Investigatory Project <b>(ROSIP)</b><br>
                            </div>
                            <h4>B. MATHEMATICS COMPETITION</h4>
                            <div class="project-container">
                            1. Mathematics Brain Power <b class="text-danger">QUIZ</b><br>
                            &emsp;&emsp;<i class="fa fa-angle-double-right" aria-hidden="true"></i> K to 12 Grade Level Power Quiz <b>(Grades 4 to 6)</b><br>
                            2. Mathematics Compute-Fast <b class="text-danger">RELAY</b> <br>
                          
                           </div>
                        </div>
                    </div>
                </div>

               </div> 
               <div class="col-lg-6 wow fadeInDown" >
                   <div class="container-fluid" id="junior-high-level">
                       <div class="panel panel-danger">
                        <div class="panel-heading">
                            <h2 class="text-center wow fadeInDown">JUNIOR HIGHSCHOOL LEVEL</h2>
                        </div>
                        <div class="panel-body">
                            <h4>A. SCIENCE COMPETITION</h4>
                            <div class="project-container">
                                1. General Science Brain Olympics <b>(GSBO)</b> - National Science <b class="text-danger">QUIZ</b> <b>(NMQ)</b><br>
                                2. National Meteorology And Astronomy <b class="text-danger">QUIZ</b> <b>(NMAQ)</b><br>
                                3. National Geology and Hydrology <b class="text-danger">QUIZ</b> <b>(NGHQ)</b><br>
                            </div>
                            <h4>B. MATHEMATICS BRAIN POWER QUIZ </h4>
                            <div class="project-container">
                                1. General Mathematics Brain Olympics <b>(GMBO)</b> - National Mathematics <b class="text-danger">QUIZ</b> <br>
                                2. Algebra and Geometry <b class="text-danger">QUIZ</b> <b>AlGeo Quiz</b><br>
                                3. Brain Power Statistics Quiz <b>(BP Stat Quiz)</b>
                            </div>
                            <h4>C. BRAIN POWER SEMINAR</h4>
                            <div class="project-container">
                                1. Einstein's Seminar on Doing Science Research for Students <br>
                                2. National Seminar on Brain Power Mathematics for Students <br>
                             
                            </div>
                        </div>
                    </div>
                   </div>
               </div>
              <center>
                   <a href="projects.php" class="readmore-link wow fadeInDown">Read More...</a>
              </center>
            </div><!--/.row-->
        </div><!--/.container-->
    </section><!--/#flagship-projects-->

    <section id="events" style="display:none">
	   <div class="container">
            <div class="center wow fadeInDown">
                <h2 style="color:#4e4e4e">EVENTS</h2>
                <p class="announcement-title">The Science – Math Brain Power Phils., Corp. announces the following competitions in Science and Mathematics at the National Level for the  year 2017: </p >
            </div>

            <div class="row">
                 <div class="col-lg-6 wow fadeInDown" >
                   <div class="container-fluid">
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <h2 class="text-center">SCIENCE</h2>
                            </div>
                            <div class="panel-body">
                            <ul>
                                <li>
                                    Elementary Science Brain Power (ESBP) QUIZ - (Grades 4 to 6)
                                </li>
                                <li>
                                    Earth & Environment Power QUIZ (Grades 5 & 6)
                                </li>
                                <li>
                                    General Science Brain Power (GSBP) QUIZ
                                </li>
                                <li>
                                    National Meteorology and Astronomy (NMA) Quiz 
                                </li>
                                <li>
                                    National Geology and Hydrology (NGH) Quiz
                                </li>
                                <li>
                                    Research Congress
                                </li>
                            </ul> 

                            </div>
                        </div>  
                   </div>
                 </div>

                  <div class="col-lg-6 wow fadeInDown" >
                   <div class="container-fluid">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <h2 class="text-center">MATHEMATICS</h2>
                            </div>
                            <div class="panel-body">
                            <ul>
                               <li>Elementary Mathematics Brain Power (EMBP) QUIZ - (Grades 4 to 6)</li>
                               <li>General Mathematics Brain Power (GMBP) QUIZ</li> 
                               <li>Algebra and Geometry (AlGeo) Quiz</li>
                               <li>Brain Power Statistics (BP Stat) Quiz </li>

                            </ul> 

                            </div>
                        </div>  
                   </div>
                 </div>
            
                   

            </div><!--/.row-->

             <div class="row myrow" style="margin-bottom: 30px;">
              <center>
                    <a href="events.php" class="readmore-link wow fadeInDown">Read More...</a>
                </center> 
            </div>
          
        </div><!--/.container-->
    </section><!--/#services-->