<template>
  <v-card>
    <v-container fluid>
      <v-card-title>
        <v-row>
          <v-col cols="12">
            <h3>報酬額設定</h3>
          </v-col>
          <v-col cols="12">
            <v-chip-group
              column
              v-model="rewardType"
              active-class="success white-text"
            >
              <v-chip v-for="(tag, i) in rewardTypes"
                      :key="i" :value="tag.value">
                {{ tag.label }}
              </v-chip>
            </v-chip-group>
          </v-col>
        </v-row>
      </v-card-title>

      <v-card-text>
        <table-main-reward
          v-if="tab==='main'"
          :rewards="main_rewards"
        />
        <table-special-reward
          v-if="tab==='special'"
          :rewards="special_rewards"
        />
      </v-card-text>
    </v-container>
  </v-card>
</template>

<script>
  import TableMainReward from "./TableMainReward";
  import TableSpecialReward from "./TableSpecialReward";
  export default {
    components: {TableMainReward, TableSpecialReward},
    props: {
      items: {
        type: Array,
        default: () => []
      }
    },
    data() {
      return {
        rewardType: 'main',
        rewardTypes: [
          {value: 'main', label: '基本報酬'},
          {value: 'special', label: '特別報酬'},
          {value: 'first-come', label: '先着報酬'},
          {value: 'increased', label: '増加報酬'},
        ],
        ranks: ['VIP','S VIP','SS VIP','QUEEN','KING'],
        main_rewards: [
          {id: 1, rank: 1, amount: 1000, is_show: 1, start: '2019/02/07  12:00', end: '2019/02/08 00:00'},
          {id: 2, rank: 2, amount: 1000, is_show: 0, start: '2019/02/07  12:00', end: '2019/02/08 00:00'},
          {id: 3, rank: 3, amount: 1000, is_show: 0, start: '2019/02/07  12:00', end: '2019/02/08 00:00'},
          {id: 4, rank: 4, amount: 1000, is_show: 1, start: '2019/02/07  12:00', end: '2019/02/08 00:00'},
        ],
        special_rewards: [
          {id: 1, rank: 1, amount: 1000, is_show: 1, start: '2019/02/07  12:00', end: '2019/02/08 00:00'},
          {id: 2, rank: 2, amount: 1000, is_show: 0, start: '2019/02/07  12:00', end: '2019/02/08 00:00'},
          {id: 3, rank: 3, amount: 1000, is_show: 0, start: '2019/02/07  12:00', end: '2019/02/08 00:00'},
          {id: 4, rank: 4, amount: 1000, is_show: 1, start: '2019/02/07  12:00', end: '2019/02/08 00:00'},
        ]
      }
    },
    methods: {
      addItem() {

      }
    }
  }
</script>

<style scoped>

</style>