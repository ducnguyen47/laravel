<template>
    <div class="block">
        <div class="block-title">
            <h2 v-text="lable"></h2>
        </div>
        <div v-if="imgContent" v-for="(item,index) in imgContent" class="image-box">
            <div>
                <img v-if="item" :src="item.path">
                <i v-else class="fa fa-picture-o" aria-hidden="true"></i>
            </div>
            <div class="btn-action" v-if="item">
                <!-- <button @click="editItem(index)" class="btn btn-danger" type="button">
                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                </button> -->
                <button @click="removeImg(index)" class="btn btn-default" type="button">
                    <i class="fa fa-times" aria-hidden="true"></i> Xóa
                </button>
            </div>
        </div>
        <input v-if="imgContent" v-for="(item,index) in imgContent" type="hidden" :name="`${inputName}[${index}][path]`" :value="item.path">
        <div class="image-box">
            <div @click="chooseImage()">
                <i class="fa fa-picture-o" aria-hidden="true"></i>
            </div>
        </div>

        <!-- Large modal -->
        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Nội dung</h4>
              </div>
              <div class="modal-body">
                <div class="row">
                      <div class="col-md-12">
                          <div class="form-group">
                              <div class="form-group">
                                <label for="name">Tên</label>
                                <input type="text" v-model="name" id="name" name="name" class="form-control" placeholder="">
                            </div>
                          </div>
                      </div>
                      <div class="col-md-12">
                          <div class="form-group">
                              <div class="form-group">
                                <label for="url">Liên kết</label>
                                <input type="text" v-model="url" id="url" name="url" class="form-control" placeholder="">
                            </div>
                          </div>
                      </div>
                      <div class="col-md-12">
                          <div class="form-group">
                              <div class="form-group">
                                <label for="content">Nội dung</label>
                                <textarea rows="6" v-model="content" type="text" id="content" name="content" class="form-control" placeholder=""></textarea>
                            </div>
                          </div>
                      </div>
                </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
              </div>
            </div>
          </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['inputName', 'data', 'lable'],
        data() {
            return {
                imgContent: [],
            }
        },
        mounted() {
            if (this.data.length > 0) {
                this.imgContent = JSON.parse(this.data);
            }
            if (this.lable === '') {
                this.lable = 'Image';
            }
        },
        methods: {
            chooseImage() {
                moxman.browse({
                    oninsert: args => {
                        args.files.forEach((value) => {
                            this.imgContent.push(value);
                        });
                    }
                });
            },
            removeImg(index) {
                this.imgContent.splice(index,1);
            },

            editItem(index) {
                console.log(this.imgContent);
               $('.modal').modal('show');
               this.imgContent[index]['url'] = this.url;
            }
        }
    }
</script>

<style scoped>
    .image-box {
        width: 25%;
        margin: 5px;
        border: 2px dashed #EEE;
        cursor: pointer;
        position: relative;
        padding-top: 25%;
        display: inline-block;
    }
    .image-box i.fa-picture-o {
        font-size: 30px;
    }
    .image-box i.fa-picture-o, .image-box img, .btn-action {
        position: absolute;
        max-width: 100%;
        max-height: 100%;
        width: auto;
        height: auto;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .btn-action {
        z-index: 999;
        top: 70%;
        text-align: center;
        border-radius: 0;
        width: 100%;
    }
    .btn-action .btn {
        border-radius: 0;
    }
</style>