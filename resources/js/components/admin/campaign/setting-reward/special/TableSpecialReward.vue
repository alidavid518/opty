<template>
  <v-card>
    <v-container fluid>
      <v-card-title>
        <v-row>
          <v-col cols="12" class="d-flex justify-space-between">
            <v-btn dark color="success" @click="show_new_dlg=true">新規</v-btn>
            <v-btn dark color="warning" @click="show_bulk_edit_dlg=true">一括編集</v-btn>
          </v-col>
        </v-row>
      </v-card-title>

      <v-card-text>
        <v-row>
          <v-col>
            <v-simple-table>
              <thead>
                <tr>
                  <th> </th>
                  <th>ID</th>
                  <th>アフィリエイター名</th>
                  <th>RANK</th>
                  <th>特別報酬額</th>
                  <th>表示の有無</th>
                  <th> </th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="(r, i) in rewards" :key="i">
                  <td><v-checkbox v-model="r.checked"/></td>
                  <td>{{r.affiliate.name}}</td>
                  <td>{{r.rank.name}}</td>
                  <td>{{r.amount}}円 / 成約</td>
                  <td>{{r.is_show === 1 ? 'する' : 'No'}}</td>
                  <td>
                    <v-btn dark color="purple darken--2" @click="showDetail(r)">
                      詳細
                    </v-btn>
                    <v-btn dark color="error" @click="showDelete(r)">
                      削除
                    </v-btn>
                  </td>
                </tr>
              </tbody>
            </v-simple-table>
          </v-col>
        </v-row>
      </v-card-text>
    </v-container>

    <new-special-reward-dlg
      :show="show_new_dlg"
      @onNewClose="show_new_dlg=false"
      @onNew="saveNew"/>
    <delete-reward-dlg
      :item="selected"
      :show="show_delete_dlg"
      @onDeleteClose="show_delete_dlg=false"
      @onDelete="deleteReward"/>
    <detail-reward-dlg
      :item="selected"
      :show="show_detail_dlg"
      @onDetailClose="show_detail_dlg=false"/>
    <bulk-edit-reward-dlg
      :show="show_bulk_edit_dlg"
      @onEditClose="show_bulk_edit_dlg=false"
      @onEdited="saveEdited"/>
  </v-card>
</template>

<script>

  import NewSpecialRewardDlg from "./NewSpecialRewardDlg";
  import DeleteRewardDlg from "./DeleteRewardDlg";
  import DetailRewardDlg from "./DetailRewardDlg";
  import BulkEditRewardDlg from "./BulkEditRewardDlg";
  export default {
    name: "SettingStory",
    components: {BulkEditRewardDlg, DetailRewardDlg, DeleteRewardDlg, NewSpecialRewardDlg},
    props: {
      campaign_id: {type: Number, default: 0}
    },
    data: () => ({
      show_new_dlg: false,
      show_detail_dlg: false,
      show_delete_dlg: false,
      show_bulk_edit_dlg: false,
      selected: {id: 0, campaign_id: 0, rank_id: 0, rank:{name:''}, date_start: '', time_start: '', date_end: '', time_end: '', is_show: 1},
      bulks: [],
      ranks: [],
      items: []
    }),
    mounted() {

    },
    methods: {
      saveNew(val) {

      },
      deleteReward(val) {

      },
      saveEdited(bulks) {

      }
    }
  }
</script>

<style scoped>

</style>