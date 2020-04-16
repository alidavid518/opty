<template>
  <v-container fluid>
    <top-panel :data="data_top" :campaigns="campaigns" :camp_id="campId" @changeCampaign="onChangeCampaign"/>
    <v-content v-if="compact">
      <v-row>
        <v-col cols="6" xs="12">
          <data-graph :data="data_data" @onExpand="compact=false"/>
        </v-col>
        <v-col cols="6" xs="12">
          <rank-graph :items="data_rank" @onExpand="compact=false"/>
        </v-col>
        <v-col cols="6" xs="12">
          <lp-graph :data="data_lp" @onExpand="compact=false"/>
        </v-col>
        <v-col cols="6" xs="12">
          <affiliate-graph :data="data_affiliate" @onExpand="compact=false"/>
        </v-col>
      </v-row>
    </v-content>
    <v-content v-else>
      <v-expansion-panels>
        <v-expansion-panel key="0">
          <v-expansion-panel-header>データ推移</v-expansion-panel-header>
          <v-expansion-panel-content>
            <data-detail-graph :data="data_data" @onCompact="compact=true"/>
          </v-expansion-panel-content>
        </v-expansion-panel>
        <v-expansion-panel key="0">
          <v-expansion-panel-header>ランク別分析</v-expansion-panel-header>
          <v-expansion-panel-content>
            <rank-detail-graph :data="data_rank" @onCompact="compact=true"/>
          </v-expansion-panel-content>
        </v-expansion-panel>
        <v-expansion-panel key="0">
          <v-expansion-panel-header>LP分析</v-expansion-panel-header>
          <v-expansion-panel-content>
            <lp-detail-graph :data="data_lp" @onCompact="compact=true"/>
          </v-expansion-panel-content>
        </v-expansion-panel>
        <v-expansion-panel key="0">
          <v-expansion-panel-header>アフィリエイター分析</v-expansion-panel-header>
          <v-expansion-panel-content>
            <affiliate-detail-graph :data="data_affiliate" @onCompact="compact=true"/>
          </v-expansion-panel-content>
        </v-expansion-panel>
      </v-expansion-panels>
    </v-content>
  </v-container>
</template>

<script>
  import TopPanel from "../../components/campaign/detail/TopPanel";
  import DataGraph from "../../components/campaign/detail/DataGraph";
  import DataDetailGraph from "../../components/campaign/detail/DataDetailGraph";
  import AffiliateGraph from "../../components/campaign/detail/AffiliateGraph";
  import AffiliateDetailGraph from "../../components/campaign/detail/AffiliateDetailGraph";
  import LpGraph from "../../components/campaign/detail/LpGraph";
  import LpDetailGraph from "../../components/campaign/detail/LpDetailGraph";
  import RankGraph from "../../components/campaign/detail/RankGraph";
  import RankDetailGraph from "../../components/campaign/detail/RankDetailGraph";

  export default {
    components: {TopPanel, DataGraph, DataDetailGraph, AffiliateGraph, AffiliateDetailGraph, LpGraph, LpDetailGraph, RankGraph, RankDetailGraph},
    data() {
      return {
        campId: 1,
        compact: true, // compact or expand
        data_top: {application_number: 0, contract_amount: 0, application_unit_price: 0, target_archive_rate: 0, target_amount: 0},
        campaigns: [],
        data_data: {access: [], register: [], contract: []},
        data_rank: [],
        data_lp: [],
        data_affiliate: []
      }
    },
    mounted() {
      this.loadData(this.campId)
    },
    methods: {
      loadData(campId) {
        this.data_top = {application_number: 11111, contract_amount: 22222222, application_unit_price: 33333, target_archive_rate: 88, target_amount: 20000000}
        this.campaigns = [
            {id: 1, name: 'campaign1'},
            {id: 2, name: 'campaign2'},
            {id: 3, name: 'campaign3'},
          ]
        this.data_data = {
            access: [
              {date: '2020-01-01', value: 2222},
              {date: '2020-01-02', value: 3333},
              {date: '2020-01-03', value: 1111},
            ],
            register: [
              {date: '2020-01-01', value: 111},
              {date: '2020-01-02', value: 333},
              {date: '2020-01-03', value: 444},
            ],
            contract: [
              {date: '2020-01-01', value: 11},
              {date: '2020-01-02', value: 33},
              {date: '2020-01-03', value: 22},
            ]
          }
        this.data_rank = [
            {rank: 1, register: 380, contract: 17608},
            {rank: 2, register: 150, contract: 24236},
            {rank: 3, register: 85, contract: 4840},
            {rank: 4, register: 23, contract: 7268},
            {rank: 5, register: 15, contract: 10902},
          ]
        this.data_lp = [
            {name: 'LP1', contract: 826, click: 5710},
            {name: 'LP2', contract: 692, click: 2319},
            {name: 'LP3', contract: 452, click: 2792},
            {name: 'LP4', contract: 420, click: 1805},
          ]
        this.data_affiliate = [
            {name: 'aff1', contract: 826, click: 5710},
            {name: 'aff2', contract: 692, click: 2319},
            {name: 'aff3', contract: 452, click: 2792},
            {name: 'aff4', contract: 420, click: 1805},
          ]
      },
      onChangeCampaign(val) {
        this.loadData(val)
      }
    }
  }
</script>

<style scoped>

</style>