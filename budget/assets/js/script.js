let ctx = document.getElementById('myChart').getContext('2d');
let labels = ['Dépenses', 'Revenus'];
let colorHex = ['#ff0000', '#fff200'];
let myChart = new Chart(ctx, {
  type: 'pie',
  data: {	
    datasets: [{
      data: [20, 80],
      backgroundColor: colorHex
    }],
    labels: labels
  },
  options: {
    responsive: true,
    legend: {
      position: 'bottom'
    },
    plugins: {
      datalabels: {
        color: '#fff',
        anchor: 'end',
        align: 'start',
        offset: -10,
        borderWidth: 2,
        borderColor: '#fff',
        borderRadius: 25,
        backgroundColor: (context) => {
          return context.dataset.backgroundColor;
        },
        font: {
          weight: 'bold',
          size: '70'
        },
        formatter: (value) => {
          return value + ' %';
        }
      }
    }
  }
})