<template>
  <div>
    <div id='hoge-texts'></div>
    <input
      id='hoge-input-text'
      v-model='text'
      type='text'
      placeholder='テキストエリア'
    >
    <button @click='addChild'>追加</button>
    <button @click='sendTexts'>送信</button>
    <div
      v-for="hoge in hogeList"
			:key="hoge.id"
    >
    {{hoge.text}}
    </div>
  </div>
</template>

<script>

  import { mapState, mapActions } from 'vuex'
  import hogeChild from './HogeChildComponent.vue'

  import Vue from 'vue'
  import store from '../store';

  export default {
    components: { hogeChild },
    data() {
      return {
        text: '',
      }
    },
    created() {
      this.getHogeList()
    },
    computed: {
      ...mapState({
        texts: state => state.texts,
        hogeList: state => state.hogeList
      })
    },
    methods: {
      ...mapActions({
        createHoge: 'createHoge',
        getHogeList: 'getHogeList'
      }),
      addChild: function() {
        let textsCount = this.texts.length;
        let textsFilterCount = this.texts.filter(n => n === this.text).length;
        if(this.text === '') {
          alert('未入力です！！');
        }
        else if (textsCount !== 0 && textsFilterCount !== 0){
          alert('重複しています！！');
        }
        else {
          const hogeChildClass = Vue.extend(hogeChild);
          const hogeChildInstance = new hogeChildClass({
            store,
            data: {text: this.text},
          });
          hogeChildInstance.$mount();
          $('#hoge-texts').append(hogeChildInstance.$el);
        }
      },
      sendTexts: function() {
        this.createHoge(this.texts);
        document.getElementById('hoge-input-text').value = '';
        const hogeTexts = document.getElementById('hoge-texts');
        while (hogeTexts.firstChild) {
          hogeTexts.removeChild(hogeTexts.firstChild);
        }
      }
    }
  }
</script>