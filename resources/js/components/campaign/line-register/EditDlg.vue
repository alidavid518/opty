<template>
  <v-row justify="center">
    <v-dialog
      class="edit-lp-reward-dialog"
      v-model="show"
      persistent
      max-width="600px"
    >
      <v-card>
        <v-card-title class="_title">
          LP別報酬編集
        </v-card-title>
        <v-divider/>
        <v-card-text class="_content">
          <v-row>
            <v-col cols="3">報酬額</v-col>
            <v-col cols="9">
              <v-text-field
                hide-details dense outlined
                v-model="item.reward"
                class="d-inline-flex"
              />
              円
            </v-col>
          </v-row>
          <v-row>
            <v-col cols="3">Rank</v-col>
            <v-col cols="9">
              <v-select
                outlined dense hide-details
                v-model="item.rank"
                :items="ranks"
                item-value="id" item-text="label"
              />
            </v-col>
          </v-row>
          <v-row>
            <v-col cols="3">期間設定</v-col>
            <v-col cols="9">
              <v-row>
                <v-col cols="12">
                  <v-text-field type="date"
                    outlined dense hide-details
                    class="d-inline-flex"
                    v-model="item.start_date"/>
                  <v-text-field type="time"
                    outlined dense hide-details
                    class="d-inline-flex"
                    v-model="item.start_time"/>
                  から
                </v-col>
                <v-col cols="12">
                  <v-text-field type="date"
                    outlined dense hide-details
                    class="d-inline-flex"
                    v-model="item.end_date"/>
                  <v-text-field type="time"
                    outlined dense hide-details
                    class="d-inline-flex"
                    v-model="item.end_time"/>
                  まで
                </v-col>
              </v-row>
            </v-col>
          </v-row>
        </v-card-text>
        <v-card-actions class="_action justify-center py-3">
          <v-btn @click="$emit('onEditClose')">キャンセル</v-btn>
          <v-btn color="primary"
            @click="$emit('onEditSave')">保存</v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </v-row>
</template>

<script>
  export default {
    props: {
      show: {type:Boolean, default: false},
      item: {
        type: Object,
        id: {type: Number, default: 0},
        lp_id: {type: Number, default: 0},
        reward: {type: Number, default: 0},
        rank: {type: Number, default: 0},
        start_date: {type: String, default: ''},
        start_time: {type: String, default: ''},
        end_date: {type: String, default: ''},
        end_time: {type: String, default: ''}
      },
    },
    data: vm => ({
      ranks: [
        {id: 1, label: 'VIP'},
        {id: 2, label: 'S VIP'},
        {id: 3, label: 'SS VIP'},
        {id: 4, label: 'QUEEN'},
        {id: 5, label: 'KING'},
      ],
    }),
    watch: {
    },
    methods: {
    }
  }
</script>

<style scoped lang="scss">
</style>