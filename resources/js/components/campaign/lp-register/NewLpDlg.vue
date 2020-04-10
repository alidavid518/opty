<template>
  <v-row justify="center">
    <v-dialog
      class="new-lp-dialog"
      v-model="dialog"
      persistent
      scrollable
      max-width="600px"
    >
      <v-card>
        <v-card-title class="_title">
          アフィリエイター向け PR文
        </v-card-title>
        <v-divider/>
        <v-card-text class="_content">
          <v-row>
            <v-col cols="3">タイトル</v-col>
            <v-col cols="9">
              <v-text-field
                dense outlined
                v-model="item.title"
              />
            </v-col>
          </v-row>
          <v-row>
            <v-col cols="3">LP URL</v-col>
            <v-col cols="9">
              <v-text-field
                dense outlined
                v-model="item.url"
              />
            </v-col>
          </v-row>
          <v-row>
            <v-col cols="3">バナー登録</v-col>
            <v-col cols="3">
              <v-file-input
                dense outlined
                v-model="item.banner"
              />
            </v-col>
            <v-col cols="3">公開設定</v-col>
            <v-col cols="3">
              <v-switch v-model="item.is_public"/>
            </v-col>
          </v-row>
          <v-row>
            <v-col cols="12">
              <h3>成約後リダイレクトURL</h3>
            </v-col>
            <v-col cols="3">PC</v-col>
            <v-col cols="9">
              <v-text-field
                outlined dense
                v-model="item.redirect_pc"
              />
            </v-col>
            <v-col cols="3">スマホ</v-col>
            <v-col cols="9">
              <v-text-field
                outlined dense
                v-model="item.redirect_mobile"
              />
            </v-col>
          </v-row>
          <v-row>
            <v-col>
              <v-list-group v-model="item.show_type">
                <v-list-item
                  :disabled="item.is_public === 1"
                  value="private"
                >
                  非公開
                </v-list-item>
                <v-list-item
                  :disabled="item.is_public === 0"
                  value="banner"
                >
                  バナー表示
                </v-list-item>
                <v-list-item
                  :disabled="item.is_public === 0"
                  value="title"
                >
                  タイトル
                </v-list-item>
              </v-list-group>
            </v-col>
          </v-row>
        </v-card-text>
        <v-card-actions class="_action">
          <v-btn @click="dialog = false">保存</v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </v-row>
</template>

<script>
  export default {
    props: {
      dialog: Boolean,
      item: {
        type: Object,
        id: {type: Number, default: 0},
        url: {type: String, default: ''},
        banner: {type: String, default: ''},
        is_public: {type: Number, default: 1},
        redirect_pc: {type: String, default: ''},
        redirect_mobile: {type: String, default: ''},
        show_type: {type: String, default: 'banner'},
      }
    },
    data: vm => ({
    }),
    methods: {
    }
  }
</script>

<style scoped lang="scss">

</style>