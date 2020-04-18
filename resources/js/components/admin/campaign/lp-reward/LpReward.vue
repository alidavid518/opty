<template>
  <v-card>
    <v-container fluid>
      <v-card-title>
        <v-row>
          <v-col cols="12">
            <h3>LP別報酬</h3>
          </v-col>
        </v-row>
      </v-card-title>
      <v-divider/>
      <v-card-text>
        <v-row>
          <v-col cols="12" class="d-flex justify-space-between">
            <h3>LP別報酬登録</h3>
            <v-btn @click="saveNew">登録</v-btn>
          </v-col>
          <v-col cols="12">
            <v-row>
              <v-col cols="12">
                <label>LP選択</label>
                <v-select
                  single-line outlined hide-details dense
                  v-model="lpId"
                  :items="items"
                  item-text="title"
                  item-value="id"
                  class="d-inline-flex ml-2 mr-3"
                />
                <label>報酬額</label>
                <v-text-field
                  single-line outlined hide-details dense
                  class="d-inline-flex ml-2 mr-3"
                  v-model="lpReward"
                />
              </v-col>
              <v-col cols="12">
                <label>RANK</label>
                <v-select
                  outlined dense hide-details single-line
                  v-model="lpRank"
                  :items="ranks"
                  item-text="label"
                  item-value="id"
                  class="d-inline-flex ml-2 mr-3"
                />
                <label>期間設定</label>
                <v-text-field
                  type="date"
                  v-model="lpStartDate"
                  outlined dense single-line hide-details
                  class="d-inline-flex mx-2"
                />
                <v-text-field
                  type="time"
                  v-model="lpStartTime"
                  outlined dense single-line hide-details
                  class="d-inline-flex mr-2"
                /> から
                <v-text-field
                  type="date"
                  v-model="lpEndDate"
                  outlined dense single-line hide-details
                  class="d-inline-flex mx-2"
                />
                <v-text-field
                  type="time"
                  v-model="lpEndTime"
                  outlined dense single-line hide-details
                  class="d-inline-flex mr-3"
                />まで
              </v-col>
            </v-row>
          </v-col>
        </v-row>
      </v-card-text>
      <v-divider/>
      <v-card-text class="_lp-container">
        <v-row>
          <v-col cols="12" v-for="(lp, i) in items" :key="i">
            <LpRewardItem :item="lp" @onShowEditDlg="showEditDlg" @onShowDeleteDlg="showDeleteDlg"/>
          </v-col>
        </v-row>
      </v-card-text>
    </v-container>
    <EditLpRewardDlg :show="show_edit" :item="selected" @onEditClose="show_edit=false" @onEditSave="saveEditReward"/>
    <DeleteRewardDlg :show="show_delete" :item="selected" @onDeleteClose="show_delete=false" @onDeleteReward="deleteReward"/>
  </v-card>
</template>

<script>
  import LpRewardItem from "./LpRewardItem";
  import NewLpRewardDlg from "./NewLpRewardDlg";
  import EditLpRewardDlg from "./EditLpRewardDlg";
  import DeleteRewardDlg from "./DeleteRewardDlg";

  export default {
    components: {EditLpRewardDlg, NewLpRewardDlg, LpRewardItem, DeleteRewardDlg},
    props: {
      items: {
        type: Array,
        default: () => []
      }
    },
    data: vm => ({
      selected: {
        id: 0,
        lp_id: 0,
        reward: 0,
        rank: 0,
        start_date: '',
        start_time: '',
        end_date: '',
        end_time: ''
      },
      show_new: false,
      show_delete: false,
      show_edit: false,
      lpId: 0,
      lpReward: 0,
      lpRank: 0,
      lpStartDate: '',
      lpStartTime: '',
      lpEndDate: '',
      lpEndTime: '',
      ranks: [
        {id: 1, label: 'VIP'},
        {id: 2, label: 'S VIP'},
        {id: 3, label: 'SS VIP'},
        {id: 4, label: 'QUEEN'},
        {id: 5, label: 'KING'},
      ],
    }),
    methods: {
      saveNew() {

      },
      showEditDlg(item) {
        this.selected = item
        console.log(item)
        this.show_edit = true
      },
      showDeleteDlg(item) {
        this.selected = item
        console.log(item)
        this.show_delete = true
      },
      saveEditReward(item) {

      },
      deleteReward(item) {

      }
    }
  }
</script>

<style scoped>
._lp-container {
  max-height: 600px;
  overflow-y: scroll;
}
</style>