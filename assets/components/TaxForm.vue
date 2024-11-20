<template>
    <div class="bg-blue-500">
      <h2>Calculateur d'impôt</h2>
      <form @submit.prevent="submitForm">
        <div>
          <label for="revenus">Revenus annuels :</label>
          <input
            type="number"
            id="revenus"
            v-model="revenus"
            required
          />
        </div>
  
        <div>
          <label for="parts">Nombre de parts fiscales :</label>
          <input
            type="number"
            id="parts"
            v-model="parts"
            required
            min="1"
          />
        </div>
  
        <button type="submit">Calculer</button>
      </form>
  
      <div v-if="result">
        <h3>Résultat :</h3>
        <p>Impot estimé : {{ result.impot }} €</p>
      </div>
  
      <div v-if="error" class="error">
        <p>{{ error }}</p>
      </div>
    </div>
  </template>
  
  <script>
  import axios from "axios";
  
  export default {
    data() {
      return {
        revenus: "",
        parts: 1,
        result: null,
        error: null,
      };
    },
    methods: {
      async submitForm() {
        this.error = null;
        this.result = null;
        try {
          const response = await axios.post("/calculate", {
            revenus: this.revenus,
            parts: this.parts,
          });
          this.result = response.data;
        } catch (err) {
          this.error =
            err.response?.data?.error || "Une erreur est survenue.";
        }
      },
    },
  };
  </script>
  
  <style>
  .error {
    color: red;
  }
  </style>
  