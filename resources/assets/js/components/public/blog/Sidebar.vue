<template>
    <div id="sidebar">
        <div class="span4">
                <aside class="right-sidebar">
                <div class="widget">
                    <form class="form-search">
                    <input @keyup="realSearch" placeholder="Type something" v-model="keyword" type="text" class="input-medium search-query">
                    <button type="submit" @click.prevent="realSearch" class="btn btn-square btn-theme">Search</button>
                    </form>
                </div>
                <div class="widget">
                    <h5 class="widgetheading">Categories</h5>
                    <ul class="cat">
                    <li v-if="allCategories" v-for="category in allCategories">
                        <i class="icon-angle-right"></i>
                        <router-link :to="`/categories/${category.id}`">{{ category.cat_name }}</router-link><span> (20)</span>
                    </li>
                    </ul>
                </div>
                <div class="widget">
                    <h5 class="widgetheading">Latest posts</h5>
                    <ul class="recent">
                    <li v-if="allBlogsPost && index < 5 " v-for="(post, index) in allBlogsPost" 
                    :key="post.id">
                        <img :src="`uploadimage/${post.photo}`" 
                        class="pull-left" 
                        alt=""
                        width="40px"
                        height="40px"
                         />
                        <h6><router-link :to="`/singlepost/${post.id}`">{{post.title}}</router-link></h6>
                        <p>
                            {{ post.description | shortLength(100, '...') }}
                        </p>
                    </li> 
                    </ul>
                </div>
                <div class="widget">
                    <h5 class="widgetheading">Popular tags</h5>
                    <ul class="tags">
                    <li><a href="#">Web design</a></li>
                    <li><a href="#">Trends</a></li>
                    <li><a href="#">Technology</a></li>
                    <li><a href="#">Internet</a></li>
                    <li><a href="#">Tutorial</a></li>
                    <li><a href="#">Development</a></li>
                    </ul>
                </div>
                </aside>
        </div>
    </div>
</template>
    
    <script>
        export default {
            name: "Sidebar",
            data() {
                return {
                    keyword: ''
                }
            },
            computed: {
                allCategories() {
                    return this.$store.getters.allCategory 
                },
                allBlogsPost() {
                    return this.$store.getters.getBlogPost 
                }
            },
            mounted() {
                this.$store.dispatch('allBlogCategories')
                this.$store.dispatch('allBlogPosts')
            },
            methods: {
                realSearch() {
                    this.$store.dispatch('getPostBySearch', this.keyword);
                },
            },
        } 
    </script>
    