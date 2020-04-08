<template>
  <v-card class="_line-rich-image">
    <v-card-text class="flex justify-center">
      <v-img width="320" height="180" contain :src="item.url"/>
    </v-card-text>
    <v-card-actions>
      <v-btn dark color="error" @click="$emit('onDeleteImage', item)">
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
        lp_id: {type: Number, default: 0},
        url: {type: String, default: ''},
      }
    }
  }
</script>

<style scoped>

</style>