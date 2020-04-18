<template>
  <v-row justify="center">
    <v-dialog
      class="new-except-dialog"
      v-model="show"
      persistent
      max-width="600px"
    >
      <v-card>
        <v-card-title class="_title">
          ランキング対象外者
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
            </v-row>
          </v-radio-group>
        </v-card-text>
        <v-card-actions class="_action justify-center">
          <v-btn @click="$emit('onNewClose')">キャンセル</v-btn>
          <v-btn dark color="success"
                 @click="$emit('onNewExcept', item)">保存</v-btn>
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
      },

    }),
    methods: {
    }
  }
</script>

<style scoped lang="scss">
</style>