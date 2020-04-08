<template>
  <v-row justify="center">
    <v-dialog
      class="_new-intro-dialog"
      v-model="show"
      persistent
      max-width="600px"
    >
      <v-card>
        <v-card-title class="_title">
          新規
        </v-card-title>
        <v-divider/>
        <v-card-text class="_content">
          <v-row>
            <v-col cols="3">タイトル</v-col>
            <v-col cols="9">
              <v-text-field
                dense outlined
                v-model="item.title"
              />
            </v-col>
          </v-row>
          <v-row>
            <v-col cols="3">LP URL</v-col>
            <v-col cols="9">
              <v-textarea
                dense outlined
                v-model="item.content"
              />
            </v-col>
          </v-row>
        </v-card-text>
        <v-card-actions class="_action">
          <v-btn @click="$emit('onNewClose')">キャンセル</v-btn>
          <v-btn @click="$emit('onNew', item)">保存</v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </v-row>
</template>

<script>
  export default {
    props: {
      show: Boolean,
      item: {
        type: Object,
        id: {type: Number, default: 0},
        title: {type: String, default: ''},
        content: {type: String, default: ''},
      }
    },
    data: vm => ({
    }),
    methods: {
    }
  }
</script>

<style scoped lang="scss">

</style>