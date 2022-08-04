<?php
session_start();

//importing database connection
require_once("configuration/config.php");
require_once("configuration/auth.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/x-icon" href="./images/1200px-BMS_College_of_Engineering.svg.png">
  <link rel="stylesheet" href="./CSS/home.css">
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  <title>BMSCE</title>
</head>

<body>

  <!--header container-->
  <?php
  require_once("driver_code/html/header.html");
  ?>


  <!--About college paragraph__1 -->
  <div class="start_page">
    <img src="./images/B-M-S-COLLEGE-OF-ENGINEERING-BASAVANAGUDI-1024x596.png" alt="B-M-S-COLLEGE-OF-ENGINEERING-BASAVANAGUDI" class="img1">
    <p class="para">
      <span style="font-weight: bold;">BMS College of Engineering (BMSCE)</span> was Founded in the year
      <span style="background-color: rgb(238, 238, 195); border-radius: 5px;">1946</span> by Late Sri. B. M.
      Sreenivasaiah a great visionary and philanthropist and nurtured by his illustrious son Late Sri. B. S. Narayan.
      BMSCE is the first private sector initiative in engineering education in India. BMSCE has completed 70+ years of
      dedicated service in the field of Engineering Education. <br><br>
      <span style="font-weight: bold;">Location & Area :</span> Located in the heart of Bangalore, the Garden City of
      India, BMSCE is about 5 KMs from the Central Railway Station. The campus area is 11 Acres 30 Guntas with a built
      up area of 99,500 Sq.M..
    </p>
  </div>


  <!--exam notification-->
  <div id="notification" data-aos="fade-up" data-aos-duration="1000">
    <h1 class="h1_of_exam" style="text-align: center; color: red;">
      <span style="color: rgb(19, 32, 74); text-decoration:underline;">EXAMS</span> NOTIFICATIONS
    </h1>
    <div class="exam_notification">
      <p1>1. GATE EXAM ARE SCHEDULED TO TAKE PLACE ON 5, 6, 12, 13 Feb 2022 <a href="https://gate.iitkgp.ac.in/" target="_blank" style="text-decoration: none;">click here to visit official GATE website</a>
      </p1>
      <p1>2.
        <a href="https://gate.iitkgp.ac.in/mock_links.html" target="_blank" style="text-decoration: none;">
          click here
        </a>
        TO TAKE A MOCK TEST FOR ANY GATE PAPER OF LAST YEAR.
      </p1>
      <P1>3. OPENING DATE OF ONLINE APPLICATION PORTAL FOR GATE 2022: 02nd Sep, 2021 (Thu)</P1>
      <P1>4. CLOSING DATE OF ONLINE APLLICATION PORTAL:30th Sep, 2021 (Thu)</P1>
      <P1>5. CAT EXAMS ARE SCHEDULED TO TAKE PLACE ON Sun, 28 Nov, 2021 <a href="https://iimcat.ac.in/per/g01/pub/756/ASM/WebPortal/1/index.php?756@@1@@1" target="_blank" style="text-decoration: none;">click here to visit official GATE website</a>
      </P1>
      <P1>6. <a href="https://cdn.digialm.com//EForms/configuredHtml/756/66504/login.html" target="_blank" style="text-decoration: none;">click here</a>TO DOWNLOAD CAT 2020 SCORE CARD
      </P1>
    </div>
  </div>


  <!--BMSCE notification-->
  <div id="bms_notification" data-aos="fade-up" data-aos-duration="1000">
    <h1 style="text-align: center; color: rgb(255, 0, 0);">
      <span style="color: blue; text-decoration: underline;">BMSCE
      </span> NOTIFICATIONS
    </h1>
    <div class="bms_notification">
      <p1>
        <span style="color: rgb(255, 0, 0);">1.</span> As per the latest directions from the GOK & VTU, the classes
        are
        to be conducted in Offline mode. For further details, students are informed to contact their concerned HOD.
        Further, as per the Government Order, in view of weekend curfew, the college remains closed on 8th January
        2022
        (Saturday). However, online classes would be conducted on 8th Jan. 2022. The CIE & SEE scheduled will be
        conducted in Offline mode only at the college.
      </p1>
      <p1>
        <span style="color: rgb(255, 0, 0);">2.</span> Inauguration of First Year B.E.(2021-2022) classes to be held
        on 19th December 2021 at 11 AM
        <a href="https://bmsce.ac.in/website_notifications/First_Year_B_E__Inauguration_Invitation.pdf" target="_blank" style="text-decoration: none;">More info</a>
      </p1>
      <p1>
        <span style="color: rgb(255, 0, 0);">3.</span> Commencement of First Year B.E. (2021-2022) Program - Monday
        13th December 2021
        <a href="https://bmsce.ac.in/website_notifications/Commencement_of_first_year_classes.pdf" download style="text-decoration: none;" target="_blank">Click here
        </a> to download TT.
      </p1>
      <p1>
        <span style="color: rgb(255, 0, 0);">4.</span> Change of Branch for the academic year 2021-22 as per the
        merit list -Counselling dated 17.11.2021 @ 10 AM.
        <a href="https://bmsce.ac.in/website_notifications/Rescheduled_Circular_for_Change_of_Branch.pdf" target="_blank" style="text-decoration: none;">notification
        </a>
      </p1>
      <p1>
        <span style="color: rgb(255, 0, 0);">5.</span> AICTE Swanath Scholarship Scheme (Both Degree and Diploma
        Level) <a href="https://bmsce.ac.in/website_notifications/AICTE_Swanath_Scholarship_Scheme.pdf" target="_blank" style="text-decoration: none;">More info
        </a>
      </p1>
      <p1>
        <span style="color: rgb(255, 0, 0);">6.</span>Fastrack exam results :
        <a href="./results.html" style="text-decoration: none;">Results</a>
      </p1>
      <p1>
        <span style="color: rgb(255, 0, 0);">7.</span>Calendar of Events for UG Higher Semesters for the
        academic year 2021-22
        <a href="https://bmsce.ac.in/CalendarEvents/Calendar%20of%20Events%20for%20UG%20Higher%20Semesters%20for%20the%20academic%20year%202021-22.pdf" target="_blank" style="text-decoration: none;">More info
        </a>
      </p1>
    </div>
  </div>


  <!--About college paragraph__2 -->
  <div class="start_page_2" data-aos="fade-up" data-aos-duration="1000">
    <img src="./images/jublee_block_day.jpg" alt="jublee_block_day" class="img2">
    <p class="para_2">
      <span style="font-weight: bold;">BMSCE</span> is the first private sector initiative in
      engineering education in <span style="background-color: rgb(238, 238, 195); border-radius: 5px;">India</span>.
      Over the past 74 years of its illustrious existence, the institution has produced more than 40,000
      engineers/leaders who have enriched the world through their immense contributions for mankind. Started with only
      03 undergraduate courses, BMSCE today offers 13 Undergraduate & 16 Postgraduate courses both in conventional and
      emerging areas. 14 of its Departments are recognized as Research Centers offering PhD/M.Sc (Engineering by
      Research) degrees in Science, Engineering and Management. The College has been effectively practicing outcome
      based education. The College has one of the largest student populations amongst engineering colleges in
      Karnataka. Currently about 5000 students are pursuing their higher studies in BMSCE. More than 350 research
      scholars are pursuing their PhD Degree in BMSCE Research Centres. BMSCE is one of the most preferred
      destinations for the students from across the country which could be attributed to the quality education,
      infrastructure, healthy teaching-learning practices as well as producing industry ready students.
    </p>
  </div>


  <!--About college paragraph__3 -->
  <div class="start_page_3" data-aos="fade-up" data-aos-duration="1000">
    <img src="./images/jublee_block_night.jpg" alt="./jublee_block_night" class="img3">
    <p class="para_3">
      The College strives to develop technical, professional skills and individual values in its students that help to
      create foundation for their success. Speaking about faculty, the college has always attracted the cream of the
      crop. Its current team of faculty is no different. They are well qualified, meritorious, experienced and highly
      dedicated. The classrooms and labs of the college are best-in-class, well equipped and sophisticated.
      <span style="font-weight: 500;">
        The labs are regularly upgraded in order to stay advanced. The campus is Wi-Fi
        enabled with 24x7 internet facilities in the departments and hostels.
      </span> The college results and placement
      record bear testimony to the high standard of education provided by the institution.
    </p>
  </div>


  <!--About college paragraph__4 -->
  <div class="start_page_4" data-aos="fade-up" data-aos-duration="1000">
    <img src="./images/Library-10.jpg" alt="./jublee_block_night" class="img4">
    <p class="para_4">
      The institution has strong linkages and collaborations with reputed national and international
      institutes/organizations to nourish academic, research and innovation. The academic performance of the students
      has been exceptional,
      <span style="font-weight: 550;">more than 90% of the students secure first class/distinction.</span>
      The institution has an excellent Placement and Training Centre. More than 200
      reputed Core/IT/MNC companies visit the campus every year recruiting students from various branches. More than
      the 90% of the eligible students get placed every year. The institution is consistently ranked amongst the best
      engineering institutes in the country.
    </p>
  </div>


  <!--Link to the official website -->
  <a href="https://bmsce.ac.in/home" class="official">Visit official website</a>


  <!--end of page part-->
  <div class="end">
    <hr>

    <!--Scroll to top button-->
    <div>
      <a href="#header" class="sticky">Scroll to top</a>
    </div>

    <!--copyright mark-->
    <h2 class="ends">&copy;BMSCE 2021-22</h2>

    <!--end of page part end-->
  </div>


  <!--Appear on scroll JS library import-->
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>


  <!--Appear on scroll JS library implementaion-->
  <script>
    AOS.init();
  </script>

</body>

</html>