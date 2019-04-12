const submissionComponent = {
  template:
  ` <div style="display: flex; width: 100%">
      <figure class="media-left">
        <img class="image is-64x64" :src="submission.submissionImage">
      </figure>

      <div class="media-content">
        <div class="content">
          <p>
            <strong>
              <a :href="submission.url" class="has-text-info">
                {{ submission.title }}
              </a>
            </strong>
          </p>
        </div>
      </div>

      <div class="media-right">
        <button type="submit" style="background: none;border: none;">
          <i class="fa fa-chevron-up">
            <span class="icon is-small" @click="upvote(submission.id)">
              <input name="id_atraccio" type="hidden" :value="submission.id">
          </i>
            <strong class="has-text-info">
              {{ submission.votes }}
            </strong>
          </span>
        </button>
      </div>
    </div>`,
  props: ['submission', 'submissions'],
  methods: {
    upvote(submissionId) {
      const submission = this.submissions.find(
        submission => submission.id === submissionId
      );
      submission.votes++;
    }
  }
};

new Vue({
  el: '#votacio_atraccions',
  data: {
    submissions: Seed.submissions
  },
  computed: {
    sortedSubmissions () {
      return this.submissions.sort((atraccio1, atraccio2) => {
        return atraccio2.votes - atraccio1.votes
      });
    }
  },
  components: {
    'submission-component': submissionComponent
  }
});
