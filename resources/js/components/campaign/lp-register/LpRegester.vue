<template>
  <v-card>
    <v-container fluid>
      <v-card-title>
        <v-row>
          <v-col cols="12">
            <h3>LP登録</h3>
          </v-col>
        </v-row>
      </v-card-title>

      <v-card-text>
        <v-row>
          <v-col cols="12">
            <v-btn>新規</v-btn>
            <v-btn>下書き</v-btn>
          </v-col>
        </v-row>
        <v-row>
          <v-col>
            <v-carousel
              height="300"
              hide-delimiter-background
            >
              <v-carousel-item
                v-for="(lp, i) in LPs"
                :key="i"
              >
                <LpItem :item="lp" @onLpDetail="" @onLpDelete=""/>
              </v-carousel-item>
            </v-carousel>
          </v-col>
        </v-row>
      </v-card-text>
    </v-container>
  </v-card>
</template>

<script>
  import LpItem from "./LpItem"
  export default {
    name: "SettingStory",
    components: {LpItem},
    props: {
      items: {
        type: Array,
        default: () => []
      }
    },
    data() {
      return {
        rewardType: '基本報酬',
        rewardTypes: ['基本報酬', '特別報酬', '先着報酬', '増加報酬'],
        ranks: ['VIP','S VIP','SS VIP','QUEEN','KING'],
        rewards: [
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