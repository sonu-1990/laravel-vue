<template>
        <!-- Main content -->
        <section class="content">
           
            <div class="row justify-content-around">
              <div class="col-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Category List</h3>
                        <div class="card-tools">
                            <router-link to="/add-category" class="btn btn-primary" >Add Category</router-link>
                        </div>
                    </div>
                    
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover">
                      <thead>
                      <tr>
                        <th>SI</th>
                        <th>Category Name</th>
                        <th>Created At</th>
                        <th>Actions</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr v-for="(category, index) in getAllCategory" 
                      :key="category.id">
                        <td>{{index+1}}</td>
                        <td>{{ category.cat_name }}
                        <td>{{ category.created_at  | timeFormat }}
                        </td>
                        <td>
                            <!-- <router-link :to="{ name: 'EditCategory', 
                            params: { categoryId: category.id } }">Edit</router-link> -->
                                        <router-link :to="`/edit-category/${category.id}`">Edit</router-link>
                            <a href="" @click.prevent = "deleteCategory(category.id)">Delete</a>
                        </td>
                      </tr>
                      </tbody>
                    </table>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </section>
    
</template>
<script>
    export default {
        name:"ListComponent",
        computed: {
            getAllCategory() {
                return this.$store.getters.getCategory
            }
        },
        mounted() {
            this.$store.dispatch('allCategory')
        },
        methods: {
            deleteCategory(id)
            {
                axios.get('/category/'+id,)
                    .then(() => {
                        this.$store.dispatch('allCategory')
                        toast({
                                type: 'success',
                                title: 'Category Deleted successfully'
                        })
                    })
                    .catch(() => {

                    })
            }

        }
    }
</script>
<style scoped>
    .card-body {
        padding-top:20px;
    }
    .card-header {
        padding: 18px 7px;
    }
</style>