// Set new default font family and font color to mimic Bootstrap's default styling
(Chart.defaults.global.defaultFontFamily = "Nunito"),
  '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = "#858796";
document.addEventListener("DOMContentLoaded", () => {
  const jumlahDokter = parseInt(
    document.getElementById("data-dokter").getAttribute("data-jumlah")
  );
  const jumlahAdmin = parseInt(
    document.getElementById("data-admin").getAttribute("data-jumlah")
  );
  const jumlahHrd = parseInt(
    document.getElementById("data-hrd").getAttribute("data-jumlah")
  );

  console.log(jumlahDokter);

  // Pie Chart
  var ctx = document.getElementById("myPieChart");
  var myPieChart = new Chart(ctx, {
    type: "doughnut",
    data: {
      labels: ["Admin", "HRD", "Dokter"],
      datasets: [
        {
          data: [jumlahAdmin, jumlahHrd, jumlahDokter],
          backgroundColor: ["#4e73df", "#1cc88a", "#36b9cc"],
          hoverBackgroundColor: ["#2e59d9", "#17a673", "#2c9faf"],
          hoverBorderColor: "rgba(234, 236, 244, 1)",
        },
      ],
    },
    options: {
      maintainAspectRatio: false,
      tooltips: {
        backgroundColor: "rgb(255,255,255)",
        bodyFontColor: "#858796",
        borderColor: "#dddfeb",
        borderWidth: 1,
        xPadding: 15,
        yPadding: 15,
        displayColors: false,
        caretPadding: 10,
      },
      legend: {
        display: false,
      },
      cutoutPercentage: 80,
    },
  });
});
