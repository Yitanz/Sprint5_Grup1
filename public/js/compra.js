const InputForm = {
  template:`
    <div class="input-form">
      <form @submit="submitForm">
        <div class="form-group">
          <label>Titular targeta</label>
          <input v-model="fields.name" type="text" placeholder="Introdueix el teu nom" class="form-control">
          <span style="color: red;">{{ fieldErrors.name }}</span>
        </div>
        <div class="form-group">
          <label>Targeta</label>
          <input v-model="fields.targeta" type="text" placeholder="Introdueix la targeta" class="form-control">
          <span style="color: red;">{{ fieldErrors.targeta }}</span>
        </div>
        <div class="form-group">
          <label>Email</label>
          <input v-model="fields.email" type="email" placeholder="Introdueix la email" class="form-control">
          <span style="color: red;">{{ fieldErrors.email }}</span>
        </div>
        <div class="form-group">
          <label>Data caducitat</label>
          <input v-model="fields.data" type="date" placeholder="Introdueix la data" class="form-control">
          <span style="color: red;">{{ fieldErrors.data }}</span>
        </div>
        <div class="form-group">
          <label>Envio</label>
          <select v-model="fields.urgency" class="" class="form-control">
            <option disabled value="">Selecciona una opció</option>
            <option>Normal</option>
            <option>Urgent</option>
          </select>
          <span style="color: red;">{{ fieldErrors.urgency }}</span>
        </div>
        <div class="form-group">
          <div>
            <input v-model="fields.termsAndConditions" type="checkbox" />
            <label>Accepto els termes i les condicions</label>
            <span style="color: red;">{{ fieldErrors.termsAndConditions }}</span>
          </div>
        </div>

        <button class="btn btn-primary">Enviar</button>
      </form>
    </div>
  `,
  methods: {
    submitForm(evt) {
      evt.preventDefault();

      this.fieldErrors = this.validateForm(this.fields);
      if (Object.keys(this.fieldErrors).length) return;

      this.items.push(this.fields.name);

      this.fields.name = '';
      this.fields.targeta = '';
      this.fields.email = '';
      this.fields.data = '';
      this.fields.urgency = '';
      this.fields.termsAndConditions = false;
    },
    validateForm(fields) {
      const errors = {};
      if (!fields.name) errors.name = "Titular targeta requerit";
      if (!fields.targeta) errors.targeta = "Numero targeta requerit";
      if (!fields.email) errors.email = "Email requerit";
      if (!fields.data) errors.data = "Data requerit";
      if (!fields.urgency) errors.urgency = "Urgència requerit";
      if (!fields.termsAndConditions) errors.termsAndConditions = "Termes i condicions requerits";

      if(fields.email && !this.isEmail(fields.email)) {
        errors.email = "Email no vàlid";
      }

      return errors;
    },
    isEmail(email) {
      const re = /\S+@\S+\.\S/;

      return re.test(email);
    }
  },
  data() {
    return {
      fields: {
        name: '',
        email: '',
        urgency: '',
        message: '',
        termsAndConditions: false,
      },
      fieldErrors: {
        name: undefined,
        email: undefined,
        urgency: undefined,
        message: undefined,
        termsAndConditions: undefined,
      },
      items: []
    }
  }

}

new Vue({
  el: '#app',
  components: {
    'input-form': InputForm
  }
})
