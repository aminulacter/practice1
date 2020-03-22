<script>
import Multiselect from "vue-multiselect";
export default {
  props: [
    "categories",
    "tags",
    "selectedtags",
    "selectedfiles",
    "selectedbrowser",
    "selectedcategory",
    "enabledUserLicense"
  ],

  components: { Multiselect },
  data() {
    return {
      options: ["list", "of", "optionssdfsdf"],

      files: ["php", "Html", "psd", "javaScript", "coffeScript", "Video"],
      browser: ["IE8", "IE9", "Crome", "firefox", "safari"],

      rlicense: null,
      elicense: null,
      UserLicense: this.enabledUserLicense
      //enabledUserLicense: true
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
      if (!event.target.value.trim().length) {
        event.target.value = null;
      }
      this.hideOrShow();
    },
    hideOrShow() {
      let cond1 =
        this.$refs.reglicence.value.trim() != ""
          ? parseInt(this.$refs.reglicence.value, 10)
          : 0;
      let cond2 =
        this.$refs.extlicence.value.trim() != ""
          ? parseInt(this.$refs.extlicence.value, 10)
          : 0;

      if (cond1 || cond2) {
        //console.log(this.$refs.extlicence.value.trim());
        //console.log(parseInt(this.$refs.extlicence.value, 10));
        this.UserLicense = false;
      } else {
        this.$nextTick(() => (this.UserLicense = true));
      }
    },
    onlyNumber($event) {
      //console.log($event.keyCode); //keyCodes value
      let keyCode = $event.keyCode ? $event.keyCode : $event.which;
      if ((keyCode < 48 || keyCode > 57) && keyCode !== 46) {
        // 46 is dot
        $event.preventDefault();
      }

      this.hideOrShow();
    }
  },
  created() {
    console.log("selectedfiles is " + this.selectedfiles);
  }
};
</script>

<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>