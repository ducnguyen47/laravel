<template>
    <div class="block">
        <div class="block-title">
            <h2>Image</h2>
        </div>
        <div class="image-box">
            <div @click="chooseImage()">
                <img v-if="imgPath" :src="imgPath">
                <i v-else class="fa fa-picture-o" aria-hidden="true"></i>
                 <input type="hidden" :name="inputName" :value="imgPath">
            </div>
            <button @click="removeImg()" v-if="imgPath" class="btn btn-default remove-img" type="button">
                <i class="fa fa-times" aria-hidden="true"></i> Xóa
            </button>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['inputName', 'data', 'lable'],
        data() {
            return {
                imgPath: '',
            }
        },
        mounted() {
            if (this.data) {
                this.imgPath = this.data;
            }
            if (this.lable == '') {
                this.lable = 'Image';
            }
        },
        methods: {
            chooseImage() {
                moxman.browse({
                    oninsert: args => {
                        this.imgPath = args.files[0].path;
                        args.preventDefault(); 
                    }
                });
            },
            removeImg() {
                this.imgPath = '';
            }
        }
    }
</script>

<style scoped>
    .image-box {
        margin: 5px;
        border: 2px dashed #EEE;
        cursor: pointer;
        position: relative;
        padding-top: 75%;
    }
    .image-box i.fa-picture-o {
        font-size: 30px;
    }
    .image-box i.fa-picture-o, .image-box img, .image-box .remove-img {
        position: absolute;
        max-width: 100%;
        max-height: 100%;
        width: auto;
        height: auto;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .image-box .remove-img {
        z-index: 999;
        top: 70%;
        padding: 5px 20px;
        text-align: center;
        border-radius: 0;
    }
</style>