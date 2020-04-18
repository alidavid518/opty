<template>
  <v-card class="contract-ip-except">
    <v-container fluid>
      <v-card-title>
        <v-row>
          <v-col cols="12">
            <h3>成約除外IP設定</h3>
          </v-col>
        </v-row>
      </v-card-title>
      <v-divider/>
      <v-card-text>
        <v-row>
          <v-col class="d-flex justify-center">
            <v-text-field
              v-model="ip"
              outlined dense hide-details
              class="_ip mr-2"
              placeholder="IPアドレスを入力してください、"
            />
            <v-btn
              dark color="primary"
              @click="addIp"
            >
              登録
            </v-btn>
          </v-col>
        </v-row>
        <v-divider/>
        <v-row class="_ip-container">
          <IpItem v-for="(ip, i) in items" :key="i" :item="ip"
                  @onDelete="showDelete"
          />
        </v-row>
      </v-card-text>
    </v-container>

    <delete-dlg :show="show_delete" :item="selected" @onDeleteClose="show_delete = false" @onDeleteIP="deleteIp"/>
  </v-card>
</template>

<script>
  import DeleteDlg from "./DeleteDlg";
  import IpItem from "./IpItem";
  export default {
    components: {IpItem, DeleteDlg},
    props: {
      items: {
        type: Array,
        default: () => []
      }
    },
    data: vm => ({
      show_delete: false,
      lp_id: '000',
      ip: '',
      selected: {id: 0, lp_id: 0, ip: ''}
    }),
    methods: {
      addIp() {
        this.items.push({
          id: this.items.length + 1,
          lp_id: this.lp_id,
          ip: this.ip
        })
      },
      showDelete(item) {
        this.selected = item
        this.show_delete = true
      },
      deleteIp(item) {
        console.log(item)
        const ind = this.items.findIndex(it => it.id === item.id)
        if(ind > -1) this.items.splice(ind, 1)
        this.show_delete = false
      }
    }
  }
</script>

<style scoped>
  ._ip {
    width: 200px;
    flex: none;
  }
</style>