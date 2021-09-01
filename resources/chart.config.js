export const options = {
  tension: 0.3,
  maintainAspectRatio: false,
  plugins: {
    legend: {
      display: false,
    },
    // tooltips: {
    //   enabled: false,
    // },
  },
  elements: {
    point: {
      radius: 0,
    },
  },
  scales: {
    x: {
      display: false,

      grid: { display: false },
      ticks: { display: false },
    },
    y: {
      display: false,
      grid: {
        display: false,
        // suggestedMin: 0,
        // suggestedMax: 10,
      },

      ticks: { display: false },
    },
  },
};
