<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container"> <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span
                    class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span> </a><a class="brand" href="index.html">Exams </a>
      <div class="nav-collapse">
        <ul class="nav pull-right">
          <!--<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                            class="icon-cog"></i> Account <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="javascript:;">Settings</a></li>
              <li><a href="javascript:;">Help</a></li>
            </ul>
          </li>-->
          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                            class="icon-user"></i> <?php echo $_SESSION['username'] ?><b class="caret"></b></a>
            <ul class="dropdown-menu">
              <!--<li><a href="javascript:;">Profile</a></li>-->
              <li><a href="./security/logout.php">Logout</a></li>
            </ul>
          </li>
        </ul>
        <!--<form class="navbar-search pull-right">
          <input type="text" class="search-query" placeholder="Search">
        </form>-->
      </div>
      <!--/.nav-collapse --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /navbar-inner --> 
</div>
<!-- /navbar -->
<?php 
//$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$home =  $_SERVER['REQUEST_URI']=="/exams/" || $_SERVER['REQUEST_URI']=="/exams/index.php";
$pieces = explode("/", $_SERVER['REQUEST_URI']);
//print_r($pieces[2]);//can be used as breadcrump
$current = $pieces[0];
if(isset($pieces[2]))
 $current = $pieces[2];
?>
  <div class="subnavbar">
  <div class="subnavbar-inner">
    <div class="container">
      <ul class="mainnav">
        <li <?php if ($current == "exams") echo 'class="active"'?>><a href="exams/"><i class="icon-Exams"></i><span>Exams</span> </a> </li>
        <li <?php if ($current == "results") echo 'class="active"'?>><a href="results/"><i class="icon-list-alt"></i><span>Results</span> </a> </li>
        <li <?php if ($current == "subjects") echo 'class="active"'?>><a href="subjects/"><i class="icon-Subjects"></i><span>Subjects</span> </a></li>
        <li <?php if ($current == "questions") echo 'class="active"'?>><a href="questions/"><i class="icon-Questions"></i><span>Questions</span> </a> </li>
        <li <?php if ($current == "chapters") echo 'class="active"'?>><a href="chapters/"><i class="icon-Chapters"></i><span>Chapters</span> </a> </li>
        <li <?php if ($current == "students") echo 'class="active"'?>><a href="students/"><i class="icon-Students"></i><span>Students</span> </a></li>
        <li <?php if ($current == "teachers") echo 'class="active"'?>><a href="teachers/"><i class="icon-Teachers"></i><span>Teachers</span> </a></li>
        <li <?php if ($current == "admins") echo 'class="active"'?>><a href="admins/"><i class="icon-administrators"></i><span>administrators</span> </a></li>
        <li <?php if ($current == "classes") echo 'class="active"'?>><a href="classes/"><i class="icon-Classes"></i><span>Classes</span> </a></li>
      </ul>
    </div>
    <!-- /container --> 
  </div>
  <!-- /subnavbar-inner --> 
</div>
<!-- /subnavbar -->
<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">