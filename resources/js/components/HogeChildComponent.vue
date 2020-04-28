<template>
  <div>
    {{ text }}
    <button @click="deleteSelfComponent">削除</button>
  </div>
</template>

<script>
  import { mapState, mapActions } from 'vuex'

  export default {
    created() {
      this.addText({
        text: this.text,
        texts: this.texts
      })
    },
    computed: {
      ...mapState({
        texts: state => state.texts
      })
    },
    methods: {
      ...mapActions({
        addText: 'addText',
        deleteText: 'deleteText'
      }),
      deleteSelfComponent: function() {
        const texts = this.texts.filter(n => n !== this.text);
        this.deleteText(texts);
        this.$destroy();
        this.$el.parentNode.removeChild(this.$el);
      }
    }
  }

</script>