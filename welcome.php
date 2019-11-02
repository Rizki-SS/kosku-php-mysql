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
    </style>
    <?php 
    include("templates/resources.php")
    ?>
  </head>
  <body>
    <?php 
    include("templates/navbar.php")
    ?>
    <div class="grid">
      <div class="grid-item">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe incidunt, tempora quasi dignissimos ullam adipisci possimus sunt natus dolores aperiam consequatur ratione quam praesentium culpa, sint perferendis officiis eum omnis!</div>
      <div class="grid-item">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe incidunt, tempora quasi dignissimos ullam adipisci possimus sunt natus dolores aperiam consequatur ratione quam praesentium culpa, sint perferendis officiis eum omnis!</div>
      <div class="grid-item">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe incidunt, tempora quasi dignissimos ullam adipisci possimus sunt natus dolores aperiam consequatur ratione quam praesentium culpa, sint perferendis officiis eum omnis!</div>
      <!-- <div class="grid-item">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe incidunt, tempora quasi dignissimos ullam adipisci possimus sunt natus dolores aperiam consequatur ratione quam praesentium culpa, sint perferendis officiis eum omnis!</div>
      <div class="grid-item">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe incidunt, tempora quasi dignissimos ullam adipisci possimus sunt natus dolores aperiam consequatur ratione quam praesentium culpa, sint perferendis officiis eum omnis!</div>
      <div class="grid-item">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe incidunt, tempora quasi dignissimos ullam adipisci possimus sunt natus dolores aperiam consequatur ratione quam praesentium culpa, sint perferendis officiis eum omnis!</div> -->
    </div>
  </body>
</html>