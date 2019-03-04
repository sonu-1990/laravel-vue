<template>
        <section class="content">
            <div class="container-fluid">
                <div class="row justify-content-around">
                    <!-- left column -->
                    <div class="col-md-11">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Add New Post</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="postId">Add New Post</label>
                                        <input type="text" 
                                        :class="{ 'is-invalid': form.errors.has('title') }" 
                                        class="form-control " id="postId" 
                                        placeholder="Add New Category" 
                                        v-model="form.title" name="title" 
                                        >
                                        <has-error :form="form" field="title"></has-error>
                                    </div>
                                    <div class="form-group">
                                            <label for="descriptionId">Description</label>
                                            <textarea 
                                            :class="{ 'is-invalid': form.errors.has('description') }" 
                                            class="form-control " id="descriptionId" 
                                            placeholder="Add New Post" 
                                            v-model="form.description" name="description" 
                                            ></textarea>
                                            <has-error :form="form" field="description"></has-error>
                                    </div>
                                    <div class="form-group">
                                        <label>Select</label>
                                        <select class="form-control" 
                                        :class="{ 'is-invalid': form.errors.has('cat_id') }"
                                        v-model="form.cat_id" id="cat_id" name="cat_id"
                                        >
                                            <option  value="" disabled> Select One</option>
                                            <option v-for="category in getallCategory()" :key="category.id" 
                                            :value="category.id"
                                            v-model="form.cat_id"
                                            >
                                                {{ category.cat_name}}
                                            </option>
                                        </select>
                                        <has-error :form="form" field="cat_id"></has-error>
                                    </div>
                                    <hr/>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputFile">File input</label>
                                            <div class="myclass">
                                                <div class="custom-file">
                                                <input type="file" 
                                                @change="changePhoto($event)"
                                                class="custom-file-input form-control" 
                                                id="exampleInputFile"
                                                :class="{ 'is-invalid': form.errors.has('photo') }"
                                                >
                                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                </div>
                                                <div class="input-group-append">
                                                <span class="input-group-text" id="">Upload</span>
                                                </div>
                                                <img :src="form.photo" width="100" height="100" alt=""/>
                                            </div>
                                        </div>
                                        <has-error :form="form" field="photo"></has-error>

                                    </div>
                                    
  
                                </div>
                                <!-- /.card-body -->
    
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Save</button>
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
            data() {
                return{
                    form: new Form({
                        title:'',
                        description:'',
                        cat_id:'',
                        photo:'',
                    }),
                    catInfo: []
                }
            },
            mounted(){
                this.$store.dispatch('allCategory');
            },
            methods:{
                getallCategory() {
                    return this.$store.getters.getCategory
                },
                changePhoto(event) {
                    let file = event.target.files[0];
                    let reader = new FileReader();
                    reader.onload = event => {
                        // The file's text will be printed here
                        this.form.photo = event.target.result
                    };

                    reader.readAsDataURL(file);
                }
            },
           
        }
    </script>
    
    <style scoped>
    .form-control {
        display: block;
        width: 100%;
        height: 36px !important;
        padding: 6px 12px;
        font-size: 14px;
        line-height: 1.6;
        color: #555555;
        background-color: #fff;
        background-image: none;
        border: 1px solid #ccd0d2;
        border-radius: 4px;
    }
    .myclass {
    position: relative;
    border-collapse: separate;
    }
    .custom-file-input {
        position: relative;
        z-index: 2;
        width: 100%;
        height: calc(2.25rem + 2px);
        margin: 0;
        opacity: 0;
    }

    optgroup, select, textarea {
    margin: 0;
    font-family: inherit;
    font-size: inherit;
        line-height: inherit;
    }
    </style>