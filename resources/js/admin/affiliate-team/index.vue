<template>
  <div class="page_wrap_vue pa-3 advertiser-page">
    <v-card class="mx-auto">
      <v-card-title class="_header pb-0">
        <v-container fluid>
          <v-row>
            <v-col class="pb-0">
              <h3 class="d-inline mr-1">アフィリエイター　チーム管理</h3>
            </v-col>
            <v-col class="d-flex justify-end pb-0">
              <v-btn
                class="mr-2"
                color="success"
                @click="showDrafts"
              >
                下書き
              </v-btn>
              <v-btn
                class="mr-2"
                color="info"
                @click="showNew"
              >
                新規
              </v-btn>
            </v-col>
          </v-row>
          <v-row>
            <v-col class="d-flex justify-space-between pb-0">
              <v-btn
                class="search"
                @click="copySetting"
              >
                設定コピー
              </v-btn>
              <v-btn
                color="info"
                dark
                rounded
                class="white--text"
                to="/admin/affiliate"
              >
                個人管理
              </v-btn>
            </v-col>
          </v-row>
          <v-row>
            <v-col class="d-flex justify-space-between pb-0">
              <v-checkbox v-model="checkAll"/>
              <v-btn @click="deleteTeam">削除</v-btn>
            </v-col>
          </v-row>
        </v-container>
      </v-card-title>
      <v-divider/>
      <v-card-text class="_content">
        <v-simple-table>
          <template v-slot:default>
            <thead>
            <tr>
              <th class="text-left"> </th>
              <th class="text-left" id="_th1">ID</th>
              <th class="text-left" id="_th2">チームネーム</th>
              <th class="text-left" id="_th3">対象キャンペーン</th>
              <th class="text-left" id="_th4">メンバー</th>
              <th class="text-left" id="_th7"> </th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="item in items" :key="item.id">
              <td>
                <v-checkbox v-model="item.checked"/>
              </td>
              <td>{{ item.id }}</td>
              <td>{{ item.name }}</td>
              <td>{{ item.campaign }}</td>
              <td>{{ item.members.join() }}</td>
              <td>
                <v-btn color="#C694F9" dark @click="showDetail(item)">
                  詳細
                </v-btn>
              </td>
            </tr>
            </tbody>
          </template>
        </v-simple-table>
      </v-card-text>
      <v-divider/>
      <v-card-actions class="d-flex justify-center">
        <v-btn text @click="showMore">
          もっと見る
        </v-btn>
      </v-card-actions>
    </v-card>

    <NewDialog
      :dialog="show_new_dlg"
      @onNewDlgClose="show_new_dlg=false"
      @onCreated="onNew"
    />
    <EditDialog
      :dialog="show_edit_dlg"
      :item="selected"
      @onEditDlgClose="show_edit_dlg=false"
      @onEdited="onEdit"
    />
    <DetailDialog
      :dialog="show_detail_dlg"
      :item="selected"
      @onDetailDlgClose="show_detail_dlg=false"
    />
    <DeleteDialog
      :dialog="show_delete_dlg"
      :item="selected"
      @onDeleteDlgClose="show_delete_dlg=false"
      @onDeleted="onDelete"
    />
    <DraftListDialog
      :dialog="show_draft_dlg"
      :items="drafts"
      @onDraftDlgClose="show_draft_dlg=false"
      @onEditDraft="showEdit"
    />
  </div>
</template>

