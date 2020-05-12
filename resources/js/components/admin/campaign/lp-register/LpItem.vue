<template>
  <v-card class="_lp-item ma-3">
    <v-card-text>
<!--      <v-img contain :src="item.image" class="_lp-item_image"/>-->
      <h3 class="text-center">{{item.title}}</h3>
    </v-card-text>
    <v-card-actions class="_lp-item_bottom_fixed">
      <v-btn
        dark
        color="purple darken--2"
        @click="$emit('onLpDetail', item)"
      >
        詳細
      </v-btn>
      <v-btn
        dark
        color="pink darken--2"
        @click="$emit('onLpDelete', item)"
      >
        削除
      </v-btn>
    </v-card-actions>
  </v-card>
</template>

<script>
  export default {
    name: "LpItem",
    props: {
      item: {
        type: Object,
        id: Number,
        image: String,
        default() {
          return {
            id: 0,
            image: ''
          }
        }
      }
    }
  }
</script>

<style scoped lang="scss">
  ._lp-item {
    width: 200px !important;
    height: 300px !important;
    position: relative;

    &_bottom_fixed {
      position: absolute;
      bottom: 0;
      width: 100%;
      display: flex;
      justify-content: space-around;
    }

    &_image {
      width: 100% !important;
      height: 100% !important;
    }
  }
</style>