
export default {
    state: {
        category : [],
        post: [],
        blogpost:[],
        singlepost:[],
        allcategories:[],
    },
    getters:{
        getCategory(state) {
            return state.category
        },
        getPost(state) {
            return state.post
        },
        getBlogPost(state) {
            return state.blogpost
        },
        getSinglePost(state) {
            return state.singlepost
        },
        allCategory(state) {
            return state.allcategories
        },
    },
    actions: {

        allCategory (context) {
            axios.get('/all-category')
                .then((response) => {
                   context.commit('categories', response.data.categories)
                })
        },
        allPosts(context) {
            axios.get('/all-post')
            .then((response) => {
                context.commit('posts', response.data.posts)

            })
        },
        allBlogPosts(context) {
            axios.get('/all-blog-posts')
            .then((response) => {
                context.commit('blogPosts', response.data.posts)
            })
        },
        singleBlogPost(context, payload) {
            axios.get('/single-post/'+ payload)
            .then((response) => {
                context.commit('singlePost', response.data.post)

            })
        },
        allBlogCategories (context) {
            axios.get('/categories')
                .then((response) => {
                    context.commit('allcategories', response.data.categories)
                })
        },

        allBlogCategories (context) {
            axios.get('/categories')
                .then((response) => {
                    context.commit('allcategories', response.data.categories)
                })
        },

        getPostByCatId(context, payload) {
            axios.get('/post-by-category/'+ payload)
            .then((response) => {
                console.log(response.data.posts);
                context.commit('getPostByCatId', response.data.posts)

            })
        },
        getPostBySearch(context, payload) {
            axios.get('/get-post-by-search?s='+ payload)
            .then((response) => {
                context.commit('getPostBySearch', response.data.posts)

            })
        },


    },
    mutations: {
        categories(state, data) {
            return state.category = data
        },
        posts(state, payload) {
            return state.post = payload
        },
        blogPosts(state,payload){
            return state.blogpost = payload
        },
        singlePost(state,payload) {
            return state.singlepost = payload
        },
        allcategories(state,payload) {
            return state.allcategories = payload
        },
        getPostByCatId(state, payload) {
            state.blogpost = payload
        },
        getPostBySearch(state, payload) {
            state.blogpost = payload
        }
    }
}