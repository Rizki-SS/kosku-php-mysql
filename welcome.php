<html>
  <head>
    <style>
      #header {
        height: 500px;
        background-image: url("assets/head-bg.jpg");
        background-size: cover;
        padding-top: 200px;
      }

      .benefit {
        padding-top: 100px;
      }

      .img-benefit {
        width: 500px;
        height: auto;
      }

      .circle {
        width: 200px;
        height: 200px;
        border: 10px solid #ffbe15;
        border-radius: 50%;
      }

      #footer {
        margin-top: 50px;
        height: 200px;
        padding-top: 25px;
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

    <div class="container" id="header">
      <div style="padding-left: 100px; padding-right: 100px;">
        <h1 class="display-4 text-light text-center">
          Manajemen Kos Dalam 1 Aplikasi
        </h1>
        <h6 class="text-light text-center">
          Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptatem
          distinctio pariatur perferendis delectus dolore dolores quae quos non
          corporis libero eligendi nobis, atque totam. Officia voluptate nam
          maiores sint maxime.
        </h6>
      </div>
    </div>
    <div class="container benefit">
      <div class="row">
        <div class="col-lg">
          <img src="assets/undraw_file_manager_j85s.svg" class="img-benefit" />
        </div>
        <div class="col-lg">
          <h3 style="font-weight: 500;">Kesusahan dalam manajemen kos?</h3>
          <br />
          <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe
            incidunt, tempora quasi dignissimos ullam adipisci possimus sunt
            natus dolores aperiam consequatur ratione quam praesentium culpa,
            sint perferendis officiis eum omnis!
          </p>
        </div>
      </div>
    </div>
    <div class="container benefit">
      <div class="row">
        <div class="col-lg">
          <h3 style="font-weight: 500;">Kesusahan dalam manajemen kos?</h3>
          <br />
          <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe
            incidunt, tempora quasi dignissimos ullam adipisci possimus sunt
            natus dolores aperiam consequatur ratione quam praesentium culpa,
            sint perferendis officiis eum omnis!
          </p>
        </div>
        <div class="col-lg">
          <img src="assets/undraw_file_manager_j85s.svg" class="img-benefit" />
        </div>
      </div>
    </div>
    <div class="container benefit">
      <div class="row">
        <div class="col-lg">
          <div class="card">
            <div
              class="text-center"
              style="padding-top: 50px; padding-bottom: 30px;"
            >
              <div class="display-1">1</div>
            </div>
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">
                Some quick example text to build on the card title and make up
                the bulk of the card's content.
              </p>
            </div>
          </div>
        </div>
        <div class="col-lg">
          <div class="card">
            <div
              class="text-center"
              style="padding-top: 50px; padding-bottom: 30px;"
            >
              <div class="display-1">2</div>
            </div>
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">
                Some quick example text to build on the card title and make up
                the bulk of the card's content.
              </p>
            </div>
          </div>
        </div>
        <div class="col-lg">
          <div class="card">
            <div
              class="text-center"
              style="padding-top: 50px; padding-bottom: 30px;"
            >
              <div class="display-1">3</div>
            </div>
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">
                Some quick example text to build on the card title and make up
                the bulk of the card's content.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container benefit text-center">
      <h2>Tertarik? Daftar Dulu Aja...</h2>
      <a href="#" class="btn btn-primary">Daftar</a>
    </div>
    <div class="container bg-warning" id="footer">
      <h5 class="text-center">Tim : <br /><br /></h5>
      <div class="row">
        <div class="col-lg"><h4>TI-2H</h4></div>
        <div class="col-lg">
          Moch. Irfan Rafif <br />
          Bahrul Munir <br />
          Wardah Ghaliyah <br />
        </div>
        <div class="col-lg">
          15 <br />
          27 <br />
          7
        </div>
      </div>
    </div>
  </body>
</html>
