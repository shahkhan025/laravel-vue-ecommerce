
<template>
    <!-- Main content -->
    <section class="content py-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3"></div>
                <!-- left column -->
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="card card-primary align-content-center">
                        <div class="card-header">
                            <h3 class="card-title">Add Slider</h3>
                        </div>
                        <!-- form start -->
                        <form @submit.prevent="submit" accept="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="sliderTitle">Title</label>
                                    <input type="text" class="form-control" v-model="form.title" id="exampleInputPassword1" placeholder="Title">
                                </div>

                                <div class="form-group">
                                    <label for="sliderTitle">Description</label>
                                    <textarea class="form-control" v-model="form.description" rows="10" cols="40"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Position</label>
                                    <input type="number" class="form-control" v-model="form.position" id="position_number" placeholder="Enter Position">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputFile">Image</label>
                                    <div class="input-group">
                                        <div class="custom-file">
<!--                                            <input type="file" class="custom-file-input" id="exampleInputFile">-->
                                            <input type="file" accept="image/" @input="form.image = $event.target.files[0]" class="custom-file-input">
                                            <label class="custom-file-label" for="exampleInputFile">Choose Image</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
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

                                <div class="form-group">
                                    <label for="sliderTitle">Status</label>
                                    <select class="form-control" v-model="form.status">
                                        <option value="1">Active</option>
                                        <option value="0">Block</option>
                                    </select>
                                </div>
<!--                                <div class="form-check">-->
<!--                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">-->
<!--                                    <label class="form-check-label" for="exampleCheck1">Check me out</label>-->
<!--                                </div>-->
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!--/.col (left) -->
                <div class="col-md-3"></div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</template>

<script>
import AdminLayout from "../../../AdminBase/AdminLayout.vue";
import {Link} from "@inertiajs/vue3";
export default {
    name: "Create",
    layout: AdminLayout,
    data(){
        return{
            form:this.$inertia.form({
                title:null,
                position:null,
                description:null,
                image:null,
                btn_name:null,
                btn_link:null,
                status:null,
            })
        }
    },
    methods:{
        submit(){
            this.form.post("/slider-store");
        }
    },
    components: {
        Link
    }

}
</script>

<style scoped>

</style>