<script>
  import DraftListDialog from "../../components/affiliate-team/DraftListDialog";
  import NewDialog from "../../components/affiliate-team/NewDialog";
  import EditDialog from "../../components/affiliate-team/EditDialog";
  import DeleteDialog from "../../components/affiliate-team/DeleteDialog";
  import DetailDialog from "../../components/affiliate-team/DetailDialog";

  export default {
    components: {DetailDialog, DeleteDialog, EditDialog, NewDialog, DraftListDialog},
    data() {
      return {
        show_new_dlg: false,
        show_edit_dlg: false,
        show_detail_dlg: false,
        show_delete_dlg: false,
        show_draft_dlg: false,
        checkAll: false,
        selected: null,
        page: 0,
        size: 5,
        filters: [],
        all_items: [],
        affiliates: [],
        items: [],
        campaigns:[
          {id: 1, name: 'campaign1'},
          {id: 2, name: 'campaign2'},
          {id: 3, name: 'campaign3'}
          ],
        drafts: [],
      }
    },
    mounted() {
      // load categories and QAs
      this.all_items = [
        {id: 1, name: 'team1', campaign: 1, members: ['AAA', 'BBB', 'CCC'], checked: false},
        {id: 2, name: 'team2', campaign: 1, members: ['AAA', 'BBB', 'CCC'], checked: false},
        {id: 3, name: 'team3', campaign: 2, members: ['AAA', 'BBB', 'CCC'], checked: false},
        {id: 4, name: 'team4', campaign: 2, members: ['AAA', 'BBB', 'CCC'], checked: false},
        {id: 5, name: 'team5', campaign: 3, members: ['AAA', 'BBB', 'CCC'], checked: false},
        {id: 6, name: 'team6', campaign: 3, members: ['AAA', 'BBB', 'CCC'], checked: false},
      ]
      this.drafts = [
        {id: 1, name: 'team7', campaign: 1, members: ['AAA', 'BBB', 'CCC'], checked: false},
        {id: 2, name: 'team8', campaign: 2, members: ['AAA', 'BBB', 'CCC'], checked: false},
        {id: 3, name: 'team9', campaign: 3, members: ['AAA', 'BBB', 'CCC'], checked: false},
      ]
      this.loadItem(this.limit)
    },
    computed: {
      limit() {
        return (this.page + 1) * this.size
      }
    },
    watch: {
      checkAll(val) {
        this.items.forEach(item => item.checked = val)
      },
    },
    methods: {
      deleteTeam() {
        const selected_items = this.items.filter(item => item.checked)
        selected_items.forEach(item => {
          const index = this.all_items.findIndex(m => m.id === item.id)
          if(index > -1) this.all_items.splice(index, 1)
        })
        this.loadItem(this.limit)
      },
      copySetting() {

      },
      showMore() {
        this.page++
        const start = this.page * this.size
        const end = start + this.size
        const new_items = this.all_items.filter((item, key) => key >= start && key < end)
        this.items = [...this.items, ...new_items]
      },
      loadItem(limit) {
        this.items = this.all_items.slice(0, limit)
      },
      findItem(qid) {
        const item = this.items.find(item => item.id === qid)
        if (item === undefined) return false
        this.selected = item
        return true
      },
      showEdit(val) {
        this.selected = val
        this.show_draft_dlg = false
        this.show_edit_dlg = true
      },
      showDrafts() {
        this.show_draft_dlg = true
      },
      showNew() {
        this.show_new_dlg = true
      },
      showDetail(item) {
        this.selected = item
        this.show_detail_dlg = true
      },
      showDelete(item) {
        this.selected = item
        this.show_delete_dlg = true
      },
      onNew(val, flag) {
        /**
         * save new advertiser to server
         * flag=1 => save draft, flag=2 => register
         */
        val.created_at = this.$date().format('YYYY-MM-DD HH:mm')
        val.updated_at = val.created_at
        this.all_items.unshift(val)
        this.loadItem(this.limit)
        this.show_new_dlg = false
      },
      onNewAccount(val) {
        /**
         * save new advertiser to server
         * flag=1 => save draft, flag=2 => register
         */
        // this.all_items.unshift(val)
        // this.loadItem(this.limit)
        this.show_account_dlg = false
      },
      onEdit(val, flag) {
        /**
         * save new advertiser to server
         * flag=1 => save draft, flag=2 => register
         */
        const index = this.all_items.findIndex(m => m.id === val.id)
        if(index === -1) return
        this.all_items[index] = val
        this.loadItem(this.limit)
      },
      onDelete(val) {
        /**
        * delete Qa from server
        */
        const id = this.all_items.findIndex(m => m.id === val.id)
        if(id === -1) return
        this.all_items.splice(id, 1)
        this.loadItem(this.limit)
        this.show_delete_dlg = false
      },
    }
  }
</script>

<style scoped>
  .sort {
    max-width:400px !important;
  }
  .search {
    max-width: 300px !important;
  }
</style>