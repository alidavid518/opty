<template>
  <v-list-item class="story-item">
    <v-list-item-content>
      <v-row>
        <v-col cols="2" class="text-right">
          <v-label class=" story-item-label">
            第{{item.id}}話
          </v-label>
        </v-col>
        <v-col>
          <v-text-field
            dense outlined hide-details
            v-model="item.link"
            class="story-item_link"
          />
        </v-col>
        <v-col cols="1">
          <v-btn
            dark color="primary"
            class="story-item_btn"
          >
            登録
          </v-btn>
        </v-col>
      </v-row>
    </v-list-item-content>
  </v-list-item>
</template>

<script>
  export default {
    name: "StoryItem",
    props: {
      item: {
        type: Object,
        default() {
          return {
            no: 0,
            link: ''
          }
        }
      }
    }
  }
</script>

<style scoped>

</style>