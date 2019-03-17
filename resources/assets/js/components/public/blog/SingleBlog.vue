<template>
    <span id="singlepost">
        <section id="content">
            <div class="container">
              <div class="row">
                <div class="span8">
                  <article>
                    <div class="row">
                      <div class="span8">
                        <div class="post-image">
                          <div class="post-heading">
                            <h3><a href="#">{{ singlePost.title }}</a></h3>
                          </div>
                          <img :src="`uploadimage/${singlePost.photo}`" alt="" />      
                        </div>
                        <p>
                                {{ singlePost.description }}
                        </p>
                        <div class="bottom-article">
                          <ul class="meta-post">
                            <li v-if="singlePost.user"><i class="icon-user"></i>
                                <a href="#"> {{ singlePost.user.name }}</a>
                            </li>
                            <li v-if="singlePost.category">
                                <i class="icon-folder-open"></i>
                                <a href="#"> {{ singlePost.category.cat_name }}</a>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </article>
                  <!-- author info -->
                </div>
                <BlogSidebar/>
              </div>
            </div>
          </section>
    </span>
</template>

<script>
    import BlogSidebar from './Sidebar.vue';
    export default {
        mounted() {
            this.getSinglePost();
        },
        components: {
            BlogSidebar,
        },
        computed: {
            singlePost() {
                return this.$store.getters.getSinglePost
            },
        },
        methods: {
            getSinglePost() {
                this.$store.dispatch('singleBlogPost', this.$route.params.id)
            },
        },
        watch: {
            $route(to, from) {
                this.getSinglePost();
            }
        }
    }
</script>
