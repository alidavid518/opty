<template>
  <div class="page_wrap_vue pa-3 advertiser-page">
    <v-card class="mx-auto">
      <v-card-title class="_header">
        <v-container fluid>
          <v-row>
            <v-col>
              <h3 class="d-inline mr-1">アフィリエイター個人管理</h3>
            </v-col>
            <v-col class="d-flex justify-end">
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
            <v-col class="d-flex justify-space-between">
              <v-text-field
                outlined
                dense
                placeholder="検索"
                class="search"
                append-outer-icon="mdi-magnify"
              />
              <v-btn
                color="info"
                dark
                rounded
                class="white--text"
                to="/admin/affiliate-team"
              >
                チーム管理
              </v-btn>
            </v-col>
          </v-row>
          <v-row>
            <v-col class="d-flex justify-space-between">
              <v-chip-group
                v-model="filter"
                column
                active-class="primary white--text"
              >
                <v-chip v-for="rank in ranks" :key="rank.value" :value="rank.value">
                  {{ rank.text }}
                </v-chip>
              </v-chip-group>
              <v-select
                label="表示順"
                outlined
                dense
                v-model="sort"
                :items="sorts"
                item-text="text"
                item-value="value"
                class="sort"
              />
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
              <th class="text-left" id="_th1">ID</th>
              <th class="text-left" id="_th2">User name / Name</th>
              <th class="text-left" id="_th3">RANK</th>
              <th class="text-left" id="_th4">Mail Address</th>
              <th class="text-left" id="_th5">Status</th>
              <th class="text-left" id="_th6">Joined</th>
              <th class="text-left" id="_th7"> </th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="item in items" :key="item.id">
              <td>{{ item.id }}</td>
              <td>{{ item.name_last }} {{ item.name_first }}</td>
              <td>{{ ranks[item.rank].text }}</td>
              <td>{{ item.mail }}</td>
              <td>{{ item.status }}</td>
              <td>{{ $date(item.created_at).format('YYYY/MM/DD HH:mm') }}</td>
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
    <DraftListDialog
      :dialog="show_draft_dlg"
      :items="drafts"
      @onDraftDlgClose="show_draft_dlg=false"
      @onEditDraft="showEdit"
    />
  </div>
</template>

<script>
  import DraftListDialog from "../../components/admin/affiliate/DraftListDialog";
  import NewDialog from "../../components/admin/affiliate/NewDialog";
  import EditDialog from "../../components/admin/affiliate/EditDialog";
  import DeleteDialog from "../../components/admin/affiliate/DeleteDialog";
  import DetailDialog from "../../components/admin/affiliate/DetailDialog";

  export default {
    components: {DetailDialog, DeleteDialog, EditDialog, NewDialog, DraftListDialog},
    data() {
      return {
        show_new_dlg: false,
        show_edit_dlg: false,
        show_detail_dlg: false,
        show_delete_dlg: false,
        show_draft_dlg: false,
        selected: null,
        page: 0,
        size: 5,
        filters: [],
        all_items: [],
        affiliates: [],
        items: [],
        filter: 'all',
        ranks:[
          {text: '全て', value:'all'},
          {text: 'VIP', value:'VIP'},
          {text: 'S VIP', value:'S VIP'},
          {text: 'SS VIP', value:'SS VIP'},
          {text: 'QUEEN', value:'QUEEN'},
          {text: 'KING', value:'KING'},
        ],
        drafts: [],
        sort: '',
        sorts: [
          {text: 'ID番号順', value: 'id'},
          {text: '登録日時順', value: 'joined'},
          {text: 'ランク順', value: 'rank'},
        ]
      }
    },
    mounted() {
      // load categories and QAs
      this.all_items = [
        {id: 1, name_first: 'first', name_last: 'last', mail: 'adv@mail.com', status: '本登録', rank: 5, created_at: '2020-01-01 12:20', updated_at: '2020-01-01 12:20'},
        {id: 2, name_first: 'first', name_last: 'last', mail: 'adv@mail.com', status: '本登録', rank: 4, created_at: '2020-01-02 12:20', updated_at: '2020-01-01 12:20'},
        {id: 3, name_first: 'first', name_last: 'last', mail: 'adv@mail.com', status: '本登録', rank: 1, created_at: '2020-01-05 12:20', updated_at: '2020-01-01 12:20'},
        {id: 4, name_first: 'first', name_last: 'last', mail: 'adv@mail.com', status: '本登録', rank: 2, created_at: '2020-01-03 12:20', updated_at: '2020-01-01 12:20'},
        {id: 5, name_first: 'first', name_last: 'last', mail: 'adv@mail.com', status: '本登録', rank: 3, created_at: '2020-01-01 15:20', updated_at: '2020-01-01 12:20'},
        {id: 6, name_first: 'first', name_last: 'last', mail: 'adv@mail.com', status: '本登録', rank: 1, created_at: '2020-01-06 12:20', updated_at: '2020-01-01 12:20'},
        {id: 7, name_first: 'first', name_last: 'last', mail: 'adv@mail.com', status: '本登録', rank: 5, created_at: '2020-01-03 10:20', updated_at: '2020-01-01 12:20'},
      ]
      this.drafts = [
        {id: 1, name_first: 'first', name_last: 'last', mail: 'adv@mail.com', status: '本登録', rank: 5, created_at: '2020-01-01 12:20', updated_at: '2020-01-01 12:20'},
        {id: 2, name_first: 'first', name_last: 'last', mail: 'adv@mail.com', status: '本登録', rank: 4, created_at: '2020-01-02 12:20', updated_at: '2020-01-01 12:20'},
        {id: 3, name_first: 'first', name_last: 'last', mail: 'adv@mail.com', status: '本登録', rank: 1, created_at: '2020-01-05 12:20', updated_at: '2020-01-01 12:20'},
      ]
      this.loadItem(this.limit)
    },
    computed: {
      limit() {
        return (this.page + 1) * this.size
      }
    },
    watch: {
      sort() {
        this.loadItem(this.limit)
      },
      filter() {
        this.loadItem(this.limit)
      }
    },
    methods: {
      getItems() {
        let tmp = this.all_items
        if(this.filter !== 'all') {
          tmp = tmp.filter(item => item.rank === this.filter)
        }
        if(this.sort === 'id') {
          tmp.sort((a, b) => a.id - b.id)
        }
        if(this.sort === 'joined') {
          tmp.sort(function(a, b) {
            const atime = new Date(a.created_at).getTime()
            const btime = new Date(b.created_at).getTime()
            return atime - btime
          })
        }
        if(this.sort === 'rank') {
          tmp.sort((a, b) => a.rank - b.rank)
        }
        return tmp
      },
      showMore() {
        this.page++
        const start = this.page * this.size
        const end = start + this.size
        const new_items = this.all_items.filter((item, key) => key >= start && key < end)
        this.items = [...this.items, ...new_items]
      },
      showTeamManage() {

      },
      loadItem(limit) {
        const tmp = this.getItems()
        this.items = tmp.slice(0, limit)
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