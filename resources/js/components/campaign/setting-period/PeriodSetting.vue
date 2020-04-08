<template>
  <v-card class="_setting-period">
    <v-container fluid>
      <v-card-title>
        <h3 class="_title">期間設定</h3>
      </v-card-title>

      <v-card-text>
        <v-row>
          <v-col cols="6">
            <v-datetime-picker
              date-format="YYYY/MM/DD"
              time-format="HH:mm"
              v-model="start"
              class="_dtp_start"
            /> から
          </v-col>
          <v-col cols="6">
            <v-datetime-picker
              date-format="YYYY/MM/DD"
              time-format="HH:mm"
              v-model="end"
              class="_dtp_end"
            /> まで
          </v-col>
          <v-col cols="12">
            <v-btn @click="savePeriod">保存する</v-btn>
          </v-col>
        </v-row>
      </v-card-text>
    </v-container>
  </v-card>
</template>

<script>
  import StoryItem from "../setting-story/StoryItem";
  export default {
    name: "SettingStory",
    components: {StoryItem},
    props: {
      item: {
        type: Object,
        id: {type: Number, default: 0},
        start: {type: String, default: this.$date().toString()},
        to: {type: String, default: this.$date().toString()},
      }
    },
    data() {
      return {
      }
    },
    methods: {
      savePeriod() {

      }
    }
  }
</script>

<style scoped>

</style>