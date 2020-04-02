<template>
  <v-card class="campaign-item">
    <v-img
      :src="item.image"
      class="white--text align-end campaign-item_img"
      gradient="to bottom, rgba(0,0,0,.1), rgba(0,0,0,.5)"
      height="200px"
    >
    </v-img>

    <v-card-text class="campaign-item_title">
      {{item.title}}
    </v-card-text>
    <v-card-text class="campaign-item_subtitle">
      {{item.date_start}} - {{item.date_end}}
    </v-card-text>
    <v-card-text class="campaign-item_text">
      登録数 {{format(item.register_number)}}
    </v-card-text>
    <v-card-text class="campaign-item_text">
      経費 {{format(item.expense)}}
    </v-card-text>
    <v-card-text class="campaign-item_text">
      ブロック数 {{format(item.block_number)}}({{format(item.block_rate)}}%)
    </v-card-text>
    <v-card-text class="campaign-item_text">
      平均LP登録率 {{item.average_lprr}}%
    </v-card-text>

    <v-card-actions class="d-flex justify-center mt-2">
      <v-btn outlined>詳細</v-btn>
    </v-card-actions>

    <v-card-actions class="d-flex justify-center pb-4">
      <v-btn rounded color="#FF7777">実績</v-btn>
      <v-btn rounded color="#5367FD">設定</v-btn>
      <v-btn
        rounded
        color="#1DE9B6"
        @click="edit"
      >
        編集
      </v-btn>
    </v-card-actions>
  </v-card>
</template>

<script>
  export default {
    props: {
      item: {
        type: Object,
        default() {
          return null
        },
        id: {
          type: Number,
          required: false
        },
        title: {
          type: String,
          required: false
        },
        image: {
          type: String,
          required: false
        },
        date_start: {
          type: String,
          required: false
        },
        date_end: {
          type: String,
          required: false
        },
        register_number: {  // Number of registrations
          type: Number,
          required: false
        },
        expense: {
          type: Number,
          required: false
        },
        block_number: { // Number of blocks
          type: Number,
          required: false
        },
        block_rate: { // Number of blocks
          type: Number,
          required: false
        },
        average_lprr: { // Average LP registration rate
          type: Number,
          required: false
        },
      }
    },
    methods: {
      format(val) {
        return val.toFixed(0).replace(/\d(?=(\d{3})+\.)/g, '$&,')
      },
      edit() {
        this.$router.push(`/admin/campaign/edit/${this.item.id}`)
      }
    }
  }
</script>

<style scoped>

</style>