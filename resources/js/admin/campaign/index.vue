<template>
  <div class="page_wrap_vue pa-3 campaign-page">
    <v-card class="mx-auto">
      <v-container
        class="campaign-page_header"
        fuild
      >
        <v-row class="campaign-page_header_title">
          <v-col cols="12">
            <h2>キャンペーン一覧</h2>
          </v-col>
        </v-row>
        <v-row class="campaign-page_header_toolbar">
          <v-col cols="12">
            <v-btn
              class="campaign-page_header_toolbar_button"
              @click="show_new_campaign_dlg = true"
            >
              新規作成
            </v-btn>
            <v-btn
              class="campaign-page_header_toolbar_button"
              @click="show_edit_campaign_dlg = true"
            >
              下書き
            </v-btn>
            <v-select
              class="campaign-page_header_toolbar_sort"
              :items="sort_orders"
              item-text="label"
              item-value="value"
              label="表示順"
            />
          </v-col>
        </v-row>
      </v-container>

      <v-container class="campaign-page_container" fluid>
        <v-row dense>
          <v-col
            v-for="card in cards"
            :key="card.id"
            cols="4"
          >
            <CampaignItem :item="card"/>
          </v-col>
        </v-row>
      </v-container>
    </v-card>
    <NewCampaignDialog :dialog="show_new_campaign_dlg"/>
    <EditCampaignDialog :dialog="show_edit_campaign_dlg"/>
  </div>
</template>

<script>
  import CampaignItem from "../../components/admin/campaign/CampaignItem";
  import NewCampaignDialog from "../../components/admin/campaign/NewCampaignDialog";
  import EditCampaignDialog from "../../components/admin/campaign/EditCampaignDialog";

  export default {
    components: {CampaignItem, NewCampaignDialog, EditCampaignDialog},
    data() {
      return {
        show_new_campaign_dlg: false,
        show_edit_campaign_dlg: false,
        sort_orders: [
          {value: 'latest', label: '最新順'},
          {value: 'price_high', label: '単価高い順'},
          {value: 'expected_reward', label: '報酬予定額順'},
        ],
        cards: [
          {
            id: 1,
            title: 'キャンペーン',
            image: '/img/sample/buzz-andersen.png',
            date_start: '2020/01/01',
            date_end: '2020/01/07',
            register_number: 1000,
            expense: 100000,
            block_number: 20,
            block_rate: 2,
            average_lprr: 13,
          },
          {
            id: 2,
            title: 'キャンペーン',
            image: '/img/sample/daniel-monteiro.png',
            date_start: '2020/02/01',
            date_end: '2020/02/07',
            register_number: 2000,
            expense: 100000,
            block_number: 20,
            block_rate: 1,
            average_lprr: 13,
          },
          {
            id: 3,
            title: 'キャンペーン3',
            image: '/img/sample/icons8-team.png',
            date_start: '2020/03/01',
            date_end: '2020/03/07',
            register_number: 1000,
            expense: 100000,
            block_number: 20,
            block_rate: 2,
            average_lprr: 13,
          },
          {
            id: 4,
            title: 'キャンペーン4',
            image: '/img/sample/patrick-hendry.png',
            date_start: '2020/04/01',
            date_end: '2020/04/07',
            register_number: 1000,
            expense: 100000,
            block_number: 20,
            block_rate: 2,
            average_lprr: 13,
          },
          {
            id: 5,
            title: 'キャンペーン5',
            image: '/img/sample/trust-tru-katsande.png',
            date_start: '2020/05/01',
            date_end: '2020/05/07',
            register_number: 1000,
            expense: 100000,
            block_number: 20,
            block_rate: 2,
            average_lprr: 13,
          },
          {
            id: 6,
            title: 'キャンペーン6',
            image: '/img/sample/yolanda-sun.png',
            date_start: '2020/06/01',
            date_end: '2020/06/07',
            register_number: 1000,
            expense: 100000,
            block_number: 20,
            block_rate: 2,
            average_lprr: 13,
          }
        ]
      }
    },
    mounted() {

      const self = this;

      self.$store.commit('setBreadcrumbs', [
        {label: 'Dashboard', name: ''}
      ]);
    }
  }
</script>