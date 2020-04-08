<template>
  <v-container fluid>
    <v-card class="_mail-intro-list">
      <v-card-title>
        <v-row>
          <v-col cols="6">
            <h3 class="_title">{{item.title}}</h3>
            <br/>
            <small class="_url">{{item.url}}</small>
          </v-col>
          <v-col cols="6" class="d-flex justify-end">
            <v-btn
              dark color="success"
              @click="show_new_dlg=true"
            />
            <v-btn
              dark color="primary"
              @click="save"
            >
              登録
            </v-btn>
          </v-col>
        </v-row>
      </v-card-title>
      <v-card-text class="_content">
        <div v-for="(intro, i) in item.mail_introductions" :key="i">
          <mail-introduction-item
            :item="intro"
            @onDelete="showDelete(intro)"
            @onDetail="showDetail(intro)"
          />
        </div>
      </v-card-text>

    </v-card>

    <new-introduction-dlg
      :show="show_new_dlg"
      @onNewClose="show_new_dlg=false"
      @onNew="addItem"/>
    <delete-introduction-dlg
      :item="selected" :show="show_delete_dlg"
      @onDeleteClose="show_delete_dlg=false"
      @onDeleteConfirm="deleteConfirm"/>
    <detail-introduction-dlg
      :item="selected" :show="show_delete_dlg"
      @onDetailClose="show_detail_dlg=false"
      @onDeleteConfirm="deleteConfirm"/>

    <scale-loader color="orange darken--1" loading="loading" height="70" width="7"/>
  </v-container>
</template>

<script>
  import vuetifyToast from 'vuetify-toast'
  import MailIntroductionItem from "./MailIntroductionItem";
  import NewIntroductionDlg from "./NewIntroductionDlg";
  import DeleteIntroductionDlg from "./DeleteIntroductionDlg";
  import DetailIntroductionDlg from "./DetailIntroductionDlg";

  export default {
    components: {DetailIntroductionDlg, DeleteIntroductionDlg, NewIntroductionDlg, MailIntroductionItem},
    props: {
      item: {
        type: Object,
        id: { type: Number, default: 0},
        title: {type: String, default: ''},
        url: {type: String, default: ''},
        mail_introductions: {type: Array, default: []}
      }
    },
    data: () => ({
      loading: false,
      new_intro: '',
      selected: {id: 0, title: '', url: '', content: ''},
      show_new_dlg: false,
      show_detail_dlg: false,
      show_delete_dlg: false
    }),
    methods: {
      showDetail(item) {
        this.selected = item
        this.show_detail_dlg = true
      },
      showDelete(item) {
        this.selected = item
        this.show_delete_dlg = true
      },
      deleteConfirm(item) {
        /*
        * delete item from DB
        * */
        const id = this.item.mail_introductions.findIndex(v => v.id === item.id)
        if(id === -1) return
        this.item.mail_introductions.splice(id, 1)
      },
      addItem(item) {
        /*
        * create item at DB
        * */
        this.item.mail_introductions.push(item)
      },
      save() {
      }
    }
  }
</script>

<style scoped lang="scss">
  ._mail-intro-list {
    height: 300px !important;
    ._title {
      font-size: 1.2rem !important;
    }
    ._url {
      font-size: 0.8rem !important;
    }
    ._content {
      width: 100% !important;
      overflow-x: scroll;
    }
  }
</style>