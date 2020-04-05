import Vue from 'vue';
import Router from 'vue-router';
import store from './common/Store';

Vue.use(Router);

const router = new Router({
    routes: [
        {
            name: 'admin.dashboard',
            path: '/admin',
            // component: require('./admin/campaign/index'),
        },
        {
            name: 'admin.campaign.index',
            path: '/admin/campaign',
            component: require('./admin/campaign/index'),
        },
        {
            name: 'admin.campaign.edit',
            path: '/admin/campaign/edit/:id',
            component: require('./admin/campaign/edit'),
        },
        {
            name: 'admin.campaign.new',
            path: '/admin/campaign/new',
            component: require('./admin/campaign/new'),
        },
        {
            name: 'admin.affiliate.index',
            path: '/admin/affiliate',
            // component: require('./admin/affiliates/index'),
        },
        {
            name: 'admin.advertiser.index',
            path: '/admin/advertiser',
            component: require('./admin/advertiser/index'),
        },
        {
            name: 'admin.manager.index',
            path: '/admin/manager',
            component: require('./admin/manager/index'),
        },
        {
            name: 'admin.affiliates',
            path: '/admin/affiliates',
            // component: require('./admin/affiliates/index'),
        },
        {
            name: 'admin.fraud-checks',
            path: '/admin/fraud-checks',
            // component: require('./admin/fraud-check/index'),
        },
        {
            name: 'admin.contracts',
            path: '/admin/contracts',
            // component: require('./admin/contracts/index'),
        },
        {
            name: 'admin.transfers',
            path: '/admin/transfers',
            // component: require('./admin/transfers/index'),
        },
        {
            name: 'admin.analysis',
            path: '/admin/analysis',
            children: [
                {
                    name: 'admin.analysis.data',
                    path: '/admin/analysis/data',
                    // component: require('./admin/analysis/data/index'),
                },
                {
                    name: 'admin.analysis.lp',
                    path: '/admin/analysis/lp',
                    // component: require('./admin/analysis/lp/index'),
                },
                {
                    name: 'admin.analysis.wp',
                    path: '/admin/analysis/wp',
                    // component: require('./admin/analysis/wp/index'),
                },
                {
                    name: 'admin.analysis.affiliate',
                    path: '/admin/analysis/affiliate',
                    // component: require('./admin/analysis/affiliate/index'),
                },
            ]
        },
        {
            name: 'admin.support.notify',
            path: '/admin/support/notify',
            component: require('./admin/support/notify/index'),
        },
        {
            name: 'admin.support.history',
            path: '/admin/support/history',
            // component: require('./admin/support/history/index'),
        },
        {
            name: 'admin.support.qa.index',
            path: '/admin/support/qa',
            component: require('./admin/support/qa/index'),
        },
        {
            name: 'admin.support.profile',
            path: '/admin/support/profile',
            // component: require('./admin/support/profile/index'),
        },
        {
            name: 'admin.support.contact',
            path: '/admin/support/contact',
            component: require('./admin/support/contact/index'),
        },
/*
        {
            path: '/users',
            component: require('./admin/users/Users'),
            children: [
                {
                    path:'/',
                    name:'users.list',
                    component: require('./admin/users/components/UserLists')
                },
                {
                    path:'create',
                    name:'users.create',
                    component: require('./admin/users/components/UserFormAdd')
                },
                {
                    path:'edit/:id',
                    name:'users.edit',
                    component: require('./admin/users/components/UserFormEdit'),
                    props: (route) => ({propUserId: route.params.id}),
                },
                {
                    path:'groups',
                    name:'users.groups.list',
                    component: require('./admin/users/components/GroupLists')
                },
                {
                    path:'groups/create',
                    name:'users.groups.create',
                    component: require('./admin/users/components/GroupFromAdd')
                },
                {
                    path:'groups/edit/:id',
                    name:'users.groups.edit',
                    component: require('./admin/users/components/GroupFromEdit'),
                    props: (route) => ({propGroupId: route.params.id}),
                },
                {
                    path:'permissions',
                    name:'users.permissions.list',
                    component: require('./admin/users/components/PermissionLists')
                },
                {
                    path:'permissions/create',
                    name:'users.permissions.create',
                    component: require('./admin/users/components/PermissionFormAdd')
                },
                {
                    path:'permissions/edit/:id',
                    name:'users.permissions.edit',
                    component: require('./admin/users/components/PermissionFormEdit'),
                    props: (route) => ({propPermissionId: route.params.id}),
                },
            ]
        },

 */
    ],
});

router.beforeEach((to, from, next) => {
    store.commit('showLoader');
    next();
});

router.afterEach((to, from) => {
    setTimeout(()=>{
        store.commit('hideLoader');
    },1000);
});

export default router;