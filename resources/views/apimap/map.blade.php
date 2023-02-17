<html>
    <head>
        <title>Simple Map</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <style type="text/css">
        html {
            height: 100%;
        }
        body {
            margin: 0px;
            height: 100%;
        }
        #map {
            height: 70%;
            width: 100%;
        }
    </style>
    <body>
        <div class="container-fluid">

            <div class="input-group mt-3 mb-3">
                <input type="text" class="form-control" placeholder="Search">
                <div class="input-group-append">
                  <button class="btn btn-success" type="button">Search</button>
                </div>
            </div>

            <div class="text-ceenter">
                <div id="map"></div>
            </div>
        </div>

        <script type="text/javascript" src="https://api.longdo.com/map/?key=a1f0b3aff58245ed8be4929f110ba0b5"></script>

        <script>

          function init() {
            var map = new longdo.Map({
              placeholder: document.getElementById('map')
            });
          }

          init();

        </script>
    </body>
</html>
