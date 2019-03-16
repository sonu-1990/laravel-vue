
export default {
    state: {
        category : [],
        post: [],
        blogpost:[]
    },
    getters:{
        getCategory(state) {
            return state.category
        },
        getPost(state) {
            return state.post
        },
        getBlogPost(state){
            return state.blogpost
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
        }

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
    }
}