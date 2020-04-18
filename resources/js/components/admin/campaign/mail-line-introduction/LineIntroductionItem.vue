<template>
  <v-card class="_line-intro-item">
    <v-card-title class="_title">
      {{item.title}}
    </v-card-title>
    <v-card-text class="_content">
      <div v-html="item.content"/>
    </v-card-text>
    <v-card-actions>
      <v-btn dark color="purple darken--2" @click="$emit('onDetail', item)">
        詳細
      </v-btn>
      <v-btn dark color="error" @click="$emit('onDelete', item)">
        削除
      </v-btn>
    </v-card-actions>
  </v-card>
</template>

<script>
  export default {
    props: {
      item: {
        type: Object,
        id: {type: Number, default: 0},
        title: {type: String, default: ''},
        url: {type: String, default: ''},
        content: {type: String, default: ''},
      }
    }
  }
</script>

<style scoped lang="scss">
  ._line-intro-item {
    margin-right: 10px;
    ._title {}
    ._subtitle {}
    ._content {}
  }
</style>