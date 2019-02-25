<template>
        <!-- Main content -->
        <section class="content">
           
            <div class="row justify-content-around">
              <div class="col-11">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Post List</h3>
                        <div class="card-tools">
                            <router-link to="/add-post" class="btn btn-primary" >Add Post</router-link>
                        </div>
                    </div>
                    
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover">
                      <thead>
                      <tr>
                        <th>SI</th>
                        <th>User</th>
                        <th>Category</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Photo</th>
                        <th>Actions</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr v-for="(post, index) in getAllPost">
                        <td>{{ index+1 }}</td>
                        <td>{{ post.user_id }}
                        <td>{{post.cat_id}}</td>
                        <td>{{post.title}}</td>
                        <td>{{post.description}}</td>
                        <td><img :src="post.photo" width="100px" height="100px"/></td>
                        <td>
                            
                            <!-- <router-link :to="`/edit-category/${category.id}`">Edit</router-link>
                            <a href="" @click.prevent = "deleteCategory(category.id)">Delete</a> -->
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
            name: "ListComponent",
            computed: {
                getAllPost() {
                    return this.$store.getters.getPost
                }
            },
            mounted() {
                this.$store.dispatch('allPosts');
            }
        }
    </script>
    