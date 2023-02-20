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
                            <v-row>
                                <v-col cols="12" sm="4" md="4">
                                    <v-text-field
                                    label="Keyword"
                                    outlined
                                    dense
                                    v-model="keyword"
                                    clearable
                                    ></v-text-field>
                                </v-col>

                                <v-col cols="12" sm="3" md="3">
                                    <v-text-field
                                    label="Area"
                                    outlined
                                    dense
                                    v-model="area"
                                    suffix="Km"
                                    ></v-text-field>
                                </v-col>

                                <v-col cols="12" sm="3" md="3">
                                    <v-text-field
                                    label="Show Limit"
                                    outlined
                                    v-model="show_limit"
                                    dense
                                    ></v-text-field>
                                </v-col>

                                <v-col cols="12" sm="2" md="2">
                                    <v-btn block v-on:click="searchShop" color="primary">
                                        Search
                                    </v-btn>
                                </v-col>
                            </v-row>

                            <div class="text-center mt-2">
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
        {{--
            longdomap
            Documentation => https://map.longdo.com/docs/
        --}}
        <script type="text/javascript" src="https://api.longdo.com/map/?key=a1f0b3aff58245ed8be4929f110ba0b5"></script>
        {{-- jquery for user ajax --}}
        <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

        {{-- new pull test project --}}

        <script>
            var map; //init map
            var map_key = "a1f0b3aff58245ed8be4929f110ba0b5"; //key api map

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
                        area : 10, //area 10km
                        show_limit : 10, //show limit 10
                    }
                },
                methods: {
                    initMap : function() {
                        map = new longdo.Map({
                            placeholder: document.getElementById('map'),
                            language: 'th' // map use thai league
                        });
                        map.zoom(14, true); //zoom map
                        this.startMap('100.533986',' 13.8033836') // start point area bang sue
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
                                weight: longdo.OverlayWeight.Top //pop on top maker
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
                                        span    : this.area+'km',
                                        limit   : this.show_limit
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

                    this.initMap() // init map onload page

                 },
            })

        </script>
    </body>
</html>
