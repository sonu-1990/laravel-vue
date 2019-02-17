<template>
    <div>
        <!-- Content Header (Page header) -->
    <section class="content-header">
            <div class="container-fluid">
              <div class="rowd">
                <div class="col-md-8">
                  <h1>Category List</h1>
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <button class="btn btn-primary">
                        Add Category
                        </button>
                    </li>
                </ol>
                </div>
              </div>
            </div><!-- /.container-fluid -->
          </section>
           <!-- Main content -->
    <section class="content">
            <div class="row">
              <div class="col-8">
                <div class="card">
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
    </div>
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
</style>