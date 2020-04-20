<template>
  <div class="page_wrap_vue pa-3 campaign-edit-page">
    <v-card class="mx-auto">
      <v-card-title class="_header">
        <v-btn
          text
          to="/admin/campaign"
          class="_btn_back"
        >
          <v-icon left>mdi-chevron-left</v-icon>
          もどる
        </v-btn>
        <h2 class="_header_title">
          キャンペーン新規登録
        </h2>
      </v-card-title>

      <v-card-text class="_contents">
        <v-container fluid>
          <v-row class="_block">
            <v-col cols="2" class="_label">
              <v-label>キャンペーン編集</v-label>
            </v-col>
            <v-col cols="10" class="_control">
              <v-text-field/>
            </v-col>
          </v-row>
          <v-row>
            <v-col cols="6">
              <v-row class="_block">
                <v-col cols="4" class="_label">
                  <v-label>出稿広告主</v-label>
                </v-col>
                <v-col cols="8" class="_control">
                  <v-select
                    placeholder="選択してください"
                    :items="['man1', 'man2', 'man3']"
                  />
                </v-col>
              </v-row>
              <v-row class="_block">
                <v-col cols="4" class="_label">
                  <v-label>アイキャッチ画像</v-label>
                </v-col>
                <v-col cols="8" class="_control">
                  <v-row>
                    <v-col>
                      <v-img class="_img_preview"/>
                    </v-col>
                  </v-row>
                  <v-row>
                    <v-col>
                      <v-file-input
                        label="ファイルを選択"
                        hint="横800px, 縦200pxの画像をアップロードしてください。"
                        persistent-hint
                      />
                    </v-col>
                  </v-row>
                </v-col>
              </v-row>
            </v-col>
            <v-col cols="6">
              <v-row class="_block">
                <v-col cols="4" class="_label">
                  <v-label>キャンペーン期間</v-label>
                </v-col>
                <v-col cols="8" class="_control">
                  <v-row>
                    <v-col class="py-0">
                      <v-text-field
                        v-mask="maskDate"
                        class="_date_start"
                        placeholder="YYYY/MM/DD"
                      />
                      &nbsp;
                      <v-text-field
                        v-mask="maskTime"
                        class="_time_start"
                        placeholder="00:00"
                      />
                      &nbsp;
                      <span>から</span>
                    </v-col>
                  </v-row>
                  <v-row>
                    <v-col class="py-0">
                      <v-text-field
                        v-mask="maskDate"
                        class="_date_end"
                        placeholder="YYYY/MM/DD"
                      />
                      &nbsp;
                      <v-text-field
                        v-mask="maskTime"
                        class="_time_end"
                        placeholder="00:00"
                      />
                      &nbsp;
                      <span>まで</span>
                      <p><small>期間が確定していない場合は未入力にしてください。
                      </small></p>
                    </v-col>
                  </v-row>
                </v-col>
              </v-row>
              <v-row class="_block">
                <v-col cols="4" class="_label">
                  <v-label>Youtube予告URL</v-label>
                </v-col>
                <v-col cols="8" class="_control">
                  <v-text-field />
                </v-col>
              </v-row>
            </v-col>
          </v-row>
          <v-row class="_block">
            <v-col cols="2" class="_label">
              <v-label>アフィリエイター向け PR文</v-label>
            </v-col>
            <v-col class="_control">
              <quill-editor
                class="quill-editor"
                ref="editor"
                v-model="content"
                :options="editorOption"
                @focus="toggleFocus($event)"
                @blur="toggleFocus($event, false)"
              />
              <input
                type="file"
                id="getFile"
                @change="uploadFunction($event)"
                hidden
              />
            </v-col>
            <v-col cols="4" class="_control">
              <v-label>記載注意事項</v-label>
              <v-textarea
                outlined
                rows="17"
              />
            </v-col>
          </v-row>
          <v-row class="_block">
            <v-col cols="2" class="_label">
              <v-label>リダイレクトURL</v-label>
            </v-col>
            <v-col cols="4" class="_control">
              <v-text-field/>
            </v-col>
            <v-col cols="2" class="_label">
              <v-label>オプトイン方式</v-label>
            </v-col>
            <v-col cols="4" class="_control">
              <v-text-field/>
            </v-col>
          </v-row>
          <v-row class="_block">
            <v-col cols="6" style="align-self: start">
              <v-row>
                <v-col cols="4" class="_label">
                  <v-label>常時掲載案件化</v-label>
                </v-col>
                <v-col cols="8" class="_control">
                  <v-btn-toggle
                    v-model="always"
                    color="primary"
                  >
                    <v-btn value="yes">
                      する
                    </v-btn>
                    <v-btn value="no">
                      しない
                    </v-btn>
                  </v-btn-toggle>
                </v-col>
              </v-row>
            </v-col>
            <v-col cols="6">
              <v-row>
                <v-col cols="4" class="_label">
                  <v-label>会社名表示設定</v-label>
                </v-col>
                <v-col cols="8" class="_control">
                  <v-btn-toggle
                    v-model="company"
                    mandatory
                    color="primary"
                    hint="&quote;はい&quote;を選択した場合、毎月月初のアフィリエイターランク自動昇格時の対象キャンペーンに入らなくなります。ご注意ください。`"
                    persistent-hint
                  >
                    <v-btn value="yes">
                      はい
                    </v-btn>
                    <v-btn value="no">
                      いいえ
                    </v-btn>
                  </v-btn-toggle>
                  <p class="_red">
                    <small>
                      "はい"を選択した場合、毎月月初のアフィリエイターランク自動昇格時の対象キャンペーンに入らなくなります。ご注意ください。
                    </small>
                  </p>
                </v-col>
              </v-row>
            </v-col>
          </v-row>
          <v-divider/>
          <h2 class="py-4 text-center">キャンペーン申請に関して</h2>
          <v-divider/>
          <v-row class="_block">
            <v-col cols="2" class="_label">
              <v-label>キャンペーン概要</v-label>
            </v-col>
            <v-col class="_control">
              <v-textarea
                outlined
                hint="キャンペーンの大まかな概要と、販売する商材の内容を入力してください。"
                persistent-hint
              />
            </v-col>
          </v-row>
          <v-row class="_block">
            <v-col cols="2" class="_label">
              <v-label>備考</v-label>
            </v-col>
            <v-col class="_control">
              <v-textarea
                outlined
              />
            </v-col>
          </v-row>
        </v-container>
      </v-card-text>

      <v-card-actions class="_action">
        <v-btn color="indigo">下書き</v-btn>
        <v-btn color="purple">登録</v-btn>
      </v-card-actions>
    </v-card>
  </div>
