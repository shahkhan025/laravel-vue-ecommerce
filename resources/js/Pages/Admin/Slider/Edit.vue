<template>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Slider Edit</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Slider Edit</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Slider Edit</h3>
                        </div>
                        <form @submit.prevent="update" accept="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" class="form-control" v-model="form.title" placeholder="Enter Title">

                                </div>

                                <div class="form-group">
                                    <label for="sliderTitle">Description</label>
                                    <textarea class="form-control" v-model="form.description" rows="10" cols="40"></textarea>
                                </div>

                                <div class="form-group">
                                    <label>Position</label>
                                    <input type="number" class="form-control" v-model="form.position" placeholder="Enter Position">
                                </div>
                                <div class="form-group">
                                    <label>File input</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" accept="image/" @input="form.image = $event.target.files[0]" class="custom-file-input">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="sliderTitle">Button Name</label>
                                    <input type="text" class="form-control" v-model="form.btn_name" id="exampleInputPassword1" placeholder="Button Name">
                                </div>

                                <div class="form-group">
                                    <label for="sliderTitle">Button link</label>
                                    <input type="text" class="form-control" v-model="form.btn_link" id="exampleInputPassword1" placeholder="btn link">
                                </div>

<!--                                <div class="form-group">-->
<!--                                    <label for="sliderTitle">Status</label>-->
<!--                                    <select class="form-control" v-model="form.status">-->
<!--                                        <option value="1">Active</option>-->
<!--                                        <option value="0">Block</option>-->
<!--                                    </select>-->
<!--                                </div>-->

<!--                                <div class="form-group">-->
<!--                                    <label>Details</label>-->
<!--                                    <textarea type="text" class="form-control" v-model="form.details" placeholder="Enter Details"></textarea>-->
<!--                                </div>-->

                                <div class="form-group">
                                    <label for="exampleSelectRounded0">Status</label>
                                    <select v-model="form.status" class="custom-select rounded-0" id="exampleSelectRounded0">
                                        <option :value="1" :selected="form.status === 1">Active</option>
                                        <option :value="0" :selected="form.status === 0">Inactive</option>
                                    </select>
                                </div>

                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
<script>
import AdminLayout from "../../../AdminBase/AdminLayout.vue";

export default {
    name: "Edit",
    layout: AdminLayout,
    props: {
        error: Object,
        slider: Object
    },


    data() {
        return {
            form: this.$inertia.form({
                title: this.slider.title ?? '',
                description: this.slider.description ?? '',
                position: this.slider.position ?? 0,
                btn_name: this.slider.btn_name ?? 0,
                //details: this.slider.details ?? 0,
                image: null,
                btn_link: this.slider.btn_link ?? 0,
                status: this.slider.status ?? 0,
            })

        }
    },

    methods:{
        update() {
            this.form.post(`/slider-update/${this.slider.id}`)
        }
    }
}
</script>

<style scoped>

</style>
