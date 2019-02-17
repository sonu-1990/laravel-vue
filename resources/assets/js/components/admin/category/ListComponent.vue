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
                        <th>Actions</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td>1</td>
                        <td>Category Name
                        </td>
                        <td>
                            <a href="">Edit</a>
                            <a href="">Delete</a>
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
        mounted() {
            console.log('Component mounted.')
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