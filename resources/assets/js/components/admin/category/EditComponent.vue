<template>
        <section class="content">
            <div class="container-fluid">
                <div class="row justify-content-around">
                    <!-- left column -->
                    <div class="col-md-6">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Add New Category</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" @submit.prevent="updateCategory()">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="categoryId">Update Category</label>
                                        <input type="text" 
                                        :class="{ 'is-invalid': form.errors.has('cat_name') }" 
                                        class="form-control " id="categoryId" 
                                        placeholder="Update Category" 
                                        v-model="form.cat_name" name="cat_name" 
                                        >
                                        <has-error :form="form" field="cat_name"></has-error>
                                    </div>
    
                                </div>
                                <!-- /.card-body -->
    
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
    
                    </div>
    
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
    </template>
    
    <script>
        export default {
            name: "EditComponent",
            mounted() {
                axios.get(`/edit-category/${this.$route.params.categoryId}`)
                    .then((response) => {
                        this.form.fill(response.data.category)
                    })
                    .catch((error) => {

                    })
            },
            data() {
                return {
                    form: new Form({
                        cat_name:''
                    })
                }
            },
            methods:{
                updateCategory(){
                    // console.log(this.form);
                    this.form.post(`/update-category/${this.$route.params.categoryId}`)
                        .then((response)=>{
                           this.$router.push('/category-list')
                            toast({
                                type: 'success',
                                title: 'Category updated successfully'
                            })
                        })
                        .catch((error)=>{
                            console.log(error);
                        })
                }
            }
        }
    </script>
    
    <style scoped>
    </style>