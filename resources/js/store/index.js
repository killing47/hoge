import Vue from 'vue'
import Vuex from 'vuex'
import axios from 'axios'

Vue.use(Vuex)

export default new Vuex.Store({
  strict: process.env.NODE_ENV !== 'production',
  state: {
    texts: [],
    hogeList: [],
  },
  mutations: {
    setTexts (state, texts) {
      state.texts = texts
    },
    setHogeList (state, hogeList) {
      state.hogeList = hogeList
    }
  },
  actions: {
    async getHogeList({commit}) {
      const res = await axios.get('/hoge')
      commit('setHogeList', res.data)
    },
    async createHoge({commit}, texts) {
      try{
        if(texts.length === 0) {
          alert('質問項目を追加してください');
        }
        else {
          const res = await axios.post('/hoge', texts)
          commit('setHogeList', res.data)
          commit('setTexts', [])
          alert('作成に成功しました')
        }
      }
      catch{
        alert('作成に失敗しました');
      }
    },
    addText({commit}, data) {
      let texts = [];
      for (let i = 0; i < data.texts.length; i++) {
        texts.push(data.texts[i])
      }
      texts.push(data.text);
      commit('setTexts', texts)
    },
    deleteText({commit}, texts) {
      commit('setTexts', texts)
    },
  }
})
