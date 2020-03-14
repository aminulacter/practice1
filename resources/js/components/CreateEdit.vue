<script>
import Multiselect from "vue-multiselect";
export default {
  props: [
    "categories",
    "tags",
    "selectedTags",
    "selectedFiles",
    "selectedbrowser",
    "selectedCategory",
    "enabledUserLicense"
  ],

  components: { Multiselect },
  data() {
    return {
      options: ["list", "of", "optionssdfsdf"],

      files: ["php", "Html", "psd", "javaScript", "coffeScript", "Video"],
      browser: ["IE8", "IE9", "Crome", "firefox", "safari"],

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