</template>

<script>
  import { mask } from 'vue-the-mask'
  import 'quill/dist/quill.core.css'
  import 'quill/dist/quill.snow.css'
  import 'quill/dist/quill.bubble.css'

  import { quillEditor } from 'vue-quill-editor'
  export default {
    components: {quillEditor},
    directives: {
      mask,
    },
    data(){
      const toolbarOptions = [
        ['bold', 'italic', 'underline', 'strike'], // toggled buttons
        ['blockquote', 'code-block'],
        [{ header: 1 }, { header: 2 }], // custom button values
        [{ list: 'ordered' }, { list: 'bullet' }],
        [{ script: 'sub' }, { script: 'super' }], // superscript/subscript
        // [{ indent: '-1' }, { indent: '+1' }], // outdent/indent
        // [{ direction: 'rtl' }], // text direction
        [{ size: ['small', false, 'large', 'huge'] }], // custom dropdown
        [{ header: [1, 2, 3, 4, 5, 6, false] }],
        [{ color: [] }, { background: [] }], // dropdown with defaults from theme
        [{ font: [] }],
        [{ align: [] }],
        ['image'],
        ['clean'] // remove formatting button
      ]
      return {
        editorOption: {
          modules: {
            toolbar: {
              container: toolbarOptions,
              handlers: {
                // image: function () {
                //   document.getElementById('getFile').click()
                // }
              }
            }
          }
        },
        content: '',
        maskDate: '####/##/##',
        maskTime: '##:##',
        always: 'no',
        company: 'no'
      }
    },
    methods: {
      toggleFocus(event, id, focused = true) {
        this.cursorLocation = event.getSelection() ? event.getSelection().index : 0
      },
      uploadFunction(e) {
        this.selectedFile = e.target.files[0]
        const form = new FormData()
        form.append('file', this.selectedFile)
        axios.post('/api/faq_img_upload', form, {
            headers: {
              'Content-Type': 'multipart/form-data'
            }
          })
          .then(res => {
            console.log(this.myQuillEditor)
            this.myQuillEditor.insertEmbed(this.cursorLocation, 'image', `${res.data.url}`)
          })
      },
    }
  }
</script>