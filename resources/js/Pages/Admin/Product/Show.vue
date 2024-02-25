<template>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>product List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <button class="btn btn-primary">
                            <Link href="/product-create" style="color: white">Add Product</Link>
                        </button>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Product</h3>
                        </div>
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Product Name</th>
                                    <th>Product Description</th>
                                    <th>Product Image</th>
                                    <th>Product Qty</th>
                                    <th>Unit Price</th>
                                    <th>Sale Price</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="product in products" :key="product.id">
                                    <td>{{ product.id }}</td>
                                    <td>{{product.name}}</td>
                                    <td>{{product.description}}</td>
                                    <td>
                                        <img :src="product.image" style="height: 50px;width: 50px;"/>
                                    </td>
                                    <td>{{product.qty}}</td>
                                    <td>{{product.price}}</td>
                                    <td>{{product.sale_price}}</td>
                                    <td>{{ product.status==1? 'Active' : 'Inactive'}}</td>
                                    <td>
                                        <Link class="btn btn-primary btn-sm mr-1" :href="`/product-edit/${product.id}`">Edit</Link>
                                        <Link class="btn btn-danger btn-sm" @click="destroy(`${product.id}`)">Delete</Link>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
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
        products:Object
    },
    methods:{
        destroy(id){
            if(confirm('Are you sure to delete?')){
                this.$inertia.post(`/product-delete/${id}`)
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
