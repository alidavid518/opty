<template>
  <v-row justify="center">
    <v-dialog
      class="new-lead-dialog"
      v-model="show"
      persistent
      max-width="600px"
    >
      <v-card>
        <v-card-title class="_title">
          {{['先行','延長'][kind]}}アフィリエイター登録
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
                    <v-text-field
                      append-icon="mdi-magnify"
                      dense outlined hide-details="auto"
                      :disabled="item.search_type !== 'member'"
                      @click:append="search('member')"
                      v-model="member_keyword"/>
                  </v-col>
                </v-row>
              </v-col>
              <v-col cols="6">
                <v-row>
                  <v-col cols="12">
                    <v-radio dense label="チームID 検索" value="team"/>
                  </v-col>
                  <v-col cols="12">
                    <v-text-field
                      append-icon="mdi-magnify"
                      :disabled="item.search_type!=='team'"
                      dense outlined hide-details="auto"
                      @click:append="search('team')"
                      v-model="team_keyword"/>
                  </v-col>
                </v-row>
              </v-col>
              <v-col cols="12">
                <v-row>
                  <v-col cols="12">
                    <v-radio dense label="キーワード 検索" value="keyword"/>
                  </v-col>
                  <v-col cols="12">
                    <v-text-field
                      append-icon="mdi-magnify"
                      dense outlined hide-details="auto"
                      :disabled="item.search_type !== 'keyword'"
                      @click:append="search('keyword')"
                      v-model="keyword_keyword"/>
                  </v-col>
                </v-row>
              </v-col>
              <v-col cols="12">
                <v-row>
                  <v-col cols="12">{{['開始','終了'][kind]}}日時</v-col>
                  <v-col cols="12">
                    <v-text-field
                      type="date" outlined dense hide-details="auto"
                      v-model="item.start_date"
                      class="mr-2 d-inline-flex"/>
                    <v-text-field
                      type="time" outlined dense hide-details="auto"
                      v-model="item.start_time"
                      class="d-inline-flex"/>
                  </v-col>
                </v-row>
              </v-col>
            </v-row>
          </v-radio-group>
        </v-card-text>
        <v-card-actions class="_action justify-center">
          <v-btn @click="$emit('onNewClose')">キャンセル</v-btn>
          <v-btn color="success" @click="$emit('onNewSave', item)">保存</v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </v-row>
</template>

<script>
  export default {
    props: {
      kind: {type:Number, default: 0},
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
      member_keyword: '',
      team_keyword: '',
      keyword_keyword: ''
    }),
    methods: {
      search(kind) {
        if(kind === 'member' && this.member_keyword === '') {

        }
      },
    }
  }
</script>

<style scoped lang="scss">
</style>