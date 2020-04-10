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
            <v-btn @click="show_new=true">新規</v-btn>
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
    <NewLpDlg :show="show_new" @onNewClose="show_new=false" @onNewLp="saveNewLp"/>
  </v-card>
</template>

<script>
  import LpItem from "./LpItem"
  import NewLpDlg from "./NewLpDlg";
  export default {
    components: {NewLpDlg, LpItem},
    props: {
      items: {
        type: Array,
        default: () => []
      }
    },
    data: vm => ({
      show_new: false,
    }),
    methods: {
      saveNewLp(item) {
        console.log(item)
        this.show_new = false
      }
    }
  }
</script>

<style scoped>

</style>