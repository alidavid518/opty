<template>
  <v-card>
    <v-container fluid>
      <v-card-title>
        <v-row>
          <v-col cols="12">
            <h3>LP登録</h3>
          </v-col>
        </v-row>
      </v-card-title>

      <v-card-text>
        <v-row>
          <v-col cols="12">
            <v-btn>新規</v-btn>
            <v-btn>下書き</v-btn>
          </v-col>
        </v-row>
        <v-row>
          <v-col>
            <v-carousel
              height="300"
              hide-delimiter-background
            >
              <v-carousel-item
                v-for="(lp, i) in items"
                :key="i"
              >
                <LpItem :item="lp" @onLpDetail="" @onLpDelete=""/>
              </v-carousel-item>
            </v-carousel>
          </v-col>
        </v-row>
      </v-card-text>
    </v-container>
  </v-card>
</template>

<script>
  import LpItem from "./LpItem"
  export default {
    name: "SettingStory",
    components: {LpItem},
    props: {
      items: {
        type: Array,
        default: () => []
      }
    },
    data() {
      return {
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