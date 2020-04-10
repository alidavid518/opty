<template>
  <v-container fluid>
    <v-dialog
      v-model="show"
      persistent
      width="500"
    >
      <v-card>
        <v-card-title
          class="headline text-center"
          primary-title
        >
          基本報酬追加
        </v-card-title>

        <v-card-text class="pb-0">
          <v-row>
            <v-col cols="3">RANK</v-col>
            <v-col>
              <v-select
                outlined dense hide-details
                :items="ranks" item-value="value" item-text="label"
                v-model="item.rank"/>
            </v-col>
          </v-row>
          <v-divider/>
          <v-row>
            <v-col cols="3">期間</v-col>
            <v-col cols="9" class="pa-0">
              <v-col cols="12">
                <v-menu
                  ref="menu_start_date"
                  v-model="menu_start_date"
                  :close-on-content-click="false"
                  :return-value.sync="item.startdate"
                  transition="scale-transition"
                  offset-y
                  min-width="290px"
                >
                  <template v-slot:activator="{ on }">
                    <v-text-field
                      v-model="item.startdate"
                      dense outlined hide-details readonly prepend-inner-icon="mdi-calendar"
                      class="_date-picker" v-on="on"/>
                  </template>
                  <v-date-picker v-model="item.startdate" no-title>
                    <v-spacer/>
                    <v-btn text color="primary" @click="menu_start_date = false">Cancel</v-btn>
                    <v-btn text color="primary" @click="$refs.menu_start_date.save(item.startdate)">OK</v-btn>
                  </v-date-picker>
                </v-menu>
                <v-menu
                  ref="menu_start_time"
                  v-model="menu_start_time"
                  :close-on-content-click="false"
                  :nudge-right="40"
                  :return-value.sync="item.starttime"
                  transition="scale-transition" offset-y
                  max-width="290px" min-width="290px"
                >
                  <template v-slot:activator="{ on }">
                    <v-text-field
                      v-model="item.starttime"
                      prepend-inner-icon="mdi-clock-outline"
                      readonly hide-details dense outlined
                      class="_time-picker"
                      v-on="on"
                    />
                  </template>
                  <v-time-picker
                    v-if="menu_start_time"
                    v-model="item.starttime"
                    format="24hr" full-width no-title
                  >
                    <v-spacer/>
                    <v-btn text color="primary" @click="menu_start_time = false">Cancel</v-btn>
                    <v-btn text color="primary" @click="$refs.menu_start_time.save(item.starttime)">OK</v-btn>
                  </v-time-picker>
                </v-menu>&nbsp;から
              </v-col>

              <v-col cols="12" class="pt-0">
                <v-menu
                  ref="menu_end_date"
                  v-model="menu_end_date"
                  :close-on-content-click="false"
                  :return-value.sync="item.enddate"
                  transition="scale-transition"
                  offset-y
                  min-width="290px"
                >
                  <template v-slot:activator="{ on }">
                    <v-text-field
                      v-model="item.enddate"
                      dense outlined hide-details readonly prepend-inner-icon="mdi-calendar"
                      class="_date-picker" v-on="on"/>
                  </template>
                  <v-date-picker v-model="item.enddate" no-title>
                    <v-spacer/>
                    <v-btn text color="primary" @click="menu_end_date = false">Cancel</v-btn>
                    <v-btn text color="primary" @click="$refs.menu_end_date.save(item.enddate)">OK</v-btn>
                  </v-date-picker>
                </v-menu>
                <v-menu
                  ref="menu_end_time"
                  v-model="menu_end_time"
                  :close-on-content-click="false"
                  :nudge-right="40"
                  :return-value.sync="item.endtime"
                  transition="scale-transition" offset-y
                  max-width="290px" min-width="290px"
                >
                  <template v-slot:activator="{ on }">
                    <v-text-field
                      v-model="item.endtime"
                      prepend-inner-icon="mdi-clock-outline"
                      readonly hide-details dense outlined
                      class="_time-picker"
                      v-on="on"
                    />
                  </template>
                  <v-time-picker
                    v-if="menu_end_time"
                    v-model="item.endtime"
                    format="24hr" full-width no-title
                  >
                    <v-spacer/>
                    <v-btn text color="primary" @click="menu_end_time = false">Cancel</v-btn>
                    <v-btn text color="primary" @click="$refs.menu_end_time.save(item.endtime)">OK</v-btn>
                  </v-time-picker>
                </v-menu>&nbsp;まで
              </v-col>
            </v-col>
          </v-row>
          <v-divider/>
          <v-row>
            <v-col cols="3">報酬金額</v-col>
            <v-col>
              <v-text-field outlined dense hide-details v-model="item.amount" class="d-inline-flex"/> 円
            </v-col>
          </v-row>
          <v-divider/>
          <v-row>
            <v-col cols="3">表示の有無</v-col>
            <v-col>
              <v-switch
                v-model="item.is_show"
                :true-value="1" :false-value="0"
                hide-details class="mt-0"/>
            </v-col>
          </v-row>
          <v-divider/>
        </v-card-text>

        <v-divider/>

        <v-card-actions class="d-flex justify-center">
          <v-btn @click="$emit('onNewReward', item)">キャンセル</v-btn>
          <v-btn dark color="pink darken-3"
            @click="$emit('onNewClose')"
          >
            登録
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </v-container>
</template>

<script>
  export default {
    props: {
      show: {type: Boolean, default: false},
    },
    data: vm => ({
      item: {
        id: 0,
        rank: 1,
        startdate: '',
        starttime: '',
        enddate: '',
        endtime: '',
        amount: '',
        is_show: 1,
      },
      ranks: [
        {label: 'VIP', value: 1},
        {label: 'S VIP', value: 2},
        {label: 'SS VIP', value: 3},
        {label: 'QUEEN', value: 4},
        {label: 'KING', value: 5},
      ],
      menu_start_date: false,
      menu_start_time: false,
      menu_end_date: false,
      menu_end_time: false,
    }),
  }
</script>

<style scoped>
  ._date-picker {
    width: 150px !important;
    display: inline-flex;
    margin-right: 10px;
  }
  ._time-picker {
    width: 100px;
    display: inline-flex;
    margin-right: 10px;
  }

</style>