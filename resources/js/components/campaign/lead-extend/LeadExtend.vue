<template>
  <v-card>
    <v-container fluid>
      <v-card-title>
        <v-row>
          <v-col cols="12">
            <h3>先行 / 延長設定</h3>
          </v-col>
        </v-row>
      </v-card-title>

      <v-card-text>
        <v-row>
          <v-col cols="12" class="d-flex justify-space-between">
            <v-btn @click="showNew">登録</v-btn>
            <label>キャンペーン期間 {{lp_start}} - {{lp_end}}</label>
          </v-col>
        </v-row>
        <v-divider/>
        <v-row>
          <v-col cols="12">
            <v-tabs v-model="tab">
              <v-tab key="lead">先行登録</v-tab>
              <v-tab key="extend">延長登録</v-tab>
            </v-tabs>
            <v-tabs-items v-model="tab">
              <v-tab-item key="lead">
                <v-simple-table>
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>アフィリエイター名</th>
                      <th>ランク</th>
                      <th>特別報酬額</th>
                      <th>開始 / 終了日時</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(lead, i) in vleads" :key="i">
                      <th>{{lead.id}}</th>
                      <th>{{lead.affiliate}}</th>
                      <th>{{ranks[lead.rank-1]}}</th>
                      <th>{{lead.special_reward}}</th>
                      <th>{{lead.start_date}} {{lead.start_time}} - {{lead.end_date}} {{lead.end_time}}</th>
                      <th>
                        <v-btn
                          color="purple darken--2" dark
                          @click="showLeadEdit(lead)"
                        >
                          編集
                        </v-btn>
                        <v-btn
                          color="error" dark
                          @click="showLeadDelete(lead)"
                        >
                          削除
                        </v-btn>
                      </th>
                    </tr>
                  </tbody>
                </v-simple-table>
              </v-tab-item>
              <v-tab-item key="extend">
                <v-simple-table>
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>アフィリエイター名</th>
                    <th>ランク</th>
                    <th>特別報酬額</th>
                    <th>開始 / 終了日時</th>
                    <th></th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr v-for="(v, i) in vextends" :key="i">
                    <th>{{v.id}}</th>
                    <th>{{v.affiliate}}</th>
                    <th>{{ranks[v.rank-1]}}</th>
                    <th>{{v.special_reward}}</th>
                    <th>{{v.start_date}} {{v.start_time}} - {{v.end_date}} {{v.end_time}}</th>
                    <th>
                      <v-btn
                        color="purple darken--2" dark
                        @click="showExtendEdit(v)"
                      >
                        編集
                      </v-btn>
                      <v-btn
                        color="error" dark
                        @click="showExtendDelete(v)"
                      >
                        削除
                      </v-btn>
                    </th>
                  </tr>
                  </tbody>
                </v-simple-table>
              </v-tab-item>
            </v-tabs-items>
          </v-col>
        </v-row>
      </v-card-text>
    </v-container>

    <NewLeadDlg
      :show="show_new_lead"
      @onNewLeadClose="show_new_lead=false"
      @onNewLead="saveNewLead"/>
    <EditLeadDlg
      :show="show_edit_lead"
      :item="selected_lead"
      @onEditLeadClose="show_edit_lead=false"
      @onEditLead="saveEditLead"/>
    <DeleteLeadDlg
      :show="show_delete_lead"
      :item="selected_lead"
      @onDeleteLeadClose="show_delete_lead=false"
      @onDeleteLeadConfirm="deleteLead"/>
    <NewExtendDlg
      :show="show_new_extend"
      @onNewExtendClose="show_new_extend=false"
      @onNewExtend="saveNewExtend"/>
    <EditExtendDlg
      :show="show_edit_extend"
      :item="selected_extend"
      @onEditExtendClose="show_edit_extend=false"
      @onEditExtend="saveEditExtend"/>
    <DeleteExtendDlg
      :show="show_delete_extend"
      :item="selected_extend"
      @onDeleteExtendClose="show_delete_extend=false"
      @onDeleteExtendsConfirm="deleteExtend"/>
  </v-card>
</template>

<script>
  import NewLeadDlg from "./NewLeadDlg";
  import EditLeadDlg from "./EditLeadDlg";
  import DeleteLeadDlg from "./DeleteLeadDlg";
  import NewExtendDlg from "./NewExtendDlg";
  import EditExtendDlg from "./EditExtendDlg";
  import DeleteExtendDlg from "./DeleteExtendDlg";

  export default {
    components: {NewLeadDlg, EditLeadDlg, DeleteLeadDlg, NewExtendDlg, EditExtendDlg, DeleteExtendDlg},
    props: {
      vleads: { type: Array, default: () => [] },
      vextends: { type: Array, default: () => [] },
    },
    data: vm => ({
      lp_start: '2019/04/09 00:00',
      lp_end: '2019/04/20 23:55',
      selected_lead: {
        id: 0,
        search_type: 'member',
        keyword: '',
        member_id: '',
        team_id: '',
        start_date: '',
        start_time: ''
      },
      selected_extend: {
        id: 0,
          search_type: 'member',
          keyword: '',
          member_id: '',
          team_id: '',
          start_date: '',
          start_time: ''
      },
      show_new_lead: false,
      show_new_extend: false,
      show_edit_lead: false,
      show_edit_extend: false,
      show_delete_lead: false,
      show_delete_extend: false,
      tab: 'lead',
      ranks: ['VIP', 'S VIP', 'SS VIP', 'QUEEN', 'KING']
    }),
    methods: {
      showNew() {
        if(this.tab === 'lead') {
          this.show_new_lead = true
        } else {
          this.show_new_extend = true
        }
      },
      showExtendEdit(val) {
        this.selected_extend = val
        this.show_edit_extend = true
      },
      showExtendDelete(val) {
        this.selected_extend = val
        this.show_delete_extend = true
      },
      showLeadEdit(val) {
        this.selected_lead = val
        this.show_edit_lead = true
      },
      showLeadDelete(val) {
        this.selected_lead = val
        this.show_delete_lead = true
      },
      saveNewLead(item) {
        this.show_new_lead = false
      },
      saveEditLead(item) {
        this.show_edit_lead = false
      },
      deleteLead(item) {
        this.show_delete_lead = false
      },
      saveNewExtend(item) {
        this.show_new_extend = false
      },
      saveEditExtend(item) {
        this.show_edit_extend = false
      },
      deleteExtend(item) {
        this.show_delete_extend = false
      },
    }
  }
</script>

<style scoped>

</style>