<template>
  <v-row justify="center">
    <v-dialog
      class="_bulk-edit-reward-dlg"
      v-model="show"
      max-width="600px"
    >
      <v-card>
        <v-card-title class="_title">一括編集</v-card-title>
        <v-divider/>
        <v-card-text class="_content">
          <v-row>
            <v-col cols="3">期間</v-col>
            <v-col cols="9">
              <datetime
                dense outlined
                type="datetime"
                v-model="item.start"
              />から
              <datetime
                dense outlined
                type="datetime"
                v-model="item.end"
              />まで
            </v-col>
          </v-row>
          <v-row>
            <v-col cols="3">LP URL</v-col>
            <v-col cols="9">
              <v-text-field
                dense outlined
                v-model="item.amount"
              /> 円
            </v-col>
          </v-row>
          <v-row>
            <v-col cols="3">表示の有無</v-col>
            <v-col cols="9">
              <v-switch v-model="item.is_show"/>
            </v-col>
          </v-row>
        </v-card-text>
        <v-card-actions class="_action">
          <v-btn @click="$emit('onEdited', item)">登録</v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </v-row>
</template>

<script>
  export default {
    props: {
      show: Boolean,
    },
    data: vm => ({
      item: {
        type: Object,
        id: {type: Number, default: 0},
        start: {type: String, default: ''},
        end: {type: String, default: ''},
        is_show: {type: Number, default: 1}
      }
    }),
    methods: {
    }
  }
</script>

<style scoped lang="scss">

</style>