<template>
  <v-card class="line-register">
    <v-container fluid>
      <v-card-title>
        <v-row>
          <v-col cols="12">
            <h3>LINE連携</h3>
          </v-col>
        </v-row>
      </v-card-title>
      <v-divider/>
      <v-card-text>
        <v-row>
          <v-col cols="3">チャネルURL</v-col>
          <v-col cols="9">
            <v-text-field
              v-model="url"
              outlined dense hide-details/>
          </v-col>
        </v-row>
        <v-row>
          <v-col cols="3">チャネルシークレット</v-col>
          <v-col cols="9">
            <v-text-field
              v-model="secret"
              outlined dense hide-details/>
          </v-col>
        </v-row>
        <v-row>
          <v-col cols="3">アクセストークン</v-col>
          <v-col cols="9">
            <v-text-field
              v-model="token"
              outlined dense hide-details/>
          </v-col>
        </v-row>
        <v-row>
          <v-col cols="3">リダイレクトURL</v-col>
          <v-col cols="9">
            <v-text-field
              v-model="redirect_url"
              outlined dense hide-details/>
          </v-col>
        </v-row>
        <v-row>
          <v-col cols="3">あいさつ画像</v-col>
          <v-col cols="9">
            <v-img
              :src="preview_url"
              contain
              class="_preview"
              width="200" height="200"
            />
            <v-file-input
              class="img-select"
              v-model="images"
              accept="image/*"
              prepend-icon="mdi-camera"
              @change="imgSelect"
            />
          </v-col>
        </v-row>
      </v-card-text>
      <v-card-actions class="d-flex justify-center">
        <v-btn color="success" dark @click="register">保存</v-btn>
      </v-card-actions>
    </v-container>
  </v-card>
</template>

<script>
  export default {
    props: {
      items: {
        type: Array,
        default: () => []
      }
    },
    data: vm => ({
      url: '',
      secret: '',
      token: '',
      redirect_url: '',
      preview_url: '',
      images: []
    }),
    methods: {
      register() {

      },
      imgSelect() {
        console.log(this.images)
        this.preview_url = URL.createObjectURL(this.images)
      }
    }
  }
</script>

<style scoped>
  .img-select {
    display: inline-flex;
    width: 300px;
  }
  ._preview {
    border: 1px solid #aaa;
    border-radius: 7px;
    display: inline-flex;
    margin-right: 20px;
  }
</style>