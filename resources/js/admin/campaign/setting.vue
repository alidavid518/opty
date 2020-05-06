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
              <MailLineIntroduction :mail-introductions="mailIntroductions" :line-introductions="lineIntroductions"/>
            </v-tab-item>
            <v-tab-item value="period-set">
              <PeriodSetting @onPeriodSave="savePeriod"/>
            </v-tab-item>
            <v-tab-item value="reward-set">
              <RewardSetting :items="rewards"/>
            </v-tab-item>
            <v-tab-item value="line-rich-img">
              <LineRichImages :items="line_rich_items"/>
            </v-tab-item>
            <v-tab-item value="rank-except">
              <RankExcept :items="except_items"/>
            </v-tab-item>
            <v-tab-item value="lead-extend">
              <LeadExtend :vleads="lead_items" :vextends="extend_items"/>
            </v-tab-item>
            <v-tab-item value="lp-reward">
              <LpReward :items="lp_rewards"/>
            </v-tab-item>
            <v-tab-item value="line-register">
              <LineRegister/>
            </v-tab-item>
            <v-tab-item value="ip-except">
              <ContractIpExcept :items="ip_excepts"/>
            </v-tab-item>
            <v-tab-item value="rank-summary">
              <RankingSummary :items="ranking_summary_items"/>
            </v-tab-item>
            <v-tab-item value="prize-setting">
              <PrizeSetting/>
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
  import SettingStory from "../../components/admin/campaign/setting-story/SettingStory";
  import LpRegister from "../../components/admin/campaign/lp-register/LpRegister";
  import MailLineIntroduction from "../../components/admin/campaign/mail-line-introduction/MailLineIntroduction";
  import PeriodSetting from "../../components/admin/campaign/setting-period/PeriodSetting";
  import RewardSetting from "../../components/admin/campaign/setting-reward/RewardSetting";
  import LineRichImages from "../../components/admin/campaign/line-rich-image/LineRichImages";
  import RankExcept from "../../components/admin/campaign/rank-except/RankExcept";
  import LeadExtend from "../../components/admin/campaign/lead-extend/LeadExtend";
  import LpReward from "../../components/admin/campaign/lp-reward/LpReward";
  import LineRegister from "../../components/admin/campaign/line-register/LineRegister";
  import ContractIpExcept from "../../components/admin/campaign/contract-ip-except/ContractIpExcept";
  import RankingSummary from "../../components/admin/campaign/ranking-summary/RankingSummary";
  import PrizeSetting from "../../components/admin/campaign/prize-setting/PrizeSetting";

  export default {
    components: {
      PrizeSetting, RankingSummary, ContractIpExcept, LpReward, LineRegister, RankExcept, LineRichImages,
      RewardSetting, MailLineIntroduction, SettingStory, LpRegister, PeriodSetting, LeadExtend
    },
    data() {
      return {
        tab: '',
        campaignSettingItems: [
          {text: 'ストーリー', target: 'story'},
          {text: 'LP登録', target: 'lp-reg'},
          {text: '期間設定', target: 'period-set'},
          {text: 'LINE用リッチ画像', target: 'line-rich-img'},
          {text: 'メール/LINE紹介文', target: 'mail-line-intro'},
          {text: 'LINE連携', target: 'line-register'},
        ],
        transferSettingItems: [
          {text: '報酬額設定', target: 'reward-set'},
          {text: 'LP別報酬', target: 'lp-reward'},
          {text: '先行 / 延長設定', target: 'lead-extend'},
          {text: '限定設定', target: ''},
          {text: '賞品登録', target: 'prize-setting'},
        ],
        otherSettingItems: [
          {text: 'ランキング対象外者', target: 'rank-except'},
          {text: '成約除外IP設定', target: 'ip-except'},
          {text: 'コンバージョン', target: ''},
          {text: 'ランキング集計', target: 'rank-summary'},
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
        },
        line_rich_items: [
          {id: 1, title: 'LP1', url: 'url1',
            images: [
              {id: 1, url: '/img/sample/buzz-andersen.png'},
              {id: 2, url: '/img/sample/buzz-andersen.png'},
              {id: 3, url: '/img/sample/buzz-andersen.png'},
            ]
          },
          {id: 2, title: 'LP2', url: 'url2',
            images: [
              {id: 4, url: '/img/sample/daniel-monteiro.png'},
              {id: 5, url: '/img/sample/daniel-monteiro.png'},
              {id: 6, url: '/img/sample/daniel-monteiro.png'},
            ]
          },
          {id: 3, title: 'LP3', url: 'url3',
            images: [
              {id: 7, url: '/img/sample/icons8-team.png'},
              {id: 8, url: '/img/sample/icons8-team.png'},
              {id: 9, url: '/img/sample/icons8-team.png'},
            ]
          },
        ],
        mailIntroductions: [
          {id: 1, url: 'url1', title: 'LP1', mails: [{id:1, title: 'title1', content:'content1'}, {id:2,title:'title2',content:'content2'}]},
          {id: 2, url: 'url2', title: 'LP2', mails: [{id:1, title: 'title1', content:'content1'}, {id:2,title:'title2',content:'content2'}]},
          {id: 3, url: 'url3', title: 'LP3', mails: [{id:1, title: 'title1', content:'content1'}, {id:2,title:'title2',content:'content2'}]},
        ],
        lineIntroductions: [
          {id: 1, url: 'url1', title: 'LP1', lines: [{id:1, title: 'title1', content:'content1'}, {id:2,title:'title2',content:'content2'}]},
          {id: 2, url: 'url2', title: 'LP2', lines: [{id:1, title: 'title1', content:'content1'}, {id:2,title:'title2',content:'content2'}]},
          {id: 3, url: 'url3', title: 'LP3', lines: [{id:1, title: 'title1', content:'content1'}, {id:2,title:'title2',content:'content2'}]},
        ],
        except_items: [
          {id: 1, name: 'aff1', rank: 1},
          {id: 2, name: 'aff2', rank: 2},
          {id: 3, name: 'aff3', rank: 3},
          {id: 4, name: 'aff4', rank: 4},
        ],
        lead_items: [
          {id: 1, affiliate: 'aff1', rank: 1, special_reward: 1000, start_date: '2019-04-09', start_time: '10:11', end_date: '2019-05-01', end_time: '11:11'},
          {id: 2, affiliate: 'aff2', rank: 2, special_reward: 1000, start_date: '2019-04-09', start_time: '10:11', end_date: '2019-05-01', end_time: '11:11'},
          {id: 3, affiliate: 'aff3', rank: 3, special_reward: 1000, start_date: '2019-04-09', start_time: '10:11', end_date: '2019-05-01', end_time: '11:11'},
        ],
        extend_items: [
          {id: 1, affiliate: 'aff1', rank: 4, special_reward: 1000, start_date: '2019-04-09', start_time: '10:11', end_date: '2019-05-01', end_time: '11:11'},
          {id: 2, affiliate: 'aff2', rank: 5, special_reward: 1000, start_date: '2019-04-09', start_time: '10:11', end_date: '2019-05-01', end_time: '11:11'},
          {id: 3, affiliate: 'aff3', rank: 3, special_reward: 1000, start_date: '2019-04-09', start_time: '10:11', end_date: '2019-05-01', end_time: '11:11'},
        ],
        lp_rewards: [
          {id: 1, title: 'title1', url: 'url1', is_public: 1,
            rewards: [
              {id: 1, rank: 1, reward: 1000, start_date: '2020/01/05', start_time: '00:00', end_date: '2020/01/12', end_time: '12:00'},
              {id: 2, rank: 3, reward: 3000, start_date: '2020/01/05', start_time: '00:00', end_date: '2020/01/12', end_time: '12:00'},
            ]
          },
          {id: 2, title: 'title2', url: 'url2', is_public: 1,
            rewards: [
              {id: 1, rank: 2, reward: 2000, start_date: '2020/01/05', start_time: '00:00', end_date: '2020/01/12', end_time: '12:00'},
              {id: 2, rank: 4, reward: 3000, start_date: '2020/01/05', start_time: '00:00', end_date: '2020/01/12', end_time: '12:00'},
            ]
          },
          {id: 3, title: 'title3', url: 'url3', is_public: 0, rewards: []},
        ],
        ip_excepts: [
          {id: 1, lp_id: 1, ip: '111.111.111.111'},
          {id: 2, lp_id: 1, ip: '222.111.111.111'},
          {id: 3, lp_id: 1, ip: '333.111.111.111'},
        ],
        ranking_summary_items: [
          {affiliate: 'aaa', rank: 1, contract_number: 10, reward: 3000, ranking: 1},
          {affiliate: 'bbb', rank: 2, contract_number: 9, reward: 2000, ranking: 2},
          {affiliate: 'ccc', rank: 3, contract_number: 8, reward: 1000, ranking: 3},
        ]
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
      savePeriod(val) { console.log(val) }
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