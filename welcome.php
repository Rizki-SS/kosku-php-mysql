<html>
  <head>
    <style>
      .grid {
        display: grid;
        grid-template-columns: auto auto auto;
      }

      .grid-item {
        display: inline-grid;
      }

      .head {
        height: 500px;
        background-image: url("assets/head-bg.jpg");
        background-size: cover;
      }
    </style>
    <?php 
    include("templates/resources.php")
    ?>
  </head>
  <body>
    <?php 
    include("templates/navbar.php")
    ?>

    <div class="container">
      <div class="head">
        
      </div>
      <div class="row">
        <div class="col-sm">
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe
          incidunt, tempora quasi dignissimos ullam adipisci possimus sunt natus
          dolores aperiam consequatur ratione quam praesentium culpa, sint
          perferendis officiis eum omnis!
        </div>
        <div class="col-sm">
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe
          incidunt, tempora quasi dignissimos ullam adipisci possimus sunt natus
          dolores aperiam consequatur ratione quam praesentium culpa, sint
          perferendis officiis eum omnis!
        </div>
        <!-- <div class="col-sm">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe incidunt, tempora quasi dignissimos ullam adipisci possimus sunt natus dolores aperiam consequatur ratione quam praesentium culpa, sint perferendis officiis eum omnis!</div> -->
      </div>
    </div>
  </body>
</html>
