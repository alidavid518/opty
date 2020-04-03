<template>
  <div class="page_wrap_vue pa-3 qa-page">
    <v-card class="mx-auto">
      <v-card-title class="_header">
        <h2>キャンペーン一覧</h2>
        <v-btn
          class="_header_button"
          @click="showNew"
        >
          新規作成
        </v-btn>
      </v-card-title>

      <v-card-text class="_content">
        <v-simple-table>
          <template v-slot:default>
            <thead>
            <tr>
              <th class="text-left" id="_th1">ID</th>
              <th class="text-left" id="_th2">タイトル</th>
              <th class="text-left" id="_th3">カテゴリ</th>
              <th class="text-left" id="_th4">質問</th>
              <th class="text-left" id="_th5">回答</th>
              <th class="text-left" id="_th6"/>
            </tr>
            </thead>
            <tbody>
            <tr v-for="item in items" :key="item.id">
              <td>{{ item.id }}</td>
              <td>{{ item.title }}</td>
              <td>{{ item.category }}</td>
              <td>{{ item.question }}</td>
              <td>{{ item.answer }}</td>
              <td>
                <v-btn
                  color="#C694F9"
                  dark
                  @click="showDetail(item.id)"
                >
                  詳細
                </v-btn>
                <v-btn
                  color="#F99494"
                  dark
                  @click="showDelete(item.id)"
                >
                  棄却
                </v-btn>
              </td>
            </tr>
            </tbody>
          </template>
        </v-simple-table>
      </v-card-text>

      <v-card-actions class="_action">
        <v-btn
          @click="showMore"
          text
        >
          もっと見る
        </v-btn>
      </v-card-actions>
    </v-card>
    <QaNewDialog
      :dialog="show_new_dlg"
      :categories="categories"
      @onNewDlgClose="hideNew"
      @onCreated="onNewQa"
    />
    <QaEditDialog
      :dialog="show_edit_dlg"
      :categories="categories"
      :item="selected"
      @onEditDlgClose="hideEdit"
      @onEdited="onEditQa"
    />
    <QaDetailDialog
      :dialog="show_detail_dlg"
      :categories="categories"
      :item="selected"
      @onDetailDlgClose="hideDetail"
    />
    <QaDeleteDialog
      :dialog="show_delete_dlg"
      :item="selected"
      @onDeleteDlgClose="hideDelete"
      @onDeleted="onDeleteQa"
    />
  </div>
</template>

<script>
  import QaNewDialog from "../../../components/qa/QaNewDialog";
  import QaEditDialog from "../../../components/qa/QaEditDialog";
  import QaDetailDialog from "../../../components/qa/QaDetailDialog";
  import QaDeleteDialog from "../../../components/qa/QaDeleteDialog";

  export default {
    components: {QaNewDialog, QaEditDialog, QaDetailDialog, QaDeleteDialog},
    data() {
      return {
        show_new_dlg: false,
        show_edit_dlg: false,
        show_detail_dlg: false,
        show_delete_dlg: false,
        selected: null,
        page: 0,
        size: 5,
        categories: [],
        all_items: [],
        items: [],
      }
    },
    mounted() {
      // load categories and QAs
      this.all_items = [
        {id: 1, title: 'title1', category: 'category1', question: 'question1', answer: 'answer1'},
        {id: 2, title: 'title2', category: 'category2', question: 'question2', answer: 'answer2'},
        {id: 3, title: 'title3', category: 'category3', question: 'question3', answer: 'answer3'},
        {id: 4, title: 'title4', category: 'category4', question: 'question4', answer: 'answer4'},
        {id: 5, title: 'title5', category: 'category5', question: 'question5', answer: 'answer5'},
        {id: 6, title: 'title6', category: 'category6', question: 'question6', answer: 'answer6'},
        {id: 7, title: 'title7', category: 'category7', question: 'question7', answer: 'answer7'},
        {id: 8, title: 'title8', category: 'category8', question: 'question8', answer: 'answer8'},
        {id: 9, title: 'title9', category: 'category9', question: 'question9', answer: 'answer9'},
        {id: 10, title: 'title10', category: 'category10', question: 'question10', answer: 'answer10'},
      ]
      this.categories = ['category1', 'category2', 'category3']
      this.loadItem(this.limit)
    },
    computed: {
      limit() {
        return (this.page + 1) * this.size
      }
    },
    methods: {
      showMore() {
        this.page++
        const start = this.page * this.size
        const end = start + this.size
        const new_items = this.all_items.filter((item, key) => key >= start && key < end)
        this.items = [...this.items, ...new_items]
      },
      loadItem(limit) {
        console.log(limit)
        this.items = this.all_items.slice(0, limit)
      },
      findItem(qid) {
        const item = this.items.find(item => item.id === qid)
        if (item === undefined) return false
        this.selected = item
        return true
      },
      showNew() {
        this.show_new_dlg = true
      },
      hideNew() {
        this.show_new_dlg = false
      },
      showEdit(qid) {
        if (!this.findItem(qid)) return
        this.show_edit_dlg = true
      },
      hideEdit() {
        this.show_edit_dlg = false
      },
      showDetail(qid) {
        if (!this.findItem(qid)) return
        this.show_detail_dlg = true
      },
      hideDetail() {
        this.show_detail_dlg = false
      },
      showDelete(qid) {
        if (!this.findItem(qid)) return
        this.show_delete_dlg = true
      },
      hideDelete() {
        this.show_delete_dlg = false
      },
      onNewQa(qa, categories) {
        /**
         * save new Qa to server
         */
        this.all_items.unshift(qa)
        this.categories = categories
        this.loadItem(this.limit)
        this.show_new_dlg = false
      },
      onEditQa(val) {
        /**
        * save edited Qa to server
        */
        const id = this.all_items.findIndex(m => m.id === val.id)
        if(id === -1) return
        this.all_items[id] = val
        this.loadItem(this.limit)
      },
      onDeleteQa(val) {
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