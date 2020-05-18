<template>
  <v-card>
    <v-container fluid>
      <v-card-title>
        <v-row>
          <v-col cols="12">
            <h3>ランキング対象外者</h3>
          </v-col>
        </v-row>
      </v-card-title>

      <v-card-text>
        <v-row>
          <v-col cols="12">
            <v-btn color="info" @click="show_new=true">登録</v-btn>
          </v-col>
          <v-col cols="12">
            <label class="mr-2">キャンペーン期間</label>
            <label>{{lp_start}} - </label>
            <label>{{lp_end}}</label>
          </v-col>
        </v-row>
        <v-divider/>
        <v-row>
          <v-col cols="6">
            <v-row>
              <v-col cols="8">アフィリエイター名</v-col>
              <v-col cols="4">ランク</v-col>
            </v-row>
          </v-col>
          <v-col cols="6">
            <v-row>
              <v-col cols="8">アフィリエイター名</v-col>
              <v-col cols="4">ランク</v-col>
            </v-row>
          </v-col>
          <v-col cols="6" v-for="(item, i) in items" :key="i">
            <ExceptItem :item="item" @onExceptDelete="showDelete"/>
          </v-col>
        </v-row>
      </v-card-text>
    </v-container>
    <NewExceptDlg :show="show_new" @onNewClose="show_new=false" @onNewExcept="saveNewExcept"/>
    <DeleteExceptDlg :show="show_delete" :item="selected" @onDeleteClose="show_delete=false" @onDeleteConfirm="deleteExcept"/>
  </v-card>
</template>

<script>
  import ExceptItem from "./ExceptItem";
  import NewExceptDlg from "./NewExceptDlg";
  import DeleteExceptDlg from "./DeleteExceptDlg";
  export default {
    components: {DeleteExceptDlg, NewExceptDlg, ExceptItem},
    props: {
      items: {
        type: Array,
        default: () => []
      }
    },
    data: vm => ({
      lp_start: '2019/04/09 00:00',
      lp_end: '2019/04/20 23:55',
      selected: null,
      show_new: false,
      show_delete: false,
    }),
    methods: {
      saveNewExcept(item) {
        console.log(item)
        this.show_new = false
      },
      showDelete(item) {
        this.selected = item
        this.show_delete = true
      },
      deleteExcept(item) {
        console.log(item)
      },
    }
  }
</script>

<style scoped>

</style>