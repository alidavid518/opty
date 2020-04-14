<template>
  <v-row justify="center">
    <v-dialog
      class="new-lp-dialog"
      v-model="show"
      persistent
      max-width="600px"
    >
      <v-card>
        <v-card-title class="_title">
          LP新規登録設定
        </v-card-title>
        <v-divider/>
        <v-card-text class="_content">
          <v-row>
            <v-col cols="3">タイトル</v-col>
            <v-col cols="9">
              <v-text-field
                dense outlined hide-details
                v-model="item.title"
              />
            </v-col>
          </v-row>
          <v-row>
            <v-col cols="3">LP URL</v-col>
            <v-col cols="9">
              <v-text-field
                dense outlined hide-details
                v-model="item.url"
              />
            </v-col>
          </v-row>
          <v-row>
            <v-col cols="3">バナー登録</v-col>
            <v-col cols="3">
              <v-file-input
                dense outlined hide-details
                v-model="item.banner"
              />
            </v-col>
            <v-col cols="3">公開設定</v-col>
            <v-col cols="3">
              <v-switch v-model="item.is_public"
                        :true-value="1" :false-value="0" hide-details class="mt-0"/>
            </v-col>
          </v-row>
          <v-row>
            <v-col cols="12">
              <h4>成約後リダイレクトURL</h4>
            </v-col>
            <v-col cols="3">PC</v-col>
            <v-col cols="9">
              <v-text-field
                outlined dense hide-details
                v-model="item.redirect_pc"
              />
            </v-col>
            <v-col cols="3">スマホ</v-col>
            <v-col cols="9">
              <v-text-field
                outlined dense hide-details
                v-model="item.redirect_mobile"
              />
            </v-col>
          </v-row>
          <v-row v-if="item.is_public === 1">
            <v-col>
              <v-card>
                <v-card-text>
                  <v-list>
                    <v-list-item-group v-model="item.show_type">
                      <v-list-item key="0" value="banner" active-class="primary white--text" class="justify-center">
                        バナー表示
                      </v-list-item>
                      <v-list-item key="1" value="title" active-class="primary white--text" class="justify-center">
                        タイトル
                      </v-list-item>
                    </v-list-item-group>
                  </v-list>
                </v-card-text>
              </v-card>
            </v-col>
          </v-row>
        </v-card-text>
        <v-card-actions class="_action justify-center">
          <v-btn @click="$emit('onNewClose')">キャンセル</v-btn>
          <v-btn dark success
                 @click="$emit('onNewLp', item)">保存</v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </v-row>
</template>

<script>
  export default {
    props: {
      show: {type:Boolean, default: false},
    },
    data: vm => ({
      item: {
        id: 0,
        title: '',
        url: '',
        banner: null,
        is_public: 1,
        redirect_pc: '',
        redirect_mobile: '',
        show_type: 'banner',
      },

    }),
    watch: {
      is_public(val) {
        if(val === 0) this.item.show_type = 'private'
      }
    },
    methods: {
    }
  }
</script>

<style scoped lang="scss">
  .v-list-item {
    margin: 5px !important;
    box-shadow: 1px 2px 3px #bbb;
  }
</style>