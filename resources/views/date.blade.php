
<!DOCTYPE html>
<html>
<head>
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/@mdi/font@5.x/css/materialdesignicons.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.min.css" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
</head>
<body>
  <div id="app">
    <v-app>
      <v-main>
        <v-datetime-picker label="Select Datetime" v-model="datetime"> </v-datetime-picker>
      </v-main>
    </v-app>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/vue@2.x/dist/vue.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.js"></script>
  <script>

    import '@vuetify-datetime-picker';
    // (Optional) import 'vuetify-datetime-picker/src/stylus/main.styl'
    import '@fortawesome/fontawesome-free/css/all.css'

    new Vue({
      el: '#app',
      vuetify: new Vuetify(),
      data (){
          return {
            datetime : '',
          }
      }
    })
  </script>
</body>
</html>
