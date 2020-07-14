import Vue from 'vue'
import Vuex, {mapGetters} from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
    state: {
        likes: 200,
        like_status: false,
        views: 400
    },
    computed : {
        ...mapGetters({
            'likes' : 'getLikes',
            'views' : 'getViews',
            'likeStatus' : 'getLikeStatus',
        })
    },
    getters: {
        getLikes(state){
            return state.likes
        },
        getViews(state){
            return state.views
        },
        getLikeStatus(state){
            return state.like_status
        }

    },
    mutations: {
        ADD_VIEW_COUNTER(state, data){
            state.views += data
        },
        ADD_LIKE_COUNTER(state, data){
            if(state.like_status === false){
                state.like_status = true
                state.likes += data
            }
            else if(state.like_status === true){
                state.like_status = false
                state.likes -= data
            }
        }
    },
    actions: {
        addViewAction({commit}, data) {
            commit('ADD_VIEW_COUNTER', data)
        },
        addLikeAction({commit}, data) {
            commit('ADD_LIKE_COUNTER', data)
        },
    }
}) 