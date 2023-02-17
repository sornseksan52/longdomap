<html>
    <head>
        <title>Simple Map</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

        <!-- alertifyjs -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/@mdi/font@6.x/css/materialdesignicons.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.min.css" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">

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
            height: 85%;
            width: 100%;
        }
    </style>
    <body>
        <div id="app">
            <v-app>
                <v-main>
                    <v-container>
                        <div class="input-group mt-3 mb-3">
                            <input type="text" class="form-control" placeholder="Search">
                            <div class="input-group-append">
                            <button class="btn btn-success" type="button">Search</button>
                            </div>
                        </div>

                        <div class="text-ceenter">
                            <div id="map"></div>
                        </div>
                    </v-container>
                </v-main>
            </v-app>
        </div>

        <!-- vuetify -->
        <script src="https://cdn.jsdelivr.net/npm/vue@2.x/dist/vue.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.js"></script>

        <script type="text/javascript" src="https://api.longdo.com/map/?key=a1f0b3aff58245ed8be4929f110ba0b5"></script>

        <script>
            var map;
            // function initMap() {
            //     map = new longdo.Map({
            //         placeholder: document.getElementById('map'),
            //         language: 'th'
            //     });
            //     map.zoom(14, true);

            //     var marker = new longdo.Marker({ lon: 100.53, lat: 13.80 }, true);
            //     map.Overlays.add(marker);
            // }

            // initMap()


            var app = new Vue({
                el: '#app',
                vuetify: new Vuetify(),
                data() {
                    return {

                    }
                },
                methods: {
                    initMap : async function() {
                        map = new longdo.Map({
                            placeholder: document.getElementById('map'),
                            language: 'th'
                        });
                        map.zoom(14, true);

                        var marker = new longdo.Marker({ lon: 100.53, lat: 13.80 }, true);
                        map.Overlays.add(marker);
                    }
                },
                mounted: function () {

                    this.initMap()

                 },
            })

        </script>
    </body>
</html>
