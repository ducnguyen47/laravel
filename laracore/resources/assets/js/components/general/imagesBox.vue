<template>
    <div class="block">
        <div class="block-title">
            <h2 v-text="lable"></h2>
        </div>
        <div v-if="imgsPath" v-for="(item,index) in imgsPath" class="image-box">
            <div>
                <img v-if="item" :src="item.path">
                <i v-else class="fa fa-picture-o" aria-hidden="true"></i>
            </div>
            <button @click="removeImg(index)" v-if="item" class="btn btn-default remove-img" type="button">
                <i class="fa fa-times" aria-hidden="true"></i> Xóa
            </button>
        </div>
        <input v-if="imgsPath" v-for="(item,index) in imgsPath" type="hidden" :name="`${inputName}[${index}][path]`" :value="item.path">
        <div class="image-box">
            <div @click="chooseImage()">
                <i class="fa fa-picture-o" aria-hidden="true"></i>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['inputName', 'data', 'lable'],
        data() {
            return {
                imgsPath: [],
            }
        },
        mounted() {
            if (this.data.length > 0) {
                this.imgsPath = JSON.parse(this.data);
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
                            this.imgsPath.push(value);
                            console.log(this.imgsPath);
                        });
                    }
                });
            },
            removeImg(index) {
                this.imgsPath.splice(index,1);
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