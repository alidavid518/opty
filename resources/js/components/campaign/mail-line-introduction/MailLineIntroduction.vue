<template>
  <v-card class="_mail-line-introduction">
    <v-container fluid>
      <v-card-title class="_title">
        <v-row>
          <v-col cols="12">
            <h3>メール/LINE紹介文</h3>
          </v-col>
        </v-row>
      </v-card-title>

      <v-card-text>
        <v-tabs
          background-color="white"
          color="deep-purple accent-4"
          v-model="tab"
        >
          <v-tab key="mail">メール</v-tab>
          <v-tab key="line">LINE</v-tab>
        </v-tabs>
      </v-card-text>
      <v-card-text class="_content">
        <v-tabs-items v-model="tab">
          <v-tab-item key="mail">
            <MailIntroductionList v-for="(mail_intro, i) in mailIntroductions" :key="i"/>
          </v-tab-item>
          <v-tab-item key="line">
            <LineIntroductionList v-for="(line_intro, i) in lineIntroductions" :key="i"/>
          </v-tab-item>
        </v-tabs-items>
      </v-card-text>
    </v-container>
  </v-card>
</template>

<script>
  import LineIntroductionList from "./LineIntroductionList";
  import MailIntroductionList from "./MailIntroductionList";
  export default {
    components: {MailIntroductionList, LineIntroductionList},
    props: {
      items: {
        type: Array,
        default: () => []
      }
    },
    data() {
      return {
        items: [
          {id: 1, title: 'LP1', url: 'url1',
            rich_images: [
              {id: 1, url: '/img/sample/buzz-andersen.png'},
              {id: 2, url: '/img/sample/buzz-andersen.png'},
              {id: 3, url: '/img/sample/buzz-andersen.png'},
            ]
          },
          {id: 2, title: 'LP2', url: 'url2',
            rich_images: [
              {id: 4, url: '/img/sample/daniel-monteiro.png'},
              {id: 5, url: '/img/sample/daniel-monteiro.png'},
              {id: 6, url: '/img/sample/daniel-monteiro.png'},
            ]
          },
          {id: 3, title: 'LP3', url: 'url3',
            rich_images: [
              {id: 7, url: '/img/sample/icons8-team.png'},
              {id: 8, url: '/img/sample/icons8-team.png'},
              {id: 9, url: '/img/sample/icons8-team.png'},
            ]
          },
        ]
      }
    },
    methods: {
      saveLineRichImage(item) {

      }
    }
  }
</script>

<style scoped lang="scss">
  ._line-rich-images {
    ._content {
      padding: 15px;
      max-height: 600px !important;
      overflow-y: scroll;
    }
  }
</style>