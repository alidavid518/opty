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
  <link href="{{ asset('css/user.css') }}" rel="stylesheet">

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
          <v-list-item :to="{name: 'user.dashboard.index'}" :exact="true">
            <v-list-item-icon>
              <v-icon>$vuetify.icons.home</v-icon>
            </v-list-item-icon>
            <v-list-item-content>
              <v-list-item-title>Home</v-list-item-title>
            </v-list-item-content>
          </v-list-item>
          <v-list-item :to="{name:'user.asp.index'}" :exact="false">
            <v-list-item-icon>
              <v-icon>$vuetify.icons.asp</v-icon>
            </v-list-item-icon>
            <v-list-item-content>
              <v-list-item-title>ASP一覧</v-list-item-title>
            </v-list-item-content>
          </v-list-item>
          <v-list-item :to="{name:'user.campaign.index'}" :exact="false">
            <v-list-item-icon>
              <v-icon>$vuetify.icons.campaign</v-icon>
            </v-list-item-icon>
            <v-list-item-content>
              <v-list-item-title>掲載案件一覧</v-list-item-title>
            </v-list-item-content>
          </v-list-item>
          <v-list-item :to="{name:'user.contract.index'}" :exact="false">
            <v-list-item-icon>
              <v-icon>$vuetify.icons.contract</v-icon>
            </v-list-item-icon>
            <v-list-item-content>
              <v-list-item-title>成約管理</v-list-item-title>
            </v-list-item-content>
          </v-list-item>
          <v-list-item :to="{name:'user.transfer.index'}" :exact="false">
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

            <v-list-item to="" :exact="false">
              <v-list-item-icon>
                <v-icon>$vuetify.icons.data_analysis</v-icon>
              </v-list-item-icon>
              <v-list-item-title>データ推移</v-list-item-title>
            </v-list-item>
            <v-list-item to="" :exact="false">
              <v-list-item-icon>
                <v-icon>$vuetify.icons.lp_analysis</v-icon>
              </v-list-item-icon>
              <v-list-item-title>LP分析</v-list-item-title>
            </v-list-item>
            <v-list-item to="" :exact="false">
              <v-list-item-icon>
                <v-icon>$vuetify.icons.wp_analysis</v-icon>
              </v-list-item-icon>
              <v-list-item-title>WP分析</v-list-item-title>
            </v-list-item>
            <v-list-item to="" :exact="false">
              <v-list-item-icon>
                <v-icon>$vuetify.icons.affiliate_analysis</v-icon>
              </v-list-item-icon>
              <v-list-item-title>アフィリエイター分析</v-list-item-title>
            </v-list-item>
          </v-list-group>
          <v-list-item :to="{name:'user.contact.index'}" :exact="false">
            <v-list-item-icon>
              <v-icon>$vuetify.icons.contact</v-icon>
            </v-list-item-icon>
            <v-list-item-title>お問い合わせ</v-list-item-title>
          </v-list-item>
          <v-list-item :to="{name:'user.qa.index'}" :exact="false">
            <v-list-item-icon>
              <v-icon>$vuetify.icons.qa</v-icon>
            </v-list-item-icon>
            <v-list-item-title>よくある質問</v-list-item-title>
          </v-list-item>
          <v-list-item :to="{name:'user.account.index'}" :exact="false">
            <v-list-item-icon>
              <v-icon>$vuetify.icons.account</v-icon>
            </v-list-item-icon>
            <v-list-item-title>管理アカウント</v-list-item-title>
          </v-list-item>
        </v-list>
      </v-navigation-drawer>

      <v-app-bar app clipped-left>
        {{--                <v-app-bar-nav-icon @click.stop="drawer = !drawer"></v-app-bar-nav-icon>--}}
        <v-toolbar-title>
          {{config('app.name')}}
        </v-toolbar-title>

        <v-spacer></v-spacer>

        <v-btn icon>
          <v-icon>mdi-bell</v-icon>
        </v-btn>
        <v-btn icon class="mr-4">
          <v-icon>mdi-plus</v-icon>
        </v-btn>
        @php($profile = Auth::user()->profile)
        <v-avatar left>
          @if ($profile->avatar !== '')
            <v-img src="{{$profile->avatar}}"></v-img>
          @endif
        </v-avatar>

        <v-btn text>{{$profile->first_name}} {{$profile->last_name}}</v-btn>

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
            <v-list-item @click="clickLogout('{{route('logout')}}','{{url('/login')}}')">
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

  </template>

</div>

<!-- Scripts -->
<script src="{{ asset('js/manifest.js') }}"></script>
<script src="{{ asset('js/vendor.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
