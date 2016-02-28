<!--Susan Smith-php repositories get data from Github and load in database-->

<?php
  //load data and connect to db
  require('REPOSd_loadData.php');
  require('REPOSa_connect_database.php');

  //create and run query for the db
  $query = "SELECT * FROM repos
            ORDER BY starNum DESC";

    $statement = $db->prepare($query);
    $statement->execute();
    $repos = $statement->fetchAll();
?>

 <!DOCTYPE html>
 <html lang="en">

  <head>
    <title>PHP Repositories</title>
 <meta charset="utf-8">

 <!--get bootstrap requirements-->
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<!--background-->
<style>
  body{
    background-color: 4C99B6;
  }
</style>
 </head>
 

 <body>
   <!--use bootstrap grid system to control placement of elements-->
     <div class="container">
     <div class="row">
     <div class="col-md-6 col-md-offset-3">

    <div class="page-header" style="text-align: center">
        <h1 style="padding-right:35px"><strong><span class= "label label-warning">Choose a Repository</span></strong></h1>
          <br>
        <h4><span class="label label-primary">*Repositories are listed in descending order by number of stars*</h4>
    </div>

    <?php
    //$i links the panel titles to panel dropdowns
    $i=1;

    //loop through all entries and display in bootstrap panels
    foreach ($repos as $r)
 	    {
    ?>
    <!--panel title-->
    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
    <div class="panel panel-default">
      <?php echo "<div class=\"panel-heading\" role=\"tab\" id=\"heading".$i."\">";?>
        <h4 class="panel-title" style="font-weight:bold; font-size: 150%">
          <?php echo "<a role=\"button\" data-toggle=\"collapse\" data-parent=\"#accordion\" href=\"#collapse".$i."\" aria-expanded=\"true\" aria-controls=\"collapse".$i."\">";?>
            <?php echo $r['Name'];?>
            </a>
        </h4>
   </div>

   <!--panel body-->
      <?php echo "<div id=\"collapse".$i."\" class=\"panel-collapse collapse\" role=\"tabpanel\" aria-labelledby=\"heading".$i."\">";?>

        <div class="panel-body" style="background-color:C8F8FF; border:2px solid #FFC656">
          <?php
            echo "<strong>Repository ID: </strong>".$r['RepoID']."<br><br>\n";
            echo "<strong>URL: </strong><a href=\"".$r['url']."\">".$r['url']."</a><br><br>\n";
            echo "<strong>Date Created: </strong>".$r['createDate']."<br><br>\n";
            echo "<strong>Last Pushed Date: </strong>".$r['pushDate']."<br><br>\n";
            echo "<strong>Description: </strong>".$r['description']."<br><br>\n";
            echo "<strong>Number of Stars: </strong>".$r['starNum']."<br><br>\n";
          ?>


        </div>
      </div>
    </div>

        <?php
          $i++;
         }
        ?>
      </div>
    </div>
  </div>

  </body>
</html>
