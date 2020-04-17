<template>
  <div class="small">
    <h4>Reportes de kilometros recorridos</h4>
    <line-chart :chart-data="datacollection" :height="100"></line-chart>
  </div>
</template>

<script>

import LineChart from '../componentes-graficos/GraficoLinea.js'

export default {
  components: {
    LineChart
  },
  data(){
    return {
      datacollection: null
    }
  },
  mounted () {
    this.fillData()
  },
  methods: {

    fillData ()
    {
      this.datacollection = {
        labels: ['Enero','Febrero','Marzo','Abril', 'Mayo', 'Junio', 'Julio' , 'Agosto','Septiembre','Octubre','Noviembre', 'Diciembre'],
        datasets: [
          {
            label: 'Kilometros Recorridos 2020',
            backgroundColor: '#ff971d',
            data: [ 2000, 4000, 2000,]
          },
          {
            label: 'Kilometros Recorridos 2019',
            backgroundColor: '#b80d57',
            data: [ 1000, 2000, 4000,2000,5000,6000,2000,3000,1500,3500,3000,6000]
          },
        ]
        
      }
    }
  }
}
</script>

<style lang="css">
.small {
  max-width: 800px;
  /* max-height: 500px; */
  margin:  50px auto;
}
</style>