<template>
    <v-card class="_line-rich-image-item">
      <v-card-title>
        <v-row>
          <v-col cols="6">
            <h3 class="_title">{{item.title}}</h3>
            <small class="_url">{{item.url}}</small>
          </v-col>
          <v-col cols="6" class="d-flex justify-end">
            <v-file-input
              accept="image/*"
              v-model="new_image"
              @change="addImage"
              class="d-none"
              ref="myImage"
              prepend-icon="mdi-camera"
            />
            <v-btn
              dark color="primary"
              @click="save"
            >
              登録
            </v-btn>
          </v-col>
        </v-row>
      </v-card-title>
      <v-card-text class="_content">
        <line-rich-image v-for="(image, i) in item.images" :key="i" :item="image" @onDeleteImage="deleteImage"/>
      </v-card-text>
      <scale-loader color="orange darken--1" loading="loading" height="70" width="7"/>

    </v-card>
</template>

<script>
  import vuetifyToast from 'vuetify-toast'
  import LineRichImage from "./LineRichImage";

  export default {
    components: {LineRichImage},
    props: {
      item: {
        type: Object,
        id: { type: Number, default: 0},
        title: {type: String, default: ''},
        url: {type: String, default: ''},
        images: {type: Array, default: []}
      }
    },
    data: () => ({
      loading: false,
      new_image: null,
    }),
    methods: {
      deleteImage(img) {
        const id = this.item.images.findIndex(v => v.id === img.id)
        if(id === -1) return
        this.item.images.splice(id, 1)
      },
      addImage() {
        let formData = new FormData()

        console.log(this.new_image)
        if(this.new_image){
          formData.append("image", this.new_image, this.new_image.name)

          console.log(formData.getAll("image"))
          this.loading = true
          axios.post('', formData)
            .then( response => {
              console.log({response})
              // data : {id, url}
              this.item.images.push(response.data)
            })
            .catch(error => {
              console.log({error})
              vuetifyToast.error('画像をアップロードできません。')
            })
            .then(() => {
              this.loading = false
            })
        }
      },
      save() {
        this.loading = true
        axios.post('')
        .then(res => {
          this.item.images = res.data
          this.$emit('onSave', item)
        })
        .catch(err => {
          vuetifyToast.error('画像を保存できません。')
        })
        .then(() => {
          this.loading = false
        })
      }
    }
  }
</script>

<style scoped lang="scss">
  ._line-rich-image-item {
    /*height: 300px !important;*/
    ._title {
      font-size: 1.2rem !important;
    }
    ._url {
      font-size: 0.8rem !important;
    }
    ._content {
      /*width: 100% !important;*/
      overflow-x: scroll;
      display: flex;
    }
  }
</style>