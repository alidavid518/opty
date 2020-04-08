<template>
  <v-card class="_line-rich-images">
    <v-container fluid>
      <v-card-title class="_title">
        <v-row>
          <v-col cols="12">
            <h3>LINE用リッチ画像</h3>
          </v-col>
        </v-row>
      </v-card-title>

      <v-card-text class="_content">
        <v-row>
          <v-col cols="12" v-for="(lp, i) in items" :key="i">
            <LineRichImageItem :item="lp" @onSave="saveLineRichImage"/>
          </v-col>
        </v-row>
      </v-card-text>
    </v-container>
  </v-card>
</template>

<script>
  import LineRichImageItem from "./LineRichImageItem";
  export default {
    name: "SettingStory",
    components: {LineRichImageItem},
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