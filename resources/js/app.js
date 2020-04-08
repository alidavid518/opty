
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

// vendor
require('./bootstrap');
window.Vue = require('vue');

// 3rd party
import '@mdi/font/css/materialdesignicons.css'
import 'vuetify/dist/vuetify.min.css';
import Vue from 'vue';
import Vuetify from 'vuetify';
import VueProgressBar from 'vue-progressbar'
import VueQuillEditor from 'vue-quill-editor'
import 'quill/dist/quill.core.css' // import styles
import 'quill/dist/quill.snow.css' // for snow theme
import 'quill/dist/quill.bubble.css' // for bubble theme
import VueDayjs from 'vue-dayjs-plugin'
import DatetimePicker from 'vuetify-datetime-picker'

Vue.use(Vuetify)
Vue.use(VueDayjs)
Vue.use(VueQuillEditor)
Vue.use(DatetimePicker)

Vue.use(VueProgressBar,{
    color: '#3f51b5',
    failedColor: '#b71c1c',
    thickness: '5px',
    transition: {
        speed: '0.2s',
        opacity: '0.6s',
        termination: 300
    },
    autoRevert: true,
    inverse: false
});

// global component registrations here
Vue.component('moon-loader', require('vue-spinner/src/MoonLoader.vue'));
Vue.component('scale-loader', require('vue-spinner/src/ScaleLoader.vue'));
Vue.component('clip-loader', require('vue-spinner/src/ClipLoader.vue'));

// app
import router from './router';
import store from './common/Store';
import eventBus from './common/Event';
import formatters from './common/Formatters';
import AxiosAjaxDetect from './common/AxiosAjaxDetect';

Vue.use(formatters);
Vue.use(eventBus);

import IconAccount from './components/icon/account'
import IconAffiliateAnalysis from './components/icon/affiliate-analysis'
import IconAffiliate from './components/icon/affiliate'
import IconAsp from './components/icon/asp'
import IconCampaign from './components/icon/campaign'
import IconContact from './components/icon/contact'
import IconContract from './components/icon/contract'
import IconCredit from './components/icon/credit'
import IconData from './components/icon/data-icon'
import IconEye from './components/icon/eye'
import IconGraph from './components/icon/graph'
import IconHistory from './components/icon/history'
import IconHome from './components/icon/home'
import IconLp from './components/icon/lp'
import IconNotify from './components/icon/notify'
import IconQa from './components/icon/qa'
import IconSupport from './components/icon/support'
import IconWp from './components/icon/wp'

const app = new Vue({
    vuetify: new Vuetify({
        theme: {
            dark: false,
            themes: {
                dark: {
                    primary: '#3f51b5',
                    info: '#4c86b5',
                    success: '#17b535',
                    secondary: '#b0bec5',
                    accent: '#8c9eff',
                    error: '#b71c1c',
                }
            },
        },
        icons: {
            iconfont: 'mdi',
            values: {
                account: { component: IconAccount },
                affiliate_analysis: { component: IconAffiliateAnalysis },
                affiliate: { component: IconAffiliate },
                asp: { component: IconAsp },
                campaign: { component: IconCampaign },
                contact: { component: IconContact },
                contract: { component: IconContract },
                credit: { component: IconCredit },
                data_analysis: { component: IconData },
                eye: { component: IconEye },
                graph: { component: IconGraph },
                history: { component: IconHistory },
                home: { component: IconHome },
                lp_analysis: { component: IconLp },
                notify: { component: IconNotify },
                qa: { component: IconQa },
                support: { component: IconSupport },
                wp_analysis: { component: IconWp },
            },
        }
    }),
    el: '#app',
    eventBus,
    router,
    store,
    data: () => ({
        drawer: true,
    }),
    mounted() {
        const self = this;
        // progress bar top
        AxiosAjaxDetect.init(()=>{
            self.$Progress.start();
        },()=>{
            self.$Progress.finish();
        });
    },
    computed: {
        getBreadcrumbs() {
            return store.getters.getBreadcrumbs
        },
        showLoader() {
            return store.getters.showLoader;
        },
        showSnackbar: {
            get() {
                return store.getters.showSnackbar;
            },
            set(val) {
                if(!val) store.commit('hideSnackbar');
            }
        },
        snackbarMessage() {
            return store.getters.snackbarMessage;
        },
        snackbarColor() {
            return store.getters.snackbarColor;
        },
        snackbarDuration() {
            return store.getters.snackbarDuration;
        },

        // dialog
        showDialog: {
            get() {
                return store.getters.showDialog;
            },
            set(val) {
                if(!val) store.commit('hideDialog');
            }
        },
        dialogType() {
            return store.getters.dialogType
        },
        dialogTitle() {
            return store.getters.dialogTitle
        },
        dialogMessage() {
            return store.getters.dialogMessage
        },
        dialogIcon() {
            return store.getters.dialogIcon
        },
    },
    methods: {
        menuClick(routeName, routeType) {
            let rn = routeType || 'vue';

            if(rn==='vue') {
                this.$router.push({name: routeName});
            }
            if(rn==='full_load') {
                window.location.href = routeName;
            }
        },
        clickLogout(logoutUrl,afterLogoutRedirectUrl) {
            axios.post(logoutUrl).then((r)=>{
                window.location.href = afterLogoutRedirectUrl;
            });
        },
        dialogOk() {
            store.commit('dialogOk');
        },
        dialogCancel() {
            store.commit('dialogCancel');
        }
    }
});