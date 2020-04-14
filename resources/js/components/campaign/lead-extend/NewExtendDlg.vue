<template>
  <v-row justify="center">
    <v-dialog
      class="new-extend-dialog"
      v-model="show"
      persistent
      max-width="600px"
    >
      <v-card>
        <v-card-title class="_title">
          延長アフィリエイター登録
        </v-card-title>
        <v-divider/>
        <v-card-text class="_content">
          <v-radio-group v-model="item.search_type">
            <v-row>
              <v-col cols="6">
                <v-row>
                  <v-col cols="12">
                    <v-radio dense label="個人ID 検索" value="member"/>
                  </v-col>
                  <v-col cols="12">
                    <v-text-field dense outlined hide-details v-model="item.member_id"/>
                  </v-col>
                </v-row>
              </v-col>
              <v-col cols="6">
                <v-row>
                  <v-col cols="12">
                    <v-radio dense label="チームID 検索" value="team"/>
                  </v-col>
                  <v-col cols="12">
                    <v-text-field dense outlined hide-details v-model="item.team_id"/>
                  </v-col>
                </v-row>
              </v-col>
              <v-col cols="12">
                <v-row>
                  <v-col cols="12">
                    <v-radio dense label="キーワード 検索" value="keyword"/>
                  </v-col>
                  <v-col cols="12">
                    <v-text-field dense outlined hide-details v-model="item.keyword"/>
                  </v-col>
                </v-row>
              </v-col>
              <v-col cols="12">
                <v-row>
                  <v-col cols="12">開始日時</v-col>
                  <v-col cols="12">
                    <v-text-field type="date" outlined dense hide-details v-model="item.start_date" class="mr-2 d-inline-flex"/>
                    <v-text-field type="time" outlined dense hide-details v-model="item.start_time" class="d-inline-flex"/>
                  </v-col>
                </v-row>
              </v-col>
            </v-row>
          </v-radio-group>
        </v-card-text>
        <v-card-actions class="_action justify-center">
          <v-btn @click="$emit('onNewExtendClose')">キャンセル</v-btn>
          <v-btn dark color="success" @click="$emit('onNewExtend', item)">保存</v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </v-row>
</template>

<script>
  export default {
    props: {
      show: {type:Boolean, default: false},
    },
    data: vm => ({
      item: {
        id: 0,
        search_type: 'member',
        keyword: '',
        member_id: '',
        team_id: '',
        start_date: '',
        start_time: ''
      },

    }),
    methods: {
    }
  }
</script>

<style scoped lang="scss">
</style>