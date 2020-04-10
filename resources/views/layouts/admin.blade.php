<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Styles -->
  <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons' rel="stylesheet">

  <!-- app.css here -->
  <link href="{{ asset('css/admin.css') }}" rel="stylesheet">

  <!-- app js values -->
  <script type="application/javascript">
    var LSK_APP = {};
    LSK_APP.APP_URL = '{{env('APP_URL')}}';
  </script>
</head>
<body>
<div id="app">
  <template>
    <v-app id="inspire">
      <v-navigation-drawer
        v-model="drawer"
        app
        clipped
        left
      >
        <v-list dense>
          <v-list-item>
            <v-list-item-content>
              <img class="logo" src="{{  url('/img/logo.png') }}"/>
            </v-list-item-content>
          </v-list-item>
          <v-list-item :to="{name: 'admin.campaign.index'}" :exact="true">
            <v-list-item-icon>
              <v-icon>$vuetify.icons.home</v-icon>
            </v-list-item-icon>
            <v-list-item-content>
              <v-list-item-title>Home</v-list-item-title>
            </v-list-item-content>
          </v-list-item>
          <v-list-item :to="{name:'admin.campaign.index'}" :exact="false">
            <v-list-item-icon>
              <v-icon>$vuetify.icons.campaign</v-icon>
            </v-list-item-icon>
            <v-list-item-content>
              <v-list-item-title>キャンペーン一覧</v-list-item-title>
            </v-list-item-content>
          </v-list-item>
          <v-list-item :to="{name:'admin.affiliate.index'}" :exact="false">
            <v-list-item-icon>
              <v-icon>$vuetify.icons.affiliate</v-icon>
            </v-list-item-icon>
            <v-list-item-content>
              <v-list-item-title>アフィリエイター</v-list-item-title>
            </v-list-item-content>
          </v-list-item>
          <v-list-item :to="{name:'admin.advertiser.index'}" :exact="false">
            <v-list-item-icon>
              <v-icon>$vuetify.icons.affiliate</v-icon>
            </v-list-item-icon>
            <v-list-item-content>
              <v-list-item-title>広告主管理</v-list-item-title>
            </v-list-item-content>
          </v-list-item>
          <v-list-item :to="{name:'admin.manager.index'}" :exact="false">
            <v-list-item-icon>
              <v-icon>$vuetify.icons.affiliate</v-icon>
            </v-list-item-icon>
            <v-list-item-content>
              <v-list-item-title>管理者管理</v-list-item-title>
            </v-list-item-content>
          </v-list-item>
          <v-list-item :to="{name:'admin.fraud-check.index'}" :exact="false">
            <v-list-item-icon>
              <v-icon>$vuetify.icons.eye</v-icon>
            </v-list-item-icon>
            <v-list-item-content>
              <v-list-item-title>不正チェック</v-list-item-title>
            </v-list-item-content>
          </v-list-item>
          <v-list-item :to="{name:'admin.contract.index'}" :exact="false">
            <v-list-item-icon>
              <v-icon>$vuetify.icons.contract</v-icon>
            </v-list-item-icon>
            <v-list-item-content>
              <v-list-item-title>成約管理</v-list-item-title>
            </v-list-item-content>
          </v-list-item>
          <v-list-item :to="{name:'admin.transfer.index'}" :exact="false">
            <v-list-item-icon>
              <v-icon>$vuetify.icons.credit</v-icon>
            </v-list-item-icon>
            <v-list-item-content>
              <v-list-item-title>振込管理</v-list-item-title>
            </v-list-item-content>
          </v-list-item>
          <v-list-group value="true">
            <template v-slot:activator>
              <v-list-item-icon>
                <v-icon>$vuetify.icons.graph</v-icon>
              </v-list-item-icon>
              <v-list-item-content>
                <v-list-item-title>案件分析</v-list-item-title>
              </v-list-item-content>
            </template>

            <v-list-item :to="{name:'admin.analysis.data'}" :exact="false">
              <v-list-item-icon>
                <v-icon>$vuetify.icons.data_analysis</v-icon>
              </v-list-item-icon>
              <v-list-item-title>データ推移</v-list-item-title>
            </v-list-item>
            <v-list-item :to="{name:'admin.analysis.lp'}" :exact="false">
              <v-list-item-icon>
                <v-icon>$vuetify.icons.lp_analysis</v-icon>
              </v-list-item-icon>
              <v-list-item-title>LP分析</v-list-item-title>
            </v-list-item>
            <v-list-item :to="{name:'admin.analysis.wp'}" :exact="false">
              <v-list-item-icon>
                <v-icon>$vuetify.icons.wp_analysis</v-icon>
              </v-list-item-icon>
              <v-list-item-title>WP分析</v-list-item-title>
            </v-list-item>
            <v-list-item :to="{name:'admin.analysis.affiliate'}" :exact="false">
              <v-list-item-icon>
                <v-icon>$vuetify.icons.affiliate_analysis</v-icon>
              </v-list-item-icon>
              <v-list-item-title>アフィリエイター分析</v-list-item-title>
            </v-list-item>
          </v-list-group>
          <v-list-group value="true">
            <template v-slot:activator>
              <v-list-item-icon>
                <v-icon>$vuetify.icons.support</v-icon>
              </v-list-item-icon>
              <v-list-item-content>
                <v-list-item-title>サポート・連絡</v-list-item-title>
              </v-list-item-content>
            </template>

            <v-list-item :to="{name:'admin.support.notify'}" :exact="false">
              <v-list-item-icon>
                <v-icon>$vuetify.icons.notify</v-icon>
              </v-list-item-icon>
              <v-list-item-title>お知らせ</v-list-item-title>
            </v-list-item>
            <v-list-item :to="{name:'admin.support.history'}" :exact="false">
              <v-list-item-icon>
                <v-icon>$vuetify.icons.history</v-icon>
              </v-list-item-icon>
              <v-list-item-title>操作履歴</v-list-item-title>
            </v-list-item>
            <v-list-item :to="{name:'admin.support.qa.index'}" :exact="false">
              <v-list-item-icon>
                <v-icon>$vuetify.icons.qa</v-icon>
              </v-list-item-icon>
              <v-list-item-title>よくある質問</v-list-item-title>
            </v-list-item>
            <v-list-item :to="{name:'admin.manager-account.index'}" :exact="false">
              <v-list-item-icon>
                <v-icon>$vuetify.icons.account</v-icon>
              </v-list-item-icon>
              <v-list-item-title>管理アカウント</v-list-item-title>
            </v-list-item>
            <v-list-item :to="{name:'admin.support.contact'}" :exact="false">
              <v-list-item-icon>
                <v-icon>$vuetify.icons.contact</v-icon>
              </v-list-item-icon>
              <v-list-item-title>お問い合わせ</v-list-item-title>
            </v-list-item>
          </v-list-group>
        </v-list>
      </v-navigation-drawer>

      <v-app-bar app clipped-left>
        {{--                <v-app-bar-nav-icon @click.stop="drawer = !drawer"></v-app-bar-nav-icon>--}}
        <v-toolbar-title>
          {{config('app.name')}}
        </v-toolbar-title>

        <v-spacer></v-spacer>

        <v-btn icon>
          <v-icon>mdi-plus</v-icon>
        </v-btn>

        <v-avatar left>
          <v-img :src="'https://cdn.vuetifyjs.com/images/lists/3.jpg'"></v-img>
        </v-avatar>

        <v-btn text> John Doe</v-btn>

        <v-menu
          bottom
          right
          offset-y
          origin="top right"
          transition="scale-transition"
        >
          <template v-slot:activator="{ on }">
            <v-btn v-on="on" icon>
              <v-icon>mdi-account-cog</v-icon>
            </v-btn>
          </template>
          <v-list :tile="false" nav dense>
            <form action="/logout" method="POST" ref="logoutForm">
              @csrf
            </form>
            <v-list-item click="logout">
              <v-list-item-icon>
                <v-icon>mdi-power</v-icon>
              </v-list-item-icon>
              <v-list-item-content>
                <v-list-item-title>ログアウト</v-list-item-title>
              </v-list-item-content>
            </v-list-item>
          </v-list>
        </v-menu>

      </v-app-bar>

      <v-content>
        <v-divider></v-divider>
        <transition name="fade">
          <router-view></router-view>
        </transition>
      </v-content>

      <v-footer fixed>
        <span>&copy; {{ date('Y') }}</span>
      </v-footer>
    </v-app>

    <!-- loader -->
  {{-- <div v-if="showLoader" class="wask_loader bg_half_transparent">
      <moon-loader color="red"></moon-loader>
  </div> --}}

  <!-- snackbar -->
{{--    <v-snackbar--}}
{{--      :timeout="snackbarDuration"--}}
{{--      :color="snackbarColor"--}}
{{--      top--}}
{{--      v-model="showSnackbar">--}}
{{--      @{{ snackbarMessage }}--}}
{{--    </v-snackbar>--}}

    <!-- dialog confirm -->
{{--    <v-dialog v-show="showDialog" v-model="showDialog" absolute max-width="450px">--}}
{{--      <v-card>--}}
{{--        <v-card-title>--}}
{{--          <div class="headline">--}}
{{--            <v-icon v-if="dialogIcon">@{{dialogIcon}}</v-icon>--}}
{{--            @{{ dialogTitle }}--}}
{{--          </div>--}}
{{--        </v-card-title>--}}
{{--        <v-card-text>@{{ dialogMessage }}</v-card-text>--}}
{{--        <v-card-actions v-if="dialogType=='confirm'">--}}
{{--          <v-spacer></v-spacer>--}}
{{--          <v-btn color="orange darken-1" text @click.native="dialogCancel">Cancel</v-btn>--}}
{{--          <v-btn color="green darken-1" text @click.native="dialogOk">Ok</v-btn>--}}
{{--        </v-card-actions>--}}
{{--      </v-card>--}}
{{--    </v-dialog>--}}

    <!-- the progress bar -->
{{--    <vue-progress-bar></vue-progress-bar>--}}

  </template>

</div>

<!-- Scripts -->
<script src="{{ asset('js/manifest.js') }}"></script>
<script src="{{ asset('js/vendor.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>

<script>
  export default {
    methods: {
      logout() {
        this.$refs.logoutForm.submit()
      }
    }
  }
</script>
</body>
</html>
