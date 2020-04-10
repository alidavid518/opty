<template>
  <div class="page_wrap_vue pa-3">
    <v-container class="_head">
      <v-row>
        <v-col>
          <v-card class="mx-auto">
            <v-row class="campaign-page_header_title">
              <v-col cols="12" class="justify-center d-flex">
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
    </v-container>
    <v-container class="_body">
      <v-row>
        <v-col>
          <v-tabs-items v-model="tab">
            <v-tab-item value="story">
              <SettingStory :items="story"/>
            </v-tab-item>
            <v-tab-item value="lp-reg">
              <LpRegister :items="Lps"/>
            </v-tab-item>
            <v-tab-item value="mail-line-intro">
              <MailLineIntroduction/>
            </v-tab-item>
            <v-tab-item value="period-set">
              <PeriodSetting/>
            </v-tab-item>
            <v-tab-item value="reward-set">
              <RewardSetting :items="rewards"/>
            </v-tab-item>
            <v-tab-item value="line-rich-img">
              <LineRichImages/>
            </v-tab-item>
          </v-tabs-items>
        </v-col>
      </v-row>

      <v-row>
        <v-col cols="4" class="pr-0">
          <v-card>
            <v-card-title>
              <h4>キャンペーン編集</h4>
            </v-card-title>
            <v-card-text>
              <v-list>
                <v-list-item-group v-model="tab">
                  <v-list-item
                    v-for="(item, i) in campaignSettingItems"
                    :key="i" :value="item.target"
                  >
                    <v-list-item-content v-html="item.text"/>
                  </v-list-item>
                </v-list-item-group>
              </v-list>
            </v-card-text>
          </v-card>
        </v-col>
        <v-col cols="4" class="">
          <v-card class="align-self-start">
            <v-card-title>
              <h4>報酬設定</h4>
            </v-card-title>
            <v-card-text>
              <v-list>
                <v-list-item-group v-model="tab">
                  <v-list-item
                    v-for="(item, i) in transferSettingItems"
                    :key="i" :value="item.target"
                  >
                    <v-list-item-content v-text="item.text"/>
                  </v-list-item>
                </v-list-item-group>
              </v-list>
            </v-card-text>
          </v-card>
        </v-col>
        <v-col cols="4" class="pl-0">
          <v-card class="align-self-start">
            <v-card-title>
              <h4>その他</h4>
            </v-card-title>
            <v-card-text>
              <v-list>
                <v-list-item-group v-model="tab">
                  <v-list-item
                    v-for="(item, i) in otherSettingItems"
                    :key="i" :value="item.target"
                  >
                    <v-list-item-content v-text="item.text"/>
                  </v-list-item>
                </v-list-item-group>
              </v-list>
            </v-card-text>
          </v-card>
        </v-col>
      </v-row>
    </v-container>
  </div>
</template>

<script>
  import SettingStory from "../../components/campaign/setting-story/SettingStory";
  import LpRegister from "../../components/campaign/lp-register/LpRegister";
  import MailLineIntroduction from "../../components/campaign/mail-line-introduction/MailLineIntroduction";
  import PeriodSetting from "../../components/campaign/setting-period/PeriodSetting";
  import RewardSetting from "../../components/campaign/setting-reward/RewardSetting";
  import LineRichImages from "../../components/campaign/line-rich-image/LineRichImages";

  export default {
    components: {LineRichImages, RewardSetting, MailLineIntroduction, SettingStory, LpRegister, PeriodSetting},
    data() {
      return {
        tab: '',
        campaignSettingItems: [
          {text: 'ストーリー', target: 'story'},
          {text: 'LP登録', target: 'lp-reg'},
          {text: '期間設定', target: 'period-set'},
          {text: 'LINE用リッチ画像', target: 'line-rich-img'},
          {text: 'メール/LINE紹介文', target: 'mail-line-intro'},
          {text: 'LINE連携', target: 'line-link'},
        ],
        transferSettingItems: [
          {text: '報酬額設定', target: 'reward-set'},
          {text: 'LP別報酬', target: 'lp-reward'},
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
        campaign: {
          id: 1,
          name: 'campaign',
          image: '/img/sample/buzz-andersen.png'
        },
        story: [
          {id: 1, link: 'test.com', },
          {id: 2, link: 'test.com', },
          {id: 3, link: 'test.com', },
        ],
        Lps: [
          {id: 1, url: 'uuu', banner: 'bbb', is_public: 1, redirect_pc: 'pc', redirect_mobile: 'mm', show_type: 'banner'},
          {id: 2, url: 'rrr', banner: 'aaa', is_public: 0, redirect_pc: 'pc', redirect_mobile: 'ooo', show_type: 'private'},
          {id: 3, url: 'lll', banner: 'nnn', is_public: 1, redirect_pc: 'pc', redirect_mobile: 'bbb', show_type: 'title'},
        ],
        rewards: {
          main: [
            {id: 1, rank: 1, amount: 1000, is_show: 1, start: '2019/02/07  12:00', end: '2019/02/08 00:00'},
            {id: 2, rank: 2, amount: 1000, is_show: 0, start: '2019/02/07  12:00', end: '2019/02/08 00:00'},
            {id: 3, rank: 3, amount: 1000, is_show: 0, start: '2019/02/07  12:00', end: '2019/02/08 00:00'},
            {id: 4, rank: 4, amount: 1000, is_show: 1, start: '2019/02/07  12:00', end: '2019/02/08 00:00'},
          ],
          special: [
            {id: 1, rank: 1, amount: 1000, is_show: 1, affiliate: 'aaa', checked: false, start: '2019/02/07  12:00', end: '2019/02/08 00:00'},
            {id: 2, rank: 2, amount: 1000, is_show: 0, affiliate: 'bbb', checked: false, start: '2019/02/07  12:00', end: '2019/02/08 00:00'},
            {id: 3, rank: 3, amount: 1000, is_show: 0, affiliate: 'ccc', checked: false, start: '2019/02/07  12:00', end: '2019/02/08 00:00'},
            {id: 4, rank: 4, amount: 1000, is_show: 1, affiliate: 'ddd', checked: false, start: '2019/02/07  12:00', end: '2019/02/08 00:00'},
          ],
          first_come: [],
          append: []
        }
      }
    },
    mounted() {
    },
    computed: {
      editStory: () => (this.tab === 'story'),
      editLpReg: () => (this.tab === 'lp-reg'),
      editLineRichImg: () => (this.tab === 'line-rich-img'),
      editMailLineIntro: () => (this.tab === 'mail-line-intro'),
      editPeriod: () => (this.tab === 'period-set'),
      editSettingReward: () => (this.tab === 'reward-set'),
    },
    methods: {
      selectCampaign() {},
    },
    watch: {
      tab: (val, old) => {console.log(val)}
    }
  }
</script>

<style scoped>
  .v-list-item {
    margin: 5px !important;
    box-shadow: 1px 2px 3px #bbb;
  }
</style>