<template>
  <v-card>
    <v-container fluid>
      <v-card-title>
        <v-row>
          <v-col cols="12" class="">
            <v-btn>新規</v-btn>
          </v-col>
        </v-row>
      </v-card-title>

      <v-card-text>
        <v-row>
          <v-col>
            <v-simple-table>
              <thead>
                <tr>
                  <th>RANK</th>
                  <th>期間</th>
                  <th>基本報酬額</th>
                  <th>表示の有無</th>
                  <th> </th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="(r, i) in rewards" :key="i">
                  <td>{{ranks[r.rank-1]}}</td>
                  <td>{{r.start}}から {{r.end}}まで </td>
                  <td>{{r.amount}}円 / 成約</td>
                  <td>{{r.is_show === 1 ? 'する' : 'No'}}</td>
                  <td>
                    <v-btn dark color="purple darken--2">
                      詳細
                    </v-btn>
                    <v-btn dark color="pink darken--2">
                      削除
                    </v-btn>
                  </td>
                </tr>
              </tbody>
            </v-simple-table>
          </v-col>
        </v-row>
      </v-card-text>
    </v-container>
  </v-card>
</template>

<script>
  export default {
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