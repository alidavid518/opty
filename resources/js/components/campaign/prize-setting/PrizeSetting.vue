<template>
  <v-card class="prize-setting">
    <v-container fluid>
      <v-card-title>
        <v-row>
          <v-col cols="12">
            <h3>賞品設定</h3>
          </v-col>
        </v-row>
      </v-card-title>
      <v-divider/>
      <v-card-text>
        <v-row>
          <v-col cols="12" class="d-flex justify-center align-center">
            <label>成約数ランキング</label>
            <v-text-field
              v-model="contract_ranking"
              outlined dense hide-details
              class="_rank mx-2"
            />位
            <label class="ml-4 mr-2">賞品名</label>
            <v-text-field
              v-model="prize_name"
              outlined dense hide-details
            />
          </v-col>
          <v-col cols="12" class="d-flex justify-center align-center">
            <label class="mr-2">画像</label>
            <v-img
              class="_preview mr-2"
              :src="prev_url"
              contain
              width="200" height="200"
            />
            <v-file-input class="img-select" v-model="images" @change="imgSelect"/>
          </v-col>
        </v-row>
        <v-row>
          <v-col class="d-flex justify-center">
            <v-btn
              dark
              color="success"
            >
              検索
            </v-btn>
          </v-col>
        </v-row>
      </v-card-text>
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
      contract_ranking: '',
      prize_name: '',
      prev_url: '',
      images: []
    }),
    methods: {
      imgSelect() {
        console.log(this.images)
        this.prev_url = URL.createObjectURL(this.images)
      }
    }
  }
</script>

<style scoped>
  ._rank {
    width: 100px;
    flex: none;
  }
  .img-select {
    width: 300px;
    flex: none;
  }
  ._preview {
    border: 1px solid #aaa;
    border-radius: 7px;
    flex: none;
    margin-right: 20px;
  }
</style>