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
                        <td>{{ post.user.name }} </td>
                        <td>{{post.category.cat_name }}</td>
                        <td>{{post.title | shortLength(20, '---')}}</td>
                        <td>{{post.description | shortLength(40, '...')}}</td>
                        <td><img :src="ourImage(post.photo)" width="100px" height="100px"/></td>
                        <td>
                            <router-link :to="`/edit-post/${post.id}`" >Edit</router-link>
                            <a href="#" @click.prevent="deletePost(post.id)">Delete</a>
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
            mounted() {
                this.$store.dispatch('allPosts'); 
            },
            computed: {
                getAllPost() {
                    return this.$store.getters.getPost
                }
            },
            created(){
                axios.get(`/edit-post/${this.$route.params.postId}`)
                .then((response)=>{
                    //console.log(response.data)
                    this.form.fill(response.data.post)
                })
            },
            methods: {
                ourImage(img) {
                    return "uploadimage/"+img;
                },
                deletePost(id) {
                    axios.get('/delete-post/'+id)
                    .then( () => {
                        this.$store.dispatch('allPosts'); 
                        toast({
                                type: 'success',
                                title: 'Post deleted successfully'
                        })
                    })
                    .catch( () => {

                    })
                }
            },
        }
    </script>
    