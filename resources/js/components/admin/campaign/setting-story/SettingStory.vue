<template>
  <v-card>
    <v-card-title>
      <h3>ストーリー</h3>
    </v-card-title>
    <v-card-text>
      <StoryItem
        v-for="item in items"
        :item="item"
        :key="item.id"
      />
    </v-card-text>
    <v-card-actions class="d-flex justify-center">
      <v-btn
        dark
        color="purple darken-3"
        @click="addItem"
      >
        新規
      </v-btn>
    </v-card-actions>
  </v-card>
</template>

<script>
  import StoryItem from "./StoryItem";
  export default {
    name: "SettingStory",
    components: {StoryItem},
    props: {
      items: {
        type: Array,
        default: () => []
      }
    },
    methods: {
      addItem() {

      }
    }
  }
</script>

<style scoped>

</style>