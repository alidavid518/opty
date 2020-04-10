<template>
  <v-row justify="center">
    <v-dialog
      class="_bulk-edit-reward-dlg"
      v-model="show"
      max-width="600px"
    >
      <v-card>
        <v-card-title class="_title">一括編集</v-card-title>
        <v-divider/>
        <v-card-text class="_content pb-0">
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
            <v-col cols="9">
              <v-text-field
                dense outlined hide-details
                v-model="item.amount"
                class="d-inline-flex"
              /> 円
            </v-col>
          </v-row>
          <v-divider/>
          <v-row>
            <v-col cols="3">表示の有無</v-col>
            <v-col cols="9">
              <v-switch v-model="item.is_show" hide-details class="mt-0"/>
            </v-col>
          </v-row>
        </v-card-text>
        <v-divider/>
        <v-card-actions class="_action d-flex justify-center">
          <v-btn
            dark color="purple darken-1"
            @click="$emit('onEdited', item)"
          >
            登録
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </v-row>
</template>

<script>
  export default {
    props: {
      show: Boolean,
    },
    data: vm => ({
      item: {
        id: 0,
        startdate: new Date().toISOString().substr(0, 10),
        starttime: '',
        enddate: new Date().toISOString().substr(0, 10),
        endtime: '',
        is_show: 1,
      },
      menu_start_date: false,
      menu_start_time: false,
      menu_end_date: false,
      menu_end_time: false,
    }),
    methods: {
    }
  }
</script>

<style scoped lang="scss">
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