<html>
    <head>
        <title>Simple Map</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        {{-- bootstrap 4 --}}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
        {{-- alertifyjs --}}
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
                        <v-card elevation="2" class="p-2">
                            <div class="input-group mt-3 mb-3">
                                <input type="text" class="form-control" placeholder="ค้นหาร้านอาหาร" v-model="keyword">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button" v-on:click="searchShop">Search</button>
                                </div>
                            </div>
                            <div class="text-center">
                                <div id="map"></div>
                            </div>
                        </v-card>
                    </v-container>
                </v-main>
            </v-app>
        </div>

        {{-- vuetify --}}
        <script src="https://cdn.jsdelivr.net/npm/vue@2.x/dist/vue.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.js"></script>
        {{--  longdomap --}}
        {{-- Documentation => https://map.longdo.com/docs/ --}}
        <script type="text/javascript" src="https://api.longdo.com/map/?key=a1f0b3aff58245ed8be4929f110ba0b5"></script>
        {{-- jquery for user ajax --}}
        <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

        {{-- new pull test project --}}

        <script>
            var map; //init map
            var map_key = "a1f0b3aff58245ed8be4929f110ba0b5";

            var app = new Vue({
                el: '#app',
                vuetify: new Vuetify(),
                data() {
                    return {
                        keyword : "",
                        locationList : [],
                        lat : "13.8033836",
                        lon : "100.533986",
                        locationRes : [],
                    }
                },
                methods: {
                    initMap : function() {
                        map = new longdo.Map({
                            placeholder: document.getElementById('map'),
                            language: 'th' // กำหนด map เป็นภาษาไทย
                        });
                        map.zoom(14, true); //zoom map

                        this.startMap('100.533986',' 13.8033836')

                        map.Search.placeholder(
                            document.getElementById('result')
                        );
                    },
                    startMap : function(lon,lat) {
                        var marker = new longdo.Marker(
                            { lon: lon, lat: lat },
                            {
                                title: 'บางซื่อ',
                                icon: {
                                    url: 'https://map.longdo.com/mmmap/images/pin_mark.png',
                                },
                                detail: '-',
                                weight: longdo.OverlayWeight.Top
                            }
                        );
                        map.Overlays.add(marker);

                    },
                    searchShop : async function(){

                        let res = await this.ajax_post("https://api.longdo.com/POIService/json/search?",{
                                        key     : map_key,
                                        lon     : this.lon,
                                        lat     : this.lat,
                                        keyword : this.keyword,
                                        span    : '10km',
                                        limit   : 20
                                    });

                        this.locationRes = res.data

                        map.Overlays.clear();

                        this.startMap('100.533986',' 13.8033836')

                        if(Object.keys(res.data).length > 0){

                            let map_data = res.data
                            this.locationList = []

                            map_data.forEach((row,i) => {
                                this.locationList.push({lon : row.lon,lat : row.lat})
                                map.Overlays.add(new longdo.Marker(
                                    {
                                        lon: row.lon,
                                        lat: row.lat
                                    },
                                    {
                                        title: row.name,
                                        detail: row.address,
                                        weight: longdo.OverlayWeight.Top
                                    }
                                ));
                            });

                            boundValue = longdo.Util.locationBound(this.locationList);
                            map.bound(boundValue);
                        }


                    },ajax_post : async function (path, data) {
                        let result;
                        try {
                            result = await $.ajax({
                                type: "POST",
                                url:  path,
                                dataType: "json",
                                data: data,
                                beforeSend: function() {

                                },
                                success: function(data) {

                                },error:function(){

                                }
                            });
                        } catch (error) {

                            result = error;
                        }
                        return result;
                    }
                },
                mounted: function () {

                    this.initMap()

                 },
            })

        </script>
    </body>
</html>
