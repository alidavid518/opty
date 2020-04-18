<template>
  <v-card>
    <v-container fluid>
      <v-card-title>
        <v-row>
          <v-col cols="12">
            <h3>報酬額設定</h3>
          </v-col>
          <v-col cols="12">
            <v-chip-group
              column
              v-model="rewardType"
              active-class="success white-text"
            >
              <v-chip v-for="(tag, i) in rewardTypes"
                      :key="i" :value="tag.value">
                {{ tag.label }}
              </v-chip>
            </v-chip-group>
          </v-col>
        </v-row>
      </v-card-title>

      <v-card-text>
        <table-main-reward
          v-if="rewardType==='main'"
          :rewards="items.main"
        />
        <table-special-reward
          v-if="rewardType==='special'"
          :rewards="items.special"
        />
      </v-card-text>
    </v-container>
  </v-card>
</template>

<script>
  import TableMainReward from "./TableMainReward";
  import TableSpecialReward from "./TableSpecialReward";
  export default {
    components: {TableMainReward, TableSpecialReward},
    props: {
      items: {
        type: Object,
        main: { type: Array, default: []},
        special: { type: Array, default: []},
        first_come: { type: Array, default: []},
        append: { type: Array, default: []},
      }
    },
    data() {
      return {
        rewardType: 'main',
        rewardTypes: [
          {value: 'main', label: '基本報酬'},
          {value: 'special', label: '特別報酬'},
          {value: 'first-come', label: '先着報酬'},
          {value: 'increased', label: '増加報酬'},
        ],
        ranks: ['VIP','S VIP','SS VIP','QUEEN','KING'],
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