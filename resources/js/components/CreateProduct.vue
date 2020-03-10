<script>
import Multiselect from "vue-multiselect";
export default {
  props: ["categories", "tags"],

  components: { Multiselect },
  data() {
    return {
      selectedTags: null,
      options: ["list", "of", "optionssdfsdf"],
      selectedFiles: null,
      files: ["php", "Html", "psd", "javaScript", "coffeScript", "Video"],
      selectedbrowser: null,
      browser: ["IE8", "IE9", "Crome", "firefox", "safari"],
      selectedCategory: null,
      enabledUserLicense: true,
      rlicense: null,
      elicense: null
    };
  },

  computed: {
    Category() {
      return this.categories.map(category => category.name);
    },
    optionTags() {
      return this.tags.map(tag => tag.name);
    }
  },
  methods: {
    checkanddisableUserLicense($event) {
      if (event.target.value.length) {
        this.enabledUserLicense = false;
      } else event.target.value = null;
      this.rlicense || this.elicense
        ? (this.enabledUserLicense = false)
        : (this.enabledUserLicense = true);
    }
  }
};
</script>

<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>