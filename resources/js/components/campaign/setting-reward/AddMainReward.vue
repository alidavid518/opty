<template>
  <v-container fluid>
    <v-dialog
      v-model="dialog"
      width="500"
    >
      <v-card>
        <v-card-title
          class="headline text-center"
          primary-title
        >
          基本報酬追加
        </v-card-title>

        <v-card-text>
          <v-row>
            <v-col cols="4">RANK</v-col>
            <v-col>
              <v-text-field outlined dense/>
            </v-col>
          </v-row>
          <v-divider/>
          <v-row>
            <v-col cols="4">期間</v-col>
            <v-col>
              <p>
                <v-text-field outlined dense type="datetime-local"/> から
              </p>
              <p>
                <v-text-field outlined dense type="datetime-local"/> まで
              </p>
            </v-col>
          </v-row>
          <v-divider/>
          <v-row>
            <v-col cols="4">報酬金額</v-col>
            <v-col>
              <v-text-field outlined dense/> 円
            </v-col>
          </v-row>
          <v-divider/>
          <v-row>
            <v-col cols="4">表示の有無</v-col>
            <v-col>
              <v-switch/>
            </v-col>
          </v-row>
          <v-divider/>
        </v-card-text>

        <v-divider/>

        <v-card-actions class="d-flex justify-center">
          <v-btn
            color="pink darken-3"
            @click="dialog = false"
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
    name: "addMainReward"
  }
</script>

<style scoped>

</style>