<template>
    <!-- Content Header (Page header) -->
    <section class="content-header pt-5">
        <div class="container-fluid">
            <div class="row sm-2">
                <div class="col-md-2"></div>
                <div class="col-sm-4">
                    <h1>Category List</h1>
                </div>
                <div class="col-sm-4">
                    <ol class="breadcrumb float-sm-right">
                        <button class="btn btn-primary">
                            <Link href="/category-create" style="color: white">Add category</Link>
                        </button>
                    </ol>
                </div>
                <div class="col-sm-2"></div>
            </div>
        </div>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">category</h3>
                        </div>
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Category Name</th>
                                    <th>Category Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="category in categories" :key="category.id">
                                    <td>{{ category.id }}</td>
                                    <td>{{category.category_name}}</td>
                                    <td>
                                        <img :src="category.image" style="height: 50px;width: 50px;"/>
                                    </td>
                                    <td>{{ category.status==1? 'Active' : 'Inactive'}}</td>
                                    <td>
                                        <Link class="btn btn-primary btn-sm mr-1" :href="`/category-edit/${category.id}`">Edit</Link>
                                        <Link class="btn btn-danger btn-sm" @click="destroy(`${category.id}`)">Delete</Link>
                                    </td>
                                </tr>
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
    </section>
</template>

<script>
import AdminLayout from "../../../AdminBase/AdminLayout.vue";
import {Link} from "@inertiajs/vue3";

export default {
    name: "Show",
    layout:AdminLayout,
    props:{
        categories:Object
    },
    methods:{
        destroy(id){
            if(confirm('Are you sure to delete?')){
                this.$inertia.post(`/category-delete/${id}`)
            }
        }
    },
    components: {
        Link
    },
}
</script>

<style scoped>

</style>
