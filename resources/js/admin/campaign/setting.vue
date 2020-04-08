<template>
  <div class="page_wrap_vue pa-3 campaign-page">
    <v-container fuild>
      <v-row>
        <v-col>
          <v-card class="mx-auto">
            <v-row class="campaign-page_header_title">
              <v-col cols="12">
                <h2>{{campaign.name}} / 設定</h2>
              </v-col>
              <v-col cols="12" class="d-flex justify-center">
                <v-btn
                  @click="selectCampaign"
                >
                  キャンペーン選択
                </v-btn>
              </v-col>
              <v-col cols="12" class="d-flex justify-center">
                <v-img
                  :src="campaign.image"
                  max-width="300"
                  max-height="300"
                />
              </v-col>
            </v-row>
          </v-card>
        </v-col>
      </v-row>

      <v-row>
        <SettingStory v-if="edittingStory" :items="story"/>

      </v-row>

      <v-row>
        <v-col cols="4" class="pr-0">
          <v-card>
            <v-card-title>
              <h3>キャンペーン編集</h3>
            </v-card-title>
            <v-card-text>
              <v-list>
                <v-list-item-group v-model="tab">
                  <v-list-item
                    v-for="(item, i) in campaignSettingItems"
                    :key="i"
                  >
                    <v-list-item-content>
                      <v-list-item-title
                        v-text="item.text"
                        @click="tab = item.target"
                      />
                    </v-list-item-content>
                  </v-list-item>
                </v-list-item-group>
              </v-list>
            </v-card-text>
          </v-card>
        </v-col>
        <v-col cols="4" class="">
          <v-card class="align-self-start">
            <v-card-title>
              <h3>報酬設定</h3>
            </v-card-title>
            <v-card-text>
              <v-list>
                <v-list-item-group v-model="model">
                  <v-list-item
                    v-for="(item, i) in transferSettingItems"
                    :key="i"
                  >
                    <v-list-item-content>
                      <v-list-item-title v-text="item.text"/>
                    </v-list-item-content>
                  </v-list-item>
                </v-list-item-group>
              </v-list>
            </v-card-text>
          </v-card>
        </v-col>
        <v-col cols="4" class="pl-0">
          <v-card class="align-self-start">
            <v-card-title>
              <h3>その他</h3>
            </v-card-title>
            <v-card-text>
              <v-list>
                <v-list-item-group v-model="model">
                  <v-list-item
                    v-for="(item, i) in otherSettingItems"
                    :key="i"
                  >
                    <v-list-item-content>
                      <v-list-item-title v-text="item.text"/>
                    </v-list-item-content>
                  </v-list-item>
                </v-list-item-group>
              </v-list>
            </v-card-text>
          </v-card>
        </v-col>
      </v-row>
    </v-container>

        <v-row class="campaign-page_header_toolbar">
          <v-col cols="12">
            <v-btn
              class="campaign-page_header_toolbar_button"
              @click="show_new_campaign_dlg = true"
            >
              新規作成
            </v-btn>
            <v-btn
              class="campaign-page_header_toolbar_button"
              @click="show_edit_campaign_dlg = true"
            >
              下書き
            </v-btn>
            <v-select
              class="campaign-page_header_toolbar_sort"
              :items="sort_orders"
              item-text="label"
              item-value="value"
              label="表示順"
            />
          </v-col>
        </v-row>
      </v-container>

      <v-container class="campaign-page_container" fluid>
        <v-row dense>
          <v-col
            v-for="card in cards"
            :key="card.id"
            cols="4"
          >
            <CampaignItem :item="card"/>
          </v-col>
        </v-row>
      </v-container>
    </v-card>
    <NewCampaignDialog :dialog="show_new_campaign_dlg"/>
    <EditCampaignDialog :dialog="show_edit_campaign_dlg"/>
  </div>
</template>

<script>
  import CampaignItem from "../../components/campaign/CampaignItem";
  import NewCampaignDialog from "../../components/campaign/NewCampaignDialog";
  import EditCampaignDialog from "../../components/campaign/EditCampaignDialog";
  import SettingStory from "../../components/campaign/setting-story/SettingStory";

  export default {
    components: {SettingStory, CampaignItem, NewCampaignDialog, EditCampaignDialog},
    data() {
      return {
        campaignSettingItems: [
          {text: 'ストーリー', target: ''},
          {text: 'LP登録', target: ''},
          {text: '期間設定', target: ''},
          {text: 'LINE用リッチ画像', target: ''},
          {text: 'メール/LINE紹介文', target: ''},
          {text: 'LINE連携', target: ''},
        ],
        transferSettingItems: [
          {text: '報酬額設定', target: ''},
          {text: 'LP別報酬', target: ''},
          {text: '先行 / 延長設定', target: ''},
          {text: '限定設定', target: ''},
          {text: '賞品登録', target: ''},
        ],
        otherSettingItems: [
          {text: 'ランキング対象外者', target: ''},
          {text: '成約除外IP設定', target: ''},
          {text: 'コンバージョン', target: ''},
          {text: 'ランキング集計', target: ''},
        ],
      }
    },
    mounted() {
    }
  }
</script>

<style scoped>
  .v-list-item {
    margin: 5px !important;
    box-shadow: 1px 2px 3px #bbb;
  }
</style>