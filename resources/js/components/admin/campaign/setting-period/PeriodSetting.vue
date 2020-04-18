<template>
  <v-card class="_setting-period">
    <v-container fluid>
      <v-card-title>
        <h3 class="_title">期間設定</h3>
      </v-card-title>

      <v-card-text>
        <v-row>
          <v-col cols="6">
            <v-menu
              ref="menu_start_date"
              v-model="menu_start_date"
              :close-on-content-click="false"
              :return-value.sync="item.start_date"
              transition="scale-transition"
              offset-y
              min-width="290px"
            >
              <template v-slot:activator="{ on }">
                <v-text-field
                  v-model="item.start_date"
                  dense outlined hide-details readonly prepend-inner-icon="mdi-calendar"
                  class="_date-picker" v-on="on"/>
              </template>
              <v-date-picker v-model="item.start_date" no-title>
                <v-spacer/>
                <v-btn text color="primary" @click="menu_start_date = false">Cancel</v-btn>
                <v-btn text color="primary" @click="$refs.menu_start_date.save(item.start_date)">OK</v-btn>
              </v-date-picker>
            </v-menu>
            <v-menu
              ref="menu_start_time"
              v-model="menu_start_time"
              :close-on-content-click="false"
              :nudge-right="40"
              :return-value.sync="item.start_time"
              transition="scale-transition" offset-y
              max-width="290px" min-width="290px"
            >
              <template v-slot:activator="{ on }">
                <v-text-field
                  v-model="item.start_time"
                  prepend-inner-icon="mdi-clock-outline"
                  readonly hide-details dense outlined
                  class="_time-picker"
                  v-on="on"
                />
              </template>
              <v-time-picker
                v-if="menu_start_time"
                v-model="item.start_time"
                format="24hr" full-width no-title
              >
                <v-spacer/>
                <v-btn text color="primary" @click="menu_start_time = false">Cancel</v-btn>
                <v-btn text color="primary" @click="$refs.menu_start_time.save(item.start_time)">OK</v-btn>
              </v-time-picker>
            </v-menu>&nbsp;から
          </v-col>
          <v-col cols="6">
            <v-menu
              ref="menu_end_date"
              v-model="menu_end_date"
              :close-on-content-click="false"
              :return-value.sync="item.end_date"
              transition="scale-transition"
              offset-y
              min-width="290px"
            >
              <template v-slot:activator="{ on }">
                <v-text-field
                  v-model="item.end_date"
                  dense outlined hide-details readonly prepend-inner-icon="mdi-calendar"
                  class="_date-picker" v-on="on"/>
              </template>
              <v-date-picker v-model="item.end_date" no-title>
                <v-spacer/>
                <v-btn text color="primary" @click="menu_end_date = false">Cancel</v-btn>
                <v-btn text color="primary" @click="$refs.menu_end_date.save(item.end_date)">OK</v-btn>
              </v-date-picker>
            </v-menu>
            <v-menu
              ref="menu_end_time"
              v-model="menu_end_time"
              :close-on-content-click="false"
              :nudge-right="40"
              :return-value.sync="item.end_time"
              transition="scale-transition" offset-y
              max-width="290px" min-width="290px"
            >
              <template v-slot:activator="{ on }">
                <v-text-field
                  v-model="item.end_time"
                  prepend-inner-icon="mdi-clock-outline"
                  readonly hide-details dense outlined
                  class="_time-picker"
                  v-on="on"
                />
              </template>
              <v-time-picker
                v-if="menu_end_time"
                v-model="item.end_time"
                format="24hr" full-width no-title
              >
                <v-spacer/>
                <v-btn text color="primary" @click="menu_end_time = false">Cancel</v-btn>
                <v-btn text color="primary" @click="$refs.menu_end_time.save(item.end_time)">OK</v-btn>
              </v-time-picker>
            </v-menu>&nbsp;まで
          </v-col>
          <v-col cols="12" class="d-flex justify-center">
            <v-btn @click="savePeriod">保存する</v-btn>
          </v-col>
        </v-row>
      </v-card-text>
    </v-container>
  </v-card>
</template>

<script>
  export default {
    props: {
    },
    data() {
      return {
        menu_start_date: false,
        menu_start_time: false,
        menu_end_date: false,
        menu_end_time: false,
        item: {
          start_date: '',
          start_time: '',
          end_date: '',
          end_time: '',
        }
      }
    },
    methods: {
      savePeriod() {
        this.$emit('onPeriodSave', this.item)
      }
    }
  }
</script>

<style scoped>
._date-picker {
  display: inline-flex;
  margin-right: 10px;
}
  ._time-picker {
    display: inline-flex;
  }
</style>